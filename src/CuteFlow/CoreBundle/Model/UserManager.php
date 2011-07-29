<?php

namespace CuteFlow\CoreBundle\Model;

use CuteFlow\CoreBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManager;

class UserManager implements UserProviderInterface
{
    public function __construct(EncoderFactoryInterface $encoderFactory, EntityManager $em, $class)
    {
        $this->class = $class;

        if (false !== strpos($this->class, ':')) {
            $this->class = $em->getClassMetadata($class)->name;
        }

        $this->repository = $em->getRepository($class);
        $this->encoderFactory = $encoderFactory;
    }

    public function updatePassword(User $user)
    {
        if (0 !== strlen($password = $user->getPlainPassword())) {
            $encoder = $this->getEncoder($user);
            $user->setPassword($encoder->encodePassword($password, $user->getSalt()));
            $user->eraseCredentials();
        }
    }

    /**
     * {@inheritDoc}
     */
    function loadUserByUsername($username)
    {
        $user = $this->repository->findOneByUsername($username);

        if (null === $user) {
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
        }

        return $user;
    }

    /**
     * {@inheritDoc}
     */
    function supportsClass($class)
    {
        return $class === $this->class;
    }

    /**
     * {@inheritDoc}
     */
    function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    protected function getEncoder(User $user)
    {
        return $this->encoderFactory->getEncoder($user);
    }

    protected $encoderFactory;
    protected $class;
    protected $repository;
}

<?php

namespace CuteFlow\CoreBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity() 
 * @ORM\Table(name="tb_user") 
 */
class User implements UserInterface
{

    /**
     * @ORM\Id 
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue(strategy="IDENTITY") 
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length="32", unique=true) 
     */
    protected $username;
    /**
     * @ORM\Column(type="string", length="255", unique=true) 
     */
    protected $email;
    /**
     * @ORM\Column(type="string", length="128") 
     */
    protected $password;
    
    /**
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     *
     * @var ArrayCollection $userRoles
     */
    protected $userRoles;
    /**
     * @ORM\Column(type="string", length="5")
     * @var String
     */
    protected $locale;

    /**
     * Constructs a new instance of User
     */
    public function __construct()
    {
        $this->userRoles = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Gets the user roles.
     *
     * @return ArrayCollection A Doctrine ArrayCollection
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }

    /**
     * Implementing the UserInterface interface 
     */
    public function __toString()
    {
        return $this->getUsername();
    }

    /**
     * Gets an array of roles.
     * 
     * @return array An array of Role objects
     */
    public function getRoles()
    {
        return $this->getUserRoles()->toArray();
    }

    public function eraseCredentials()
    {
        
    }

    public function getSalt()
    {
        return $this->getId();
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * equals. 
     * 
     * @param UserInterface $account 
     * @return bool 
     */
    public function equals(UserInterface $account)
    {
        if ($account->getUsername() != $this->getUsername()) {
            return false;
        }
        if ($account->getEmail() != $this->getEmail()) {
            return false;
        }
        return true;
    }

}
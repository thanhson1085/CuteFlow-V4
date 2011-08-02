<?php
namespace CuteFlow\CoreBundle\Model;

use Doctrine\ORM\EntityManager;

class SettingsManager
{
    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em, $mailer)
    {
        $this->entityManager = $em;
        $this->mailer = $mailer;
    }

    /**
     * @return CuteFlow\CoreBundle\Entity\Settings
     */
    public function getSettings()
    {
        if ($this->settings == null) {
            $this->settings = $this->entityManager
                                     ->getRepository('CuteFlowCoreBundle:Settings')
                                     ->find(1);
        }

        return $this->settings;
    }

    public function getConfiguredMailer()
    {
        $this->mailer->getTransport()->setHost($this->getSettings()->getSmtpHost());

        if ($this->getSettings()->getSmtpAuthentication()) {
            $this->mailer->getTransport()->setUsername($this->getSettings()->getSmtpUser());
            $this->mailer->getTransport()->setPassword($this->getSettings()->getSmtpPassword());
        }

        $this->mailer->getTransport()->setEncryption($this->getSettings()->getSmtpEncryption());

        return $this->mailer;
    }

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var CuteFlow\CoreBundle\Entity\Settings
     */
    protected $settings;

    protected $mailer;
}

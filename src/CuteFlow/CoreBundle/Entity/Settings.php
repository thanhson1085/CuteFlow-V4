<?php

namespace CuteFlow\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CuteFlow\CoreBundle\Entity\Settings
 *
 * @ORM\Table(name="cf_settings")
 * @ORM\Entity(repositoryClass="CuteFlow\CoreBundle\Model\Repository\SettingsRepository")
 */
class Settings
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $defaultLanguage
     *
     * @ORM\Column(name="default_language", type="string", length=10, nullable=true)
     */
    private $defaultLanguage;

    /**
     * @var string $defaultTheme
     *
     * @ORM\Column(name="default_theme", type="string", length=100, nullable=true)
     */
    private $defaultTheme;

    /**
     * @var string $userFormat
     *
     * @ORM\Column(name="user_format", type="string", length=30, nullable=true)
     */
    private $userFormat;

    /**
     * @var boolean $useGravatar
     *
     * @ORM\Column(name="use_gravatar", type="boolean", nullable=true)
     */
    private $useGravatar;

    /**
     * @var string $smtpHost
     *
     * @ORM\Column(name="smtp_host", type="string", length=255, nullable=true)
     */
    private $smtpHost;

    /**
     * @var string $smtpPort
     *
     * @ORM\Column(name="smtp_port", type="string", length=5, nullable=true)
     */
    private $smtpPort;

    /**
     * @var string $smtpUser
     *
     * @ORM\Column(name="smtp_user", type="string", length=255, nullable=true)
     */
    private $smtpUser;

    /**
     * @var string $smtpPassword
     *
     * @ORM\Column(name="smtp_password", type="string", length=255, nullable=true)
     */
    private $smtpPassword;
    
    /**
     *
     * @var boolean $smtpAuthentication
     * 
     * @ORM\Column(name="smtp_authentication", type="boolean", nullable=true) 
     */
    private $smtpAuthentication;

    /**
     * var string
     * @ORM\Column(name="smtp_encryption", type="string", nullable=true)
     */
    private $smtpEncryption;


    /**
     * @var string $emissionMailAdress
     *
     * @ORM\Column(name="email_emission_address", type="string", length=255, nullable=true)
     */
    private $emissionMailAddress;
    
    /**
     * @var string $emailFormat
     *
     * @ORM\Column(name="email_format", type="string", length=255, nullable=true)
     */
    private $emailFormat;
    
    /**
     * @var string $emailFooter
     *
     * @ORM\Column(name="email_footer", type="text", nullable=true)
     */
    private $emailFooter;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set defaultLanguage
     *
     * @param string $defaultLanguage
     */
    public function setDefaultLanguage($defaultLanguage)
    {
        $this->defaultLanguage = $defaultLanguage;
    }

    /**
     * Get defaultLanguage
     *
     * @return string 
     */
    public function getDefaultLanguage()
    {
        return $this->defaultLanguage;
    }

    /**
     * Set defaultTheme
     *
     * @param string $defaultTheme
     */
    public function setDefaultTheme($defaultTheme)
    {
        $this->defaultTheme = $defaultTheme;
    }

    /**
     * Get defaultTheme
     *
     * @return string 
     */
    public function getDefaultTheme()
    {
        return $this->defaultTheme;
    }

    /**
     * Set userFormat
     *
     * @param string $userFormat
     */
    public function setUserFormat($userFormat)
    {
        $this->userFormat = $userFormat;
    }

    /**
     * Get userFormat
     *
     * @return string 
     */
    public function getUserFormat()
    {
        return $this->userFormat;
    }

    /**
     * Set useGravatar
     *
     * @param boolean $useGravatar
     */
    public function setUseGravatar($useGravatar)
    {
        $this->useGravatar = $useGravatar;
    }

    /**
     * Get useGravatar
     *
     * @return boolean 
     */
    public function getUseGravatar()
    {
        return $this->useGravatar;
    }

    /**
     * Set smtpHost
     *
     * @param string $smtpHost
     */
    public function setSmtpHost($smtpHost)
    {
        $this->smtpHost = $smtpHost;
    }

    /**
     * Get smtpHost
     *
     * @return string 
     */
    public function getSmtpHost()
    {
        return $this->smtpHost;
    }

    /**
     * Set smtpPort
     *
     * @param string $smtpPort
     */
    public function setSmtpPort($smtpPort)
    {
        $this->smtpPort = $smtpPort;
    }

    /**
     * Get smtpPort
     *
     * @return string 
     */
    public function getSmtpPort()
    {
        return $this->smtpPort;
    }

    /**
     * Set smtpUser
     *
     * @param string $smtpUser
     */
    public function setSmtpUser($smtpUser)
    {
        $this->smtpUser = $smtpUser;
    }

    /**
     * Get smtpUser
     *
     * @return string 
     */
    public function getSmtpUser()
    {
        return $this->smtpUser;
    }

    /**
     * Set smtpPassword
     *
     * @param string $smtpPassword
     */
    public function setSmtpPassword($smtpPassword)
    {
        $this->smtpPassword = $smtpPassword;
    }

    /**
     * Get smtpPassword
     *
     * @return string 
     */
    public function getSmtpPassword()
    {
        return $this->smtpPassword;
    }

    /**
     * Set smtpAuthentication
     *
     * @param boolean $smtpAuthentication
     */
    public function setSmtpAuthentication($smtpAuthentication)
    {
        $this->smtpAuthentication = $smtpAuthentication;
    }

    /**
     * Get smtpAuthentication
     *
     * @return boolean 
     */
    public function getSmtpAuthentication()
    {
        return $this->smtpAuthentication;
    }

    /**
     * Set emissionMailAdress
     *
     * @param string $emissionMailAdress
     */
    public function setEmissionMailAddress($emissionMailAddress)
    {
        $this->emissionMailAddress = $emissionMailAddress;
    }

    /**
     * Get emissionMailAdress
     *
     * @return string 
     */
    public function getEmissionMailAddress()
    {
        return $this->emissionMailAddress;
    }

    /**
     * Set emailFormat
     *
     * @param string $emailFormat
     */
    public function setEmailFormat($emailFormat)
    {
        $this->emailFormat = $emailFormat;
    }

    /**
     * Get emailFormat
     *
     * @return string 
     */
    public function getEmailFormat()
    {
        return $this->emailFormat;
    }

    /**
     * Set emailFooter
     *
     * @param text $emailFooter
     */
    public function setEmailFooter($emailFooter)
    {
        $this->emailFooter = $emailFooter;
    }

    /**
     * Get emailFooter
     *
     * @return text 
     */
    public function getEmailFooter()
    {
        return $this->emailFooter;
    }

    /**
     * Set smtpEncryption
     *
     * @param string $smtpEncryption
     */
    public function setSmtpEncryption($smtpEncryption)
    {
        $this->smtpEncryption = $smtpEncryption;
    }

    /**
     * Get smtpEncryption
     *
     * @return string 
     */
    public function getSmtpEncryption()
    {
        return $this->smtpEncryption;
    }
}
<?php

namespace CuteFlow\CoreBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity() 
 * @ORM\Table(name="cf_user") 
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
     * @ORM\JoinTable(name="cf_user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     *
     * @var ArrayCollection $userRoles
     */
    protected $userRoles;
    
    /**
     * @ORM\Column(type="string", length="5", nullable=true)
     * @var String
     */
    protected $locale;
    
    /**
     * @ORM\Column(type="string", length="100", nullable=true)
     * @var String
     */
    protected $theme;

    /**
     * @var string $lastName
     *
     * @ORM\Column(name="last_name", type="string", length="255")
     */
    protected $lastName;

    /**
     * @var string $firstName
     *
     * @ORM\Column(name="first_name", type="string", length="255")
     */
    protected $firstName;

    /**
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    protected $lastLogin;

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

    /**
     * @param string $rolename
     * @return boolean
     */
    public function hasRole($rolename)
    {
        foreach ($this->getRoles() as $role) {
            if ($role->getName() == $rolename) {
                return true;
            }
        }

        return false;
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


    /**
     * Set theme
     *
     * @param string $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    /**
     * Get theme
     *
     * @return string 
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Add userRoles
     *
     * @param CuteFlow\CoreBundle\Entity\Role $userRoles
     */
    public function addUserRoles(\CuteFlow\CoreBundle\Entity\Role $userRoles)
    {
        $this->userRoles[] = $userRoles;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastLogin
     *
     * @param datetime $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * Get lastLogin
     *
     * @return datetime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }
}
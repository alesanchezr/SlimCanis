<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="username_UNIQUE", columns={"username"}), @ORM\Index(name="email_UNIQUE", columns={"email"}), @ORM\Index(name="fk_user_1_idx", columns={"role_id"})})
 * @ORM\Entity(repositoryClass="Entity\UserRepository")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="role_id", type="integer")
     */
    private $role_id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="createdate", type="string", nullable=true)
     */
    private $createdate;

    /**
     * @var string
     *
     * @ORM\Column(name="updatedate", type="string", nullable=true)
     */
    private $updatedate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Entity\Socio", mappedBy="user")
     */
    private $socios;

    /**
     * @var \Entity\Role
     *
     * @ORM\ManyToOne(targetEntity="Entity\Role", inversedBy="users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $role;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->socios = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set role_id
     *
     * @param integer $roleId
     * @return User
     */
    public function setRoleId($roleId)
    {
        $this->role_id = $roleId;
    
        return $this;
    }

    /**
     * Get role_id
     *
     * @return integer 
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set createdate
     *
     * @param string $createdate
     * @return User
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;
    
        return $this;
    }

    /**
     * Get createdate
     *
     * @return string 
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }

    /**
     * Set updatedate
     *
     * @param string $updatedate
     * @return User
     */
    public function setUpdatedate($updatedate)
    {
        $this->updatedate = $updatedate;
    
        return $this;
    }

    /**
     * Get updatedate
     *
     * @return string 
     */
    public function getUpdatedate()
    {
        return $this->updatedate;
    }

    /**
     * Add socios
     *
     * @param \Entity\Socio $socios
     * @return User
     */
    public function addSocio(\Entity\Socio $socios)
    {
        $this->socios[] = $socios;
    
        return $this;
    }

    /**
     * Remove socios
     *
     * @param \Entity\Socio $socios
     */
    public function removeSocio(\Entity\Socio $socios)
    {
        $this->socios->removeElement($socios);
    }

    /**
     * Get socios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSocios()
    {
        return $this->socios;
    }

    /**
     * Set role
     *
     * @param \Entity\Role $role
     * @return User
     */
    public function setRole(\Entity\Role $role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return \Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }
}

<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invitado
 *
 * @ORM\Table(name="invitado", indexes={@ORM\Index(name="email_UNIQUE", columns={"email"}), @ORM\Index(name="cedula_UNIQUE", columns={"cedula"})})
 * @ORM\Entity(repositoryClass="Entity\InvitadoRepository")
 */
class Invitado
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
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="cedula", type="integer", unique=true)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=true)
     */
    private $telefono;

    /**
     * @var integer
     *
     * @ORM\Column(name="handicap", type="smallint")
     */
    private $handicap;

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
     * @ORM\OneToMany(targetEntity="Entity\Integrante", mappedBy="invitado")
     */
    private $integrantes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Entity\Asignacion", inversedBy="invitados")
     * @ORM\JoinTable(name="invitacion",
     *   joinColumns={
     *     @ORM\JoinColumn(name="invitado_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="asignacion_id", referencedColumnName="id")
     *   }
     * )
     */
    private $asignacions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->integrantes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->asignacions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Invitado
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set cedula
     *
     * @param integer $cedula
     * @return Invitado
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    
        return $this;
    }

    /**
     * Get cedula
     *
     * @return integer 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Invitado
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
     * Set telefono
     *
     * @param string $telefono
     * @return Invitado
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set handicap
     *
     * @param integer $handicap
     * @return Invitado
     */
    public function setHandicap($handicap)
    {
        $this->handicap = $handicap;
    
        return $this;
    }

    /**
     * Get handicap
     *
     * @return integer 
     */
    public function getHandicap()
    {
        return $this->handicap;
    }

    /**
     * Set createdate
     *
     * @param string $createdate
     * @return Invitado
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
     * @return Invitado
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
     * Add integrantes
     *
     * @param \Entity\Integrante $integrantes
     * @return Invitado
     */
    public function addIntegrante(\Entity\Integrante $integrantes)
    {
        $this->integrantes[] = $integrantes;
    
        return $this;
    }

    /**
     * Remove integrantes
     *
     * @param \Entity\Integrante $integrantes
     */
    public function removeIntegrante(\Entity\Integrante $integrantes)
    {
        $this->integrantes->removeElement($integrantes);
    }

    /**
     * Get integrantes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIntegrantes()
    {
        return $this->integrantes;
    }

    /**
     * Add asignacions
     *
     * @param \Entity\Asignacion $asignacions
     * @return Invitado
     */
    public function addAsignacion(\Entity\Asignacion $asignacions)
    {
        $this->asignacions[] = $asignacions;
    
        return $this;
    }

    /**
     * Remove asignacions
     *
     * @param \Entity\Asignacion $asignacions
     */
    public function removeAsignacion(\Entity\Asignacion $asignacions)
    {
        $this->asignacions->removeElement($asignacions);
    }

    /**
     * Get asignacions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAsignacions()
    {
        return $this->asignacions;
    }
}

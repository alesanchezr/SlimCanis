<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cadi
 */
class Cadi
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $cedula;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var string
     */
    private $createdate;

    /**
     * @var string
     */
    private $updatedate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $asignacions;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * @return Cadi
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
     * @return Cadi
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
     * Set telefono
     *
     * @param string $telefono
     * @return Cadi
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
     * Set createdate
     *
     * @param string $createdate
     * @return Cadi
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
     * @return Cadi
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
     * Add asignacions
     *
     * @param \Entity\Asignacion $asignacions
     * @return Cadi
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

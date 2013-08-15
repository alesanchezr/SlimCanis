<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Socio
 */
class Socio
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $user_id;

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
    private $numero_socio;

    /**
     * @var integer
     */
    private $handicap;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $equipos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $integrantes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $reservacions;

    /**
     * @var \Entity\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->asignacions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->equipos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->integrantes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reservacions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set user_id
     *
     * @param integer $userId
     * @return Socio
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
    
        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Socio
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
     * @return Socio
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
     * Set numero_socio
     *
     * @param string $numeroSocio
     * @return Socio
     */
    public function setNumeroSocio($numeroSocio)
    {
        $this->numero_socio = $numeroSocio;
    
        return $this;
    }

    /**
     * Get numero_socio
     *
     * @return string 
     */
    public function getNumeroSocio()
    {
        return $this->numero_socio;
    }

    /**
     * Set handicap
     *
     * @param integer $handicap
     * @return Socio
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
     * Set telefono
     *
     * @param string $telefono
     * @return Socio
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
     * @return Socio
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
     * @return Socio
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
     * @return Socio
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

    /**
     * Add equipos
     *
     * @param \Entity\Equipo $equipos
     * @return Socio
     */
    public function addEquipo(\Entity\Equipo $equipos)
    {
        $this->equipos[] = $equipos;
    
        return $this;
    }

    /**
     * Remove equipos
     *
     * @param \Entity\Equipo $equipos
     */
    public function removeEquipo(\Entity\Equipo $equipos)
    {
        $this->equipos->removeElement($equipos);
    }

    /**
     * Get equipos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEquipos()
    {
        return $this->equipos;
    }

    /**
     * Add integrantes
     *
     * @param \Entity\Integrante $integrantes
     * @return Socio
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
     * Add reservacions
     *
     * @param \Entity\Reservacion $reservacions
     * @return Socio
     */
    public function addReservacion(\Entity\Reservacion $reservacions)
    {
        $this->reservacions[] = $reservacions;
    
        return $this;
    }

    /**
     * Remove reservacions
     *
     * @param \Entity\Reservacion $reservacions
     */
    public function removeReservacion(\Entity\Reservacion $reservacions)
    {
        $this->reservacions->removeElement($reservacions);
    }

    /**
     * Get reservacions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReservacions()
    {
        return $this->reservacions;
    }

    /**
     * Set user
     *
     * @param \Entity\User $user
     * @return Socio
     */
    public function setUser(\Entity\User $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}

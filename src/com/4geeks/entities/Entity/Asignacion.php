<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asignacion
 */
class Asignacion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $reservacion_id;

    /**
     * @var integer
     */
    private $equipo_id;

    /**
     * @var integer
     */
    private $socio_id;

    /**
     * @var integer
     */
    private $cadi_id;

    /**
     * @var integer
     */
    private $hoyo;

    /**
     * @var string
     */
    private $fecha_asignada;

    /**
     * @var string
     */
    private $fecha_inicio;

    /**
     * @var string
     */
    private $fecha_fin;

    /**
     * @var string
     */
    private $estatus;

    /**
     * @var string
     */
    private $editado_por;

    /**
     * @var string
     */
    private $createdate;

    /**
     * @var string
     */
    private $updatedate;

    /**
     * @var \Entity\Reservacion
     */
    private $reservacion;

    /**
     * @var \Entity\Equipo
     */
    private $equipo;

    /**
     * @var \Entity\Socio
     */
    private $socio;

    /**
     * @var \Entity\Cadi
     */
    private $cadi;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $invitados;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invitados = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set reservacion_id
     *
     * @param integer $reservacionId
     * @return Asignacion
     */
    public function setReservacionId($reservacionId)
    {
        $this->reservacion_id = $reservacionId;
    
        return $this;
    }

    /**
     * Get reservacion_id
     *
     * @return integer 
     */
    public function getReservacionId()
    {
        return $this->reservacion_id;
    }

    /**
     * Set equipo_id
     *
     * @param integer $equipoId
     * @return Asignacion
     */
    public function setEquipoId($equipoId)
    {
        $this->equipo_id = $equipoId;
    
        return $this;
    }

    /**
     * Get equipo_id
     *
     * @return integer 
     */
    public function getEquipoId()
    {
        return $this->equipo_id;
    }

    /**
     * Set socio_id
     *
     * @param integer $socioId
     * @return Asignacion
     */
    public function setSocioId($socioId)
    {
        $this->socio_id = $socioId;
    
        return $this;
    }

    /**
     * Get socio_id
     *
     * @return integer 
     */
    public function getSocioId()
    {
        return $this->socio_id;
    }

    /**
     * Set cadi_id
     *
     * @param integer $cadiId
     * @return Asignacion
     */
    public function setCadiId($cadiId)
    {
        $this->cadi_id = $cadiId;
    
        return $this;
    }

    /**
     * Get cadi_id
     *
     * @return integer 
     */
    public function getCadiId()
    {
        return $this->cadi_id;
    }

    /**
     * Set hoyo
     *
     * @param integer $hoyo
     * @return Asignacion
     */
    public function setHoyo($hoyo)
    {
        $this->hoyo = $hoyo;
    
        return $this;
    }

    /**
     * Get hoyo
     *
     * @return integer 
     */
    public function getHoyo()
    {
        return $this->hoyo;
    }

    /**
     * Set fecha_asignada
     *
     * @param string $fechaAsignada
     * @return Asignacion
     */
    public function setFechaAsignada($fechaAsignada)
    {
        $this->fecha_asignada = $fechaAsignada;
    
        return $this;
    }

    /**
     * Get fecha_asignada
     *
     * @return string 
     */
    public function getFechaAsignada()
    {
        return $this->fecha_asignada;
    }

    /**
     * Set fecha_inicio
     *
     * @param string $fechaInicio
     * @return Asignacion
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fecha_inicio = $fechaInicio;
    
        return $this;
    }

    /**
     * Get fecha_inicio
     *
     * @return string 
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set fecha_fin
     *
     * @param string $fechaFin
     * @return Asignacion
     */
    public function setFechaFin($fechaFin)
    {
        $this->fecha_fin = $fechaFin;
    
        return $this;
    }

    /**
     * Get fecha_fin
     *
     * @return string 
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * Set estatus
     *
     * @param string $estatus
     * @return Asignacion
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    
        return $this;
    }

    /**
     * Get estatus
     *
     * @return string 
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set editado_por
     *
     * @param string $editadoPor
     * @return Asignacion
     */
    public function setEditadoPor($editadoPor)
    {
        $this->editado_por = $editadoPor;
    
        return $this;
    }

    /**
     * Get editado_por
     *
     * @return string 
     */
    public function getEditadoPor()
    {
        return $this->editado_por;
    }

    /**
     * Set createdate
     *
     * @param string $createdate
     * @return Asignacion
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
     * @return Asignacion
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
     * Set reservacion
     *
     * @param \Entity\Reservacion $reservacion
     * @return Asignacion
     */
    public function setReservacion(\Entity\Reservacion $reservacion)
    {
        $this->reservacion = $reservacion;
    
        return $this;
    }

    /**
     * Get reservacion
     *
     * @return \Entity\Reservacion 
     */
    public function getReservacion()
    {
        return $this->reservacion;
    }

    /**
     * Set equipo
     *
     * @param \Entity\Equipo $equipo
     * @return Asignacion
     */
    public function setEquipo(\Entity\Equipo $equipo)
    {
        $this->equipo = $equipo;
    
        return $this;
    }

    /**
     * Get equipo
     *
     * @return \Entity\Equipo 
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * Set socio
     *
     * @param \Entity\Socio $socio
     * @return Asignacion
     */
    public function setSocio(\Entity\Socio $socio)
    {
        $this->socio = $socio;
    
        return $this;
    }

    /**
     * Get socio
     *
     * @return \Entity\Socio 
     */
    public function getSocio()
    {
        return $this->socio;
    }

    /**
     * Set cadi
     *
     * @param \Entity\Cadi $cadi
     * @return Asignacion
     */
    public function setCadi(\Entity\Cadi $cadi = null)
    {
        $this->cadi = $cadi;
    
        return $this;
    }

    /**
     * Get cadi
     *
     * @return \Entity\Cadi 
     */
    public function getCadi()
    {
        return $this->cadi;
    }

    /**
     * Add invitados
     *
     * @param \Entity\Invitado $invitados
     * @return Asignacion
     */
    public function addInvitado(\Entity\Invitado $invitados)
    {
        $this->invitados[] = $invitados;
    
        return $this;
    }

    /**
     * Remove invitados
     *
     * @param \Entity\Invitado $invitados
     */
    public function removeInvitado(\Entity\Invitado $invitados)
    {
        $this->invitados->removeElement($invitados);
    }

    /**
     * Get invitados
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInvitados()
    {
        return $this->invitados;
    }
}

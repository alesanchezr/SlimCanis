<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservacion
 */
class Reservacion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $socio_id;

    /**
     * @var integer
     */
    private $equipo_id;

    /**
     * @var string
     */
    private $fecha_solicitada;

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
     * @var \Entity\Asignacion
     */
    private $asignacion;

    /**
     * @var \Entity\Socio
     */
    private $socio;

    /**
     * @var \Entity\Equipo
     */
    private $equipo;


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
     * Set socio_id
     *
     * @param integer $socioId
     * @return Reservacion
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
     * Set equipo_id
     *
     * @param integer $equipoId
     * @return Reservacion
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
     * Set fecha_solicitada
     *
     * @param string $fechaSolicitada
     * @return Reservacion
     */
    public function setFechaSolicitada($fechaSolicitada)
    {
        $this->fecha_solicitada = $fechaSolicitada;
    
        return $this;
    }

    /**
     * Get fecha_solicitada
     *
     * @return string 
     */
    public function getFechaSolicitada()
    {
        return $this->fecha_solicitada;
    }

    /**
     * Set estatus
     *
     * @param string $estatus
     * @return Reservacion
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
     * @return Reservacion
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
     * @return Reservacion
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
     * @return Reservacion
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
     * Set asignacion
     *
     * @param \Entity\Asignacion $asignacion
     * @return Reservacion
     */
    public function setAsignacion(\Entity\Asignacion $asignacion)
    {
        $this->asignacion = $asignacion;
    
        return $this;
    }

    /**
     * Get asignacion
     *
     * @return \Entity\Asignacion 
     */
    public function getAsignacion()
    {
        return $this->asignacion;
    }

    /**
     * Set socio
     *
     * @param \Entity\Socio $socio
     * @return Reservacion
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
     * Set equipo
     *
     * @param \Entity\Equipo $equipo
     * @return Reservacion
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
}

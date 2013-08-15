<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FechaOcupada
 */
class FechaOcupada
{
    /**
     * @var integer
     */
    private $id;

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
    private $motivo;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha_inicio
     *
     * @param string $fechaInicio
     * @return FechaOcupada
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
     * @return FechaOcupada
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
     * Set motivo
     *
     * @param string $motivo
     * @return FechaOcupada
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    
        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set editado_por
     *
     * @param string $editadoPor
     * @return FechaOcupada
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
     * @return FechaOcupada
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
     * @return FechaOcupada
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
}

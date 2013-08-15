<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Integrante
 */
class Integrante
{
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
    private $invitado_id;

    /**
     * @var \Entity\Equipo
     */
    private $equipo;

    /**
     * @var \Entity\Socio
     */
    private $socio;

    /**
     * @var \Entity\Invitado
     */
    private $invitado;


    /**
     * Set equipo_id
     *
     * @param integer $equipoId
     * @return Integrante
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
     * @return Integrante
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
     * Set invitado_id
     *
     * @param integer $invitadoId
     * @return Integrante
     */
    public function setInvitadoId($invitadoId)
    {
        $this->invitado_id = $invitadoId;
    
        return $this;
    }

    /**
     * Get invitado_id
     *
     * @return integer 
     */
    public function getInvitadoId()
    {
        return $this->invitado_id;
    }

    /**
     * Set equipo
     *
     * @param \Entity\Equipo $equipo
     * @return Integrante
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
     * @return Integrante
     */
    public function setSocio(\Entity\Socio $socio = null)
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
     * Set invitado
     *
     * @param \Entity\Invitado $invitado
     * @return Integrante
     */
    public function setInvitado(\Entity\Invitado $invitado = null)
    {
        $this->invitado = $invitado;
    
        return $this;
    }

    /**
     * Get invitado
     *
     * @return \Entity\Invitado 
     */
    public function getInvitado()
    {
        return $this->invitado;
    }
}

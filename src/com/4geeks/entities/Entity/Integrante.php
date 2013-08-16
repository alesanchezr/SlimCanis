<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Integrante
 *
 * @ORM\Table(name="integrante", indexes={@ORM\Index(name="fk_integrantes_equipo_idx", columns={"equipo_id"}), @ORM\Index(name="fk_integrantes_socio_idx", columns={"socio_id"}), @ORM\Index(name="fk_integrantes_invitado_idx", columns={"invitado_id"})})
 * @ORM\Entity(repositoryClass="Entity\IntegranteRepository")
 */
class Integrante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="equipo_id", type="integer")
     */
    private $equipo_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="socio_id", type="integer", nullable=true)
     */
    private $socio_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="invitado_id", type="integer", nullable=true)
     */
    private $invitado_id;

    /**
     * @var \Entity\Equipo
     *
     * @ORM\ManyToOne(targetEntity="Entity\Equipo", inversedBy="integrantes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="equipo_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $equipo;

    /**
     * @var \Entity\Socio
     *
     * @ORM\ManyToOne(targetEntity="Entity\Socio", inversedBy="integrantes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="socio_id", referencedColumnName="id")
     * })
     */
    private $socio;

    /**
     * @var \Entity\Invitado
     *
     * @ORM\ManyToOne(targetEntity="Entity\Invitado", inversedBy="integrantes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="invitado_id", referencedColumnName="id")
     * })
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

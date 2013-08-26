<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservacion
 *
 * @ORM\Table(name="reservacion", indexes={@ORM\Index(name="fk_reservacion_socio_idx", columns={"socio_id"}), @ORM\Index(name="fk_reservacion_equipo_idx", columns={"equipo_id"}), @ORM\Index(name="index_estatus", columns={"estatus"}), @ORM\Index(name="index_fecha_solicitada", columns={"fecha_solicitada"})})
 * @ORM\Entity(repositoryClass="Entity\ReservacionRepository")
 */
class Reservacion
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
     * @var integer
     *
     * @ORM\Column(name="socio_id", type="integer")
     */
    private $socio_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="equipo_id", type="integer")
     */
    private $equipo_id;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_solicitada", type="string")
     */
    private $fecha_solicitada;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=25)
     */
    private $estatus;

    /**
     * @var string
     *
     * @ORM\Column(name="editado_por", type="string", length=45, nullable=true)
     */
    private $editado_por;

    /**
     * @var string
     *
     * @ORM\Column(name="createdate", type="string")
     */
    private $createdate;

    /**
     * @var string
     *
     * @ORM\Column(name="updatedate", type="string")
     */
    private $updatedate;

    /**
     * @var \Entity\Asignacion
     *
     * @ORM\OneToOne(targetEntity="Entity\Asignacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="reservacion_id", unique=true, nullable=false)
     * })
     */
    private $asignacion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Entity\Ticket", mappedBy="reservacion")
     */
    private $tickets;

    /**
     * @var \Entity\Socio
     *
     * @ORM\ManyToOne(targetEntity="Entity\Socio", inversedBy="reservacions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="socio_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $socio;

    /**
     * @var \Entity\Equipo
     *
     * @ORM\ManyToOne(targetEntity="Entity\Equipo", inversedBy="reservacions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="equipo_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $equipo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tickets = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add tickets
     *
     * @param \Entity\Ticket $tickets
     * @return Reservacion
     */
    public function addTicket(\Entity\Ticket $tickets)
    {
        $this->tickets[] = $tickets;
    
        return $this;
    }

    /**
     * Remove tickets
     *
     * @param \Entity\Ticket $tickets
     */
    public function removeTicket(\Entity\Ticket $tickets)
    {
        $this->tickets->removeElement($tickets);
    }

    /**
     * Get tickets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTickets()
    {
        return $this->tickets;
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

    public function toArrayMin()
    {
        $equipo = $this->getEquipo();
        if($equipo) $equipo = $equipo->toArray();

        //$asignacion = $this->getAsignacion();
        //if($asignacion) $asignacion = $asignacion->toArray();

        return array(
            "id" => $this->id, 
            "fecha" => $this->fecha_solicitada, 
            "estatus" => $this->estatus,
            "equipo" => $equipo
            );
    }

    //TODO: Todavia falta devolver las reservaciones con la asignacion
    public function toArrayParaAsignacion()
    {
        $equipo = $this->getEquipo();
        if($equipo) $equipo = $equipo->toArray();

        if(isset($this->asignacion))
            $asignacion = $this->getAsignacion()->toArrayMin();

        return array(
            "id" => $this->id, 
            "fecha" => $this->fecha_solicitada, 
            "estatus" => $this->estatus,
            "equipo" => $equipo
            //"asignacion" => $asignacion
            );
    }
}

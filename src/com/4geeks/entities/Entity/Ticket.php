<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket", indexes={@ORM\Index(name="fk_ticket_reservacion_idx", columns={"reservacion_id"})})
 * @ORM\Entity(repositoryClass="Entity\TicketRepository")
 */
class Ticket
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
     * @ORM\Column(name="reservacion_id", type="string", length=45)
     */
    private $reservacion_id;

    /**
     * @var \Entity\Reservacion
     *
     * @ORM\ManyToOne(targetEntity="Entity\Reservacion", inversedBy="tickets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reservacion_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $reservacion;


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
     * @param string $reservacionId
     * @return Ticket
     */
    public function setReservacionId($reservacionId)
    {
        $this->reservacion_id = $reservacionId;
    
        return $this;
    }

    /**
     * Get reservacion_id
     *
     * @return string 
     */
    public function getReservacionId()
    {
        return $this->reservacion_id;
    }

    /**
     * Set reservacion
     *
     * @param \Entity\Reservacion $reservacion
     * @return Ticket
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
}

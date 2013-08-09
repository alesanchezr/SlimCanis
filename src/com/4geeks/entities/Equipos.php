<?php
/**
 * @Entity @Table(name="equipos")
 **/
require_once "src/com/4geeks/entities/Golfistas.php";
class Equipos
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /**
    * @Column(type="integer")
    **/
    protected $handicap_promedio;

    /** 
    * @OneToOne(targetEntity="Golfistas")
    * @JoinColumn(name="golfista_id", referencedColumnName="id")
    **/
    protected $golfista_id;

    /**
     * @ManyToMany(targetEntity="Golfistas", mappedBy="equipo_id")
     **/
    private $golfistas_id;

    public function getId()
    {
        return $this->id;
    }

    public function getHandicap()
    {
        return $this->handicap_promedio;
    }

    public function setHandicap($handicap)
    {
        $this->handicap_promedio = $handicap;
    }

    public function getSocio()
    {
        return $this->golfista_id;
    }

    public function setSocio($socio)
    {
        $this->golfista_id = $socio;
    }

    public function __construct() {
        $this->golfistas_id = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
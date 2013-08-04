<?php
/**
 * @Entity @Table(name="equipo")
 **/
class Equipo
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /**
    * @Column(type="integer")
    **/
    protected $handicap;

    /** 
    * @ManyToOne(targetEntity="Golfista") 
    * @JoinColumn(name="socio_id", referencedColumnName="id")
    **/
    protected $socio;

    public function getId()
    {
        return $this->id;
    }

    public function getHandicap()
    {
        return $this->handicap;
    }

    public function setHandicap($handicap)
    {
        $this->handicap = $handicap;
    }

    public function getSocio()
    {
        return $this->socio;
    }

    public function setSocio($socio)
    {
        $this->socio = $socio;
    }

}
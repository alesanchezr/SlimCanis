<?php
/**
 * @Entity @Table(name="golfista")
 **/
class Golfista
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /**
    * @Column(type="integer")
    **/
    protected $handicap;

    /** @Column(length=25) **/
    protected $numero_carnet;

    /** 
    * @OneToOne(targetEntity="User") 
    * @JoinColumn(name="user_id", referencedColumnName="id")
    **/
    protected $user;

    /** 
    * @OneToOne(targetEntity="Golfista") 
    * @JoinColumn(name="socio_id", referencedColumnName="id")
    **/
    protected $socio;

    public function getId()
    {
        return $this->id;
    }

    public function getNumeroCarnet()
    {
        return $this->numero_carnet;
    }

    public function setNumeroCarnet($carnet)
    {
        $this->numero_carnet = $carnet;
    }

    public function getHandicap()
    {
        return $this->handicap;
    }

    public function setHandicap($handicap)
    {
        $this->handicap = $handicap;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
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
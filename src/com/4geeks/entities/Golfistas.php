<?php
/**
 * @Entity @Table(name="golfistas")
 **/
require_once "src/com/4geeks/entities/Users.php";

class Golfistas
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /**
    * @Column(type="integer")
    **/
    protected $handicap;

    /** @Column(length=20) **/
    protected $numero_socio;

    /** @Column(length=25) **/
    protected $nombre;

    /** 
    * @OneToOne(targetEntity="Users")
    * @JoinColumn(name="user_id", referencedColumnName="id")
    **/
    protected $user_id;

    /** 
    * @OneToOne(targetEntity="Golfistas") 
    * @JoinColumn(name="socio", referencedColumnName="id")
    **/
    protected $socio;

    public function getId()
    {
        return $this->id;
    }

    public function getNumeroSocio()
    {
        return $this->numero_socio;
    }

    public function setNumeroSocio($carnet)
    {
        $this->numero_socio = $carnet;
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
        return $this->user_id;
    }

    public function setUser($user)
    {
        $this->user_id = $user;
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
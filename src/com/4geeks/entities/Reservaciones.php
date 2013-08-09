<?php
/**
 * @Entity @Table(name="reservaciones")
 **/
class Reservaciones
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="integer") **/
    protected $equipo_id;

    //RELACION /** @Column(type="integer") **/
    protected $golfista_id;

    /** @Column(type="datetime") **/
    protected $fecha_solicitada;

    /** @Column(length="10") **/
    protected $estatus;

    /** @Column(type="timestamp") **/
    protected $create_date;

}
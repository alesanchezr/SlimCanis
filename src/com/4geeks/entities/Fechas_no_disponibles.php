<?php
/**
 * @Entity @Table(name="reservaciones")
 **/
class Reservaciones
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="datetime") **/
    protected $fecha_inicio;

    /** @Column(type="datetime") **/
    protected $fecha_fin;

    /** @Column(length="255") **/
    protected $motivo;

}
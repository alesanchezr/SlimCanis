<?php
/**
 * @Entity @Table(name="asignaciones")
 **/
class Asignaciones
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="integer") **/
    protected $reservacion_id;

    /** @Column(type="datetime") **/
    protected $fecha_asignada;

    /** @Column(length="20") **/
    protected $estatus;

    /** @Column(type="time") **/
    protected $hora_inicio;

    /** @Column(type="time") **/
    protected $hora_fin;

    /** @Column(type="integer") **/
    protected $hoyo;

    /** @Column(length="20") **/
    protected $cadi;

    /** @Column(length="20") **/
    protected $editado_por;

    /** @Column(type="datetime") **/
    protected $createdate;

    /** @Column(type="timestamp") **/
    protected $updatedate;

}
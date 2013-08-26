<?php

use Entity\Cadi;

require_once "src/com/4geeks/model/Base.manager.php";

class CadiManager extends BaseManager
{

	/*
		ENTRADA:
		{ 
		    "id": 1, 
		    "nombre": "Raúl Pérez",
		    "cedula": 21394532,
		    "telefono": "04123243465"
		}

	*/
    public function agregar($data)
	{

		$array_data = (array) $data;

		$cadi = new Cadi();
		$cadi->setNombre($array_data["nombre"]);
		$cadi->setCedula($array_data["cedula"]);
		$cadi->setTelefono($array_data["telefono"]);
		self::$EntityManager->persist($cadi);

		return $cadi;
	}

	/*
		ENTRADA:

		VACIO

	*/
    public function listar()
	{

		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('c')
		   ->from('Entity\Cadi', 'c');

		$array = $qb->getQuery()->getResult(1);
		return $array;
	}


}

?>
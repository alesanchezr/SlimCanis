<?php

require_once "src/com/4geeks/model/Base.manager.php";

class BusquedaManager extends BaseManager
{

	/*
		ENTRADA:

		VACIO

		SALIDA:

		{ 
		    "success": true, 
		    "response": [
		        {
		            "id": 1,
		            "nombre": "Manuel Pereira",
		            "cedula":21841933,
		            "email": "manupe@hotmail.com",
		            "telefono": "04142334223",
		            "createdate": "1969-01-01T01:01:01"
		        }
		    ]
		}

	*/
    public function buscar()
	{
		//TO-DO: Hacer query de búsqueda
		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('s')
		   ->from('Entity\Invitados', 's');
		$array = $qb->getQuery()->getResult(2);
		return $array;
	}

	/*
		ENTRADA:

		VACIO

		SALIDA:

		{ 
		    "success": true, 
		    "response": [
		        {
		            "id": 1,
		            "nombre": "Manuel Pereira",
		            "cedula":21841933,
		            "email": "manupe@hotmail.com",
		            "telefono": "04142334223",
		            "createdate": "1969-01-01T01:01:01"
		        }
		    ]
		}

	*/
    public function buscarConInvitado()
	{
		//TO-DO: Hacer query de búsqueda con invitados
		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('s')
		   ->from('Entity\Invitados', 's');
		$array = $qb->getQuery()->getResult(2);
		return $array;
	}

}

?>
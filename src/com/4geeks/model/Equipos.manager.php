<?php

require_once "src/com/4geeks/model/Base.manager.php";

class EquiposManager extends BaseManager
{

    public  function crearEquipo($data)
	{
		//DATA
		/*
		{ 
		        "perfil_id": 1, 
		        "integrantes": [
		            {
		                "id": 1,
		                "nombre": "Antonio Pérez",
		                "usuario_id":1,
		                "numero_socio":1111,
		                "handicap":12,
		                "socio":"NULL"
		            },
		            {
		                "id": 2,
		                "nombre": "Antonio Pérez",
		                "usuario_id":2,
		                "numero_socio":2222,
		                "handicap":10,
		                "socio":"NULL"
		            },
		            {
		                "id": 3,
		                "nombre": "Antonio Pérez",
		                "usuario_id":"NULL",
		                "numero_socio":"NULL",
		                "handicap":25,
		                "socio":1111
		            }
		        ] 
		}
		*/
		require_once "src/com/4geeks/entities/Golfistas.php";
		$socio = self::$EntityManager->find("Golfistas",$data->golfista_id);

		require_once "src/com/4geeks/entities/Equipos.php";

		$handicap = $socio->getHandicap();

		$count = 1;

		foreach ($data->integrantes as $key => $value) {
			$handicap += $value->handicap;
			//$s = self::$EntityManager->find("Golfista",$data->perfil_id);
			$count++;
		}

		//TODO: load integrantes

		$handicap = intval(round($handicap/$count));

		$equipo = new Equipos();
		$equipo->setHandicap($handicap);
		$equipo->setSocio($socio);
		self::$EntityManager->persist($equipo);
		self::$EntityManager->flush();

		$result = array(
				    "success"  => true, 
				    "response" => array( 
				        "id"   => $equipo->getId(),
				        "perfil_id" => $equipo->getSocio()->getId(), 
				        "handicap_promedio" => $equipo->getHandicap(),
				        "integrantes" => array(
				        	array("perfil_id" => 2222),
				        	array("perfil_id" => 3333)
				        )
				    )
				);

		return $result;
	}

	public function getEquipos($id)
	{
		
		require_once "src/com/4geeks/entities/Equipos.php";
		$query = self::$EntityManager->createQueryBuilder();
		$query->addSelect('e');
		$query->addSelect('g');
		$query->addSelect('gs');

		$query->from('equipos', 'e');

		$query->leftJoin('e.golfista_id', 'g');
		$query->leftJoin('e.golfistas_id','gs');
		$query->where('e.golfista_id = ?1');		
		
		$query->setParameter(1, $id);

		$array = $query->getQuery()->getResult(2);//2 - Para el Hydration (vuelve la respuesta un array convertible a json)
		
		if (count($array)>0) {
			return $array;
		}else{
			throw new Exception("Not found.", 1);	
		}
		
		
	}

}

?>
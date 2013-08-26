<?php

use Entity\Equipo;
use Entity\Integrante;

require_once "src/com/4geeks/model/Base.manager.php";
require_once 'src/com/4geeks/model/Fechas.manager.php';

class EquiposManager extends BaseManager
{

    public  function crearEquipo($data)
	{

		$array_data = (array) $data;
		//DATA
		/*
		{  
		    "socio_id": 1 ,
		    "integrantes": [
		        {
		            "id": 2,
		            "tipo": "socio"
		        },
		        {
		            "id": 3,
		            "tipo": "socio"
		        },
		        {
		            "id": 1,
		            "tipo": "invitado"
		        }
		    ]
		}
		*/
		
		$socio = self::$EntityManager->find("Entity\Socio",$array_data["socio_id"]);

		$handicapFinal = $socio->getHandicap();
		$integrantesFinales = array();
		$count = 1;
		$equipo = new Equipo();
		$equipo->setSocio($socio);
		self::$EntityManager->persist($equipo);

		foreach ($array_data["integrantes"] as $int) {
			
			$golfista = null;
			$integrante = new Integrante();
			$integrante->setEquipo($equipo);

			if($int->tipo=="socio")
			{
				$golfista = self::$EntityManager->find("Entity\Socio",$int->id);
				$integrante->setSocio($golfista);
			}
			else if($int->tipo=="invitado")
			{
				$golfista = self::$EntityManager->find("Entity\Invitado",$int->id);
				$integrante->setInvitado($golfista);
			}
			
			if($golfista)
			{
				$handicapFinal += $golfista->getHandicap();
				self::$EntityManager->persist($integrante);
				$equipo->addIntegrante($integrante);
			}

			$count++;
		}

		$handicap = intval(round($handicapFinal/$count));
		
		$equipo->setHandicapPromedio($handicap);
		self::$EntityManager->persist($equipo);

		return $equipo;
	}

	/*
		ENTRADA:

		{
		    "equipo": 1,
		    "integrante": {
		        "id":1,
		        "tipo": "socio"
		    }
		}

	*/

	public function agregarIntegrante($data)
	{
		$array_data = (array) $data;

		$equipo_id = $array_data["equipo"];
		$integrante_array = (array) $array_data["integrante"];

		$equipo = self::$EntityManager->find("Entity\Equipo",$equipo_id);
		$integrante = new Integrante();
		$integrante->setEquipo($equipo);

		if($integrante_array["tipo"]=="socio")
		{
			$qb = self::$EntityManager->createQueryBuilder();
			$qb->select('i.id')
			   ->from('Entity\Integrante', 'i')
			   ->where('i.equipo_id = ?1')
			   ->andWhere('i.socio_id = ?2')
			   ->setParameter(1, $equipo_id)
			   ->setParameter(2, $integrante_array['id']);
			$array = $qb->getQuery()->getResult(2);
			if(count($array)>0) throw new ErrorException("Este golfista ya esta en este equipo", 1);

			$int = self::$EntityManager->find("Entity\Socio",$integrante_array['id']);
			$integrante->setSocio($int);
		}
		else if($integrante_array["tipo"]=="invitado")
		{
			$qb = self::$EntityManager->createQueryBuilder();
			$qb->select('i.id')
			   ->from('Entity\Integrante', 'i')
			   ->where('i.equipo_id = ?1')
			   ->andWhere('i.invitado_id = ?2')
			   ->setParameter(1, $equipo_id)
			   ->setParameter(2, $integrante_array['id']);
			$array = $qb->getQuery()->getResult(2);
			if(count($array)>0) throw new ErrorException("Este golfista ya esta en este equipo", 1);

			$int = self::$EntityManager->find("Entity\Integrante",$integrante_array['id']);
			$integrante->setInvitado($int);
		}
		self::$EntityManager->persist($integrante);

		$equipo->addIntegrante($integrante);
		self::$EntityManager->persist($equipo);

		return $equipo;
	}

	public function getEquipos()
	{
		$qb = self::$EntityManager->createQuery('SELECT e, g, s FROM Entity\Equipo e JOIN e.integrantes g JOIN e.socio s');
		$array = $qb->getResult();
		if (count($array)>0) {
			return $array;
		}else{
			throw new ErrorException("No found.", 1);
			
		}
		
	}

	public function getEquipo($id)
	{
		$qb = self::$EntityManager->createQuery('SELECT e, g, s FROM Entity\Equipo e JOIN e.integrantes g JOIN e.socio s WHERE e.id = ?1');
		$qb->setParameter(1, $id);
		$array = $qb->getResult();
		if (count($array)>0) {
			return $array;
		}else{
			throw new ErrorException("No found.", 1);
			
		}
		
	}

	public function getEquiposPorSocio($id){
		$qb = self::$EntityManager->createQuery('SELECT e, g, s FROM Entity\Equipo e JOIN e.integrantes g JOIN e.socio s WHERE e.socio_id = ?1');
		$qb->setParameter(1, $id);
		$array = $qb->getResult();
		if (count($array)>0) {
			return $array;
		}else{
			throw new ErrorException("No found.", 1);
			
		}
	}

}

?>
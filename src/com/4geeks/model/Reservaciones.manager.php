<?php

use Entity\Reservacion;
use Entity\Ticket;

require_once "src/com/4geeks/model/Base.manager.php";
require_once "src/com/4geeks/model/Equipos.manager.php";

class ReservacionesManager extends BaseManager
{

    public  function reserva($data)
	{
		$array_data = (array) $data;
		$result = array();

		//TODO: Al momento de crear este equipo hay que validar que los integrantes de este Equipo NO esten en otro equipo en la misma fecha
		//TODO: El que crea del equipo debe ser parte de los integrantes
		$datos_para_crear_equipo = array(
				"socio_id" => $_SESSION['user']->id,
				"integrantes" => $array_data["integrantes"]
			);
		$eqManager = new EquiposManager();
		$equipo = $eqManager->crearEquipo($datos_para_crear_equipo);

		$cont = 0;	
		foreach($array_data["horas_solicitadas"] as $hora)
		{
			$reservacion = new Reservacion();
			$reservacion->setEquipo($equipo);
			$reservacion->setSocio($equipo->getSocio());
			$reservacion->setFechaSolicitada($array_data["fecha"]." ".$hora);
			$reservacion->setEstatus("pendiente");
			$reservacion->setCreateDate("2009-03-10 01:01:01");// TODO: Tengo que colocar la fecha de hoy
			self::$EntityManager->persist($reservacion);

			$this->generarTicketsDeReservacion($reservacion, $equipo->getHandicapPromedio(), $cont);

			array_push($result,$reservacion);
			$cont++;
		}

		return $result;
	}

	public function generarTicketsDeReservacion($reservacion, $handicap, $prioridad)
	{
		$cantidadDeTickets = (25 - $handicap) + (8  - $prioridad);

		for ($i=0; $i < $cantidadDeTickets; $i++) { 
			$ticket = new Ticket();
			$ticket->setReservacion($reservacion);

			self::$EntityManager->persist($ticket);
		}
	}

	public function cambiarStatus($data)
	{
		$array_data = (array) $data;

		$reservacion = self::$EntityManager->find("Entity\Reservacion",$array_data['id']);
		$reservacion->setEstatus($array_data["estatus"]);
		self::$EntityManager->persist($reservacion);

		return $reservacion;
	}

    public  function listarPorFecha($data)
	{


		return array();
	}

    public  function getReservacionesSemana($numero_socio)
	{
		$start = date("YYYY-mm-dd h:i:s", strtotime( "previous monday" ));
		$end = date("YYYY-mm-dd h:i:s", strtotime( "next friday" ));

		//$qb = self::$EntityManager->createQuery('SELECT r FROM Reservacion JOIN r.equipo e JOIN e.integrantes i WHERE i.')
		$qb = self::$EntityManager->createQueryBuilder() 
		   ->select('r')
		   ->from('Entity\Reservacion', 'r')
		   ->where('r.estatus <> :status')
		   //->andWhere("r.equipo between :fecha1 and :fecha2")
		   ->andWhere("r.fecha_solicitada between :fecha1 and :fecha2")
		   ->setParameter("status","negada")
		   ->setParameter("fecha1",$start)
		   ->setParameter("fecha2",$end);
		$array = $qb->getQuery()->getResult(1);

		return $array;
	}

	/*

	Este es un metodo de prueba para que vean como trabajar con Doctrine

	public function test($data)
	{
	    require_once "src/com/4geeks/entities/User.php";

		$user = new User();
		$user->setEmail("Eres un pato...");
		self::$EntityManager->persist($user);
		self::$EntityManager->flush();

		return array();
	}

	*/

}

?>
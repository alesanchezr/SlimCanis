<?php

use Entity\Asignacion;

require_once "src/com/4geeks/model/Base.manager.php";

class AsignacionesManager extends BaseManager
{

	// POST route
	/**
	*	Entrada:
	*
	*	VACIO
	*
	**/
    public  function listarAsignaciones($data)
	{
		/*
		$result = array(
		    "success"  => true, 
		    "response" => array(
		        array(
		            "id" => 8, 
		            "fecha" => "1969-01-02 06:30:00", 
		            "estatus" => "pendiente", 
		            "equipo" => array(
		                "id" => 1,
		                "perfil_id" => 1, 
		                "handicap_promedio" => 12,
		                "integrantes" => array(
		                    array(
		                        "id" => 1,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(
		                            "username" => 1111,
		                            "email" => "1111@ccc.com"
		                        ),
		                        "numero_socio" => 1111,
		                        "handicap" => 12,
		                        "socio" => "NULL"
		                    ),
		                    array(
		                        "id" => 2,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(
		                            "username" => 2222,
		                            "email" => "2222@ccc.com"
		                        ),
		                        "numero_socio"=>2222,
		                        "handicap"=>10,
		                        "socio"=>"NULL"
		                    ),
		                    array(
		                        "id" => 3,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(),
		                        "numero_socio" => "NULL",
		                        "handicap" => 25,
		                        "socio" => 1111
		                    )
		                )
		            ),
		            "asignacion" => array()
		        ),
				array(
		            "id" => 8, 
		            "fecha" => "1969-01-02 06:30:00", 
		            "estatus" => "pendiente", 
		            "equipo" => array(
		                "id" => 1,
		                "perfil_id" => 1, 
		                "handicap_promedio" => 12,
		                "integrantes" => array(
		                    array(
		                        "id" => 1,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(
		                            "username" => 1111,
		                            "email" => "1111@ccc.com"
		                        ),
		                        "numero_socio" => 1111,
		                        "handicap" => 12,
		                        "socio" => "NULL"
		                    ),
		                    array(
		                        "id" => 2,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(
		                            "username" => 2222,
		                            "email" => "2222@ccc.com"
		                        ),
		                        "numero_socio"=>2222,
		                        "handicap"=>10,
		                        "socio"=>"NULL"
		                    ),
		                    array(
		                        "id" => 3,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(),
		                        "numero_socio" => "NULL",
		                        "handicap" => 25,
		                        "socio" => 1111
		                    )
		                )
		            ),
		            "asignacion" => array()
		        )
		    )
		);*/

		return $result;
	}

	// POST route
	/**
	*	Entrada:
	*
	*	VACIO
	*
	**/
    public  function sortear($data)
	{
		/*
		$result = array(
		    "success"  => true, 
		    "response" => array(
		        array(
		            "id" => 8, 
		            "fecha" => "1969-01-02 06:30:00", 
		            "estatus" => "pendiente", 
		            "equipo" => array(
		                "id" => 1,
		                "perfil_id" => 1, 
		                "handicap_promedio" => 12,
		                "integrantes" => array(
		                    array(
		                        "id" => 1,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(
		                            "username" => 1111,
		                            "email" => "1111@ccc.com"
		                        ),
		                        "numero_socio" => 1111,
		                        "handicap" => 12,
		                        "socio" => "NULL"
		                    ),
		                    array(
		                        "id" => 2,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(
		                            "username" => 2222,
		                            "email" => "2222@ccc.com"
		                        ),
		                        "numero_socio"=>2222,
		                        "handicap"=>10,
		                        "socio"=>"NULL"
		                    ),
		                    array(
		                        "id" => 3,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(),
		                        "numero_socio" => "NULL",
		                        "handicap" => 25,
		                        "socio" => 1111
		                    )
		                )
		            ),
		            "asignacion" => array()
		        )
		    )
		);
		*/
		return $result;
	}
	// POST route
	/**
	*	Entrada:
	*
	*	{
	*	    "perfil_id": 1, 
	*	    "equipo": { 
	*	        "id": 1,
	*	        "perfil": {
	*	            "id": 1,
	*	            "nombre": "Antonio Pérez",
	*	            "usuario": {
	*	                "username": 1111,
	*	                "email": "1111@ccc.com"
	*	            },
	*	            "numero_socio":1111,
	*	            "handicap":12,
	*	            "socio":"NULL"
	*	        }, 
	*	        "handicap_promedio": 12,
	*	        "integrantes": [ 
	*	            {
	*	                "id": 1,
	*	                "nombre": "Antonio Pérez",
	*	                "usuario": {
	*	                    "username": 1111,
	*	                    "email": "1111@ccc.com"
	*	                },
	*	                "numero_socio":1111,
	*	                "handicap":12,
	*	                "socio":"NULL"
	*	            },
	*	            {
	*	                "id": 2,
	*	                "nombre": "Antonio Pérez",
	*	                "usuario": {
	*	                    "username": 2222,
	*	                    "email": "2222@ccc.com"
	*	                },
	*	                "numero_socio":2222,
	*	                "handicap":10,
	*	                "socio":"NULL"
	*	            }
	*	        ]
	*	    },
	*	    "dia": "jueves", 
	*	    "fecha": "1969-01-01 06:30:00"
	*	}
	*
	**/
    public  function asignarHora($data)
	{
		$result = array(
		    "success"  => true, 
		    "response" => array(
		        array(
		            "id" => 1,
		            "perfil_id" => 1, 
		            "equipo" => 1,
		            "dia" => "jueves", 
		            "fecha" => "1969-01-01 06:30:00"
		        )
		    )
		);

		return $result;
	}



    public  function listarAsignacionesPorFecha($fecha)
	{

		$start = date("Y-m-d", strtotime( $fecha . " - 1 day" ));
		$end = date("Y-m-d", strtotime( $fecha . " + 1 day" ));

		$qb = self::$EntityManager->createQueryBuilder() 
		   ->select('r')
		   ->from('Entity\Reservacion', 'r')
		   ->where("r.fecha_solicitada between :fecha1 and :fecha2")
		   ->setParameter("fecha1",$start)
		   ->setParameter("fecha2",$end);
		$array = $qb->getQuery()->getResult(1);

		return $array;
	}


	// POST route
	/**
	*	Entrada:
	*
	*	{
	*	    "estatus": "confirmada",
	*	}
	*
	**/
    public function modificarStatus($data)
	{

		$array_data = (array) $data;

		$asignacion = self::$EntityManager->find("Entity\Asignacion",$array_data['id']);

		if(!$asignacion) throw new ErrorException("No se encuentra la asignacion", 1);

		$asignacion->setEstatus($array_data["estatus"]);
		self::$EntityManager->persist($asignacion);

		return $asignacion;

	}

	// POST route
	/**
	*	Entrada:
	*
	*	{
	*	    "id": 1,
	*	    "cadi_id": 1
	*	}
	*
	**/

    public  function iniciarJuego($data)
	{
		$array_data = (array) $data;
		/*
		agrego el cadi
		actualizo la hora de inicio
		coloco quien edito la asignacion
		 */
		
		$cadi = self::$EntityManager->find("Entity\Cadi",$array_data['cadi_id']);
		$asignacion = self::$EntityManager->find("Entity\Asignacion",$array_data['id']);

		if(!$asignacion) throw new ErrorException("La asignacion es invalida.", 1);
		if(!$cadi) throw new ErrorException("El cadi no existe.", 1);
		
		$asignacion->setCadi($cadi);
		$asignacion->setFechaInicio("2009-01-01 08:50:00");
		$asignacion->setEditadoPor($_SESSION["user"]->id);
		self::$EntityManager->persist($asignacion);

		return $asignacion;
	}

	/**
	*	Entrada:
	*
	*	{
    *		"id": 1,
	*	}
	*
	**/

    public  function terminarJuego($data)
	{
		$array_data = (array) $data;

		$asignacion = self::$EntityManager->find("Entity\Asignacion",$array_data['id']);

		if(!$asignacion) throw new ErrorException("La asignacion es invalida.", 1);
		
		$asignacion->setFechaFin("2009-01-01 08:50:00");
		$asignacion->setEditadoPor($_SESSION["user"]->id);
		self::$EntityManager->persist($asignacion);

		return $asignacion;
	}

	public function sorteo($data){
		/*
			Base times:
			00:00 am 	(Received)
			6:30 am 	(Minor point)
			11:10 am 	(Major point)
		*/
		$baseInit = strtotime($data)+23400; //6:30
		$baseEnd = $baseInit+16800; //11:10
		$lessEnd = $lessInit = 0;//Big numbers for initial validations
		echo "\n";
		$init = strtotime($data)+24000;//+23400;
		echo "\n";
		$inicio = date("Y-m-d\Th:i:s",$init);
		$fin = $init+15600;//+16800
		$fin = date("Y-m-d\Th:i:s",$fin);
		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('s')
		   ->from('Entity\FechaOcupada', 's')
		   ->where('(s.fecha_inicio <= :inicio AND :inicio <= s.fecha_fin AND :fin >= s.fecha_fin) 
		   		 OR (s.fecha_inicio >= :inicio AND :fin >= s.fecha_inicio AND :fin <= s.fecha_fin)
		   		 OR (s.fecha_inicio >= :inicio AND :fin >= s.fecha_fin)
		   		 ')
		   ->setParameter("inicio",$inicio)
		   ->setParameter("fin",$fin);
		$array = $qb->getQuery()->getResult(2);

		if (count($array) > 0) {
			$lessEnd = $lessInit = 10000000000000;//Big numbers for initial validations

			foreach ($array as $key => $evento) {
				if (abs( strtotime($evento["fecha_inicio"]) - $baseInit) < $lessInit) {
					$lessInit = ( strtotime($evento["fecha_inicio"]) - $baseInit);
				}
				if ($baseEnd - strtotime($evento["fecha_fin"]) < $lessEnd) {
					$lessEnd = $baseEnd - strtotime($evento["fecha_fin"]);
				}
			}

			if ($baseEnd<0) {
				$baseEnd = 0;
			}
		}

		$temp = $baseInit;
		for ($i=0; $i < ( ($lessInit) / 600); $i++) {
			self::getSorteoParaHora($temp);
			$temp = $temp+600;
		}

		$temp = $baseEnd-$lessEnd;
		for ($i=0; $i < ( ($lessEnd+600) / 600); $i++) {
			self::getSorteoParaHora($temp);
			$temp = $temp+600;
		}

		//print_r($array);

		//return $array;
	}

	public function getSorteoParaHora($hora){
		$handicap = array();
		array_push($handicap, array(0 => 0,1 => 8));
		array_push($handicap, array(0 => 9,1 => 12));
		array_push($handicap, array(0 => 13,1 => 18));
		array_push($handicap, array(0 => 19,1 => 25));

		for ($i=0; $i < 4; $i++) { //4 Conjuntos de handicap (0-8,9-12,13-18,19-)
			$qb = self::$EntityManager->createQuery('SELECT COUNT(t) FROM Entity\Ticket t LEFT JOIN t.reservacion r LEFT JOIN r.equipo e WHERE r.fecha_solicitada = ?1 AND e.handicap_promedio between ?2 AND ?3');
			$qb->setParameter(1, date('Y-m-d\Th:i:s', $hora));
			$qb->setParameter(2,$handicap[$i][0]);
			$qb->setParameter(3,$handicap[$i][1]);
			$array = $qb->getResult(2);

			if ($array[0][1]>0) {
				//echo "\n";
				//echo "\n";
				//echo "COUNT: ".$array[0][1];
				//echo "\n";
				//echo "Random: ".rand(1,$array[0][1]);
				$offset = rand(1,$array[0][1])-1;
				echo "\n";

				$qb = self::$EntityManager->createQuery('SELECT t FROM Entity\Ticket t LEFT JOIN t.reservacion r LEFT JOIN r.equipo e WHERE r.fecha_solicitada = ?1 AND e.handicap_promedio between ?2 AND ?3');
				$qb->setParameter(1, date('Y-m-d\Th:i:s', $hora));
				$qb->setParameter(2,$handicap[$i][0]);
				$qb->setParameter(3,$handicap[$i][1]);
				$qb->setMaxResults(1);
				$qb->setFirstResult($offset);

				$array2 = $qb->getResult();

				foreach ($array2 as $key => $ticketSelected) {
					echo "Equipo seleccionado para el salir (".date("Y-m-d\Th:i:s",$hora)."): ".$ticketSelected->getReservacion()->getEquipo()->getId();	
				}
			}/*else{
				echo "\n";
				echo "Equipo seleccionado para el salir (".date("Y-m-d\Th:i:s",$hora)."): N/A";

			}*/
		}
		if ($notFound) return null;
		
	}

	public function getSorteoParaHoraSimple($hora,$seleccionados){

		$notFound = true;
		
		$qb = self::$EntityManager->createQuery("SELECT COUNT(r) FROM Entity\Reservacion r LEFT JOIN r.equipo e WHERE r.fecha_solicitada = ?1 AND r.estatus = 'pendiente' ");
		$qb->setParameter(1, date('Y-m-d\Th:i:s', $hora));
		$array = $qb->getResult(2);

		if ($array[0][1]>0) {
			//echo "\n";
			//echo "\n";
			//echo "COUNT: ".$array[0][1];
			//echo "\n";
			//echo "Random: ".rand(1,$array[0][1]);
			$offset = rand(1,$array[0][1])-1;
			//echo "\n";

			$qb = self::$EntityManager->createQuery("SELECT r FROM Entity\Reservacion r LEFT JOIN r.equipo e WHERE r.fecha_solicitada = ?1 AND r.estatus = 'pendiente' ");
			$qb->setParameter(1, date('Y-m-d\Th:i:s', $hora));
			$qb->setMaxResults(1);
			$qb->setFirstResult($offset);

			$array2 = $qb->getResult();

			$notFound =false;

			//self::eraseTickets($ticketSelected->getReservacion()->getId());

			return $ticketSelected->getReservacion();//$ticketSelected->getReservacion()->getEquipo()->getId();

			break;
		}/*else{
			echo "\n";
			echo "Equipo seleccionado para el salir (".date("Y-m-d\Th:i:s",$hora)." - handicap ".$handicap[$i][0]."-".$handicap[$i][1].")): N/A";

		}*/
	
		if ($notFound) return null;
		
	}

	public function eraseTickets($reservacionId)
	{	
		$qb = self::$EntityManager->createQuery('SELECT t FROM Entity\Ticket t WHERE t.reservacion = ?1');
		$qb->setParameter(1, $reservacionId);

		$array2 = $qb->getResult();
		//echo "\n Array de Tickets\n";
		//print_r($array2);

		foreach ($array2 as $key => $ticket) {
			self::$EntityManager->remove($ticket);
			self::$EntityManager->flush();
			echo "Borrado: ".$ticket->getId();
		}
	}

	public function wrapAsignacionFromSorteo($hoyo, $hora, $equipo){
		if ($equipo != null) {
			return array('horario' => $hora, 'hoyo' => $hoyo, 'reservacion' => $equipo);
		}else{
			return null;
		}
		
	}
}

?>
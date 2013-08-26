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
    public  function generarAsignaciones($data)
	{
		$asignaciones = self::sorteo($data);
		$result = array();
		foreach ($asignaciones as $key => $asignacion) {
			$newAsignacion = new Asignacion();
			$newAsignacion->setReservacion($asignacion["reservacion"]);
			$newAsignacion->setEquipo($asignacion["reservacion"]->getEquipo());
			$newAsignacion->setSocio($asignacion["reservacion"]->getEquipo()->getSocio());
			$newAsignacion->setFechaAsignada($asignacion["horario"]);
			$newAsignacion->setHoyo($asignacion["hoyo"]);
			$newAsignacion->setEstatus("pendiente");

			self::$EntityManager->persist($newAsignacion);
			array_push($result, $newAsignacion);
		}

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
	*	    "fecha_inicio": "1961-01-02 06:30:32",
	*	    "cadi": "Raúl Pérez",
	*	    "editado_por": "amilano"
	*	}
	*
	**/

    public  function iniciarJuego($data)
	{

		/*
		$result = array(
		    "success"  => true, 
		    "response" => array(
	            array(
	            "id" => 1,
	            "fecha_asignada" => "1969-01-01 08:50:00",
	            "fecha_inicio" => "1961-01-02 06:30:32",
	            "fecha_fin" => "0000-00-00 00:00:00",
	            "estatus" => "confirmada",
	            "hoyo" => 10,
	            "reservacion" => array(
	                "id" => 1, 
	                "fecha" => "1969-01-01 06:30:00", 
	                "estatus" => "asignada"
	                "equipo" => array( 
	                    "id" => 1,
	                    "perfil_id" => 1111, 
	                    "handicap_promedio" => 12,
	                    "integrantes" => array( 
	                        array("perfil_id" => 1111),
	                        array("perfil_id" => 2222),
	                        array("perfil_id" => 3333)
	                    )
	                )
	            ),
		    )
		);

		return $result;*/
	}

	/**
	*	Entrada:
	*
	*	{
    *		"fecha_fin": "1961-01-02 08:33:12",
    *		"editado_por": "amilano"
	*	}
	*
	**/

    public  function terminarJuego($data)
	{
		/*
		$result = array(
		    "success"  => true, 
		    "response" => array(
	            "id" => 1,
	            "fecha_asignada" => "1969-01-01 08:50:00",
	            "fecha_inicio" => "0000-00-00 00:00:00",
	            "fecha_fin" => "1961-01-02 08:33:17",
	            "estatus" => "confirmada",
	            "hoyo" => 10,
	            "reservacion" => array(
	                "id" => 1, 
	                "fecha" => "1969-01-01 06:30:00", 
	                "estatus" => "negada"
	                "equipo" => array( 
	                    "id" => 1,
	                    "perfil_id" => 1111, 
	                    "handicap_promedio" => 12,
	                    "integrantes" => array( 
	                        array("perfil_id" => 1111),
	                        array("perfil_id" => 2222),
	                        array("perfil_id" => 3333)
	                    )
	                )
	            )
		    )
		);*/

		return $result;
	}

	public function sorteo($data){

		$result = array();
		$seleccionados = array(0=>0);

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

			$temp = $baseInit;
			for ($i=0; $i < ( ($lessInit) / 600); $i++) {

				$baseEndHoyos = $baseInit+7800; //8:40
				$hoyos = 1;
				if ($temp <= $baseEndHoyos) {
					echo "\n".date('Y-m-d\Th:i:s', $temp)." menor a 8:40 \n";
					$hoyos = 2;
				}

				for ($j=0; $j < $hoyos; $j++) { 
					$ss = self::getSorteoParaHora($temp, $seleccionados);
					if ($ss >0) {
						array_push($result, self::wrapAsignacionFromSorteo($j,date("Y-m-d\Th:i:s",$temp),$ss));//array("hoyo ".$j." ".date("Y-m-d\Th:i:s",$temp) => $ss));
						//array_push($seleccionados, $ss);
					}
					
					//echo "\n";
				}	
					$temp = $temp+600;
			}

			$temp = $baseEnd-$lessEnd;
			for ($i=0; $i < ( $lessEnd / 600); $i++) {
				//array_push($result, array("".date("Y-m-d\Th:i:s",$temp) => self::getSorteoParaHora($temp)));
				//echo "\n";
				$ss = self::getSorteoParaHora($temp, $seleccionados);
				if ($ss >0) {
					array_push($result, self::wrapAsignacionFromSorteo(1,date("Y-m-d\Th:i:s",$temp),$ss));//array("hoyo 0 ".date("Y-m-d\Th:i:s",$temp) => $ss));
					//array_push($seleccionados, $ss);
				}
				$temp = $temp+600;
			}
		}else{
			$temp = $baseInit;
			for ($i=0; $i <= ( ($baseEnd-$baseInit) / 600); $i++) {
				$baseEndHoyos = $baseInit+7800; //8:40
				$hoyos = 1;
				if ($temp <= $baseEndHoyos) {
					//echo "\n".date('Y-m-d\Th:i:s', $temp)." menor a 8:40 \n";
					$hoyos = 2;
				}

				for ($j=0; $j < $hoyos; $j++) { 
					$ss = self::getSorteoParaHora($temp, $seleccionados);
					if ($ss >0) {
						array_push($result, self::wrapAsignacionFromSorteo($j,date("Y-m-d\Th:i:s",$temp),$ss));//array("hoyo ".$j." ".date("Y-m-d\Th:i:s",$temp) => $ss));
						//array_push($seleccionados, $ss);
					}
				}
				$temp = $temp+600;
			}	
		}

		print_r($result);

		//return $array;
	}

	public function getSorteoParaHora($hora,$seleccionados){
		//echo "\n Seleccionados tiene :\n";
		//print_r($seleccionados);
		//echo "\n";

		$handicap = array();
		array_push($handicap, array(0 => 0,1 => 8));
		array_push($handicap, array(0 => 9,1 => 12));
		array_push($handicap, array(0 => 13,1 => 18));
		array_push($handicap, array(0 => 19,1 => 25));
		$notFound = true;
			
		for ($i=0; $i < 4; $i++) { //4 Conjuntos de handicap (0-8,9-12,13-18,19-)

			$qb = self::$EntityManager->createQuery("SELECT COUNT(t) FROM Entity\Ticket t LEFT JOIN t.reservacion r LEFT JOIN r.equipo e WHERE r.fecha_solicitada = ?1 AND r.estatus = 'pendiente' AND e.handicap_promedio between ?2 AND ?3");
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
				//echo "\n";

				$qb = self::$EntityManager->createQuery("SELECT t FROM Entity\Ticket t LEFT JOIN t.reservacion r LEFT JOIN r.equipo e WHERE r.fecha_solicitada = ?1 AND r.estatus = 'pendiente' AND e.handicap_promedio between ?2 AND ?3");
				$qb->setParameter(1, date('Y-m-d\Th:i:s', $hora));
				$qb->setParameter(2,$handicap[$i][0]);
				$qb->setParameter(3,$handicap[$i][1]);
				$qb->setMaxResults(1);
				$qb->setFirstResult($offset);

				$array2 = $qb->getResult();

				foreach ($array2 as $key => $ticketSelected) {
					//echo "Equipo seleccionado para el salir (".date("Y-m-d\Th:i:s",$hora)." - handicap ".$handicap[$i][0]."-".$handicap[$i][1]."): ".$ticketSelected->getReservacion()->getEquipo()->getId();	
				}
				$notFound =false;
				self::eraseTickets($ticketSelected->getReservacion()->getId());

				return $ticketSelected->getReservacion();//$ticketSelected->getReservacion()->getEquipo()->getId();

				break;
			}/*else{
				echo "\n";
				echo "Equipo seleccionado para el salir (".date("Y-m-d\Th:i:s",$hora)." - handicap ".$handicap[$i][0]."-".$handicap[$i][1].")): N/A";

			}*/
		}
		if ($notFound) return 0;
		
	}

	public function eraseTickets($reservacionId)
	{	
		$qb = self::$EntityManager->createQuery('SELECT t FROM Entity\Ticket t WHERE t.reservacion = ?1');
		$qb->setParameter(1, $reservacionId);

		$array2 = $qb->getResult();
		echo "\n Array de Tickets\n";
		//print_r($array2);

		foreach ($array2 as $key => $ticket) {
			self::$EntityManager->remove($ticket);
			self::$EntityManager->flush();
			echo "Borrado: ".$ticket->getId();
		}
	}

	public function wrapAsignacionFromSorteo($hoyo, $hora, $equipo){
		if ($equipo != 0) {
			return array('horario' => $hora, 'hoyo' => $hoyo, 'reservacion' => $equipo);
		}else{
			return null;
		}
		
	}
}

?>
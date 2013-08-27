<?php

	require_once 'src/com/4geeks/model/Asignaciones.manager.php';


	// POST route
	/**
	*	Entrada:
	*
	*	{
	*		"id" : 1,
	*	    "estatus": "rechazada",
	*	}
	*
	**/
	$app->post('/asignaciones/cambiar_estatus', $authenticate($app), function() use ($app){

		try
		{
			$data = json_decode($app->request()->getBody());

			$asignacionesManager = new AsignacionesManager();
			$result = $asignacionesManager->modificarStatus($data);
			
			AsignacionesManager::$EntityManager->flush();
		    $app->render(200,Utils::renderResult($result->toArray()));
		}
		catch (ErrorException $e)
		{
			$app->render(200,Utils::renderFault($e->getMessage()));
		}

	});

		
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

	$app->post('/asignaciones/iniciar_juego', $authenticate($app), function() use ($app){

		try
		{
			$data = json_decode($app->request()->getBody());

			$asignacionesManager = new AsignacionesManager();
			$asignacion = $asignacionesManager->iniciarJuego($data);

			AsignacionesManager::$EntityManager->flush();
		    $app->render(200,Utils::renderResult($asignacion->toArray()));
		}
		catch (ErrorException $e)
		{
			$app->render(200,Utils::renderFault($e->getMessage()));
		}


	});

		
	// POST route
	/**
	*	Entrada:
	*
	*	{
	*	    "id": 1
	*	}
	*
	**/

	$app->post('/asignaciones/terminar_juego', $authenticate($app), function() use ($app){

		try
		{
			$data = json_decode($app->request()->getBody());

			$asignacionesManager = new AsignacionesManager();
			$asignacion = $asignacionesManager->terminarJuego($data);

			AsignacionesManager::$EntityManager->flush();
		    $app->render(200,Utils::renderResult($asignacion->toArray()));
		}
		catch (ErrorException $e)
		{
			$app->render(200,Utils::renderFault($e->getMessage()));
		}


	});

	// POST route
	/**
	*	Entrada:
	*
	*	VACIO
	*
	**/

	$app->get('/asignaciones/fecha/:fecha', $authenticate($app), function($fecha) use ($app){

		try
		{
			$data = json_decode($app->request()->getBody());

			$asignacionesManager = new AsignacionesManager();
			$result = $asignacionesManager->listarAsignacionesPorFecha($fecha);

			$arrayAsignaciones = array();
			foreach ($result as $asignacion) {
				array_push($arrayAsignaciones, $asignacion->toArrayMin());
			}

		    $app->render(200,Utils::renderResult($arrayAsignaciones));

		}
		catch (ErrorException $e)
		{
			$app->render(200,Utils::renderFault($e->getMessage()));
		}

	});

	// POST route
	/**
	*	Entrada:
	*
	*	VACIO
	*
	**/

	$app->post('/asignaciones/:fecha/sortear', $authenticate($app), function($fecha) use ($app){

		$data = json_decode($app->request()->getBody());

		$asignacionesManager = new AsignacionesManager();
		$result = $asignacionesManager->asignarHora($data);

	    $app->render(200,$result);

	});

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
	$app->post('/asignaciones/:fecha/asignar_hora_disponible', $authenticate($app), function($fecha) use ($app){

		$data = json_decode($app->request()->getBody());

		$asignacionesManager = new AsignacionesManager();
		$result = $asignacionesManager->asignarHora($data);

	    $app->render(200,$result);

	});
	

	$app->get('/asignaciones/sortear/:fecha', function($fecha) use ($app){
		
		try{
			$manager = new AsignacionesManager();
			//$equipos = $equiposManager->sorteo($fecha);
			$asignaciones = $manager->generarAsignaciones($fecha);

			$result = array();

			foreach ($asignaciones as $key => $asignacion) {

				$asig = array(
							"id" => $asignacion->getId(),
				            "fecha_asignada" => $asignacion->getFechaAsignada(),
				            "fecha_inicio" => $asignacion->getFechaInicio(),
				            "fecha_fin" => $asignacion->getFechaFin(),
				            "estatus" => $asignacion->getEstatus(),
				            "hoyo" => $asignacion->getHoyo(),
				            "reservacion" => array(
				                "id" => $asignacion->getReservacion()->getId(), 
				                "fecha" => $asignacion->getReservacion()->getFechaSolicitada(), 
				                "estatus" => $asignacion->getReservacion()->getEstatus(),
				                "equipo" => array(
				                    "id" => $asignacion->getReservacion()->getEquipo()->getId(),
				                    "socio" => array(
				                        "id" => $asignacion->getReservacion()->getEquipo()->getSocio()->getId(),
				                        "nombre" => $asignacion->getReservacion()->getEquipo()->getSocio()->getNombre(),
				                        "numero_socio" => $asignacion->getReservacion()->getEquipo()->getSocio()->getNumeroSocio(),
				                        "handicap" => $asignacion->getReservacion()->getEquipo()->getSocio()->getHandicap()
				                    ), 
				                    "handicap_promedio" => $asignacion->getReservacion()->getEquipo()->getHandicapPromedio(),
				                    "integrantes" => array()
				                )
				            )
						);
				foreach ($asignacion->getReservacion()->getEquipo()->getIntegrantes() as $key => $integrante) {

					$integ = array();
					if ($integrante->getSocio() != null) {
						$integ = array(
								"id"=> $integrante->getSocio()->getId(),
								"nombre"=> $integrante->getSocio()->getNombre(),
								"numero_socio"=> $integrante->getSocio()->getNumeroSocio(),
								"handicap"=> $integrante->getSocio()->getHandicap(),
								"tipo"=> "socio"
							);
					}else{
						$integ = array(
								"id"=> $integrante->getInvitado()->getId(),
								"nombre"=> $integrante->getInvitado()->getNombre(),
								"cedula"=> $integrante->getInvitado()->getCedula(),
								"handicap"=> $integrante->getInvitado()->getHandicap(),
								"tipo"=> "invitado"
							);
					}
					//array_push($eq["integrantes"], $integ);
					array_push($asig["reservacion"]["equipo"]["integrantes"], $integ);
				}
				array_push($result, $asig);
			}

			//print_r($result);
			//$app->render(200,Utils::renderResult(equiposParser($equipos)));
			//AsignacionesManager::$EntityManager->flush();
			$app->render(200,Utils::renderResult($result));
		}catch(ErrorException $e){
			$app->render(200,Utils::renderFault($e->getMessage()));
		}
	});

?>
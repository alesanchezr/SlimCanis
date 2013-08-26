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

	$app->post('/asignaciones/:fecha', $authenticate($app), function($fecha) use ($app){

		$data = json_decode($app->request()->getBody());

		$asignacionesManager = new AsignacionesManager();
		$result = $asignacionesManager->listarAsignaciones($data);

	    $app->render(200,$result);

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
		//try{
			$equiposManager = new AsignacionesManager();
			$equipos = $equiposManager->sorteo($fecha);

			//print_r($equipos);
			//$app->render(200,Utils::renderResult(equiposParser($equipos)));
		//}catch(ErrorException $e){
			//$app->render(200,Utils::renderFault($e->getMessage()));
		//}
	});

?>
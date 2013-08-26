<?php

	require_once 'src/com/4geeks/model/Asignaciones.manager.php';


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

	// POST route
	/**
	*	Entrada:
	*
	*	{
	*	    "estatus": "confirmada",
	*	}
	*
	**/
	$app->post('/asignaciones/:id/cambiar_estatus', $authenticate($app), function($id) use ($app){

		$data = json_decode($app->request()->getBody());

		$asignacionesManager = new AsignacionesManager();
		$result = $asignacionesManager->modificarSatus($data);

	    $app->render(200,$result);

	});
		
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

	$app->post('/asignaciones/:id/iniciar_juego', $authenticate($app), function($id) use ($app){

		$data = json_decode($app->request()->getBody());

		$asignacionesManager = new AsignacionesManager();
		$result = $asignacionesManager->iniciarJuego($data);

	    $app->render(200,$result);

	});
	
	// POST route
	/**
	*	Entrada:
	*
	*	{
    *		"fecha_fin": "1961-01-02 08:33:12",
    *		"editado_por": "amilano"
	*	}
	*
	**/

	$app->post('/asignaciones/:id/terminar_juego', $authenticate($app), function($id) use ($app){

		$data = json_decode($app->request()->getBody());

		$asignacionesManager = new AsignacionesManager();
		$result = $asignacionesManager->terminarJuego($data);

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
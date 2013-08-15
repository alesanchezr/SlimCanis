<?php

	require_once 'src/com/4geeks/model/Fechas.manager.php';

	// POST route
	$app->get('/fechas(/:fecha)', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$fechasManager = new FechasManager();
		$result = $fechasManager->listarDisponible($data);

	    $app->render(200,$result);

	});
	
	// POST route
	/*

		{ 
		    "fecha_inicio": "2013-03-06 06:30:00",
		    "fecha_fin": "2013-03-07 08:30:00",
		    "motivo": "Torneo Infantil"
		}

	*/
	$app->post('/fechas', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$fechasManager = new FechasManager();
		$result = $fechasManager->creaHorarioIndicado($data);

	    $app->render(200,$result);

	});

?>
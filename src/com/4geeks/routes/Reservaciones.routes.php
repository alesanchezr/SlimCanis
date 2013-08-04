<?php

	require_once 'src/com/4geeks/model/Reservaciones.manager.php';

		// POST route
	$app->post('/reservaciones', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$reservacionesManager = new ReservacionesManager();
		$result = $reservacionesManager->reserva($data);

	    $app->render(200,$result);

	});

	// POST route
	$app->post('/reservaciones/:golfista_id(/:fecha_inicio/:fecha_fin)', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$reservacionesManager = new ReservacionesManager();
		$result = $reservacionesManager->reserva($data);

	    $app->render(200,$result);

	});

	/*

	Este es un ejemplo de uso de routing con slim
	
	// POST route
	$app->get('/reservaciones/test', function() use ($app){

		$data = json_decode($app->request()->getBody());

		$reservacionesManager = new ReservacionesManager();
		$result = $reservacionesManager->test($data);

	    $app->render(200,$result);

	});

	*/

?>
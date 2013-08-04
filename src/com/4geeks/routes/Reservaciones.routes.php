<?php

	require_once 'src/com/4geeks/model/Reservaciones.manager.php';

		// POST route
	$app->get('/reservaciones/test', function() use ($app){

		$data = json_decode($app->request()->getBody());

		$reservacionesManager = new ReservacionesManager();
		$result = $reservacionesManager->test($data);

	    $app->render(200,$result);

	});
	
		// POST route
	$app->post('/reservaciones', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$reservacionesManager = new ReservacionesManager();
		$result = $reservacionesManager->reserva($data);

	    $app->render(200,$result);

	});

?>
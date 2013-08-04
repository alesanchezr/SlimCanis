<?php

	require_once 'src/com/4geeks/model/Golfista.manager.php';

	// POST route

	/*
		ENTRADA:

		VACIO

	*/
	$app->post('/golfistas(/:tipo)', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$gfManager = new GolfistaManager();
		$result = $gfManager->listar($data);

	    $app->render(200,$result);

	});

	// POST route

	/*
		ENTRADA:

		VACIO

	*/
	$app->post('/golfistas/invitados/:golfista_id', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$gfManager = new GolfistaManager();
		$result = $gfManager->listarInvitados($data);

	    $app->render(200,$result);

	});

	// POST route

	/*
		ENTRADA:

		{
		    "usuario_id":1,
		    "numero_socio":1111,
		    "handicap":12,
		    "socio":"NULL"
		}

	*/
	$app->post('/golfistas', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$gfManager = new GolfistaManager();
		$result = $gfManager->crear($data);

	    $app->render(200,$result);

	});


?>
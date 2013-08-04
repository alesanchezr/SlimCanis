<?php

	// POST route
	$app->get('/equipos', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$equiposManager = new EquiposManager();
		$result = $equiposManager->crearEquipo($data);

	    $app->render(200,$result);

	});

?>
<?php

	require_once 'src/com/4geeks/model/Equipos.manager.php';

	$app->get('/equipos/por_perfil/:id', $authenticate($app), function($id) use ($app){

		$equiposManager = new EquiposManager();
		$result = $equiposManager->getEquipos($id);

		$app->render(200,$result);

	});
		// POST route
	$app->post('/equipos', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$equiposManager = new EquiposManager();
		$result = $equiposManager->crearEquipo($data);

	    $app->render(200,$result);

	});

?>
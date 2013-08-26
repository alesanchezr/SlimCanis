<?php

	require_once 'src/com/4geeks/model/Busqueda.manager.php';

	/*
		ENTRADA:

		VACIO

	*/
	$app->post('/buscar_socios', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$manager = new BusquedaManager();
		$result = $manager->buscar($data);

	    $app->render(200,$result);

	});


?>
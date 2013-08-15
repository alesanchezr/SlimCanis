<?php

	require_once 'src/com/4geeks/model/Equipos.manager.php';

	//$app->get('/equipos/por_golfista/:id', $authenticate($app), function($id) use ($app){
	$app->get('/equipos/por_socio/:id', function($id) use ($app){

		try {
			$equiposManager = new EquiposManager();
			$result = $equiposManager->getEquipos($id);
			$app->render(200,$result);

		} catch (Exception $e) {
			$result = array(
					    "success"  => false, 
					    "response" => array(
					    	"message" => $e->getMessage()
					    	)
					);

			$app->render(201,$result);
		}

		//$app->render(200,$result);

	});
		// POST route
	$app->post('/equipos', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$equiposManager = new EquiposManager();
		$result = $equiposManager->crearEquipo($data);

	    $app->render(200,$result);

	});

?>
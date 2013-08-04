<?php

	require_once 'src/com/4geeks/model/Equipos.manager.php';

	$app->get('/equipos/por_golfista/:id', $authenticate($app), function($id) use ($app){

		try {
			$equiposManager = new EquiposManager();
			$result = $equiposManager->getEquipos($id);
			
		} catch (Exception $e) {
			$result = array(
					    "success"  => false, 
					    "response" => array(
					    	"message" => "No se encontraron equipos para este Socio."
					    	)
					);

			$app->render(204,$result);
		}

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
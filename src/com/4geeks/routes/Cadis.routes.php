<?php

	require_once 'src/com/4geeks/model/Cadis.manager.php';
	require_once 'src/com/4geeks/model/Equipos.manager.php';

	// POST route

	/*
		ENTRADA:

		{ 
		    "id": 1, 
		    "nombre": "Raúl Pérez",
		    "cedula": 21394532,
		    "telefono": "04123243465"
		}

	*/
	$app->post('/cadis', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		try
		{
			$cadiManager = new CadiManager();
			$cadi = $cadiManager->agregar($data);

			CadiManager::$EntityManager->flush();
		    $app->render(200,Utils::renderResult($cadi->toArray()));
		}
		catch (ErrorException $e) {
			
			$app->render(200,Utils::renderFault($e->getMessage()));
		}


	});

	// POST route

	$app->get('/cadis', $authenticate($app), function() use ($app){

		try {

			$manager = new CadiManager();
			$cadis = $manager->listar();

			$result = array();
			foreach ($cadis as $cadi) {
				array_push($result, $cadi->toArray());
			}

	    	$app->render(200,Utils::renderResult($result));

		} catch (ErrorException $e) {
			
			$app->render(200,Utils::renderFault($e->getMessage()));
		}
		

	});


?>
<?php

	require_once 'src/com/4geeks/model/Integrantes.manager.php';
	require_once 'src/com/4geeks/model/Equipos.manager.php';

	// POST route

	/*
		ENTRADA:

		{
		    "equipo": 1,
		    "integrante": {
		        "id":1,
		        "tipo": "socio"
		    }
		}

	*/
	$app->post('/integrantes', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		try
		{
			$eqManager = new EquiposManager();
			$equipo = $eqManager->agregarIntegrante($data);

			EquiposManager::$EntityManager->flush();
		    $app->render(200,Utils::renderResult($equipo->toArray()));
		}
		catch (ErrorException $e) {
			
			$app->render(200,Utils::renderFault($e->getMessage()));
		}


	});

	// POST route

	/*
		ENTRADA:
		{
		    "nombre": "Manuel Pereira",
		    "cedula":21841933,
		    "email": "manupe@hotmail.com",
		    "telefono": "04142334223"
		}
	*/

	//$app->post('/socios', $authenticate($app), function() use ($app){
	$app->delete('/integrantes/:id', $authenticate($app), function($id) use ($app){

		$manager = new IntegrantesManager();

		try {
			$result = $manager->eliminar($id);

			IntegrantesManager::$EntityManager->flush();
	    	$app->render(200,Utils::renderResult($result));

		} catch (ErrorException $e) {
			
			$app->render(200,Utils::renderFault($e->getMessage()));
		}
		

	});


?>
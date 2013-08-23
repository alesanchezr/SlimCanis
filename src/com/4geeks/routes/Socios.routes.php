<?php

	require_once 'src/com/4geeks/model/Socios.manager.php';

	// POST route

	/*
		ENTRADA:

		VACIO

	*/
	//$app->get('/socio', $authenticate($app), function() use ($app){
	$app->get('/socios', function() use ($app){

		$socioManager = new SociosManager();
		$result = $socioManager->listar();

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

		SALIDA:

		$result = array(
			            "nombre": "Bernardo Belutini",
			            "cedula": 5329429,
			            "numero_socio":1111,
			            "handicap": 12,
			            "user": array(
			                "id": 1, 
			                "username": 123456, 
			                "password": "dRs32sdlaSAds",
			                "email": "1111@ccc.com",
			                "role": array( 
			                    "id": 1,
			                    "nombre": "socio"
			                ),
			                "createdate": "1969-01-01T01:00:01"
			            ),
			            "createdate": "1969-01-01T01:01:01"
				);
	*/

	//$app->post('/socios', $authenticate($app), function() use ($app){
	$app->post('/socios', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$gfManager = new SociosManager();

		try {
			$socio = $gfManager->crear($data);

			$result = array(
			            "nombre" => $socio->getName(),
			            "cedula" => $socio->getCedula(),
			            "numero_socio" => $socio->getNumeroSocio(),
			            "handicap" => $socio->getHandicap(),
			            "user" => array(
			                "id" => $socio->user->getId(), 
			                "username" => $socio->user->getUsername(), 
			                "password" => $socio->user->getPassword(),
			                "email" => $socio->user->getEmail(),
			                "role" => array( 
			                    "id" => $socio->user->role->getId(),
			                    "nombre"=> $socio->user->role->getNombre()
			                ),
			                "createdate" => $socio->user->getCreateDate()
			            ),
			            "createdate" => $socio->getCreateDate()
					);

	    	$app->render(200,Utils::renderResult($result));

		} catch (Exception $e) {
			
			$app->render(200,Utils::renderFault($e->getMessage()));
		}
		

	});

?>
<?php

	require_once 'src/com/4geeks/model/Socios.manager.php';

	/*
		ENTRADA:

		VACIO

		SALIDA:

		{ 
		    "success": true, 
		    "response": [
		        {
		            "id": 1,
		            "nombre": "Bernardo Belutini",
		            "cedula": 5329429,
		            "user_id":1,
		            "numero_socio":1111,
		            "handicap":12,
		            "createdate": "1969-01-01T01:01:01"
		        },
		        {
		            "id": 2,
		            "nombre": "Pepito Montalbán",
		            "cedula": 93029301
		            "user_id":2,
		            "numero_socio":2222,
		            "handicap":5,
		            "createdate": "1969-01-01T01:01:01"
		        }
		    ]
		}
	*/

	//$app->get('/socio', $authenticate($app), function() use ($app){
	$app->get('/socios', function() use ($app){

		try{
			$socioManager = new SociosManager();
			$socios = $socioManager->listar();

			$result = array();

			foreach ($socios as $key => $value) {
				$socio = "";
				$socio = array(
					"id" => utf8_encode($value["id"]),
					"user_id" => utf8_encode($value["user_id"]),
					"nombre" => utf8_encode($value["nombre"]),
					"cedula" => utf8_encode($value["cedula"]),
					"numero_socio" => utf8_encode($value["numero_socio"]),
					"handicap" => utf8_encode($value["handicap"]),
					"createdate" => "".date("Y-m-d\Th:i:s",strtotime($value["createdate"]))
					);
				array_push($result, $socio);
			}

		    $app->render(200,Utils::renderResult($result));
		}catch(ErrorException $e){
			$app->render(200,Utils::renderFault($e->getMessage()));
		}
	});

	// POST route

	/*
		ENTRADA:

		{
		    "nombre": "Bernardo Belutini",
		    "cedula": 5329429,
		    "numero_socio":1111,
		    "telefono": "04123428732",
		    "username": 1111, 
		    "password": "dRs32sdlaSAds",
		    "email": "1111@ccc.com",
		    "role_id": "3"
		}

		SALIDA:

		{ 
		    "success": true, 
		    "response": [
		        {
		            "nombre": "Bernardo Belutini",
		            "cedula": 5329429,
		            "numero_socio":1111,
		            "telefono": "04123428732",
		            "handicap": 12,
		            "user":{
		                "id": 1, 
		                "username": 123456, 
		                "password": "dRs32sdlaSAds",
		                "email": "1111@ccc.com",
		                "role": { 
		                    "id": 3,
		                    "nombre": "socio"
		                },
		                "createdate": "1969-01-01T01:00:01"
		            },
		            "createdate": "1969-01-01T01:01:01"
		        }
		    ]
		}
	*/

	//$app->post('/socios', $authenticate($app), function() use ($app){
	$app->post('/socios', function() use ($app){

		$data = json_decode($app->request()->getBody());
		
		$gfManager = new SociosManager();

		try {
			$socio = $gfManager->crear($data);

			$result = array(
			            "nombre" => $socio->getNombre(),
			            "cedula" => $socio->getCedula(),
			            "numero_socio" => $socio->getNumeroSocio(),
			            "handicap" => $socio->getHandicap(),
			            "telefono" => $socio->getTelefono(),
			            "user" => array(
			                "id" => $socio->getUser()->getId(), 
			                "username" => $socio->getUser()->getUsername(), 
			                "password" => $socio->getUser()->getPassword(),
			                "email" => $socio->getUser()->getEmail(),
			                "role" => array( 
			                    "id" => $socio->getUser()->getRole()->getId(),
			                    "nombre"=> $socio->getUser()->getRole()->getName()
			                ),
			                "createdate" => "".date("Y-m-d\Th:i:s",strtotime($socio->getUser()->getCreateDate()))
			            ),
			            "createdate" => "".date("Y-m-d\Th:i:s",strtotime($socio->getCreateDate()))
					);

			SociosManager::$EntityManager->flush();

	    	$app->render(200,Utils::renderResult($result));

		} catch (ErrorException $e) {
			
			$app->render(200,Utils::renderFault($e->getMessage()));
		}
		

	});

?>
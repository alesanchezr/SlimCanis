<?php

	require_once 'src/com/4geeks/model/Invitados.manager.php';

	// POST route

	/*
		ENTRADA:

		VACIO

	*/
	//$app->get('/socio', $authenticate($app), function() use ($app){
	$app->get('/invitados', function() use ($app){

		$manager = new InvitadosManager();
		$result = $manager->listar();

	    $app->render(200,$result);

	});

	// POST route

	/*
		ENTRADA:

		VACIO

	*/
	$app->post('/invitados/:id', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$manager = new InvitadosManager();
		$result = $manager->getInvitado($data);

	    $app->render(200,$result);

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
	$app->post('/invitados', function() use ($app){

		$data = json_decode($app->request()->getBody());

		$manager = new InvitadosManager();

		try {
			$element = $manager->crear($data);

			/*$result = array(
			            "nombre" => $element->getName(),
			            "cedula" => $element->getCedula(),
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
					);*/

	    	$app->render(200,Utils::renderResult($result));

		} catch (ErrorException $e) {
			
			$app->render(200,Utils::renderFault($e->getMessage()));
		}
		

	});


?>
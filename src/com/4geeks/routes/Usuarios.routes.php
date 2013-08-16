<?php

	require_once 'src/com/4geeks/model/Usuarios.manager.php';

	// POST route

	/*
		ENTRADA:

		{
		    "username": 1111, 
		    "password": "dRs32sdlaSAds",
		    "email": "1111@ccc.com",
		    "rol": "socio"
		}
	*/
	//$app->post('/usuarios', $authenticate($app), function() use ($app){
	$app->post('/usuarios', function() use ($app){

		$data = json_decode($app->request()->getBody());

		$usuariosManager = new UsuariosManager();
		$user = $usuariosManager->crearUsuario($data);

		$role = $user->getRole();
		$result = array(
				    "success"  => true, 
				    "response" => array( 
				        "usuario"   => array(
					        "username" => $user->getUsername(), 
					        "password" => $user->getPassword(),
					        "email" => $user->getEmail(),
					        "role" => array(
					        	"id" => $role->getId(),
					        	"nombre" => $role->getName()
					        )
				        )
				    )
				);

	    $app->render(200,$result);

	});
	
	

	//Este es un ejemplo de uso de routing con slim
	// POST route
	$app->get('/usuarios', function() use ($app){

		$usuariosManager = new UsuariosManager();
		$result = $usuariosManager->getEquipos();

	    $app->render(200,$result);
	    //$app->render(200,array());

	});

	

?>

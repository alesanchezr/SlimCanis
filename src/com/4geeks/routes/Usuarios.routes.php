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

		try
		{

			$usuariosManager = new UsuariosManager();
			$user = $usuariosManager->crearUsuario($data);

			$role = $user->getRole();
			$app->render(200,Utils::renderResult(array(
						        "username" => $user->getUsername(), 
						        "password" => $user->getPassword(),
						        "email" => $user->getEmail(),
						        "role" => array(
						        	"id" => $role->getId(),
						        	"nombre" => $role->getName()
						        )
					        )
					    ));
			
		}
		catch(ErrorException $e)
		{
			$app->render(200,Utils::renderFault($e->getMessage()));
		}


	});
	
	

	//Este es un ejemplo de uso de routing con slim
	// POST route
	$app->get('/usuarios', function() use ($app){

		try
		{
			$usuariosManager = new UsuariosManager();
			$result = $usuariosManager->getUsuarios();

			$app->render(200,Utils::renderResult($result));
		}
		catch(ErrorException $e)
		{
			$app->render(200,Utils::renderFault($e->getMessage()));
		}

	});

	

?>

<?php

	require_once 'src/com/4geeks/model/Usuarios.manager.php';

<<<<<<< HEAD
 	$app->get('/usuarios', function() use ($app) {
        $app->render(200,array(
                'msg' => 'Welcome to APIGolf! V 0.1',
            ));
    });

	// POST route
	$app->post('/usuarios', $authenticate($app), function () use ($app) {

		$data = json_decode($app->request()->getBody());

		try {
			$usuariosManager = new UsuariosManager();
			$result = $usuariosManager->crearUsuario($data);
			$app->render(201,$result);
			
		} catch (Exception $e) {
			$result = array(
					    "success"  => false, 
					    "response" => "El correo electrónico ya está en uso."
					);

			$app->render(409,$result);
		}
	    
	});
=======
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
	$app->post('/usuarios', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$usuariosManager = new UsuariosManager();
		$result = $usuariosManager->crearUsuario($data);

	    $app->render(200,$result);

	});

	/*

	Este es un ejemplo de uso de routing con slim
	
	// POST route
	$app->get('/reservaciones/test', function() use ($app){

		$data = json_decode($app->request()->getBody());

		$reservacionesManager = new ReservacionesManager();
		$result = $reservacionesManager->test($data);

	    $app->render(200,$result);

	});

	*/

?>
>>>>>>> 5bb9ec3d1bcb550ba679b98a950462a5b8720452

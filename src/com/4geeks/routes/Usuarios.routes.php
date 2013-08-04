<?php

	require_once 'src/com/4geeks/model/Usuarios.manager.php';

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
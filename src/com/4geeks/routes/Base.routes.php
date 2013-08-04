<?php

 	$app->get('/', function() use ($app) {
        $app->render(200,array(
                'msg' => 'Welcome to APIGolf! V 0.1',
            ));
    });

	// POST route
	$app->post('/', function () use ($entityManager) {

	    //require_once "src/model/User.php";
		//$user = new User();
		//$user->setEmail("holis");
		//$entityManager->persist($user);
		//$entityManager->flush();

	});
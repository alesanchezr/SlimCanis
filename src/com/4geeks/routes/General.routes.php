<?php

	require_once 'src/com/4geeks/model/Socios.manager.php';
	require_once 'src/com/4geeks/model/Invitados.manager.php';


	// POST route

	/*
		ENTRADA:

		VACIO

	*/
	//$app->get('/socio', $authenticate($app), function() use ($app){
	$app->get('/buscar_socios/:numero', function($numero) use ($app){

		//die("hola ".$numero);
		$socioManager = new SociosManager();
		$result = $socioManager->buscarPorNumero($numero);

	    $app->render(200,$result);
	    //$app->render(200,array());

	});

	// POST route

	/*
		ENTRADA:

		VACIO

	*/
	//$app->get('/socio', $authenticate($app), function() use ($app){
	$app->get('/buscar_socios_e_invitados/:nombre', function($nombre) use ($app){

		$socioManager = new SociosManager();
		$result = $socioManager->buscarPorNombreNumero($nombre);

	    $app->render(200,$result);

	});

?>
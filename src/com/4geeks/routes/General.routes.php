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

		try
		{
			$socioManager = new SociosManager();
			$result = $socioManager->buscarPorNumero($numero);

			if(count($result) > 0)
			{
				$app->render(200,Utils::renderResult($result));
			}
	    	else $app->render(200,Utils::renderResult(array()));
		}
		catch(ErrorException $e)
		{
	    	$app->render(200,Utils::renderFault($e->getMessage()));
		}

	});

	// POST route

	/*
		ENTRADA:

		VACIO

	*/
	//$app->get('/socio', $authenticate($app), function() use ($app){
	$app->get('/buscar_socios_e_invitados/:nombre', function($nombre) use ($app){

		try
		{

			//TODO: Falta implementar el metodo buscarPorNombreONumero()
			//$socioManager = new SociosManager();
			//$result = $socioManager->buscarPorNombreNumero($nombre);
			
	    	//$app->render(200,Utils::renderResult($result));
	    	$app->render(200,Utils::renderResult("Falta implementar el metodo buscarPorNombreYNumero"));
		}
		catch(ErrorException $e)
		{
	    	$app->render(200,Utils::renderFault($e->getMessage()));
		}

	});

?>
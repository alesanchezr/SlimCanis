<?php

	require_once 'src/com/4geeks/model/Socios.manager.php';
	require_once 'src/com/4geeks/model/Invitados.manager.php';
	require_once 'src/com/4geeks/model/Reservaciones.manager.php';


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
	$app->get('/buscar_socios_e_invitados/:numero', function($numero) use ($app){

		try
		{
			$socioManager = new SociosManager();
			//$result = $socioManager->buscarPorNombreNumero($nombre);
			$socios = $socioManager->buscarPorNumero($numero);

			$invitadosManager = new InvitadosManager();
			$invitados = $invitadosManager->buscarPorCedula($numero);

			$result = array();

			foreach ($socios as $key => $value) {
				$socio = "";
				/*
		            "id": 2,
		            "nombre": "Pepito Montalbán",
		            "numero_socio":2222,
		            "cedula":"NULL",
		            "handicap":5,
		            "tipo": "socio"
				*/
				$socio = array(
					"id" => utf8_encode($value["id"]),
					"nombre" => utf8_encode($value["nombre"]),
					"cedula" => "NULL",
					"numero_socio" => utf8_encode($value["numero_socio"]),
					"handicap" => utf8_encode($value["handicap"]),
					"tipo" => "socio"
					);
				array_push($result, $socio);
			}

			foreach ($invitados as $key => $value) {
				$invitado = "";
				/*
						"id": 1,
			            "nombre": "Andrés Gadarfio",
			            "cedula": 34324353,
			            "numero_socio":"NULL",
			            "handicap":12,
			            "tipo": "invitado"
				*/
				$invitado = array(
					"id" => utf8_encode($value["id"]),
					"nombre" => utf8_encode($value["nombre"]),
					"cedula" => utf8_encode($value["cedula"]),
					"numero_socio" => "NULL",
					"handicap" => utf8_encode($value["handicap"]),
					"tipo" => "invitado"
					);
				array_push($result, $invitado);
			}

	    	$app->render(200,Utils::renderResult($result));
	    	//$app->render(200,Utils::renderResult("Falta implementar el metodo buscarPorNombreYNumero"));
		}
		catch(ErrorException $e)
		{
	    	$app->render(200,Utils::renderFault($e->getMessage()));
		}

	});


	// GET route
	$app->get('/reservaciones_semana_actual/:numero_socio', $authenticate($app), function($numero_socio) use ($app){
		//TODO: todavia falta devolver las reservaciones con la asignaicon incluida
		try
		{
			$data = json_decode($app->request()->getBody());
			$reservacionesManager = new ReservacionesManager();
			$reservaciones = $reservacionesManager->getReservacionesSemana($numero_socio);

			$rsvp_array = array();
			foreach ($reservaciones as $rsvp) {
				//die(print_r($rsvp->toArrayMin()));
				if($rsvp) array_push($rsvp_array, $rsvp->toArrayMin());
			}

		    $app->render(200,Utils::renderResult(array($rsvp_array)));
		}
		catch (ErrorException $e)
		{
			$app->render(200,Utils::renderFault($e->getMessage()));
		}

	});

?>
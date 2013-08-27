<?php

	require_once 'src/com/4geeks/model/Fechas.manager.php';

	/*
		ENTRADA:

		SALIDA:
		{
		    "success": true, 
		    "response": [
		        { "disponible": "2013-03-06T06:30:00" },
		        { "disponible": "2013-03-06T06:50:00" },
		        { "disponible": "2013-03-06T07:30:00" },
		        { "disponible": "2013-03-06T08:30:00" },
		        { "disponible": "2013-03-06T13:30:00" }
		    ]
		}
	*/
	//$app->get('/fechas/horas_disponibles/:fecha', $authenticate($app), function($fecha) use ($app){
	$app->get('/fechas/horas_disponibles/:fecha', function($fecha) use ($app){

		try{
			$fechasManager = new FechasManager();
			$horas = $fechasManager->listarDisponible($fecha);

			/*$result = array();

			foreach ($horas as $key => $value) {
				$hora = "";
				$hora = array("disponible" => $value["hora"]);
				array_push($result, $hora);
			}
			*/
		    $app->render(200,Utils::renderResult($horas));
		}catch (ErrorException $e) {
			$app->render(200,Utils::renderFault($e->getMessage()));
		}
	});
	

	/*
		ENTRADA:
		{ 
		    "fecha_inicio": "2013-03-06 06:30:00",
		    "fecha_fin": "2013-03-07 08:30:00",
		    "motivo": "Torneo Infantil"
		}

		SALIDA:
		{
		    "success": true, 
		    "response": [
		        { 
		            "fecha_inicio": "2013-03-06T06:30:00",
		            "fecha_fin": "2013-03-07T08:30:00",
		            "motivo": "Torneo Infantil"
		        }
		    ]
		}

	*/
	//$app->post('/fechas', $authenticate($app), function() use ($app){
	$app->post('/fechas', function() use ($app){

		$data = json_decode($app->request()->getBody());

		$fechasManager = new FechasManager();
		try{
			$fecha = $fechasManager->creaHorarioIndicado($data);
			
			$result = array(
			            "fecha_inicio"=> $fecha->getFechaInicio(),
			            "fecha_fin"=> $fecha->getFechaFin(),
			            "motivo"=> $fecha->getMotivo()
			            );

		    $app->render(200,Utils::renderResult($result));
		}catch (ErrorException $e) {
			$app->render(200,Utils::renderFault($e->getMessage()));
		}

	});

	//$app->get('/fechas/semana_actual', $authenticate($app), function() use ($app)){
	$app->get('/fechas/dia_actual', function() use ($app){
		date_default_timezone_set('America/Caracas');
		$result = array();

		array_push($result, array("fecha_dia" => date('Y-m-d\Th:i:s', time())));
		//array_push($result, array("fecha_dia" => "2013-08-21T14:30:55"));
		$app->render(200,Utils::renderResult($result));

	});

?>

<?php

	require_once 'src/com/4geeks/model/Reservaciones.manager.php';

		// POST route
	$app->post('/reservaciones', $authenticate($app), function() use ($app){

		//DATA
		/*
		{
		    "integrantes": [ 
		        {
		            "id": 5,
		            "nombre":"Fernando Tineo",
		            "numero_socio":5555,
		            "handicap":12,
		            "tipo": "socio"
		        },
		        {
		            "id": 2,
		            "nombre": "Antonio Pérez",
		            "numero_socio":2222,
		            "handicap":12,
		            "tipo": "socio"
		        },
		        {
		            "id": 3,
		            "nombre": "Pedro Pérez",
		            "numero_socio":3333,
		            "handicap":10,
		            "tipo": "socio"
		        },
		        {
		            "id": 4,
		            "nombre": "Antonio Fernández",
		            "cedula":321812932,
		            "telefono": "042483482920",
		            "handicap":25,
		            "tipo": "invitado"
		        }
		    ], 
		    "fecha": "1969-01-02",
		    "horas_solicitadas": [ "06:30:00", "08:50:00", "08:00:00", "07:40:00", "08:10:00", "10:00:00", "09:20:00", "09:40:00" ] 
		}
		*/

		$data = json_decode($app->request()->getBody());

		$reservacionesManager = new ReservacionesManager();
		$result = $reservacionesManager->reserva($data);

	    $app->render(200,$result);

	});

	// POST route
	$app->post('/reservaciones/por_fecha/:fecha', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$reservacionesManager = new ReservacionesManager();
		$result = $reservacionesManager->listarPorFecha($data);

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
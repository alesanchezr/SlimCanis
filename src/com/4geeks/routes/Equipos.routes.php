<?php

	require_once 'src/com/4geeks/model/Equipos.manager.php';

	//$app->get('/equipos/por_golfista/:id', $authenticate($app), function($id) use ($app){
	$app->get('/equipos/por_socio/:id', function($id) use ($app){

		try {
			$equiposManager = new EquiposManager();
			$result = $equiposManager->getEquipos($id);
			$response = array(
							"success" => true,
							"response" => $result
							);
			$app->render(200,$response);

			break;

		} catch (ErrorException $e) {
			$result = array(
					    "success"  => false, 
					    "response" => array(
					    	"message" => $e->getMessage()
					    	)
					);
			print_r( $e->getMessage());
			//$app->render(204,$result);
		}

		//$app->render(200,$result);

	});
		// POST route
	$app->post('/equipos', $authenticate($app), function() use ($app){

		$data = json_decode($app->request()->getBody());

		$equiposManager = new EquiposManager();
		$result = $equiposManager->crearEquipo($data);

	    $app->render(200,$result);

	});

	/*
		ENTRADA:

		SALIDA:
		{ 
            "id": 1,
            "socio": {
                "id": 1,
                "nombre":"Bernardo Belutini",
                "numero_socio":1111,
                "handicap":12
            },
            "handicap_promedio":12,
            "integrantes": [
                {
                    "id": 1,
                    "nombre":"Bernardo Belutini",
                    "numero_socio":1111,
                    "handicap":12,
                    "tipo": "socio"
                },
                {
                    "id": 2,
                    "nombre": "Pepito Gadarfio",
                    "numero_socio":2222,
                    "handicap":12,
                    "tipo": "socio"
                },
                {
                    "id": 3,
                    "nombre": "Antonio Pérez",
                    "numero_socio":3333,
                    "handicap":10,
                    "tipo": "socio"
                },
                {
                    "id": 1,
                    "nombre": "Manuel Pereira",
                    "cedula":21841933,
                    "handicap":10,
                    "tipo": "invitado"
                }
            ]
        }
	*/

	//$app->get('/equipos', $authenticate($app), function() use ($app){
	$app->get('/equipos', function() use ($app){
		try{
			$equiposManager = new EquiposManager();
			$equipo = $equiposManager->getEquipos();

			$

			$result = array();

			print_r($equipo);

			foreach ($equipo as $key => $value) {
				$eq = array( 
					            "id" => $value["id"],
					            "socio" => array(
					                "id" => $value["socio"]["id"],
					                "nombre" => $value["socio"]["nombre"],
					                "numero_socio" => $value["socio"]["numero_socio"],
					                "handicap" => $value["socio"]["handicap"]
					            ),
					            "handicap_promedio" => $value["handicap_promedio"],
					            "integrantes" => array()
					        );
				foreach ($value["integrantes"] as $key => $value2) {
					$inte = array(
							"id" => $value2[]
						);
				}
			}

	    	//$app->render(200,Utils::renderResult($result));

		} catch (ErrorException $e) {
			
			$app->render(200,Utils::renderFault($e->getMessage()));
		}

	});

?>
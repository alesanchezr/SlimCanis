<?php

	require_once 'src/com/4geeks/model/Equipos.manager.php';

	//$app->get('/equipos/por_golfista/:id', $authenticate($app), function($id) use ($app){
	$app->get('/equipos/:id', function($id) use ($app){

		try {
			$equiposManager = new EquiposManager();
			$equipos = $equiposManager->getEquipo($id);
			
			$app->render(200,Utils::renderResult(equiposParser($equipos)));
		} catch (ErrorException $e) {
			$app->render(200,Utils::renderFault($e->getMessage()));
		}
	});
		// POST route
	$app->post('/equipos', function() use ($app){

		$data = json_decode($app->request()->getBody());

		try
		{
			$equiposManager = new EquiposManager();
			$equipo = $equiposManager->crearEquipo($data);
			$integrantes = $equipo->getIntegrantes();
			
			$arrayIntegrantes = array();
			foreach ($integrantes as $int) {
				array_push($arrayIntegrantes, $int->toArrayMin());
			}

			$result = array(
					    "success"  => true, 
					    "response" => array( 
					        "id"   => $equipo->getId(),
					        "socio" => $equipo->getSocio()->toArrayMin(), 
					        "handicap_promedio" => $equipo->getHandicapPromedio(),
					        "integrantes" => $arrayIntegrantes
					    )
					);

			EquiposManager::$EntityManager->flush();
	    	$app->render(200,$result);
		} 
		catch (ErrorException $e) {
			
			$result = array(
					    "success"  => false, 
					    "response" => array(
					    	"message" => $e->getMessage()
					    	)
					);
			
			$app->render(200,$result);
		}



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
			$equipos = $equiposManager->getEquipos();

	    	$app->render(200,Utils::renderResult(equiposParser($equipos)));

		} catch (ErrorException $e) {
			
			$app->render(200,Utils::renderFault($e->getMessage()));
		}
	});

	//$app->get('/equipos', $authenticate($app), function() use ($app){
	$app->get('/equipos/por_socio/:id', function($id) use ($app){
		try{

			$equiposManager = new EquiposManager();
			$equipos = $equiposManager->getEquiposPorSocio($id);

			$app->render(200,Utils::renderResult(equiposParser($equipos)));
		}catch(ErrorException $e){
			$app->render(200,Utils::renderFault($e->getMessage()));
		}
	});



	function equiposParser($equipos){
		$result = array();
		foreach ($equipos as $key => $equipo) {
			$eq = array( 
				            "id" => $equipo->getId(),
				            "socio" => array(
				                "id" => $equipo->getSocio()->getId(),
				                "nombre" => $equipo->getSocio()->getNombre(),
				                "numero_socio" => $equipo->getSocio()->getNumeroSocio(),
				                "handicap" => $equipo->getSocio()->getHandicap()
				            ),
				            "handicap_promedio" => $equipo->getHandicapPromedio(),
				            "integrantes" => array()
				        );
			foreach ($equipo->getIntegrantes() as $key => $integrante) {
				$integ = array();
				if ($integrante->getSocio() != null) {
					$integ = array(
							"id"=> $integrante->getSocio()->getId(),
							"nombre"=> $integrante->getSocio()->getNombre(),
							"numero_socio"=> $integrante->getSocio()->getNumeroSocio(),
							"handicap"=> $integrante->getSocio()->getHandicap(),
							"tipo"=> "socio"
						);
				}else{
					$integ = array(
							"id"=> $integrante->getInvitado()->getId(),
							"nombre"=> $integrante->getInvitado()->getNombre(),
							"cedula"=> $integrante->getInvitado()->getCedula(),
							"handicap"=> $integrante->getInvitado()->getHandicap(),
							"tipo"=> "invitado"
						);
				}
				array_push($eq["integrantes"], $integ);
				
			}
			array_push($result, $eq);
		}

		return $result;
	}

?>
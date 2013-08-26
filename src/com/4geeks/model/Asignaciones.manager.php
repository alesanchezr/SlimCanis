<?php

class AsignacionesManager
{

	// POST route
	/**
	*	Entrada:
	*
	*	VACIO
	*
	**/
    public  function listarAsignaciones($data)
	{
		$result = array(
		    "success"  => true, 
		    "response" => array(
		        array(
		            "id" => 8, 
		            "fecha" => "1969-01-02 06:30:00", 
		            "estatus" => "pendiente", 
		            "equipo" => array(
		                "id" => 1,
		                "perfil_id" => 1, 
		                "handicap_promedio" => 12,
		                "integrantes" => array(
		                    array(
		                        "id" => 1,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(
		                            "username" => 1111,
		                            "email" => "1111@ccc.com"
		                        ),
		                        "numero_socio" => 1111,
		                        "handicap" => 12,
		                        "socio" => "NULL"
		                    ),
		                    array(
		                        "id" => 2,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(
		                            "username" => 2222,
		                            "email" => "2222@ccc.com"
		                        ),
		                        "numero_socio":2222,
		                        "handicap":10,
		                        "socio":"NULL"
		                    ),
		                    array(
		                        "id" => 3,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(),
		                        "numero_socio" => "NULL",
		                        "handicap" => 25,
		                        "socio" => 1111
		                    )
		                )
		            ),
		            "asignacion" => array()
		        ),
				array(
		            "id" => 8, 
		            "fecha" => "1969-01-02 06:30:00", 
		            "estatus" => "pendiente", 
		            "equipo" => array(
		                "id" => 1,
		                "perfil_id" => 1, 
		                "handicap_promedio" => 12,
		                "integrantes" => array(
		                    array(
		                        "id" => 1,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(
		                            "username" => 1111,
		                            "email" => "1111@ccc.com"
		                        ),
		                        "numero_socio" => 1111,
		                        "handicap" => 12,
		                        "socio" => "NULL"
		                    ),
		                    array(
		                        "id" => 2,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(
		                            "username" => 2222,
		                            "email" => "2222@ccc.com"
		                        ),
		                        "numero_socio":2222,
		                        "handicap":10,
		                        "socio":"NULL"
		                    ),
		                    array(
		                        "id" => 3,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(),
		                        "numero_socio" => "NULL",
		                        "handicap" => 25,
		                        "socio" => 1111
		                    )
		                )
		            ),
		            "asignacion" => array()
		        )
		    )
		);

		return $result;
	}

	// POST route
	/**
	*	Entrada:
	*
	*	VACIO
	*
	**/
    public  function sortear($data)
	{
		$result = array(
		    "success"  => true, 
		    "response" => array(
		        array(
		            "id" => 8, 
		            "fecha" => "1969-01-02 06:30:00", 
		            "estatus" => "pendiente", 
		            "equipo" => array(
		                "id" => 1,
		                "perfil_id" => 1, 
		                "handicap_promedio" => 12,
		                "integrantes" => array(
		                    array(
		                        "id" => 1,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(
		                            "username" => 1111,
		                            "email" => "1111@ccc.com"
		                        ),
		                        "numero_socio" => 1111,
		                        "handicap" => 12,
		                        "socio" => "NULL"
		                    ),
		                    array(
		                        "id" => 2,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(
		                            "username" => 2222,
		                            "email" => "2222@ccc.com"
		                        ),
		                        "numero_socio":2222,
		                        "handicap":10,
		                        "socio":"NULL"
		                    ),
		                    array(
		                        "id" => 3,
		                        "nombre" => "Antonio Pérez",
		                        "usuario" => array(),
		                        "numero_socio" => "NULL",
		                        "handicap" => 25,
		                        "socio" => 1111
		                    )
		                )
		            ),
		            "asignacion" => array()
		        )
		    )
		);

		return $result;
	}
	// POST route
	/**
	*	Entrada:
	*
	*	{
	*	    "perfil_id": 1, 
	*	    "equipo": { 
	*	        "id": 1,
	*	        "perfil": {
	*	            "id": 1,
	*	            "nombre": "Antonio Pérez",
	*	            "usuario": {
	*	                "username": 1111,
	*	                "email": "1111@ccc.com"
	*	            },
	*	            "numero_socio":1111,
	*	            "handicap":12,
	*	            "socio":"NULL"
	*	        }, 
	*	        "handicap_promedio": 12,
	*	        "integrantes": [ 
	*	            {
	*	                "id": 1,
	*	                "nombre": "Antonio Pérez",
	*	                "usuario": {
	*	                    "username": 1111,
	*	                    "email": "1111@ccc.com"
	*	                },
	*	                "numero_socio":1111,
	*	                "handicap":12,
	*	                "socio":"NULL"
	*	            },
	*	            {
	*	                "id": 2,
	*	                "nombre": "Antonio Pérez",
	*	                "usuario": {
	*	                    "username": 2222,
	*	                    "email": "2222@ccc.com"
	*	                },
	*	                "numero_socio":2222,
	*	                "handicap":10,
	*	                "socio":"NULL"
	*	            }
	*	        ]
	*	    },
	*	    "dia": "jueves", 
	*	    "fecha": "1969-01-01 06:30:00"
	*	}
	*
	**/
    public  function asignarHora($data)
	{
		$result = array(
		    "success"  => true, 
		    "response" => array(
		        array(
		            "id" => 1,
		            "perfil_id" => 1, 
		            "equipo" => 1,
		            "dia" => "jueves", 
		            "fecha" => "1969-01-01 06:30:00"
		        )
		    )
		);

		return $result;
	}

	// POST route
	/**
	*	Entrada:
	*
	*	{
	*	    "estatus": "confirmada",
	*	}
	*
	**/
    public  function modificarStatus($data)
	{
		$result = array(
		    "success"  => true, 
		    "response" => array(
	            "id" => 1,
	            "fecha_asignada" => "1969-01-01 08:50:00",
	            "fecha_inicio" => "0000-00-00 00:00:00",
	            "fecha_fin" => "0000-00-00 00:00:00",
	            "estatus" => "confirmada",
	            "hoyo" => 10,
	            "reservacion" => array(
	                "id" => 1, 
	                "fecha" => "1969-01-01 06:30:00", 
	                "estatus" => "negada"
	                "equipo" => array( 
	                    "id" => 1,
	                    "perfil_id" => 1111, 
	                    "handicap_promedio" => 12,
	                    "integrantes" => array( 
	                        array("perfil_id" => 1111),
	                        array("perfil_id" => 2222),
	                        array("perfil_id" => 3333)
	                    )
	                )
	            )
		    )
		);

		return $result;
	}

	// POST route
	/**
	*	Entrada:
	*
	*	{
	*	    "fecha_inicio": "1961-01-02 06:30:32",
	*	    "cadi": "Raúl Pérez",
	*	    "editado_por": "amilano"
	*	}
	*
	**/

    public  function iniciarJuego($data)
	{
		$result = array(
		    "success"  => true, 
		    "response" => array(
	            array(
	            "id" => 1,
	            "fecha_asignada" => "1969-01-01 08:50:00",
	            "fecha_inicio" => "1961-01-02 06:30:32",
	            "fecha_fin" => "0000-00-00 00:00:00",
	            "estatus" => "confirmada",
	            "hoyo" => 10,
	            "reservacion" => array(
	                "id" => 1, 
	                "fecha" => "1969-01-01 06:30:00", 
	                "estatus" => "asignada"
	                "equipo" => array( 
	                    "id" => 1,
	                    "perfil_id" => 1111, 
	                    "handicap_promedio" => 12,
	                    "integrantes" => array( 
	                        array("perfil_id" => 1111),
	                        array("perfil_id" => 2222),
	                        array("perfil_id" => 3333)
	                    )
	                )
	            ),
		    )
		);

		return $result;
	}

	/**
	*	Entrada:
	*
	*	{
    *		"fecha_fin": "1961-01-02 08:33:12",
    *		"editado_por": "amilano"
	*	}
	*
	**/

    public  function terminarJuego($data)
	{
		$result = array(
		    "success"  => true, 
		    "response" => array(
	            "id" => 1,
	            "fecha_asignada" => "1969-01-01 08:50:00",
	            "fecha_inicio" => "0000-00-00 00:00:00",
	            "fecha_fin" => "1961-01-02 08:33:17",
	            "estatus" => "confirmada",
	            "hoyo" => 10,
	            "reservacion" => array(
	                "id" => 1, 
	                "fecha" => "1969-01-01 06:30:00", 
	                "estatus" => "negada"
	                "equipo" => array( 
	                    "id" => 1,
	                    "perfil_id" => 1111, 
	                    "handicap_promedio" => 12,
	                    "integrantes" => array( 
	                        array("perfil_id" => 1111),
	                        array("perfil_id" => 2222),
	                        array("perfil_id" => 3333)
	                    )
	                )
	            )
		    )
		);

		return $result;
	}

	public function sorteo($data){
		/*
			Base times:
			00:00 am 	(Received)
			6:30 am 	(Minor point)
			11:10 am 	(Major point)
		*/
		$baseInit = strtotime($data)+23400; //6:30
		$baseEnd = $baseInit+16800; //11:10
		$lessEnd = $lessInit = 0;//Big numbers for initial validations
		echo "\n";
		$init = strtotime($data)+24000;//+23400;
		echo "\n";
		$inicio = date("Y-m-d\Th:i:s",$init);
		$fin = $init+15600;//+16800
		$fin = date("Y-m-d\Th:i:s",$fin);
		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('s')
		   ->from('Entity\FechaOcupada', 's')
		   ->where('(s.fecha_inicio <= :inicio AND :inicio <= s.fecha_fin AND :fin >= s.fecha_fin) 
		   		 OR (s.fecha_inicio >= :inicio AND :fin >= s.fecha_inicio AND :fin <= s.fecha_fin)
		   		 OR (s.fecha_inicio >= :inicio AND :fin >= s.fecha_fin)
		   		 ')
		   ->setParameter("inicio",$inicio)
		   ->setParameter("fin",$fin);
		$array = $qb->getQuery()->getResult(2);

		if (count($array) > 0) {
			$lessEnd = $lessInit = 10000000000000;//Big numbers for initial validations

			foreach ($array as $key => $evento) {
				if (abs( strtotime($evento["fecha_inicio"]) - $baseInit) < $lessInit) {
					$lessInit = ( strtotime($evento["fecha_inicio"]) - $baseInit);
				}
				if ($baseEnd - strtotime($evento["fecha_fin"]) < $lessEnd) {
					$lessEnd = $baseEnd - strtotime($evento["fecha_fin"]);
				}
			}

			if ($baseEnd<0) {
				$baseEnd = 0;
			}
		}

		$qb = self::$EntityManager->createQuery('SELECT r.id, r.fecha_solicitada FROM Entity\Reservacion r WHERE r.fecha_solicitada between ?1 AND ?2 OR r.fecha_solicitada between ?3 AND ?4 ORDER BY r.fecha_solicitada ASC');
		$qb->setParameter(1, date('Y-m-d\Th:i:s', $baseInit));
		$qb->setParameter(2, date('Y-m-d\Th:i:s', $baseInit+$lessInit));
		$qb->setParameter(3, date('Y-m-d\Th:i:s', $baseEnd-$lessEnd));
		$qb->setParameter(4, date('Y-m-d\Th:i:s', $baseEnd));
		
		$array = $qb->getResult();
		//echo "\n";
		//echo "Sorteo de reservas entre los horarios: ".date("Y-m-d\Th:i:s",$baseInit)."  ".date("Y-m-d\Th:i:s",($baseInit+$lessInit))." y ".date("Y-m-d\Th:i:s",($baseEnd-$lessEnd))."  ".date("Y-m-d\Th:i:s",$baseEnd);
		//echo "\n";
		//return 0;
		print_r($array);

		return $array;
	}

}

?>
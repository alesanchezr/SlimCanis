<?php

require_once "src/com/4geeks/model/Base.manager.php";

class FechasManager extends BaseManager
{

	/*
		ENTRADA:

		VACIO

	*/
    public  function listarDisponible($data)
	{
		$result = array(
				    "success"  => true, 
				    "response" => array( 
				        array( 
				            "id" => 1,
				            "fecha_inicio" => "2013-03-06 06:30:00",
				            "fecha_fin" => "2013-03-07 08:30:00",
				            "motivo" => "Torneo Infantil"
				        ),
				        array(  
				            "id":2,
				            "fecha_inicio" => "2013-03-07 11:00:00",
				            "fecha_fin" => "2013-03-08 11:00:00",
				            "motivo" => "Torneo Pro"
				        )
				    )
				);

		return $result;
	}

	/*
		ENTRADA:

		{
		    "username": 1111, 
		    "password": "dRs32sdlaSAds",
		    "email": "1111@ccc.com",
		    "rol": "socio"
		}

	*/
    public  function creaHorarioIndicado($data)
	{
		$result = array(
				    "success"  => true, 
				    "response" => array( 
				            "fecha_inicio": "2013-03-06 06:30:00",
				            "fecha_fin": "2013-03-07 08:30:00",
				            "motivo": "Torneo Infantil"
				    )
				);

		return $result;
	}

}

?>
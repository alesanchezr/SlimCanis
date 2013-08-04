<?php

require_once "src/com/4geeks/model/Base.manager.php";

class UsuariosManager extends BaseManager
{

	/*
		ENTRADA:

		{
		    "username": 1111, 
		    "password": "dRs32sdlaSAds",
		    "email": "1111@ccc.com",
		    "rol": "socio"
		}

	*/
    public  function crearUsuario($data)
	{
		$result = array(
				    "success"  => true, 
				    "response" => array( 
				        array(
				            "usuario" => array(
				                "id" => 2, 
				                "username" => 123456, 
				                "password" => "dRs32sdlaSAds",
				                "email" => "1111@ccc.com",
				                "role" => array(
				                    "id" => 1,
				                    "nombre" => "socio"
				                )
				            )
				        )
				    )
				);

		return $result;
	}

}

?>
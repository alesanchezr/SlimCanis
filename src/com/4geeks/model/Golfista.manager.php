<?php

require_once "src/com/4geeks/model/Base.manager.php";

class GolfistaManager extends BaseManager
{

	/*
		ENTRADA:

		VACIO

	*/
    public  function listar($data)
	{
		$result = array(
				    "success"  => true, 
				    "response" => array( 
				        array(
				            "id" => 1,
				            "usuario_id" => 1,
				            "numero_socio" => 1111,
				            "handicap" => 12,
				            "socio" => "NULL"
				        ),
				        array(
				            "id" => 2,
				            "usuario_id" => "NULL",
				            "numero_socio" => "NULL",
				            "handicap" => 12,
				            "socio" => 1111
				        )
				    )
				);

		return $result;
	}

	/*
		ENTRADA:

		VACIO

	*/
    public  function listarInvitados($data)
	{
		$result = array(
				    "success"  => true, 
				    "response" => array( 
				        array(
				            "id" => 1,
				            "usuario_id" => 1,
				            "numero_socio" => 1111,
				            "handicap" => 12,
				            "socio" => "NULL"
				        ),
				        array(
				            "id" => 2,
				            "usuario_id" => "NULL",
				            "numero_socio" => "NULL",
				            "handicap" => 12,
				            "socio" => 1111
				        )
				    )
				);

		return $result;
	}

	/*
		ENTRADA:

		{
		    "usuario_id":1,
		    "numero_socio":1111,
		    "handicap":12,
		    "socio":"NULL"
		}

	*/
    public  function crear($data)
	{
		$result = array(
				    "success"  => true, 
				    "response" => array( 
				        array(
				            "id" => 1,
				            "usuario_id" => 1,
				            "numero_socio" => 1111,
				            "handicap" => 12,
				            "socio" => "NULL"
				        )
				    )
				);

		return $result;
	}

}

?>
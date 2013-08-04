<?php

require_once "src/com/4geeks/model/Base.manager.php";

class EquiposManager extends BaseManager
{

    public  function crearEquipo($data)
	{
		$result = array(
				    "success"  => true, 
				    "response" => array( 
				        "id"   => 1,
				        "creador" => 1111, 
				        "handicap_promedio" => 12,
				        "integrantes" => array(
				        	array("perfil_id" => 2222),
				        	array("perfil_id" => 3333)
				        )
				    )
				);

		return $result;
	}

}

?>
<?php

require_once "src/com/4geeks/model/Base.manager.php";

class ReservacionesManager extends BaseManager
{

    public  function reserva($data)
	{
		$result = array(
				    "success"  => true, 
				    "response" => array( 
				        "id" => 1,
				        "perfil_id" => 1111, 
				        "equipo" => 1111,
				        "dia" => "jueves", 
				        "fechas_solicitadas" => array( 
				            array( "fecha" => "1969-01-01 06:30:00"),
				            array( "fecha" => "1969-01-01 06:30:00"),
				            array( "fecha" => "1969-01-01 06:30:00"),
				            array( "fecha" => "1969-01-01 06:30:00"),
				            array( "fecha" => "1969-01-01 06:30:00"),
				            array( "fecha" => "1969-01-01 06:30:00"),
				            array( "fecha" => "1969-01-01 06:30:00") 
				        )
				    )
		);

		return $result;
	}

	public function test($data)
	{
	    require_once "src/com/4geeks/entities/User.php";

		$user = new User();
		$user->setEmail("Eeres un pato...");
		self::$EntityManager->persist($user);
		self::$EntityManager->flush();

		return array();
	}

}

?>
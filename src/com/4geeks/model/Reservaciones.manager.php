<?php

require_once "src/com/4geeks/model/Base.manager.php";
require_once "src/com/4geeks/model/Equipos.manager.php";

class ReservacionesManager extends BaseManager
{

    public  function reserva($data)
	{

		//TODO: Al momento de crear este equipo hay que validar que los integrantes de este equipo esten en otro equipo
		$datos_para_crear_equipo = array(
				"socio_id" => $_SESSION['user']->id;
				"integrantes" => $data->integrantes;
			);
		$eqManager = new EquiposMapanager();
		$equipo = $eqManager->crearEquipo($datos_para_crear_equipo);

		foreach($data->hora_solicitada as $hora)
		{
			$reservacion = new Reservacion();	
			$reservacion->setEquipo($equipo);
			$reservacion->setSocio($equipo->getSocio());
			$reservacion->setFechaSolicitada($data->fecha." ".$hora);
			$reservacion->setStatus("pendiente");
			$reservacion->setCreateDate("20/10/1985");// TODO: Tengo que colocar la fecha de hoy
			self::$EntityManager->persist($reservacion);
		}



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

    public  function listarPorFecha($data)
	{


		return array();
	}

	/*

	Este es un metodo de prueba para que vean como trabajar con Doctrine

	public function test($data)
	{
	    require_once "src/com/4geeks/entities/User.php";

		$user = new User();
		$user->setEmail("Eres un pato...");
		self::$EntityManager->persist($user);
		self::$EntityManager->flush();

		return array();
	}

	*/

}

?>
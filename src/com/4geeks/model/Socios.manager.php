<?php

require_once "src/com/4geeks/model/Base.manager.php";
require_once "src/com/4geeks/model/Usuarios.manager.php";

class SociosManager extends BaseManager
{

	/*
		ENTRADA:

		VACIO

		SALIDA:

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

	*/
    public function listar()
	{
		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('s')
		   ->from('Entity\Socio', 's');
		$array = $qb->getQuery()->getResult(2);
		return $array;
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
			"nombre": "Bernardo Belutini",
		    "cedula": 5329429,
		    "numero_socio":1111,
		    "username": 1111, 
		    "password": "dRs32sdlaSAds",
		    "email": "1111@ccc.com",
		    "role_id": "1"
		}

		SALIDA:

		$result = array(
				    "success": true, 
				    "response": array(
				        array(
				            "nombre": "Bernardo Belutini",
				            "cedula": 5329429,
				            "numero_socio":1111,
				            "handicap": 12,
				            "user": array(
				                "id": 1, 
				                "username": 123456, 
				                "password": "dRs32sdlaSAds",
				                "email": "1111@ccc.com",
				                "role": array( 
				                    "id": 1,
				                    "nombre": "socio"
				                ),
				                "createdate": "1969-01-01T01:00:01"
				            ),
				            "createdate": "1969-01-01T01:01:01"
				        )
    				)
				);

	*/
    public  function crear($data)
	{
		//TODO: Generate USER from Usuarios.manager.php

		$usuariosManager = new UsuariosManager();
		$userToCreate  = array(
							"username" => $data->username, 
					    	"password" => $data->password,
					    	"email" => $data->email,
					    	"rol" => 1 
				    	);
		$nuevoUsuario = $usuariosManager->crearUsuario($userToCreate);

		if ($nuevoUsuario) {

			$socio = new Socio();
			$socio->setUser($nuevoUsuario);

			$socio->setNombre($data->nombre);
			$socio->setCedula($data->cedula);
			$socio->setNumeroSocio($data->numero_socio);
			$socio->setTelefono($data->telefono);
			$socio->setHandicap(rand(1,25));
			$socio->setCreatedate('1987-10-16');
			$socio->setUpdatedate('1987-10-16');

			self::$EntityManager->persist($socio);
			self::$EntityManager->flush();

			return $socio;

		}else{
			
			throw new Exception("Error creando usuario", 1);
			
		}
	}

	/*
		ENTRADA:

		VACIO

		SALIDA:

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

	*/
    public function buscarPorNumero($numero)
	{
		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('s')
		   ->from('Entity\Socio', 's');

		//return array();
		$array = $qb->getQuery()->getResult(2);
		return $array;
	}

}

?>
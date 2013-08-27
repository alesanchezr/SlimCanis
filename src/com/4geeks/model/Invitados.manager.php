<?php

require_once "src/com/4geeks/model/Base.manager.php";
require_once "src/com/4geeks/model/Invitados.manager.php";

class InvitadosManager extends BaseManager
{

	/*
		ENTRADA:

		VACIO

		SALIDA:

		{ 
		    "success": true, 
		    "response": [
		        {
		            "id": 1,
		            "nombre": "Manuel Pereira",
		            "cedula":21841933,
		            "email": "manupe@hotmail.com",
		            "telefono": "04142334223",
		            "createdate": "1969-01-01T01:01:01"
		        }
		    ]
		}

	*/
    public function listar()
	{
		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('s')
		   ->from('Entity\Invitado', 's');
		$array = $qb->getQuery()->getResult(2);
		return $array;
	}

	/*
		ENTRADA:

		VACIO

		SALIDA:

		{ 
		    "success": true, 
		    "response": [
		        {
		            "id": 1,
		            "nombre": "Manuel Pereira",
		            "cedula":21841933,
		            "email": "manupe@hotmail.com",
		            "telefono": "04142334223",
		            "createdate": "1969-01-01T01:01:01"
		        }
		    ]
		}

	*/
    public  function getInvitado($data)
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
		    "nombre": "Manuel Pereira",
		    "cedula":21841933,
		    "email": "manupe@hotmail.com",
		    "telefono": "04142334223"
		}

		SALIDA:

		{ 
		    "success": true, 
		    "response": [
		        {
		            "id": 1,
		            "nombre": "Manuel Pereira",
		            "cedula":21841933,
		            "email": "manupe@hotmail.com",
		            "telefono": "04142334223",
		            "createdate": "1969-01-01T01:01:01"
		        }
		    ]
		}

	*/
    public  function crear($data)
	{
		//TODO: Generate USER from Usuarios.manager.php
/*
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
*/
	}

	public function buscarPorCedula($cedula)
	{
		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('s')
		   ->from('Entity\Invitado', 's')
		   ->where('s.cedula = ?1')
		   ->setParameter(1, $cedula);
		$array = $qb->getQuery()->getResult(2);
		return $array;
	}

}

?>
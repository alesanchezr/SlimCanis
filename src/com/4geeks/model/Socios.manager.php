<?php

use Entity\Socio;

require_once "src/com/4geeks/model/Base.manager.php";
require_once "src/com/4geeks/model/Usuarios.manager.php";

class SociosManager extends BaseManager
{

	/*
		Devuelve lista socios (sin parsear)
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
		Devuelve socio creado
	*/
    public  function crear($data)
	{
		//print_r($data);
		$usuariosManager = new UsuariosManager();
		$userToCreate  = array(
							"username" => $data->username, 
					    	"password" => $data->password,
					    	"email" => $data->email,
					    	"role_id" => $data->role_id 
				    	);
		$userToCreate = json_encode($userToCreate);
		$userToCreate = json_decode($userToCreate);
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
			self::$EntityManager->getConnection()->rollback();
			self::$EntityManager->close();
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
		   ->from('Entity\Socio', 's')
		   ->where('s.numero_socio = :nrosocio')
		   ->setParameter('nrosocio',$numero);

		$array = $qb->getQuery()->getResult(2);
		return $array;
	}

	public function buscarPorNombreNumero($nombre)
	{
		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('s')
		   ->from('Entity\Socio', 's')
		   ->where('s.numero_socio = :nrosocio OR s.nombre = :nombre')
		   ->setParameter('nrosocio',$nombre)
		   ->setParameter('nombre',$nombre);

		$array = $qb->getQuery()->getResult(2);
		return $array;
	}

}

?>
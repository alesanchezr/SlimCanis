<?php

use Entity\Equipo;

require_once "src/com/4geeks/model/Base.manager.php";

class UsuariosManager extends BaseManager
{


    public  function crearUsuario($data)
	{

		//DATA
		/*
		{
		    "username": 1111, 
		    "password": "dRs32sdlaSAds",
		    "email": "1111@ccc.com",
		    "rol": "socio"
		}
		*/
		require_once "src/com/4geeks/entities/Golfistas.php";
		require_once "src/com/4geeks/entities/Users.php";

		//$socio = self::$EntityManager->find("Golfistas",$data->perfil_id);
		$socio = self::$EntityManager->getRepository('Users')
                         ->findOneBy(array('email' => $data->email));

   		if (count($socio)>0) {
   			throw new Exception("Email already in use", 1);
   		
   		}else{

			$user = new Users();
			$user->setUsername($data->username);
			$user->setEmail($data->email);
			$user->setPassword($data->password);
			self::$EntityManager->persist($user);
			self::$EntityManager->flush();

			$result = array(
					    "success"  => true, 
					    "response" => array( 
					        "usurio"   => array(
						        "username" => $user->getUsername(), 
						        "password" => $user->getPassword(),
						        "email" => $user->getEmail(),
						        "role" => array(
						        	"id" => 1,
						        	"nombre" => "user"
						        )
					        )
					    )
					);

			return $result;
		}
	}

	public function getEquipos()
	{
		//require_once "src/com/4geeks/entities/Entity/Equipo.php";
		$array = array();
		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('e.*')
		   ->from('Entity\Equipo', 'e');
		$array = $qb->getQuery()->getArrayResult();

		//print_r($array);
		return $array;
		
		return array("asd");
	}

}

?>
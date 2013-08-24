<?php

use Entity\Equipo;
use Entity\User;

require_once "src/com/4geeks/model/Base.manager.php";

class UsuariosManager extends BaseManager
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
    public  function crearUsuario($data)
	{

		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('e')
		   ->from('Entity\user', 'e')
		   ->where('e.email = ?1')
		   ->setParameter(1, $data->email);

		$array = $qb->getQuery()->getArrayResult();

   		if (count($array)>0) {
   			throw new Exception("Email already in use", 1);
   		
   		}else{

			$user = new User();
			$user->setUsername($data->username);
			$user->setEmail($data->email);
			$user->setPassword($data->password);
			$user->setRole(self::$EntityManager->find('Entity\Role',$data->role_id));
			$user->setCreatedate('1985-10-20');
			$user->setUpdatedate('1985-10-20');
			self::$EntityManager->persist($user);
			self::$EntityManager->flush();

			return $user;
		}
	}

	public function getUsuarios()
	{
		
		$users = array();
		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('e.email, e.id, e.password, e.username, e.role_id')
		   ->from('Entity\User', 'e');
		$users = $qb->getQuery()->getResult(2);
		
		$cont = 0;
		foreach($users as $user)
		{
			$role = self::$EntityManager->find('Entity\Role',$user["role_id"]);
			$user["role"] = array("id" => $role->getId(), "nombre" => $role->getName());
			unset($user["role_id"]);

			$users[$cont] = $user;
			$cont++;
		}
		return $users;
		
	}

}

?>
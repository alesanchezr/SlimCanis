<?php

class EquiposManager
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

	public function getEquipos($id)
	{
		$qb = $entityManager->createQueryBuilder();
		$qb->select('e.*')
		   ->from('Equipo', 'e')
		   ->where('e.socio = ?1')
		   ->setParameter(1, $id);
		$array = $query->getArrayResult();

		//print_r($array);
		return $array;
	}

}

?>
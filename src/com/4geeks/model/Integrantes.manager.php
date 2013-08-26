<?php

require_once "src/com/4geeks/model/Base.manager.php";
require_once "src/com/4geeks/model/Equipos.manager.php";

class IntegrantesManager extends BaseManager
{

	/*
		ENTRADA:

		$id

	*/
    public function eliminar($id)
	{
		$integrante = self::$EntityManager->find("Entity\Integrante",$id);

		if($integrante)
			self::$EntityManager->remove($integrante);

		return true;
	}


}

?>
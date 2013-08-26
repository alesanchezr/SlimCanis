<?php
use Entity\FechaOcupada;
require_once "src/com/4geeks/model/Base.manager.php";

class FechasManager extends BaseManager
{

	/*
		ENTRADA:

		VACIO

	*/
    public  function listarDisponible($data)
	{
		/*
			Base times:
			00:00 am 	(Received)
			6:30 am 	(Minor point)
			11:10 am 	(Major point)
		*/
		$baseInit = strtotime($data)+23400; //6:30
		$baseEnd = $baseInit+16800; //11:10

		//echo "\n";
		$init = strtotime($data)+24000;//+23400;
		//echo "\n";
		$inicio = date("Y-m-d\Th:i:s",$init);
		//echo "\n";
		$fin = $init+15600;//+16800
		$fin = date("Y-m-d\Th:i:s",$fin);
		//echo "\n";
		$qb = self::$EntityManager->createQueryBuilder();
		$qb->select('s')
		   ->from('Entity\FechaOcupada', 's')
		   ->where('(s.fecha_inicio <= :inicio AND :inicio <= s.fecha_fin AND :fin >= s.fecha_fin) 
		   		 OR (s.fecha_inicio >= :inicio AND :fin >= s.fecha_inicio AND :fin <= s.fecha_fin)
		   		 OR (s.fecha_inicio >= :inicio AND :fin >= s.fecha_fin)
		   		 ')
		   //->where('?1 between s.fecha_inicio and s.fecha_fin')
		   //->where('DATE(s.fecha_inicio) <= ?1 AND DATE(s.fecha_fin) >= ?1')
		   ->setParameter("inicio",$inicio)
		   ->setParameter("fin",$fin);
		$array = $qb->getQuery()->getResult(2);
		
		//print_r($array);
		//echo "\n";

		if (count($array) > 0) {
			$lessEnd = $lessInit = 10000000000000;//Big numbers for initial validations

			foreach ($array as $key => $evento) {
				//echo "fecha evento:".$evento["fecha_inicio"]." - fecha inicio:".$baseInit;
				//echo "\n";
				//echo strtotime($evento["fecha_inicio"]) - $baseInit;
				//echo "\n";
				if (abs( strtotime($evento["fecha_inicio"]) - $baseInit) < $lessInit) {
					$lessInit = ( strtotime($evento["fecha_inicio"]) - $baseInit);
				}

				//echo "fecha evento (final):".$evento["fecha_fin"]." - fecha fin:".$baseEnd;
				//echo "\n";
				//echo abs($baseEnd - strtotime($evento["fecha_fin"]));
				//echo "\n";
				if ($baseEnd - strtotime($evento["fecha_fin"]) < $lessEnd) {
					$lessEnd = $baseEnd - strtotime($evento["fecha_fin"]);
				}
			}

			if ($baseEnd<0) {
				$baseEnd = 0;
			}
			//echo $lessEnd;
			/*echo "\n";
			echo "Disponible: ".date("Y-m-d\Th:i:s",$baseInit)." hasta ". date("Y-m-d\Th:i:s",$baseInit+$lessInit);
			echo "\n";
			echo "Disponible (End): ".date("Y-m-d\Th:i:s",$baseEnd-$lessEnd)." hasta ". date("Y-m-d\Th:i:s",$baseEnd);
*/
			$result = array();

			//echo "\n";
			//echo "\n";
			//echo "Mod(".$lessInit."): ".($lessInit/600)." - (hora inicio evento) = ".( ($lessInit-600) / 600);
			//echo "\n";
			$temp = $baseInit;
			for ($i=0; $i < ( ($lessInit) / 600); $i++) {
				//echo "\n";
				//echo "disponible => ".date("Y-m-d\Th:i:s",$temp);
				array_push($result, array("disponible" => date("Y-m-d\Th:i:s",$temp)));
				$temp = $temp+600;
			}
			//echo "\n";
			//echo "\n";
			//echo "Mod(".$lessEnd."): ".($lessEnd / 600);
			//echo "\n";
			$temp = $baseEnd-$lessEnd;
			for ($i=0; $i < ( ($lessEnd+600) / 600); $i++) {
				//echo "\n";
				//echo "disponible => ".date("Y-m-d\Th:i:s",$temp);
				array_push($result, array("disponible" => date("Y-m-d\Th:i:s",$temp)));
				$temp = $temp+600;
			}

			return $result;

		}else{

			$result = array();
			$temp = $baseInit;
			for ($i=0; $i < ( ($baseEnd-$baseInit) / 600); $i++) {
				array_push($result, array("disponible" => date("Y-m-d\Th:i:s",$temp)));
				$temp = $temp+600;
			}
			array_push($result, array("disponible" => date("Y-m-d\Th:i:s",$temp)));
			return $result;
		}
	}

	/*
		ENTRADA:

		{ 
		    "fecha_inicio": "2013-03-06T06:30:00",
		    "fecha_fin": "2013-03-07T08:30:00",
		    "motivo": "Torneo Infantil"
		}

	*/
    public  function creaHorarioIndicado($data)
	{
		$fechaOcupada = new FechaOcupada();
		$fechaOcupada->setFechaInicio($data->fecha_inicio);
		$fechaOcupada->setFechaFin($data->fecha_fin);
		$fechaOcupada->setMotivo($data->motivo);
		//$fechaOcupada->setFechaInicio($data->fecha_inicio);

		self::$EntityManager->persist($fechaOcupada);
		self::$EntityManager->flush();

		return $fechaOcupada;
	}

}

?>
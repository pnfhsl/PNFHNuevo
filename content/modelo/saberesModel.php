<?php

	namespace content\modelo;

	use content\config\conection\database as database;

	class saberesModel extends database{
        
       // private $id_SC;
		private $nombreSC; 
		private $trayectoSC;
		private $faseSC; 


		public function __construct(){
			// $this->con = parent::__construct();
			parent::__construct();
		}

		public function validarConsultar($metodo, $data="", $data2=""){
			if($metodo=="Consultar"){
				$result = self::Consultar();
				return $result;
			}
			if($metodo=="getOne"){
				$result = self::getOne($data);
				return $result;
			}
			if($metodo=="getOneId"){
				$result = self::getOneId($data);
				return $result;
			}
			if($metodo=="getSaber"){
				$result = self::getSaber($data, $data2);
				return $result;
			}
		}

		public function ValidarAgregarOModificar($datos, $metodo){
			$res = [];
			$return = 0;
			foreach ($datos as $campo => $valor) {
				$resExp = self::Validate($campo, $valor);
				$return += $resExp;
			}
			if($return==0){
				if($metodo=="Agregar" || $metodo=="agregar"){
					$result = self::Agregar($datos);
				}
				if($metodo=="Modificar" || $metodo=="modificar"){
					$result = self::Modificar($datos);
				}
				return $result;
			}else{
				return ['msj'=>"Invalido"];
			}
		}

		public function validarEliminar($data){
			$result = self::Eliminar($data);
			return $result;
		}

		private function Validate($campo, $valor){
			$pattern = [
				'0' => ['campo'=>"nombreSC",'expresion'=>'/[^0-9 a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú]/'],
				'1' => ['campo'=>"trayectoSC",'expresion'=>'/[^0-9]/'],
				'2' => ['campo'=>"faseSC",'expresion'=>'/[^0-9]/'],
				'3' => ['campo'=>"id_SC",'expresion'=>'/[^0-9]/'],
			];
			foreach ($pattern as $exReg) {
				if($exReg['campo']==$campo){
					$resExp = preg_match_all($exReg['expresion'], $valor);
					// echo "Campo: ".$campo." | Valor: ".$valor." | ";
					// echo "ResExp: ".$resExp;
					// echo "\n";
					return $resExp;
				}
			}
		}

		private function Consultar(){
			try {
				$query = parent::prepare("SELECT * FROM saberes  WHERE estatus = 1");
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}

		private function getOne($dato){
			try {
				$query = parent::prepare('SELECT * FROM saberes WHERE nombreSC = :nombreSC');
				$respuestaArreglo = '';
				$query->execute([':nombreSC'=>$dato]);
				$respuestaArreglo = $query->fetchAll();
				if ($respuestaArreglo += ['estatus' => true]) {
					$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
					$Result['data'] = ['ejecucion'=>true];
					if(count($respuestaArreglo)>1){
						$Result['data'] = $respuestaArreglo;
					}
					// echo json_encode($Result);
					return $Result;
				}
				//return $respuestaArreglo;
				//require_once 'Vista/usuarios.php';
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}
		
		private function getSaber($trayecto, $fase){
			try {
				$query = parent::prepare("SELECT * FROM saberes WHERE trayecto_SC = '{$trayecto}' and fase_SC = '{$fase}'");
				$respuestaArreglo = '';
				$query->execute();
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}

		private function getOneId($dato){
		    try {
				$query = parent::prepare('SELECT * FROM saberes WHERE id_SC = :id_SC');
				$respuestaArreglo = '';
				$query->execute([':id_SC'=>$dato]);
				$respuestaArreglo = $query->fetchAll();
				if ($respuestaArreglo += ['estatus' => true]) {
					$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
					$Result['data'] = ['ejecucion'=>true];
					if(count($respuestaArreglo)>1){
						$Result['data'] = $respuestaArreglo;
					}
					return $Result;
				}
		    } catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
		    }
	    }

		private function Agregar($datos){

			try{

	        $query = parent::prepare('INSERT INTO saberes (nombreSC, trayecto_SC, fase_SC, estatus) VALUES (:nombreSC, :trayecto_SC, :fase_SC, 1)');
	        $query->bindValue(':nombreSC', $datos['nombreSC']);
	        $query->bindValue(':trayecto_SC', $datos['trayectoSC']);
	        $query->bindValue(':fase_SC', $datos['faseSC']);
	        $query->execute();
	        $respuestaArreglo = $query->fetchAll();
	        // print_r($respuestaArreglo);
	        if ($respuestaArreglo += ['estatus' => true]) {
	        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
	        }
	      } catch(PDOException $e){
	      	// print_r($e);
	        	$errorReturn = ['estatus' => false];
	      		$errorReturn['msj'] = "Error";
		        $errorReturn += ['info' => "Error sql:{$e}"];
		        return $errorReturn; 
	      }
		}

		private function Modificar($datos){
			try{
		        $query = parent::prepare('UPDATE saberes SET nombreSC=:nombreSC, trayecto_SC = :trayecto_SC, fase_SC = :fase_SC, estatus = 1 WHERE id_SC = :id_SC');
	            $query->bindValue(':id_SC', $datos['id_SC']);
		        $query->bindValue(':nombreSC', $datos['nombreSC']);
		        $query->bindValue(':trayecto_SC', $datos['trayectoSC']);
		        $query->bindValue(':fase_SC', $datos['faseSC']);
		        $query->execute();
		        $respuestaArreglo = $query->fetchAll();
		        if ($respuestaArreglo += ['estatus' => true]) {
		        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
					return $Result;
		        }
		    } catch(PDOException $e){

		        $errorReturn = ['estatus' => false];
		      		$errorReturn['msj'] = "Error";
			        $errorReturn += ['info' => "Error sql:{$e}"];
			        return $errorReturn; 
		    }
		}

		private function Eliminar($id){
			try {
	        $query = parent::prepare('UPDATE saberes SET estatus = 0 WHERE id_SC = :id_SC');
	        $query->execute([':id_SC'=> $id]);
	        $query->setFetchMode(parent::FETCH_ASSOC);
	        $respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
	        if ($respuestaArreglo += ['estatus' => true]) {
	        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
	          }
	         }
	        catch (PDOException $e)
	        {
	            $errorReturn = ['estatus' => false];
	      		$errorReturn['msj'] = "Error";
	        $errorReturn += ['info' => "Error sql:{$e}"];
	        return $errorReturn; ;
	        }
		}

	}

?>
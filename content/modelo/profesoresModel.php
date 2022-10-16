<?php

	namespace content\modelo;

	use content\config\conection\database as database;
	use PDOException;

	class profesoresModel extends database{

		private $cedula;
		private $nombre; 
		private $apellido;
		private $correo;
		private $telefono;

		public function __construct(){
			// $this->con = parent::__construct();
			parent::__construct();
		}

		public function validarConsultar($metodo, $data=""){
			if($metodo=="Consultar"){
				$result = self::Consultar();
				return $result;
			}
			if($metodo=="getOne"){
				$result = self::getOne($data);
				return $result;
			}
			if($metodo=="BuscarExcel"){
				$result = self::BuscarExcel($data);
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
				'0' => ['campo'=>"cedula",'expresion'=>'/[^0-9]/'],
				'1' => ['campo'=>"nombre",'expresion'=>'/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/'],
				'2' => ['campo'=>"apellido",'expresion'=>'/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/'],
				'3' => ['campo'=>"telefono",'expresion'=>'/[^0-9]/'],
				'4' => ['campo'=>"id",'expresion'=>'/[^0-9]/'],
			];
			// $resExp = 0;
			foreach ($pattern as $exReg) {
				if($exReg['campo']==$campo){
					$resExp = preg_match_all($exReg['expresion'], $valor);
					return $resExp;
				}
			}
		}

		private function Consultar(){
			try {
				$query = parent::prepare('SELECT * FROM profesores WHERE estatus = 1');
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

		private function getOne($cedula){
		      try {
		    	$query = parent::prepare('SELECT * FROM profesores WHERE cedula_profesor = :cedula and estatus = 1');
		    	$respuestaArreglo = '';
		        $query->execute(['cedula'=>$cedula]);
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

		private function BuscarExcel($cedula)
	{
		try {
			$query = parent::prepare("SELECT * FROM profesores WHERE cedula_profesor = :cedula");
			$respuestaArreglo = '';
			$query->execute(['cedula' => $cedula]);
			$respuestaArreglo = $query->fetchAll();
			if (count($respuestaArreglo) == 0) {
				return true;
			}
			return false;
		} catch (PDOException $e) {
			return false;
		}
	}

		public function Cargar($datos){
			$error = 0;

				if (!empty($datos['cedula'])) {
					
						$query = parent::prepare('INSERT INTO profesores (cedula_profesor, 
																	  nombre_profesor, 
																	  apellido_profesor,
																	  telefono_profesor, 
																	  estatus) 
															   VALUES (:cedula_profesor, 
																	   :nombre_profesor, 
																	   :apellido_profesor,
																	   :telefono_profesor, 
																	   1)');
						$query->bindValue(':cedula_profesor', $datos['cedula']);
						$query->bindValue(':nombre_profesor', $datos['nombre']);
						$query->bindValue(':apellido_profesor', $datos['apellido']);
						$query->bindValue(':telefono_profesor', $datos['telef']);
						$res = $query->execute();
						if(!$res){
							$error++;
						}
						$respuestaArreglo = $query->fetchAll();	
				}
			
			if ($respuestaArreglo += ['estatus' => true]) {
				$Result = array('msj' => "Good");		//Si todo esta correcto 
				return $Result;
			}
			else{
				$errorReturn = ['estatus' => false];
				$errorReturn['msj'] = "Error";
				return $errorReturn;
			}
		}
		
		private function Agregar($datos){

			try{
	        $query = parent::prepare('INSERT INTO profesores (cedula_profesor, nombre_profesor, apellido_profesor, telefono_profesor, estatus) VALUES (:cedula_profesor, :nombre_profesor, :apellido_profesor, :telefono_profesor, 1)');
	        $query->bindValue(':cedula_profesor', $datos['cedula']);
	        $query->bindValue(':nombre_profesor', $datos['nombre']);
	        $query->bindValue(':apellido_profesor', $datos['apellido']);
	        $query->bindValue(':telefono_profesor', $datos['telefono']);
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
	        $query = parent::prepare('UPDATE profesores SET cedula_profesor=:cedula_profesor, nombre_profesor = :nombre_profesor, apellido_profesor = :apellido_profesor, telefono_profesor=:telefono_profesor, estatus=1 WHERE cedula_profesor = :cedula_profesor2');
	        $query->bindValue(':cedula_profesor2', $datos['id']);
	        $query->bindValue(':cedula_profesor', $datos['cedula']);
	        $query->bindValue(':nombre_profesor', $datos['nombre']);
	        $query->bindValue(':apellido_profesor', $datos['apellido']);
	        $query->bindValue(':telefono_profesor', $datos['telefono']);
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

		private function Eliminar($cedula){
			try {
	        $query = parent::prepare('UPDATE profesores SET estatus = 0 WHERE cedula_profesor = :cedProfesor');
	        $query->execute(['cedProfesor'=>$cedula]);
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
<?php

	namespace content\modelo;

	use content\config\conection\database as database;
	use PDOException;
	use PhpOffice\PhpSpreadsheet\IOFactory;

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
		public function Consultar(){
			
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

		public function Cargar($fileArchivo){
			// var_dump($fileArchivo);

			$documento = IOFactory::load($fileArchivo);
			// var_dump($documento);

			$hojaProfesor = $documento->getSheet(0);
			$numeroFilas = $hojaProfesor->getHighestDataRow(); 
			// var_dump($numeroFilas);
			$error = 0;

			$profesoresRegistrados = 0;
			for ($i=2; $i <= $numeroFilas; $i++) { 
				$cedula = $hojaProfesor->getCellByColumnAndRow(1,$i);
				$nombre = $hojaProfesor->getCellByColumnAndRow(2,$i);
				$apellido = $hojaProfesor->getCellByColumnAndRow(3,$i);
				$telef = $hojaProfesor->getCellByColumnAndRow(4,$i);
				$status = $hojaProfesor->getCellByColumnAndRow(5,$i);
				// var_dump($cedula);

				if (!empty($cedula)) {
					
						$query = parent::prepare('INSERT INTO profesores (cedula_profesor, 
																	  nombre_profesor, 
																	  apellido_profesor,
																	  telefono_profesor, 
																	  estatus) 
															   VALUES (:cedula_profesor, 
																	   :nombre_profesor, 
																	   :apellido_profesor,
																	   :telefono_profesor, 
																	   :estatus)');
						$query->bindValue(':cedula_profesor', $cedula);
						$query->bindValue(':nombre_profesor', $nombre);
						$query->bindValue(':apellido_profesor', $apellido);
						$query->bindValue(':telefono_profesor', $telef);
						$query->bindValue(':estatus', $status);
						$res = $query->execute();
						// print_r($respuestaArreglo);
						if(!$res){
							$error++;
						}
						$respuestaArreglo = $query->fetchAll();
						
					// } catch (PDOException $e) {
					// 	$error++;
						// $errorReturn = ['estatus' => false];
						// $errorReturn['msj'] = "Error";
						// $errorReturn += ['info' => "Error sql:{$e}"];
						// return $errorReturn; 
					// }				
				}
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

		public function Agregar($datos){

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

		public function Modificar($datos){

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


		public function Eliminar($cedula){
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

		public function getOne($cedula){
		      try {
		    	$query = parent::prepare('SELECT * FROM profesores WHERE cedula_profesor = :cedula');
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


	}

?>
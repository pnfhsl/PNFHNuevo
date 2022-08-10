<?php

	 namespace content\modelo;

	use content\config\conection\database as database;
	use PDOException;
	use PhpOffice\PhpSpreadsheet\IOFactory;

	class alumnosModel extends database{

		private $cedula;
		private $nombre; 
		private $apellido;
		private $correo;
		private $telefono;

		public function __construct(){
			// $this->con = parent::__construct();
			parent::__construct();
		}
		public function Consultar($trayecto=""){
			try {
				if($trayecto==""){
					$query = parent::prepare("SELECT * FROM alumnos WHERE estatus = 1");
				}
				if($trayecto!=""){
					$query = parent::prepare("SELECT * FROM alumnos WHERE estatus = 1 and trayecto_alumno = '{$trayecto}'");
				}
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
			//  var_dump($fileArchivo);

			$documento = IOFactory::load($fileArchivo);
			//  var_dump($documento);

			$hojaAlumno = $documento->getSheet(0);
			$numeroFilas = $hojaAlumno->getHighestDataRow(); 
			// var_dump($numeroFilas);
			$error = 0;
			for ($i=2; $i <= $numeroFilas; $i++) { 
				$cedula = $hojaAlumno->getCellByColumnAndRow(1,$i);
				$nombre = $hojaAlumno->getCellByColumnAndRow(2,$i);
				$apellido = $hojaAlumno->getCellByColumnAndRow(3,$i);
				$telef = $hojaAlumno->getCellByColumnAndRow(4,$i);
				$trayecto = $hojaAlumno->getCellByColumnAndRow(5,$i);
				$status = $hojaAlumno->getCellByColumnAndRow(6,$i);
				// var_dump($cedula);

				if (!empty($cedula)) {
					
						$query = parent::prepare('INSERT INTO alumnos (cedula_alumno, 
																	  nombre_alumno, 
																	  apellido_alumno,
																	  telefono_alumno, 
																	  trayecto_alumno,
																	  estatus) 
															   VALUES (:cedula_alumno, 
																	   :nombre_alumno, 
																	   :apellido_alumno, 
																	   :telefono_alumno, 
																	   :trayecto_alumno, 
																	   :estatus)');
						$query->bindValue(':cedula_alumno', $cedula);
						$query->bindValue(':nombre_alumno', $nombre);
						$query->bindValue(':apellido_alumno', $apellido);
						$query->bindValue(':telefono_alumno', $telef);
						$query->bindValue(':trayecto_alumno', $trayecto);
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
			if (!$error) {
				$Result = array('msj' => "Good");		//Si todo esta correcto 
				return $Result;
			}
			else{
				$errorReturn['msj'] = "Error: Se encontraron $error errores";
				return $errorReturn;
			}

		}

		public function Agregar($datos){

			try{
	        $query = parent::prepare('INSERT INTO alumnos (cedula_alumno, nombre_alumno, apellido_alumno, telefono_alumno, trayecto_alumno, estatus) VALUES (:cedula_alumno, :nombre_alumno, :apellido_alumno, :telefono_alumno, :trayecto_alumno, 1)');
	        $query->bindValue(':cedula_alumno', $datos['cedula']);
	        $query->bindValue(':nombre_alumno', $datos['nombre']);
	        $query->bindValue(':apellido_alumno', $datos['apellido']);
	        // $query->bindValue(':correo_alumno', $datos['correo']);
	        $query->bindValue(':telefono_alumno', $datos['telefono']);
	        $query->bindValue(':trayecto_alumno', $datos['trayecto']);
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
	        $query = parent::prepare('UPDATE alumnos SET cedula_alumno=:cedula_alumno, nombre_alumno = :nombre_alumno, apellido_alumno = :apellido_alumno, telefono_alumno=:telefono_alumno, trayecto_alumno=:trayecto_alumno, estatus=1 WHERE cedula_alumno = :cedula_alumno2');
	        $query->bindValue(':cedula_alumno2', $datos['id']);
	        $query->bindValue(':cedula_alumno', $datos['cedula']);
	        $query->bindValue(':nombre_alumno', $datos['nombre']);
	        $query->bindValue(':apellido_alumno', $datos['apellido']);
	        $query->bindValue(':telefono_alumno', $datos['telefono']);
	        $query->bindValue(':trayecto_alumno', $datos['trayecto']);
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
	        $query = parent::prepare('UPDATE alumnos SET estatus = 0 WHERE cedula_alumno = :cedAlumno');
	        $query->execute(['cedAlumno'=>$cedula]);
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
		    	$query = parent::prepare('SELECT * FROM alumnos WHERE cedula_alumno = :cedula');
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
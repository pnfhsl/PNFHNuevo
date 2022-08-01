<?php

	namespace content\modelo;

	use content\config\conection\database as database;

	class seccionesModel extends database{

		private $cedula;
		private $cedulaAnt;
		private $nombre; 
		private $apellido;
		private $telefono;
		private $email;
		private $grupo;
		private $grupoeqp;
		private $aprobI;
		private $aprobII;

		public function __construct(){
			// $this->con = parent::__construct();
			parent::__construct();
		}
		public function Consultar(){
			
			try {
				$query = parent::prepare('SELECT * FROM secciones, periodos WHERE periodos.id_periodo = secciones.id_periodo and periodos.estatus = 1 and secciones.estatus = 1');
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

		public function ConsultarSeccionAlumnos(){
			try {
				$query = parent::prepare("SELECT * FROM periodos, secciones, seccion_alumno, alumnos WHERE periodos.id_periodo = secciones.id_periodo and secciones.cod_seccion = seccion_alumno.cod_seccion and seccion_alumno.cedula_alumno=alumnos.cedula_alumno and alumnos.estatus = 1 and periodos.estatus = 1 and secciones.estatus = 1");
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

		// public function ConsultarSeccionAlumnos2(){
		// 	try {
		// 		$query = parent::prepare("SELECT DISTINCT secciones.cod_seccion, nombre_seccion, trayecto_seccion FROM periodos, secciones, seccion_alumno, alumnos WHERE periodos.id_periodo = secciones.id_periodo and secciones.cod_seccion = seccion_alumno.cod_seccion and seccion_alumno.cedula_alumno=alumnos.cedula_alumno and alumnos.estatus = 1 and periodos.estatus = 1 and secciones.estatus = 1");
		// 		$respuestaArreglo = '';
		// 		$query->execute();
		// 		$query->setFetchMode(parent::FETCH_ASSOC);
		// 		$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
		// 		return $respuestaArreglo;
		// 	} catch (PDOException $e) {
		// 		$errorReturn = ['estatus' => false];
		// 		$errorReturn += ['info' => "error sql:{$e}"];
		// 		return $errorReturn;
		// 	}
		// }

		public function AgregarSecAlumno($datos){
           try{
           	   $query = parent:: prepare('INSERT INTO seccion_alumno (id_SA, cod_seccion, cedula_alumno, estatus) VALUES (DEFAULT, :cod_seccion, :cedula_alumno, 1)');

                $query->bindValue(':cod_seccion', $datos['cod_seccion']);
				$query->bindValue(':cedula_alumno', $datos['cedula_alumno']);
		            
				$query->execute();
				$respuestasArreglo = $query->fetchAll();

				if($respuestasArreglo += ['estatus' => true]) {
					$Result = array ('msj' => 'Good');
				}


				return $Result;
			} catch(PDOException $e){
				$errorReturn = ['estatus' => false];
				$errorReturn['msj'] = "Error";
				$errorReturn += ['info' => "Error sql:{$e}"];
				return $errorReturn; 
			}
          }
		

		public function Agregar($datos){
			try{
				$query = parent::prepare('INSERT INTO secciones (cod_seccion, id_periodo, nombre_seccion, trayecto_seccion, estatus) VALUES (:cod_seccion, :id_periodo, :nombre_seccion, :trayecto_seccion, 1)');

				$query->bindValue(':cod_seccion', $datos['id']);
				$query->bindValue(':nombre_seccion', $datos['seccion']);
		    	$query->bindValue(':trayecto_seccion', $datos['trayecto']);
		    	$query->bindValue(':id_periodo', $datos['id_periodo']);
		            
				$query->execute();
				$respuestasArreglo = $query->fetchAll();

				if($respuestasArreglo += ['estatus' => true]) {
					$Result = array ('msj' => 'Good');
				}


				return $Result;
			} catch(PDOException $e){
				$errorReturn = ['estatus' => false];
				$errorReturn['msj'] = "Error";
				$errorReturn += ['info' => "Error sql:{$e}"];
				return $errorReturn; 
			}
		}


		public function Modificar($datos){
			try{
				$query = parent::prepare('UPDATE secciones SET id_periodo = :id_periodo, nombre_seccion=:nombre_seccion, trayecto_seccion = :trayecto_seccion, estatus=1 WHERE cod_seccion = :cod_seccion');
				$query->bindValue(':cod_seccion', $datos['id']);
				$query->bindValue(':nombre_seccion', $datos['seccion']);
		    	$query->bindValue(':trayecto_seccion', $datos['trayecto']);
		    	$query->bindValue(':id_periodo', $datos['id_periodo']);
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


		public function Eliminar($cod){
			try {
				$query = parent::prepare('UPDATE secciones SET estatus = 0 WHERE cod_seccion = :cod');
				$query->execute(['cod'=>$cod]);
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
				if ($respuestaArreglo += ['estatus' => true]) {
					$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
					return $Result;
				}
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn['msj'] = "Error";
				$errorReturn += ['info' => "Error sql:{$e}"];
				return $errorReturn; ;
			}
		}

		public function EliminarSeccionAlumno($cod){
			try {
				$query = parent::prepare('DELETE FROM seccion_alumno WHERE cod_seccion = :cod');
				$query->execute(['cod'=>$cod]);
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
				if ($respuestaArreglo += ['estatus' => true]) {
					$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
					return $Result;
				}
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn['msj'] = "Error";
				$errorReturn += ['info' => "Error sql:{$e}"];
				return $errorReturn; ;
			}
		}

		function ExtraerPK($codSeccion){
			// echo $codSeccion." --- ";
			$numss = $this::ConsultaPK($codSeccion);
			// print_r($numss);
			$numMax = 0;
			if(count($numss)>1){
				$len = strlen($codSeccion);
				// echo $len;
				foreach ($numss as $key) {
					if(!empty($key['cod_seccion'])){
						$n = substr($key['cod_seccion'], $len);
						if($n > $numMax){
							$numMax = $n;
						}
					}
				}
			}
			$numero = $numMax+1;
			// echo $numero;
			$codSeccion .= $numero;
			return $codSeccion;
		}

		public function ConsultaPK($codSeccion){
			try {
				$query = parent::prepare("SELECT * FROM secciones WHERE estatus = 1 and cod_seccion LIKE '%{$codSeccion}%'");
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				$respuestaArreglo += ['estatus' => true];
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}

		public function getOne($cod){
			try {
				$query = parent::prepare("SELECT * FROM secciones WHERE cod_seccion = :cod");
				$query->bindValue(':cod', $cod);
				$respuestaArreglo = '';
				$query->execute();
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
		
		public function getOneData($datos){
		      try {
		    	$query = parent::prepare("SELECT * FROM secciones WHERE nombre_seccion = :seccion and trayecto_seccion = :trayecto and id_periodo = :id_periodo");
		    	$query->bindValue(':seccion', $datos['seccion']);
		    	$query->bindValue(':trayecto', $datos['trayecto']);
		    	$query->bindValue(':id_periodo', $datos['id_periodo']);
		    	$respuestaArreglo = '';
		        $query->execute();
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
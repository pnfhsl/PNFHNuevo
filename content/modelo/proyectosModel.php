<?php

	namespace content\modelo;

	use content\config\conection\database as database;

	class proyectosModel extends database{

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
				$query = parent::prepare("SELECT * FROM proyectos WHERE proyectos.estatus = 1");
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

		public function ConsultarGrupos(){
			
			try {
				$query = parent::prepare("SELECT * FROM proyectos, grupos, seccion_alumno, alumnos WHERE proyectos.cod_proyecto = grupos.cod_proyecto and grupos.id_SA = seccion_alumno.id_SA and seccion_alumno.cedula_alumno = alumnos.cedula_alumno and proyectos.estatus = 1 and grupos.estatus = 1 and alumnos.estatus = 1");
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

		public function ConsultarGrupos2(){
			
			try {
				$query = parent::prepare("SELECT DISTINCT proyectos.cod_proyecto, seccion_alumno.cod_seccion FROM proyectos, grupos, seccion_alumno, alumnos WHERE proyectos.cod_proyecto = grupos.cod_proyecto and grupos.id_SA = seccion_alumno.id_SA and seccion_alumno.cedula_alumno = alumnos.cedula_alumno and proyectos.estatus = 1 and grupos.estatus = 1 and alumnos.estatus = 1");
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

		public function Agregar($datos){
			try{
				$query = parent::prepare("INSERT INTO proyectos (cod_proyecto, titulo_proyecto, trayecto_proyecto, estatus) VALUES (:cod_proyecto, :titulo_proyecto, :trayecto_proyecto, 1)");

				$query->bindValue(':cod_proyecto', $datos['id']);
				$query->bindValue(':titulo_proyecto', $datos['nombre']);
		    	$query->bindValue(':trayecto_proyecto', $datos['trayecto']);
		            
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

		public function AgregarGrupo($data){
			try{
				$query = parent::prepare("INSERT INTO grupos (cod_grupo, id_SA, cod_proyecto, estatus) VALUES (:cod_grupo, :id_SA, :cod_proyecto, 1)");

				$query->bindValue(':cod_grupo', $data['cod_grupo']);
		    	$query->bindValue(':id_SA', $data['id_SA']);
				$query->bindValue(':cod_proyecto', $data['cod_proyecto']);
		            
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
				$query = parent::prepare('UPDATE proyectos SET titulo_proyecto = :titulo_proyecto, trayecto_proyecto=:trayecto_proyecto, estatus=1 WHERE cod_proyecto = :cod_proyecto');
				$query->bindValue(':titulo_proyecto', $datos['nombre']);
				$query->bindValue(':trayecto_proyecto', $datos['trayecto']);
		    	$query->bindValue(':cod_proyecto', $datos['id']);
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
				$query = parent::prepare('UPDATE proyectos SET estatus = 0 WHERE cod_proyecto = :cod');
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

		public function EliminarGrupos($cod){
			try {
				$query = parent::prepare('DELETE FROM grupos WHERE cod_proyecto = :cod');
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

		function ExtraerPK($codProyecto){
			// echo $codSeccion." --- ";
			$numss = $this::ConsultaPK($codProyecto);
			// print_r($numss);
			$numMax = 0;
			if(count($numss)>1){
				$len = strlen($codProyecto);
				// echo $len;
				foreach ($numss as $key) {
					if(!empty($key['cod_proyecto'])){
						$n = substr($key['cod_proyecto'], $len);
						if($n > $numMax){
							$numMax = $n;
						}
					}
				}
			}
			$numero = $numMax+1;
			// echo $numero;
			$codProyecto .= $numero;
			return $codProyecto;
		}

		function ExtraerPKGrupo($codGrupo){
			$numss = $this::ConsultaPKGrupo($codGrupo);
			$numMax = 0;
			if(count($numss)>1){
				$len = strlen($codGrupo);
				foreach ($numss as $key) {
					if(!empty($key['cod_grupo'])){
						$n = substr($key['cod_grupo'], $len);
						if($n > $numMax){
							$numMax = $n;
						}
					}
				}
			}
			$numero = $numMax+1;
			$codGrupo .= $numero;
			return $codGrupo;
		}

		public function ConsultaPK($codProyecto){
			try {
				$query = parent::prepare("SELECT * FROM proyectos WHERE estatus = 1 and cod_proyecto LIKE '%{$codProyecto}%'");
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
		public function ConsultaPKGrupo($codGrupo){
			try {
				$query = parent::prepare("SELECT * FROM grupos WHERE estatus = 1 and cod_grupo LIKE '%{$codGrupo}%'");
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
				$query = parent::prepare("SELECT * FROM proyectos WHERE cod_proyecto = :cod");
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
		    	$query = parent::prepare("SELECT * FROM proyectos WHERE titulo_proyecto = :nombre and trayecto_proyecto = :trayecto");
		    	$query->bindValue(':nombre', $datos['nombre']);
		    	$query->bindValue(':trayecto', $datos['trayecto']);
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

	    public function getOneDataGrupo($datos){
		      try {
		    	$query = parent::prepare("SELECT * FROM proyectos WHERE titulo_proyecto = :nombre and trayecto_proyecto = :trayecto");
		    	$query->bindValue(':nombre', $datos['nombre']);
		    	$query->bindValue(':trayecto', $datos['trayecto']);
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
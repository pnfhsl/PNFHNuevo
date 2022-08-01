<?php

	namespace content\modelo;

	use content\config\conection\database as database;

	class periodosModel extends database{

		private $nombre_periodo;
		private $year_periodo;
		private $fecha_apertura;
		private $fecha_cierre;

		public function __construct(){
			parent::__construct();
		}
		
		public function Consultar(){
			
			try {

				$query = parent::prepare('SELECT * FROM periodos WHERE estatus = 1');
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
				$query = parent::prepare('INSERT INTO periodos (id_periodo, nombre_periodo, year_periodo, fecha_apertura, fecha_cierre, estatus) VALUES (DEFAULT, :nombre_periodo, :year_periodo, :fecha_apertura, :fecha_cierre, 1)');

				// $query->bindValue(':nombre_periodo', $datos['nombrePr']);
				$query->bindValue(':nombre_periodo', $datos['numeroPr']);				
				$query->bindValue(':year_periodo', $datos['yearPeriodo']);
				$query->bindValue(':fecha_apertura', $datos['fechaAP']);
				$query->bindValue(':fecha_cierre', $datos['fechaAC']);
		            
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
		        $query = parent::prepare('UPDATE periodos SET nombre_periodo=:nombre_periodo, year_periodo = :year_periodo, fecha_apertura = :fecha_apertura, fecha_cierre = :fecha_cierre , estatus = 1 WHERE id_periodo = :id_periodo');

	            $query->bindValue(':id_periodo', $datos['id_periodo']);
		        // $query->bindValue(':nombre_periodo', $datos['nombrePr']);
				$query->bindValue(':nombre_periodo', $datos['numeroPr']);
		        $query->bindValue(':year_periodo', $datos['yearPeriodo']);
		        $query->bindValue(':fecha_apertura', $datos['fechaAP']);
		        $query->bindValue(':fecha_cierre', $datos['fechaAC']);
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
		public function Eliminar($id){
			try {
		        $query = parent::prepare('UPDATE periodos SET estatus = 0 WHERE id_periodo = :id_periodo');
		        $query->execute([':id_periodo'=> $id]);
		        $query->setFetchMode(parent::FETCH_ASSOC);
		        $respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
		        if ($respuestaArreglo += ['estatus' => true]) {
		        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
					return $Result;
		          }
		    }
		    catch (PDOException $e){
		            $errorReturn = ['estatus' => false];
		      		$errorReturn['msj'] = "Error";
		        $errorReturn += ['info' => "Error sql:{$e}"];
		        return $errorReturn; ;
		    }
		}
		public function getOne($numero, $year){
			try {
			    $query = parent::prepare('SELECT * FROM periodos WHERE nombre_periodo = :numeroPr and year_periodo = :yearPR');
			    $respuestaArreglo = '';
				$query->execute([':numeroPr'=>$numero, ':yearPR'=>$year]);
				$respuestaArreglo = $query->fetchAll();
				if ($respuestaArreglo += ['estatus' => true]) {
					$Result = array('msj' => "Good"); //Si todo esta correcto y consigue al usuario
					$Result['data'] = ['ejecucion'=>true];
					if(count($respuestaArreglo)>1){
						$Result['data'] = $respuestaArreglo;
					}
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

		public function getOneId($dato){
			try {
			    $query = parent::prepare('SELECT * FROM periodos WHERE id_periodo = :id_periodo');
			    $respuestaArreglo = '';
				$query->execute([':id_periodo'=>$dato]);
				$respuestaArreglo = $query->fetchAll();
				if ($respuestaArreglo += ['estatus' => true]) {
					$Result = array('msj' => "Good"); //Si todo esta correcto y consigue al usuario
					$Result['data'] = ['ejecucion'=>true];
					if(count($respuestaArreglo)>1){
						$Result['data'] = $respuestaArreglo;
					}
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

		public function arreglarFecha($date){
			$anio = substr($date, 0, 4);
			$mes = substr($date, 5, 2);
			$dia = substr($date, 8, 2);
			$fecha = $dia.'-'.$mes.'-'.$anio;
			return $fecha;
		}
	
	}






		







	

?>
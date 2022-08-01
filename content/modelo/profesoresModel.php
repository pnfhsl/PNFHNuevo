<?php

	namespace content\modelo;

	use content\config\conection\database as database;

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

		public function setAgregar($datos){
			$this->cedula = $datos['cedula'];
			$this->nombre = $datos['nombre'];
			$this->apellido = $datos['apellido'];
			$this->correo = $datos['correo'];
			$this->telefono = $datos['telefono'];
			$this->Agregar();
		}

		public function Agregar($datos){

			try{
	        $query = parent::prepare('INSERT INTO profesores (cedula_profesor, nombre_profesor, apellido_profesor,correo_profesor,telefono_profesor, estatus) VALUES (:cedula_profesor, :nombre_profesor, :apellido_profesor, :correo_profesor, :telefono_profesor, 1)');
	        $query->bindValue(':cedula_profesor', $datos['cedula']);
	        $query->bindValue(':nombre_profesor', $datos['nombre']);
	        $query->bindValue(':apellido_profesor', $datos['apellido']);
	        $query->bindValue(':correo_profesor', $datos['correo']);
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
	        $query = parent::prepare('UPDATE profesores SET cedula_profesor=:cedula_profesor, nombre_profesor = :nombre_profesor, apellido_profesor = :apellido_profesor, correo_profesor = :correo_profesor, telefono_profesor=:telefono_profesor, estatus=1 WHERE cedula_profesor = :cedula_profesor2');
	        $query->bindValue(':cedula_profesor2', $datos['id']);
	        $query->bindValue(':cedula_profesor', $datos['cedula']);
	        $query->bindValue(':nombre_profesor', $datos['nombre']);
	        $query->bindValue(':apellido_profesor', $datos['apellido']);
	        $query->bindValue(':correo_profesor', $datos['correo']);
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
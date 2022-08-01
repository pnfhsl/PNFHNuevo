<?php

	namespace content\modelo;

	use content\config\conection\database as database;

	class usuariosModel extends database{

		private $cedula;
		private $user;
		private $password; 
		

		public function __construct(){
			// $this->con = parent::__construct();
			parent::__construct();
		}
		public function Consultar(){
			
			try {
				$query = parent::prepare('SELECT * FROM usuarios WHERE estatus = 1');
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
	        $query = parent::prepare("INSERT INTO usuarios (cedula_usuario, nombre_usuario, password_usuario, id_rol, estatus) VALUES (:cedula_usuario, :nombre_usuario, md5(:password_usuario), :id_rol, 1)");
	        $query->bindValue(':cedula_usuario', $datos['cedula']);
	        $query->bindValue(':nombre_usuario', $datos['user']);
	        $query->bindValue(':password_usuario', $datos['pass']);
	        $query->bindValue(':id_rol', $datos['rol']);
	        $query->execute();
	        $respuestaArreglo = $query->fetchAll();
	        if ($respuestaArreglo += ['estatus' => true]) {
	        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
				// echo json_encode($Result);
	        }
	        //$respuestaArreglo += ['estatus' => true];	        
	        //return $respuestaArreglo;
	      } catch(PDOException $e){

	        $errorReturn = ['estatus' => false];
		        $errorReturn += ['info' => "Error sql:{$e}"];
		        return $errorReturn; 
	      }
		}


		public function Modificar($datos){

			try{
				if (isset($datos['nuevoPassword']) && $datos['nuevoPassword'] != "") {
					$query = parent::prepare('UPDATE usuarios SET cedula_usuario=:cedula_usuario, nombre_usuario = :nombre_usuario, password_usuario = md5(:password_usuario), id_rol = :id_rol, estatus=1 WHERE cedula_usuario = :cedula_usuario2');
					$query->bindValue(':password_usuario', $datos['nuevoPassword']);
				}else{
			        $query = parent::prepare('UPDATE usuarios SET cedula_usuario=:cedula_usuario, nombre_usuario = :nombre_usuario, id_rol = :id_rol, estatus=1 WHERE cedula_usuario = :cedula_usuario2');
				}
	        $query->bindValue(':cedula_usuario2', $datos['id']);
	        $query->bindValue(':cedula_usuario', $datos['cedula']);
	        $query->bindValue(':nombre_usuario', $datos['nombre']);
	        // $query->bindValue(':password_usuario', $datos['nuevoPassword']);
	        $query->bindValue(':id_rol', $datos['rol']);
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
	        $query = parent::prepare('UPDATE usuarios SET estatus = 0 WHERE cedula_usuario = :cedula');
	        $query->execute(['cedula'=>$cedula]);
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
	        $errorReturn += ['info' => "Error sql:{$e}"];
	        return $errorReturn; ;
	        }
		}



		public function getOne($cedula){
		      try {
		    	$query = parent::prepare('SELECT * FROM usuarios WHERE cedula_usuario = :cedula');
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
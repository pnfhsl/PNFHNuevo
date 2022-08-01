<?php

	 namespace content\modelo;

	use content\config\conection\database as database;

	class rolesModel extends database{

		private $id_rol; 
		private $nombre_rol;
		private $estatus; 
		private $accesos;

		private $id_modulo;
		private $id_permiso;

		public function __construct(){
			// $this->con = parent::__construct();
			parent::__construct();
		}
		public function Consultar(){
			
			try {
				$query = parent::prepare('SELECT * FROM roles WHERE estatus = 1');
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

		public function ConsultarAccesos(){
			
			try {
				$query = parent::prepare('SELECT * FROM accesos WHERE estatus = 1');
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
			$this->nombre_rol = $datos['nombre'];
			return $this->Agregar();
		}
		private function Agregar(){

			try{
	        $query = parent::prepare('INSERT INTO roles (id_rol, nombre_rol, estatus) VALUES (DEFAULT, :nombre_rol, 1)');
	        $query->bindValue(':nombre_rol', $this->nombre_rol);
	        $query->execute();
	        $respuestaArreglo = $query->fetchAll();
	        if ($respuestaArreglo += ['estatus' => true]) {
	        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
	        	$id = $this->getLastId("roles", "id_rol");
		        if($respuestaArreglo['estatus']==true){
		        	$Result['data']['ejecucion']=true;
					$Result['data']['id'] = $id;
		        }
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


		public function setAgregarAccesos($data){
			$this->id_rol = $data['id_rol'];
			$this->id_modulo = $data['id_modulo'];
			$this->id_permiso = $data['id_permiso'];
			return $this->AgregarAccesos();
		}
		private function AgregarAccesos(){

			try{
	        $query = parent::prepare('INSERT INTO accesos (id_accesos, id_rol, id_modulo, id_permiso, estatus) VALUES (DEFAULT, :id_rol, :id_modulo, :id_permiso, 1)');
	        $query->bindValue(':id_rol', $this->id_rol);
	        $query->bindValue(':id_modulo', $this->id_modulo);
	        $query->bindValue(':id_permiso', $this->id_permiso);
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


		public function setModificar($datos){
			$this->id_rol = $datos['id_rol'];
			$this->nombre_rol = $datos['nombre'];
			return $this->Modificar();
		}
		private function Modificar(){

			try{
	        $query = parent::prepare('UPDATE roles SET nombre_rol=:nombre_rol, estatus=1 WHERE id_rol = :id_rol');
	        $query->bindValue(':nombre_rol', $this->nombre_rol);
	        $query->bindValue(':id_rol', $this->id_rol);
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


		public function setEliminar($data){
			// print_r($data);
			$this->id_rol = $data['id_rol'];
			return $this->Eliminar();
		}
		private function Eliminar(){
			try {
	        $query = parent::prepare('UPDATE roles SET estatus = 0 WHERE id_rol = :id_rol');
	        $query->execute(['id_rol'=>$this->id_rol]);
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

		public function setEliminarAccesosP($data){
			$this->id_rol = $data['id_rol'];
			return $this->EliminarAccesosP();
		}
		private function EliminarAccesosP(){
			try {
	        $query = parent::prepare('DELETE FROM accesos WHERE id_rol = :id_rol');
	        $query->execute(['id_rol'=>$this->id_rol]);
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

		public function getOne($nombre){
		      try {
		    	$query = parent::prepare('SELECT * FROM roles WHERE nombre_rol = :nombre');
		    	$respuestaArreglo = '';
		        $query->execute(['nombre'=>$nombre]);
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
	    public function getOneId($id){
		      try {
		    	$query = parent::prepare('SELECT * FROM roles WHERE id_rol = :id_rol');
		    	$respuestaArreglo = '';
		        $query->execute(['id_rol'=>$id]);
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

		private function getLastId($tabla,$id){
			//$sql='SELECT '.$id.' FROM '.$tabla.' ORDER BY '.$id.' desc';
			$sql='SELECT MAX('.$id.') as id FROM '.$tabla;
			try{
				$exe = parent::prepare($sql);
				$exe->execute();
				$result = $exe->fetchAll();
				return $result[0]['id'];
			}catch(PDOException $e){
				echo "Error al consultar el Id de la tabla $tabla <br>";
				echo $e;
			}
		}

	}

?>
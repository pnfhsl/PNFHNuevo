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

		public function validarConsultar($metodo, $data=""){
			if($metodo=="Consultar"){
				$result = self::Consultar();
				return $result;
			}
			if($metodo=="ConsultarAccesos"){
				$result = self::ConsultarAccesos($data);
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
				if($metodo=="AgregarAccesos" || $metodo=="agregaraccesos"){
					$result = self::AgregarAccesos($datos);
				}
				if($metodo=="Modificar" || $metodo=="modificar"){
					$result = self::Modificar($datos);
				}
				return $result;
			}else{
				return ['msj'=>"Invalido"];
			}
		}
		
		public function validarEliminar($metodo, $data){
			if($metodo=="Eliminar"){
				$result = self::Eliminar($data);
				return $result;
			}
			if($metodo=="EliminarAccesosP"){
				$result = self::EliminarAccesosP($data);
				return $result;
			}
		}

		private function Validate($campo, $valor){
			$pattern = [
				'0' => ['campo'=>"nombre",'expresion'=>'/[^0-9 a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/'],
				'1' => ['campo'=>"id_rol",'expresion'=>'/[^0-9]/'],
			];
			// $resExp = 0;
			foreach ($pattern as $exReg) {
				if($exReg['campo']==$campo){
					$resExp = preg_match_all($exReg['expresion'], $valor);
					// echo "Campo: ".$campo." | Valor: ".$valor." | ";
					// echo "ResExp: ".$resExp." | ";
					// echo "\n\n";
					return $resExp;
				}
			}
		}

		private function Consultar(){
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

		private function ConsultarAccesos($id_rol=""){
			try {
				if($id_rol==""){
					$query = parent::prepare("SELECT * FROM accesos WHERE estatus = 1");
				}else{
					$query = parent::prepare("SELECT * FROM accesos, roles, permisos, modulos WHERE roles.id_rol = accesos.id_rol and permisos.id_permiso = accesos.id_permiso and modulos.id_modulo = accesos.id_modulo and roles.estatus = 1 and permisos.estatus = 1 and modulos.estatus = 1 and accesos.estatus = 1 and accesos.id_rol = {$id_rol}");
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

		private function getOne($nombre){
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

	    private function getOneId($id){
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

		private function Agregar($datos){
			try{
	        $query = parent::prepare('INSERT INTO roles (id_rol, nombre_rol, estatus) VALUES (DEFAULT, :nombre_rol, 1)');
	        $query->bindValue(':nombre_rol', $datos['nombre']);
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

		private function AgregarAccesos($data){

			try{
	        $query = parent::prepare('INSERT INTO accesos (id_accesos, id_rol, id_modulo, id_permiso, estatus) VALUES (DEFAULT, :id_rol, :id_modulo, :id_permiso, 1)');
	        $query->bindValue(':id_rol', $data['id_rol']);
	        $query->bindValue(':id_modulo', $data['id_modulo']);
	        $query->bindValue(':id_permiso', $data['id_permiso']);
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
		        $query = parent::prepare('UPDATE roles SET nombre_rol=:nombre_rol, estatus=1 WHERE id_rol = :id_rol');
		        $query->bindValue(':nombre_rol', $datos['nombre']);
		        $query->bindValue(':id_rol', $datos['id_rol']);
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

		private function Eliminar($data){
			try {
	        $query = parent::prepare('UPDATE roles SET estatus = 0 WHERE id_rol = :id_rol');
	        $query->execute(['id_rol'=>$data['id_rol']]);
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

		private function EliminarAccesosP($data){
			try {
	        $query = parent::prepare("DELETE FROM accesos WHERE id_rol = :id_rol");
	        $query->execute(['id_rol'=>$data['id_rol']]);
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
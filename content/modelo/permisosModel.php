<?php

	namespace content\modelo;

	use content\config\conection\database as database;

	class permisosModel extends database{
		private $nombre; 

		public function __construct(){
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
			if($metodo=="getOneNombre"){
				$result = self::getOneNombre($data);
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
				'0' => ['campo'=>"nombre",'expresion'=>'/[^0-9 a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/'],
				'1' => ['campo'=>"id",'expresion'=>'/[^0-9]/'],
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
				$query = parent::prepare('SELECT * FROM permisos WHERE estatus = 1');
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

		private function getOne($id){
		      try {
		    	$query = parent::prepare('SELECT * FROM permisos WHERE id_permiso = :id');
		    	$respuestaArreglo = '';
		        $query->execute(['id'=>$id]);
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

	    private function getOneNombre($nombre){
		      try {
		    	$query = parent::prepare('SELECT * FROM permisos WHERE nombre_permiso = :id');
		    	$respuestaArreglo = '';
		        $query->execute(['id'=>$nombre]);
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
	        $query = parent::prepare('INSERT INTO permisos (id_permiso, nombre_permiso, estatus) VALUES (DEFAULT , :nombre_permiso, 1)');
	        $query->bindValue(':nombre_permiso', $datos['nombre']);
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
	        $query = parent::prepare('UPDATE permisos SET nombre_permiso = :nombre_permiso, estatus=1 WHERE id_permiso = :id_permiso');
	        $query->bindValue(':id_permiso', $datos['id']);
	        $query->bindValue(':nombre_permiso', $datos['nombre']);
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

		private function Eliminar($id){
			try {
	        $query = parent::prepare('UPDATE permisos SET estatus = 0 WHERE id_permiso = :id_permiso');
	        $query->execute(['id_permiso'=>$id]);
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
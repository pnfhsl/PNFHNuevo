<?php

	namespace content\modelo;

	use content\config\conection\database as database;

	class homeModel extends database{

		private $con;

		public function __construct(){
			$this->con = parent::__construct();
		}
		public function Consultar(){
			try {
				$query = parent::prepare("SELECT * FROM llaves WHERE llaves.estatus = 1");
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				// $respuestaArreglo += ['estatus' => true];
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}

		public function Agregar($datos){

			try{
	        $query = parent::prepare("INSERT INTO llaves (id_key, public_key, private_key, firma_digital, estatus) VALUES (1, :public, :private, :firma, 1)");
	        $query->bindValue(':public', $datos['public']);
	        $query->bindValue(':private', $datos['private']);
	        $query->bindValue(':firma', $datos['firma']);

	        $query->execute();
	        $respuestaArreglo = $query->fetchAll();
	        /*print_r($datos['id']);
	        print_r($respuestaArreglo);
	        */
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

	}

?>
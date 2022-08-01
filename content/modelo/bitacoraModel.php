<?php

	 namespace content\modelo;

	use content\config\conection\database as database;

	class bitacoraModel extends database{

		private $cedula;
		private $nombre; 
		private $apellido;
		private $correo;
		private $telefono;

		public function __construct(){
			parent::__construct();
		}
		public function Consultar(){
			
			try {
				$query = parent::prepare('SELECT id_bitacora, cedula_usuario, modulo_bitacora, accion_bitacora, fecha_bitacora, hora_bitacora FROM bitacora ORDER BY id_bitacora ASC');
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


		public function Agregar($date){

			try{
	        $query = parent::prepare('INSERT INTO bitacora (id_bitacora, cedula_usuario, modulo_bitacora, accion_bitacora, fecha_bitacora, hora_bitacora, estatus) VALUES (DEFAULT, :cedula_usuario, :modulo_bitacora, :accion_bitacora, :fecha_bitacora, :hora_bitacora, 1)');
	        $query->bindValue(':cedula_usuario', $date['cedula_usuario']);
	        $query->bindValue(':modulo_bitacora', $date['modulo_bitacora']);
	        $query->bindValue(':accion_bitacora', $date['accion_bitacora']);
	        $query->bindValue(':fecha_bitacora', $date['fecha_bitacora']);
	        $query->bindValue(':hora_bitacora', $date['hora_bitacora']);
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

	}

?>
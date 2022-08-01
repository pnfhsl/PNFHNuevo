<?php

	namespace content\modelo;

	use mysqli as mysqli;
	use content\config\conection\database as database;

	class reportesModel extends database{

		public $fecha;
		public $mysqlImportFilename;

		public function __construct(){			
			parent::__construct();
			
		}
		public function Aprobacion(){
			
			try {
				$query = parent::prepare('SELECT * FROM notas WHERE estatus = 1');
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

		

	}

?>
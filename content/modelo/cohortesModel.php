<?php

	namespace content\modelo;

	use content\config\conection\database as database;

	class cohortesModel extends database{

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
				$query = parent::prepare('SELECT * FROM cohortes WHERE estatus = 1');
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
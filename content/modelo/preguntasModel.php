<?php

	namespace content\modelo;

	use content\config\conection\database as database;
	use PDOException;

	class preguntasModel extends database{

		private $con;

		public function __construct(){
			$this->con = parent::__construct();
		}

		public function Consultar()
	{

		try {
			$query = parent::prepare('SELECT * FROM preguntas WHERE status = 1');
			$respuestaArreglo = '';
			$query->execute();
			$query->setFetchMode(parent::FETCH_ASSOC);
			$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
			$respuestaArreglo += ['estatus' => true];
			return $respuestaArreglo;
		} catch (PDOException $e) {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => "error sql:{$e}"];
			return $errorReturn;
		}
	}

		// public function Agregar($datos){

		// 	try{
		// 	$query = parent::prepare('INSERT INTO preguntas (cedula, pregunta_uno, respuesta_uno,pregunta_dos,respuesta_dos, pregunta_tres, respuesta_tres) VALUES (:cedula, :pregunta_uno, :respuesta_uno,:pregunta_dos, :respuesta_dos, :pregunta_tres, :respuesta_tres)');
		// 	$query->bindValue(':cedula', $datos['cedula']);
		// 	$query->bindValue(':pregunta_uno', $datos['nombre']);
		// 	$query->bindValue(':respuesta_uno', $datos['apellido']);
		// 	$query->bindValue(':pregunta_dos', $datos['correo']);
		// 	$query->bindValue(':respuesta_dos', $datos['telefono']);
		// 	$query->bindValue(':pregunta_tres', $datos['trayecto']);
		// 	$query->bindValue(':respuesta_tres', $datos['trayecto']);
		// 	$query->execute();
		// 	$respuestaArreglo = $query->fetchAll();
		// 	// print_r($respuestaArreglo);
		// 	if ($respuestaArreglo += ['estatus' => true]) {
		// 		$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
		// 		return $Result;
		// 	}
		// } catch(PDOException $e){
		// 	// print_r($e);
		// 		$errorReturn = ['estatus' => false];
		// 		$errorReturn['msj'] = "Error";
		// 		$errorReturn += ['info' => "Error sql:{$e}"];
		// 		return $errorReturn; 
		// }
		// }

	}

?>
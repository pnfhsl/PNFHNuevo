<?php

namespace content\modelo;

use content\config\conection\database as database;
use PDOException;

class preguntasModel extends database
{

	private $con;

	public function __construct()
	{
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

	public function Agregar($datos)
	{

		try {
			$query = parent::prepare('INSERT INTO respuestas (id_respuesta, cedula_usuario, id_pregunta, respuesta, llaves) VALUES (DEFAULT, "27828164", :id_pregunta, :respuesta, "public")');
			// $query->bindValue(':cedula_usuario', $datos['cedula']);
			foreach ($datos as $key) {
				// var_dump($datos);
				// var_dump($key);
				// var_dump($key['preg']);
				// var_dump($datos['resp']);
				// var_dump($key['preg_dos']);
				// var_dump($key['resp_dos']);
				// var_dump($key['preg_tres']);
				// var_dump($key['resp_tres']);
			}
			for ($i = 0; $i < 3; $i++) {
				# code...
				var_dump($datos['preg'][$i] . ' ' . $datos['resp'][$i]);
				// var_dump($datos['resp'][$i]);
				$query->bindValue(':id_pregunta', $datos['preg'][$i]);
				$query->bindValue(':respuesta', $datos['resp'][$i]);
				$query->execute();
			}
			// $query->bindValue(':id_pregunta', $datos['preg_dos']);
			// $query->bindValue(':respuesta', $datos['resp_dos']);
			// $query->bindValue(':id_pregunta', $datos['preg_tres']);
			// $query->bindValue(':respuesta', $datos['resp_tres']);
			$respuestaArreglo = $query->fetchAll();
			// print_r($respuestaArreglo);
			if ($respuestaArreglo += ['estatus' => true]) {
				$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
			}
		} catch (PDOException $e) {
			// print_r($e);
			$errorReturn = ['estatus' => false];
			$errorReturn['msj'] = "Error";
			$errorReturn += ['info' => "Error sql:{$e}"];
			return $errorReturn;
		}
	}
}

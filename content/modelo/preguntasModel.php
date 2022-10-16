<?php

namespace content\modelo;

use content\config\conection\database as database;
use PDOException;

class preguntasModel extends database
{

	private $con;

	public function __construct(){
		$this->con = parent::__construct();
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
	}

	public function ValidarAgregarOModificar($datos, $metodo){
		if($metodo=="Agregar" || $metodo=="agregar"){
			$result = self::Agregar();
			return $result;
		}
		if($metodo=="Modificar" || $metodo=="modificar"){
			$result = self::Modificar($data);
			return $result;
		}
	}

	public function ValidarEliminar($data){
		$result = self::Eliminar($data);
		return $result;
	}
	
	private function Consultar(){
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

	private function getOne($cedula){
		try {
			$query = parent::prepare('SELECT * FROM respuestas WHERE cedula_usuario = :cedula');
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

	private function Agregar($datos){
		try {
			$query = parent::prepare("INSERT INTO respuestas (id_respuesta, cedula_usuario, id_pregunta, respuesta, estatus) VALUES (DEFAULT, :cedula_usuario, :id_pregunta, :respuesta, 1)");
			for ($i = 0; $i < 3; $i++) {
				# code...
				// var_dump($datos['preg'][$i] . ' ' . $datos['resp'][$i] . ' ' . $datos['llaves'][$i]);
				// var_dump($datos['resp'][$i]);
				$query->bindValue(':cedula_usuario', $datos['cedula']);
				$query->bindValue(':id_pregunta', $datos['preg'][$i]);
				$query->bindValue(':respuesta', $datos['resp'][$i]);
				// $query->bindValue(':llaves', $datos['llaves'][$i]);
				$query->execute();
			}
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

	private function Modificar($datos){
		try{
			$query = parent::prepare('UPDATE respuestas SET id_pregunta = :id_pregunta, respuesta = :respuesta, llaves = :llaves WHERE cedula_usuario = :cedula_usuario');
			// $query->bindValue(':cedula_usuario2', $datos['id']);
			for ($i = 0; $i < 3; $i++) {
				# code...
				// var_dump($datos['preg'][$i] . ' ' . $datos['resp'][$i] . ' ' . $datos['llaves'][$i]);
				$query->bindValue(':id_pregunta', $datos['preg'][$i]);
				$query->bindValue(':respuesta', $datos['resp'][$i]);
				$query->bindValue(':llaves', $datos['llaves'][$i]);
				$query->execute();
			}
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

	private function Eliminar($cedula){
		try {
			// $query = parent::prepare('UPDATE respuestas SET estatus = 0 WHERE cedula_usuario = :cedula_usuario');
			$query = parent::prepare("DELETE FROM respuestas WHERE cedula_usuario = :cedula_usuario");
			$query->execute(['cedula_usuario'=>$cedula]);
			$query->setFetchMode(parent::FETCH_ASSOC);
			$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
			if ($respuestaArreglo += ['estatus' => true]) {
				$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
			}
		} catch (PDOException $e){
			$errorReturn = ['estatus' => false];
			  $errorReturn['msj'] = "Error";
			$errorReturn += ['info' => "Error sql:{$e}"];
			return $errorReturn; ;
		}
	}

	

}

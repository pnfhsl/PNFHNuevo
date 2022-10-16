<?php

namespace content\modelo;

use content\config\conection\database as database;
use PDOException;
// use PhpOffice\PhpSpreadsheet\IOFactory;

class alumnosModel extends database
{

	private $cedula;
	private $nombre;
	private $apellido;
	private $correo;
	// private $telefono;

	public function __construct()
	{
		// $this->con = parent::__construct();
		parent::__construct();
	}
	public function validarConsultar($metodo, $data = "")
	{
		if ($metodo == "Consultar") {
			$result = self::Consultar($data);
			return $result;
		}
		if ($metodo == "getOne") {
			$result = self::getOne($data);
			return $result;
		}
		if ($metodo == "BuscarExcel") {
			$result = self::BuscarExcel($data);
			return $result;
		}
	}

	public function ValidarAgregarOModificar($datos, $metodo)
	{
		$res = [];
		$return = 0;
		foreach ($datos as $campo => $valor) {
			$resExp = self::Validate($campo, $valor);
			$return += $resExp;
		}
		if ($return == 0) {
			if ($metodo == "Agregar" || $metodo == "agregar") {
				$result = self::Agregar($datos);
			}
			if ($metodo == "Modificar" || $metodo == "modificar") {
				$result = self::Modificar($datos);
			}
			return $result;
		} else {
			return ['msj' => "Invalido"];
		}
	}

	public function validarEliminar($data)
	{
		$result = self::Eliminar($data);
		return $result;
	}

	private function Validate($campo, $valor)
	{
		$pattern = [
			'0' => ['campo' => "cedula", 'expresion' => '/[^0-9]/'],
			'1' => ['campo' => "nombre", 'expresion' => '/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/'],
			'2' => ['campo' => "apellido", 'expresion' => '/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/'],
			// '3' => ['campo'=>"telefono",'expresion'=>'/[^0-9]/'],
			'4' => ['campo' => "trayecto", 'expresion' => '/[^0-9]/'],
			'5' => ['campo' => "id", 'expresion' => '/[^0-9]/'],
		];
		// $resExp = 0;
		foreach ($pattern as $exReg) {
			if ($exReg['campo'] == $campo) {
				$resExp = preg_match_all($exReg['expresion'], $valor);
				// echo "Campo: ".$campo." | Valor: ".$valor." | ";
				// echo "ResExp: ".$resExp." | ";
				// echo "\n\n";
				return $resExp;
			}
		}
	}

	private function Consultar($trayecto = "")
	{
		try {
			if ($trayecto == "") {
				$query = parent::prepare("SELECT * FROM alumnos WHERE estatus = 1");
			}
			if ($trayecto != "") {
				$query = parent::prepare("SELECT * FROM alumnos WHERE estatus = 1 and trayecto_alumno = '{$trayecto}'");
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

	private function getOne($cedula)
	{
		try {
			$query = parent::prepare('SELECT * FROM alumnos WHERE cedula_alumno = :cedula and estatus = 1');
			$respuestaArreglo = '';
			$query->execute(['cedula' => $cedula]);
			$respuestaArreglo = $query->fetchAll();
			if ($respuestaArreglo += ['estatus' => true]) {
				$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				$Result['data'] = ['ejecucion' => true];
				if (count($respuestaArreglo) > 1) {
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

	private function BuscarExcel($cedula)
	{
		try {
			$query = parent::prepare("SELECT * FROM alumnos WHERE cedula_alumno = :cedula");
			$respuestaArreglo = '';
			$query->execute(['cedula' => $cedula]);
			$respuestaArreglo = $query->fetchAll();
			//   var_dump($respuestaArreglo);
			if (count($respuestaArreglo) == 0) {
				return true;
			}
			return false;
		} catch (PDOException $e) {
			//   $errorReturn = ['estatus' => false];
			//   $errorReturn += ['info' => "error sql:{$e}"];
			//   return $errorReturn;
			return false;
		}
	}



	public function Cargar($datos)
	{
		$error = 0;

		if (!empty($datos['cedula'])) {

			$query = parent::prepare('INSERT INTO alumnos (cedula_alumno, 
																	  nombre_alumno, 
																	  apellido_alumno,
																	  trayecto_alumno,
																	  estatus) 
															   VALUES (:cedula_alumno, 
																	   :nombre_alumno, 
																	   :apellido_alumno, 
																	   :trayecto_alumno, 
																	   1)');
			$query->bindValue(':cedula_alumno', $datos['cedula']);
			$query->bindValue(':nombre_alumno', $datos['nombre']);
			$query->bindValue(':apellido_alumno', $datos['apellido']);
			$query->bindValue(':trayecto_alumno', $datos['trayecto']);
			$res = $query->execute();
			// print_r($respuestaArreglo);
			if (!$res) {
				$error++;
			}
			$respuestaArreglo = $query->fetchAll();
		}

		if (!$error) {
			// $this->bitacora->monitorear($this->url);
			$Result = array('msj' => "Good");		//Si todo esta correcto 
			return $Result;
		} else {
			$errorReturn['msj'] = "Error: Se encontraron $error errores";
			return $errorReturn;
		}
	}

	private function Agregar($datos)
	{

		try {
			$query = parent::prepare('INSERT INTO alumnos (cedula_alumno, nombre_alumno, apellido_alumno, trayecto_alumno, estatus) VALUES (:cedula_alumno, :nombre_alumno, :apellido_alumno, :trayecto_alumno, 1)');
			$query->bindValue(':cedula_alumno', $datos['cedula']);
			$query->bindValue(':nombre_alumno', $datos['nombre']);
			$query->bindValue(':apellido_alumno', $datos['apellido']);
			// $query->bindValue(':correo_alumno', $datos['correo']);
			// $query->bindValue(':telefono_alumno', $datos['telefono']);
			$query->bindValue(':trayecto_alumno', $datos['trayecto']);
			$query->execute();
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

	private function Modificar($datos)
	{

		try {
			$query = parent::prepare('UPDATE alumnos SET cedula_alumno=:cedula_alumno, nombre_alumno = :nombre_alumno, apellido_alumno = :apellido_alumno, trayecto_alumno=:trayecto_alumno, estatus=1 WHERE cedula_alumno = :cedula_alumno2');
			$query->bindValue(':cedula_alumno2', $datos['id']);
			$query->bindValue(':cedula_alumno', $datos['cedula']);
			$query->bindValue(':nombre_alumno', $datos['nombre']);
			$query->bindValue(':apellido_alumno', $datos['apellido']);
			// $query->bindValue(':telefono_alumno', $datos['telefono']);
			$query->bindValue(':trayecto_alumno', $datos['trayecto']);
			$query->execute();
			$respuestaArreglo = $query->fetchAll();
			if ($respuestaArreglo += ['estatus' => true]) {
				$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
			}
		} catch (PDOException $e) {

			$errorReturn = ['estatus' => false];
			$errorReturn['msj'] = "Error";
			$errorReturn += ['info' => "Error sql:{$e}"];
			return $errorReturn;
		}
	}

	private function Eliminar($cedula)
	{
		try {
			$query = parent::prepare('UPDATE alumnos SET estatus = 0 WHERE cedula_alumno = :cedAlumno');
			$query->execute(['cedAlumno' => $cedula]);
			$query->setFetchMode(parent::FETCH_ASSOC);
			$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
			if ($respuestaArreglo += ['estatus' => true]) {
				$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
			}
		} catch (PDOException $e) {
			$errorReturn = ['estatus' => false];
			$errorReturn['msj'] = "Error";
			$errorReturn += ['info' => "Error sql:{$e}"];
			return $errorReturn;;
		}
	}
}

<?php

namespace content\modelo;

use content\config\conection\database as database;
use content\traits\Utility;
use PDOException;

class usuariosModel extends database
{

	private $cedula;
	private $user;
	private $password;
	private $configargs;


	public function __construct()
	{
		// $this->con = parent::__construct();
		parent::__construct();
		$this->configargs = array("config" => "C:\\xampp\php\\extras\openssl\\openssl.cnf", 'private_key_bits' => 2048, 'default_md' => "sha256");
	}
	public function Consultar($string = "")
	{
		try {
			$query = parent::prepare('SELECT * FROM usuarios, roles WHERE roles.id_rol = usuarios.id_rol and roles.estatus = 1 and usuarios.estatus != 0');

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

	public function Agregar($datos)
	{

		try {
			$query = parent::prepare("INSERT INTO usuarios (cedula_usuario, nombre_usuario, password_usuario, id_rol, estatus) 
			VALUES (:cedula_usuario, :nombre_usuario, :password_usuario, :id_rol, 2)");
			$query->bindValue(':cedula_usuario', $datos['cedula']);
			$query->bindValue(':nombre_usuario', $datos['user']);
			$query->bindValue(':password_usuario', $datos['pass']);
			$query->bindValue(':id_rol', $datos['rol']);
			$query->execute();
			$respuestaArreglo = $query->fetchAll();
			if ($respuestaArreglo += ['estatus' => true]) {
				$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
				// echo json_encode($Result);
			}
			//$respuestaArreglo += ['estatus' => true];	        
			//return $respuestaArreglo;
		} catch (PDOException $e) {

			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => "Error sql:{$e}"];
			return $errorReturn;
		}
	}

	public function GenerarLlaves()
	{
		try {
			$generar = openssl_pkey_new($this->configargs);
			$keypub = openssl_pkey_get_details($generar);
			openssl_pkey_export($generar, $keypriv, NULL, $this->configargs);
			$Result = array('public' => $keypub['key'], 'private' => $keypriv);
			// var_dump($Result);
			return $Result;
		} catch (PDOException $e) {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => "Error sql:{$e}"];
			return $errorReturn;
		}
	}

	public function GuardarLlaves($cedula, $cedulaEncriptada, $public, $private)
	{
		$dat['cedula_usuario'] = $cedula;
		$dat['firma'] = $cedulaEncriptada;
		$dat['public'] = $public;
		$dat['private'] = $private;
		try {

			$query = parent::prepare("INSERT INTO rsa (id_rsa, cedula_usuario, llave_publica, llave_privada, firma_digital, estatus) VALUES (DEFAULT, :cedula_usuario, :llave_publica, :llave_privada, :firma_digital, 1)");
			$query->bindValue(':cedula_usuario', $dat['cedula_usuario']);
			$query->bindValue(':llave_publica', ($dat['public']));
			$query->bindValue(':llave_privada', $dat['private']);
			$query->bindValue(':firma_digital', $dat['firma']);
			$query->execute();
			$respuestaArreglo = $query->fetchAll();
			if ($respuestaArreglo += ['estatus' => true]) {
				$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
				// echo json_encode($Result);
			}
			$respuestaArreglo += ['estatus' => true];
			return $respuestaArreglo;
		} catch (PDOException $e) {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => "Error sql:{$e}"];
			return $errorReturn;
		}
	}

	public function CompletarDatos($datos)
	{

		try {
			$query = parent::prepare('UPDATE usuarios SET estatus=1 WHERE cedula_usuario = :cedula_usuario');
			$query->bindValue(':cedula_usuario', $datos['cedula']);
			// $query->bindValue(':password_usuario', $datos['nuevoPassword']);
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


	public function Modificar($datos)
	{

		try {
			if (isset($datos['nuevoPassword']) && $datos['nuevoPassword'] != "") {
				$query = parent::prepare('UPDATE usuarios SET cedula_usuario=:cedula_usuario, nombre_usuario = :nombre_usuario, password_usuario = :password_usuario, id_rol = :id_rol, estatus=1 WHERE cedula_usuario = :cedula_usuario2');
				$query->bindValue(':password_usuario', $datos['nuevoPassword']);
			} else {
				$query = parent::prepare('UPDATE usuarios SET cedula_usuario=:cedula_usuario, nombre_usuario = :nombre_usuario, id_rol = :id_rol, estatus=1 WHERE cedula_usuario = :cedula_usuario2');
			}
			$query->bindValue(':cedula_usuario2', $datos['id']);
			$query->bindValue(':cedula_usuario', $datos['cedula']);
			$query->bindValue(':nombre_usuario', $datos['nombre']);
			// $query->bindValue(':password_usuario', $datos['nuevoPassword']);
			$query->bindValue(':id_rol', $datos['rol']);
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


	public function Eliminar($cedula)
	{
		try {
			$query = parent::prepare('UPDATE usuarios SET estatus = 0 WHERE cedula_usuario = :cedula');
			$query->execute(['cedula' => $cedula]);
			$query->setFetchMode(parent::FETCH_ASSOC);
			$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
			if ($respuestaArreglo += ['estatus' => true]) {
				$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
			}
		} catch (PDOException $e) {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => "Error sql:{$e}"];
			return $errorReturn;;
		}
	}



	public function getOne($cedula)
	{
		try {
			$query = parent::prepare('SELECT * FROM usuarios WHERE cedula_usuario = :cedula');
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
	public function getOneRolId($id)
	{
		try {
			$query = parent::prepare("SELECT * FROM usuarios WHERE id_rol = :id");
			$respuestaArreglo = '';
			$query->execute(['id' => $id]);
			$respuestaArreglo = $query->fetchAll();
			return $respuestaArreglo;
			//require_once 'Vista/usuarios.php';
		} catch (PDOException $e) {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => "error sql:{$e}"];
			return $errorReturn;
		}
	}

	public function Intentos($user)
	{
		try {
			$query = parent::prepare('SELECT intentos, estatus FROM usuarios WHERE nombre_usuario = :user');
			$respuestaArreglo = '';
			$query->execute(['user' => $user]);
			$respuestaArreglo = $query->fetchAll();
			return $respuestaArreglo;
		} catch (PDOException $e) {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => "error sql:{$e}"];
			return $errorReturn;
		}
	}

	public function Bloqueo($user, $int)
	{

		try {
			if ($int > 2) {
				$query = parent::prepare('UPDATE usuarios SET intentos=:intentos, estatus=3 WHERE nombre_usuario = :nombre_usuario');
			} else {
				$query = parent::prepare('UPDATE usuarios SET intentos=:intentos WHERE nombre_usuario = :nombre_usuario');
			}
			$query->bindValue(':nombre_usuario', $user);
			$query->bindValue(':intentos', $int);
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
}

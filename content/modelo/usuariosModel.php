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
	// private $configargs;

	public function __construct(){
		// $this->con = parent::__construct();
		parent::__construct();
		// $this->configargs = array("config" => "C:\\xampp\php\\extras\openssl\\openssl.cnf", 'private_key_bits' => 2048, 'default_md' => "sha256");
	}

	public function validarConsultar($metodo, $data="", $data2=""){
		if($metodo=="Consultar"){
			$result = self::Consultar($data);
			return $result;
		}
		if($metodo=="getOne"){
			$result = self::getOne($data, $data2);
			return $result;
		}
		if($metodo=="Buscar"){
			$result = self::Buscar($data, $data2);
			return $result;
		}
		if($metodo=="getOneRolId"){
			$result = self::getOneRolId($data);
			return $result;
		}
		if($metodo=="Intentos"){
			$result = self::Intentos($data, $data2);
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
			if($metodo=="GuardarLlaves" || $metodo=="guardarllaves"){
				$result = self::GuardarLlaves($datos);
			}
			if($metodo=="Modificar" || $metodo=="modificar"){
				$result = self::Modificar($datos);
			}
			if($metodo=="CompletarDatos" || $metodo=="completardatos"){
				$result = self::CompletarDatos($datos);
			}
			if($metodo=="Bloqueo" || $metodo=="bloqueo"){
				$result = self::Bloqueo($datos);
			}
			return $result;
		}else{
			return ['msj'=>"Invalido"];
		}
	}	

	public function validarEliminar($metodo, $data){
		if($metodo=="Eliminar"){
			$result = self::Eliminar($data);
			return $result;
		}
		if($metodo=="LimpiarLlaves"){
			$result = self::LimpiarLlaves($data);
			return $result;
		}
	}

	private function Validate($campo, $valor){
		$pattern = [
			'0' => ['campo'=>"cedula",'expresion'=>'/[^0-9]/'],
			'1' => ['campo'=>"user",'expresion'=>'/[^0-9 a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/'],
			'2' => ['campo'=>"correo",'expresion'=>'/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,4}\.[0-9]{1,4}\.[0-9]{1,4}\.[0-9]{1,4}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{4,6}))$/'],
			'3' => ['campo'=>"rol",'expresion'=>'/[^0-9]/'],
			'4' => ['campo'=>"id",'expresion'=>'/[^0-9]/'],
			// '3' => ['campo'=>"pass",'expresion'=>'/^(?=.*\d)(?=.*[!@#$%^/&.*+-])(?=.*[a-z])(?=.*[A-Z]).{8,}$/'],
			// '4' => ['campo'=>"rol",'expresion'=>'/[^0-9]/'],
			// '5' => ['campo'=>"id",'expresion'=>'/[^0-9]/'],
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

	private function Consultar($string = ""){
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
	
	private function getOne($cedula, $rol=false){
		try {
			if($rol==true){
				$sql = "SELECT * FROM usuarios, roles WHERE usuarios.id_rol = roles.id_rol and usuarios.cedula_usuario = :cedula";
			}else{
				$sql = "SELECT * FROM usuarios WHERE cedula_usuario = :cedula";
			}
			$query = parent::prepare($sql);
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

	private function Buscar($campo, $valor){
		try {
			if($campo=="username"){
				$sql = "SELECT * FROM usuarios WHERE usuarios.estatus = 1 and usuarios.nombre_usuario = '{$valor}'";
			}
			if($campo=="correo"){
				$sql = "SELECT * FROM usuarios WHERE usuarios.estatus = 1 and usuarios.correo = '{$valor}'";
			}
			$query = parent::prepare($sql);
			$respuestaArreglo = '';
			$query->execute();
			$query->setFetchMode(parent::FETCH_ASSOC);
			$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
			// print_r($respuestaArreglo);
			return $respuestaArreglo;
		} catch (PDOException $e) {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => "error sql:{$e}"];
			return $errorReturn;
		}
	}

	private function getOneRolId($id){
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

	private function Intentos($user){
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
	
	private function Agregar($datos){

		try {
			$query = parent::prepare("INSERT INTO usuarios (cedula_usuario, nombre_usuario, password_usuario, correo, id_rol, estatus, intentos) 
			VALUES (:cedula_usuario, :nombre_usuario, :password_usuario, :correo, :id_rol, 2, 0)");
			$query->bindValue(':cedula_usuario', $datos['cedula']);
			$query->bindValue(':nombre_usuario', $datos['nombre']);
			$query->bindValue(':correo', $datos['correo']);
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

	private function GuardarLlaves($datos){
		$dat['cedula_usuario'] = $datos['cedula'];
		$dat['firma'] = $datos['cedulaEncriptada'];
		$dat['public'] = $datos['public'];
		$dat['private'] = $datos['private'];
		$actualDate = date('Y-m-d');
		try {

			$query = parent::prepare("INSERT INTO rsa (id_rsa, cedula_usuario, llave_publica, llave_privada, firma_digital, fecha_acceso, estatus) VALUES (DEFAULT, :cedula_usuario, :llave_publica, :llave_privada, :firma_digital, :fecha_acceso, 1)");
			$query->bindValue(':cedula_usuario', $dat['cedula_usuario']);
			$query->bindValue(':llave_publica', ($dat['public']));
			$query->bindValue(':llave_privada', $dat['private']);
			$query->bindValue(':firma_digital', $dat['firma']);
			$query->bindValue(':fecha_acceso', $actualDate);
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

	private function Modificar($datos){

		try {
			if (isset($datos['nuevoPassword']) && $datos['nuevoPassword'] != "") {
				$query = parent::prepare('UPDATE usuarios SET cedula_usuario=:cedula_usuario, nombre_usuario = :nombre_usuario, correo = :correo, password_usuario = :password_usuario, id_rol = :id_rol, estatus=1 WHERE cedula_usuario = :cedula_usuario2');
				$query->bindValue(':password_usuario', $datos['nuevoPassword']);
			} else {
				$query = parent::prepare('UPDATE usuarios SET cedula_usuario=:cedula_usuario, nombre_usuario = :nombre_usuario, id_rol = :id_rol, estatus=1 WHERE cedula_usuario = :cedula_usuario2');
			}
			$query->bindValue(':cedula_usuario2', $datos['id']);
			$query->bindValue(':cedula_usuario', $datos['cedula']);
			$query->bindValue(':nombre_usuario', $datos['nombre']);
			$query->bindValue(':correo', $datos['correo']);
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

	private function CompletarDatos($datos){

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

	private function Bloqueo($user, $int){
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

	private function Eliminar($cedula){
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

	private function LimpiarLlaves($cedula){
		try {
			$query = parent::prepare('DELETE FROM rsa WHERE cedula_usuario = :cedula');
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

	// public function GenerarLlaves(){
	// 	try {
	// 		$generar = openssl_pkey_new($this->configargs);
	// 		$keypub = openssl_pkey_get_details($generar);
	// 		openssl_pkey_export($generar, $keypriv, NULL, $this->configargs);
	// 		$Result = array('public' => $keypub['key'], 'private' => $keypriv);
	// 		// var_dump($Result);
	// 		return $Result;
	// 	} catch (PDOException $e) {
	// 		$errorReturn = ['estatus' => false];
	// 		$errorReturn += ['info' => "Error sql:{$e}"];
	// 		return $errorReturn;
	// 	}
	// }

}
<?php

namespace content\modelo;

use mysqli as mysqli;
use content\config\conection\database as database;
use PDOException;

class bloqueoModel extends database{

    private $fecha;
    private $mysqlImportFilename;
    private $mysqlRestoreFilename;

    public function __construct(){
        parent::__construct();
    }
    public function Consultar(){
        try {
            $query = parent::prepare('SELECT * FROM usuarios, roles WHERE usuarios.estatus = 3 and usuarios.id_rol = roles.id_rol');
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

    public function FirmaD($firma){			
        try{
            $sql = "SELECT * FROM rsa, profesores, usuarios, roles WHERE firma_digital = '{$firma}' and rsa.cedula_usuario = profesores.cedula_profesor and rsa.cedula_usuario = usuarios.cedula_usuario and usuarios.id_rol = roles.id_rol";
            $query = parent::prepare($sql);
            $query->execute();  
            $respuestaArreglo = $query->fetchAll();
            return $respuestaArreglo;
        } catch (PDOException $e) {
            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }
    }
        
    public function BuscarCodigo($cedula){
        try{
            // $sql = "SELECT * FROM rsa, usuarios WHERE firma_digital = '{$firma}'  and rsa.cedula_usuario = usuarios.cedula_usuario";
            $sql = "SELECT * FROM rsa WHERE cedula_usuario = '{$cedula}'";
            $query = parent::prepare($sql);
            $query->execute();  
            $respuestaArreglo = $query->fetchAll();
            return $respuestaArreglo;
        } catch (PDOException $e) {
            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn;
        }
    }

    public function Encrypt($codigo, $llave){
        $public_key = openssl_pkey_get_public($llave);
        openssl_public_encrypt(json_encode($codigo), $mensajeEncriptado, $public_key);
        $salida = base64_encode($mensajeEncriptado);
        return $salida;
    } 

    public function Decrypt($codigo, $llave){
        $decode = base64_decode($codigo);
        $private_key = openssl_pkey_get_private($llave);
        $rs = openssl_private_decrypt($decode, $decrypted, $private_key);
        return $decrypted;
    } 

    public function CodigoDesbloqueo($codigo, $cedula){

        try{
        $query = parent::prepare("UPDATE rsa SET codigo_desbloqueo = :codigo_desbloqueo WHERE cedula_usuario = '{$cedula}'");
        $query->bindValue(':codigo_desbloqueo', $codigo);
        $query->execute();
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

    public function Unlook($user, $int, $newPass){
		try {
			$query = parent::prepare("UPDATE usuarios SET intentos=:intentos, estatus=2, password_usuario=:newPass WHERE cedula_usuario = '{$user}'");
			// $query->bindValue(':cedula_usuario', $user);
            $query->bindValue(':intentos', $int);
            $query->bindValue(':newPass', $newPass);
			$query->execute();
			$respuestaArreglo = $query->fetchAll();
            // return $respuestaArreglo;
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

    public function Eliminar($cedula){
        try {
            // $query = parent::prepare('UPDATE respuestas SET estatus = 0 WHERE cedula_usuario = :cedula_usuario');
            $query = parent::prepare("DELETE FROM rsa WHERE cedula_usuario = :cedula_usuario");
            $query->execute(['cedula_usuario'=>$cedula]);
            $query->setFetchMode(parent::FETCH_ASSOC);
            $respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
            if ($respuestaArreglo += ['estatus' => true]) {
                $Result = array('msj' => "Good");       //Si todo esta correcto y consigue al usuario
                return $Result;
            }
        } catch (PDOException $e) {
            $errorReturn = ['estatus' => false];
            $errorReturn['msj'] = "Error";
            $errorReturn += ['info' => "Error sql:{$e}"];
            return $errorReturn; ;
        }
    }
    
}

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
            $query = parent::prepare('SELECT * FROM usuarios, roles WHERE usuarios.estatus = 3 && usuarios.id_rol = roles.id_rol');
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
            // $sql = "SELECT * FROM rsa, usuarios WHERE firma_digital = '{$firma}'  && rsa.cedula_usuario = usuarios.cedula_usuario";
            $sql = "SELECT * FROM rsa, profesores WHERE firma_digital = '{$firma}' && rsa.cedula_usuario = profesores.cedula_profesor";
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
            // $sql = "SELECT * FROM rsa, usuarios WHERE firma_digital = '{$firma}'  && rsa.cedula_usuario = usuarios.cedula_usuario";
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
        // str_replace(' ', '+', $string)
        $public_key = openssl_pkey_get_public($llave);
        openssl_public_encrypt(json_encode($codigo), $mensajeEncriptado, $public_key);
        $salida = base64_encode($mensajeEncriptado);
        return $salida;
        // try{
        //     var_dump($data);
        //     var_dump($public);
        //     $keypublic = openssl_pkey_get_public($public);
        //     var_dump($keypublic);
        //     $rs = openssl_public_encrypt($data, $datos_cifrados, $keypublic);
        //     var_dump($rs);
        //     $Result = array('cifrado' => $datos_cifrados);		//Si todo esta correcto y consigue al usuario
        //     return $Result;
        // } catch(PDOException $e){
        //     $errorReturn = ['estatus' => false];
        //     $errorReturn += ['info' => "Error sql:{$e}"];
        //     return $errorReturn; 
        // }
    } 

    public function Decrypt($codigo, $llave){
        // var_dump($llave);
        // var_dump($codigo);
        $decode = base64_decode($codigo);
        // var_dump($decode);
        $private_key = openssl_pkey_get_private($llave);
        // var_dump($private_key);
        $rs = openssl_private_decrypt($decode, $decrypted, $private_key);
        // $salida = $decrypted;
        // var_dump($rs);
        // var_dump($decrypted);
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

    public function Unlook($user, $int)
	{

		try {
			$query = parent::prepare("UPDATE usuarios SET intentos=:intentos, estatus=2 WHERE cedula_usuario = '{$user}'");
			// $query->bindValue(':cedula_usuario', $user);
			$query->bindValue(':intentos', $int);
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
    
    // public function BusquedaAlumno($cedula){		//Se hace una consulta de los usuarios recibidos
			
    //     try{
    //         $sql = "SELECT * FROM usuarios, alumnos WHERE cedula_usuario = '{$cedula}'  && usuarios.cedula_usuario = alumnos.cedula_alumno";
    //         $query = parent::prepare($sql);
    //         $query->execute();          
    //         $respuestaArreglo = $query->fetchAll();
    //         //if ($respuestaArreglo += ['estatus' => true]) {
    //         //	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
    //         //	// var_dump($Result);
    //         //	return $Result;
    //         //}
    //         return $respuestaArreglo;

    //     } catch (PDOException $e) {
    //         $errorReturn = ['estatus' => false];
    //         $errorReturn += ['info' => "error sql:{$e}"];
    //         return $errorReturn;
    //     }
        

    // } 
    // public function BusquedaProfesor($cedula){		//Se hace una consulta de los usuarios recibidos
			
    //     try{
    //         $sql = "SELECT * FROM usuarios, profesores WHERE cedula_usuario = '{$cedula}'  && usuarios.cedula_usuario = profesores.cedula_profesor";
    //         $query = parent::prepare($sql);
    //         $query->execute();          
    //         $respuestaArreglo = $query->fetchAll();
    //         //if ($respuestaArreglo += ['estatus' => true]) {
    //         //	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
    //         //	// var_dump($Result);
    //         //	return $Result;
    //         //}
    //         return $respuestaArreglo;

    //     } catch (PDOException $e) {
    //         $errorReturn = ['estatus' => false];
    //         $errorReturn += ['info' => "error sql:{$e}"];
    //         return $errorReturn;
    //     }
        

    // } 
 
    }

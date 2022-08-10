<?php

	namespace content\modelo;
	use content\config\conection\database as database;
	use PDOException;

	class loginModel extends database{

		private $con;
		private $user;
		private $passw;
		private $password;
		private $pass;
		private $pass_recuperar;
		private $usuario;
		private $cont;

		public function __construct(){
			$this->con = parent::__construct();
		}

		public function getLoginSistema($user, $passw){
			$this->user = $user;
			$this->passw = $passw;

			// $this->loginSistema();
		}

		// public function getRecuperarSistema($pass){
		// 	$this->pass = $pass;

		// 	$this->recuperarPass();
		// }


		public function loginSistema($user, $passw){		//Se hace una consulta de los usuarios recibidos
			$this->user = $user;
			$this->passw = $passw;
			$this->password = md5($this->passw);
			
			$sql = ('SELECT * FROM usuarios WHERE nombre_usuario = :user AND password_usuario = :password AND estatus = 1');
			$new = parent::prepare($sql);
			$new->bindValue(':user', $this->user);
			$new->bindValue(':password', $this->password);
			$new->execute();
			$user = $new->fetchAll();
			// var_dump($this->password);
			// var_dump($user);
			foreach ($user as $currentUser) {
				$this->usuario = $currentUser['nombre_usuario'];
				$this->cont = $currentUser['password_usuario'];
			}
				if ($this->user == $this->usuario AND $this->password == $this->cont) {
					$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
					$Result['data'] = $user;
					// echo json_encode($Result);
					$_SESSION['cuentaActiva'] = true;
					// die();
					return $Result;
				}else{
					$Result = array('msj' => "Usuario o contraseña invalido!");
					// echo json_encode($Result);
					// die();
					return $Result;
				}
			

		}

		public function recuperarPass($user, $pass){		//Se hace una consulta de los usuarios recibidos
			
			try{
				$this->pass_recuperar = md5($pass);
				$sql = "UPDATE usuarios SET password_usuario = '{$this->pass_recuperar}' WHERE cedula_usuario = '{$user}'";
				$query = parent::prepare($sql);
				$query->execute();          
				$respuestaArreglo = $query->fetchAll();
				if ($respuestaArreglo += ['estatus' => true]) {
					$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
					// var_dump($Result);
					return $Result;
				}

			} catch (PDOException $e) {
		        $errorReturn = ['estatus' => false];
		        $errorReturn += ['info' => "error sql:{$e}"];
		        return $errorReturn;
		    }
			

		}

		public function busquedaCorreo($correo){
			try {
				$query = parent::prepare('SELECT cedula_usuario AS cedula, correo AS correo, nombre_usuario AS nombre 
				FROM usuarios WHERE correo = :correo');
				$respuestaArreglo = '';
				$query->execute(['correo'=>$correo]);
				$respuestaArreglo = $query->fetchAll();
				// print_r($respuestaArreglo);
				// echo count($respuestaArreglo);
				if(count($respuestaArreglo)>0){
					$Result['data'] = $respuestaArreglo;
				}
					
				if ($respuestaArreglo += ['estatus' => true]) {
					$Result['msj'] = "Good";		//Si todo esta correcto y consigue al usuario
					return $Result;
				}
				// if ($respuestaArreglo) {
				// 	$respuestaArreglo['role'] = 'Profesor';
				// }else{
				// 	$respuestaArreglo['role'] = 'Estudiante';
				// }
				// var_dump($respuestaArreglo);
				return $respuestaArreglo;
				
		      } catch (PDOException $e) {
		        $errorReturn = ['estatus' => false];
		        $errorReturn += ['info' => "error sql:{$e}"];
		        return $errorReturn;
		      }
		}

		public function busquedaUsuario($correo){
			try {
					$query = parent::prepare('SELECT nombre_usuario AS nombre FROM usuarios WHERE correo = :correo');
					$respuestaArreglo = '';
					$query->execute(['correo'=>$correo]);
					$respuestaArreglo = $query->fetch();
				// var_dump($respuestaArreglo);
				return $respuestaArreglo;
		      } catch (PDOException $e) {
		        $errorReturn = ['estatus' => false];
		        $errorReturn += ['info' => "error sql:{$e}"];
		        return $errorReturn;
		      }
		}


	}

?>
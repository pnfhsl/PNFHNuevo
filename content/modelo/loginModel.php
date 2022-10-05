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
			//$this->password = md5($this->passw);
			// var_dump($this->user);
			// var_dump($this->passw);
			$sql = ('SELECT * FROM roles, usuarios WHERE usuarios.id_rol = roles.id_rol AND usuarios.nombre_usuario = :user AND usuarios.password_usuario = :password');
			$new = parent::prepare($sql);
			$new->bindValue(':user', $this->user);
			$new->bindValue(':password', $this->passw);
			$new->execute();
			$user = $new->fetchAll();
			
			foreach ($user as $currentUser) {
				$this->usuario = $currentUser['nombre_usuario'];
				$this->cont = $currentUser['password_usuario'];
				// var_dump($this->usuario);
				// var_dump($this->cont);
			}
				if ($this->user == $this->usuario AND $this->passw == $this->cont) {
					// var_dump('hola');
					$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
					$Result['data'] = $user;
					// echo json_encode($Result);
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
				$this->pass_recuperar = $pass;
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

		public function Consultar($user){		//Se hace una consulta de los usuarios recibidos
			
			try{
				$sql = "SELECT * FROM respuestas, preguntas WHERE respuestas.id_pregunta = preguntas.id AND cedula_usuario = '{$user}' AND estatus = 1";
				$query = parent::prepare($sql);
				$query->execute();          
				$respuestaArreglo = $query->fetchAll();
				//if ($respuestaArreglo += ['estatus' => true]) {
				//	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				//	// var_dump($Result);
				//	return $Result;
				//}
				return $respuestaArreglo;

			} catch (PDOException $e) {
		        $errorReturn = ['estatus' => false];
		        $errorReturn += ['info' => "error sql:{$e}"];
		        return $errorReturn;
		    }
			

		}

		public function busquedaCorreo($correo){
			try {
				$query = parent::prepare('SELECT cedula_usuario AS cedula, correo AS correo, nombre_usuario AS nombre, estatus 
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

		public function busquedaCedula($user){
			try {
				$query = parent::prepare('SELECT cedula_usuario FROM usuarios WHERE nombre_usuario  = :user');
				$respuestaArreglo = '';
				$query->execute(['user'=>$user]);
				$respuestaArreglo = $query->fetchAll();
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
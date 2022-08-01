<?php

	namespace content\modelo;
	use content\config\conection\database as database;
	use PDOException;

	class loginModel extends database{

		private $con;
		private $user;
		private $passw;
		private $password;
		private $usuario;
		private $cont;

		public function __construct(){
			$this->con = parent::__construct();
		}

		public function getLoginSistema($user, $passw){
			$this->user = $user;
			$this->passw = $passw;

			$this->loginSistema();
		}

		private function loginSistema(){		//Se hace una consulta de los usuarios recibidos
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
				// var_dump($this->usuario);
				// var_dump($this->cont);

			// var_dump($user);

			
				// echo "User: ".$this->user;
				// echo " = ";
				// echo "Usuario: ".$this->usuario;
				// echo " = ";
				if ($this->user == $this->usuario AND $this->password == $this->cont) {
					$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
					echo json_encode($Result);
					$_SESSION['cuentaActiva'] = true;
					die();
				}else{
					$Result = array('msj' => "Usuario o contraseña invalido!");
					echo json_encode($Result);
					die();
				}
			

		}

		public function busquedaCorreo($correo){
			try {
		    	// $query = parent::prepare('SELECT cedula_alumno AS cedula, correo_alumno AS correo, nombre_alumno AS nombre
				// 	FROM alumnos WHERE correo_alumno = :correo');
		    	// $respuestaArreglo = '';
		        // $query->execute(['correo'=>$correo]);
		        // $respuestaArreglo = $query->fetch();
				// if ($respuestaArreglo == false) {
					$query = parent::prepare('SELECT cedula_usuario AS cedula, correo AS correo, nombre_usuario AS nombre 
					FROM usuarios WHERE correo = :correo');
					$respuestaArreglo = '';
					$query->execute(['correo'=>$correo]);
					$respuestaArreglo = $query->fetch();
					if ($respuestaArreglo) {
						$respuestaArreglo['role'] = 'Profesor';
					}
				// }
				else{
					$respuestaArreglo['role'] = 'Estudiante';
				}
				// var_dump($respuestaArreglo);
				return $respuestaArreglo;
		        // if ($respuestaArreglo += ['estatus' => true]) {
		        // 	$Result = array('msj' => "Good");		
		        // 	// $Result['data'] = ['ejecucion'=>true];
		        // 	// if(count($respuestaArreglo)>1){
		        // 	// 	$Result['data'] = $respuestaArreglo;
		        // 	// }
				// 	// echo json_encode($Result);
				// 	return $Result;
		        // }
		       //return $respuestaArreglo;
		      //require_once 'Vista/usuarios.php';
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
<?php

	namespace content\modelo;

	use content\config\conection\database as database;
	use PDOException;
	use content\traits\Utility;
	class perfilModel extends database{

		
		private $nombre; 
		private $user;
		private $passw;
		private $pass;
		private $password;
		use Utility;

		public function __construct(){
			
			// $this->con = parent::__construct();
			parent::__construct();
		}
		public function Consultar(){
			
			try {
				$query = parent::prepare('SELECT * FROM modulos WHERE estatus = 1');
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

		public function ConsultarProfesor($cedula){
			
			try {
				$query = parent::prepare("SELECT * FROM profesores WHERE estatus = 1 && cedula_profesor = '{$cedula}'");
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

		public function ConsultarAlumno($cedula){
			
			try {
				$query = parent::prepare("SELECT * FROM alumnos WHERE estatus = 1 && cedula_alumno = '{$cedula}'");
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

		public function ConsultarUsuario($cedula){
			
			try {
				$query = parent::prepare("SELECT * FROM usuarios WHERE estatus = 1 && cedula_usuario = '{$cedula}'");
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

		public function ModificarCorreo($datos){

		try {
			$query = parent::prepare('UPDATE usuarios SET correo=:correo WHERE cedula_usuario = :cedula_usuario');
			$query->bindValue(':cedula_usuario', $datos['cedula']);
			$query->bindValue(':correo', $datos['correo']);
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

	

	public function ValidarContraseña($user, $passw){		//Se hace una consulta de los usuarios recibidos
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
	// public function Funciones(){
	// 	$nombre_imagen=$_FILES['foto']['name'];
	// 	$temporal=$_FILES['foto']['tmp_name'];
	// }


	// public function getLoginSistema($passw){
		
	// 	$this->passw = $passw;

	// 	// $this->loginSistema();
	// }
	// 	public function ProbarSistema($passw){
			
	// 		$this->passw = $passw;

	// 		//$this->password = md5($this->passw);
	// 		// var_dump($this->user);
	// 		// var_dump($this->passw);
	// 		$sql = ('SELECT * FROM roles, usuarios WHERE usuarios.id_rol = roles.id_rol AND usuarios.nombre_usuario = :user AND usuarios.password_usuario = :password');
	// 		$new = parent::prepare($sql);
	// 		// $new->bindValue(':user', $this->user);
	// 		$new->bindValue(':password', $this->passw);
	// 		$new->execute();
	// 		$user = $new->fetchAll();
			
	// 		foreach ($user as $currentUser) {
	// 			// $this->usuario = $currentUser['nombre_usuario'];
	// 			$this->cont = $currentUser['password_usuario'];
	// 			// var_dump($this->usuario);
	// 			// var_dump($this->cont);
	// 		}
	// 			if ($this->passw == $this->cont) {
	// 				// var_dump('hola');
	// 				$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
	// 				$Result['data'] = $user;
	// 				// echo json_encode($Result);
	// 				// die();
	// 				return $Result;
	// 			}else{
	// 				$Result = array('msj' => "contraseña invalido!");
	// 				// echo json_encode($Result);
	// 				// die();
	// 				return $Result;
	// 			}

	// }

		// public function Modificar($datos){

		// 	try{
	    //     $query = parent::prepare('UPDATE alumnos SET cedula_alumno=:cedula_alumno, nombre_alumno = :nombre_alumno, apellido_alumno = :apellido_alumno, telefono_alumno=:telefono_alumno, trayecto_alumno=:trayecto_alumno, estatus=1 WHERE cedula_alumno = :cedula_alumno2');
	    //     $query->bindValue(':cedula_alumno2', $datos['id']);
	    //     $query->bindValue(':cedula_alumno', $datos['cedula']);
	    //     $query->bindValue(':nombre_alumno', $datos['nombre']);
	    //     $query->bindValue(':apellido_alumno', $datos['apellido']);
	    //     $query->bindValue(':telefono_alumno', $datos['telefono']);
	    //     $query->bindValue(':trayecto_alumno', $datos['trayecto']);
	    //     $query->execute();
	    //     $respuestaArreglo = $query->fetchAll();
	    //     if ($respuestaArreglo += ['estatus' => true]) {
	    //     	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
		// 		return $Result;
	    //     }
	    //   } catch(PDOException $e){

	    //     $errorReturn = ['estatus' => false];
	    //   		$errorReturn['msj'] = "Error";
		//         $errorReturn += ['info' => "Error sql:{$e}"];
		//         return $errorReturn; 
	    //   }
		// } 

		// public function ModificarProfe($datos){

		// 	try{
		// 		$query = parent::prepare('UPDATE profesores SET cedula_profesor=:cedula_profesor, nombre_profesor = :nombre_profesor, apellido_profesor = :apellido_profesor, telefono_profesor=:telefono_profesor, estatus=1 WHERE cedula_profesor = :cedula_profesor2');
		// 		$query->bindValue(':cedula_profesor2', $datos['id']);
		// 		$query->bindValue(':cedula_profesor', $datos['cedula']);
		// 		$query->bindValue(':nombre_profesor', $datos['nombre']);
		// 		$query->bindValue(':apellido_profesor', $datos['apellido']);
		// 		$query->bindValue(':telefono_profesor', $datos['telefono']);
		// 		$query->execute();
		// 		$respuestaArreglo = $query->fetchAll();
		// 		if ($respuestaArreglo += ['estatus' => true]) {
		// 			$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
		// 			return $Result;
		// 		}
		// 	  } catch(PDOException $e){
	
		// 		$errorReturn = ['estatus' => false];
		// 			  $errorReturn['msj'] = "Error";
		// 			$errorReturn += ['info' => "Error sql:{$e}"];
		// 			return $errorReturn; 
		// 	  }
		// } 


	// 	public function getOne($cedula){
	// 		try {
	// 		  $query = parent::prepare('SELECT * FROM usuarios WHERE cedula_usuario = :cedula and estatus = 1');
	// 		  $respuestaArreglo = '';
	// 		  $query->execute(['cedula'=>$cedula]);
	// 		  $respuestaArreglo = $query->fetchAll();
	// 		  if ($respuestaArreglo += ['estatus' => true]) {
	// 			  $Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
	// 			  $Result['data'] = ['ejecucion'=>true];
	// 			  if(count($respuestaArreglo)>1){
	// 				  $Result['data'] = $respuestaArreglo;
	// 			  }
	// 			  // echo json_encode($Result);
	// 			  return $Result;
	// 		  }
	// 		 //return $respuestaArreglo;
	// 		//require_once 'Vista/usuarios.php';
	// 		} catch (PDOException $e) {
	// 		  $errorReturn = ['estatus' => false];
	// 		  $errorReturn += ['info' => "error sql:{$e}"];
	// 		  return $errorReturn;
	// 		}
	//   }


	}

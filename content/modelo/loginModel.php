<?php

	namespace content\modelo;
	use content\config\conection\database as database;

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


	}

?>
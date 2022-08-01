<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\loginModel as loginModel;

	class loginController{
		private $url;
		private $login;
		function __construct($url){

			$this->url = $url;
			$this->login = new loginModel();		//Se instancia el objeto
		}

		public function Consultar(){


			if($_POST){		//Se verifica que se hayan pasado datos mediante el metodo post
				// print_r($_POST);
				if (isset($_POST['username']) && isset($_POST['loginSistema']) && isset($_POST['password'])) {
					$this->login->getLoginSistema($_POST['username'], $_POST['password']); //pasa el user y pass
					$objModel = new homeModel;
					$_css = new headElement;
					$_css->Heading();

					$url = $this->url;
					require_once("view/homeView.php");
				}

				if (isset($_POST['recuperarSistema']) && isset($_POST['correo'])) {
					$objModel->getRecuperarSistema($_POST['correo']);
				}
			}else{
				$objModel = new homeModel;
				$_css = new headElement;
				$_css->Heading();

				$url = $this->url;
				require_once("view/loginView.php");

			}

		}
		
		public function Agregar(){
		}

		public function Modificar(){
		}

		public function Eliminar(){
		}

	}
		

?>
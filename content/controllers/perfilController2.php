<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\bloqueoModel as bloqueoModel;
	use content\traits\Utility;

	class perfilController{
		use Utility;
		private $url;
		private $home;
		function __construct($url){
			$this->url = $url;
			$this->rsa = new bloqueoModel();
		}

		public function Consultar(){
			$objModel = new bloqueoModel;
			$_css = new headElement;
			$_css->Heading();
			$url = $this->url;
			$buscar = $this->rsa->BuscarCodigo($_SESSION['cuenta_persona']['cedula']);
			require_once("view/perfilView.php");
		}

	}
		

?>
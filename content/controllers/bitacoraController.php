<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\traits\Utility;

	class bitacoraController{
		use Utility;
		private $url;
		private $home;
		private $bitacora;
		function __construct($url){
			$this->url = $url;
			$this->bitacora = new bitacoraModel();
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();
			$this->bitacora->monitorear($this->url);

			$bitacoras = $this->bitacora->Consultar();
			$url = $this->url;
			require_once("view/bitacoraView.php");
		}

	}
		

?>
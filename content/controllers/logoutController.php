<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\bitacoraModel as bitacoraModel;

	class logoutController{
		private $url;
		private $bitacora;
		
		function __construct($url){
			$this->url = $url;
			$this->bitacora = new bitacoraModel();
			$this->bitacora->monitorear($this->url);
		}

		public function Consultar(){
			session_destroy();
			session_unset();
			header("location:"._ROUTE_);	
		}
		

	}
		

?>
<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;

	class logoutController{
		private $url;
		function __construct($url){
			$this->url = $url;
		}

		public function Consultar(){
			session_destroy();
			session_unset();
			header("location:"._ROUTE_);	
		}
		

	}
		

?>
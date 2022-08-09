<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\traits\Utility;

	class homeController{
		use Utility;
		private $url;
		function __construct($url){
			$this->url = $url;
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();
			
			$url = $this->url;
			require_once("view/homeView.php");
		}

	}
		

?>
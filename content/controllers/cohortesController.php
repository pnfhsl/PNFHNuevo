<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\cohortesModel as cohortesModel;
	use content\traits\Utility;
	class cohortesController{
		use Utility;
		private $url;
		private $cohorte;
		function __construct($url){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();

			$this->url = $url;

			$this->cohorte = new cohortesModel();
		}

		public function Consultar(){
			$cohortes = $this->cohorte->Consultar();
			
			$url = $this->url;
			require_once("view/cohortesView.php");
		}
		
		public function Agregar(){
		}

		public function Modificar(){
		}

		public function Eliminar(){
		}

	}
		

?>
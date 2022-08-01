<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\especialidadesModel as especialidadesModel;

	class especialidadesController{
		private $url;
		private $especialidad;
		function __construct($url, $args=[]){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();

			$this->url = $url;
			$this->especialidad = new especialidadesModel();
		}

		public function Consultar(){
			$especialidades = $this->especialidad->Consultar();

			$url = $this->url;
			require_once("view/especialidadesView.php");
		}
		
		public function Agregar(){
		}

		public function Modificar(){
		}

		public function Eliminar(){
		}

	}
		

?>
<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\mantenimientoModel as mantenimientoModel;

	class mantenimientoController{
		private $url;
		private $manteniment;
		function __construct($url){
			// if(empty($_POST['ajax'])){
				// $objModel = new homeModel;
				// $_css = new headElement;
				// $_css->Heading();
			// }
			$this->url = $url;
			$this->manteniment = new mantenimientoModel();

		}

		public function Consultar(){			
				$objModel = new homeModel;
				$_css = new headElement;
				$_css->Heading();
				// $notas = $this->nota->Consultar();			
				// $alumnos = $this->nota->ConsultarAlumnos();			
				// $secciones = $this->nota->ConsultarSecciones();			
				// $saberes = $this->nota->ConsultarSaberes();			
				// $sa = $this->nota->ConsultarSA();			
				$url = $this->url;
				require_once("view/mantenimientoView.php");
			
		}

		public function Respaldar(){
			$objModel = new homeModel;
				$_css = new headElement;
				$_css->Heading();
				
			$mantenimiento = $this->manteniment->Respaldar();
			
			$url = $this->url;
			require_once("view/mantenimiento2View.php");
		}
		// public function Consultar(){
		// 	$url = $this->url;
		// }
		public function Borrarfile(){
			$resul = unlink($_POST['file']);
			echo $resul;
		}
		
		public function Agregar(){
		}

		public function Modificar(){
		}

		public function Eliminar(){
		}

	}
		

?>
<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\mantenimientoModel as mantenimientoModel;
	use content\traits\Utility;
	class mantenimientoController{
		use Utility;
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
			if(!empty($_POST)){
				$mantenimiento = $this->manteniment->Respaldar();
				// print_r($mantenimiento);
				if($mantenimiento['ejecucion']=="1"){
					if(!empty($mantenimiento['response'])){
						$result['msj'] = "Good";
						$result['rutaFile'] = $mantenimiento['response'];
					}else{
						$result['msj'] = "Vacio";
					}
				}else{
					$result['msj'] = "Error";
				}
				echo json_encode($result);
			}
			if(empty($_POST)){
				$objModel = new homeModel;
				$_css = new headElement;
				$_css->Heading();
				$mantenimiento = $this->manteniment->Respaldar();
				$url = $this->url;
				require_once("view/mantenimiento2View.php");
			}
		}
		// public function Consultar(){
		// 	$url = $this->url;
		// }
		public function Borrarfile(){
			$resul = unlink($_POST['file']);
			if($resul=="1"){
				$result['msj'] = "Good";
			}else{
				$result['msj'] = "Error";
			}
			echo json_encode($result);
		}
		
		public function Agregar(){
		}

		public function Modificar(){
		}

		public function Eliminar(){
		}

	}
		

?>
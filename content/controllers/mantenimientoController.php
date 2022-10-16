<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\modelo\mantenimientoModel as mantenimientoModel;
	use content\modelo\notificacionesModel as notificacionesModel;
	use content\traits\Utility;
	class mantenimientoController{
		use Utility;
		private $url;
		private $manteniment;
		private $bitacora;
		private $notificacion;
		

		function __construct($url){
			$this->url = $url;
			$this->notificacion = new notificacionesModel();
			$this->bitacora = new bitacoraModel();
			$this->manteniment = new mantenimientoModel();

		}

		public function Consultar(){			
				$objModel = new homeModel;
				$_css = new headElement;
				$_css->Heading();
				$this->bitacora->monitorear($this->url);
				$url = $this->url;
				require_once("view/mantenimientoView.php");
			
		}

		public function Respaldar(){
			if(!empty($_POST)){
				$mantenimiento = $this->manteniment->Respaldar();
				// print_r($mantenimiento);
				if($mantenimiento['ejecucion']=="1"){
					$this->bitacora->monitorear($this->url);
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
			// if(empty($_POST)){
			// 	$objModel = new homeModel;
			// 	$_css = new headElement;
			// 	$_css->Heading();
			// 	$mantenimiento = $this->manteniment->Respaldar();
			// 	$url = $this->url;
			// 	require_once("view/mantenimiento2View.php");
			// }
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
		
		public function Restaurar(){
			//echo 'holaaa';
			$file = $_FILES['file'];
			$name_file = $file['name'][0];
			$tipo_file = $file['type'][0];
			$ruta_file = $file['tmp_name'][0];
			$error_file = $file['error'][0];
			$size_file = $file['size'][0];

			// echo "Name File: ".$name_file." \n ";
			// echo "Type File: ".$tipo_file." \n ";
			// echo "Ruta File: ".$ruta_file." \n ";
			// echo "Error File: ".$error_file." \n ";
			// echo "Size File: ".$size_file." \n ";
			if($error_file==0){
				$newRuta = "libs/restore/";
				$newName = _DB_WEB_."_".date("Y-m-d__H-i-s");
				copy($ruta_file, $newRuta.$newName);
				$restauracion = $this->manteniment->Restaurar($newRuta.$newName);
				$this->bitacora->monitorear($this->url);
				unlink($newRuta.$newName);
				
				echo json_encode($restauracion);
			}else{
				echo json_encode(['stat'=>2, 'message'=>'Error en la subida del Archivo']);
			}

		}


	}
		

?>
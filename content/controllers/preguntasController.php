<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\preguntasModel as preguntasModel;
	use content\traits\Utility;
	class preguntasController{
	use Utility;
		private $url;
		private $preg;
		function __construct($url){
			$this->url = $url;
			$this->preg = new preguntasModel();
		}

		public function Consultar(){
			$objModel = new preguntasModel;
			$_css = new headElement;
			$_css->Heading();
			
			$url = $this->url;
			$preguntas = $this->preg->Consultar();
			require_once("view/preguntasView.php");
		}

		public function Buscar(){
			$objModel = new preguntasModel;
			$_css = new headElement;
			$_css->Heading();
			
			$url = $this->url;
			require_once("view/preguntasView.php");
		}
		

		public function Agregar(){
			if($_POST){		
				if (!empty(!empty($_POST['Agregar']) && $_POST['resp_uno']) && !empty($_POST['resp_dos']) && !empty($_POST['resp_tres']) ) {
					$datos['preg'] = array($_POST['preg_uno'], $_POST['preg_dos'], $_POST['preg_tres']);
					$datos['resp'] = array($_POST['resp_uno'], $_POST['resp_dos'], $_POST['resp_tres']);
					// $datos['cedula'] = $_SESSION[''];
					$exec = $this->preg->Agregar($datos); 
					echo json_encode($exec);
					// $buscar = $this->preg->getOne($_POST['cedula']);
					// if($buscar['msj']=="Good"){
					// 	if(count($buscar['data'])>1){
					// 		// print_r($buscar['data'][0]['estatus']);
					// 		if($buscar['data'][0]['estatus']==0){
					// 			$datos['id'] = $datos['cedula'];
					// 			$exec = $this->alumno->Modificar($datos); 
					// 			echo json_encode($exec);
					// 		}else{
					// 			echo json_encode(['msj'=>"Repetido"]);
					// 		}
					// 	}else{
					// 		$exec = $this->preg->Agregar($datos); 
					// 		echo json_encode($exec);
					// 	}
					// }else{
					// 	echo json_encode(['msj'=>"Error"]);
					// }
				}else{
					echo json_encode(['msj'=>"Vacio"]);
				}

			}
		}

	}
		

?>
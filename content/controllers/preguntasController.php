<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\preguntasModel as preguntasModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\modelo\usuariosModel as usuariosModel;
	use content\traits\Utility;
	class preguntasController{
	use Utility;
		private $url;
		private $preg;
		private $usuario; 
		private $bitacora;

		function __construct($url){
			$this->url = $url;
			$this->bitacora = new bitacoraModel();
			$this->preg = new preguntasModel();
			$this->usuario = new usuariosModel();
		}

		public function Consultar(){
			$objModel = new preguntasModel;
			$_css = new headElement;
			$_css->Heading();
			$this->bitacora->monitorear($this->url);
			
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
					$datos['cedula'] = $_SESSION['cuenta_usuario']['cedula_usuario'];
					// $datos['llaves'] = array('public','private','');
					// $datos['cedula'] = '27828164';
					// $exec = $this->preg->Agregar($datos); 
					// echo json_encode($exec);

					// print_r($datos);

					$buscar = $this->preg->getOne($datos['cedula']);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						$exec2 = $this->preg->Eliminar($datos['cedula']);
						if($exec2['msj']=="Good"){
						// if(count($buscar['data'])>1){
						// 	//  print_r($buscar['data']['estatus']);
						// 	//  print_r($buscar['data'][0]['estatus']);
						// 	if($buscar['data']['estatus']==0){
						// 		$datos['id'] = $datos['cedula'];
						// 		$exec = $this->preg->Modificar($datos); 
						// 		if($exec['msj']=="Good"){
						// 			$dat['cedula'] = $_SESSION['cuenta_usuario']['cedula_usuario'];
						// 			// $dat['pass'] = $passw;
						// 			$_SESSION['cuenta_usuario']['estatus'] = "1";
						// 			$exec = $this->usuario->CompletarDatos($dat);
						// 			$exec = $this->usuario->GenerarLlaves($dat['cedula'], $this->encriptar($dat['cedula']));
						// 		}
						// 		echo json_encode($exec);
						// 	}else{
						// 		echo json_encode(['msj'=>"Repetido"]);
						// 	}
						// }else{

							$exec = $this->preg->Agregar($datos);
							if($exec['msj']=="Good"){
								$dat['cedula'] = $_SESSION['cuenta_usuario']['cedula_usuario'];
								// $dat['pass'] = $passw;
								$_SESSION['cuenta_usuario']['estatus'] = "1";
								$exec = $this->usuario->CompletarDatos($dat);
								$cedula = $dat['cedula'];
								$firma = $this->encriptar($dat['cedula']);
								$llaves = $this->usuario->GenerarLlaves();
								$public_key = $this->encriptar($llaves['public']);
								$private_key = $this->encriptar($llaves['private']);
								// $exec = $this->usuario->GuardarLlaves($dat['cedula'], $this->encriptar($dat['cedula']), $generar['public'], $generar['private']);
								$exec3 = $this->usuario->LimpiarLlaves($cedula);
								if($exec3['msj']=="Good"){
									$exec = $this->usuario->GuardarLlaves($cedula, $firma, $public_key, $private_key);
								}
							}	
							// var_dump($cedula);
							// var_dump($firma);
							// var_dump($this->encriptar($llaves['public']));
							// var_dump($this->encriptar($llaves['private']));
							echo json_encode($exec);
						// }
						}

					}else{
						echo json_encode(['msj'=>"Error"]);
					}
				}else{
					echo json_encode(['msj'=>"Vacio"]);
				}

			}
		}

	}
		

?>
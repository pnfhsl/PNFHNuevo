<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\preguntasModel as preguntasModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\modelo\usuariosModel as usuariosModel;
	use content\modelo\notificacionesModel as notificacionesModel;
	use content\traits\Utility;
	use phpseclib\Crypt\RSA; 
	class preguntasController{
	use Utility;
		private $url;
		private $preg;
		private $usuario; 
		private $bitacora;
		private $objRSA;
		private $notificacion;

		function __construct($url){
			$this->url = $url;
			$this->notificacion = new notificacionesModel();
			$this->bitacora = new bitacoraModel();
			$this->preg = new preguntasModel();
			$this->usuario = new usuariosModel();
			$this->objRSA = new RSA();
		}

		public function Consultar(){
			$objModel = new preguntasModel;
			$_css = new headElement;
			$_css->Heading();
			$this->bitacora->monitorear($this->url);
			
			$url = $this->url;
			$preguntas = $this->preg->validarConsultar("Consultar");
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
	
					$buscar = $this->preg->validarConsultar("getOne", $datos['cedula']);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						$exec2 = $this->preg->ValidarEliminar("Eliminar", $datos['cedula']);
						if($exec2['msj']=="Good"){
							$exec = $this->preg->ValidarAgregarOModificar("Agregar", $datos);
							if($exec['msj']=="Good"){
								$dat['cedula'] = $_SESSION['cuenta_usuario']['cedula_usuario'];
								$_SESSION['cuenta_usuario']['estatus'] = "1";
								$exec = $this->usuario->ValidarAgregarOModificar("CompletarDatos", $dat);
								$cedula = $dat['cedula'];
								$firma = $this->encriptar($dat['cedula']);

								extract($this->objRSA->createKey()); // publickey // privatekey
								$public_key = $this->encriptar($publickey);
								$private_key = $this->encriptar($privatekey);

								// $llaves = $this->usuario->GenerarLlaves();
								// $public_key = $this->encriptar($llaves['public']);
								// $private_key = $this->encriptar($llaves['private']);
								
								$exec3 = $this->usuario->ValidarEliminar("LimpiarLlaves", $cedula);
								if($exec3['msj']=="Good"){
									$dat['cedula'] = $cedula;
									$dat['firma'] = $firma;
									$dat['public_key'] = $public_key;
									$dat['private_key'] = $private_key;
									$exec = $this->usuario->ValidarAgregarOModificar("GuardarLlaves", $dat);
								}
							}	
							echo json_encode($exec);
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
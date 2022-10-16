<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\modelo\saberesModel as saberesModel;
	use content\modelo\notificacionesModel as notificacionesModel;
	use content\traits\Utility;

	class saberesController{
		use Utility;
		private $url;
		private $saber;
		private $bitacora;
		private $notificacion;

		function __construct($url){			
			$this->url = $url;
			$this->notificacion = new notificacionesModel();
			$this->bitacora = new bitacoraModel();
			$this->saber = new saberesModel();
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();
			$this->bitacora->monitorear($this->url);
			$saberes = $this->saber->validarConsultar("Consultar");
			$url = $this->url;
			require_once("view/saberesView.php");
		}

		public function Buscar(){
			if($_POST){		
				if (isset($_POST['Buscar']) && isset($_POST['userNofif'])) {
					$buscar = $this->saber->validarConsultar("getOne", $_POST['userNofif']);
					echo json_encode($buscar);
				}

			}
		}
		
		public function Agregar(){
			if($_POST){
				if(!empty($_POST['Agregar']) && !empty($_POST['nombreSC']) && !empty($_POST['trayectoSC']) && !empty($_POST['faseSC'])){

					$datos['nombreSC'] = ucwords(mb_strtolower($_POST['nombreSC']));
					$datos['trayectoSC'] = ucwords(mb_strtolower($_POST['trayectoSC']));
					$datos['faseSC'] = $_POST['faseSC'];
					$buscar = $this->saber->validarConsultar("getOne", $_POST['nombreSC']);
					if ($buscar['msj']=="Good") {
						$this->bitacora->monitorear($this->url);
					    if(count($buscar['data'])>1){
					    	if($datos['nombreSC']==$buscar['data'][0]['nombreSC']){
					    		$datos['id_SC'] = $buscar['data'][0]['id_SC'];
								$exec = $this->saber->ValidarAgregarOModificar($datos, "Modificar"); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->saber->ValidarAgregarOModificar($datos, "Agregar"); 
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
				
		
		public function Modificar(){
         if($_POST){		
				if (!empty($_POST['nombreSC']) && !empty($_POST['codigo']) && !empty($_POST['trayectoSC']) && !empty($_POST['faseSC'])) 
				{
					
					$datos['nombreSC'] = ucwords(mb_strtolower($_POST['nombreSC']));
					$datos['trayectoSC'] = ucwords(mb_strtolower($_POST['trayectoSC']));
					$datos['faseSC'] = $_POST['faseSC'];
					$datos['id_SC'] = $_POST['codigo'];
					$buscar = $this->saber->validarConsultar("getOne", $_POST['nombreSC']);

					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							$busq = $buscar['data'][0];
							if($datos['id_SC']==$busq['id_SC']){
								$exec = $this->saber->ValidarAgregarOModificar($datos, "Modificar"); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->saber->ValidarAgregarOModificar($datos, "Modificar"); 
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



		public function Eliminar(){
			if($_POST){		
				if (isset($_POST['Eliminar']) && isset($_POST['userDelete'])) {
					$buscar = $this->saber->validarConsultar("getOneId", $_POST['userDelete']);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->saber->validarEliminar($_POST['userDelete']);
							$exec['data'] = $data;
							echo json_encode($exec);
						}else{
							echo json_encode(['msj'=>"Error No encontrado"]);
						}
					}else{
						echo json_encode(['msj'=>"ErrorEn busqueda"]);
					}
				}

			}
		}

	}
		

?>
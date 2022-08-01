<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\modulosModel as modulosModel;

	class modulosController{
		private $url;
		private $modulo;

		function __construct($url){			
			$this->url = $url;
			$this->modulo = new modulosModel();
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();
			$modulos = $this->modulo->Consultar();
			$url = $this->url;
			require_once("view/modulosView.php");
		}
		public function Buscar(){
			if($_POST){		
				if (isset($_POST['Buscar']) && isset($_POST['moduloM'])) {
					$buscar = $this->modulo->getOne($_POST['moduloM']);
					echo json_encode($buscar);
				}

			}
		}

		public function Agregar(){
			if($_POST){		
				if (!empty($_POST['Agregar']) && !empty($_POST['nombre']) ) {
					$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
					$buscar = $this->modulo->getOneNombre($datos['nombre']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							// print_r($buscar['data'][0]['estatus']);
							if($buscar['data'][0]['estatus']==0){
								$datos['id'] = $datos['cedula'];
								$exec = $this->modulo->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->modulo->Agregar($datos); 
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
				if (!empty($_POST['codigo']) && !empty($_POST['Editar']) && !empty($_POST['nombre'])) {
					$datos['id'] = $_POST['codigo'];
					$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
					$buscar = $this->modulo->getOneNombre($datos['nombre']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							// print_r($buscar['data']);
							if($_POST['codigo']==$buscar['data'][0]['id_modulo']){
								$exec = $this->modulo->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->modulo->Modificar($datos); 
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
				if (isset($_POST['Eliminar']) && isset($_POST['modeloDelete'])) {
					$buscar = $this->modulo->getOne($_POST['modeloDelete']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->modulo->Eliminar($_POST['modeloDelete']);
							$exec['data'] = $data;
							echo json_encode($exec);
						}else{
							echo json_encode(['msj'=>"Error"]);
						}
					}else{
						echo json_encode(['msj'=>"Error"]);
					}
				}

			}
		}

	}
		

?>
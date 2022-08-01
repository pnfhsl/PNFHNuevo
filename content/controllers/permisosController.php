<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\permisosModel as permisosModel;

	class permisosController{
		private $url;
		private $permiso;

		function __construct($url){			
			$this->url = $url;
			$this->permiso = new permisosModel();
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();
			$permisos = $this->permiso->Consultar();
			$url = $this->url;
			require_once("view/permisosView.php");
		}
		public function Buscar(){
			if($_POST){		
				if (isset($_POST['Buscar']) && isset($_POST['permisoM'])) {
					$buscar = $this->permiso->getOne($_POST['permisoM']);
					echo json_encode($buscar);
				}

			}
		}

		public function Agregar(){
			if($_POST){		
				if (!empty($_POST['Agregar']) && !empty($_POST['nombre']) ) {
					$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
					$buscar = $this->permiso->getOneNombre($datos['nombre']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							// print_r($buscar['data'][0]['estatus']);
							if($buscar['data'][0]['estatus']==0){
								$datos['id'] = $datos['cedula'];
								$exec = $this->permiso->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->permiso->Agregar($datos); 
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
					$buscar = $this->permiso->getOneNombre($datos['nombre']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							if($_POST['codigo']==$buscar['data'][0]['id_permiso']){
								$exec = $this->permiso->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->permiso->Modificar($datos); 
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
				if (isset($_POST['Eliminar']) && isset($_POST['permisoDelete'])) {
					$buscar = $this->permiso->getOne($_POST['permisoDelete']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->permiso->Eliminar($_POST['permisoDelete']);
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
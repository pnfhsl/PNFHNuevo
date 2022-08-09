<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\rolesModel as rolesModel;
	use content\modelo\permisosModel as permisosModel;
	use content\modelo\modulosModel as modulosModel;
	use content\traits\Utility;
	class rolesController{
	use Utility;
		private $url;
		private $rol;
		private $modulo;
		private $permisos;
		function __construct($url){
			
			$this->url = $url;
			$this->rol = new rolesModel();
			$this->permiso = new permisosModel();
			$this->modulo = new modulosModel();
		}

		public function Consultar(){
				$objModel = new homeModel;
				$_css = new headElement;
				$_css->Heading();
				$roles = $this->rol->Consultar();	
				$accesos = $this->rol->ConsultarAccesos();
				$permisos = $this->permiso->Consultar();
				$modulos = $this->modulo->Consultar();	
				$url = $this->url;
				require_once("view/rolesView.php");
		}
		
		public function Agregar(){
			if($_POST){		
				// print_r($_POST);
				if (isset($_POST['Agregar']) && !empty($_POST['accesos'])) {

					$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
					$index = 0;
					$nombres = $_POST['accesos'][0];
					$valores = $_POST['accesos'][1];
					$idm = $_POST['accesos'][2];
					$idp = $_POST['accesos'][3];
					$accesos = [];

					foreach ($valores as $keys) {
						$accesos[$index] = ["nombre"=>$nombres[$index], "valor"=>$keys, "id_modulo"=>$idm[$index], "id_permiso"=>$idp[$index]];
						$index++;
					}
					// print_r($accesos);

					$buscar = $this->rol->getOne($datos['nombre']);
					// print_r($buscar);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							if($buscar['data'][0]['estatus']=="0"){
								$datos['id_rol'] = $buscar['data'][0]['id_rol'];
								$exec = $this->rol->setModificar($datos); 
								if($exec['msj']=="Good"){
									$data['id_rol'] = $datos['id_rol'];
									$execB = $this->rol->setEliminarAccesosP($data);
									if($execB['msj']=="Good"){
										foreach ($accesos as $acc) {
											if($acc['valor']=="on"){
												$data['id_modulo'] = $acc['id_modulo'];
												$data['id_permiso'] = $acc['id_permiso'];
												$exec = $this->rol->setAgregarAccesos($data);
											}
										}
										echo json_encode($exec);
									}else{
										echo json_encode(['msj'=>"Error"]);
									}
								}else{
									echo json_encode(['msj'=>"Error"]);
								}
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->rol->setAgregar($datos);
							if($exec['msj']=="Good"){
								if(!empty($exec['data'])){
									$dat = $exec['data'];
									if(!empty($dat['id'])){
										$id_rol = $dat['id'];
										$data['id_rol'] = $id_rol;
										$execB = $this->rol->setEliminarAccesosP($data);
										if($execB['msj']=="Good"){
											foreach ($accesos as $acc) {
												if($acc['valor']=="on"){
													$data['id_modulo'] = $acc['id_modulo'];
													$data['id_permiso'] = $acc['id_permiso'];
													$exec = $this->rol->setAgregarAccesos($data);
												}
											}
											echo json_encode($exec);
										}else{
											echo json_encode(['msj'=>"Error"]);
										}
									}else{
										echo json_encode($exec);
									}
								}else{
									echo json_encode(['msj'=>"Error"]);
								}
							}else{
								echo json_encode(['msj'=>"Error"]);
							}
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
				if (isset($_POST['id']) && isset($_POST['nombre']) && !empty($_POST['Editar']) && !empty($_POST['accesos'])) {
					$datos['id_rol'] = $_POST['id'];
					$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
					$index = 0;
					$nombres = $_POST['accesos'][0];
					$valores = $_POST['accesos'][1];
					$idm = $_POST['accesos'][2];
					$idp = $_POST['accesos'][3];
					$accesos = [];

					foreach ($valores as $keys) {
						$accesos[$index] = ["nombre"=>$nombres[$index], "valor"=>$keys, "id_modulo"=>$idm[$index], "id_permiso"=>$idp[$index]];
						$index++;
					}
					// print_r($accesos);

					$buscar = $this->rol->getOne($datos['nombre']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							if($_POST['id']==$buscar['data'][0]['id_rol']){
								$datos['id_rol'] = $buscar['data'][0]['id_rol'];
								$exec = $this->rol->setModificar($datos); 
								if($exec['msj']=="Good"){
									$data['id_rol'] = $datos['id_rol'];
									$execB = $this->rol->setEliminarAccesosP($data);
									if($execB['msj']=="Good"){
										foreach ($accesos as $acc) {
											if($acc['valor']=="on"){
												$data['id_modulo'] = $acc['id_modulo'];
												$data['id_permiso'] = $acc['id_permiso'];
												$exec = $this->rol->setAgregarAccesos($data);
											}
										}
										echo json_encode($exec);
									}else{
										echo json_encode(['msj'=>"Error"]);
									}
								}else{
									echo json_encode(['msj'=>"Error"]);
								}
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->rol->setModificar($datos);
							if($exec['msj']=="Good"){
								$data['id_rol'] = $datos['id_rol'];
								$execB = $this->rol->setEliminarAccesosP($data);
								if($execB['msj']=="Good"){
									foreach ($accesos as $acc) {
										if($acc['valor']=="on"){
											$data['id_modulo'] = $acc['id_modulo'];
											$data['id_permiso'] = $acc['id_permiso'];
											$exec = $this->rol->setAgregarAccesos($data);
										}
									}
									echo json_encode($exec);
								}else{
									echo json_encode(['msj'=>"Error"]);
								}
							}else{
								echo json_encode(['msj'=>"Error"]);
							}
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
					$buscar = $this->rol->getOneId($_POST['userDelete']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$data['id_rol'] = $_POST['userDelete'];
							$exec = $this->rol->setEliminar($data);
							$exec2 = $this->rol->setEliminarAccesosP($data);
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

		public function Buscar(){
			if($_POST){		
				if (isset($_POST['Buscar']) && isset($_POST['userNofif'])) {
					$json = $this->rol->getOneId($_POST['userNofif']);
					echo json_encode($json);
				}

			}
		}

	}
		

?>
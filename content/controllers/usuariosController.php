<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\usuariosModel as usuariosModel;
	use content\traits\Utility;
	class usuariosController{
		use Utility;
		private $url;
		private $usuario;
		function __construct($url){
			
			$this->url = $url;
			$this->usuario = new usuariosModel();
		}

		public function Consultar(){
						
				$objModel = new homeModel;
				$_css = new headElement;
				$_css->Heading();
				$usuarios = $this->usuario->Consultar();			
				$url = $this->url;
				require_once("view/usuariosView.php");
		}
		
		public function Agregar(){
			if($_POST){		
				if (!empty($_POST['cedula']) && !empty($_POST['Agregar']) && !empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['rol'])) {
					$datos['cedula'] = $_POST['cedula'];
					$datos['user'] = $_POST['user'];
					$datos['pass'] = $_POST['pass'];
					$datos['rol'] = $_POST['rol'];
					$buscar = $this->usuario->getOne($_POST['cedula']);

						// print_r($buscar);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
						// 	// print_r($buscar['data'][0]['estatus']);
							if($buscar['data'][0]['estatus']==0){
								// echo "Actualizara";
								$datos['cedula'] = $datos['cedula'];
								$exec = $this->usuario->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->usuario->Agregar($datos);
							echo json_encode($exec);
							// echo "Agregaraa";
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
				if (!empty($_POST['cedula']) && !empty($_POST['codigo']) && !empty($_POST['Editar']) && !empty($_POST['nombre']) && !empty($_POST['rol']) && isset($_POST['nuevoPassword'])) {
					$datos['id'] = $_POST['codigo'];
					$datos['cedula'] = $_POST['cedula'];
					$datos['nombre'] =$_POST['nombre'];
					$datos['rol'] = $_POST['rol'];
					$datos['nuevoPassword'] = $_POST['nuevoPassword'];
					$buscar = $this->usuario->getOne($_POST['cedula']);
					// var_dump($datos['nuevoPassword']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							if($_POST['codigo']==$_POST['cedula']){
								$exec = $this->usuario->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->usuario->Modificar($datos);
							/*var_dump($datos); */
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
					$buscar = $this->usuario->getOne($_POST['userDelete']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->usuario->Eliminar($_POST['userDelete']);
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
				if (isset($_POST['Buscar']) && isset($_POST['userModif'])) {
					$resultado = $this->usuario->getOne($_POST['userModif']);
					echo json_encode($resultado);
				}

			}
		}

	}
		

?>
<?php 

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\alumnosModel as alumnosModel;
	use content\traits\Utility;

	class alumnosController{
		use Utility;
		private $url;
		private $alumno;

		function __construct($url){			
			$this->url = $url;
			$this->alumno = new alumnosModel();
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();
			$alumnos = $this->alumno->Consultar();
			$url = $this->url;
			require_once("view/alumnosView.php");
		}
		public function Buscar(){
			if($_POST){		
				if (isset($_POST['Buscar']) && isset($_POST['userNofif'])) {
					$buscar = $this->alumno->getOne($_POST['userNofif']);
					echo json_encode($buscar);
				}

			}
		}

		public function Cargar(){
			// var_dump($_FILES["file"]["tmp_name"][0]);
			if (isset($_FILES)) {
				$respuesta = $this->alumno->Cargar($_FILES["file"]["tmp_name"][0]);
				// var_dump($respuesta);
				if($respuesta['msj']=="Good")
					echo json_encode($respuesta);
				}else{
					echo json_encode(['msj'=>"Error"]);
				}

			
			
		}

		public function Agregar(){
			if($_POST){		
				if (!empty($_POST['cedula']) && !empty($_POST['Agregar']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono'])  && !empty($_POST['trayecto'])) {
					$datos['cedula'] = $_POST['cedula'];
					$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
					$datos['apellido'] = ucwords(mb_strtolower($_POST['apellido']));
					// $datos['correo'] = mb_strtolower($_POST['correo']);
					$datos['telefono'] = $_POST['telefono'];
					$datos['trayecto'] = $_POST['trayecto'];
					$buscar = $this->alumno->getOne($_POST['cedula']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							// print_r($buscar['data'][0]['estatus']);
							if($buscar['data'][0]['estatus']==0){
								$datos['id'] = $datos['cedula'];
								$exec = $this->alumno->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->alumno->Agregar($datos); 
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
				if (!empty($_POST['cedula']) && !empty($_POST['codigo']) && !empty($_POST['Editar']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && !empty($_POST['trayecto'])) {
					$datos['id'] = $_POST['codigo'];
					$datos['cedula'] = $_POST['cedula'];
					$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
					$datos['apellido'] = ucwords(mb_strtolower($_POST['apellido']));
					$datos['telefono'] = $_POST['telefono'];
					$datos['trayecto'] = $_POST['trayecto'];
					$buscar = $this->alumno->getOne($_POST['cedula']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							if($_POST['codigo']==$_POST['cedula']){
								$exec = $this->alumno->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->alumno->Modificar($datos); 
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
					$buscar = $this->alumno->getOne($_POST['userDelete']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->alumno->Eliminar($_POST['userDelete']);
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
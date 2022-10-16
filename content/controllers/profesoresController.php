<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\modelo\profesoresModel as profesoresModel;
	use content\modelo\notificacionesModel as notificacionesModel;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	use content\traits\Utility;

	class profesoresController{
		use Utility;
		private $url;
		private $profesor;
		private $bitacora;
		private $notificacion;

		function __construct($url){			
			$this->url = $url;
			$this->notificacion = new notificacionesModel();
			$this->bitacora = new bitacoraModel();
			$this->profesor = new profesoresModel();
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();
			$this->bitacora->monitorear($this->url);

			$profesores = $this->profesor->validarConsultar("Consultar");
			$url = $this->url;
			require_once("view/profesoresView.php");
		}

		public function Buscar(){
			if($_POST){		
				if (isset($_POST['Buscar']) && isset($_POST['userNofif'])) {
					$buscar = $this->profesor->validarConsultar("getOne", $_POST['userNofif']);
					echo json_encode($buscar);
				}

			}
		}

		public function Cargar(){
			if (isset($_FILES)) {
				$documento = IOFactory::load($_FILES["file"]["tmp_name"][0]);
			$hojaProfesor = $documento->getSheet(0);
			$numeroFilas = $hojaProfesor->getHighestDataRow(); 
			$error = 0;

				for ($i=2; $i <= $numeroFilas; $i++) { 
					$datos['cedula'] = $hojaProfesor->getCellByColumnAndRow(1,$i);
					$datos['nombre'] = $hojaProfesor->getCellByColumnAndRow(2,$i);
					$datos['apellido'] = $hojaProfesor->getCellByColumnAndRow(3,$i);
					$datos['telef'] = $hojaProfesor->getCellByColumnAndRow(4,$i);
					$buscar = $this->profesor->validarConsultar("BuscarExcel", $datos['cedula']);
					if ($buscar) {
						$respuesta = $this->profesor->Cargar($datos);
						if ($respuesta['msj'] != "Good") {
							$error++;
							
						} 
					}
				}
				if($error == 0){
					echo json_encode(['msj' => "Good"]);
				}else{
					echo json_encode(['msj' => "Se encontraron $error"]);
				}

				
			}
		}

		public function Agregar(){
			if($_POST){		
				if (!empty($_POST['cedula']) && !empty($_POST['Agregar']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono'])) {
					$datos['cedula'] = $_POST['cedula'];
					$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
					$datos['apellido'] = ucwords(mb_strtolower($_POST['apellido']));
					$datos['telefono'] = $_POST['telefono'];
					$buscar = $this->profesor->validarConsultar("getOne", $_POST['cedula']);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							// print_r($buscar['data'][0]['estatus']);
							if($buscar['data'][0]['estatus']==0){
								$datos['id'] = $datos['cedula'];
								$exec = $this->profesor->ValidarAgregarOModificar($datos, "Modificar"); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->profesor->ValidarAgregarOModificar($datos, "Agregar"); 
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
				if (!empty($_POST['cedula']) && !empty($_POST['codigo']) && !empty($_POST['Editar']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono'])) {
					$datos['id'] = $_POST['codigo'];
					$datos['cedula'] = $_POST['cedula'];
					$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
					$datos['apellido'] = ucwords(mb_strtolower($_POST['apellido']));
					$datos['telefono'] = $_POST['telefono'];
					$buscar = $this->profesor->validarConsultar("getOne", $_POST['cedula']);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							if($_POST['codigo']==$_POST['cedula']){
								$exec = $this->profesor->ValidarAgregarOModificar($datos, "Modificar"); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->profesor->ValidarAgregarOModificar($datos, "Modificar"); 
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
					$buscar = $this->profesor->validarConsultar("getOne", $_POST['userDelete']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->profesor->validarEliminar($_POST['userDelete']);
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

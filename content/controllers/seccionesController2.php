<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\seccionesModel as seccionesModel;
	use content\modelo\periodosModel as periodosModel;
	use content\modelo\alumnosModel as alumnosModel;

	class seccionesController{
		private $url;
		private $seccion;
		private $periodo;
		private $alumno;
		function __construct($url){

			$this->url = $url;

			$this->seccion = new seccionesModel();
			$this->periodo = new periodosModel();
			$this->alumno = new alumnosModel();
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();

			$secciones = $this->seccion->Consultar();
			$periodos = $this->periodo->Consultar();
			$alumnos = $this->alumno->Consultar();

			$url = $this->url;
			require_once("view/seccionesView.php");
		}

		public function Buscar(){
			if($_POST){		
				if (isset($_POST['Buscar']) && isset($_POST['userNofif'])) {
					$buscar = $this->seccion->getOne($_POST['userNofif']);
					echo json_encode($buscar);
				}

			}
		}
		
		public function Agregar(){
			if($_POST){		
				if (!empty($_POST['Agregar']) && !empty($_POST['nombre']) && !empty($_POST['periodo']) && !empty($_POST['trayecto'])) {

					$codSeccion = "T".$_POST['trayecto']."P".$_POST['periodo']."S";
					$codSeccion = $this->seccion->ExtraerPK($codSeccion); // "C2Y2022LDR5PED83P327"	
					$datos['id'] = $codSeccion;
					$datos['seccion'] = mb_strtoupper($_POST['nombre']);
					$datos['id_periodo'] = $_POST['periodo'];
					$datos['trayecto'] = $_POST['trayecto'];

					$buscar = $this->seccion->getOneData($datos);
					// print_r($buscar);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							if($buscar['data'][0]['estatus']==0){
								$datos['id'] = $buscar['data'][0]['cod_seccion'];
								$exec = $this->seccion->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->seccion->Agregar($datos); 
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
				if (!empty($_POST['codigo']) && !empty($_POST['Editar']) && !empty($_POST['seccion']) && !empty($_POST['trayecto']) && !empty($_POST['periodo'])) {
					$datos['id'] = $_POST['codigo'];
					$datos['seccion'] = mb_strtoupper($_POST['seccion']);
					$datos['id_periodo'] = $_POST['periodo'];
					$datos['trayecto'] = $_POST['trayecto'];
					$buscar = $this->seccion->getOneData($datos);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							if($_POST['codigo']==$buscar['data'][0]['cod_seccion']){
								$exec = $this->seccion->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->seccion->Modificar($datos); 
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
				if (isset($_POST['Eliminar']) && isset($_POST['cod_seccion'])) {
					$buscar = $this->seccion->getOne($_POST['cod_seccion']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->seccion->Eliminar($_POST['cod_seccion']);
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
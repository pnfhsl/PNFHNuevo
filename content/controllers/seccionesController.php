<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\modelo\seccionesModel as seccionesModel;
	use content\modelo\periodosModel as periodosModel;
	use content\modelo\alumnosModel as alumnosModel;
	use content\modelo\notificacionesModel as notificacionesModel;
	use content\traits\Utility;

	class seccionesController{
		use Utility;
		private $url;
		private $seccion;
		private $periodo;
		private $alumno;
		private $bitacora;
		private $notificacion;

		function __construct($url){

			$this->url = $url;
			$this->notificacion = new notificacionesModel();
			$this->bitacora = new bitacoraModel();

			$this->seccion = new seccionesModel();
			$this->periodo = new periodosModel();
			$this->alumno = new alumnosModel();
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();
			$this->bitacora->monitorear($this->url);

			$secciones = $this->seccion->validarConsultar("Consultar");
			$seccionAlumnos = $this->seccion->validarConsultar("ConsultarSeccionAlumnos");
			// $secAlumnos = $this->seccion->ConsultarSeccionAlumnos2();
			$periodos = $this->periodo->validarConsultar("Consultar");
			$alumnos = $this->alumno->validarConsultar("Consultar");
			// print_r($alumnos);

			$url = $this->url;
			require_once("view/seccionesView.php");
		}

		public function Buscar(){
			if($_POST){		
				if (isset($_POST['Buscar']) && isset($_POST['cod_seccion'])) {
					$buscar = $this->seccion->validarConsultar("getOne", $_POST['cod_seccion']);
					echo json_encode($buscar);
				}
				if(isset($_POST['Buscar']) && isset($_POST['alumnos']) && isset($_POST['trayecto'])  && isset($_POST['periodo'])){
					$trayecto = $_POST['trayecto'];
					$periodo = $_POST['periodo'];
					// echo "T: ".$trayecto." | ";
					// echo "P: ".$periodo." | ";
					$buscar = $this->alumno->validarConsultar("Consultar", $trayecto);
					// print_r($buscar);
					$response = [];
					if(count($buscar)>0){
						$response['data'] = $buscar;
						$response['msj'] = "Good";
						$buscar2 = $this->seccion->validarConsultar("ConsultarSecciones", $trayecto, $periodo);
						if(count($buscar2)>0){
							$response['msjSecciones'] = "Good";
							$response['dataSecciones'] = $buscar2;
						}else{
							$response['msjSecciones'] = "Vacio";
						}
					}else{
						$response['msj'] = "Vacio";
					}
					echo json_encode($response);
				}
			}
		}
		
		public function Agregar(){
			if($_POST){		
				if (!empty($_POST['Agregar']) && !empty($_POST['nombre']) && !empty($_POST['periodo']) && !empty($_POST['trayecto']) && !empty($_POST['alumnos'])) {

					$codSeccion = "T".$_POST['trayecto']."P".$_POST['periodo']."S";
					$codSeccion = $this->seccion->ExtraerPK($codSeccion); // "C2Y2022LDR5PED83P327"	
					$datos['cod_seccion'] = $codSeccion;
					$datos['seccion'] = mb_strtoupper($_POST['nombre']);
					$datos['id_periodo'] = $_POST['periodo'];
					$datos['trayecto'] = $_POST['trayecto'];
					$datos['alumnos'] = $_POST['alumnos'];

					$buscar = $this->seccion->validarConsultar("getOneData", $datos);
					// print_r($buscar);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							if($buscar['data'][0]['estatus']==0){
								$datos['cod_seccion'] = $buscar['data'][0]['cod_seccion'];
								$exec = $this->seccion->ValidarAgregarOModificar($datos, "Modificar"); 

								if($exec["msj"] == "Good"){
									$exec = $this->seccion->validarEliminar("EliminarSeccionAlumno", $datos['cod_seccion']);
									 	if($exec["msj"] == "Good"){
											
											$data['cod_seccion'] = $datos['cod_seccion'];  
											foreach ($datos['alumnos'] as $alumnos) {
												$data['cedula_alumno'] = $alumnos;
													$exec = $this->seccion->ValidarAgregarOModificar("AgregarSecAlumno", $data); 
											}

											echo json_encode($exec);

										}else{
											echo json_encode($exec);
										} 
								}else{
									echo json_encode($exec);
								}

								// echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->seccion->ValidarAgregarOModificar($datos, "Agregar"); 
							if($exec["msj"] == "Good"){
								$exec = $this->seccion->validarEliminar("EliminarSeccionAlumno", $datos['cod_seccion']);
								 	if($exec["msj"] == "Good"){
										
										$data['cod_seccion'] = $datos['cod_seccion'];  
										foreach ($datos['alumnos'] as $alumnos) {
											$data['cedula_alumno'] = $alumnos;
												$exec = $this->seccion->ValidarAgregarOModificar("AgregarSecAlumno", $data); 
										}

										echo json_encode($exec);

									}else{
										echo json_encode($exec);
									} 
							}else{
								echo json_encode($exec);
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
				// print_r($_POST);
				if (!empty($_POST['codigo']) && !empty($_POST['Editar']) && !empty($_POST['seccion']) && !empty($_POST['trayecto']) && !empty($_POST['periodo'])  && !empty($_POST['alumnos'])) {
					$datos['cod_seccion'] = $_POST['codigo'];
					$datos['seccion'] = mb_strtoupper($_POST['seccion']);
					$datos['id_periodo'] = $_POST['periodo'];
					$datos['trayecto'] = $_POST['trayecto'];
					$datos['alumnos'] = $_POST['alumnos'];
					// echo json_encode($datos['alumnos']);	
					$buscar = $this->seccion->validarConsultar("getOneData", $datos);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							if($_POST['codigo']==$buscar['data'][0]['cod_seccion']){
								$datos['cod_seccion'] = $buscar['data'][0]['cod_seccion'];
								$exec = $this->seccion->ValidarAgregarOModificar($datos, "Modificar"); 
								if($exec["msj"] == "Good"){
									$exec = $this->seccion->validarEliminar("EliminarSeccionAlumno", $datos['cod_seccion']);
									 	if($exec["msj"] == "Good"){
											
											$data['cod_seccion'] = $datos['cod_seccion'];  
											foreach ($datos['alumnos'] as $alumnos) {
												$data['cedula_alumno'] = $alumnos;
													$exec = $this->seccion->ValidarAgregarOModificar("AgregarSecAlumno", $data); 
											}

											echo json_encode($exec);

										}else{
											echo json_encode($exec);
										} 
								}else{
									echo json_encode($exec);
								} 
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->seccion->ValidarAgregarOModificar($datos, "Modificar");
							if($exec["msj"] == "Good"){
								$exec = $this->seccion->validarEliminar("EliminarSeccionAlumno", $datos['cod_seccion']);
								 	if($exec["msj"] == "Good"){
										
										$data['cod_seccion'] = $datos['cod_seccion'];  
										foreach ($datos['alumnos'] as $alumnos) {
											$data['cedula_alumno'] = $alumnos;
												$exec = $this->seccion->ValidarAgregarOModificar("AgregarSecAlumno", $data); 
										}

										echo json_encode($exec);

									}else{
										echo json_encode($exec);
									} 
							}else{
								echo json_encode($exec);
							} 
							// echo json_encode($exec);
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
					$buscar = $this->seccion->validarConsultar("getOne", $_POST['cod_seccion']);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->seccion->validarEliminar("Eliminar", $_POST['cod_seccion']);
							$exec2 = $this->seccion->validarEliminar("EliminarSeccionAlumno", $_POST['cod_seccion']);
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
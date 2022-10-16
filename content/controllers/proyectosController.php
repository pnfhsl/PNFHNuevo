<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\profesoresModel as profesoresModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\modelo\proyectosModel as proyectosModel;
	use content\modelo\seccionesModel as seccionesModel;
	use content\modelo\alumnosModel as alumnosModel;
	use content\modelo\notificacionesModel as notificacionesModel;
	use content\traits\Utility;


	class proyectosController{
		use Utility;
		private $url;
		private $proyecto;
		private $seccion;
		private $alumno;
		private $bitacora;
		private $notificacion;

		function __construct($url){
			$this->url = $url;
			$this->notificacion = new notificacionesModel();
			$this->bitacora = new bitacoraModel();
			$this->seccion = new seccionesModel();
			$this->proyecto = new proyectosModel();
			$this->alumno = new alumnosModel();
			$this->profesor = new profesoresModel();
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();

			$this->bitacora->monitorear($this->url);

			$proyectos = $this->proyecto->validarConsultar("Consultar");
			$profesores = $this->profesor->validarConsultar("Consultar");

			$gruposAlumnos = $this->proyecto->validarConsultar("ConsultarGrupos");

			// $secciones1 = $this->seccion->Consultar("1");
			// $secciones2 = $this->seccion->Consultar("2");
			// $secciones3 = $this->seccion->Consultar("3");
			// $secciones4 = $this->seccion->Consultar("4");
			$secciones = $this->seccion->validarConsultar("Consultar");
			$gruposSec = $this->proyecto->validarConsultar("ConsultarGrupos2");

			// $alumnos1 = $this->alumno->Consultar("1");
			// $alumnos2 = $this->alumno->Consultar("2");
			// $alumnos3 = $this->alumno->Consultar("3");
			// $alumnos4 = $this->alumno->Consultar("4");
			// $alumnos = $this->alumno->Consultar();
			// $seccionAlumnos1 = $this->seccion->ConsultarSeccionAlumnos("1");
			// $seccionAlumnos2 = $this->seccion->ConsultarSeccionAlumnos("2");
			// $seccionAlumnos3 = $this->seccion->ConsultarSeccionAlumnos("3");
			// $seccionAlumnos4 = $this->seccion->ConsultarSeccionAlumnos("4");
			$seccionAlumnos = $this->seccion->validarConsultar("ConsultarSeccionAlumnos");
			
			$url = $this->url;
			require_once("view/proyectosView.php");
		}

		public function Buscar(){
			if($_POST){		
				if (isset($_POST['Buscar']) && isset($_POST['cod_proyecto'])) {
					$buscar = $this->proyecto->validarConsultar("getOne", $_POST['cod_proyecto']);
					echo json_encode($buscar);
				}
				if(isset($_POST['Buscar']) && isset($_POST['secciones']) && isset($_POST['trayecto'])){
					$trayecto = $_POST['trayecto'];
					$buscar = $this->seccion->validarConsultar("Consultar", $trayecto);
					$response = [];
					if(count($buscar)>0){
						$response['data'] = $buscar;
						$response['msj'] = "Good";
					}else{
						$response['msj'] = "Vacio";
					}
					echo json_encode($response);
				}
				if(isset($_POST['Buscar']) && isset($_POST['alumnos']) && isset($_POST['cod_seccion'])){
					$cod_seccion = $_POST['cod_seccion'];
					$buscar = $this->seccion->validarConsultar("ConsultarSeccionAlumnos", $cod_seccion);
					$response = [];
					if(count($buscar)>0){
						$response['data'] = $buscar;
						$response['msj'] = "Good";
						$buscar2 = $this->proyecto->validarConsultar("ConsultarGrupos", $cod_seccion);
						if(count($buscar2)>0){
							$response['msjProyectos'] = "Good";
							$response['dataProyectos'] = $buscar2;
						}else{
							$response['msjProyectos'] = "Vacio";
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
				if (!empty($_POST['Agregar']) && !empty($_POST['nombre']) && !empty($_POST['seccion']) && !empty($_POST['trayecto']) && !empty($_POST['alumnos']) && !empty($_POST['tutor']) ) {

					$codProyecto = "T".$_POST['trayecto']."S".$_POST['seccion']."P";
					$codProyecto = $this->proyecto->ExtraerPK($codProyecto); // "C2Y2022LDR5PED83P327"	
					$datos['id'] = $codProyecto;
					$datos['nombre'] = ucwords(mb_strtoupper($_POST['nombre']));
					$datos['trayecto'] = $_POST['trayecto'];
					$datos['cod_seccion'] = $_POST['seccion'];
					$datos['id_SA'] = $_POST['alumnos'];
					$datos['cedula_tutor'] = $_POST['tutor'];

					$buscar = $this->proyecto->validarConsultar("getOneData", $datos);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							if($buscar['data'][0]['estatus']==0){
								$datos['id'] = $buscar['data'][0]['cod_proyecto'];
								$exec = $this->proyecto->ValidarAgregarOModificar($datos, "Modificar"); 
								if($exec['msj']=="Good"){
									$exec2 = $this->proyecto->validarEliminar("EliminarGrupos", $datos['id']);
									if($exec2['msj']=="Good"){
										$data['cod_proyecto'] = $datos['id'];
										$codGrupo = "P".$datos['id']."G";
										foreach ($datos['id_SA'] as $id_SA) {
											$cod_Grupo = $this->proyecto->ExtraerPKGrupo($codGrupo); // "C2Y2022LDR5PED83P327"	
											$data['cod_grupo'] = $cod_Grupo;
											$data['id_SA'] = $id_SA;
											$exec = $this->proyecto->ValidarAgregarOModificar("AgregarGrupo", $data); 
										}
										echo json_encode($exec);
									}else{
										echo json_encode($exec2);
									}
								}else{
									echo json_encode($exec);
								}
								// echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->proyecto->ValidarAgregarOModificar($datos, "Agregar"); 
							if($exec['msj']=="Good"){
								$exec2 = $this->proyecto->validarEliminar("EliminarGrupos", $datos['id']);
								if($exec2['msj']=="Good"){
									$data['cod_proyecto'] = $datos['id'];
									$codGrupo = "P".$datos['id']."G";
									foreach ($datos['id_SA'] as $id_SA) {
										$cod_Grupo = $this->proyecto->ExtraerPKGrupo($codGrupo); // "C2Y2022LDR5PED83P327"	
										$data['cod_grupo'] = $cod_Grupo;
										$data['id_SA'] = $id_SA;
										$exec = $this->proyecto->EliminarGrupos("AgregarGrupo", $data); 
									}
									echo json_encode($exec);
								}else{
									echo json_encode($exec2);
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
				if (!empty($_POST['Editar']) && !empty($_POST['nombre']) && !empty($_POST['seccion']) && !empty($_POST['trayecto'])  && !empty($_POST['alumnos']) && !empty($_POST['tutor']) ) {

					// $codProyecto = "T".$_POST['trayecto']."S".$_POST['seccion']."P";
					// $codProyecto = $this->proyecto->ExtraerPK($codProyecto); // "C2Y2022LDR5PED83P327"	
					// $datos['id'] = $codProyecto;
					$codProyecto = $_POST['codigo'];
					$datos['id'] = $_POST['codigo'];
					$datos['nombre'] = ucwords(mb_strtoupper($_POST['nombre']));
					$datos['trayecto'] = $_POST['trayecto'];
					$datos['cod_seccion'] = $_POST['seccion'];
					$datos['cedula_tutor'] = $_POST['tutor'];
					$datos['id_SA'] = $_POST['alumnos'];

					$buscar = $this->proyecto->validarConsultar("getOneData", $datos);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							if($_POST['codigo'] == $buscar['data'][0]['cod_proyecto']){
								$datos['id'] = $buscar['data'][0]['cod_proyecto'];
								$exec = $this->proyecto->ValidarAgregarOModificar($datos, "Modificar"); 
								if($exec['msj']=="Good"){
									$exec2 = $this->proyecto->validarEliminar("EliminarGrupos", $datos['id']);
									if($exec2['msj']=="Good"){
										$data['cod_proyecto'] = $datos['id'];
										$codGrupo = "P".$datos['id']."G";
										foreach ($datos['id_SA'] as $id_SA) {
											$cod_Grupo = $this->proyecto->ExtraerPKGrupo($codGrupo); // "C2Y2022LDR5PED83P327"	
											$data['cod_grupo'] = $cod_Grupo;
											$data['id_SA'] = $id_SA;
											$exec = $this->proyecto->ValidarAgregarOModificar("AgregarGrupo", $data); 
										}
										echo json_encode($exec);
									}else{
										echo json_encode($exec2);
									}
								}else{
									echo json_encode($exec);
								}
								// echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->proyecto->ValidarAgregarOModificar($datos, "Modificar"); 
							if($exec['msj']=="Good"){
								$exec2 = $this->proyecto->validarEliminar("EliminarGrupos", $datos['id']);
								if($exec2['msj']=="Good"){
									$data['cod_proyecto'] = $datos['id'];
									$codGrupo = "P".$datos['id']."G";
									foreach ($datos['id_SA'] as $id_SA) {
										$cod_Grupo = $this->proyecto->ExtraerPKGrupo($codGrupo); // "C2Y2022LDR5PED83P327"	
										$data['cod_grupo'] = $cod_Grupo;
										$data['id_SA'] = $id_SA;
										$exec = $this->proyecto->ValidarAgregarOModificar("AgregarGrupo", $data); 
									}
									echo json_encode($exec);
								}else{
									echo json_encode($exec2);
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

		public function Eliminar(){
			if($_POST){		
				if (isset($_POST['Eliminar']) && isset($_POST['cod_proyecto'])) {
					$buscar = $this->proyecto->validarConsultar("getOne", $_POST['cod_proyecto']);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->proyecto->validarEliminar("Eliminar", $_POST['cod_proyecto']);
							if($exec['msj']=="Good"){

								$exec = $this->proyecto->validarEliminar("EliminarGrupos", $_POST['cod_proyecto']);
								$exec['data'] = $data;
								echo json_encode($exec);
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

			}
		}

	}
		

?>
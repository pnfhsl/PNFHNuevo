<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\proyectosModel as proyectosModel;
	use content\modelo\seccionesModel as seccionesModel;
	use content\modelo\alumnosModel as alumnosModel;
	use content\traits\Utility;


	class proyectosController{
		use Utility;
		private $url;
		private $proyecto;
		private $seccion;
		private $alumno;

		function __construct($url){

			$this->url = $url;
			$this->seccion = new seccionesModel();
			$this->proyecto = new proyectosModel();
			$this->alumno = new alumnosModel();
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();

			$proyectos = $this->proyecto->Consultar();

			$gruposAlumnos = $this->proyecto->ConsultarGrupos();

			// $secciones1 = $this->seccion->Consultar("1");
			// $secciones2 = $this->seccion->Consultar("2");
			// $secciones3 = $this->seccion->Consultar("3");
			// $secciones4 = $this->seccion->Consultar("4");
			$secciones = $this->seccion->Consultar();
			$gruposSec = $this->proyecto->ConsultarGrupos2();

			// $alumnos1 = $this->alumno->Consultar("1");
			// $alumnos2 = $this->alumno->Consultar("2");
			// $alumnos3 = $this->alumno->Consultar("3");
			// $alumnos4 = $this->alumno->Consultar("4");
			// $alumnos = $this->alumno->Consultar();
			// $seccionAlumnos1 = $this->seccion->ConsultarSeccionAlumnos("1");
			// $seccionAlumnos2 = $this->seccion->ConsultarSeccionAlumnos("2");
			// $seccionAlumnos3 = $this->seccion->ConsultarSeccionAlumnos("3");
			// $seccionAlumnos4 = $this->seccion->ConsultarSeccionAlumnos("4");
			$seccionAlumnos = $this->seccion->ConsultarSeccionAlumnos();
			
			$url = $this->url;
			require_once("view/proyectosView.php");
		}

		public function Buscar(){
			if($_POST){		
				if (isset($_POST['Buscar']) && isset($_POST['cod_proyecto'])) {
					$buscar = $this->proyecto->getOne($_POST['cod_proyecto']);
					echo json_encode($buscar);
				}
				if(isset($_POST['Buscar']) && isset($_POST['secciones']) && isset($_POST['trayecto'])){
					$trayecto = $_POST['trayecto'];
					$buscar = $this->seccion->Consultar($trayecto);
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
					$buscar = $this->seccion->ConsultarSeccionAlumnos($cod_seccion);
					$response = [];
					if(count($buscar)>0){
						$response['data'] = $buscar;
						$response['msj'] = "Good";
						$buscar2 = $this->proyecto->ConsultarGrupos($cod_seccion);
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
				if (!empty($_POST['Agregar']) && !empty($_POST['nombre']) && !empty($_POST['seccion']) && !empty($_POST['trayecto'])  && !empty($_POST['alumnos']) ) {

					$codProyecto = "T".$_POST['trayecto']."S".$_POST['seccion']."P";
					$codProyecto = $this->proyecto->ExtraerPK($codProyecto); // "C2Y2022LDR5PED83P327"	
					$datos['id'] = $codProyecto;
					$datos['nombre'] = ucwords(mb_strtoupper($_POST['nombre']));
					$datos['trayecto'] = $_POST['trayecto'];
					$datos['cod_seccion'] = $_POST['seccion'];
					$datos['id_SA'] = $_POST['alumnos'];

					$buscar = $this->proyecto->getOneData($datos);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							if($buscar['data'][0]['estatus']==0){
								$datos['id'] = $buscar['data'][0]['cod_proyecto'];
								$exec = $this->proyecto->Modificar($datos); 
								if($exec['msj']=="Good"){
									$exec2 = $this->proyecto->EliminarGrupos($datos['id']);
									if($exec2['msj']=="Good"){
										$data['cod_proyecto'] = $datos['id'];
										$codGrupo = "P".$datos['id']."G";
										foreach ($datos['id_SA'] as $id_SA) {
											$cod_Grupo = $this->proyecto->ExtraerPKGrupo($codGrupo); // "C2Y2022LDR5PED83P327"	
											$data['cod_grupo'] = $cod_Grupo;
											$data['id_SA'] = $id_SA;
											$exec = $this->proyecto->AgregarGrupo($data); 
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
							$exec = $this->proyecto->Agregar($datos); 
							if($exec['msj']=="Good"){
								$exec2 = $this->proyecto->EliminarGrupos($datos['id']);
								if($exec2['msj']=="Good"){
									$data['cod_proyecto'] = $datos['id'];
									$codGrupo = "P".$datos['id']."G";
									foreach ($datos['id_SA'] as $id_SA) {
										$cod_Grupo = $this->proyecto->ExtraerPKGrupo($codGrupo); // "C2Y2022LDR5PED83P327"	
										$data['cod_grupo'] = $cod_Grupo;
										$data['id_SA'] = $id_SA;
										$exec = $this->proyecto->AgregarGrupo($data); 
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
				if (!empty($_POST['Editar']) && !empty($_POST['nombre']) && !empty($_POST['seccion']) && !empty($_POST['trayecto'])  && !empty($_POST['alumnos']) ) {

					// $codProyecto = "T".$_POST['trayecto']."S".$_POST['seccion']."P";
					// $codProyecto = $this->proyecto->ExtraerPK($codProyecto); // "C2Y2022LDR5PED83P327"	
					// $datos['id'] = $codProyecto;
					$codProyecto = $_POST['codigo'];
					$datos['id'] = $_POST['codigo'];
					$datos['nombre'] = ucwords(mb_strtoupper($_POST['nombre']));
					$datos['trayecto'] = $_POST['trayecto'];
					$datos['cod_seccion'] = $_POST['seccion'];
					$datos['id_SA'] = $_POST['alumnos'];

					$buscar = $this->proyecto->getOneData($datos);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							if($_POST['codigo'] == $buscar['data'][0]['cod_proyecto']){
								$datos['id'] = $buscar['data'][0]['cod_proyecto'];
								$exec = $this->proyecto->Modificar($datos); 
								if($exec['msj']=="Good"){
									$exec2 = $this->proyecto->EliminarGrupos($datos['id']);
									if($exec2['msj']=="Good"){
										$data['cod_proyecto'] = $datos['id'];
										$codGrupo = "P".$datos['id']."G";
										foreach ($datos['id_SA'] as $id_SA) {
											$cod_Grupo = $this->proyecto->ExtraerPKGrupo($codGrupo); // "C2Y2022LDR5PED83P327"	
											$data['cod_grupo'] = $cod_Grupo;
											$data['id_SA'] = $id_SA;
											$exec = $this->proyecto->AgregarGrupo($data); 
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
							$exec = $this->proyecto->Modificar($datos); 
							if($exec['msj']=="Good"){
								$exec2 = $this->proyecto->EliminarGrupos($datos['id']);
								if($exec2['msj']=="Good"){
									$data['cod_proyecto'] = $datos['id'];
									$codGrupo = "P".$datos['id']."G";
									foreach ($datos['id_SA'] as $id_SA) {
										$cod_Grupo = $this->proyecto->ExtraerPKGrupo($codGrupo); // "C2Y2022LDR5PED83P327"	
										$data['cod_grupo'] = $cod_Grupo;
										$data['id_SA'] = $id_SA;
										$exec = $this->proyecto->AgregarGrupo($data); 
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
					$buscar = $this->proyecto->getOne($_POST['cod_proyecto']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->proyecto->Eliminar($_POST['cod_proyecto']);
							if($exec['msj']=="Good"){

								$exec = $this->proyecto->EliminarGrupos($_POST['cod_proyecto']);
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
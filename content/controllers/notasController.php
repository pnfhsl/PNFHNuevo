<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\notasModel as notasModel;
	use content\modelo\seccionesModel as seccionesModel;
	use content\modelo\saberesModel as saberesModel;
	use content\modelo\clasesModel as clasesModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\modelo\notificacionesModel as notificacionesModel;
	use content\traits\Utility;
	
	class notasController{
		use Utility;
		private $url;
		private $nota;
		private $seccion;
		private $saber;
		private $clase;
		private $bitacora;
		private $notificacion;

		private $idNota;
		function __construct($url){
			
			$this->url = $url;
			$this->notificacion = new notificacionesModel();
			$this->bitacora = new bitacoraModel();
			$this->nota = new notasModel();
			$this->seccion = new seccionesModel();
			$this->saber = new saberesModel();
			$this->clase = new clasesModel();
		}

		public function Consultar(){			
			if(!empty($_POST['id_notificacion2']) && !empty($_POST['lista']) && !empty($_POST['visto'])){
				$this->notificacion->RevisarNotificacion();
				header("location:./".$this->encriptar("Notas"));
			}else{

				$objModel = new homeModel;
				$_css = new headElement;
				$_css->Heading();
				$this->bitacora->monitorear($this->url);
				
				if($_SESSION['cuenta_usuario']['nombre_rol']=="Alumnos"){
					$notas = $this->nota->validarConsultar("Consultar", $_SESSION['cuenta_persona']['cedula'], $_SESSION['cuenta_usuario']['nombre_rol']);
					$url = $this->url;
					require_once("view/notasAlumnoView.php");
				}else{
					$alumnos = $this->nota->validarConsultar("ConsultarNotasAlumnos");
					if($_SESSION['cuenta_usuario']['nombre_rol']=="Superusuario"){
						$notas = $this->nota->validarConsultar("Consultar");
						$secciones = $this->clase->validarConsultar("ConsultarSeccionClase");

					}
					if($_SESSION['cuenta_usuario']['nombre_rol']=="Administrador"){
						$notas = $this->nota->validarConsultar("Consultar");
						$secciones = $this->clase->validarConsultar("ConsultarSeccionClase");
					}
					if($_SESSION['cuenta_usuario']['nombre_rol']=="Profesores"){
						$notasProf = $this->nota->validarConsultar("Consultar", $_SESSION['cuenta_persona']['cedula'], $_SESSION['cuenta_usuario']['nombre_rol']);
						$notasTutor = $this->nota->validarConsultar("ConsultarNotasTutor", $_SESSION['cuenta_persona']['cedula']);
						$notas = [];
						$nume = 0;
						foreach ($notasProf as $key) {
							if(!empty($key['cod_seccion']) && !empty($key['id_SC']) && !empty($key['id_clase'])){
								$notas[$nume] = $key;
								$nume++;
							}
						}
						foreach ($notasTutor as $key) {
							if(!empty($key['cod_seccion']) && !empty($key['id_SC']) && !empty($key['id_clase'])){
								$notas[$nume] = $key;
								$nume++;
							}
						}
						// echo count($notas);
						$secciones = $this->clase->validarConsultar("ConsultarSeccionProfesor", $_SESSION['cuenta_persona']['cedula']);
					}
					$saberes = $this->saber->validarConsultar("Consultar");
					$url = $this->url;
					require_once("view/notasView.php");

				}

			}
		}
		

		public function Agregar(){
			if($_POST){		
				if (!empty($_POST['seccion']) && !empty($_POST['saber']) && !empty($_POST['Agregar']) && !empty($_POST['idSA']) && !empty($_POST['notas'])) {
					// print_r($_POST);
					$datos['seccion'] = $_POST['seccion'];
					$datos['saber'] = $_POST['saber'];
					$datos['id_clase'] = "";
					$clases = $this->clase->validarConsultar("getOne", $datos);
					if($clases['msj']=="Good"){
						if(count($clases['data'])>1){
							$claseAct = $clases['data'][0];
							$datos['id_clase'] = $claseAct['id_clase'];
						}
					}
					$suma = 0;
					$msj = [];
					$numb = 0;
					for ($i=0; $i < count($_POST['notas']); $i++) { 
						$idNota = "S".$_POST['saber']."S".$_POST['seccion']."N";
						$idNota = $this->nota->ExtraerPK($idNota); // "C2Y2022LDR5PED83P327"	
						$datos['id'] = $idNota;
						$datos['alumno'] = $_POST['idSA'][$i];
						$datos['nota'] = $_POST['notas'][$i];

						// $responses = [];
						$buscar = $this->nota->validarConsultar("buscar", $datos['id_clase'], $datos['alumno']);		//buscar de acuerdo al alumno y saber - nuevo metodo buscar???
						// print_r($buscar);

						if($buscar['msj']=="Good"){
							if(count($buscar['data'])>1){
									$datos['id'] = $buscar['data'][0]['id_nota'];
									$exec = $this->nota->ValidarAgregarOModificar($datos, "Agregar"); 
									if($exec['msj']=="Good"){
										$suma += 1;
										$msj[$numb] = "Good";
										$msj = "Good";
									}
									if($exec['msj']=="Error"){
										$msj[$numb] = "Error";
										$suma += 2;
									}
									if($exec['msj']=="Invalido"){
										$msj[$numb] = "Invalido";
										$suma += 0;
									}
							}else{
								// echo " -- Agregar -- ";
								$exec = $this->nota->ValidarAgregarOModificar($datos, "Agregar");
								if($exec['msj']=="Good"){
									$suma += 1;
									$msj[$numb] = "Good";
									$msj = "Good";
								}
								if($exec['msj']=="Error"){
									$msj[$numb] = "Error";
									$suma += 2;
								}
								if($exec['msj']=="Invalido"){
									$msj[$numb] = "Invalido";
									$suma += 0;
								}
								// echo json_encode($exec);
							}
							$numb++;
						}else{
							// $responses[$i] = 2;
									$suma += 2;
							// echo json_encode(['msj'=>"Error"]);
						}
						// echo json_encode($buscar);
						// echo " N.".$i.": Resp.";
						// echo $responses[$i]." -- ";
						// echo "Array: ".print_r($responses)." <br> ";
						$dataNotificacion['tabla_notificacion']="notas";
						$dataNotificacion['elemento_tabla']="codigo";
						$dataNotificacion['id_tabla'] = -1;
						$dataNotificacion['codigo_tabla'] = $datos['id'];
						$dataNotificacion['fecha_notificacion'] = date('Y-m-d');
						$dataNotificacion['hora_notificacion'] = date('h:i a');
						$dataNotificacion['visto_alumnos'] = 0;
						$dataNotificacion['visto_profesores'] = 0;
						$dataNotificacion['visto_admin'] = 9;
						$dataNotificacion['visto_superusuario'] = 9;
						$buscarNotificacion = $this->notificacion->Buscar($dataNotificacion);
						if(count($buscarNotificacion)<1){
							$res = $this->notificacion->Agregar($dataNotificacion);
						}

					}
					if($suma == count($_POST['notas'])){
						$this->bitacora->monitorear($this->url);
						echo json_encode(['msj'=>"Good"]);
					}else{
						if($suma == 0){
							echo json_encode(['msj'=>"Invalido"]);
						}else{
							echo json_encode(['msj'=>"Error"]);
						}
					}
				}else{
					echo json_encode(['msj'=>"Vacio"]);
				}
			}
		}


		public function Modificar(){
			if($_POST){		
				// print_r($_POST);
				if (!empty($_POST['seccion']) && !empty($_POST['saber']) && !empty($_POST['Editar']) && !empty($_POST['idSA']) && !empty($_POST['notas'])) {
			
					// print_r($_POST);
					$datos['seccion'] = $_POST['seccion'];
					$datos['saber'] = $_POST['saber'];
					$datos['id_clase'] = "";
					$clases = $this->clase->validarConsultar("getOne", $datos);
					if($clases['msj']=="Good"){
						if(count($clases['data'])>1){
							$claseAct = $clases['data'][0];
							$datos['id_clase'] = $claseAct['id_clase'];
						}
					}
					$suma = 0;
					$msj = [];
					$numb = 0;
					$result = $this->nota->validarEliminar("LimpiarNotas", $datos['id_clase']);
					if($result['msj']=="Good"){
						for ($i=0; $i < count($_POST['notas']); $i++) { 
							$idNota = "S".$_POST['saber']."S".$_POST['seccion']."N";
							$idNota = $this->nota->ExtraerPK($idNota); // "C2Y2022LDR5PED83P327"	
							$datos['id'] = $idNota;
							$datos['alumno'] = $_POST['idSA'][$i];
							$datos['nota'] = $_POST['notas'][$i];
							// $responses = [];
							$buscar = $this->nota->validarConsultar("buscar", $datos['saber'], $datos['alumno']);		//buscar de acuerdo al alumno y saber - nuevo metodo buscar???
							if($buscar['msj']=="Good"){
								if(count($buscar['data'])>1){
										$datos['id'] = $buscar['data'][0]['id_nota'];
										$exec = $this->nota->ValidarAgregarOModificar($datos, "Agregar");
										if($exec['msj']=="Good"){
											$suma += 1;
											$msj[$numb] = "Good";
											$msj = "Good";
										}
										if($exec['msj']=="Error"){
											$msj[$numb] = "Error";
											$suma += 2;
										}
										if($exec['msj']=="Invalido"){
											$msj[$numb] = "Invalido";
											$suma += 0;
										}
										// echo json_encode($exec);
									// }else{
										// echo " -- Repetido -- ";
										// echo json_encode(['msj'=>"Repetido"]);
									// }
								}else{
									// echo " -- Agregar -- ";
									$exec = $this->nota->ValidarAgregarOModificar($datos, "Agregar");
									if($exec['msj']=="Good"){
										$suma += 1;
										$msj[$numb] = "Good";
										$msj = "Good";
									}
									if($exec['msj']=="Error"){
										$msj[$numb] = "Error";
										$suma += 2;
									}
									if($exec['msj']=="Invalido"){
										$msj[$numb] = "Invalido";
										$suma += 0;
									}
									// echo json_encode($exec);
								}
							}else{
								// $responses[$i] = 2;
										$suma += 2;
								// echo json_encode(['msj'=>"Error"]);
							}
							// echo json_encode($buscar);
							// echo " N.".$i.": Resp.";
							// echo $responses[$i]." -- ";
							// echo "Array: ".print_r($responses)." <br> ";

						}
						if($suma == count($_POST['notas'])){
							$this->bitacora->monitorear($this->url);
							echo json_encode(['msj'=>"Good"]);
						}else{
							if($suma == 0){
								echo json_encode(['msj'=>"Invalido"]);
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
				if (isset($_POST['Eliminar']) && isset($_POST['notaDelete'])) {
					list($cod_seccion, $id_SC, $id_clase) =explode('-', $_POST['notaDelete']);
					$buscar = $this->nota->validarConsultar("getOne", $id_clase);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->nota->validarEliminar("Eliminar", $id_clase);
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
				if (isset($_POST['Buscar']) && isset($_POST['notaModif'])) {
					list($cod_seccion, $id_SC, $id_clase) =explode('-', $_POST['notaModif']);
					$buscar = $this->nota->validarConsultar("getOne", $id_clase);
					// $buscar = $this->nota->getOne($_POST['notaModif']);
					echo json_encode($buscar);
				}
				if(isset($_POST['Buscar']) && isset($_POST['saberes']) && isset($_POST['cod_seccion'])){
					$cod_seccion = $_POST['cod_seccion'];
					$seccionesG = $this->seccion->validarConsultar("getOne", $cod_seccion);
					// print_r($seccionesG);
					$trayecto = "";
					$fase = "";
					if(!empty($seccionesG['data'][0]['trayecto_seccion'])){
						$trayecto = $seccionesG['data'][0]['trayecto_seccion'];
						$secciones = $this->seccion->validarConsultar("Consultar", $trayecto);
						foreach ($secciones as $key) {
							if(!empty($key['cod_seccion'])){
								if($key['cod_seccion']==$cod_seccion){
									$fase = $key['nombre_periodo'];
									// echo $fase;
								}
							}
						}
					}
					$response = [];
					if($trayecto!="" && $fase != ""){
						$trayectoN = "";
						$faseN = "";
						// echo $trayecto."-".$fase;
						if($trayecto=="I"){ $trayectoN = "1"; }else if($trayecto=="1"){ $trayectoN = "1"; }
						if($trayecto=="II"){ $trayectoN = "2"; }else if($trayecto=="2"){ $trayectoN = "2"; }
						if($trayecto=="III"){ $trayectoN = "3"; }else if($trayecto=="3"){ $trayectoN = "3"; }
						if($trayecto=="IV"){ $trayectoN = "4"; }else if($trayecto=="4"){ $trayectoN = "4"; }
						if($fase=="I"){ $faseN = "1"; }else if($fase=="1"){ $faseN = "1"; }
						if($fase=="II"){ $faseN = "2"; }else if($fase=="2"){ $faseN = "2"; }
						// echo $trayectoN."-".	$faseN;
						$buscar = $this->saber->validarConsultar("getSaber", $trayectoN,$faseN);
						// print_r($buscar);
						if(count($buscar)>0){
							$response['data'] = $buscar;
							$response['msj'] = "Good";
							// $buscar2 = $this->notas->Consultar($cod_seccion);
							$buscar2 = $this->nota->validarConsultar("ConsultarNotasAlumnos", $cod_seccion);
							// print_r($buscar2);
							if(count($buscar2)>0){
								$response['msjSaberes'] = "Good";
								$response['dataSaberes'] = $buscar2;

							}else{
								$response['msjSaberes'] = "Vacio";
							}
						}else{
							$response['msj'] = "Vacio";
						}
					}else{
						$response['msj'] = "Vacio";
					}
					echo json_encode($response);
				}
				if(isset($_POST['Buscar']) && isset($_POST['alumnosSeccion']) && isset($_POST['id_SC']) && isset($_POST['cod_seccion'])){
					$cod_seccion = $_POST['cod_seccion'];
					$id_SC = $_POST['id_SC'];
					$alumnos = $this->nota->validarConsultar("ConsultarAlumnos", $cod_seccion, $id_SC);
					// echo "Seccion: ".$cod_seccion." || Saber: ".$id_SC;
					$response = [];
					if(count($alumnos)>0){
						$response['msj'] = "Good";
						$response['data'] = $alumnos;
						// $buscar2 = $this->seccion->ConsultarSecciones($trayecto);
						// if(count($buscar2)>0){
						// 	$response['msjSecciones'] = "Good";
						// 	$response['dataSecciones'] = $buscar2;
						// }else{
						// 	$response['msjSecciones'] = "Vacio";
						// }
					}else{
						$response['msj'] = "Vacio";
					}
					echo json_encode($response);
				}
			}
		}


	}
		

?>
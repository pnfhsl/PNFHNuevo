<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\notasModel as notasModel;
	use content\modelo\seccionesModel as seccionesModel;
	use content\modelo\saberesModel as saberesModel;
	use content\modelo\clasesModel as clasesModel;
	use content\traits\Utility;
	class notasController{
		use Utility;
		private $url;
		private $nota;
		private $seccion;
		private $saber;
		private $clase;

		private $idNota;
		function __construct($url){
			
			$this->url = $url;
			$this->nota = new notasModel();
			$this->seccion = new seccionesModel();
			$this->saber = new saberesModel();
			$this->clase = new clasesModel();
		}

		public function Consultar(){			
				$objModel = new homeModel;
				$_css = new headElement;
				$_css->Heading();
				$alumnos = $this->nota->ConsultarNotasAlumnos();
				$notas = $this->nota->Consultar();

				$secciones = $this->seccion->Consultar();
				$saberes = $this->saber->Consultar();
				$url = $this->url;
				require_once("view/notasView.php");
			
		}
		

		public function Agregar(){
			if($_POST){		
				if (!empty($_POST['seccion']) && !empty($_POST['saber']) && !empty($_POST['Agregar']) && !empty($_POST['idSA']) && !empty($_POST['notas'])) {
					// print_r($_POST);
					$datos['seccion'] = $_POST['seccion'];
					$datos['saber'] = $_POST['saber'];
					$datos['id_clase'] = "";
					$clases = $this->clase->getOne($datos);
					if($clases['msj']=="Good"){
						if(count($clases['data'])>1){
							$claseAct = $clases['data'][0];
							$datos['id_clase'] = $claseAct['id_clase'];
						}
					}
					$suma = 0;
					for ($i=0; $i < count($_POST['notas']); $i++) { 
						$idNota = "S".$_POST['saber']."S".$_POST['seccion']."N";
						$idNota = $this->nota->ExtraerPK($idNota); // "C2Y2022LDR5PED83P327"	
						$datos['id'] = $idNota;
						$datos['alumno'] = $_POST['idSA'][$i];
						$datos['nota'] = $_POST['notas'][$i];
						// $responses = [];
						$buscar = $this->nota->buscar($datos['saber'], $datos['alumno']);		//buscar de acuerdo al alumno y saber - nuevo metodo buscar???
						if($buscar['msj']=="Good"){
							if(count($buscar['data'])>1){
								// if($buscar['data'][0]['estatus']==0){
									// echo " -- Modificar -- ";
									// echo $idNota;
									$datos['id'] = $buscar['data'][0]['id_nota'];
									// $datos['id'] = $idNota;
									$exec = $this->nota->Modificar($datos); 
									if($exec['msj']=="Good"){
										// $responses[$i] = 1;
										$suma += 1;
									}
									if($exec['msj']=="Error"){
										// $responses[$i] = 2;
										$suma += 2;
									}
									// echo json_encode($exec);
								// }else{
									// echo " -- Repetido -- ";
									// echo json_encode(['msj'=>"Repetido"]);
								// }
							}else{
								// echo " -- Agregar -- ";
								$exec = $this->nota->Agregar($datos);
								if($exec['msj']=="Good"){
									// $responses[$i] = 1;
									$suma += 1;
								}
								if($exec['msj']=="Error"){
									// $responses[$i] = 2;
									$suma += 2;
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
						echo json_encode(['msj'=>"Good"]);
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
				if (!empty($_POST['seccion']) && !empty($_POST['saber']) && !empty($_POST['Editar']) && !empty($_POST['idSA']) && !empty($_POST['notas'])) {
			
					// print_r($_POST);
					$datos['seccion'] = $_POST['seccion'];
					$datos['saber'] = $_POST['saber'];
					$datos['id_clase'] = "";
					$clases = $this->clase->getOne($datos);
					if($clases['msj']=="Good"){
						if(count($clases['data'])>1){
							$claseAct = $clases['data'][0];
							$datos['id_clase'] = $claseAct['id_clase'];
						}
					}
					$suma = 0;
					$result = $this->nota->LimpiarNotas($datos['id_clase']);
					if($result['msj']=="Good"){
						for ($i=0; $i < count($_POST['notas']); $i++) { 
							$idNota = "S".$_POST['saber']."S".$_POST['seccion']."N";
							$idNota = $this->nota->ExtraerPK($idNota); // "C2Y2022LDR5PED83P327"	
							$datos['id'] = $idNota;
							$datos['alumno'] = $_POST['idSA'][$i];
							$datos['nota'] = $_POST['notas'][$i];
							// $responses = [];
							$buscar = $this->nota->buscar($datos['saber'], $datos['alumno']);		//buscar de acuerdo al alumno y saber - nuevo metodo buscar???
							if($buscar['msj']=="Good"){
								if(count($buscar['data'])>1){
									// if($buscar['data'][0]['estatus']==0){
										// echo " -- Modificar -- ";
										// echo $idNota;
										$datos['id'] = $buscar['data'][0]['id_nota'];
										// $datos['id'] = $idNota;
										$exec = $this->nota->Modificar($datos); 
										if($exec['msj']=="Good"){
											// $responses[$i] = 1;
											$suma += 1;
										}
										if($exec['msj']=="Error"){
											// $responses[$i] = 2;
											$suma += 2;
										}
										// echo json_encode($exec);
									// }else{
										// echo " -- Repetido -- ";
										// echo json_encode(['msj'=>"Repetido"]);
									// }
								}else{
									// echo " -- Agregar -- ";
									$exec = $this->nota->Agregar($datos);
									if($exec['msj']=="Good"){
										// $responses[$i] = 1;
										$suma += 1;
									}
									if($exec['msj']=="Error"){
										// $responses[$i] = 2;
										$suma += 2;
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
							echo json_encode(['msj'=>"Good"]);
						}else{
							echo json_encode(['msj'=>"Error"]);
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
					$buscar = $this->nota->getOne($id_clase);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->nota->Eliminar($id_clase);
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
					$buscar = $this->nota->getOne($id_clase);
					// $buscar = $this->nota->getOne($_POST['notaModif']);
					echo json_encode($buscar);
				}
				if(isset($_POST['Buscar']) && isset($_POST['saberes']) && isset($_POST['cod_seccion'])){
					$cod_seccion = $_POST['cod_seccion'];
					$seccionesG = $this->seccion->getOne($cod_seccion);
					// print_r($seccionesG);
					$trayecto = "";
					$fase = "";
					if(!empty($seccionesG['data'][0]['trayecto_seccion'])){
						$trayecto = $seccionesG['data'][0]['trayecto_seccion'];
						$secciones = $this->seccion->Consultar($trayecto);
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
						$buscar = $this->saber->getSaber($trayectoN,$faseN);
						// print_r($buscar);
						if(count($buscar)>0){
							$response['data'] = $buscar;
							$response['msj'] = "Good";
							// $buscar2 = $this->notas->Consultar($cod_seccion);
							$buscar2 = $this->nota->ConsultarNotasAlumnos($cod_seccion);
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
					$alumnos = $this->nota->ConsultarAlumnos($cod_seccion, $id_SC);
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
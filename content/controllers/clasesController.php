<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\clasesModel as clasesModel;
	use content\modelo\seccionesModel as seccionesModel;
	use content\modelo\saberesModel as saberesModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\modelo\profesoresModel as profesoresModel;
	use content\modelo\notificacionesModel as notificacionesModel;
	use content\traits\Utility;

	class clasesController{
		use Utility;
		private $url;
		private $clase;
		private $seccion;
		private $saber;
		private $profesor;
		private $bitacora;
		private $idClase;
		private $notificacion;
		
		function __construct($url){
			$this->url = $url;
			$this->notificacion = new notificacionesModel();
			$this->clase = new clasesModel();
			$this->seccion = new seccionesModel();
			$this->saber = new saberesModel();
			$this->profesor = new profesoresModel();
			$this->bitacora = new bitacoraModel();
		} 

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading(); 
			$this->bitacora->monitorear($this->url);

			$clases = $this->clase->validarConsultar("Consultar");
			$secciones = $this->seccion->validarConsultar("Consultar");			
			$saberes = $this->saber->validarConsultar("Consultar");			
			$profesores = $this->profesor->validarConsultar("Consultar");			
			
			$url = $this->url;
			require_once("view/clasesView.php");
		}

		public function Buscar(){
			if($_POST){		
				if (isset($_POST['Buscar']) && isset($_POST['userNofif'])) {
					$buscar = $this->seccion->validarConsultar("getOne", $_POST['userNofif']);
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
							$buscar2 = $this->clase->validarConsultar("Consultar", $cod_seccion);
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
			}
		}
		
		public function Agregar(){
			if($_POST){		
				if (!empty($_POST['seccion']) && !empty($_POST['Agregar']) && !empty($_POST['saber']) && !empty($_POST['profesor'])) {

					$datos['seccion'] = $_POST['seccion'];
					$datos['saber'] = $_POST['saber'];
					$datos['profesor'] = $_POST['profesor'];
					$buscar = $this->clase->validarConsultar("getOne", $datos);
					// print_r($buscar);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							 // print_r($buscar['data'][0]['estatus']);
							if($buscar['data'][0]['estatus']==0){
								/*$datos['id'] = $buscar['data'][0]['id_clase'];*/
								$datos['id'] = $datos['id_clase'];
					 			$exec = $this->clase->ValidarAgregarOModificar($datos, "Modificar"); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->clase->ValidarAgregarOModificar($datos, "Agregar"); 
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
				if (!empty($_POST['saber']) && !empty($_POST['id_clase'])  && !empty($_POST['seccion']) && !empty($_POST['Editar']) && !empty($_POST['profesor'])) {

					$datos['id_clase'] = $_POST['id_clase'];
					$datos['seccion'] = $_POST['seccion'];
					$datos['saber'] = $_POST['saber'];
					$datos['profesor'] = $_POST['profesor'];

					$buscar = $this->clase->validarConsultar("getOne", $datos);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							if($_POST['id_clase']==$buscar['data'][0]['id_clase']){
								$exec = $this->clase->ValidarAgregarOModificar($datos, "Modificar"); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->clase->ValidarAgregarOModificar($datos, "Modificar"); 
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
				if (isset($_POST['Eliminar']) && isset($_POST['claseDelete'])) {
					$buscar = $this->clase->validarConsultar("getOneC", $_POST['claseDelete']);
					/*print_r($buscar);*/
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							 // print_r($buscar['data'][0]['estatus']);

							$exec = $this->clase->validarEliminar("Eliminar", $_POST['claseDelete']);
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
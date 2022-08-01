<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\clasesModel as clasesModel;

	class clasesController{
		private $url;
		private $clase;
		private $idClase;
		function __construct($url){
			$this->url = $url;
			$this->clase = new clasesModel();
		} 

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading(); 

			$clases = $this->clase->Consultar();
			$secciones = $this->clase->ConsultarSecciones();			
			$sA = $this->clase->ConsultarSA();			
			$saberes = $this->clase->ConsultarSaberes();
			$profesores = $this->clase->ConsultarProfesores();	


			
			$url = $this->url;
			require_once("view/clasesView.php");
		}
		
		public function Agregar(){
			if($_POST){		
				if (!empty($_POST['seccion']) && !empty($_POST['Agregar']) && !empty($_POST['saber']) && !empty($_POST['profesor'])) {

					$datos['seccion'] = $_POST['seccion'];
					$datos['saber'] = $_POST['saber'];
					$datos['profesor'] = $_POST['profesor'];
					$buscar = $this->clase->getOne($datos);
					// print_r($buscar);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							 // print_r($buscar['data'][0]['estatus']);
							if($buscar['data'][0]['estatus']==0){
								/*$datos['id'] = $buscar['data'][0]['id_clase'];*/
								$datos['id'] = $datos['id_clase'];
					 			$exec = $this->clase->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->clase->Agregar($datos); 
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

					$buscar = $this->clase->getOne($datos);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							if($_POST['codigo']==$_POST['cedula']){
								$exec = $this->clase->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->clase->Modificar($datos); 
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
					$buscar = $this->clase->getOneC($_POST['claseDelete']);
					/*print_r($buscar);*/
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							 // print_r($buscar['data'][0]['estatus']);

							$exec = $this->clase->Eliminar($_POST['claseDelete']);
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
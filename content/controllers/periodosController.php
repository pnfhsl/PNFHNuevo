<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\periodosModel as periodosModel;

	class periodosController{

		private $url;
		private $periodo;

		function __construct($url){
			

			$this->url = $url;

			$this->periodo = new periodosModel();
		}

		public function Buscar(){

			if($_POST){		
				if (isset($_POST['Buscar']) && isset($_POST['userNofif'])) {
					$buscar = $this->periodo->getOne($_POST['userNofif']);
					echo json_encode($buscar);
				}

			}
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();
			$periodos = $this->periodo->Consultar();
			$url = $this->url;
			require_once("view/periodosView.php");
		}
		
		public function Agregar(){
			 // print_r($_POST);
			if($_POST){
				if( !empty($_POST['Agregar']) && !empty($_POST['numeroPr']) && !empty($_POST['yearPeriodo'])  && !empty($_POST['fechaAP']) && !empty($_POST['fechaAC'])){

					$datos['numeroPr'] = mb_strtoupper($_POST['numeroPr']);
					$datos['yearPeriodo'] = $_POST['yearPeriodo'];
					$datos['fechaAP'] = $_POST['fechaAP'];
					$datos['fechaAC'] = $_POST['fechaAC'];

					
					$buscar = $this->periodo->getOne($_POST['numeroPr'], $_POST['yearPeriodo']);
                    // print_r($datos);
					if ($buscar['msj']=="Good") {
					    if(count($buscar['data'])>1){
					    	if($_POST['']==$_POST['numeroPr']){
								$exec = $this->periodo->Modificar($datos); 
								echo json_encode($exec);

							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}

						}else{
							$exec = $this->periodo->Agregar($datos);
							//print_r($exec);
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
        // print_r($_POST);		
				if ( !empty($_POST['numeroPr']) && !empty($_POST['yearPeriodo']) && !empty($_POST['fechaAP']) && !empty($_POST['fechaAC']) && !empty($_POST['id_periodo'])){
					
					// $datos['numeroPr'] = ucwords(mb_strtolower($_POST['numeroPr']));
					$datos['numeroPr'] = mb_strtoupper($_POST['numeroPr']);
					$datos['yearPeriodo'] = $_POST['yearPeriodo'];
					$datos['fechaAP'] = $_POST['fechaAP'];
					$datos['fechaAC'] = $_POST['fechaAC'];
					$datos['id_periodo'] = $_POST['id_periodo'];

					$buscar = $this->periodo->getOne($_POST['numeroPr'], $_POST['yearPeriodo']);


					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							$busq = $buscar['data'][0];
							if($datos['id_periodo']==$busq['id_periodo']){
								$exec = $this->periodo->Modificar($datos); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->periodo->Modificar($datos); 
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
					$buscar = $this->periodo->getOneId($_POST['userDelete']);
					if($buscar['msj']=="Good"){
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->periodo->Eliminar($_POST['userDelete']);
							$exec['data'] = $data;
							echo json_encode($exec);
						}else{
							echo json_encode(['msj'=>"Error No encontrado"]);
						}
					}else{
						echo json_encode(['msj'=>"ErrorEn busqueda"]);
					}
				}

			}
		}

	}
		

?>
<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\modelo\usuariosModel as usuariosModel;
	use content\modelo\rolesModel as rolesModel;
	use content\modelo\alumnosModel as alumnosModel;
	use content\modelo\profesoresModel as profesoresModel;
	use content\modelo\notificacionesModel as notificacionesModel;
	use content\traits\Utility;

	class usuariosController{
		use Utility;
		private $url;
		private $usuario;
		private $rol;
		private $alumno;
		private $profesor;
		private $bitacora;
		private $notificacion;

		function __construct($url){
			$this->url = $url;
			$this->notificacion = new notificacionesModel();
			$this->bitacora = new bitacoraModel();
			$this->usuario = new usuariosModel();
			$this->rol = new rolesModel();
			$this->alumno = new alumnosModel();
			$this->profesor = new profesoresModel();
		}

		public function Consultar(){
				$objModel = new homeModel;
				$_css = new headElement;
				$_css->Heading();
				$this->bitacora->monitorear($this->url);
				$usuarios = $this->usuario->validarConsultar("Consultar");
				$usuariosAlumnos = $this->alumno->validarConsultar("Consultar");
				$usuariosProfesores = $this->profesor->validarConsultar("Consultar");
				$roles = $this->rol->validarConsultar("Consultar");
				$url = $this->url;
				require_once("view/usuariosView.php");
		}
		
		public function Agregar(){
			if($_POST){
				if (!empty($_POST['cedula']) && !empty($_POST['Agregar']) && !empty($_POST['user']) && !empty($_POST['correo']) && !empty($_POST['pass']) && !empty($_POST['rol'])) {
					$datos['cedula'] = $_POST['cedula'];
					$datos['nombre'] = ucwords(mb_strtolower($_POST['user']));
					$datos['correo'] = mb_strtolower($_POST['correo']);
					$datos['pass'] = $this->encriptar($_POST['pass']);
					$datos['rol'] = $_POST['rol'];
					$buscar = $this->usuario->validarConsultar("getOne", $_POST['cedula']);

						//print_r($buscar);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
						// 	// print_r($buscar['data'][0]['estatus']);
							if($buscar['data'][0]['estatus']==0){
								// echo "Actualizara";
								$datos['cedula'] = $datos['cedula'];
								$exec = $this->usuario->ValidarAgregarOModificar($datos,"Modificar"); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->usuario->ValidarAgregarOModificar($datos,"Agregar");
							echo json_encode($exec);
							// echo "Agregaraa";
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
				if (!empty($_POST['cedula']) && !empty($_POST['codigo']) && !empty($_POST['Editar']) && !empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['rol']) && isset($_POST['nuevoPassword'])) {
					$datos['id'] = $_POST['codigo'];
					$datos['cedula'] = $_POST['cedula'];
					$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
					$datos['correo'] = mb_strtolower($_POST['correo']);
					$datos['rol'] = $_POST['rol'];
					$datos['nuevoPassword'] = $this->encriptar($_POST['nuevoPassword']);
					$buscar = $this->usuario->validarConsultar("getOne", $_POST['cedula']);
					// var_dump($datos['nuevoPassword']);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							if($_POST['codigo']==$_POST['cedula']){
								$exec = $this->usuario->ValidarAgregarOModificar($datos,"Modificar"); 
								echo json_encode($exec);
							}else{
								echo json_encode(['msj'=>"Repetido"]);
							}
						}else{
							$exec = $this->usuario->ValidarAgregarOModificar($datos,"Modificar");
							/*var_dump($datos); */
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
					$buscar = $this->usuario->validarConsultar("getOne", $_POST['userDelete']);
					if($buscar['msj']=="Good"){
						$this->bitacora->monitorear($this->url);
						if(count($buscar['data'])>1){
							$data = $buscar['data'][0];
							$exec = $this->usuario->validarEliminar("Eliminar", $_POST['userDelete']);
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
				if (isset($_POST['Buscar']) && isset($_POST['userModif'])) {
					$resultado = $this->usuario->validarConsultar("getOne", $_POST['userModif']);
					echo json_encode($resultado);
				}
				if(isset($_POST['verificarPasswordCuenta']) && isset($_POST['pass'])){
					if( $this->encriptar($_POST['pass']) == $_SESSION['cuenta_usuario']['password_usuario'] ){
						echo "1";
					}else{
						echo "2";
					}
				}
				if(isset($_POST['BuscarSegunRol']) && isset($_POST['id_rol'])){
					$id_rol = $_POST['id_rol'];
					// echo $id_rol;
					$roles = $this->rol->validarConsultar("getOneId", $id_rol);
					if($roles['msj']=="Good"){
						if(count($roles['data'])>1){
							$data = $roles['data'][0];
							$response = [];
							$usuarios = [];
							$buscar = [];
							if($data['nombre_rol']=="Alumnos"){
								$usuarios = $this->alumno->validarConsultar("Consultar");
								$nAlum = 0;
								foreach ($usuarios as $key) {
									$buscar[$nAlum]['codigo'] = $key['cedula_alumno'];
									$buscar[$nAlum]['cedula'] = number_format($key['cedula_alumno'],0,',','.');
									$buscar[$nAlum]['nombre'] = $key['nombre_alumno'];
									$buscar[$nAlum]['apellido'] = $key['apellido_alumno'];
									$buscar[$nAlum]['telefono'] = $key['telefono_alumno'];
									// $buscar[$nAlum]['trayecto'] = $key['trayecto_alumno'];
									$nAlum++;
								}
							}
							if( ($data['nombre_rol']=="Profesores") || ($data['nombre_rol']=="Administrador") || $data['nombre_rol']=="Superusuario" ){
								$usuarios = $this->profesor->validarConsultar("Consultar");
								$nProf = 0;
								foreach ($usuarios as $key) {
									$buscar[$nProf]['codigo'] = $key['cedula_profesor'];
									$buscar[$nProf]['cedula'] = number_format($key['cedula_profesor'],0,',','.');
									$buscar[$nProf]['nombre'] = $key['nombre_profesor'];
									$buscar[$nProf]['apellido'] = $key['apellido_profesor'];
									$buscar[$nProf]['telefono'] = $key['telefono_profesor'];
									$nProf++;
								}
							}
							if(count($buscar)>0){
								$response['msj'] = "Good";
								$response['data'] = $buscar;
								$buscar2 = $this->usuario->validarConsultar("getOneRolId", $id_rol);
								if(count($buscar2)>0){
									$response['msjUsuario'] = "Good";
									$response['dataUsuario'] = $buscar2;
								}else{
									$response['msjUsuario'] = "Vacio";
								}
							}else{
								$response['msj'] = "Vacio";
							}
							
						}else{
							$response['msj'] = "Error";
						}
					}else{
						$response['msj'] = "Error";
					}
					echo json_encode($response);
				}
				if(isset($_POST['VerificarUnicoUsername']) && isset($_POST['username']) && isset($_POST['id'])){
					$user = ucwords(mb_strtolower($_POST['username']));
					$id = $_POST['id'];
					$buscar = $this->usuario->validarConsultar("Buscar", "username", $user);
					if(count($buscar)>0){
						if($id==""){
							echo json_encode(['msj'=>"Good", 'valido'=>"0"]);
						}
						if($id!=""){
							if($buscar[0]['cedula_usuario']==$id){
								echo json_encode(['msj'=>"Good", 'valido'=>"1"]);
							}else{
								echo json_encode(['msj'=>"Good", 'valido'=>"0"]);
							}
						}
					}else{
						echo json_encode(['msj'=>"Good", 'valido'=>"1"]);
					}
				}
				if(isset($_POST['VerificarUnicoCorreo']) && isset($_POST['correo'])){
					$correo = mb_strtolower($_POST['correo']);
					$id = $_POST['id'];
					$buscar = $this->usuario->validarConsultar("Buscar", "correo", $correo);
					if(count($buscar)>0){
						if($id==""){
							echo json_encode(['msj'=>"Good", 'valido'=>"0"]);
						}
						if($id!=""){
							if($buscar[0]['cedula_usuario']==$id){
								echo json_encode(['msj'=>"Good", 'valido'=>"1"]);
							}else{
								echo json_encode(['msj'=>"Good", 'valido'=>"0"]);
							}
						}
					}else{
						echo json_encode(['msj'=>"Good", 'valido'=>"1"]);
					}
				}
			}
		}

	}
		

?>
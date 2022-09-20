<?php

namespace content\controllers;

use config\settings\sysConfig as sysConfig;
use content\component\headElement as headElement;
use content\modelo\homeModel as homeModel;
use content\modelo\perfilModel as perfilModel;
use content\traits\Utility;
use content\modelo\loginModel as loginModel;
use content\modelo\usuariosModel as usuariosModel;
use content\modelo\alumnosModel as alumnosModel;
use content\modelo\profesoresModel as profesoresModel;
use content\modelo\rolesModel as rolesModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class perfilController
{
	use Utility;
	private $url;
	private $perfil;
	private $login;
	private $usuario;

	private $alumno;
	private $profesor;
	private $rol;

	function __construct($url)
	{
		$this->url = $url;
		$this->perfil = new perfilModel();
		$this->url = $url;
		$this->login = new loginModel();
		$this->usuario = new usuariosModel();
		$this->alumno = new alumnosModel();
		$this->profesor = new profesoresModel();
		$this->rol = new rolesModel();
	}

	public function Consultar()
	{
		$objModel = new homeModel;
		$_css = new headElement;
		$_css->Heading();
		$perfiles = $this->perfil->Consultar();
		if ($_SESSION['cuenta_usuario']['nombre_rol'] === "Superusuario" || $_SESSION['cuenta_usuario']['nombre_rol'] === "Administrador" || $_SESSION['cuenta_usuario']['nombre_rol'] === "Profesores") {
			$resp = $this->perfil->ConsultarProfesor($_SESSION['cuenta_usuario']['cedula_usuario']);
			// var_dump($resp);
			// var_dump($usuarios[0]['correo']);
			$ci = $resp[0]['cedula_profesor'];
			$nombre = $resp[0]['nombre_profesor'];
			$apellido = $resp[0]['apellido_profesor'];
			$telef = $resp[0]['telefono_profesor'];
		} else if ($_SESSION['cuenta_usuario']['nombre_rol'] === "Alumnos") {
			$resp = $this->perfil->ConsultarAlumno($_SESSION['cuenta_usuario']['cedula_usuario']);
			$ci = $resp[0]['cedula_alumno'];
			$nombre = $resp[0]['nombre_alumno'];
			$apellido = $resp[0]['apellido_alumno'];
			$telef = $resp[0]['telefono_alumno'];
			$trayecto = $resp[0]['trayecto_alumno'];
		}
		$usuarios = $this->perfil->ConsultarUsuario($_SESSION['cuenta_usuario']['cedula_usuario']);
		$correo = $usuarios[0]['correo'];
		$usuario = $usuarios[0]['nombre_usuario'];
		$alumnos = $this->alumno->Consultar();
		$url = $this->url;
		require_once("view/perfilView.php");
	}
	// public function Buscar(){
	// 	if($_POST){		
	// 		if (isset($_POST['Buscar']) && isset($_POST['userNofif'])) {
	// 			$buscar = $this->perfil->getOne($_POST['userNofif']);
	// 			echo json_encode($buscar);
	// 		}

	// 	}
	// }
	public function Modificar()
	{
		if ($_SESSION['cuenta_usuario']['nombre_rol'] == "Alumnos") {
			// $alumnos = $this->alumno->getOne($_SESSION['cuenta_usuario']['cedula_usuario']);
			if ($_POST) {
				if (!empty($_POST['cedula']) && !empty($_POST['codigo']) && !empty($_POST['Editar']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && !empty($_POST['trayecto']) && !empty($_POST['correo'])) {
					$datos['id'] = $_POST['codigo'];
					$datos['cedula'] = $_POST['cedula'];
					$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
					$datos['apellido'] = ucwords(mb_strtolower($_POST['apellido']));
					$datos['trayecto'] = $_POST['trayecto'];
					$datos['telefono'] = $_POST['telefono'];
					$datos['correo'] = $_POST['correo'];
					$buscar = $this->alumno->getOne($_POST['cedula']);
					if ($buscar['msj'] == "Good") {
						if (count($buscar['data']) > 1) {
							if ($_POST['codigo'] == $_POST['cedula']) {
								$exec = $this->alumno->Modificar($datos);
								$modif = $this->perfil->ModificarCorreo($datos); 
								$Result = array('exec' => $exec, 'email' => $modif);
								echo json_encode($Result);
								// echo json_encode(['exec'=>$exec, 'modif'=>$modif]);
							} else {
								echo json_encode(['msj' => "Repetido"]);
							}
						} else {
							$exec = $this->alumno->Modificar($datos);
							$modif = $this->perfil->ModificarCorreo($datos);  
							$Result = array('exec' => $exec, 'email' => $modif);
							echo json_encode($Result);
						}
					} else {
						echo json_encode(['msj' => "Error"]);
					}
				} else {
					echo json_encode(['msj' => "Vacio"]);
				}
			}
		} else {
			// $profesores = $this->profesor->getOne($_SESSION['cuenta_usuario']['cedula_usuario']);
			if ($_POST) {

				if (!empty($_POST['cedula']) && !empty($_POST['codigo']) && !empty($_POST['Editar']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && !empty($_POST['correo'])) {
					$datos['id'] = $_POST['codigo'];
					$datos['cedula'] = $_POST['cedula'];
					$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
					$datos['apellido'] = ucwords(mb_strtolower($_POST['apellido']));
					$datos['telefono'] = $_POST['telefono'];
					$datos['correo'] = $_POST['correo'];
					$buscar = $this->profesor->getOne($_POST['cedula']);
					if ($buscar['msj'] == "Good") {
						if (count($buscar['data']) > 1) {
							if ($_POST['codigo'] == $_POST['cedula']) {
								$exec = $this->profesor->Modificar($datos);
								$modif = $this->perfil->ModificarCorreo($datos);
								// echo json_encode($exec);
								// echo json_encode($modif);
								$Result = array('exec' => $exec, 'email' => $modif);
								echo json_encode($Result);
							} else {
								echo json_encode(['msj' => "Repetido"]);
							}
						} else {
							$exec = $this->profesor->Modificar($datos);
							$modif = $this->perfil->ModificarCorreo($datos);
							$Result = array('exec' => $exec, 'email' => $modif);
								echo json_encode($Result);
							// echo json_encode($exec);
							// echo json_encode($modif);
						}
					} else {
						echo json_encode(['msj' => "Error"]);
					}
				} else {
					echo json_encode(['msj' => "Vacio"]);
				}
			}

		}
	}

	public function Verificar(){

		if($_POST){
			if (isset($_POST['username']) && isset($_POST['ValidarContraseña']) && isset($_POST['password'])) {
				$resp = $this->login->loginSistema(ucwords(mb_strtolower($_POST['username'])), $this->encriptar($_POST['password']));
				echo json_encode($resp);
			}
		}

	}

}

	
		

	// public function Funciones(){
	// 	$nombre_imagen=$_FILES['foto']['name'];
	// 	$temporal=$_FILES['foto']['tmp_name'];
	// 	$carpeta='../img';
	// 	$ruta=$carpeta.'/'.$nombre_imagen;

	// }

	// public function Probar(){

	// 	if($_POST){		
	// 			if (isset($_POST['username']) && isset($_POST['ValidarContraseña']) && isset($_POST['password'])) {
	// 				$resp = $this->perfil->ValidarContraseña($_POST['username'], $this->encriptar($_POST['password'])); //pasa el user y pass

	// 				if($resp['msj'] == "Good" && !empty($resp['data']) && count($resp['data'])>0 && $resp['data'][0]['estatus']==0 && $resp['data'][0]['cedula_usuario'] == "00000000"){
	// 					$permitirContinuar = "1";
	// 				}else if($resp['msj'] == "Good" && !empty($resp['data']) && count($resp['data'])>0 && $resp['data'][0]['estatus']>0){
	// 					$permitirContinuar = "1";
	// 				}else{
	// 					$permitirContinuar = "0";
	// 				}
						
	// 				if($resp['msj'] == "Good"){
	// 					if($permitirContinuar=="1"){
	// 						$intentos = $this->usuario->Intentos($_POST['username']);
	// 						$int = 0;
	// 						$estatus = -1;
	// 						if(!empty($resp['data']) && count($resp['data'])>0){
	// 							$estatus = $resp['data'][0]['estatus'];
	// 						}
	// 						if(count($intentos)>0){
	// 							$int = $intentos[0]["intentos"];
	// 						}
	// 						if($resp['msj'] === 'Good' && $int < 3){
	// 							$dataTemp = $resp['data'][0];
	// 							// print_r($dataTemp);
	// 							$resp = array('access' => "Acceder");


	// 							$_SESSION['cuentaActiva'] = true;
	// 							$_SESSION['cuenta_usuario'] = $dataTemp;
	// 							// $_SESSION['id_rol'] = $dataTemp['id_rol'];
	// 							// $_SESSION['nombre_rol'] = $dataTemp['nombre_rol'];
	// 							// $_SESSION['cedula_usuario'] = $dataTemp['cedula_usuario'];
	// 							// $_SESSION['nombre_usuario'] = $dataTemp['nombre_usuario'];
	// 							// $_SESSION['correo'] = $dataTemp['correo'];
	// 							// $_SESSION['estatus'] = $dataTemp['estatus'];

	// 							$accesos = $this->rol->ConsultarAccesos($_SESSION['cuenta_usuario']['id_rol']);
	// 							$_SESSION['accesos_usuario'] = $accesos;

	// 							if($_SESSION['cuenta_usuario']['nombre_rol']=="Alumnos"){
	// 								$alumnos = $this->alumno->getOne($_SESSION['cuenta_usuario']['cedula_usuario']);
	// 								if($alumnos['msj']=="Good"){
	// 									if(count($alumnos['data']) > 1){
	// 										$_SESSION['cuenta_persona'] = $alumnos['data'][0];
	// 										$_SESSION['cuenta_persona']['cedula'] = $alumnos['data'][0]['cedula_alumno'];
	// 										$_SESSION['cuenta_persona']['nombre'] = $alumnos['data'][0]['nombre_alumno'];
	// 										$_SESSION['cuenta_persona']['apellido'] = $alumnos['data'][0]['apellido_alumno'];
	// 										$_SESSION['cuenta_persona']['telefono'] = $alumnos['data'][0]['telefono_alumno'];
	// 										$_SESSION['cuenta_persona']['trayecto'] = $alumnos['data'][0]['trayecto_alumno'];
	// 										$_SESSION['cuenta_persona']['correos'] = $alumnos['data'][0]['correo'];	

	// 										// $_SESSION['cedula'] = $alumnos['data'][0]['cedula_alumno'];
	// 										// $_SESSION['nombre'] = $alumnos['data'][0]['nombre_alumno'];
	// 										// $_SESSION['apellido'] = $alumnos['data'][0]['apellido_alumno'];
	// 										// $_SESSION['telefono'] = $alumnos['data'][0]['telefono_alumno'];
	// 										// $_SESSION['trayecto'] = $alumnos['data'][0]['trayecto_alumno'];
	// 									}else{
	// 										session_destroy();
	// 										$resps['msj'] = "Usuario o contraseña invalido!";
	// 										echo json_encode($resps);
	// 										die();
	// 									}
	// 								}
	// 							}else{
	// 								$profesores = $this->profesor->getOne($_SESSION['cuenta_usuario']['cedula_usuario']);
	// 								if($profesores['msj']=="Good"){
	// 									if(count($profesores['data']) > 1){
	// 										$_SESSION['cuenta_persona'] = $profesores['data'][0];
	// 										$_SESSION['cuenta_persona']['cedula'] = $profesores['data'][0]['cedula_profesor'];
	// 										$_SESSION['cuenta_persona']['nombre'] = $profesores['data'][0]['nombre_profesor'];
	// 										$_SESSION['cuenta_persona']['apellido'] = $profesores['data'][0]['apellido_profesor'];
	// 										$_SESSION['cuenta_persona']['telefono'] = $profesores['data'][0]['telefono_profesor'];
	// 										$_SESSION['cuenta_persona']['correos'] = $profesores['data'][0]['correo'];


	// 										// $_SESSION['cedula'] = $profesores['data'][0]['cedula_alumno'];
	// 										// $_SESSION['nombre'] = $profesores['data'][0]['nombre_alumno'];
	// 										// $_SESSION['apellido'] = $profesores['data'][0]['apellido_alumno'];
	// 										// $_SESSION['telefono'] = $profesores['data'][0]['telefono_alumno'];
	// 									}else if($_SESSION['cuenta_usuario']['nombre_rol']=="Superusuario"){
	// 										$supersu = ['cedula'=>'00000000', 'nombre'=>'Usuario', 'apellido'=>'Sistema', 'telefono'=>'00000000000'];
	// 										$_SESSION['cuenta_persona']= $supersu;
	// 										if($_SESSION['cuenta_usuario']['estatus']=="0"){
	// 											$_SESSION['cuenta_usuario']['estatus'] = "1";
	// 											$estatus = "1";
	// 										}
	// 										// $_SESSION['cedula'] = $supersu['cedula'];
	// 										// $_SESSION['nombre'] = $supersu['nombre'];
	// 										// $_SESSION['apellido'] = $supersu['apellido'];
	// 										// $_SESSION['telefono'] = $supersu['telefono'];
	// 									}else{
	// 										session_destroy();
	// 										$resps['msj'] = "Usuario o contraseña invalido!";	
	// 										echo json_encode($resps);
	// 										die();
	// 									}
	// 								}
	// 							}


								
	// 						}

	// 					}else{
	// 						$resps['msj'] = "Usuario o contraseña invalido!";
	// 						echo json_encode($resps);
	// 					}
	// 				}
					
	// 			}

				
	// 		}else{
	// 			$objModel = new homeModel;
	// 			$_css = new headElement;
	// 			$_css->Heading();

	// 			$url = $this->url;
	// 			require_once("view/loginView.php");

	// 		}

	// }




		// public function Probar(){


		// 	if($_POST){		//Se verifica que se hayan pasado datos mediante el metodo post
		// 		// print_r($_POST);
		// 		if (isset($_POST['username']) && isset($_POST['loginSistema']) && isset($_POST['password'])) {
		// 			$this->login->getLoginSistema($_POST['username'], $_POST['password']); //pasa el user y pass
		// 			$objModel = new homeModel;
		// 			$_css = new headElement;
		// 			$_css->Heading();

		// 			$url = $this->url;
		// 			require_once("view/homeView.php");
		// 		}

		// 		if (isset($_POST['recuperarSistema']) && isset($_POST['correo'])) {
		// 			$objModel->getRecuperarSistema($_POST['correo']);
		// 		}
		// 	}else{
		// 		$objModel = new homeModel;
		// 		$_css = new headElement;
		// 		$_css->Heading();

		// 		$url = $this->url;
		// 		require_once("view/loginView.php");

		// 	}

		// }
		
	


		// 	


		// public function Buscar(){
		// 	if($_POST){		
		// 		if (isset($_POST['Buscar']) && isset($_POST['moduloM'])) {
		// 			$buscar = $this->modulo->getOne($_POST['moduloM']);
		// 			echo json_encode($buscar);
		// 		}

		// 	}
		// }

		// public function Agregar(){
		// 	if($_POST){		
		// 		if (!empty($_POST['Agregar']) && !empty($_POST['nombre']) ) {
		// 			$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
		// 			$buscar = $this->modulo->getOneNombre($datos['nombre']);
		// 			if($buscar['msj']=="Good"){
		// 				if(count($buscar['data'])>1){
		// 					// print_r($buscar['data'][0]['estatus']);
		// 					if($buscar['data'][0]['estatus']==0){
		// 						$datos['id'] = $datos['cedula'];
		// 						$exec = $this->modulo->Modificar($datos); 
		// 						echo json_encode($exec);
		// 					}else{
		// 						echo json_encode(['msj'=>"Repetido"]);
		// 					}
		// 				}else{
		// 					$exec = $this->modulo->Agregar($datos); 
		// 					echo json_encode($exec);
		// 				}
		// 			}else{
		// 				echo json_encode(['msj'=>"Error"]);
		// 			}
		// 		}else{
		// 			echo json_encode(['msj'=>"Vacio"]);
		// 		}

		// 	}
		// }

		// public function Modificar(){
		// 	if($_POST){		
		// 		if (!empty($_POST['codigo']) && !empty($_POST['Editar']) && !empty($_POST['nombre'])) {
		// 			$datos['id'] = $_POST['codigo'];
		// 			$datos['nombre'] = ucwords(mb_strtolower($_POST['nombre']));
		// 			$buscar = $this->modulo->getOneNombre($datos['nombre']);
		// 			if($buscar['msj']=="Good"){
		// 				if(count($buscar['data'])>1){
		// 					// print_r($buscar['data']);
		// 					if($_POST['codigo']==$buscar['data'][0]['id_modulo']){
		// 						$exec = $this->modulo->Modificar($datos); 
		// 						echo json_encode($exec);
		// 					}else{
		// 						echo json_encode(['msj'=>"Repetido"]);
		// 					}
		// 				}else{
		// 					$exec = $this->modulo->Modificar($datos); 
		// 					echo json_encode($exec);
		// 				}
		// 			}else{
		// 				echo json_encode(['msj'=>"Error"]);
		// 			}
		// 		}else{
		// 			echo json_encode(['msj'=>"Vacio"]);
		// 		}
		// 	}
		// }

		// public function Eliminar(){
		// 	if($_POST){		
		// 		if (isset($_POST['Eliminar']) && isset($_POST['modeloDelete'])) {
		// 			$buscar = $this->modulo->getOne($_POST['modeloDelete']);
		// 			if($buscar['msj']=="Good"){
		// 				if(count($buscar['data'])>1){
		// 					$data = $buscar['data'][0];
		// 					$exec = $this->modulo->Eliminar($_POST['modeloDelete']);
		// 					$exec['data'] = $data;
		// 					echo json_encode($exec);
		// 				}else{
		// 					echo json_encode(['msj'=>"Error"]);
		// 				}
		// 			}else{
		// 				echo json_encode(['msj'=>"Error"]);
		// 			}
		// 		}

		// 	}
		// }


	
		

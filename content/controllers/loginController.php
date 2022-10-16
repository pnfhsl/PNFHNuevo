<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\loginModel as loginModel;
	use content\modelo\usuariosModel as usuariosModel;
	use content\modelo\alumnosModel as alumnosModel;
	use content\modelo\profesoresModel as profesoresModel;
	use content\modelo\rolesModel as rolesModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\traits\Utility;
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	class loginController{
		use Utility;
		
		private $url;
		private $login;
		private $usuario;
		private $bitacora;
		
		private $alumno;
		private $profesor;
		private $rol;

		function __construct($url){

				// $objModel = new homeModel;
				// $_css = new headElement;
				// $_css->Heading();

			$this->url = $url;
			$this->login = new loginModel();		
			$this->usuario = new usuariosModel();		
			$this->alumno = new alumnosModel();
			$this->profesor = new profesoresModel();
			$this->rol = new rolesModel();
			$this->bitacora = new bitacoraModel();
		}

		public function Consultar(){
			// echo $this->encriptar('admin');
			if($_POST){
				if (isset($_POST['username']) && isset($_POST['loginSistema']) && isset($_POST['password'])) {
					$resp = $this->login->loginSistema(ucwords(mb_strtolower($_POST['username'])), $this->encriptar($_POST['password'])); //pasa el user y pass

					if($resp['msj'] == "Good" && !empty($resp['data']) && count($resp['data'])>0 && $resp['data'][0]['estatus']==0 && $resp['data'][0]['cedula_usuario'] == "00000000"){
						$permitirContinuar = "1";
					}else if($resp['msj'] == "Good" && !empty($resp['data']) && count($resp['data'])>0 && $resp['data'][0]['estatus']>0){
						$permitirContinuar = "1";
					}else{
						$permitirContinuar = "0";
					}
						
					if($resp['msj'] == "Good"){
						if($permitirContinuar=="1"){
							$intentos = $this->usuario->validarConsultar("Intentos", ucwords(mb_strtolower($_POST['username'])));
							$int = 0;
							$estatus = -1;
							if(!empty($resp['data']) && count($resp['data'])>0){
								$estatus = $resp['data'][0]['estatus'];
							}
							if(count($intentos)>0){
								$int = $intentos[0]["intentos"];
							}
							if($resp['msj'] === 'Good' && $int < 3){
								$dataTemp = $resp['data'][0];
								// print_r($dataTemp);
								$resp = array('access' => "Acceder");


								$_SESSION['cuentaActiva'] = true;
								$_SESSION['cuenta_usuario'] = $dataTemp;
								// $_SESSION['id_rol'] = $dataTemp['id_rol'];
								// $_SESSION['nombre_rol'] = $dataTemp['nombre_rol'];
								// $_SESSION['cedula_usuario'] = $dataTemp['cedula_usuario'];
								// $_SESSION['nombre_usuario'] = $dataTemp['nombre_usuario'];
								// $_SESSION['correo'] = $dataTemp['correo'];
								// $_SESSION['estatus'] = $dataTemp['estatus'];

								$accesos = $this->rol->validarConsultar("ConsultarAccesos",$_SESSION['cuenta_usuario']['id_rol']);
								$_SESSION['accesos_usuario'] = $accesos;

								if($_SESSION['cuenta_usuario']['nombre_rol']=="Alumnos"){
									$alumnos = $this->alumno->validarConsultar("getOne", $_SESSION['cuenta_usuario']['cedula_usuario']);
									if($alumnos['msj']=="Good"){
										if(count($alumnos['data']) > 1){
											$_SESSION['cuenta_persona'] = $alumnos['data'][0];
											$_SESSION['cuenta_persona']['cedula'] = $alumnos['data'][0]['cedula_alumno'];
											$_SESSION['cuenta_persona']['nombre'] = $alumnos['data'][0]['nombre_alumno'];
											$_SESSION['cuenta_persona']['apellido'] = $alumnos['data'][0]['apellido_alumno'];
											$_SESSION['cuenta_persona']['telefono'] = $alumnos['data'][0]['telefono_alumno'];
											$_SESSION['cuenta_persona']['trayecto'] = $alumnos['data'][0]['trayecto_alumno'];	

											// $_SESSION['cedula'] = $alumnos['data'][0]['cedula_alumno'];
											// $_SESSION['nombre'] = $alumnos['data'][0]['nombre_alumno'];
											// $_SESSION['apellido'] = $alumnos['data'][0]['apellido_alumno'];
											// $_SESSION['telefono'] = $alumnos['data'][0]['telefono_alumno'];
											// $_SESSION['trayecto'] = $alumnos['data'][0]['trayecto_alumno'];
										}else{
											session_destroy();
											$resps['msj'] = "Usuario o contraseña invalido!";
											echo json_encode($resps);
											die();
										}
									}
								}else{
									$profesores = $this->profesor->validarConsultar("getOne", $_SESSION['cuenta_usuario']['cedula_usuario']);
									if($profesores['msj']=="Good"){
										if(count($profesores['data']) > 1){
											$_SESSION['cuenta_persona'] = $profesores['data'][0];
											$_SESSION['cuenta_persona']['cedula'] = $profesores['data'][0]['cedula_profesor'];
											$_SESSION['cuenta_persona']['nombre'] = $profesores['data'][0]['nombre_profesor'];
											$_SESSION['cuenta_persona']['apellido'] = $profesores['data'][0]['apellido_profesor'];
											$_SESSION['cuenta_persona']['telefono'] = $profesores['data'][0]['telefono_profesor'];

											// $_SESSION['cedula'] = $profesores['data'][0]['cedula_alumno'];
											// $_SESSION['nombre'] = $profesores['data'][0]['nombre_alumno'];
											// $_SESSION['apellido'] = $profesores['data'][0]['apellido_alumno'];
											// $_SESSION['telefono'] = $profesores['data'][0]['telefono_alumno'];
										}else if($_SESSION['cuenta_usuario']['nombre_rol']=="Superusuario"){
											$supersu = ['cedula'=>'00000000', 'nombre'=>'Usuario', 'apellido'=>'Sistema', 'telefono'=>'00000000000'];
											$_SESSION['cuenta_persona']= $supersu;
											if($_SESSION['cuenta_usuario']['estatus']=="0"){
												$_SESSION['cuenta_usuario']['estatus'] = "1";
												$estatus = "1";
											}
											// $_SESSION['cedula'] = $supersu['cedula'];
											// $_SESSION['nombre'] = $supersu['nombre'];
											// $_SESSION['apellido'] = $supersu['apellido'];
											// $_SESSION['telefono'] = $supersu['telefono'];
										}else{
											session_destroy();
											$resps['msj'] = "Usuario o contraseña invalido!";	
											echo json_encode($resps);
											die();
										}
									}
								}

								
								$this->bitacora->monitorear($this->url);
								if($estatus=="1"){
									$resp['stat'] = "1";
								}
								if($estatus=="2"){
									$resp['stat'] = "2";
								}
								$this->usuario->validarConsultar("Bloqueo", ucwords(mb_strtolower($_POST['username'])), 0);
							}

							if($intentos[0]["intentos"] >= 3){
								$resp = array('look' => "Bloqueo");
							}
							if($intentos[0]["estatus"] > 2){
								$resp = [];
								$resp['msj']="Cuenta Bloqueada";
								$resp['stat']=3;
							}
							// echo json_encode($_SESSION);
							echo json_encode($resp);
						}else{
							$resps['msj'] = "Usuario o contraseña invalido!";
							echo json_encode($resps);
						}
					}else{
						$intentos = $this->usuario->validarConsultar("Intentos", ucwords(mb_strtolower($_POST['username'])));
						$int = 0;
						if(count($intentos)>0){
							$int = $intentos[0]["intentos"];
							$estat = $intentos[0]["estatus"];

							if($estat > 2){
								$resp = [];
								$resp['msj']="Cuenta Bloqueada";
								$resp['stat']=3;
							}

							if($resp['msj'] === 'Usuario o contraseña invalido!'){
								// echo $intentos[0]["intentos"];
								if(isset($intentos[0]["intentos"])){
									$intentos[0]["intentos"] += 1;
								}
								$fallos = $intentos[0]["intentos"];
								$respuest = $this->usuario->validarConsultar("Bloqueo", ucwords(mb_strtolower($_POST['username'])),$fallos);
							}
							if($estat <= 2 && $intentos[0]["intentos"] >= 3){
								$cedula = $this->login->busquedaCedula(ucwords(mb_strtolower($_POST['username'])));
								//var_dump($cedula);
								$preguntas = $this->login->validarConsultar("Consultar", $cedula[0]['cedula_usuario']);
								//var_dump($cedula[0]['cedula_usuario']);
								// $preg = array('look' => "Bloqueo", 'preguntas' => $preguntas);
								$resp = array('look' => "Bloqueo", 'preguntas' => $preguntas, 'cedula'=>$cedula[0]['cedula_usuario']);
								// $resp = array('look' => "Bloqueo");
							}
						}
						// echo json_encode($preg);
						echo json_encode($resp);
					}
					
				}

				if (isset($_POST['recuperarSistema']) && isset($_POST['pass']) ) {
					$this->login->recuperarPass($_SESSION['RC']['cedula_recuperacion'], $_POST['pass']);
					var_dump($_POST['pass']);
					// $objModel = new homeModel;
					// $_css = new headElement;
					// $_css->Heading();
					$url = $this->url;
					require_once("view/recuperarView.php");
				}
			}else{
				$objModel = new homeModel;
				$_css = new headElement;
				$_css->Heading();

				$url = $this->url;
				require_once("view/loginView.php");
			}
		}
		
		private function email($usuario, $token){
			$mail = new PHPMailer(true);
			$link = _URL_ . 'Login/recuperarAcceso/'.$token;
			// $user = $this->login->busquedaUsuario($_POST['correo']);
			// var_dump($user);
			// $usuario->email = $this->desencriptar($usuario->email);
				try {
					//Server settings
					$mail->SMTPDebug = 0;                      //Enable verbose debug output
					$mail->isSMTP();                                            //Send using SMTP
					$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
					$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
					$mail->Username   = 'pnfhsl10@gmail.com'; //SMTP username
					// $mail->Password   = 'laielvidadiuxrzq'; //SMTP password
					$mail->Password   = 'rhrxnkbnlbobftjv'; //SMTP password
					
					$mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
					$mail->Port       = 465;   //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
					$mail->CharSet = 'UTF-8';                              
					//Recipients
					$mail->setFrom($mail->Username, 'SCHSL');
					$mail->addAddress($usuario['correo']);   
					$mail->addReplyTo($mail->Username, 'Información');
					//Content
					$mail->isHTML(true);                                  //Set email format to HTML
					$mail->Subject = 'Recuperar Acceso';
					// $mail->Body    = "$link";
					$mail->Body    = "<h2>SCHSL - Recuperar Acceso</h2><br>
						Si solicitaste la recuperación de acceso para tu usuario \"$usuario[nombre]\" del sistema SCHSL, usa el link que aparece a 
						continuación para completar el proceso. Si no solicitaste esto, puedes ignorar este correo. <br>
						$link <br>
						Usuario: $usuario[nombre] <br>";
					$mail->AltBody    = "SCHSL - Recuperar Acceso 
						Si solicitaste la recuperación de acceso para tu usuario \"$usuario[nombre]\" del sistema SCHSL, usa el link que aparece a 
						continuación para completar el proceso. Si no solicitaste esto, puedes ignorar este correo. <br>
						$link  
						Usuario: $usuario[nombre]";
								
					$mail->send();
					// echo 'Message has been sent';
					// echo json_encode([
					//     'error' => false,
					//     'message' => 'Enlace de recuperación enviado al correo ',
					// ]);
					return ['msj'=>'Good'];
				} catch (Exception $e) {
					// var_dump($e);
					// echo json_encode([
					// 	'error' => true,
					// 	'msj' => 'No se pudo enviar el correo. Lo sentimos! Intente de nuevo.' .$e->getMessage(),
					// ]);
					return ['msj'=>'error', 'data'=>'No se pudo enviar el correo. Lo sentimos! Intente de nuevo.' .$e->getMessage(),];
				}
		}
	
		public function enviarLink(){
			if (isset($_POST['correo'])) {
				$usuarios = $this->login->busquedaCorreo($_POST['correo']);
				// print_r($usuarios);
				if($usuarios['msj']=="Good"){
					if(!empty($usuarios['data'])){
						$usuario = $usuarios['data'][0];
						if($usuario['estatus']=="1"){
							$token = bin2hex(random_bytes(10));
							unset($_SESSION['RC']);
							$_SESSION['RC'] = array(
								'token' => $this->encriptar($token),
								'cedula_recuperacion' => $usuario['cedula']
							);
							$resp = $this->email($usuario, $token);
							echo json_encode($resp);
						}
						if($usuario['estatus']=="2"){
							echo json_encode(['msj'=>"Vacio"]);
						}
						if($usuario['estatus']=="3"){
							echo json_encode(['msj'=>"Bloqueado"]);
						}
					}else{
						echo json_encode(['msj'=>"Vacio"]);
					}
				} else{
					echo json_encode(['msj'=>"Error"]);
				}
			}
		}


		public function recuperarAcceso($param){
			// echo $param."<br/>"; //Token que viene del correo
			$token = $this->encriptar($param); //Encriptar ese token para comparar con el que está en sesión
			// echo $token."<br/>";
			// var_dump($_SESSION['RC']['cedula_recuperacion']);//Esto es lo que se encuntra en la variable SESSION 

			if($token == $_SESSION['RC']['token']){
				// echo "<br/><br/> Token es correcto <br/><br/>";
				// Obtener datos del usuario usando cedula_recuperacion que esta en sesión. Debería ser con id en realidad

				//Luego importar la vista para cambio de contraseña
				$objModel = new homeModel;
				$_css = new headElement;
				$_css->Heading();
				$url = $this->url;
				require_once("view/recuperarView.php");
			} else {
				if($_POST){
					if (isset($_POST['recuperarSistema']) && isset($_POST['pass']) ) {
						// var_dump($_SESSION['RC']['cedula_recuperacion']);
						$exec = $this->login->recuperarPass($_SESSION['RC']['cedula_recuperacion'], $this->encriptar($_POST['pass']));
						echo json_encode($exec);
					}
				}else{
					//Mostrar vista de error (Homero dice: D'oh!)
					require_once("errorController.php");
				}
			}

		}

}
	
		

?>
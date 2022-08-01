<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\loginModel as loginModel;
	use content\traits\Utility;
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	class loginController{
		use Utility;
		private $url;
		private $login;
		function __construct($url){

			$this->url = $url;
			$this->login = new loginModel();		//Se instancia el objeto
		}

		public function Consultar(){


			if($_POST){		//Se verifica que se hayan pasado datos mediante el metodo post
				// print_r($_POST);
				if (isset($_POST['username']) && isset($_POST['loginSistema']) && isset($_POST['password'])) {
					$this->login->getLoginSistema($_POST['username'], $_POST['password']); //pasa el user y pass
					$objModel = new homeModel;
					$_css = new headElement;
					$_css->Heading();

					$url = $this->url;
					require_once("view/homeView.php");
				}

				if (isset($_POST['recuperarSistema']) && isset($_POST['correo'])) {
					$objModel->getRecuperarSistema($_POST['correo']);
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
			$user = $this->login->busquedaUsuario($_POST['correo']);
			var_dump($user);
			// var_dump($this->user['nombre']); 
			// $usuario->email = $this->desencriptar($usuario->email);
				try {
					//Server settings
					$mail->SMTPDebug = 0;                      //Enable verbose debug output
					$mail->isSMTP();                                            //Send using SMTP
					$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
					$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
					$mail->Username   = 'lynnethpereira12@gmail.com'; //SMTP username
					$mail->Password   = 'bwzbvsykholxfbza'; //SMTP password
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
				} catch (Exception $e) {
					// var_dump($e);
					echo json_encode([
						'error' => true,
						'msj' => 'No se pudo enviar el correo. Lo sentimos! Intente de nuevo.' .$e->getMessage(),
					]);
					return 0;
				}
		}
	
		public function enviarLink(){
			if (isset($_POST['correo'])) {
				$usuario = $this->login->busquedaCorreo($_POST['correo']);
				if($usuario){
					$token = bin2hex(random_bytes(10));
					$_SESSION['RC'] = array(
						'token' => $this->encriptar($token),
						'cedula_recuperacion' => $usuario['cedula']
					);
	
					$this->email($usuario, $token);
					echo json_encode(['msj'=>"Good"]);
				}
				else{
					echo json_encode(['msj'=>"Error"]);
				}
			}
		}

	}
		

?>
<?php

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\bitacoraModel as bitacoraModel;
	use content\modelo\notificacionesModel as notificacionesModel;
	use content\traits\Utility;

	class homeController{
		use Utility;
		private $url;
		private $home;
		private $bitacora;
		private $notificacion;
		
		function __construct($url){
			$this->url = $url;
			$this->notificacion = new notificacionesModel();
			$this->home = new homeModel();
			$this->bitacora = new bitacoraModel();
		}

		public function Consultar(){
			$objModel = new homeModel;
			$_css = new headElement;
			$_css->Heading();
			$this->bitacora->monitorear($this->url);

			// // print_r($bitacoraBuscar);

			// $configargs= array("config" =>"C:\\xampp\php\\extras\openssl\\openssl.cnf",'private_key_bits' => 2048,'default_md' => "sha256");
			// $generar = openssl_pkey_new($configargs);
			// $keypub= openssl_pkey_get_details($generar);
			// openssl_pkey_export($generar, $keypriv, NULL, $configargs);

			// $dat['public'] = $keypub['key'];
			// $dat['private'] = $keypriv;
			// $dat['firma'] = "JAJAJa";
			// // $llaves = $this->home->Agregar($dat);

			// $llaves = $this->home->Consultar();

			// $mensaje = "Cadena de encriptado xD";

			// $public_key = openssl_pkey_get_public($llaves[0]['public_key']);
			// openssl_public_encrypt($mensaje, $mensajeEncriptado, $public_key);
			// $mensajeEncriptado = base64_encode($mensajeEncriptado);

			// $private_key = openssl_pkey_get_private($llaves[0]['private_key']);
			// openssl_private_decrypt(base64_decode($mensajeEncriptado), $mensajeDescifrado, $private_key);


			// echo "Mensaje original: <br>".$mensaje."<br>";
			// echo "Mensaje Encriptado: <br>".$mensajeEncriptado."<br>";
			// echo "Mensaje Desencriptado: <br>".$mensajeDescifrado."<br>";

			$url = $this->url;
			require_once("view/homeView.php");
		}

	}
		

?>
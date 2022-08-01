<?php
	/* utilizaremos namespace en la primera línea de código */
	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;  /* El as nos ayuda a renombrar el directorio sysConfig*/

	/* Extender el sysConfig utilizando composer dentro de la clase frontController*/
	class frontController extends sysConfig{

		private $url;
		private $direccion;
		private $controlador;

		private $request;
		private $controller;
		private $method;
		private $params;

		public function __construct($request){
			/* Si la url no existe, está en blanco o no cumple con los parámetros devolver al apartado inicial del sistema */

			// if(isset($request["url"])){  			/* Validar el $_REQUEST que se está solicitando  */
			// 	$this->url = $request["url"];		/* asignamos el contenido a la variable privada url */
			// 	$this->direccion = _DIRECTORY_;		/* asignamos el contenido de la constante definida en  sysConfig*/
			// 	$this->controlador = _CONTROLLER_;  /* asignamos el contenido de la constante definida en  sysConfig*/
			// 	$this->Validar_URL();				/* LLamamos la va funcion que valida la url */
			// }else{
			// // 	// die("<script>location='?url=user'</script>");	/* si esta vacia le asiganeros el valor home */
			// }
			if(empty($request['url'])){$request['url']="";}
			$this->request = $request['url'];
			$this->Url();
			$this->Controller();
			$this->Method();
			$this->Param();
			// if(empty($request['params'])){$request['params']="";}
			// $this->params = $request['params'];
			// $params = explode('/',$this->params);
			$this->Validar_URL();				/* LLamamos la va funcion que valida la url */
		}

		public function Url(){
			$this->url = explode('/', $this->request);
			$this->direccion = _DIRECTORY_;		/* asignamos el contenido de la constante definida en  sysConfig*/
			$this->controlador = _CONTROLLER_;  /* asignamos el contenido de la constante definida en  sysConfig*/
		}
		public function Controller(){
			if(!empty($_SESSION['cuentaActiva']) && $_SESSION['cuentaActiva']==true){
				$this->controller = $this->url[0] == '' ? 'Home' : $this->url[0];
			}else{
			$this->controller = $this->url[0] == '' ? 'login' : $this->url[0];
			}
			$this->url[0] = $this->controller;
		}
		public function Method(){
			$this->method = !empty($this->url[1]) ? $this->url[1] : 'Consultar';
		}
		public function Param(){
			$this->params = !empty($this->url[2]) ? $this->url[2] : '';
		}

		private function Validar_URL(){
			$url = preg_match_all("/^[a-zA-Z0-9-@\/.=:_#$ ]{1,700}$/", $this->url[0]);
			if($url == 1){
				$this->Cargar_Pagina($this->url[0]); /* llamdo de la funcion que cargara las vistas */
			}else{	
				require_once("errorController.php");	
			}
			// if($url == 1){
			// 	$this->Cargar_Pagina($this->url[0]); /* llamdo de la funcion que cargara las vistas */
			// }else{
			// 	die('LA URL INGRESADA ES INVÁLIDA');
			// }
		}

		private function Cargar_Pagina($url){
			/* verificacion si el archivo existe , en la direccion predeterminada */
			if(file_exists($this->direccion.mb_strtolower($url).$this->controlador)){
				/* si existe trae el archivo solicitado mediante el require_once */
				require_once($this->direccion.mb_strtolower($url).$this->controlador); 
				
				$root = str_replace("/", "\\", $this->direccion);
				$method = $this->method;

				$class = $root.mb_strtolower($url)."Controller";
				if(class_exists($class)){
					$object = new $class($url);
					if(method_exists($object, $method)){
						$object->$method();
					}else{
						require_once("errorController.php");					
					}
				}else{
					require_once("errorController.php");					
				}
			}else{
				/* si no existe redireccionaremos a la pagina de error */
				require_once("errorController.php");					
				// die("<script>location='?url=error'</script>");
			}	
		}
	}


?>
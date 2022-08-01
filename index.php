<?php
	/* verificación deL archivo autoload.php de composer*/
	date_default_timezone_set('America/Caracas');
	ini_set('date.timezone', 'america/caracas');

	if(file_exists("vendor/autoload.php")){
		require_once("vendor/autoload.php"); /* Indexar mediante require_once el autoload.php de composer */
	}else{
		/* verificación deL archivo error404.php*/
		if(file_exists("content/component/error404.php")){
			require_once("content/component/error404.php");
		}
		die($html404); /* mensaje de error mediante el die() , establecido en error404.php */
	}
	session_start();

	/* Mediante el composer llamamos a nuestro configurador del sistema  */
	use config\settings\sysConfig as sysConfig; /* El as nos ayuda a renombrar el directorio sysConfig*/

	$globalConfig = new sysConfig(); /* instanciamos la clase sysConfig */
	$globalConfig->_int(); /* llamamos a su funcion publica */

	/* Mediante el composer llamamos a nuestro frontController  */
	use content\controllers\frontController as frontController; /* El as nos ayuda a renombrar el directorio frontController*/

	/* llamamos del frontController, pasando como dato principal el $_REQUEST al constructor */
	$IndexSystem = new frontController($_REQUEST); 	
	

?>
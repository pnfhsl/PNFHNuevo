<?php

	 namespace content\modelo;

	use content\config\conection\database as database;

	class bitacoraModel extends database{

		private $cedula;
		private $nombre; 
		private $apellido;
		private $correo;
		private $telefono;

		public function __construct(){
			parent::__construct();
		}
		public function Consultar($data=""){
			
			try {
				if($data==""){
					$query = parent::prepare("SELECT id_bitacora, cedula_usuario, modulo_bitacora, accion_bitacora, fecha_bitacora, hora_bitacora FROM bitacora ORDER BY id_bitacora DESC");
				}else{
					$query = parent::prepare("SELECT id_bitacora, cedula_usuario, modulo_bitacora, accion_bitacora, fecha_bitacora, hora_bitacora FROM bitacora WHERE cedula_usuario = '{$data['cedula']}'  ORDER BY id_bitacora DESC");
					// $query = parent::prepare("SELECT id_bitacora, cedula_usuario, modulo_bitacora, accion_bitacora, fecha_bitacora, hora_bitacora FROM bitacora WHERE modulo_bitacora = '{$data['modulo']}' and accion_bitacora = '{$data['accion']}'  ORDER BY id_bitacora DESC");
				}
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}

		private function Agregar($date){

			try{
	        $query = parent::prepare('INSERT INTO bitacora (id_bitacora, cedula_usuario, modulo_bitacora, accion_bitacora, fecha_bitacora, hora_bitacora, estatus) VALUES (DEFAULT, :cedula_usuario, :modulo_bitacora, :accion_bitacora, :fecha_bitacora, :hora_bitacora, 1)');
	        $query->bindValue(':cedula_usuario', $date['cedula']);
	        $query->bindValue(':modulo_bitacora', $date['modulo']);
	        $query->bindValue(':accion_bitacora', $date['accion']);
	        $query->bindValue(':fecha_bitacora', $date['fecha']);
	        $query->bindValue(':hora_bitacora', $date['hora']);
	        $query->execute();
	        $respuestaArreglo = $query->fetchAll();
	        // print_r($respuestaArreglo);
	        if ($respuestaArreglo += ['estatus' => true]) {
	        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
	        }
	      } catch(PDOException $e){
	      	// print_r($e);
	        	$errorReturn = ['estatus' => false];
	      		$errorReturn['msj'] = "Error";
		        $errorReturn += ['info' => "Error sql:{$e}"];
		        return $errorReturn; 
	      }
		}

		public function Monitorear($url){
			if(!empty($_REQUEST['url'])){
				$reqBitacora = explode('/', $_REQUEST['url']);
			}
			if(!empty($reqBitacora[1])){
				$metodoBitacora = $reqBitacora[1];
			}else{
				$metodoBitacora = "Consultar";
			}
			if($url=="Home"){
				$url = "Inicio";
			}
			if($url=="Login"){
				$url = "Inicio De Sesión";
			}
			if($url=="Logout"){
				$url = "Cerrar Sesión";
			}
			// echo $metodoBitacora;
			$dataBitacora['cedula'] = $_SESSION['cuenta_usuario']['cedula_usuario'];
			$dataBitacora['modulo'] = ucwords(mb_strtolower($url));
			$dataBitacora['accion'] = ucwords(mb_strtolower($metodoBitacora));
			$dataBitacora['fecha'] = date('Y-m-d');
			$dataBitacora['hora'] = date('h:i a');

			// echo "Cedula: ".$dataBitacora['cedula']."<br>";
			// echo "Modulo: ".$dataBitacora['modulo']."<br>";
			// echo "Accion: ".$dataBitacora['accion']."<br>";
			// echo "Fecha: ".$dataBitacora['fecha']."<br>";
			// echo "Hora: ".$dataBitacora['hora']."<br>";

			$bitacoraBuscar = self::Consultar($dataBitacora);
			$procederBitacora = "0";
			if(count($bitacoraBuscar)>0){
				$resulBitacora = $bitacoraBuscar[0];
				if(($resulBitacora['modulo_bitacora']==$dataBitacora['modulo']) && ($resulBitacora['accion_bitacora']==$dataBitacora['accion'])){
					$procederBitacora = "0";
				}else{
					$procederBitacora = "1";
				}
			}else{
				$procederBitacora = "1";
			}
			// echo $procederBitacora;
			if($procederBitacora=="1"){
				$bitacoraExec = self::Agregar($dataBitacora);
			}
		}
		public function arreglarFecha($date){
			$anio = substr($date, 0, 4);
			$mes = substr($date, 5, 2);
			$dia = substr($date, 8, 2);
			$fecha = $dia.'-'.$mes.'-'.$anio;
			return $fecha;
		}
	}

?>
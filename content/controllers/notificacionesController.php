<?php 

	namespace content\controllers;

	use config\settings\sysConfig as sysConfig;
	use content\component\headElement as headElement;
	use content\modelo\homeModel as homeModel;
	use content\modelo\periodosModel as periodosModel;
	use content\modelo\notificacionesModel as notificacionesModel;
	use content\traits\Utility;

	class notificacionesController{
		use Utility;
		private $url;
		private $notificacion;
		private $periodo;

		function __construct($url){			
			$this->url = $url;
			$this->notificacion = new notificacionesModel();
			$this->periodo = new periodosModel();
		}

		public function NuevoPeriodo(){
			$unMinuto = 60;
			$unaHora = $unMinuto * 60;
			$unDia = $unaHora * 24;
			$unaSemana = $unDia * 7;
			$unaQuincena = $unDia * 15;
			$unMes = $unDia * 30;
			$unTrimestre = $unMes * 3;
			$unSemestre = $unMes * 6;
			$unAnio = $unMes * 12;

			$hace15 = date('Y-m-d', time() - $unaQuincena);
			$hoy = date('Y-m-d');
			$dentro15 = date('Y-m-d', time() + $unaQuincena);
			$data['inicio'] = $hace15;
			$data['hoy'] = $hoy;
			$data['final'] = $dentro15;

			$results = $this->notificacion->LimitesPeriodos($data, "apertura");
			if(count($results)>0){
				$result['msj'] = "Good";
				$result['data'] = $results;
				echo json_encode($result);
			}else{
				$result['msj'] = "Vacio";
				echo json_encode($result);
			}
		}

		public function CierrePeriodoSubidaNotas(){
			$unMinuto = 60;
			$unaHora = $unMinuto * 60;
			$unDia = $unaHora * 24;
			$unaSemana = $unDia * 7;
			$unaQuincena = $unDia * 15;
			$unMes = $unDia * 30;
			$unTrimestre = $unMes * 3;
			$unSemestre = $unMes * 6;
			$unAnio = $unMes * 12;

			$hace15 = date('Y-m-d', time() - $unaQuincena);
			$hoy = date('Y-m-d');
			$dentro15 = date('Y-m-d', time() + $unaQuincena);
			$data['inicio'] = $hace15;
			$data['hoy'] = $hoy;
			$data['final'] = $dentro15;

			$results = $this->notificacion->LimitesPeriodos($data, "cierre");
			if(count($results)>0){
				$result['msj'] = "Good";
				$index = [];
				$n=0;
				foreach ($results as $keys) {
					if(!empty($keys['id_periodo'])){
						$res2 = $this->notificacion->BuscarClasesPorPeriodo($keys);
						foreach ($res2 as $key2) {
							if(!empty($key2['id_clase'])){
								$dataNotificacion['tabla_notificacion']="clases";
								$dataNotificacion['elemento_tabla']="id";
								$dataNotificacion['id_tabla'] = $key2['id_clase'];
								$dataNotificacion['codigo_tabla'] = "";
								$dataNotificacion['fecha_notificacion'] = date('Y-m-d');
								$dataNotificacion['hora_notificacion'] = date('h:i a');
								$dataNotificacion['visto_alumnos'] = 9;
								$dataNotificacion['visto_profesores'] = 0;
								$dataNotificacion['visto_admin'] = 0;
								$dataNotificacion['visto_superusuario'] = 0;
								$buscarNotificacion = $this->notificacion->Buscar($dataNotificacion);
								if(count($buscarNotificacion)<1){
									$res = $this->notificacion->Agregar($dataNotificacion);
									if($res['msj']=="Good"){
										$index[$n]="1";
									}else{
										$index[$n]="2";
									}
								}else{
									$index[$n]="1";
								}
								$n++;
							}
						}
					}
				}
				if($n==count($index)){
					$result['msj'] = "Good";
				}else{
					$result['msj'] = "Vacio";
				}
			}else{
				$result['msj'] = "Vacio";
			}
			echo json_encode($result);
		}

		public function NotificacionVerificacionDeNotas(){
			$unMinuto = 60;
			$unaHora = $unMinuto * 60;
			$unDia = $unaHora * 24;
			$unaSemana = $unDia * 7;
			$unaQuincena = $unDia * 15;
			$unMes = $unDia * 30;
			$unTrimestre = $unMes * 3;
			$unSemestre = $unMes * 6;
			$unAnio = $unMes * 12;

			$hace15 = date('Y-m-d', time() - $unaQuincena);
			$hoy = date('Y-m-d');
			$dentro15 = date('Y-m-d', time() + $unaQuincena);
			$data['inicio'] = $hace15;
			$data['hoy'] = $hoy;
			$data['final'] = $dentro15;

			$results = $this->notificacion->LimitesPeriodos($data, "cierre");
			if(count($results)>0){
				$result['msj'] = "Good";
				$index = [];
				$n=0;
				foreach ($results as $keys) {
					if(!empty($keys['id_periodo'])){
						$res2 = $this->notificacion->BuscarClasesPorPeriodo($keys);
						foreach ($res2 as $key2) {
							if(!empty($key2['id_clase'])){
								$dataNotificacion['tabla_notificacion']="clases";
								$dataNotificacion['elemento_tabla']="id";
								$dataNotificacion['id_tabla'] = $key2['id_clase'];
								$dataNotificacion['codigo_tabla'] = "";
								$dataNotificacion['fecha_notificacion'] = date('Y-m-d');
								$dataNotificacion['hora_notificacion'] = date('h:i a');
								$dataNotificacion['visto_alumnos'] = 9;
								$dataNotificacion['visto_profesores'] = 0;
								$dataNotificacion['visto_admin'] = 0;
								$dataNotificacion['visto_superusuario'] = 0;
								$buscarNotificacion = $this->notificacion->Buscar($dataNotificacion);
								if(count($buscarNotificacion)<1){
									$res = $this->notificacion->Agregar($dataNotificacion);
									if($res['msj']=="Good"){
										$index[$n]="1";
									}else{
										$index[$n]="2";
									}
								}else{
									$index[$n]="1";
								}
								$n++;
							}
						}
					}
				}
				if($n==count($index)){
					$result['msj'] = "Good";
				}else{
					$result['msj'] = "Vacio";
				}
			}else{
				$result['msj'] = "Vacio";
			}
			echo json_encode($result);
		}

		

	}
?>
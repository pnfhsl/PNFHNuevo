<?php

	 namespace content\modelo;

	use content\config\conection\database as database;

	class notificacionesModel extends database{

		private $cedula;
		private $nombre; 
		private $apellido;
		private $correo;
		private $telefono;

		public function __construct(){
			parent::__construct();
		}
		public function ConsultarNotificacionClasesListas($data, $rol){
			try {
				$query = parent::prepare("SELECT * FROM notificaciones WHERE notificaciones.estatus = 1 and notificaciones.fecha_notificacion BETWEEN '{$data['inicio']}' and '{$data['final']}' and notificaciones.tabla_notificacion = 'clases' and notificaciones.visto_superusuario < 5");
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
		
		public function LimitesPeriodos($data, $num){
			try {
				if($num=="apertura"){
					$query = parent::prepare("SELECT * FROM periodos WHERE periodos.estatus = 1 and periodos.fecha_apertura BETWEEN '{$data['inicio']}' and '{$data['final']}'");
				}
				if($num=="cierre"){
					$query = parent::prepare("SELECT * FROM periodos WHERE periodos.estatus = 1 and periodos.fecha_cierre BETWEEN '{$data['inicio']}' and '{$data['final']}'");
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

		public function BuscarClasesPorNotificacion($data){
			try {
				$sql = "SELECT * FROM periodos, secciones, clases, saberes, profesores, notificaciones WHERE notificaciones.id_tabla = clases.id_clase and notificaciones.id_tabla = {$data['id_tabla']} and periodos.estatus = 1 and secciones.estatus = 1 and clases.estatus = 1 and saberes.estatus = 1 and periodos.id_periodo = secciones.id_periodo and clases.cedula_profesor = profesores.cedula_profesor and saberes.id_SC = clases.id_SC and secciones.cod_seccion = clases.cod_seccion";
				$query = parent::prepare($sql);
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
		
		public function BuscarClasesPorNotificacionProfesor($data, $cedula){
			try {
				$tabla = $data['tabla_notificacion'];
				if($data['elemento_tabla']=="id"){
					$elemento_tabla = "notificaciones.id_tabla";
					$id_tabla = $data['id_tabla'];
				}
				if($data['elemento_tabla']=="codigo"){
					$elemento = "notificaciones.codigo_tabla";
					$id_tabla = $data['codigo_tabla'];
				}
				$sql = "SELECT * FROM periodos, secciones, clases, saberes, profesores, notificaciones WHERE {$elemento_tabla} = clases.id_clase and {$elemento_tabla} = {$id_tabla} and periodos.estatus = 1 and secciones.estatus = 1 and clases.estatus = 1 and saberes.estatus = 1 and periodos.id_periodo = secciones.id_periodo and saberes.id_SC = clases.id_SC and secciones.cod_seccion = clases.cod_seccion and clases.cedula_profesor = profesores.cedula_profesor and clases.cedula_profesor = '{$cedula}'";
				$query = parent::prepare($sql);
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

		public function BuscarClasesPorNotificacionTutor($data, $cedula, $notas=""){
			try {
				if($notas==""){
					$sql = "SELECT DISTINCT profesores.cedula_profesor, profesores.nombre_profesor, profesores.apellido_profesor, proyectos.cod_proyecto, proyectos.titulo_proyecto, proyectos.trayecto_proyecto, clases.id_clase, saberes.id_SC, saberes.nombreSC, saberes.trayecto_SC, saberes.fase_SC, secciones.cod_seccion, secciones.nombre_seccion, secciones.trayecto_seccion, periodos.id_periodo, periodos.nombre_periodo, periodos.year_periodo, periodos.fecha_apertura, periodos.fecha_cierre, notificaciones.id_notificacion, notificaciones.tabla_notificacion, notificaciones.elemento_tabla, notificaciones.id_tabla, notificaciones.codigo_tabla, notificaciones.fecha_notificacion, notificaciones.hora_notificacion, notificaciones.visto_alumnos, notificaciones.visto_profesores, notificaciones.visto_admin, notificaciones.visto_superusuario FROM profesores, proyectos, grupos, seccion_alumno, notas, clases, saberes, secciones, periodos, notificaciones WHERE profesores.cedula_profesor = proyectos.cedula_profesor and proyectos.cod_proyecto = grupos.cod_proyecto and grupos.id_SA = seccion_alumno.id_SA and seccion_alumno.id_SA = notas.id_SA and notas.id_clase = clases.id_clase and clases.id_SC = saberes.id_SC and clases.cod_seccion = secciones.cod_seccion and secciones.id_periodo = periodos.id_periodo and notificaciones.id_tabla = clases.id_clase and notificaciones.id_tabla = {$data['id_tabla']} and proyectos.cedula_profesor = '{$cedula}'";
				}else{
					$sql = "SELECT * FROM notificaciones, notas, clases WHERE notificaciones.codigo_tabla = notas.id_nota and clases.id_clase = notas.id_clase and clases.id_clase = {$data['id_tabla']}";
				}
				$query = parent::prepare($sql);
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

		public function BuscarClasesPorNotificacionAlumno($data, $cedula, $notas=""){
			try {
				if($notas==""){
					$sql = "SELECT * FROM profesores, proyectos, grupos, seccion_alumno, alumnos, notas, clases, saberes, secciones, periodos, notificaciones WHERE profesores.cedula_profesor = proyectos.cedula_profesor and proyectos.cod_proyecto = grupos.cod_proyecto and grupos.id_SA = seccion_alumno.id_SA and alumnos.cedula_alumno = seccion_alumno.cedula_alumno and seccion_alumno.id_SA = notas.id_SA and notas.id_clase = clases.id_clase and clases.id_SC = saberes.id_SC and clases.cod_seccion = secciones.cod_seccion and secciones.id_periodo = periodos.id_periodo and notificaciones.id_tabla = clases.id_clase and notificaciones.id_tabla = {$data['id_tabla']} and seccion_alumno.cedula_alumno = '{$cedula}'";
				}else{
					$sql = "SELECT * FROM notificaciones, notas, seccion_alumno, clases WHERE notificaciones.codigo_tabla = notas.id_nota and notas.id_SA = seccion_alumno.id_SA and clases.id_clase = notas.id_clase  and seccion_alumno.cedula_alumno = '{$cedula}' and clases.id_clase = {$data['id_clase']}";
				}
				$query = parent::prepare($sql);
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
		
		public function BuscarClasesPorNotificacionNotas($data){
			try {
				$sql = "SELECT DISTINCT clases.id_clase, saberes.id_SC, saberes.nombreSC, saberes.trayecto_SC, saberes.fase_SC, profesores.cedula_profesor, profesores.nombre_profesor, profesores.apellido_profesor, profesores.telefono_profesor, secciones.cod_seccion, secciones.nombre_seccion, secciones.trayecto_seccion, periodos.id_periodo, periodos.nombre_periodo, periodos.year_periodo, periodos.fecha_apertura, periodos.fecha_cierre FROM notas, clases, saberes, profesores, secciones, periodos WHERE notas.id_clase = clases.id_clase and saberes.id_SC = clases.id_SC and profesores.cedula_profesor = clases.cedula_profesor and secciones.cod_seccion = clases.cod_seccion and periodos.id_periodo = secciones.id_periodo and clases.id_clase = {$data['id_clase']}";
				$query = parent::prepare($sql);
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

		public function BuscarClasesPorPeriodo($data){
			try {
				$query = parent::prepare("SELECT * FROM periodos, secciones, clases, saberes WHERE periodos.estatus = 1 and secciones.estatus = 1 and clases.estatus = 1 and saberes.estatus = 1 and periodos.id_periodo = secciones.id_periodo and saberes.id_SC = clases.id_SC and secciones.cod_seccion = clases.cod_seccion and secciones.id_periodo = {$data['id_periodo']}");
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

		public function Buscar($data){
			try {
				$sql = "SELECT * FROM notificaciones WHERE notificaciones.tabla_notificacion = '{$data['tabla_notificacion']}' and notificaciones.elemento_tabla = '{$data['elemento_tabla']}' and notificaciones.id_tabla = {$data['id_tabla']} and notificaciones.codigo_tabla = '{$data['codigo_tabla']}' and notificaciones.estatus = 1";
				$query = parent::prepare($sql);
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


		public function Agregar($data){

			try{
	        $query = parent::prepare('INSERT INTO notificaciones (id_notificacion, tabla_notificacion, elemento_tabla, id_tabla, codigo_tabla, fecha_notificacion, hora_notificacion, estatus, visto_alumnos, visto_profesores, visto_admin, visto_superusuario) VALUES (DEFAULT, :tabla_notificacion, :elemento_tabla, :id_tabla, :codigo_tabla, :fecha_notificacion, :hora_notificacion, 1, :visto_alumnos, :visto_profesores, :visto_admin, :visto_superusuario)');
	        $query->bindValue(':tabla_notificacion', $data['tabla_notificacion']);
	        $query->bindValue(':elemento_tabla', $data['elemento_tabla']);
	        $query->bindValue(':id_tabla', $data['id_tabla']);
	        $query->bindValue(':codigo_tabla', $data['codigo_tabla']);
	        $query->bindValue(':fecha_notificacion', $data['fecha_notificacion']);
	        $query->bindValue(':hora_notificacion', $data['hora_notificacion']);
	        $query->bindValue(':visto_alumnos', $data['visto_alumnos']);
	        $query->bindValue(':visto_profesores', $data['visto_profesores']);
	        $query->bindValue(':visto_admin', $data['visto_admin']);
	        $query->bindValue(':visto_superusuario', $data['visto_superusuario']);
	        $query->execute();
	        $respuestaArreglo = $query->fetchAll();
	        if ($respuestaArreglo += ['estatus' => true]) {
	        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
	        }
			return $Result;
	      } catch(PDOException $e){
	      	// print_r($e);
	        	$errorReturn = ['estatus' => false];
	      		$errorReturn['msj'] = "Error";
		        $errorReturn += ['info' => "Error sql:{$e}"];
		        return $errorReturn; 
	      }
		}

		public function RevisarNotificacion(){
			$id_notificacion = $_POST['id_notificacion2'];
			$lista = $_POST['lista'];
			$visto = $_POST['visto'];


			if($lista=="general"){
				$sql = "UPDATE notificaciones SET {$visto} = 1 WHERE id_notificacion = {$id_notificacion}";
				$query = parent::prepare($sql);
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
			}
			if($lista=="profesor"){
				$sql = "UPDATE notificaciones SET {$visto} = 1 WHERE id_notificacion = {$id_notificacion}";
				$query = parent::prepare($sql);
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);	
			}
			if($lista=="tutor"){
				$sql = "SELECT * FROM notificaciones, notas, seccion_alumno, grupos, proyectos WHERE notificaciones.codigo_tabla = notas.id_nota and notas.id_SA = seccion_alumno.id_SA and seccion_alumno.id_SA = grupos.id_SA and grupos.cod_proyecto = proyectos.cod_proyecto and notificaciones.id_notificacion = {$id_notificacion}";
				$query = parent::prepare($sql);
				$res1 = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$res1 = $query->fetchAll(parent::FETCH_ASSOC);	
				foreach ($res1 as $keys) {
					if(!empty($keys['cod_proyecto'])){
						$sql = "SELECT * FROM proyectos, grupos, seccion_alumno, notas, notificaciones WHERE proyectos.cod_proyecto = grupos.cod_proyecto and grupos.id_SA = seccion_alumno.id_SA and seccion_alumno.id_SA = notas.id_SA and notas.id_nota = notificaciones.codigo_tabla and proyectos.cod_proyecto = '{$keys['cod_proyecto']}'";
						$query = parent::prepare($sql);
						$res2 = '';
						$query->execute();
						$query->setFetchMode(parent::FETCH_ASSOC);
						$res2 = $query->fetchAll(parent::FETCH_ASSOC);
						foreach ($res2 as $keys2) {
							if(!empty($keys2['id_nota'])){
								$sql = "UPDATE notificaciones SET {$visto} = 1 WHERE id_notificacion = {$keys2['id_notificacion']}";
								$query = parent::prepare($sql);
								$respuestaArreglo = '';
								$query->execute();
								$query->setFetchMode(parent::FETCH_ASSOC);
								$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
							}
						}
					}
				}
			}
			if($lista=="alumno"){
				$sql = "SELECT * FROM notificaciones, notas, seccion_alumno, grupos, proyectos WHERE notificaciones.codigo_tabla = notas.id_nota and notas.id_SA = seccion_alumno.id_SA and seccion_alumno.id_SA = grupos.id_SA and grupos.cod_proyecto = proyectos.cod_proyecto and notificaciones.id_notificacion = {$id_notificacion}";
				$query = parent::prepare($sql);
				$res1 = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$res1 = $query->fetchAll(parent::FETCH_ASSOC);	
				foreach ($res1 as $keys) {
					if(!empty($keys['cod_proyecto'])){
						// print_r($keys['id_clase']."  - ".$keys['id_nota']."  - ".$keys['id_notificacion']);
						// echo "<br>";
						// echo "<br>";
						$sql = "SELECT * FROM proyectos, grupos, seccion_alumno, notas, notificaciones WHERE proyectos.cod_proyecto = grupos.cod_proyecto and grupos.id_SA = seccion_alumno.id_SA and seccion_alumno.id_SA = notas.id_SA and notas.id_nota = notificaciones.codigo_tabla and proyectos.cod_proyecto = '{$keys['cod_proyecto']}' and notas.id_clase = {$keys['id_clase']} and seccion_alumno.cedula_alumno = '{$_SESSION['cuenta_persona']['cedula']}'";
						$query = parent::prepare($sql);
						$res2 = '';
						$query->execute();
						$query->setFetchMode(parent::FETCH_ASSOC);
						$res2 = $query->fetchAll(parent::FETCH_ASSOC);
						foreach ($res2 as $keys2) {
							if(!empty($keys2['id_notificacion'])){
								$id_notificacion = $keys2['id_notificacion'];
								$sql = "UPDATE notificaciones SET {$visto} = 1 WHERE id_notificacion = {$keys2['id_notificacion']}";
								$query = parent::prepare($sql);
								$respuestaArreglo = '';
								$query->execute();
								$query->setFetchMode(parent::FETCH_ASSOC);
								$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
							}
						}
					}
				}
			}
			// echo "Notificacion: ".$id_notificacion."<br>";
			// echo "lista: ".$lista."<br>";
			// echo "visto: ".$visto."<br>";
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
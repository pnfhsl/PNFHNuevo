<?php

	namespace content\modelo;

	use content\config\conection\database as database;

	class notasModel extends database{

		private $id;
		private $idNota;
		private $saber;
		private $alumno;
		private $nota;

		public function __construct(){
			parent::__construct();
		}

		public function validarConsultar($metodo, $data="", $data2=""){
			if($metodo=="Consultar"){
				$result = self::Consultar($data, $data2);
				return $result;
			}
			if($metodo=="ConsultarNotasTutor"){
				$result = self::ConsultarNotasTutor($data);
				return $result;
			}
			if($metodo=="ConsultarNotasAlumnos"){
				$result = self::ConsultarNotasAlumnos($data);
				return $result;
			}
			if($metodo=="ConsultarAlumnos"){
				$result = self::ConsultarAlumnos($data, $data2);
				return $result;
			}
			if($metodo=="buscar"){
				$result = self::buscar($data, $data2);
				return $result;
			}
			if($metodo=="getOne"){
				$result = self::getOne($data);
				return $result;
			}
			if($metodo=="getOneId"){
				$result = self::getOneId($data);
				return $result;
			}
		}

		public function ValidarAgregarOModificar($datos, $metodo){
			$res = [];
			$return = 0;
			foreach ($datos as $campo => $valor) {
				$resExp = self::Validate($campo, $valor);
				$return += $resExp;
			}
			if($return==0){
				if($metodo=="Agregar" || $metodo=="agregar"){
					$result = self::Agregar($datos);
				}
				if($metodo=="Modificar" || $metodo=="modificar"){
					$result = self::Modificar($datos);
				}
				return $result;
			}else{
				return ['msj'=>"Invalido"];
			}
		}

		public function validarEliminar($metodo, $data){
			if($metodo=="Eliminar"){
				$result = self::Eliminar($data);
				return $result;
			}
			if($metodo=="LimpiarNotas"){
				$result = self::LimpiarNotas($data);
				return $result;
			}
		}

		private function Validate($campo, $valor){
			$pattern = [
				'0' => ['campo'=>"id",'expresion'=>'/[^a-zA-Z0-9]/'],
				'1' => ['campo'=>"id_clase",'expresion'=>'/[^0-9]/'],
				'2' => ['campo'=>"alumno",'expresion'=>'/[^0-9]/'],
				'3' => ['campo'=>"nota",'expresion'=>'/[^0-9 . ,]/'],
			];
			// $resExp = 0;
			foreach ($pattern as $exReg) {
				if($exReg['campo']==$campo){
					$resExp = preg_match_all($exReg['expresion'], $valor);
					// echo "Campo: ".$campo." | Valor: ".$valor." | ";
					// echo "ResExp: ".$resExp." | ";
					// echo "\n\n";
					return $resExp;
				}
			}
		}

		private function Consultar($cedula="", $campo="Profesores"){
			try {
				if($cedula==""){
					$query = parent::prepare("SELECT DISTINCT periodos.id_periodo, periodos.nombre_periodo, periodos.year_periodo, periodos.fecha_apertura, periodos.fecha_cierre, secciones.cod_seccion, secciones.id_periodo, secciones.nombre_seccion, secciones.trayecto_seccion, saberes.id_SC, saberes.nombreSC, saberes.trayecto_SC, saberes.fase_SC, clases.id_clase, clases.cedula_profesor FROM periodos, secciones, saberes, clases, notas, seccion_alumno WHERE periodos.id_periodo = secciones.id_periodo and secciones.cod_seccion = clases.cod_seccion and saberes.id_SC = clases.id_SC and notas.id_clase = notas.id_clase and seccion_alumno.cod_seccion = secciones.cod_seccion and seccion_alumno.id_SA = notas.id_SA and notas.id_clase = clases.id_clase and periodos.estatus = 1 and secciones.estatus = 1 and notas.estatus = 1 and clases.estatus = 1 and saberes.estatus = 1");
				}else{
					if($campo=="Profesores"){
						$query = parent::prepare("SELECT DISTINCT periodos.id_periodo, periodos.nombre_periodo, periodos.year_periodo, periodos.fecha_apertura, periodos.fecha_cierre, secciones.cod_seccion, secciones.id_periodo, secciones.nombre_seccion, secciones.trayecto_seccion, saberes.id_SC, saberes.nombreSC, saberes.trayecto_SC, saberes.fase_SC, clases.id_clase, clases.cedula_profesor FROM periodos, secciones, saberes, clases, notas, seccion_alumno WHERE periodos.id_periodo = secciones.id_periodo and secciones.cod_seccion = clases.cod_seccion and saberes.id_SC = clases.id_SC and notas.id_clase = notas.id_clase and seccion_alumno.cod_seccion = secciones.cod_seccion and seccion_alumno.id_SA = notas.id_SA and notas.id_clase = clases.id_clase and periodos.estatus = 1 and secciones.estatus = 1 and notas.estatus = 1 and clases.estatus = 1 and saberes.estatus = 1 and clases.cedula_profesor = '{$cedula}'");
					}
					if($campo=="Alumnos"){
						$query = parent::prepare("SELECT * FROM notificaciones, periodos, secciones, alumnos, saberes, clases, notas, seccion_alumno WHERE notificaciones.codigo_tabla = notas.id_nota and periodos.id_periodo = secciones.id_periodo and secciones.cod_seccion = clases.cod_seccion and saberes.id_SC = clases.id_SC and notas.id_clase = notas.id_clase and seccion_alumno.cod_seccion = secciones.cod_seccion and seccion_alumno.cedula_alumno = alumnos.cedula_alumno and seccion_alumno.id_SA = notas.id_SA and notas.id_clase = clases.id_clase and periodos.estatus = 1 and secciones.estatus = 1 and notas.estatus = 1 and clases.estatus = 1 and saberes.estatus = 1 and alumnos.cedula_alumno = '{$cedula}'");
					}
				}
				
				$respuestaArreglo = "";
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				$respuestaArreglo += ['estatus' => true];
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}

		private function ConsultarNotasTutor($cedula){
			try {
				$query = parent::prepare("SELECT DISTINCT periodos.id_periodo, periodos.nombre_periodo, periodos.year_periodo, periodos.fecha_apertura, periodos.fecha_cierre, secciones.cod_seccion, secciones.id_periodo, secciones.nombre_seccion, secciones.trayecto_seccion, saberes.id_SC, saberes.nombreSC, saberes.trayecto_SC, saberes.fase_SC, clases.id_clase, clases.cedula_profesor, proyectos.cod_proyecto, proyectos.titulo_proyecto, proyectos.trayecto_proyecto, proyectos.cedula_profesor FROM periodos, secciones, saberes, clases, notas, seccion_alumno, grupos, proyectos WHERE periodos.id_periodo = secciones.id_periodo and secciones.cod_seccion = clases.cod_seccion and saberes.id_SC = clases.id_SC and notas.id_clase = notas.id_clase and seccion_alumno.cod_seccion = secciones.cod_seccion and seccion_alumno.id_SA = notas.id_SA and notas.id_clase = clases.id_clase and periodos.estatus = 1 and secciones.estatus = 1 and notas.estatus = 1 and clases.estatus = 1 and saberes.estatus = 1 and seccion_alumno.id_SA = grupos.id_SA and grupos.cod_proyecto = proyectos.cod_proyecto and proyectos.cedula_profesor = '{$cedula}'");
				// $query = parent::prepare("SELECT * FROM periodos, secciones, saberes, clases, notas, seccion_alumno, grupos, proyectos WHERE proyectos.cod_proyecto = grupos.cod_proyecto and grupos.id_SA = seccion_alumno.id_SA and periodos.id_periodo = secciones.id_periodo and secciones.cod_seccion = clases.cod_seccion and saberes.id_SC = clases.id_SC and notas.id_clase = notas.id_clase and seccion_alumno.cod_seccion = secciones.cod_seccion and seccion_alumno.id_SA = notas.id_SA and notas.id_clase = clases.id_clase and periodos.estatus = 1 and secciones.estatus = 1 and notas.estatus = 1 and clases.estatus = 1 and saberes.estatus = 1 and proyectos.cedula_profesor = '{$cedula}'");
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

		private function ConsultarNotasAlumnos($cod_seccion=""){
			
			try {
				if($cod_seccion==""){
					$query = parent::prepare("SELECT * FROM alumnos, seccion_alumno, notas WHERE alumnos.cedula_alumno = seccion_alumno.cedula_alumno and notas.id_SA = seccion_alumno.id_SA and alumnos.estatus = 1 and notas.estatus = 1 and seccion_alumno.estatus = 1");
				}else{
					$query = parent::prepare("SELECT DISTINCT clases.id_clase, clases.id_SC, clases.cod_seccion, clases.cedula_profesor, clases.estatus FROM alumnos, seccion_alumno, notas, clases WHERE alumnos.cedula_alumno = seccion_alumno.cedula_alumno and notas.id_SA = seccion_alumno.id_SA and alumnos.estatus = 1 and notas.estatus = 1 and seccion_alumno.estatus = 1 and notas.id_clase = clases.id_clase and seccion_alumno.cod_seccion = '{$cod_seccion}'");
				}
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				if($cod_seccion==""){
					$respuestaArreglo += ['estatus' => true];
				}
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}

		private function ConsultarAlumnos($cod_seccion="", $id_SC=""){
			try {
				if($cod_seccion!="" && $id_SC!=""){
					$query = parent::prepare("SELECT * FROM alumnos, seccion_alumno,secciones, clases, saberes WHERE alumnos.cedula_alumno=seccion_alumno.cedula_alumno and seccion_alumno.cod_seccion = secciones.cod_seccion and secciones.cod_seccion = clases.cod_seccion and clases.id_SC = saberes.id_SC and secciones.estatus = 1 and clases.estatus = 1 and alumnos.estatus = 1 and secciones.cod_seccion = '{$cod_seccion}' and saberes.id_SC = {$id_SC}");
				}else{
					$query = parent::prepare('SELECT * FROM alumnos, seccion_alumno WHERE alumnos.cedula_alumno = seccion_alumno.cedula_alumno and alumnos.estatus = 1');
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
		
		// private function getOne($idnota){
		private function getOne($id){
		      try {
		    	// $query = parent::prepare('SELECT * FROM notas WHERE id_nota = :idnota');
		    	// $respuestaArreglo = '';
		     //    $query->execute([':idnota'=>$idnota]);
		      	$query = parent::prepare('SELECT * FROM notas WHERE id_clase = :id_clase');
		    	$respuestaArreglo = '';
		        $query->execute([':id_clase'=>$id]);

		        $respuestaArreglo = $query->fetchAll();
		        if ($respuestaArreglo += ['estatus' => true]) {
		        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
		        	$Result['data'] = ['ejecucion'=>true];
		        	if(count($respuestaArreglo)>1){
		        		$Result['data'] = $respuestaArreglo;
		        	}
					// echo json_encode($Result);
					return $Result;
		        }
		       //return $respuestaArreglo;
		      //require_once 'Vista/usuarios.php';
		      } catch (PDOException $e) {
		        $errorReturn = ['estatus' => false];
		        $errorReturn += ['info' => "error sql:{$e}"];
		        return $errorReturn;
		      }
	    }

	    private function buscar($idClase, $idSA){
		      try {
		    	$query = parent::prepare('SELECT * FROM notas WHERE id_clase = :idClase and id_SA = :idSA');
		    	$respuestaArreglo = '';
		        $query->execute(['idClase'=>$idClase, 'idSA'=>$idSA]);
		        $respuestaArreglo = $query->fetchAll();
		        if ($respuestaArreglo += ['estatus' => true]) {
		        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
		        	$Result['data'] = ['ejecucion'=>true];
		        	if(count($respuestaArreglo)>1){
		        		$Result['data'] = $respuestaArreglo;
		        	}
					// echo json_encode($Result);
					return $Result;
		        }
		       //return $respuestaArreglo;
		      //require_once 'Vista/usuarios.php';
		      } catch (PDOException $e) {
		        $errorReturn = ['estatus' => false];
		        $errorReturn += ['info' => "error sql:{$e}"];
		        return $errorReturn;
		      }
	    }

	    private function ConsultaPK($idNota){
			try {
				$query = parent::prepare("SELECT * FROM notas WHERE estatus = 1 and id_nota LIKE '%{$idNota}%'");
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				$respuestaArreglo += ['estatus' => true];
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}
		
		private function Agregar($datos){

			try{
			// echo $datos['id'];
	        $query = parent::prepare("INSERT INTO notas (id_nota, id_clase, id_SA, nota, fecha_nota, hora_nota, estatus) VALUES (:id_nota, :id_clase, :id_SA, :nota, :fecha, :hora, 1)");
	        $query->bindValue(':id_nota', $datos['id']);
	        $query->bindValue(':id_clase', $datos['id_clase']);
	        $query->bindValue(':id_SA', $datos['alumno']);
	        $query->bindValue(':nota', $datos['nota']);
	        $query->bindValue(':fecha', date('Y-m-d'));
	        $query->bindValue(':hora', date('h:i a'));

	        $query->execute();
	        $respuestaArreglo = $query->fetchAll();
	        /*print_r($datos['id']);
	        print_r($respuestaArreglo);
	        */
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
		
		private function Modificar($datos){

			try{
	        $query = parent::prepare('UPDATE notas SET nota=:nota, estatus=1 WHERE id_nota = :id_nota');
	        $query->bindValue(':nota', $datos['nota']);
	        $query->bindValue(':id_nota', $datos['id']);
	        $query->execute();
	        $respuestaArreglo = $query->fetchAll();
	        if ($respuestaArreglo += ['estatus' => true]) {
	        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
	        }
	      } catch(PDOException $e){

	        $errorReturn = ['estatus' => false];
	      		$errorReturn['msj'] = "Error";
		        $errorReturn += ['info' => "Error sql:{$e}"];
		        return $errorReturn; 
	      }
		}

		private function Eliminar($id){
			try {
	        // $query = parent::prepare('UPDATE notas SET nota = 0 WHERE id_clase = :id');
	        $query = parent::prepare('UPDATE notas SET estatus = 0 WHERE id_clase = :id');
	        $query->execute(['id'=>$id]);
	        $query->setFetchMode(parent::FETCH_ASSOC);
	        $respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
	        if ($respuestaArreglo += ['estatus' => true]) {
	        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
	        }
	        }
	        catch (PDOException $e)
	        {
	            $errorReturn = ['estatus' => false];
	      		$errorReturn['msj'] = "Error";
	        $errorReturn += ['info' => "Error sql:{$e}"];
	        return $errorReturn; ;
	        }
		}

		private function LimpiarNotas($id_clase){
			try {
	        $query = parent::prepare('DELETE FROM notas WHERE id_clase = :id');
	        $query->execute(['id'=>$id_clase]);
	        $query->setFetchMode(parent::FETCH_ASSOC);
	        $respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC);
	        if ($respuestaArreglo += ['estatus' => true]) {
	        	$Result = array('msj' => "Good");		//Si todo esta correcto y consigue al usuario
				return $Result;
	        }
	        }
	        catch (PDOException $e)
	        {
	            $errorReturn = ['estatus' => false];
	      		$errorReturn['msj'] = "Error";
	        $errorReturn += ['info' => "Error sql:{$e}"];
	        return $errorReturn; ;
	        }
		}

		public function ExtraerPK($idNota){
			// echo $idNota." --- ";
			$numss = $this::ConsultaPK($idNota);
			// print_r($numss);
			$numMax = 0;
			if(count($numss)>1){
				$len = strlen($idNota);
				// echo $len;
				foreach ($numss as $key) {
					if(!empty($key['id_nota'])){
						$n = substr($key['id_nota'], $len);
						if($n > $numMax){
							$numMax = $n;
						}
					}
				}
			}
			$numero_pago = $numMax+1;
			// echo $numero_pago;
			$idNota .= $numero_pago;
			return $idNota;
		}
	}

?>
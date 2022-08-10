<?php
 
	namespace content\modelo;

	use content\config\conection\database as database;

	class clasesModel extends database{

		private $id;
		private $idClase;
		private $saber;
		private $profesor;
		private $nota;



		public function __construct(){
			// $this->con = parent::__construct();
			parent::__construct();
		}


		public function Consultar($cod_seccion=""){
			try {
				if($cod_seccion==""){
					$query = parent::prepare("SELECT * FROM clases, saberes, secciones, profesores WHERE clases.cedula_profesor = profesores.cedula_profesor and clases.cod_seccion = secciones.cod_seccion and clases.id_SC = saberes.id_SC and clases.estatus = 1 and profesores.estatus = 1 and secciones.estatus = 1 and saberes.estatus = 1");
				}
				if($cod_seccion!=""){
					$query = parent::prepare("SELECT * FROM clases, saberes, secciones, profesores WHERE clases.cedula_profesor = profesores.cedula_profesor and clases.cod_seccion = secciones.cod_seccion and clases.id_SC = saberes.id_SC and clases.estatus = 1 and profesores.estatus = 1 and secciones.estatus = 1 and saberes.estatus = 1 and secciones.cod_seccion = '{$cod_seccion}'");
				}
				$respuestaArreglo = '';
				$query->execute();
				$query->setFetchMode(parent::FETCH_ASSOC);
				$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
				// $respuestaArreglo += ['estatus' => true];
				return $respuestaArreglo;
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];
				return $errorReturn;
			}
		}


		// public function ConsultarProfesores(){
		// 	try {
		// 		$query = parent::prepare('SELECT * FROM profesores WHERE estatus = 1');
		// 		$respuestaArreglo = '';
		// 		$query->execute();
		// 		$query->setFetchMode(parent::FETCH_ASSOC);
		// 		$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
		// 		$respuestaArreglo += ['estatus' => true];
		// 		return $respuestaArreglo;
		// 	} catch (PDOException $e) {
		// 		$errorReturn = ['estatus' => false];
		// 		$errorReturn += ['info' => "error sql:{$e}"];
		// 		return $errorReturn;
		// 	}
		// }


		// public function ConsultarSecciones(){
			
		// 	try {
		// 		$query = parent::prepare('SELECT * FROM secciones WHERE estatus = 1');
		// 		$respuestaArreglo = '';
		// 		$query->execute();
		// 		$query->setFetchMode(parent::FETCH_ASSOC);
		// 		$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
		// 		$respuestaArreglo += ['estatus' => true];
		// 		return $respuestaArreglo;
		// 	} catch (PDOException $e) {
		// 		$errorReturn = ['estatus' => false];
		// 		$errorReturn += ['info' => "error sql:{$e}"];
		// 		return $errorReturn;
		// 	}
		// }

		// public function ConsultarSaberes(){
			
		// 	try {
		// 		$query = parent::prepare('SELECT * FROM saberes WHERE estatus = 1');
		// 		$respuestaArreglo = '';
		// 		$query->execute();
		// 		$query->setFetchMode(parent::FETCH_ASSOC);
		// 		$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
		// 		$respuestaArreglo += ['estatus' => true];
		// 		return $respuestaArreglo;
		// 	} catch (PDOException $e) {
		// 		$errorReturn = ['estatus' => false];
		// 		$errorReturn += ['info' => "error sql:{$e}"];
		// 		return $errorReturn;
		// 	}
		// }

		// public function ConsultarSA(){
			
		// 	try {
		// 		$query = parent::prepare('SELECT * FROM seccion_alumno WHERE estatus = 1');
		// 		$respuestaArreglo = '';
		// 		$query->execute();
		// 		$query->setFetchMode(parent::FETCH_ASSOC);
		// 		$respuestaArreglo = $query->fetchAll(parent::FETCH_ASSOC); 
		// 		$respuestaArreglo += ['estatus' => true];
		// 		return $respuestaArreglo;
		// 	} catch (PDOException $e) {
		// 		$errorReturn = ['estatus' => false];
		// 		$errorReturn += ['info' => "error sql:{$e}"];
		// 		return $errorReturn;
		// 	}
		// }




		public function getOne($datos){
			// echo $datos['saber']." - ";
			// echo $datos['seccion']." - ";
			// echo $datos['profesor']. " ";
			// echo "SELECT * FROM clases WHERE id_SC={$datos['saber']} and cod_seccion='{$datos['seccion']}' and cedula_profesor = '{$datos['profesor']}'";
		      try {
		    	$query = parent::prepare("SELECT * FROM clases WHERE id_SC={$datos['saber']} and cod_seccion='{$datos['seccion']}' and cedula_profesor = '{$datos['profesor']}'");
		    	$respuestaArreglo = '';
		        $query->execute();
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


	    public function Agregar($datos){

			try{
			// echo $datos['id'];
	        $query = parent::prepare("INSERT INTO clases (id_clase, id_SC, cod_seccion, cedula_profesor, estatus) VALUES (DEFAULT, :id_SC, :cod_seccion, :cedula_profesor, 1)");
	        /*$query->bindValue(':id_nota', $datos['id']);*/
	      /*  $query->bindValue(':id_clase', $datos['id_clase']);*/
	        // var_dump($datos['id']);
	      // $query->bindValue(':id_clase', );
	      // var_dump($datos['id']);
	        $query->bindValue(':id_SC', $datos['saber']);
	        $query->bindValue(':cedula_profesor', $datos['profesor']);
	        $query->bindValue(':cod_seccion', $datos['seccion']);

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


		public function getOneC($id){
		      try {
		    	$query = parent::prepare('SELECT * FROM clases WHERE id_clase = :id');
		    	$respuestaArreglo = '';
		        $query->execute(['id'=>$id]);
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
 


		public function Eliminar($id){
			try {
	        $query = parent::prepare('UPDATE clases SET estatus = 0 WHERE id_clase = :id');
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



			public function Modificar($datos){

			try{
	        $query = parent::prepare('UPDATE clases SET  id_SC=:id_SC, cod_seccion=:cod_seccion, cedula_profesor=:cedula_profesor, estatus=1 WHERE id_clase = :id_clase');
 		    $query->bindValue(':id_clase', $datos['id_clase']);
 		    $query->bindValue(':id_SC', $datos['saber']);
	        $query->bindValue(':cedula_profesor', $datos['profesor']);
	        $query->bindValue(':cod_seccion', $datos['seccion']);

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

			   /* public function buscar($idClase, $idSA){
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
	    }*/



	}

?>
<?php

	namespace content\modelo;

	use mysqli as mysqli;
	use content\config\conection\database as database;

	class mantenimientoModel extends database{

		private $fecha;
		private $mysqlImportFilename;
		private $mysqlRestoreFilename;

		public function __construct(){
			// $this->con = parent::__construct();
			parent::__construct();
			ini_set('date.timezone', 'america/caracas');
		    $this->fecha = date("Y-m-d__H-i-s");

		    // mkdir('../backup/');
		    // $this->mysqlImportFilename = '../backup/'._DB_WEB_."_".$this->fecha.'.sql';
		    // $this->mysqlImportFilename = ''._DB_WEB_."_".$this->fecha.'.sql';
		    $this->mysqlImportFilename = 'libs/backup/'._DB_WEB_."_".$this->fecha.'.sql';
		    // $this->mysqlRestoreFilename = 'libs/restore/'._DB_WEB_."_".$this->fecha.'.sql';
		}
		public function Consultar(){
			
			try {
				$query = parent::prepare('SELECT * FROM usuarios WHERE estatus = 1');
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

		public function Respaldar($tables = '*'){  

			$return='';
			$link = new mysqli(_HOST_,_DB_USER_,_DB_PASS_,_DB_WEB_);
			if($tables == '*'){
				$tables = array();
				$result = $link->query('SHOW TABLES');
				while($row = mysqli_fetch_row($result)){
					$tables[] = $row[0];
				}
			}else{
				$tables = is_array($tables) ? $tables : explode(',',$tables);
			}
			foreach($tables as $table){
				$result = $link->query('SELECT * FROM '.$table);
				$num_fields = mysqli_num_fields($result);
				$row2 = mysqli_fetch_row($link->query('SHOW CREATE TABLE '.$table));
				$return.= "\n\n".$row2[1].";\n\n";
				for ($i = 0; $i < $num_fields; $i++){
					while($row = mysqli_fetch_row($result)){
						$return.= 'INSERT INTO '.$table.' VALUES(';
						for($j=0; $j<$num_fields; $j++) {
							$row[$j] = addslashes($row[$j]);
							$row[$j] = preg_replace("/\n/","\\n",$row[$j]);
							if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
							if ($j<($num_fields-1)) { $return.= ','; }
						}
						$return.= ");\n";
					}
				}
				$return.="\n\n\n";
			}
			try{

				$handle = fopen($this->mysqlImportFilename,'w+');
				fwrite($handle,$return);
				fclose($handle);
				$response = $this->mysqlImportFilename;
				$response = './libs/backup/'._DB_WEB_."_".$this->fecha.'.sql';
				// $response = '/backup/'._DB_WEB_."_".$this->fecha.'.sql';
				$resul = ['ejecucion'=>true];
				$resul += ['response'=>$response];
			}catch(Exception $e){
				$resul = ['ejecucion'=>false];
			}
			return $resul;
		}

		public function Restaurar($file){
			$cnn = new mysqli(_HOST_,_DB_USER_,_DB_PASS_,_DB_WEB_);
			$this->mysqlRestoreFilename = $file;
			$sql = "";
			$error = "";

			$result = mysqli_query($cnn, "DROP DATABASE "._DB_WEB_);
			// print_r($result);
			// echo "  \n\n Borrar BD ".$result."  \n\n ";
			if($result){
				$result = mysqli_query($cnn, "CREATE DATABASE "._DB_WEB_);
				// echo "  \n\n CREAR BD ".$result."  \n\n ";
				if($result){
					$cnn = new mysqli(_HOST_,_DB_USER_,_DB_PASS_,_DB_WEB_);
					$lines = file($this->mysqlRestoreFilename);
					foreach ($lines as $line) {
						if(substr($line, 0, 2) == '--' || $line == ''){
							continue;
						}
						$sql .= $line;
						if(substr(trim($line), -1, 1)==';'){
							$result = mysqli_query($cnn, $sql);
							if(!$result){
								$error .= mysqli_error($cnn)."\n";
							}
							$sql = '';
						}
					} // end foreach
					if($error){
						$response = array("type"=>"error", "message"=>$error, "stat"=>2);
					}else{
						$response = array("type"=>"success", "message"=>"Base de datos restaurada correctamente", "stat"=>1);
					}
				}else{
					$response = array("type"=>"error", "message"=>"No se creo la base de datos", "stat"=>3);
				}
			}else{
				$response = array("type"=>"error", "message"=>"No se elimino la base de datos actual", "stat"=>4);
			}
			
			$response['exec'] = "restore";
			
			return $response;
		}

		public function BorrarFile($file){
			// unset($file);
			echo 'asd';
		}

	}

?>
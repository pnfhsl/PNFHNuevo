<?php

namespace content\modelo;

use mysqli as mysqli;
use content\config\conection\database as database;

class bloqueoModel extends database{

    private $fecha;
    private $mysqlImportFilename;
    private $mysqlRestoreFilename;

    public function __construct(){
        parent::__construct();
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
 
    }


    

?>
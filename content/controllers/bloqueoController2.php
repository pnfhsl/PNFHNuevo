<?php

namespace content\controllers;

use config\settings\sysConfig as sysConfig;
use content\component\headElement as headElement;
use content\modelo\homeModel as homeModel;
    use content\modelo\bitacoraModel as bitacoraModel;
use content\modelo\bloqueoModel as bloqueoModel;
use content\modelo\preguntasModel as preguntasModel;
use content\traits\Utility;

class bloqueoController{
    use Utility;
    private $url;
    private $bloqueosU;
    private $roles;
    private $bitacora;
    
    function __construct($url){
        // if(empty($_POST['ajax'])){
            // $objModel = new homeModel;
            // $_css = new headElement;
            // $_css->Heading();
        // }
        $this->url = $url;
        $this->bloqueosU = new bloqueoModel();
        $this->preg = new preguntasModel();
        $this->bitacora = new bitacoraModel();

    }

    public function Consultar(){			
            $objModel = new homeModel;
            $_css = new headElement;
            $_css->Heading();
            $bloqueos = $this->bloqueosU->Consultar();		
            $this->bitacora->monitorear($this->url);
            $url = $this->url;
            require_once("view/bloqueoView.php");
        
    }

    public function Buscar(){
        if($_POST){		
            if (isset($_POST['Buscar']) && isset($_POST['firma'])) {
                // var_dump($_POST['firma']);
                $buscar = $this->bloqueosU->FirmaD($_POST['firma']);
                // $idRol = $buscar[0]['id_rol'];
                // $rol = $this->roles->getOneId($idRol);

                // var_dump($rol['data'][0]['nombre_rol']);
                // var_dump($buscar[0]['id_rol']);
                // var_dump($buscar[0]['cedula_usuario']);
                // if($rol['data'][0]['nombre_rol'] === 'Alumnos'){
                //     $alumno = $this->bloqueosU->BusquedaAlumno($buscar[0]['cedula_usuario']);
                //     $resp = array('alumno' =>  $alumno);
                //     // var_dump($rol);
                // }
                // if($rol['data'][0]['nombre_rol'] === 'Profesores'){
                //     $profesor = $this->bloqueosU->BusquedaProfesor($buscar[0]['cedula_usuario']);
                //     $resp = array('profesor' =>  $profesor);
                //     // var_dump($rol);
                // }
                    $resp = array('datos' =>  $buscar);
                echo json_encode($resp);
            }

        }
    }

    public function Generar(){
        if($_POST){		
            if (isset($_POST['Generar']) && isset($_POST['public']) && isset($_POST['usuarioG']) ) {
                $codigo = $this->codigoAleatorio('A', 6, 0);        //Generar código aleatorio
                $encrypt = $this->bloqueosU->Encrypt($codigo, $this->desencriptar($_POST['public']));   //Encriptar codigo aleatorio mediante la llave publica
                $codigoDesbloqueo = $this->bloqueosU->CodigoDesbloqueo($encrypt, $_POST['usuarioG']);  //Guardar codigo encriptado en la bd
                // var_dump($codigo);
                // var_dump($encrypt);
                // var_dump($codigoDesbloqueo);
                // $buscar = $this->bloqueosU->FirmaD($_POST['firma']);
                // var_dump($buscar[0]["llave_publica"]);
                // var_dump($_POST['public']);
                // if($buscar[0]["llave_publica"] != $_POST['public']){
                //     var_dump('holaaa');
                // }
                // $resp = array('rsa' => $buscar[0]["llave_publica"]);
                // $encrypt = $this->bloqueosU->Encrypt($codigo, $this->desencriptar($buscar[0]["llave_publica"]));
                // var_dump($encrypt);
                // $resp = array('encrypt' =>  $encrypt, 'llave' => $this->desencriptar($_POST['public']));
                $resp = array('encrypt' =>  $encrypt, 'result' => $codigoDesbloqueo);
                echo json_encode($resp);
            }

        }
    }
    
    public function Desbloquear(){
        if($_POST){		
            if (isset($_POST['Desbloquear']) && isset($_POST['codigo']) && isset($_POST['private']) && isset($_POST['firma']) && isset($_POST['cedula'])) {
                // $this->bitacora->monitorear($this->url);

    
                $desencrypt = $this->desencriptar($_POST['private']);
                // $buscar = $this->bloqueosU->FirmaD($_POST['firma']);
                // $ci = '15432287';
                $ci = $_POST['cedula'];
                $busqueda = $this->bloqueosU->BuscarCodigo($ci);
                // var_dump($_POST['codigo']);
                // var_dump($busqueda[0]['codigo_desbloqueo']);
                $decrypt = $this->bloqueosU->Decrypt($_POST['codigo'], $desencrypt);   //Encriptar codigo aleatorio mediante la llave publica
                $code = $this->bloqueosU->Decrypt($busqueda[0]['codigo_desbloqueo'], $desencrypt);   //Encriptar codigo aleatorio mediante la llave publica
                // $code = $this->bloqueosU->Decrypt($buscar[0]['codigo_desbloqueo'], $desencrypt);   //Encriptar codigo aleatorio mediante la llave publica
                if ($decrypt === $code) {
                    $unlook = $this->bloqueosU->Unlook($_POST['cedula'], 0);
                    $preguntas = $this->preg->Eliminar($_POST['cedula']); 
                }
                $resp = array('decrypt' =>  $decrypt, 'code' => $code, 'look' => $unlook, 'preg' => $preguntas);
                // $resp = array('decrypt' =>  $decrypt, 'code' => $code);
                echo json_encode($resp);
            }

        }
    }


}
    

?>
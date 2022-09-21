<?php

namespace content\controllers;

use config\settings\sysConfig as sysConfig;
use content\component\headElement as headElement;
use content\modelo\homeModel as homeModel;
use content\modelo\bloqueoModel as bloqueoModel;
use content\modelo\preguntasModel as preguntasModel;
use content\traits\Utility;

class bloqueoController
{
    use Utility;
    private $url;
    private $bloqueosU;
    private $roles;
    function __construct($url)
    {
        $this->url = $url;
        $this->bloqueosU = new bloqueoModel();
        $this->preg = new preguntasModel();
    }

    public function Consultar()
    {
        $objModel = new homeModel;
        $_css = new headElement;
        $_css->Heading();
        $bloqueos = $this->bloqueosU->Consultar();
        $url = $this->url;
        require_once("view/bloqueoView.php");
    }

    public function Buscar()
    {
        if ($_POST) {
            if (isset($_POST['Buscar']) && isset($_POST['firma'])) {
                $buscar = $this->bloqueosU->FirmaD($_POST['firma']);
                $resp = array('datos' =>  $buscar);
                echo json_encode($resp);
            }
        }
    }

    public function VerificarCodigo()
    {
        if ($_POST) {
            if (isset($_POST['Verificar']) && isset($_POST['usuarioD'])) {
                $verificar = $this->bloqueosU->BuscarCodigo($_POST['usuarioD']);
                $resp = array('datos' =>  $verificar);
                echo json_encode($resp);
            }
        }
    }
    public function VerificarClave()
    {
        if ($_POST) {
            if (isset($_POST['Verificar']) && isset($_POST['cedula'])) {
                $verificar = $this->bloqueosU->BuscarCodigo($_POST['cedula']);
                $resp = array('date' =>  $verificar);
                echo json_encode($resp);
            }
        }
    }

    public function Generar()
    {
        if ($_POST) {
            if (isset($_POST['Generar']) && isset($_POST['public']) && isset($_POST['usuarioG'])) {
                $codigo = $this->codigoAleatorio('A', 6, 0);        //Generar código aleatorio
                $encrypt = $this->bloqueosU->Encrypt($codigo, $this->desencriptar($_POST['public']));   //Encriptar codigo aleatorio mediante la llave publica
                $codigoDesbloqueo = $this->bloqueosU->CodigoDesbloqueo($encrypt, $_POST['usuarioG']);  //Guardar codigo encriptado en la bd
                $resp = array('encrypt' =>  $encrypt, 'result' => $codigoDesbloqueo);
                echo json_encode($resp);
            }
        }
    }

    public function Desbloquear()
    {
        if ($_POST) {
            if (isset($_POST['Desbloquear']) && isset($_POST['codigo']) && isset($_POST['private']) && isset($_POST['firma']) && isset($_POST['cedula'])) {
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
                if ($decrypt != "" && $code != "" && $decrypt != NULL && $code != NULL && $decrypt === $code) {
                    $unlook = $this->bloqueosU->Unlook($_POST['cedula'], 0, $this->encriptar($_POST['cedula']));
                    $preguntas = $this->preg->Eliminar($_POST['cedula']);
                    $rsa = $this->bloqueosU->Eliminar($_POST['cedula']);
                }
                $resp = array('decrypt' =>  $decrypt, 'code' => $code, 'look' => $unlook, 'preg' => $preguntas, 'rsa' => $rsa);
                // $resp = array('decrypt' =>  $decrypt, 'code' => $code);
                echo json_encode($resp);
            }
        }
    }
}

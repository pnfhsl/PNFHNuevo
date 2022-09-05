<!DOCTYPE html>
<html>

<head>
    <title><?php echo _NAMESYSTEM_; ?> | <?php if (!empty($action)) {
                                                echo $action;
                                            } ?> <?php if (!empty($url)) {
                                                        echo $url;
                                                    } ?></title>
    <?php //require_once('assets/headers.php'); 
    ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php require_once('assets/top_menu.php'); ?>

        <?php require_once('assets/menu.php'); ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- <section class="content-header" style="background:#FFF;padding-bottom:10px;border-bottom:2px solid #05A"> -->
            <section class="content-header">
                <!--  -->
                <h1>
                    <?php echo $url; ?>
                    <!-- <small><?php echo "Ver " . $url; ?></small> -->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= _ROUTE_ . $this->encriptar("Home"); ?>"><i class="fa fa-dashboard"></i> Inicio </a></li>
                    <li><a href="<?= _ROUTE_ . $this->encriptar("Clases"); ?>"><?php echo $url; ?></a></li>
                    <!-- <li class="active"><?php if (!empty($action)) {
                                                echo $action;
                                            }
                                            echo " " . $url; ?></li> -->
                </ol>
            </section>

            <br>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- /.box -->
                        <div class="box">
                            <div class="box-header">
                                <div class="col-xs-12 col-sm-6">
                                    <img src="assets/img/logolista.png" style="width:25px;">
                                    <h3 class="box-title"><?php echo "" . $url . ""; ?></h3>
                                </div>
                                <div class="col-xs-12 col-sm-6" style="text-align:right">

                                    <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">

                                </div>
                            </div>




                            <!-- /.box-header -->

                            <div class="box-body ">
                                <div class="table-responsive">

                                    <table id="" class="datatable table table-striped text-center" style="text-align:center;width:100%;font-size:1em;">
                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Cédula</th>
                                                <th>User</th>
                                                <th>Correo</th>
                                                <th>Rol</th>
                                                <th>Acciones</th>
                                                <?php //endif 
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $num = 1;
                                            foreach ($bloqueos as $data) :
                                                if (!empty($data['cedula_usuario'])) :
                                            ?>
                                                    <tr>
                                                        <td style="width:5%">
                                                            <span class="contenido2">
                                                                <?php echo $num++; ?>
                                                            </span>
                                                        </td>


                                                        <td style="width:20%">
                                                            <span class="contenido2">
                                                                <?php echo $data['cedula_usuario']; ?>
                                                            </span>
                                                        </td>
                                                        <td style="width:20%">
                                                            <span class="contenido2">
                                                                <?php echo $data['nombre_usuario']; ?>
                                                            </span>
                                                        </td>
                                                        <td style="width:20%">
                                                            <span class="contenido2">
                                                                <?php echo $data['correo']; ?>
                                                            </span>
                                                        </td>
                                                        <td style="width:20%">
                                                            <span class="contenido2">
                                                                <?php echo $data['nombre_rol']; ?>
                                                            </span>
                                                        </td>

                                                        <?php //if ($amUsuariosE==1||$amUsuariosB==1): 
                                                        ?>
                                                        <td style="width:10%">
                                                            <!-- <table style="background:none;text-align:center;width:100%"> -->
                                                            <!-- <tr> -->
                                                            <?php //if ($amUsuariosB==1): 
                                                            ?>
                                                            <button class="btn generar usuarioG" id="usuarioG" style="border:0;background:none;color:#04a7c9;" data-toggle="modal" data-target="#modalAdmin" value="<?php echo $data['cedula_usuario']; ?>">
                                                                <span class="fa fa-link" title="Generar "></span>
                                                            </button>
                                                            <input type="hidden" id="myInput" value="<?php print_r($_SESSION['accesos_usuario'][0]['nombre_rol']); ?>">
                                                            <!-- <input type="text" id="myInputDos" class="myInputDos"> -->
                                                            
                                                            <div id="modalAdmin" class="modalAdmin modal fade" role="dialog">

                                                                <div class="modal-dialog tamModals" style="text-align:left;">

                                                                    <div class="modal-content">

                                                                        <!-- <form role="form" method="post" enctype="multipart/form-data"> -->



                                                                        <div class="modal-header" style="background:#3c8dbc;color:white">

                                                                            <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                                                                            <h4 class="modal-title" style="text-align: left;">Generar Código</h4>

                                                                        </div>


                                                                        <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                                                            <div class="box-body">

                                                                                <!-- ENTRADA PARA EL USUARIO -->
                                                                                <div class="row">

                                                                                    <div class="form-group col-xs-12 col-sm-12">
                                                                                        <label for="cedula">Firma Digital</label>
                                                                                        <div class="input-group" style="width:100%;">
                                                                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                                                                            <input type="text" class="form-control input-lg" name="firma" id="firmaAdmin" placeholder="Firma digital del operador" required>
                                                                                            <span class="input-group-addon cont" id="verifyAdmin" style="width:5%;"><a href="#"><i class="fa fa-check-circle" style="color:#04a7c9"></i></a></span>
                                                                                        </div>
                                                                                        <div style="width:100%;text-align:right;">
                                                                                            <span id="cedulaS" class="mensajeError"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- <input type="hidden" id="cedulaH" value="<?php echo $_SESSION['cuenta_persona']['cedula']; ?>"> -->
                                                                                    <!-- <input type="text" id="cedulaH"  value="<?php echo $data['nombre_usuario']; ?>">   -->


                                                                                    <!-- <button class="btn btn-primary cont" style="width:90%;margin-left:5%;margin-right:5%;" id="cont" value=""><span class="text-center">Contraseña</span></button> -->
                                                                                    <button class="btn btn-primary contadorBoxPassword" style="width:90%;margin-left:5%;margin-right:5%;display:none" id="cont" value="" data-toggle="collapse" data-target="#collapseOneAdmin" aria-expanded="false" aria-controls="collapseOneAdmin"><span class="text-center">Contraseña</span></button>
                                                                                    </br>
                                                                                    </br>
                                                                                    <input type="hidden" value="0" class="optpass">
                                                                                    <div class="collapse" id="collapseOneAdmin" aria-labelledby="headingOne" data-parent="#accordion">
                                                                                        <div>

                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group col-sm-3"></div>
                                                                                                <div class="form-group col-xs-12 col-sm-6">
                                                                                                    <br>
                                                                                                    <div>
                                                                                                        <div class="col-sm-3"><b>Cédula:</b></div><span id="cedulaAdmin" class="col-sm-3"></span>
                                                                                                    </div><br>
                                                                                                    <div>
                                                                                                        <div class="col-sm-3"><b>Nombre:</b></div><span id="nombreAdmin" class="col-sm-3"></span>
                                                                                                    </div><br>
                                                                                                    <div>
                                                                                                        <div class="col-sm-3"><b>Apellido:</b></div><span id="apellidoAdmin" class="col-sm-3"></span>
                                                                                                    </div><br>
                                                                                                    <div>
                                                                                                        <div class="col-sm-3"><b>Teléfono:</b></div><span id="telefAdmin" class="col-sm-3"></span>
                                                                                                    </div><br>
                                                                                                </div>
                                                                                                <!-- <br><br><br><br><br><br><br><br> -->
                                                                                                <span id="clave_public"></span>
                                                                                                <br><br>
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-group col-sm-1"></div>
                                                                                                    <div class="form-group col-xs-12 col-sm-10">
                                                                                                        <label for="nombre">Clave Pública</label>
                                                                                                        <div class="input-group" style="width:100%;">
                                                                                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-key"></i></span>
                                                                                                            <textarea class="form-control" rows="3" id="publicAdmin" style="min-width:100%;max-width:20vh;max-height:15vh;min-height:8vh;" placeholder="Ingresar clave pública"></textarea>
                                                                                                            <span class="input-group-addon" id="comprobarAdmin" style="width:5%;"><a href="#"><i class="fa fa-undo" style="color:#04a7c9"></i></a></span>
                                                                                                        </div>
                                                                                                        <div style="width:100%;text-align:right;">
                                                                                                            <span id="nombreS" class="mensajeError"></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <!-- <textarea cols='80' rows='4' id="copiar">                                                                                                   
                                                                                                    Texto a copiar
                                                                                                </textarea><br>
                                                                                                <button type="button" id="copyClip" data-clipboard-target="#copiar">Copiar texto</button> -->


                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-group col-sm-1"></div>
                                                                                                    <div class="form-group col-xs-12 col-sm-10">
                                                                                                        <label for="nombre">Código</label>
                                                                                                        <div class="input-group" style="width:100%;">
                                                                                                            <!-- <textarea class="form-control" rows="3" id="privateAdmin" style="max-width: 100%;" placeholder="Ingresar clave privada"></textarea> -->

                                                                                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                                            <input type="text" class="form-control input-lg" name="codigo" id="codigoAdmin" placeholder="Código generado">
                                                                                                            <span class="input-group-addon" id="copyClip" data-clipboard-target="#codigoAdmin" style="width:5%;"><a href="#"><i class="fa fa-clipboard" style="color:#04a7c9"></i></a></span>
                                                                                                        </div>
                                                                                                        <div style="width:100%;text-align:right;">
                                                                                                            <span id="nombreS" class="mensajeError"></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>

                                                                                        </div>
                                                                                    </div>

                                                                                </div>


                                                                                <div class="modal-footer">

                                                                                    <!-- <span type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</span>

                                                                            <span type="submit" class="btn btn-primary" id="desbloquear">Desbloqueo</span> -->

                                                                                </div>


                                                                                <!-- </form> -->

                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <td style="width:50%"> -->
                                                            <button class="btn desbloq" id="usuarioD" style="border:0;background:none;color:red;" data-toggle="modal" data-target="#modalOperador" value="<?php echo $data['cedula_usuario']; ?>">
                                                                <span class="fa fa-unlock" title="Desbloqueo"></span>
                                                            </button>
                                                            <!-- </td> -->
                                                            <?php //endif; 
                                                            ?>


                                                            <!-- </td> -->
                                                            <?php //endif; 
                                                            ?>
                                                            <!-- </tr> -->
                                                            <!-- </table> -->
                                                        </td>
                                                        <?php //endif 
                                                        ?>



                                                        <div id="modalOperador" class="modalOperador modal fade" role="dialog">

                                                            <div class="modal-dialog tamModals" style="text-align:left;">

                                                                <div class="modal-content">

                                                                    <!-- <form role="form" method="post" enctype="multipart/form-data"> -->



                                                                    <div class="modal-header" style="background:#3c8dbc;color:white">

                                                                        <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                                                                        <h4 class="modal-title" style="text-align: left;">Desbloqueo</h4>

                                                                    </div>


                                                                    <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                                                        <div class="box-body">

                                                                            <!-- ENTRADA PARA EL USUARIO -->
                                                                            <div class="row">

                                                                                <div class="form-group col-xs-12 col-sm-12">
                                                                                    <label for="cedula">Firma Digital</label>
                                                                                    <div class="input-group" style="width:100%;">
                                                                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                                                                        <input type="text" class="form-control input-lg" name="firma" id="firmaOperador" placeholder="Firma digital del administrador" required>
                                                                                        <span class="input-group-addon cont" id="verifyOperador" style="width:5%;"><a href="#"><i class="fa fa-check-circle" style="color:#04a7c9"></i></a></span>
                                                                                    </div>
                                                                                    <!-- <div style="width:100%;text-align:right;">
                                                                                <span id="cedulaS" class="mensajeError"></span>
                                                                            </div> -->
                                                                                </div>
                                                                                <!-- <button class="btn btn-primary cont" style="width:90%;margin-left:5%;margin-right:5%;" id="cont" value=""><span class="text-center">Contraseña</span></button> -->
                                                                                <button class="btn btn-primary contadorBoxPassword" style="width:90%;margin-left:5%;margin-right:5%;display:none" id="" value="" data-toggle="collapse" data-target="#collapseOneOperador" aria-expanded="false" aria-controls="collapseOneOperador"><span class="text-center">Contraseña</span></button>
                                                                                </br>
                                                                                </br>
                                                                                <input type="hidden" value="0" class="optpass">
                                                                                <div class="collapse" id="collapseOneOperador" aria-labelledby="headingOne" data-parent="#accordion">
                                                                                    <div>

                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group col-sm-3"></div>
                                                                                            <div class="form-group col-xs-12 col-sm-6">
                                                                                                <br>
                                                                                                <div>
                                                                                                    <div class="col-sm-3"><b>Cédula:</b></div><span id="cedulaOperador" class="col-sm-3"></span>
                                                                                                </div><br>
                                                                                                <div>
                                                                                                    <div class="col-sm-3"><b>Nombre:</b></div><span id="nombreOperador" class="col-sm-3"></span>
                                                                                                </div><br>
                                                                                                <div>
                                                                                                    <div class="col-sm-3"><b>Apellido:</b></div><span id="apellidoOperador" class="col-sm-3"></span>
                                                                                                </div><br>
                                                                                                <div>
                                                                                                    <div class="col-sm-3"><b>Teléfono:</b></div><span id="telefOperador" class="col-sm-3"></span>
                                                                                                </div><br>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group col-sm-1"></div>
                                                                                                <div class="form-group col-xs-12 col-sm-10">
                                                                                                    <label for="nombre">Código</label>
                                                                                                    <div class="input-group" style="width:100%;">
                                                                                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                                        <input type="text" class="form-control input-lg" name="codigo" id="codigoOperador" placeholder="Ingresar código" required>
                                                                                                    </div>
                                                                                                    <div style="width:100%;text-align:right;">
                                                                                                        <!-- <span id="nombreS" class="mensajeError"></span> -->
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group col-sm-1"></div>
                                                                                                <div class="form-group col-xs-12 col-sm-10">
                                                                                                    <label for="nombre">Clave Privada</label>
                                                                                                    <div class="input-group" style="width:100%;">
                                                                                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-key"></i></span>
                                                                                                        <textarea class="form-control" rows="3" id="privateOperador" style="min-width:100%;max-width:20vh;max-height:15vh;min-height:8vh;" placeholder="Ingresar clave privada"></textarea>
                                                                                                        <!-- <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>                                                                 -->
                                                                                                        <!-- <input type="text" class="form-control input-lg" name="codigo" id="codigo" placeholder="Ingresar clave privada" required> -->
                                                                                                    </div>
                                                                                                    <div style="width:100%;text-align:right;">
                                                                                                        <!-- <span id="nombreS" class="mensajeError"></span> -->
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                            </div>


                                                                            <div class="modal-footer">

                                                                                <span type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</span>

                                                                                <span type="submit" class="btn btn-primary" id="desbloquear">Desbloqueo</span>

                                                                            </div>


                                                                            <!-- </form> -->

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>


                                                    </tr>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>

                                </div>


                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require_once 'assets/footer.php'; ?>


        <?php //require_once 'assets/aside-config.php'; 
        ?>
    </div>
    <!-- ./wrapper -->




    <?php //require_once('assets/footered.php'); 
    ?>
    <?php if (!empty($response)) : ?>
        <input type="hidden" class="responses" value="<?php echo $response ?>">
    <?php endif; ?>
    <script src="<?= _THEME_ ?>/js/bloqueo.js"></script>
    <script src="<?= _THEME_ ?>/js/clipboard.min.js"></script>
</body>

</html>
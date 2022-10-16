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
<style type="text/css">
    .zmdi-upload {
        padding: 0px 10px 0px 0px;
    }

    .zmdi-upload:hover {
        color: black;
        transition: color 0.2s linear 0.2s;
    }

    .file-input__input {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .file-input__label {
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 600;
        color: #fff;
        font-size: 14px;
        padding: 10px 12px;
        background-color: #4245a8;
        box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.25);
    }
</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php require_once('assets/top_menu.php'); ?>

        <?php require_once('assets/menu.php'); ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?php echo $url; ?>
                    <small><?php echo "Ver " . $url; ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= _ROUTE_ . $this->encriptar('Home'); ?>"><i class="fa fa-dashboard"></i> Inicio </a></li>
                    <li><a href="<?= _ROUTE_ . $this->encriptar('Perfil'); ?>"><?php echo $url; ?></a></li>
                    <li class="active"><?php if (!empty($action)) {
                                            echo $action;
                                        }
                                        echo " " . $url; ?></li>
                </ol>
            </section>

            <br>


            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile user-header">
                                <img class="profile-user-img img-responsive img-circle" style="border-radius:220px;width:220px;height:220px;" src="<?=$fotoPerfil; ?>" alt="User profile picture">

                                <h3 class="profile-username text-center"> <?php echo $nombre . " " . $apellido; ?></h3>

                                <p class="text-muted text-center"><?= $_SESSION['cuenta_usuario']['nombre_rol'] ?> </p>
                                
                                <input type="hidden" id="url" value="<?= $this->encriptar('Perfil'); ?>">
                                <input type="hidden" id="url" value="<?= $this->encriptar($url); ?>">
                                <button type="submit" class="btn modificarFotoBtn btn-primary btn-block" value="<?= $_SESSION['cuenta_persona']['cedula'] ?>"><b>Cambiar</b></button>
                                <!-- <button type="submit" class="btn modificarFotoBtn btn-primary pull-right btn-block btn-sm" value="<?= $_SESSION['cuenta_persona']['cedula'] ?>">Editar</button> -->
                                <button type="button" id="modificarFotoButton<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarFoto<?= $_SESSION['cuenta_persona']['cedula'] ?>" style="display: none">Editar</button>

                                <div id="modalModificarFoto<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="modalModificarFoto modal fade modalModificarFoto<?= $_SESSION['cuenta_persona']['cedula'] ?>" role="dialog">

                                    <div class="modal-dialog tamModals" style="text-align:left;">
                                        <div class="modal-content">

                                            <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                                            <div class="modal-header" style="background:#3c8dbc; color:white">

                                                <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                                                <h4 class="modal-title" style="text-align: left;">Cambiar Imagen</h4>

                                            </div>


                                            <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                                <div class="box-body">

                                                    <div class="row">
                                                        <div class="col 16 offset-13 ">
                                                            <form role="form" method="post" enctype="multipart/form-data" id="form_data">
                                                                <div class="file-field input-field">
                                                                    <div class="btn-small amber darken-1 file-input text-center custom-input-file">
                                                                        <!-- <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i>Elige una imagen</span> -->
                                                                        <input type="file" class="file-input__input input-file" name="file[]" id="file-input">
                                                                        <label class="file-input__label" for="file-input">
                                                                            <i class="fa fa-upload zmdi zmdi-upload"></i>
                                                                            <span> Seleccionar Archivo</span></label>
                                                                        <span id="archivoSeleccionado"></span>
                                                                    </div>
                                                                    <!-- <div><img src="" alt="" id="img-foto" width="250"> </div> -->
                                                                    <!-- <div class="input-field">
                                                                        <button type="submit" class="btn-small blue" name="btn-agregar" id="btn-agregar">Agregar</button>
                                                                    </div> -->
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                                <button type="submit" class="btn btn-primary modificarButtonFoto" value="<?= $_SESSION['cuenta_persona']['cedula'] ?>" id="imagen">Enviar</button>

                                            </div>


                                            <!-- </form> -->

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">


                            <div class="box-header with-border">
                                <h3 class="box-title">Sobre mí</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> Llaves de Seguridad</strong>

                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>


                                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                                <p>
                                    <span class="label label-danger">UI Design</span>
                                    <span class="label label-success">Coding</span>
                                    <span class="label label-info">Javascript</span>
                                    <span class="label label-warning">PHP</span>
                                    <span class="label label-primary">Node.js</span>
                                </p>

                                <hr>

                                <hr>

                                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                                <p class="text-muted">Malibu, California</p>

                                <!-- <hr> -->
                                <!-- <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <style>
                                .modificarBtnContraseña:hover {
                                    cursor: pointer;
                                    border: 1px solid #DDD;
                                }
                            </style>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Datos Personales</a></li>
                                <li><a href="#timeline" data-toggle="tab">Preguntas de Seguridad</a></li>
                                <li><a data-toggle="tab" class=" modificarBtnContraseña" style="padding:10px 15px;" id="<?= $_SESSION['cuenta_persona']['cedula'] ?>"> Contraseña</a></li>
                                <!-- <li><button type="submit" class="btn modificarBtnContraseña btn-primary pull-right btn-block btn-sm" value="<?= $_SESSION['cuenta_persona']['cedula'] ?>">Editar</button></li> -->
                                <div class="col-sm-3">
                                    <!-- <button type="submit" class="btn modificarBtnContraseña btn-primary pull-right btn-block btn-sm" value="<?= $_SESSION['cuenta_persona']['cedula'] ?>">Editar</button> -->
                                    <button type="button" id="modificarButtonC<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarPerfilContraseña<?= $_SESSION['cuenta_persona']['cedula'] ?>" style="display: none">Editar</button>

                                    <div id="modalModificarPerfilContraseña<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="modalModificarPerfilContraseña modal fade modalModificarPerfilContraseña<?= $_SESSION['cuenta_persona']['cedula'] ?>" role="dialog">

                                        <div class="modal-dialog tamModals" style="text-align:left;">
                                            <div class="modal-content">

                                                <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                                                <div class="modal-header" style="background:#3c8dbc; color:white">

                                                    <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                                                    <h4 class="modal-title" style="text-align: left;">Modificar Datos</h4>

                                                </div>


                                                <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                                    <div class="box-body">

                                                        <div class="row">
                                                            <!-- ENTRADA PARA EL USUARIO -->
                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                <label for="usuario<?= $_SESSION['cuenta_usuario']['nombre_usuario'] ?>">Usuario</label>
                                                                <div class="input-group" style="width:100%;">
                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                                                    <input type="text" class="form-control input-lg " placeholder="Ingrese su usuario actual" id="usuario" required>
                                                                </div>
                                                                <!-- <div style="width:100%;text-align:right;">
                                                                               <span id="usuarioS<?= $_SESSION['cuenta_usuario']['nombre_usuario'] ?>" class="mensajeError"></span>
                                                                           </div> -->
                                                            </div>
                                                            <!-- ENTRADA DE LA CONTRASEÑA-->
                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                <label for="password<?= $_SESSION['cuenta_usuario']['password_usuario'] ?>">Contraseña</label>
                                                                <div class="input-group" style="width:100%;">
                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                                                    <input type="password" class="form-control input-lg " placeholder="Ingrese su contraseña actual" id="password" required>
                                                                    <!-- <input type="password" class="form-control" id="password" placeholder="Password" required="required" /> -->
                                                                </div>

                                                            </div>
                                                            <input type="hidden" id="cedula" value="<?php echo $ci;  ?>">
                                                            <input type="hidden" id="rol" value="<?php echo $rol;  ?>">




                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                                    <button type="submit" class="btn btn-primary modificarButtonModalC" value="<?= $_SESSION['cuenta_persona']['cedula'] ?>" id="modificar">Enviar</button>

                                                </div>


                                                <!-- </form> -->

                                            </div>

                                        </div>

                                    </div>





                                </div>





                                <div class="col-sm-3">
                                    <!-- <button type="submit" class="btn modificarBtnContraseña btn-primary pull-right btn-block btn-sm" value="<?= $_SESSION['cuenta_persona']['cedula'] ?>">Editar</button> -->
                                    <button type="button" id="modificarButtonContraseña" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarPerfilContraseñaLista<?= $_SESSION['cuenta_persona']['cedula'] ?>" style="display: none">Editar</button>

                                    <div id="modalModificarPerfilContraseñaLista<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="modalModificarPerfilContraseñaLista modal fade modalModificarPerfilContraseñaLista<?= $_SESSION['cuenta_persona']['cedula'] ?>" role="dialog">

                                        <div class="modal-dialog tamModals" style="text-align:left;">
                                            <div class="modal-content">

                                                <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                                                <div class="modal-header" style="background:#3c8dbc; color:white">

                                                    <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                                                    <h4 class="modal-title" style="text-align: left;">Modificar Datos</h4>

                                                </div>


                                                <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                                    <div class="box-body">

                                                        <div class="row">
                                                            <!-- ENTRADA PARA EL USUARIO -->
                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                <label for="username">Usuario</label>
                                                                <div class="input-group" style="width:100%;">
                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                                                    <input type="text" class="form-control input-lg " value="<?= $_SESSION['cuenta_usuario']['nombre_usuario'] ?>" name="<?= $_SESSION['cuenta_usuario']['cedula_usuario'] ?>" placeholder="Ingresar cedula" id="username" required>
                                                                    <input type="hidden" id="valusuario" class="valusuario" value="1">
                                                                </div>
                                                                <div style="width:100%;text-align:right;">
                                                                    <span id="usuarioS" class="mensajeError"></span>
                                                                </div>
                                                            </div>


                                                            <!-- ENTRADA PARA EL PASSWORD -->
                                                            <div class="form-group col-xs-12 col-sm-6">
                                                                <label for="password">Contraseña</label>
                                                                <div class="input-group" style="width:100%;">
                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-key"></i></span>

                                                                    <input type="password" class="form-control input-lg nuevoPassword" placeholder="Ingrese su contraseña actual" id="nuevoPassword" required>
                                                                </div>
                                                                <div style="width:100%;text-align:right;">
                                                                    <span id="nombreP" class="mensajeError"></span>
                                                                </div>
                                                            </div>

                                                            <!-- ENTRADA PARA CONFIRMAR EL PASSWORD -->
                                                            <div class="form-group col-xs-12 col-sm-6">
                                                                <label for="confirmarPassword">Confirmar contraseña</label>
                                                                <div class="input-group" style="width:100%;">
                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-key"></i></span>
                                                                    <input type="password" class="form-control input-lg confirmarPassword" placeholder="Ingrese su contraseña actual" id="confirmarPassword" required>
                                                                </div>
                                                                <div style="width:100%;text-align:right;">
                                                                    <span id="nombrePC" class="mensajeError"></span>
                                                                </div>
                                                            </div>


                                                            <input type="hidden" id="correoHiddenContras" value="<?= $_SESSION['cuenta_usuario']['correo']; ?>">
                                                        </div>
                                                    </div>







                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                                                        <button type="submit" class="btn btn-primary modificarButtonModalContraseñaLista" value="<?= $_SESSION['cuenta_persona']['cedula'] ?>" id="modificar">Enviar</button>
                                                    </div>
                                                    <!-- </form> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>















                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="post">
                                        <div class="user-block">
                                            <!-- <img class="img-circle img-bordered-sm" src="<?= _ROUTE_ ?>assets/img/user-3.png" alt="user image"> -->
                                            <span class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-3 control-label"><span style="color:#444"><i class="fa fa-address-card"></i> Cédula</span></label>
                                                    <div class="col-sm-9">
                                                        <hr style="margin:5px 0px;border-bottom:1px solid #ccc;border-top:0px solid #ccc;">
                                                        <a class="pull "><?php echo $ci; ?></a>
                                                        <hr style="margin:5px 0px;border-bottom:1px solid #ccc;border-top:0px solid #ccc;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-3 control-label"><span style="color:#444"><i class="fa fa-user"></i> Nombre</span></label>
                                                    <div class="col-sm-9">
                                                        <hr style="margin:5px 0px;border-bottom:1px solid #ccc;border-top:0px solid #ccc;">
                                                        <a class="pull "><?php echo $nombre; ?></a>
                                                        <hr style="margin:5px 0px;border-bottom:1px solid #ccc;border-top:0px solid #ccc;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-3 control-label"><span style="color:#444;"><i class="fa fa-user"></i> Apellido</span></label>
                                                    <div class="col-sm-9">
                                                        <hr style="margin:5px 0px;border-bottom:1px solid #ccc;border-top:0px solid #ccc;">
                                                        <a class="pull "><?php echo $apellido; ?></a>
                                                        <hr style="margin:5px 0px;border-bottom:1px solid #ccc;border-top:0px solid #ccc;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-3 control-label"><span style="color:#444;"><i class="fa fa-phone-square"></i> Teléfono</span></label>
                                                    <div class="col-sm-9">
                                                        <hr style="margin:5px 0px;border-bottom:1px solid #ccc;border-top:0px solid #ccc;">
                                                        <a class="pull "><?php echo $telef; ?></a>
                                                        <hr style="margin:5px 0px;border-bottom:1px solid #ccc;border-top:0px solid #ccc;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-3 control-label"><span style="color:#444"><i class="fa fa-envelope"></i> Correo</span></label>
                                                     <div class="col-sm-9">
                                                        <hr style="margin:5px 0px;border-bottom:1px solid #ccc;border-top:0px solid #ccc;">
                                                        <a class="pull "><?php echo $correo; ?></a>
                                                        <hr style="margin:5px 0px;border-bottom:1px solid #ccc;border-top:0px solid #ccc;">
                                                    </div>
                                                </div>
                                                <input type="hidden" id="trayecto" value="<?php echo $trayecto;  ?>">
                                            </span>
                                        </div>
                                        <!-- /.post -->

                                        <div class="form row">
                                            <div class="form-group margin-bottom-none">
                                                <div class="col-sm-9">

                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn modificarBtn btn-primary pull-right btn-block btn-sm" value="<?= $_SESSION['cuenta_persona']['cedula'] ?>">Editar</button>
                                                    <button type="button" id="modificarButton<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarPerfil<?= $_SESSION['cuenta_persona']['cedula'] ?>" style="display: none">Editar</button>

                                                    <div id="modalModificarPerfil<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="modalModificarPerfil modal fade modalModificarPerfil<?= $_SESSION['cuenta_persona']['cedula'] ?>" role="dialog">

                                                        <div class="modal-dialog tamModals" style="text-align:left;">
                                                            <div class="modal-content">
                                                                <!-- <form role="form" method="post" enctype="multipart/form-data"> -->
                                                                <div class="modal-header" style="background:#3c8dbc; color:white">
                                                                    <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>
                                                                    <h4 class="modal-title" style="text-align: left;">Modificar Perfil</h4>
                                                                </div>

                                                                <div class="modal-body" style="max-height:70vh;overflow:auto;">
                                                                    <div class="box-body">
                                                                        <div class="row">
                                                                            <!-- ENTRADA PARA EL USUARIO -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="cedula<?= $_SESSION['cuenta_persona']['cedula'] ?>"><span style='color:#444'>Cedula</span></label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                                                                    <input type="text" class="form-control input-lg cedulaModificar" maxlength="8" value="<?php echo $ci; ?>" name="<?= $_SESSION['cuenta_persona']['cedula'] ?>" placeholder="Ingresar cedula" id="cedula<?= $_SESSION['cuenta_persona']['cedula'] ?>" required>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="cedulaS<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>


                                                                            <!-- ENTRADA PARA EL NOMBRE -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="nombre<?= $_SESSION['cuenta_persona']['cedula'] ?>"><span style='color:#444'>Nombre</span></label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                    <input type="text" class="form-control input-lg nombreModificar" maxlength="25" value="<?php echo $nombre; ?>" id="nombre<?= $_SESSION['cuenta_persona']['cedula'] ?>" name="<?= $_SESSION['cuenta_persona']['cedula'] ?>" placeholder="Ingresar nombre" required>
                                                                                </div>

                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="nombreS<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="mensajeError"></span>
                                                                                </div>
                                                                                <!-- <?php echo $_SESSION['cuenta_persona']['nombre']  ?> -->
                                                                            </div>


                                                                            <!-- ENTRADA PARA EL APELLIDO -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="apellido<?= $_SESSION['cuenta_persona']['cedula'] ?>"><span style="color:#444">Apellido</span></label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                    <input type="text" class="form-control input-lg apellidoModificar apellidoModificar<?= $_SESSION['cuenta_persona']['apellido'] ?>" maxlength="25" value="<?php echo $apellido; ?>" name="<?= $_SESSION['cuenta_persona']['cedula'] ?>" id="apellido<?= $_SESSION['cuenta_persona']['cedula'] ?>" placeholder="Ingresar apellido" required>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="apellidoS<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>


                                                                            <!--ENTRADA TELÉFONO -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="telefono<?= $_SESSION['cuenta_persona']['cedula'] ?>"><span style="color:#444">Telefono</span></label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                    <input type="text" class="form-control input-lg telefonoModificar telefonoModificar<?= $_SESSION['cuenta_persona']['telefono'] ?>" maxlength="11" value="<?php echo $telef; ?>" name="<?= $_SESSION['cuenta_persona']['cedula'] ?>" id="telefono<?= $_SESSION['cuenta_persona']['cedula'] ?>" placeholder="Ingresar Nro Telefonico" required>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="telefonoS<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>


                                                                            <!--ENTRADA DEL CORREO -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="correo<?= $_SESSION['cuenta_usuario']['cedula'] ?>"><span style="color:#444">Correo</span></label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                    <input type="text" class="form-control input-lg correoModificar correoModificar<?= $_SESSION['cuenta_persona']['cedula'] ?>" maxlength="45" value="<?php echo $correo; ?>" name="<?= $_SESSION['cuenta_persona']['cedula'] ?>" id="correo<?= $_SESSION['cuenta_persona']['cedula'] ?>" placeholder="Ingrese su correo" required>
                                                                                    <input type="hidden" id="valcorreo<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="valcorreo<?= $_SESSION['cuenta_persona']['cedula'] ?>" value="1">
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="correoS<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>



                                                                        </div>


                                                                    </div>

                                                                </div>


                                                                <div class="modal-footer">

                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                                                    <button type="submit" class="btn btn-primary modificarButtonModal" value="<?= $_SESSION['cuenta_persona']['cedula'] ?>" id="modificar">Modificar</button>

                                                                </div>


                                                                <!-- </form> -->

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                    //     endif;
                                    // endforeach;
                                    // }
                                    ?>


                                    <!-- /.post -->

                                    <!-- Post -->

                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <ul class="timeline timeline-inverse">
                                        <!-- timeline time label -->

                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-envelope bg-blue"></i> <br>


                                            <div class="timeline-item">
                                                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                                                <h3 class="timeline-header"><a>Pregunta #1</a></h3>

                                                <div class="timeline-body">
                                                    <select class="form-control" id="preg_uno">
                                                        <?php
                                                        foreach ($preguntas as $data) :
                                                            if (!empty($data['id'])) :
                                                        ?>
                                                                <option value="<?php echo $_SESSION['cuenta_usuario']['respuesta'] ?>"><?php echo $data['pregunta']; ?></option>
                                                        <?php
                                                            endif;
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="timeline-footer">
                                                    <a class="btn btn-primary btn-xs">Read more</a>
                                                    <a class="btn btn-danger btn-xs">Delete</a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-user bg-aqua"></i>

                                            <div class="timeline-item">
                                                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                                                <h3 class="timeline-header"><a href="#">Pregunta #2</a></h3>

                                                <div class="timeline-body">
                                                    <select class="form-control" id="preg_uno">
                                                        <?php
                                                        foreach ($preguntas as $data) :
                                                            if (!empty($data['id'])) :
                                                        ?>
                                                                <option value="<?php echo $data['id']; ?>"><?php echo $data['pregunta']; ?></option>
                                                        <?php
                                                            endif;
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="timeline-footer">
                                                    <a class="btn btn-primary btn-xs">Read more</a>
                                                    <a class="btn btn-danger btn-xs">Delete</a>
                                                </div>
                                            </div>


                                        </li>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-comments bg-yellow"></i>

                                            <div class="timeline-item">
                                                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                                                <h3 class="timeline-header"><a href="#">Pregunta #3</a></h3>

                                                <div class="timeline-body">
                                                    <select class="form-control" id="preg_uno">
                                                        <?php
                                                        foreach ($preguntas as $data) :
                                                            if (!empty($data['id'])) :
                                                        ?>
                                                                <option value="<?php echo $data['id']; ?>"><?php echo $data['pregunta']; ?></option>
                                                        <?php
                                                            endif;
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="timeline-footer">
                                                    <a class="btn btn-primary btn-xs">Read more</a>
                                                    <a class="btn btn-danger btn-xs">Delete</a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <!-- <li class="time-label">
                                            <span class="bg-green">
                                                3 Jan. 2014
                                            </span>
                                        </li> -->
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <!-- <li>
                                            <i class="fa fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                                <div class="timeline-body">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                </div>
                                            </div>
                                        </li> -->
                                        <!-- END timeline item -->
                                        <li>
                                            <i class="fa fa-clock-o bg-gray"></i>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.tab-pane -->


                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->





        <?php require_once('assets/footer.php');
        ?>
        <?php if (!empty($response)) : ?>
            <input type="hidden" class="responses" value="<?php echo $response ?>">
        <?php endif; ?>
        <script src="<?= _THEME_ ?>/js/perfil.js"></script>
</body>

</html>
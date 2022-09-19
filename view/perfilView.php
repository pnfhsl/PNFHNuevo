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
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="<?= _ROUTE_ ?>assets/img/user-3.png" alt="User profile picture">

                                <h3 class="profile-username text-center"> <?php echo $nombre . " " . $apellido; ?></h3>

                                <p class="text-muted text-center"><?= $_SESSION['cuenta_usuario']['nombre_rol'] ?> </p>

                                <input type="hidden" id="url" value="<?= $this->encriptar('Perfil'); ?>">
                                <input type="hidden" id="url" value="<?= $this->encriptar($url); ?>">
                                <a href="#" class="btn btn-primary btn-block"><b>Cambiar</b></a>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">


                            <div class="box-header with-border">
                                <h3 class="box-title">About Me</h3>
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
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Datos Personales</a></li>
                                <li><a href="#timeline" data-toggle="tab">Preguntas de Seguridad</a></li>
                                <li><a href="#settings" data-toggle="tab">Contraseña</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">

                                    <?php
                                    // if ($_SESSION['cuenta_usuario']['nombre_rol'] === "Superusuario" || $_SESSION['cuenta_usuario']['nombre_rol'] === "Profesor") {
                                        // foreach ($resp as $data) :
                                        //     if (!empty($data['cedula_profesor'])) :

                                    ?>
                                                <!-- Post -->
                                                <!-- <?php echo $data['cedula_profesor']; ?> -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <!-- <img class="img-circle img-bordered-sm" src="<?= _ROUTE_ ?>assets/img/user-3.png" alt="user image"> -->
                                                        <span class="form-horizontal">

                                                            <div class="form-group">
                                                                <label for="inputName" class="col-sm-2 control-label"><i class="fa fa-address-card"></i> Cédula</label>

                                                                <div class="col-sm-10">
                                                                    <ul class="list-group list-group-unbordered">
                                                                        <li class="list-group-item">


                                                                            <a class="pull "> <?php echo $ci; ?></a>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">

                                                                <label for="inputName" class="col-sm-2 control-label " style="color: black;"><i class="fa fa-user"></i> Nombre</label>

                                                                <div class="col-sm-10">
                                                                    <ul class="list-group list-group-unbordered">
                                                                        <li class="list-group-item">

                                                                            <!-- <?php echo $data['nombre_profesor']; ?> -->
                                                                            <a class="pull "><?php echo $nombre; ?></a>


                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">

                                                                <label for="inputName" class="col-sm-2 control-label " style="color: black;"><i class="fa fa-user"></i> Apellido</label>

                                                                <div class="col-sm-10">
                                                                    <ul class="list-group list-group-unbordered">
                                                                        <li class="list-group-item">

                                                                            <!-- <?php echo $data['apellido_profesor']; ?> -->
                                                                            <a class="pull "><?php echo $apellido; ?></a>


                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">

                                                                <label for="inputName" class="col-sm-2 control-label " style="color: black;"><i class="fa fa-phone-square"></i> Teléfono</label>

                                                                <div class="col-sm-10">
                                                                    <ul class="list-group list-group-unbordered">
                                                                        <li class="list-group-item">

                                                                            <!-- <?php echo $data['telefono_profesor']; ?> -->
                                                                            <a class="pull "><?php echo $telef; ?></a>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- <input type="text" id="rol" value="<?= $_SESSION['cuenta_usuario']['nombre_rol'] ?>"> -->
                                                            
                                                            
                                                            <div class="form-group">

                                                                <label for="inputName" class="col-sm-2 control-label " style="color: black;"><i class="fa  fa-envelope"></i> Correo</label>

                                                                <div class="col-sm-10">
                                                                    <ul class="list-group list-group-unbordered">
                                                                        <li class="list-group-item">


                                                                            <a class="pull "><?php echo $correo;  ?></a>


                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" id="trayecto" value="<?php echo $trayecto;  ?>">


                                                    </div>
                                                    <!-- /.post -->

                                                    <!-- Post -->

                                                    <!-- <?php echo $_SESSION['cuenta_persona']['cedula'] . ' ' . $_SESSION['cuenta_persona']['nombre'] . ' ' . $_SESSION['cuenta_persona']['apellido'] . ' ' . $_SESSION['cuenta_persona']['telefono'] . ' ' . $_SESSION['cuenta_usuario']['correo'] ?> -->

                                                    <div class="form-horizontal">
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
                                                                                            <label for="cedula<?= $_SESSION['cuenta_persona']['cedula'] ?>">Cedula</label>
                                                                                            <div class="input-group" style="width:100%;">
                                                                                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                                                                                <input type="text" class="form-control input-lg cedulaModificar" maxlength="8" value="<?php echo $ci; ?>" name="<?= $_SESSION['cuenta_persona']['cedula'] ?>" placeholder="Ingresar cedula" id="cedula<?= $_SESSION['cuenta_persona']['cedula'] ?>" required>
                                                                                            </div>
                                                                                            <div style="width:100%;text-align:right;">
                                                                                                <span id="cedulaS<?= $_SESSION['cuenta_persona']['cedula'] ?>" class="mensajeError"></span>
                                                                                            </div>
                                                                                            <!-- <?php echo $_SESSION['cuenta_persona']['cedula']  ?> -->
                                                                                        </div>



                                                                                        <!-- ENTRADA PARA EL NOMBRE -->
                                                                                        <div class="form-group col-xs-12 col-sm-12">
                                                                                            <label for="nombre<?= $_SESSION['cuenta_persona']['nombre'] ?>">Nombre</label>
                                                                                            <div class="input-group" style="width:100%;">
                                                                                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                                <input type="text" class="form-control input-lg nombreModificar" maxlength="25" value="<?php echo $nombre; ?>" id="nombre<?= $_SESSION['cuenta_persona']['cedula'] ?>" name="<?= $_SESSION['cuenta_persona']['cedula'] ?>" placeholder="Ingresar nombre" required>
                                                                                            </div>

                                                                                            <div style="width:100%;text-align:right;">
                                                                                                <span id="nombreS<?= $_SESSION['cuenta_persona']['nombre'] ?>" class="mensajeError"></span>
                                                                                            </div>
                                                                                            <!-- <?php echo $_SESSION['cuenta_persona']['nombre']  ?> -->
                                                                                        </div>


                                                                                        <!-- ENTRADA PARA EL APELLIDO -->
                                                                                        <div class="form-group col-xs-12 col-sm-12">
                                                                                            <label for="apellido<?= $_SESSION['cuenta_persona']['apellido'] ?>">Apellido</label>
                                                                                            <div class="input-group" style="width:100%;">
                                                                                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                                <input type="text" class="form-control input-lg apellidoModificar apellidoModificar<?= $_SESSION['cuenta_persona']['apellido'] ?>" maxlength="25" value="<?php echo $apellido; ?>" name="<?= $_SESSION['cuenta_persona']['cedula'] ?>" id="apellido<?= $_SESSION['cuenta_persona']['cedula'] ?>" placeholder="Ingresar apellido" required>
                                                                                            </div>
                                                                                            <div style="width:100%;text-align:right;">
                                                                                                <span id="apellidoS<?= $_SESSION['cuenta_persona']['apellido'] ?>" class="mensajeError"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- <?php echo $_SESSION['cuenta_persona']['apellido']  ?> -->

                                                                                        <!--ENTRADA TELÉFONO -->
                                                                                        <div class="form-group col-xs-12 col-sm-12">
                                                                                            <label for="telefono<?= $_SESSION['cuenta_persona']['telefono'] ?>">Telefono</label>
                                                                                            <div class="input-group" style="width:100%;">
                                                                                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                                <input type="text" class="form-control input-lg telefonoModificar telefonoModificar<?= $_SESSION['cuenta_persona']['telefono'] ?>" maxlength="11" value="<?php echo $telef; ?>" name="<?= $_SESSION['cuenta_persona']['cedula'] ?>" id="telefono<?= $_SESSION['cuenta_persona']['cedula'] ?>" placeholder="Ingresar Nro Telefonico" required>
                                                                                            </div>
                                                                                            <div style="width:100%;text-align:right;">
                                                                                                <span id="telefonoS<?= $_SESSION['cuenta_persona']['telefono'] ?>" class="mensajeError"></span>
                                                                                            </div>
                                                                                            <!-- <?php echo $_SESSION['cuenta_persona']['telefono']  ?> -->

                                                                                        </div>

                                                                                        <!--ENTRADA DEL CORREO -->
                                                                                        <div class="form-group col-xs-12 col-sm-12">
                                                                                            <label for="correo<?= $_SESSION['cuenta_usuario']['correo'] ?>">Correo</label>
                                                                                            <div class="input-group" style="width:100%;">
                                                                                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                                <input type="text" class="form-control input-lg correoModificar correoModificar<?= $_SESSION['cuenta_usuario']['correo'] ?>" maxlength="11" value="<?php echo $correo; ?>" name="<?= $_SESSION['cuenta_usuario']['cedula'] ?>" id="correo<?= $_SESSION['cuenta_persona']['cedula'] ?>" placeholder="Ingrese su correo" required>
                                                                                            </div>
                                                                                            <div style="width:100%;text-align:right;">
                                                                                                <span id="correoS<?= $_SESSION['cuenta_usuario']['correo'] ?>" class="mensajeError"></span>
                                                                                            </div>
                                                                                            <!-- <?php echo $_SESSION['cuenta_usuario']['correo']  ?> -->


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

                                <div class="tab-pane" id="settings">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label "> <i class="fa fa-user"></i> Usuario </label>

                                            <div class="col-sm-10">
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item">


                                                        <a class="pull "><?= $_SESSION['cuenta_usuario']['nombre_usuario'] ?></a>


                                                </ul>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label " style="color: black;"><i class="fa fa-key"></i> Contraseña</label>

                                            <div class="col-sm-10">
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item">

                                                        <a class="pull " ?>**********</a>
                                                        <!-- <a class="pull " type="password"><?= $_SESSION['cuenta_usuario']['password_usuario'] ?></a> -->

                                                </ul>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <!-- <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div> -->
                                            <div class="col-sm-9">

                                            </div>
                                            <div class="col-sm-3">
                                                <button type="submit" class="btn modificarBtnContraseña btn-primary pull-right btn-block btn-sm" value="<?= $_SESSION['cuenta_persona']['cedula'] ?>">Editar</button>
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
                                                                                <input type="text" class="form-control input-lg cedulaModificar" maxlength="8" value="<?= $_SESSION['cuenta_usuario']['nombre_usuario'] ?>" name="<?= $_SESSION['cuenta_usuario']['nombre_usuario'] ?>" placeholder="Ingresar cedula" id="usuario<?= $_SESSION['cuenta_usuario']['nombre_usuario'] ?>" required>
                                                                            </div>
                                                                            <div style="width:100%;text-align:right;">
                                                                                <span id="usuarioS<?= $_SESSION['cuenta_usuario']['nombre_usuario'] ?>" class="mensajeError"></span>
                                                                            </div>
                                                                        </div>


                                                                        <!-- ENTRADA PARA LA CONTRASEÑA -->
                                                                        <div class="form-group col-xs-12 col-sm-12">
                                                                            <label for="password<?= $_SESSION['cuenta_usuario']['password_usuario'] ?>">Contraseña</label>
                                                                            <div class="input-group" style="width:100%;">
                                                                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                <input type="password" class="form-control input-lg nombreModificar" maxlength="25" value="<?= $_SESSION['cuenta_usuario']['password_usuario'] ?>" name="<?= $_SESSION['cuenta_usuario']['password_usuario'] ?>" id="password<?= $_SESSION['cuenta_usuario']['password_usuario'] ?>" placeholder="Ingresar nueva contraseña" required>
                                                                            </div>
                                                                            <div style="width:100%;text-align:right;">
                                                                                <span id="passwordS<?= $_SESSION['cuenta_usuario']['password_usuario'] ?>" class="mensajeError"></span>
                                                                            </div>
                                                                        </div>




                                                                    </div>


                                                                </div>

                                                            </div>


                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                                                <button type="submit" class="btn btn-primary modificarButtonModalC" value="<?= $_SESSION['cuenta_persona']['cedula'] ?>" id="modificar">Modificar</button>

                                                            </div>


                                                            <!-- </form> -->

                                                        </div>

                                                    </div>

                                                </div>





                                            </div>
                                        </div>

                                    </div>
                                </div>
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





        <?php //require_once('assets/footered.php'); 
        ?>
        <?php if (!empty($response)) : ?>
            <input type="hidden" class="responses" value="<?php echo $response ?>">
        <?php endif; ?>
        <script src="<?= _THEME_ ?>/js/perfil.js"></script>
</body>

</html>
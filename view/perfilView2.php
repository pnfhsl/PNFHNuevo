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

                                <h3 class="profile-username text-center"> <?= $_SESSION['cuenta_persona']['nombre'] ?> <?= $_SESSION['cuenta_persona']['apellido'] ?></h3>

                                <p class="text-muted text-center"><?= $_SESSION['cuenta_usuario']['nombre_rol'] ?> </p>

                                <!-- <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Followers</b> <a class="pull-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Following</b> <a class="pull-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Friends</b> <a class="pull-right">13,287</a>
              </li>
            </ul> -->

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
                                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>

                                <hr>

                                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                                <p class="text-muted">Malibu, California</p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                                <p>
                                    <span class="label label-danger">UI Design</span>
                                    <span class="label label-success">Coding</span>
                                    <span class="label label-info">Javascript</span>
                                    <span class="label label-warning">PHP</span>
                                    <span class="label label-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="<?= _ROUTE_ ?>assets/img/user-3.png" alt="user image">
                                            <span class="username">

                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item">
                                                        <?php var_dump($_SESSION['cuenta_persona']['cedula']); ?>
                                                        <br>
                                                        <!-- <?php echo 'Public:';
                                                                var_dump($buscar[0]['llave_publica']); ?>
                                                        <br>
                                                        <?php echo 'Private:';
                                                        var_dump($buscar[0]['llave_privada']); ?> -->
                                                        <!-- <b>Cédula: </b> <a class="pull"><?= $_SESSION['cuenta_persona']['cedula'] ?></a> -->
                                                        <!-- <?php echo "aqui esta" . $_SESSION['cuenta_persona']['cedula_profesor'] . ""; ?></h3> -->

                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Nombre: </b> <a class="pull"><?= $_SESSION['cuenta_persona']['nombre'] ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Apellido: </b> <a class="pull"><?= $_SESSION['cuenta_persona']['apellido'] ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Télefono: </b> <a class="pull"><?= $_SESSION['cuenta_persona']['telefono'] ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Correo: </b> <a class="pull"><?= $_SESSION['cuenta_usuario']['correo'] ?></a>
                                                    </li>
                                                </ul>


                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->


                                        <form class="form-horizontal">
                                            <div class="form-group margin-bottom-none">
                                                <div class="col-sm-9">
                                                    <input class="form-control input-sm" placeholder="Response">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn btn-danger pull-right btn-block btn-sm" data-toggle="modal" data-target="#modalModificarAlum<?= $_SESSION['cuenta_persona']['cedula'] ?>">Editar</button>
                                                    <div id="modalModificarAlum<?= $_SESSION['cuenta_persona']['cedula']  ?>" class="modalModificarAlum modal fade modalModificarAlum<?= $data['cedula_alumno'] ?>" role="dialog">

                                                        <div class="modal-dialog tamModals" style="text-align:left;">
                                                            <div class="modal-content">

                                                                <!-- <form role="form" method="post" enctype="multipart/form-data"> -->


                                                                <div class="modal-header" style="background:#3c8dbc; color:white">

                                                                    <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                                                                    <h4 class="modal-title" style="text-align: left;">Modificar Usuario</h4>

                                                                </div>


                                                                <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                                                    <div class="box-body">

                                                                        <div class="row">

                                                                            <!-- ENTRADA PARA EL USUARIO -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="cedula<?= $data['cedula_alumno'] ?>">Cedula</label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                                                                    <input type="text" class="form-control input-lg cedulaModificar" maxlength="8" value="" name="" placeholder="Ingresar cedula" id="cedula" required>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="cedulaS" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>

                                                                            <!-- ENTRADA PARA EL NOMBRE -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="nombre">Nombre</label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                    <input type="text" class="form-control input-lg nombreModificar" maxlength="25" value="" name="" id="nombre" placeholder="Ingresar nombre" required>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="nombreS" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>


                                                                            <!-- ENTRADA PARA EL APELLIDO -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="apellido">Apellido</label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                    <input type="text" class="form-control input-lg apellidoModificar" maxlength="25" value="" name="" id="apellido" placeholder="Ingresar apellido" required>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="apellidoS" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>

                                                                            <!--ENTRADA TELÉFONO -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="telefono">Telefono</label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                                                                    <input type="text" class="form-control input-lg telefonoModificar" maxlength="11" value="" name="" id="telefono" placeholder="Ingresar Nro Telefonico" required>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="telefonoS" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                    </div>

                                                                </div>


                                                                <div class="modal-footer">

                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                                                    <button type="submit" class="btn btn-primary modificarButtonModal" value="" id="modificar">Modificar</button>

                                                                </div>


                                                                <!-- </form> -->

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
                                            <!-- <div class="box-body">
                                                <div class="form-group">
                                                    <label>Pregunta #1</label>
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
                                                <div class="form-group">
                                                    <label for="">Respuesta</label>
                                                    <input type="text" class="form-control" id="resp_uno" placeholder="Ingrese su respuesta">
                                                </div>

                                                <div class="form-group">
                                                    <label>Pregunta #2</label>
                                                    <select class="form-control" id="preg_dos">
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
                                                <div class="form-group">
                                                    <label for="">Respuesta</label>
                                                    <input type="text" class="form-control" id="resp_dos" placeholder="Ingrese su respuesta">
                                                </div>

                                                <div class="form-group">
                                                    <label>Pregunta #3</label>
                                                    <select class="form-control" id="preg_tres">
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
                                                <div class="form-group">
                                                    <label for="">Respuesta</label>
                                                    <input type="text" class="form-control" id="resp_tres" placeholder="Ingrese su respuesta">
                                                </div>
                                            </div> -->

                                            <div class="timeline-item">
                                                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                                                <h3 class="timeline-header"><a href="#">Pregunta #1</a></h3>

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
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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
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
                                                <th>Nombre</th>
                                                <th>Apellido</th>

                                                <!--  <?php  ?> -->
                                                <th>Acciones</th>
                                                <?php //endif 
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $num = 1;
                                            //    foreach ($clases as $data):
                                            //     if(!empty($data['id_clase'])):  
                                            ?>
                                            <tr>
                                                <td style="width:5%">
                                                    <span class="contenido2">
                                                        <?php echo $num++; ?>
                                                    </span>
                                                </td>


                                                <td style="width:20%">
                                                    <span class="contenido2">
                                                        27828164
                                                        <!-- <?php echo $data['nombreSC']; ?> -->
                                                    </span>
                                                </td>
                                                <td style="width:20%">
                                                    <span class="contenido2">
                                                        Lynneth
                                                        <!-- ?php echo $data['nombre_seccion']; ?> -->
                                                    </span>
                                                </td>
                                                <td style="width:20%">
                                                    <span class="contenido2">
                                                        Pereira
                                                        <!-- <?php echo $data['nombre_profesor'] . " " . $data['apellido_profesor']; ?> -->
                                                    </span>
                                                </td>

                                                <?php //if ($amUsuariosE==1||$amUsuariosB==1): 
                                                ?>
                                                <td style="width:10%">
                                                    <!-- <table style="background:none;text-align:center;width:100%"> -->
                                                    <!-- <tr> -->
                                                    <?php //if ($amUsuariosB==1): 
                                                    ?>
                                                    <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" data-toggle="modal" data-target="#modalAdmin" value="<?php echo $data['id_clase'] ?>">
                                                        <span class="fa fa-link" title="Generar ">

                                                        </span>
                                                    </button>
                                                    <div id="modalAdmin" class="modalAdmin modal fade" role="dialog">

                                                        <div class="modal-dialog tamModals tamModals" style="text-align:left;">

                                                            <div class="modal-content">

                                                                <!-- <form role="form" method="post" enctype="multipart/form-data"> -->


                                                                <div class="modal-header" style="background:#3c8dbc; color:white">

                                                                    <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                                                                    <h4 class="modal-title" style="text-align: left;">Agregar Clase</h4>

                                                                </div>


                                                                <div class="modal-body" style="max-height:70vh;overflow:auto">

                                                                    <div class="box-body">

                                                                        <div class="row">

                                                                            <!-- ENTRADA PARA SELECCIONAR SECCIONES-->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="seccion">Seccion</label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-cogs"></i></span>
                                                                                    <select class="form-control select2 input-lg" style="width:100%;" name="seccion" id="seccion">
                                                                                        <option value="">Sección</option>
                                                                                        <?php foreach ($secciones as $date) : if (!empty($date['cod_seccion'])) :  ?>
                                                                                                <option value="<?php echo $date['cod_seccion'] ?>"><?php echo $date['nombre_seccion'] ?></option>
                                                                                        <?php endif;
                                                                                        endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="seccionS" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>


                                                                            <!-- ENTRADA PARA SELECCIONAR SABERES -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="saber">Saber complementario</label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-indent"></i></span>
                                                                                    <select class="form-control select2 input-lg" style="width:100%;" name="nuevoPerfil" id="saber">
                                                                                        <option value="">Saber Complementario</option>
                                                                                        <?php foreach ($saberes as $dateS) : if (!empty($dateS['id_SC'])) :  ?>
                                                                                                <!-- <option value="<?php echo $dateS['id_SC'] ?>"><?php echo $dateS['nombreSC'] ?></option> -->
                                                                                        <?php endif;
                                                                                        endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="saberS" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>


                                                                            <!-- ENTRADA PARA LOS ALUMNOS -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="profesor">Profesor</label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-indent"></i></span>
                                                                                    <select class="form-control select2 input-lg" style="width:100%;" name="nuevoPerfil" id="profesor">
                                                                                        <option value="">Profesor</option>
                                                                                        <?php foreach ($profesores as $dateP) : if (!empty($dateP['cedula_profesor'])) :  ?>
                                                                                                <option value="<?php echo $dateP['cedula_profesor'] ?>"><?php echo $dateP['nombre_profesor'] . " " . $dateP['apellido_profesor'] ?></option>
                                                                                        <?php endif;
                                                                                        endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="profesorS" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>


                                                                </div>

                                                                <div class="modal-footer">

                                                                    <span type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</span>

                                                                    <span type="submit" class="btn btn-primary" id="guardar">Guardar</span>

                                                                </div>


                                                                <!-- </form> -->

                                                            </div>

                                                        </div>

                                                    </div>
                                                    <!-- <td style="width:50%"> -->
                                                    <button class="btn eliminarBtn" style="border:0;background:none;color:red" data-toggle="modal" data-target="#modalOperador" value="<?php echo $data['id_clase'] ?>">
                                                        <span class="fa fa-unlock" title="Desbloqueo"></span>
                                                    </button>
                                                    <!-- </td> -->
                                                    <?php //endif; 
                                                    ?>

                                                    <div id="modalOperador" class="modalOperador modal fade" role="dialog">

                                                        <div class="modal-dialog tamModals tamModals" style="text-align:left;">

                                                            <div class="modal-content">

                                                                <!-- <form role="form" method="post" enctype="multipart/form-data"> -->


                                                                <div class="modal-header" style="background:#3c8dbc; color:white">

                                                                    <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                                                                    <h4 class="modal-title" style="text-align: left;">Agregar Clase</h4>

                                                                </div>


                                                                <div class="modal-body" style="max-height:70vh;overflow:auto">

                                                                    <div class="box-body">

                                                                        <div class="row">

                                                                            <!-- ENTRADA PARA SELECCIONAR SECCIONES-->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="seccion">Seccion</label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-cogs"></i></span>
                                                                                    <select class="form-control select2 input-lg" style="width:100%;" name="seccion" id="seccion">
                                                                                        <option value="">Sección</option>
                                                                                        <?php foreach ($secciones as $date) : if (!empty($date['cod_seccion'])) :  ?>
                                                                                                <option value="<?php echo $date['cod_seccion'] ?>"><?php echo $date['nombre_seccion'] ?></option>
                                                                                        <?php endif;
                                                                                        endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="seccionS" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>


                                                                            <!-- ENTRADA PARA SELECCIONAR SABERES -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="saber">Saber complementario</label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-indent"></i></span>
                                                                                    <select class="form-control select2 input-lg" style="width:100%;" name="nuevoPerfil" id="saber">
                                                                                        <option value="">Saber Complementario</option>
                                                                                        <?php foreach ($saberes as $dateS) : if (!empty($dateS['id_SC'])) :  ?>
                                                                                                <!-- <option value="<?php echo $dateS['id_SC'] ?>"><?php echo $dateS['nombreSC'] ?></option> -->
                                                                                        <?php endif;
                                                                                        endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="saberS" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>


                                                                            <!-- ENTRADA PARA LOS ALUMNOS -->
                                                                            <div class="form-group col-xs-12 col-sm-12">
                                                                                <label for="profesor">Profesor</label>
                                                                                <div class="input-group" style="width:100%;">
                                                                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-indent"></i></span>
                                                                                    <select class="form-control select2 input-lg" style="width:100%;" name="nuevoPerfil" id="profesor">
                                                                                        <option value="">Profesor</option>
                                                                                        <?php foreach ($profesores as $dateP) : if (!empty($dateP['cedula_profesor'])) :  ?>
                                                                                                <option value="<?php echo $dateP['cedula_profesor'] ?>"><?php echo $dateP['nombre_profesor'] . " " . $dateP['apellido_profesor'] ?></option>
                                                                                        <?php endif;
                                                                                        endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div style="width:100%;text-align:right;">
                                                                                    <span id="profesorS" class="mensajeError"></span>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>


                                                                </div>

                                                                <div class="modal-footer">

                                                                    <span type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</span>

                                                                    <span type="submit" class="btn btn-primary" id="guardar">Guardar</span>

                                                                </div>


                                                                <!-- </form> -->

                                                            </div>

                                                        </div>

                                                    </div>
                                                    <!-- </td> -->
                                                    <?php //endif; 
                                                    ?>
                                                    <!-- </tr> -->
                                                    <!-- </table> -->
                                                </td>
                                                <?php //endif 
                                                ?>

                                                <button type="button" id="modificarButton<?= $data['id_clase'] ?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarClase<?= $data['id_clase'] ?>" style="display: none">Modificar</button>


                                            </tr>
                                            <?php
                                            //    endif; endforeach;
                                            ?>
                                        </tbody>
                                        <!--                 <tfoot>
                <tr>
                  <th>Nº</th>
                  <th>Clases</th> -->
                                        <!-- <th>Nombre de Usuario</th> -->
                                        <!--   <?php //if ($amUsuariosE==1||$amUsuariosB==1): 
                                                ?>
                  <th>---</th>
                  <?php ?>
                </tr>
                </tfoot> -->
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
</body>

</html>
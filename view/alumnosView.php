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
          <li><a href="<?=_ROUTE_.$this->encriptar('Home'); ?>"><i class="fa fa-dashboard"></i> Inicio </a></li>
          <li><a href="<?=_ROUTE_.$this->encriptar('Alumnos'); ?>"><?php echo $url; ?></a></li>
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
          <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
              <div class="box-header">
                <div class="col-xs-12 col-sm-6">
                  <img src="assets/img/logolista.png" style="width:25px;">
                  <h3 class="box-title"><?php echo "" . $url . ""; ?></h3>
                </div>
                <div class="col-xs-12 col-sm-6" style="text-align:right">

                  <button type="button" class="btn btn-next btn-fill btn btn-success btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarArchivo">Subir archivo</button>
                  <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">
            

                  <div id="modalAgregarArchivo" class="#modalAgregarArchivo modal fade" role="dialog">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <form role="form" method="post" enctype="multipart/form-data" id="form_data">


                          <div class="modal-header" style="background:#3c8dbc; color:white">

                            <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                            <h4 class="modal-title" style="text-align: left;">Agregar Data</h4>

                          </div>


                          <div class="modal-body">

                            <div class="box-body">

                              <br>
                              <div class="file-input text-center custom-input-file">
                                <input type="file" name="file[]" multiple id="file-input" class="file-input__input input-file" accept=".xls, .xlsx" />
                                <label class="file-input__label" for="file-input">
                                  <i class="fa fa-upload zmdi zmdi-upload"></i>
                                  <span> Seleccionar Archivo</span></label>
                                <span id="archivoSeleccionado"></span>
                              </div>
                              <div>
                                <span>
                                </span>
                              </div>
                              <br>


                            </div>

                          </div>


                          <div class="modal-footer">

                            <span type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</span>

                            <span type="submit" class="btn btn-primary subir" id="subir">Subir</span>

                          </div>


                        </form>

                      </div>

                    </div>

                  </div>

                  <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarAlum">Agregar Nuevo</button>



                  <div id="modalAgregarAlum" class="modalAgregarAlum modal fade" role="dialog">

                    <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">

                      <div class="modal-content">

                        <!-- <form role="form" method="post" enctype="multipart/form-data"> -->



                        <div class="modal-header" style="background:#3c8dbc;color:white">

                          <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                          <h4 class="modal-title" style="text-align: left;">Agregar Alumno</h4>

                        </div>


                        <div class="modal-body" style="max-height:70vh;overflow:auto;">

                          <div class="box-body">

                            <!-- ENTRADA PARA EL USUARIO -->
                            <div class="row">

                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="cedula">Cedula</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                  <input type="text" class="form-control input-lg" name="nuevaCedula" placeholder="Ingresar cedula" id="cedula" maxlength="8" required>
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
                                  <input type="text" class="form-control input-lg" name="nuevoNombre" id="nombre" placeholder="Ingresar nombre" maxlength="25" required>
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
                                  <input type="text" class="form-control input-lg" name="nuevoApellido" id="apellido" placeholder="Ingresar apellido" maxlength="25" required>
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
                                  <input type="text" class="form-control input-lg" name="nuevoTeleono" id="telefono" placeholder="Ingresar Nro Telefonico" maxlength="11" required>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="telefonoS" class="mensajeError"></span>
                                </div>
                              </div>

                              <!-- ENTRADA TRAYECTO -->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="trayecto">Trayecto</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                  <select class="form-control select2" style="width:100%;" name="trayecto" placeholder="Ingresar trayecto" id="trayecto" required>
                                    <option value="">Seleccione un trayecto</option>
                                    <option value="1">Trayecto I</option>
                                    <option value="2">Trayecto II</option>
                                    <option value="3">Trayecto III</option>
                                    <option value="4">Trayecto IV</option>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="trayectoS" class="mensajeError"></span>
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


                </div>
              </div>
              <!-- /.box-header -->

              <div class="box-body ">
                <div class="table-responsive">

                  <table id="datatable" class="table table-striped text-center" style="text-align:center;width:100%;font-size:1em;">
                    <thead>
                      <tr>
                        <th>Nº</th>
                        <th>Cédula</th>
                        <th>Nombre y Apellido</th>
                        <th>Télefono</th>
                        <?php //if ($amUsuariosE==1||$amUsuariosB==1): 
                        ?>
                        <th>Acciones</th>
                        <?php //endif 
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $num = 1;
                      foreach ($alumnos as $data) :
                        if (!empty($data['cedula_alumno'])) :
                      ?>
                          <tr>
                            <td style="width:5%">
                              <span class="contenido2">
                                <?php echo $num++; ?>
                              </span>
                            </td>
                            <td style="width:20%">
                              <span class="contenido2">
                                <?php echo $data['cedula_alumno']; ?>
                              </span>
                            </td>
                            <td style="width:20%">
                              <span class="contenido2">
                                <?php echo $data['nombre_alumno'] . " " . $data['apellido_alumno']; ?>
                              </span>
                            </td>
                            <td style="width:20%">
                              <span class="contenido2">
                                <?php echo $data['telefono_alumno']; ?>
                              </span>
                            </td>

                            <?php //if ($amUsuariosE==1||$amUsuariosB==1): 
                            ?>
                            <td style="width:10%">
                              <!-- <table style="background:none;text-align:center;width:100%"> -->
                              <!-- <tr> -->
                              <?php //if ($amUsuariosE==1): 
                              ?>
                              <!-- <td style="width:50%"> -->
                              <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['cedula_alumno'] ?>">
                                <span class="fa fa-pencil">

                                </span>
                              </button>
                              <!-- </td> -->
                              <?php //endif; 
                              ?>
                              <?php //if ($amUsuariosB==1): 
                              ?>
                              <!-- <td style="width:50%"> -->
                              <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['cedula_alumno'] ?>">
                                <span class="fa fa-trash"></span>
                              </button>
                              <!-- </td> -->
                              <?php //endif; 
                              ?>
                              <!-- </tr> -->
                              <!-- </table> -->
                            </td>
                            <?php //endif 
                            ?>


                            <button type="button" id="modificarButton<?= $data['cedula_alumno'] ?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarAlum<?= $data['cedula_alumno'] ?>" style="display: none">Modificar</button>

                            <div id="modalModificarAlum<?= $data['cedula_alumno'] ?>" class="modalModificarAlum modal fade modalModificarAlum<?= $data['cedula_alumno'] ?>" role="dialog">

                              <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">
                                <div class="modal-content">

                                  <!-- <form role="form" method="post" enctype="multipart/form-data"> -->


                                  <div class="modal-header" style="background:#3c8dbc; color:white">

                                    <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                                    <h4 class="modal-title" style="text-align: left;">Modificar Alumno</h4>

                                  </div>


                                  <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                    <div class="box-body">

                                      <div class="row">

                                        <!-- ENTRADA PARA EL USUARIO -->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="cedula<?= $data['cedula_alumno'] ?>">Cedula</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                            <input type="text" class="form-control input-lg cedulaModificar" maxlength="8" value="<?= $data['cedula_alumno'] ?>" name="<?= $data['cedula_alumno'] ?>" placeholder="Ingresar cedula" id="cedula<?= $data['cedula_alumno'] ?>" required>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="cedulaS<?= $data['cedula_alumno'] ?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                        <!-- ENTRADA PARA EL NOMBRE -->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="nombre<?= $data['cedula_alumno'] ?>">Nombre</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg nombreModificar" maxlength="25" value="<?= $data['nombre_alumno'] ?>" name="<?= $data['cedula_alumno'] ?>" id="nombre<?= $data['cedula_alumno'] ?>" placeholder="Ingresar nombre" required>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="nombreS<?= $data['cedula_alumno'] ?>" class="mensajeError"></span>
                                          </div>
                                        </div>


                                        <!-- ENTRADA PARA EL APELLIDO -->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="apellido<?= $data['cedula_alumno'] ?>">Apellido</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg apellidoModificar" maxlength="25" value="<?= $data['apellido_alumno'] ?>" name="<?= $data['cedula_alumno'] ?>" id="apellido<?= $data['cedula_alumno'] ?>" placeholder="Ingresar apellido" required>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="apellidoS<?= $data['cedula_alumno'] ?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                        <!--ENTRADA TELÉFONO -->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="telefono<?= $data['cedula_alumno'] ?>">Telefono</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg telefonoModificar" maxlength="11" value="<?= $data['telefono_alumno'] ?>" name="<?= $data['cedula_alumno'] ?>" id="telefono<?= $data['cedula_alumno'] ?>" placeholder="Ingresar Nro Telefonico" required>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="telefonoS<?= $data['cedula_alumno'] ?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                        <!-- ENTRADA TRAYECTO -->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="trayecto<?= $data['cedula_alumno'] ?>">Trayecto</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                            <select class="form-control select2 input-lg trayectoModificar" style="width:100%;" name="<?= $data['cedula_alumno'] ?>" placeholder="Ingresar trayecto" id="trayecto<?= $data['cedula_alumno'] ?>" required>
                                              <option value="">Seleccione un trayecto</option>
                                              <option <?php if ($data['trayecto_alumno'] == "1") {
                                                        echo "selected";
                                                      } ?> value="1">Trayecto I</option>
                                              <option <?php if ($data['trayecto_alumno'] == "2") {
                                                        echo "selected";
                                                      } ?> value="2">Trayecto II</option>
                                              <option <?php if ($data['trayecto_alumno'] == "3") {
                                                        echo "selected";
                                                      } ?> value="3">Trayecto III</option>
                                              <option <?php if ($data['trayecto_alumno'] == "4") {
                                                        echo "selected";
                                                      } ?> value="4">Trayecto IV</option>
                                            </select>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="trayectoS<?= $data['cedula_alumno'] ?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                      </div>

                                    </div>

                                  </div>


                                  <div class="modal-footer">

                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                    <button type="submit" class="btn btn-primary modificarButtonModal" value="<?= $data['cedula_alumno'] ?>" id="modificar">Modificar</button>

                                  </div>


                                  <!-- </form> -->

                                </div>

                              </div>

                            </div>

                          </tr>
                      <?php
                        endif;
                      endforeach;
                      ?>
                    </tbody>
                    <!--  <tfoot>
                <tr>
                  <th>Nº</th>
                  <th>Nombre y Apellido</th>
                  <th>Especialidades</th>
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): 
                  ?>
                  <th> - </th>
                  <?php //endif 
                  ?>
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
  <script src="<?=_THEME_?>/js/alumnos.js"></script>
</body>

</html>
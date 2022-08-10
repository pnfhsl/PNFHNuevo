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
          <li><a href="<?=_ROUTE_.$this->encriptar('Profesores'); ?>"><?php echo $url; ?></a></li>
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


                  <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarProf">Agregar Nuevo</button>


                  <div id="modalAgregarProf" class="#modalAgregarProf modal fade" role="dialog">

                    <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">

                      <div class="modal-content">

                        <!-- <form role="form" method="post" enctype="multipart/form-data"> -->


                        <div class="modal-header" style="background:#3c8dbc; color:white">

                          <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                          <h4 class="modal-title" style="text-align: left;">Agregar Profesor</h4>

                        </div>

                        <div class="modal-body" style="max-height:70vh;overflow:auto;">

                          <div class="box-body">

                            <div class="row">

                              <!-- ENTRADA PARA EL USUARIO -->
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
                        <th>Nombre </th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
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
                      foreach ($profesores as $data) :
                        if (!empty($data['cedula_profesor'])) :
                      ?>
                          <tr>
                            <td style="width:5%">
                              <span class="contenido2">
                                <?php echo $num++; ?>
                              </span>
                            </td>
                            <td style="width:20%">
                              <span class="contenido2">
                                <?php echo $data['cedula_profesor']; ?>
                              </span>
                            </td>
                            <td style="width:20%">
                              <span class="contenido2">
                                <?php echo $data['nombre_profesor']; ?>
                              </span>
                            </td>
                            <td style="width:20%">
                              <span class="contenido2">
                                <?php echo $data['apellido_profesor']; ?>
                              </span>
                            </td>
                            <td style="width:20%">
                              <span class="contenido2">
                                <?php echo $data['telefono_profesor']; ?>
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
                              <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['cedula_profesor'] ?>">
                                <span class="fa fa-pencil">

                                </span>
                              </button>
                              <!-- </td> -->
                              <?php //endif; 
                              ?>
                              <?php //if ($amUsuariosB==1): 
                              ?>
                              <!-- <td style="width:50%"> -->
                              <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['cedula_profesor'] ?>">
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


                            <button type="button" id="modificarButton<?= $data['cedula_profesor'] ?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarProf<?= $data['cedula_profesor'] ?>" style="display: none">Modificar</button>

                            <div id="modalModificarProf<?= $data['cedula_profesor'] ?>" class="modalModificarProf modal fade modalModificarProf<?=$data['cedula_profesor'] ?>" role="dialog">

                              <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">
                                <div class="modal-content">

                                  <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                                  <div class="modal-header" style="background:#3c8dbc; color:white">

                                    <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                                    <h4 class="modal-title" style="text-align: left;">Modificar Profesor</h4>

                                  </div>


                                  <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                    <div class="box-body">

                                      <div class="row">

                                        <!-- ENTRADA PARA EL USUARIO -->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="cedula<?= $data['cedula_profesor'] ?>">Cedula</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                            <input type="text" class="form-control input-lg cedulaModificar" maxlength="8" value="<?= $data['cedula_profesor'] ?>" name="<?= $data['cedula_profesor'] ?>" placeholder="Ingresar cedula" id="cedula<?= $data['cedula_profesor'] ?>" required>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="cedulaS<?= $data['cedula_profesor'] ?>" class="mensajeError"></span>
                                          </div>
                                        </div>


                                        <!-- ENTRADA PARA EL NOMBRE -->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="nombre<?= $data['cedula_profesor'] ?>">Nombre</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg nombreModificar" maxlength="25" value="<?= $data['nombre_profesor'] ?>" name="<?= $data['cedula_profesor'] ?>" id="nombre<?= $data['cedula_profesor'] ?>" placeholder="Ingresar nombre" required>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="nombreS<?= $data['cedula_profesor'] ?>" class="mensajeError"></span>
                                          </div>
                                        </div>


                                        <!-- ENTRADA PARA EL APELLIDO -->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="apellido<?= $data['cedula_profesor'] ?>">Apellido</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg apellidoModificar apellidoModificar<?= $data['cedula_profesor'] ?>" maxlength="25" value="<?= $data['apellido_profesor'] ?>" name="<?= $data['cedula_profesor'] ?>" id="apellido<?= $data['cedula_profesor'] ?>" placeholder="Ingresar apellido" required>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="apellidoS<?= $data['cedula_profesor'] ?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                        <!--ENTRADA TELÉFONO -->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="telefono<?= $data['cedula_profesor'] ?>">Telefono</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg telefonoModificar telefonoModificar<?= $data['cedula_profesor'] ?>" maxlength="11" value="<?= $data['telefono_profesor'] ?>" name="<?= $data['cedula_profesor'] ?>" id="telefono<?= $data['cedula_profesor'] ?>" placeholder="Ingresar Nro Telefonico" required>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="telefonoS<?= $data['cedula_profesor'] ?>" class="mensajeError"></span>
                                          </div>
                                        </div>


                                      </div>


                                    </div>

                                  </div>


                                  <div class="modal-footer">

                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                    <button type="submit" class="btn btn-primary modificarButtonModal" value="<?= $data['cedula_profesor'] ?>" id="modificar">Modificar</button>

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
                    <tfoot>
                      <tr>
                        <th>Nº</th>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <?php //if ($amUsuariosE==1||$amUsuariosB==1): 
                        ?>
                        <th>Acciones</th>
                        <?php //endif 
                        ?>
                      </tr>
                    </tfoot>
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
  <script src="<?= _THEME_ ?>/js/profesores.js"></script>
</body>

</html>
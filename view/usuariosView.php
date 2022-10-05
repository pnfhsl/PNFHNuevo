<!DOCTYPE html>
<html>
<head>
  <title><?php echo _NAMESYSTEM_; ?> | <?php if(!empty($action)){echo $action; } ?> <?php if(!empty($url)){echo $url;} ?></title>
  <?php //require_once('assets/headers.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php require_once('assets/top_menu.php'); ?>

  <?php require_once('assets/menu.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header" style="background:#FFF;padding-bottom:10px;border-bottom:2px solid #05A"> -->
    <section class="content-header" >
      <!--  -->
      <h1>
        <?php echo $url; ?>
        <small><?php echo "Ver ".$url; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=_ROUTE_.$this->encriptar("Home"); ?>"><i class="fa fa-dashboard"></i> Inicio </a></li>
        <li><a href="<?=_ROUTE_.$this->encriptar("Usuarios"); ?>"><?php echo $url; ?></a></li>
        <li class="active"><?php if(!empty($action)){echo $action;} echo " ". $url; ?></li>
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
                <h3 class="box-title"><?php echo "".$url.""; ?></h3>
              </div>
              <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">
              <div class="col-xs-12 col-sm-6" style="text-align:right">
                <?php if($amUsuariosR=="1"): ?>
                  <!--=====================================
                    MODAL AGREGAR USUARIO
                  ======================================-->
                  <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Nuevo</button>
                  <div id="modalAgregarUsuario" class="modal fade" role="dialog">
                    <div class="modal-dialog tamModals" style="text-align:left;">
                      <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc; color:white">
                          <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>
                          <h4 class="modal-title" style="text-align: left;">Agregar Usuario</h4>
                        </div>

                        <div class="modal-body"  style="max-height:70vh;overflow:auto;">
                          <div class="box-body">
                            <div class="row">
                              <!-- ENTRADA PARA EL ROL-->
                              <div class="form-group col-xs-12">
                                <label for="rol">Rol</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-cogs"></i></span> 
                                  <select class="form-control input-lg" style="width:100%;" name="nuevoRol" id="rol">
                                    <option value="">Seleccionar rol</option>
                                      <?php foreach ($roles as $rols): if(!empty($rols['id_rol'])): ?>
                                        <option value="<?=$rols['id_rol']?>"><?=$rols['nombre_rol']?></option>
                                      <?php endif; endforeach; ?>
                                        <!-- <option value="1">Administrador</option> -->
                                        <!-- <option value="2">Profesor</option> -->
                                        <!-- <option value="3">Alumno</option> -->
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="rolS"  class="mensajeError"></span>
                                </div>
                              </div>

                              <!-- ENTRADA PARA EL USUARIO -->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="cedula">Usuarios</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%"><i class="fa fa-indent"></i></span>
                                  <select class="form-control input-lg select2" style="width:100%;" name="cedula" id="cedula">
                                        <option value="">Seleccionar usuario</option>
                                        <!-- <option value="27828164">C.I. 27.828.164. Carmen López</option>
                                        <option value="27737749">C.I. 27.737.749. Luis</option>
                                        <option value="27736916">C.I. 27.736.916. Javier</option> -->
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="cedulaS"  class="mensajeError"></span>
                                </div>
                              </div>
                            
                              <!-- ENTRADA PARA EL NOMBRE -->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="nombre">Nombre de usuario</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                  <input type="text" class="form-control input-lg" style="width:100%;" name="nombre" id="nombre" placeholder="Ingresar nombre de usuario" maxlength="30" required>
                                  <input type="hidden" id="valnombre" class="valnombre" value="0">
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="nombreM" class="mensajeError"></span>
                                </div>
                              </div>

                              <!-- Entrada para el Correo -->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="correo">Correo electrónico</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                  <input type="text" class="form-control input-lg" name="correo" id="correo" maxlength="45" placeholder="Ingresar correo electrónico" required>
                                  <input type="hidden" id="valcorreo" class="valcorreo" value="0">
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="correoS" class="mensajeError"></span>
                                </div>
                              </div>

                              <input type="hidden" value="1" class="optpass">
                              <!-- ENTRADA PARA EL PASSWORD -->
                              <div class="form-group col-xs-12 col-sm-6">
                                <label for="nuevoPassword">Contraseña</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-key"></i></span>
                                  <input type="password" class="form-control input-lg nuevoPassword" style="width:100%;" name="" placeholder="Ingresar contraseña" id="nuevoPassword" maxlength="32" required>
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
                                  <input type="password" class="form-control input-lg confirmarPassword" style="width:100%;" name="" placeholder="Ingresar contraseña" id="confirmarPassword" maxlength="32" required>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="nombrePC" class="mensajeError"></span>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                          <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
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
                  <th>Nombre de Usuario</th>
                  <?php if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>Acciones</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
                foreach ($usuarios as $data):
                if(!empty($data['cedula_usuario'])):  
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
                 
                  <?php if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <td style="width:10%">
                    <?php if ($amUsuariosE==1): ?>
                      <button class="btn modificarBtn" id="modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['cedula_usuario'] ?>">
                        <span class="fa fa-pencil"></span>
                      </button>
                        
                      <!-- Modificar -->
                      <button type="button" id="modificarButton<?=$data['cedula_usuario']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarUsuario<?=$data['cedula_usuario']?>" style="display: none">Modificar</button>
                      <div id="modalModificarUsuario<?=$data['cedula_usuario']?>" class="modalModificarUsuario modal fade modalModificarUsuario<?=$data['cedula_usuario']?>" role="dialog">
                        <div class="modal-dialog tamModals" style="text-align:left;">
                          <div class="modal-content">

                            <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                              <!--=====================================
                              CABEZA DEL MODAL
                              ======================================-->

                              <div class="modal-header" style="background:#3c8dbc; color:white">

                                <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                                <h4 class="modal-title" style="text-align: left;">Modificar Usuario</h4>

                              </div>

                              <!--=====================================
                              CUERPO DEL MODAL
                              ======================================-->

                              <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                <div class="box-body">

                                  <div class="row">
                                                           
                                    <!-- ENTRADA PARA EL ROL -->
                                    <div class="form-group col-xs-12 col-sm-12">
                                      <label for="rol<?=$data['cedula_usuario']?>">Usuarios</label>
                                      <div class="input-group" style="width:100%;">
                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-cogs"></i></span> 
                                        <select class="form-control input-lg rolModificar" style="width:100%;" name="<?=$data['cedula_usuario']?>" id="rol<?=$data['cedula_usuario']?>">
                                              <option value="">Seleccionar rol</option>
                                              <?php foreach ($roles as $rols): if(!empty($rols['id_rol'])): ?>
                                                <option <?php if($data['id_rol']==$rols['id_rol']){ echo "selected"; } ?> value="<?=$rols['id_rol']?>"><?=$rols['nombre_rol']?></option>
                                              <?php endif; endforeach; ?>
                                        </select>
                                      </div>
                                      <div style="width:100%;text-align:right;">
                                        <span id="rolS<?=$data['cedula_usuario']?>" class="mensajeError"></span>
                                      </div>
                                    </div>

                                    <!-- ENTRADA PARA EL USUARIO -->
                                    <div class="form-group col-xs-12 col-sm-12">
                                      <label for="cedula<?=$data['cedula_usuario']?>">Usuarios</label>
                                      <?php
                                        $usuariosSelect=[];
                                        if($data['nombre_rol']=="Alumnos"){
                                          $numexd = 0;
                                          foreach ($usuariosAlumnos as $key) {
                                            if (!empty($key['cedula_alumno'])) {
                                              $usuariosSelect[$numexd]['codigo'] = $key['cedula_alumno'];
                                              $usuariosSelect[$numexd]['cedula'] = number_format($key['cedula_alumno'],0,',','.');
                                              $usuariosSelect[$numexd]['nombre'] = $key['nombre_alumno'];
                                              $usuariosSelect[$numexd]['apellido'] = $key['apellido_alumno'];
                                              $usuariosSelect[$numexd]['telefono'] = $key['telefono_alumno'];
                                              $numexd++;
                                            }
                                          }
                                        }
                                        if($data['nombre_rol']=="Profesores" || $data['nombre_rol']=="Administrador" || $data['nombre_rol']=="Superusuario"){
                                          $numexd = 0;
                                          foreach ($usuariosProfesores as $key) {
                                            if (!empty($key['cedula_profesor'])) {
                                              $usuariosSelect[$numexd]['codigo'] = $key['cedula_profesor'];
                                              $usuariosSelect[$numexd]['cedula'] = number_format($key['cedula_profesor'],0,',','.');
                                              $usuariosSelect[$numexd]['nombre'] = $key['nombre_profesor'];
                                              $usuariosSelect[$numexd]['apellido'] = $key['apellido_profesor'];
                                              $usuariosSelect[$numexd]['telefono'] = $key['telefono_profesor'];
                                              $numexd++;
                                            }
                                          }
                                        }
                                      ?>
                                      <div class="input-group" style="width:100%;">
                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-indent"></i></span> 
                                        <select class="form-control select2 input-lg cedulaModificar" style="width:100%;" name="<?=$data['cedula_usuario']?>" id="cedula<?=$data['cedula_usuario']?>">
                                              <option value="">Selecionar usuario</option>
                                              <?php foreach ($usuariosSelect as $users): ?>
                                                <?php if (!empty($users['codigo'])): ?>
                                                  <option <?php if($data['cedula_usuario']==$users['codigo']){ echo "selected"; } ?> value="<?=$users['codigo'];?>">C.I. <?=$users['cedula']." ".$users['nombre']." ".$users['apellido'];?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                        </select>
                                      </div>
                                      <div style="width:100%;text-align:right;">
                                        <span id="cedulaS<?=$data['cedula_usuario']?>"  class="mensajeError"></span>
                                      </div>
                                    </div>
                                    
                                    <!-- ENTRADA PARA EL NOMBRE -->
                                    <div class="form-group col-xs-12 col-sm-12">
                                      <label for="nombre<?=$data['cedula_usuario']?>">Nombre de usuario</label>
                                      <div class="input-group" style="width:100%;">
                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                        <input type="text" class="form-control input-lg nombreModificar" style="width:100%;"  maxlength="25" value="<?=$data['nombre_usuario']?>" name="<?=$data['cedula_usuario']?>" id="nombre<?=$data['cedula_usuario']?>" placeholder="Ingresar nombre" required>
                                        <input type="hidden" id="valnombre<?=$data['cedula_usuario']?>" class="valnombre<?=$data['cedula_usuario']?>" value="1">
                                      </div>
                                      <div style="width:100%;text-align:right;">
                                        <span id="nombreM<?=$data['cedula_usuario']?>" class="mensajeError"></span>
                                      </div>
                                    </div>


                                    <!--ENTRADA CORREO -->
                                    <div class="form-group col-xs-12 col-sm-12">
                                      <label for="correo<?=$data['cedula_usuario']?>">Correo electrónico</label>
                                      <div class="input-group" style="width:100%;">
                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                        <input type="text" class="form-control input-lg correoModificar" value="<?=$data['correo']?>" name="<?=$data['cedula_usuario']?>" id="correo<?=$data['cedula_usuario']?>" placeholder="Ingresar correo electrónico" required>
                                        <input type="hidden" id="valcorreo<?=$data['cedula_usuario']?>" class="valcorreo<?=$data['cedula_usuario']?>" value="1">
                                      </div>
                                      <div style="width:100%;text-align:right;">
                                        <span id="correoS<?=$data['cedula_usuario']?>" class="mensajeError"></span>
                                      </div>
                                    </div>


                                    <!-- ENTRADA PARA EL PASSWORD -->
                                    <button class="btn btn-primary cont" style="width:90%;margin-left:5%;margin-right:5%;margin-top:10px;" id="cont<?=$data['cedula_usuario']?>" value="<?=$data['cedula_usuario']?>"><span class="text-center">Abrir Contraseña</span></button>
                                    <button class="btn btn-primary contadorBoxPassword" style="width:90%;margin-left:5%;margin-right:5%;display:none" id="cont<?=$data['cedula_usuario']?>" value="<?=$data['cedula_usuario']?>"  data-toggle="collapse" data-target="#collapseOne<?=$data['cedula_usuario']?>" aria-expanded="false" aria-controls="collapseOne<?=$data['cedula_usuario']?>"><span class="text-center">Contraseña</span></button>
                                    </br>
                                    </br>
                                    <input type="hidden" value="0" class="optpass<?=$data['cedula_usuario']?>">
                                    <div class="collapse " id="collapseOne<?=$data['cedula_usuario']?>" aria-labelledby="headingOne" data-parent="#accordion">
                                      <div class="form-group col-xs-12 col-sm-6">
                                        <label for="nuevoPassword<?=$data['cedula_usuario']?>">Contraseña</label>
                                        <div class="input-group">
                                          <span class="input-group-addon" style="width:5%;"><i class="fa fa-key"></i></span>
                                          <input type="password" style="width:100%;" class="form-control input-lg nuevoPassword" placeholder="Nueva contraseña" id="nuevoPassword<?=$data['cedula_usuario']?>" maxlength="32" value="" name="<?=$data['cedula_usuario']?>" required>
                                        </div>
                                        <div style="width:100%;text-align:right;">
                                          <span id="nombreP<?=$data['cedula_usuario']?>" class="mensajeError"></span>
                                        </div>
                                      </div>
                                        
                                      <div class="form-group col-xs-12 col-sm-6">
                                        <label for="confirmarPassword<?=$data['cedula_usuario']?>">Confirmar contraseña</label>
                                        <div class="input-group">
                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-key"></i></span>
                                        <input type="password" style="width:100%;" name="<?=$data['cedula_usuario']?>" class="form-control input-lg confirmarPassword" placeholder="Confirmar contraseña" id="confirmarPassword<?=$data['cedula_usuario']?>" maxlength="32" value="" required>
                                        </div>
                                        <div style="width:100%;text-align:right;">
                                          <span id="nombrePC<?=$data['cedula_usuario']?>" class="mensajeError"></span>
                                        </div>
                                      </div>
                                    </div>
                                                


                            
                                  </div>

                                </div>
                              </div>

                              <!--=====================================
                              PIE DEL MODAL
                              ======================================-->

                              <div class="modal-footer">

                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$data['cedula_usuario']?>" id="modificar">Modificar</button>

                              </div>


                            <!-- </form> -->

                          </div>

                        </div>
                      </div>



                      <!-- Modificar -->
                    
                    <?php endif; ?>
                    <?php if ($amUsuariosB==1): ?>
                      <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['cedula_usuario'] ?>">
                        <span class="fa fa-trash"></span>
                      </button>
                      
                    <?php endif; ?>
                  </td>
                  <?php endif; ?>


                      
                      
                </tr>
                <?php
               endif; endforeach;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nº</th>
                  <th>Cédula</th>
                  <th>Nombre de Usuario</th>
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>Acciones</th>
                  <?php //endif ?>
                </tr>
                </tfoot>
              </table>

              </div>


            </div>
            <!-- /.box-body -->
            <button type="button" id="verificarButton" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalVerificarDatos" style="display:none;">Verificar</button>
            <div id="modalVerificarDatos" class="modalVerificarDatos modal fade modalVerificarDatos" role="dialog">
              <div class="modal-dialog tamModals" style="text-align:left;">
                <div class="modal-content">
                  <!-- <form role="form" method="post" enctype="multipart/form-data"> -->
                    <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->
                    <div class="modal-header" style="background:#3c8dbc; color:white">
                      <button type="button" class="close verificarCerrar" data-dismiss="modal" style="top:25px;" >&times;</button>
                      <h4 class="modal-title" style="text-align: left;">Verificar cuenta de usuario</h4>
                    </div>
                    <!--=====================================
                    CUERPO DEL MODAL
                    ======================================-->
                    <div class="modal-body" style="max-height:70vh;overflow:auto;">
                      <div class="box-body">
                        <div class="row">
                          <!-- $_SESSION['cuenta_usuario']['password_usuario'] -->
                          <!-- ENTRADA PARA EL NOMBRE -->
                          <div class="form-group col-xs-12 col-sm-12">
                            <p style="font-size:1.2em">Saludos, <b><?=$_SESSION['cuenta_persona']['nombre']." ".$_SESSION['cuenta_persona']['apellido'];?></b> Por favor, ingresa la contraseña de su cuenta de usuario.</p>
                          </div>
                          <div class="form-group col-xs-12 col-sm-12">
                            <label for="passwordVerificar">Contraseña</label>
                            <div class="input-group" style="width:100%;">
                              <span class="input-group-addon" style="width:5%;"><i class="fa fa-key"></i></span> 
                              <input type="password" class="form-control input-lg passwordVerificar" id="passwordVerificar" style="width:100%;" placeholder="Ingresar su contraseña" required>
                            </div>
                            <div style="width:100%;text-align:right;">
                              <span id="passwordVerificarM" class="mensajeError"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left verificarCerrar" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-primary passwordVerificarButtonModal" name="" id="verificar">Verificar</button>
                    </div>
                  <!-- </form> -->
                </div>
              </div>
            </div>
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
  

  <?php //require_once 'assets/aside-config.php'; ?>
</div>
<!-- ./wrapper -->
 
  <script src="<?=_THEME_?>/js/usuarios.js"></script>
</body>
</html>

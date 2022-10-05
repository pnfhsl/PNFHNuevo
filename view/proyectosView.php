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
        <li><a href="<?=_ROUTE_.$this->encriptar("Proyectos"); ?>"><?php echo $url; ?></a></li>
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
                <?php if ($amProyectosR=="1"): ?>
                  <button class="btn enviar2" style=""  data-toggle="modal" data-target="#modalAgregarSeccion">Agregar Nuevo</button>
                  <!--=====================================
                    MODAL AGREGAR Seccion
                  ======================================-->
                  <div id="modalAgregarSeccion" class="modalAgregarSeccion modal fade" role="dialog" style="text-align:left;">
                    <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">
                      <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc; color:white">
                          <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>
                          <h4 class="modal-title" style="text-align: left;">Agregar Proyecto</h4>
                        </div>

                        <div class="modal-body" style="max-height:70vh;overflow:auto;">
                          <div class="box-body">
                            <div class="row">
                              <!-- ENTRADA PARA EL USUARIO -->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="nombre">Nombre</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                  <input type="text" class="form-control input-lg" name="nombre" id="nombre" placeholder="Ingresar nombre" maxlength="60" required>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="nombreS" class="mensajeError"></span>
                                </div>
                              </div>

                              <!-- ENTRADA PARA EL TRAYECTO -->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="trayecto">Trayecto</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                  <select class="form-control select2 input-lg" style="width:100%;" name="trayecto" placeholder="Ingresar trayecto" id="trayecto" required>
                                    <option value="">Seleccione un trayecto</option>
                                    <option value="1">Trayecto I</option>
                                    <option value="2">Trayecto II</option>
                                    <option value="3">Trayecto III</option>
                                    <option value="4">Trayecto IV</option>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="trayectoS"  class="mensajeError"></span>
                                </div>
                              </div>

                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="seccion">sección</label>
                                <div class="input-group boxseccion0" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                  
                                  <select class="form-control select2 input-lg" style="width:100%;" name="seccion" placeholder="Ingresar seccion" id="seccion" required>
                                    <option value="">Seleccione una sección</option>
                                    <?php
                                    /*
                                    foreach ($secciones as $secc):
                                      if(!empty($secc['cod_seccion'])):
                                    ?>
                                    <option value="<?=$secc['cod_seccion']?>"><?=mb_strtoupper($secc['nombre_seccion']).""?></option>
                                    <?php 
                                      endif;
                                    endforeach;
                                    */
                                    ?>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="seccionS"  class="mensajeError"></span>
                                </div>
                              </div>

                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="alumnos">Alumnos</label>
                                <div class="input-group boxalumnos" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                  <select class="form-control select2GrupoProyecto input-lg" style="width:100%;" name="alumnos[]" placeholder="Ingresar alumnos" id="alumnos" multiple="multiple" required>
                                    <option value="" disabled="">Seleccione los alumnos</option>
                                    <?php
                                    /*
                                    foreach ($seccionAlumnos as $secc): if(!empty($secc['cedula_alumno'])): ?>
                                    <option <?php foreach ($gruposAlumnos as $grupos) {
                                      if(!empty($grupos['id_SA'])){
                                        if($grupos['id_SA']==$secc['id_SA']){
                                            echo "disabled";
                                        }
                                      }
                                    } ?> value="<?=$secc['id_SA']?>"><?=$secc['cedula_alumno']." ".$secc['nombre_alumno']." ".$secc['apellido_alumno'];?></option>
                                    <?php 
                                      endif;
                                    endforeach;
                                    */
                                    ?>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="alumnosE"  class="mensajeError"></span>
                                </div>
                              </div>

                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="tutor">Tutor</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                  <select class="form-control select2 input-lg" style="width:100%;" name="tutor" placeholder="Ingresar tutor" id="tutor" required>
                                    <option value="">Seleccione un tutor</option>
                                    <?php
                                      foreach ($profesores as $prof):
                                        if(!empty($prof['cedula_profesor'])):
                                          ?>
                                          <option value="<?=$prof['cedula_profesor']?>"><?=$prof['cedula_profesor']."-".ucwords(mb_strtolower($prof['nombre_profesor']." ".$prof['apellido_profesor'])); ?></option>
                                          <?php 
                                        endif;
                                      endforeach;
                                    ?>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="tutorS" class="mensajeError"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <span type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</span>
                          <span type="submit" class="btn btn-primary" id="guardar">Guardar</span>
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
                    <th>Proyecto</th>
                    <!-- <th>Alumnos</th> -->
                    <th>Tutor</th>
                    <?php if ($amProyectosC==1||$amProyectosE==1||$amProyectosB==1): ?>
                    <th>Acciones</th>
                    <?php endif; ?>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
                foreach ($proyectos as $data):
                if(!empty($data['cod_proyecto'])):  
                ?>
                <tr>
                  <td style="width:5%">
                    <span class="contenido2">
                      <?php echo $num++; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['titulo_proyecto']; ?>
                      <?php 
                        if($data['trayecto_proyecto']=="1"){
                          $numeroTrayecto = "I";
                        }else if($data['trayecto_proyecto']=="2"){
                          $numeroTrayecto = "II";
                        }else if($data['trayecto_proyecto']=="3"){
                          $numeroTrayecto = "III";
                        }else if($data['trayecto_proyecto']=="4"){
                          $numeroTrayecto = "IV";
                        }
                        echo "Trayecto ".$numeroTrayecto; 
                      ?>
                    </span>
                  </td>

                  <!-- <td style="width:20%">
                    <span class="contenido2">
                      <?php 
                      foreach ($gruposAlumnos as $alumnos):
                        if (!empty($alumnos['cod_proyecto'])):
                          if ($alumnos['cod_proyecto']==$data['cod_proyecto']):
                            echo number_format($alumnos['cedula_alumno'],0,'','.')." ".$alumnos['nombre_alumno']." ".$alumnos['apellido_alumno']."<br>";
                          endif;
                        endif;
                      endforeach; ?>
                    </span>
                  </td> -->

                  <td style="width:20%">
                    <span class="contenido2">
                      <?php 
                      foreach ($profesores as $prof):
                        if (!empty($prof['cedula_profesor'])):
                          if ($prof['cedula_profesor']==$data['cedula_profesor']):
                            echo $prof['nombre_profesor']." ".$prof['apellido_profesor']."<br>";
                            echo "<small>".number_format($prof['cedula_profesor'],0,'','.')."</small>";
                          endif;
                        endif;
                      endforeach; ?>
                    </span>
                  </td>
                 
                  <?php if ($amProyectosC==1||$amProyectosE==1||$amProyectosB==1): ?>
                  <td style="width:10%">
                    <?php if ($amProyectosC==1): ?>
                      <button class="btn cargarBtn" style="border:0;background:none;color:green" value="<?php echo $data['cod_proyecto']?>">
                        <span class="fa fa-list"></span>
                      </button>

                      <!-- Cargar -->
                      <button type="button" id="cargarButton<?=$data['cod_proyecto']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalCargarAlumnos<?=$data['cod_proyecto']?>" style="display: none">Cargar</button>
                      <div id="modalCargarAlumnos<?=$data['cod_proyecto']?>" class="modal fade" role="dialog" style="text-align:left;">
                           
                        
                        <div class="modal-dialog tamModals" style="text-align:left;">
                          <?php #style="margin-right:auto;margin-left:auto;width:80%;" ?>

                          <div class="modal-content">

                              <!--=====================================
                              CABEZA DEL MODAL
                              ======================================-->

                              <div class="modal-header" style="background:#3c8dbc; color:white">

                                <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                                <h4 class="modal-title" style="text-align: left;">Proyecto <?php echo $data['titulo_proyecto'];?></h4>

                              </div>

                              <!--=====================================
                              CUERPO DEL MODAL
                              ======================================-->

                              <div class="modal-body">

                                <div class="box-body">

                                  <div class="table-responsive">
                                            
                                          <table class="datatable table table-striped text-center" style="text-align:center;width:100%;font-size:1em;">
                                              <thead>
                                                <tr>
                                                  <th>Nº</th>
                                                  <th>Cédula</th>
                                                  <th>Nombre y Apellido</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php 
                                                $numx = 1;
                                                // foreach ($seccionAlumnos as $dataAlum): if(!empty($dataAlum['cedula_alumno'])):  if($dataAlum['cod_seccion']==$data['cod_seccion']):
                                                foreach ($gruposAlumnos as $alumnos):
                                                  if (!empty($alumnos['cod_proyecto'])):
                                                    if ($alumnos['cod_proyecto']==$data['cod_proyecto']):
                                              ?>
                                                <tr>
                                                  <td style="width:5%">
                                                    <span class="contenido2">
                                                      <?php echo $numx++; ?>
                                                    </span>
                                                  </td>
                                                  <td style="width:20%">
                                                    <span class="contenido2">
                                                      <?php echo number_format($alumnos['cedula_alumno'],0,'','.'); ?>
                                                    </span>
                                                  </td>
                                                  <td style="width:20%">
                                                    <span class="contenido2">
                                                      <?php echo $alumnos['nombre_alumno']." ".$alumnos['apellido_alumno']; ?>
                                                    </span>
                                                  </td>
                                                </tr>
                                                <?php endif; endif; endforeach; ?>
                                              </tbody>
                                            
                                          </table>

                                  </div>


                                                     
                                </div>

                              </div>

                              <!--=====================================
                              PIE DEL MODAL
                              ======================================-->

                              <div class="modal-footer">

                                <span type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</span>


                              </div>



                          </div>

                        </div>
                      </div>
                      <!-- Cargar -->
                    <?php endif; ?>
                    <?php if ($amProyectosE==1): ?>
                      <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['cod_proyecto']?>">
                        <span class="fa fa-pencil"></span>
                      </button>

                      <!-- Modificar -->
                      <button type="button" id="modificarButton<?=$data['cod_proyecto']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarSeccion<?=$data['cod_proyecto']?>" style="display: none">Modificar</button>
                      <div id="modalModificarSeccion<?=$data['cod_proyecto']?>" class="modalModificarSeccion modal fade modalModificarSeccion<?=$data['cod_proyecto']?>" role="dialog" style="text-align:left;">
                        
                        <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;"><?php #style="margin-right:auto;margin-left:auto;width:80%;" ?>

                          <div class="modal-content">

                              <!--=====================================
                              CABEZA DEL MODAL
                              ======================================-->

                              <div class="modal-header" style="background:#3c8dbc; color:white">

                                <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                                <h4 class="modal-title" style="text-align: left;">Editar Proyecto</h4>

                              </div>

                              <!--=====================================
                              CUERPO DEL MODAL
                              ======================================-->

                              <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                <div class="box-body">

                                  <div class="row">
                                  
                                    <!-- ENTRADA PARA EL USUARIO -->
                                    <div class="form-group col-xs-12 col-sm-12">
                                      <label for="nombre<?=$data['cod_proyecto']?>">Nombre</label>
                                      <div class="input-group" style="width:100%;">
                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                        <input type="text" class="form-control input-lg" name="nombre" id="nombre<?=$data['cod_proyecto']?>" value="<?=$data['titulo_proyecto']?>" placeholder="Ingresar nombre" required>
                                      </div>
                                      <div style="width:100%;text-align:right;">
                                        <span id="nombreS<?=$data['cod_proyecto']?>" class="mensajeError"></span>
                                      </div>
                                    </div>


                                    <!-- ENTRADA PARA EL TRAYECTO -->
                                    <div class="form-group col-xs-12 col-sm-12" style="margin-top:2%;">
                                      <label for="trayecto<?=$data['cod_proyecto']?>">Trayecto</label>
                                      <div class="input-group" style="width:100%;">
                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                        <select class="form-control select2 input-lg trayectoModificar" style="width:100%;" name="<?=$data['cod_proyecto']?>" placeholder="Ingresar trayecto" id="trayecto<?=$data['cod_proyecto']?>" required>
                                          <option value="">Seleccione un trayecto</option>
                                          <option <?php if($data['trayecto_proyecto']=="1"){ echo "selected"; } ?> value="1">Trayecto I</option>
                                          <option <?php if($data['trayecto_proyecto']=="2"){ echo "selected"; } ?> value="2">Trayecto II</option>
                                          <option <?php if($data['trayecto_proyecto']=="3"){ echo "selected"; } ?> value="3">Trayecto III</option>
                                          <option <?php if($data['trayecto_proyecto']=="4"){ echo "selected"; } ?> value="4">Trayecto IV</option>
                                        </select>
                                      </div>
                                      <div style="width:100%;text-align:right;">
                                        <span id="trayectoS<?=$data['cod_proyecto']?>" class="mensajeError"></span>
                                      </div>
                                    </div>

                                    
                                    <!-- ENTRADA PARA LA SECCION -->
                                    <div class="form-group col-xs-12 col-sm-12" style="margin-top:2%;">
                                      <label for="seccion<?=$data['cod_proyecto']?>">sección</label>
                                      <div class="input-group " style="width:100%;">
                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                        <select class="form-control select2 input-lg seccionModificar" style="width:100%;" name="<?=$data['cod_proyecto']?>" placeholder="Ingresar seccion" id="seccion<?=$data['cod_proyecto']?>" required>
                                          <option value="">Seleccione una sección</option>
                                          <?php
                                          foreach ($secciones as $secc):
                                            if(!empty($secc['cod_seccion'])):
                                              if($secc['trayecto_seccion']==$data['trayecto_proyecto']):
                                          ?>
                                          <option 
                                            <?php foreach ($gruposSec as $grupos){ if (!empty($grupos['cod_seccion'])){ if($grupos['cod_proyecto'] == $data['cod_proyecto']){ if($grupos['cod_seccion'] == $secc['cod_seccion']){ echo "selected"; } } } } ?>
                                            value="<?=$secc['cod_seccion']?>"><?=mb_strtoupper($secc['nombre_seccion'])." (".$secc['year_periodo']."-".$secc['nombre_periodo'].")"; ?></option>
                                          <?php 
                                              endif; 
                                            endif;
                                          endforeach;
                                          ?>
                                        </select>
                                      </div>
                                      <div style="width:100%;text-align:right;">
                                        <span id="seccionS<?=$data['cod_proyecto']?>" class="mensajeError"></span>
                                      </div>
                                    </div>

                                    <!-- ENTRADA PARA LOS ALUMNOS -->
                                    <div class="form-group col-xs-12 col-sm-12" style="margin-top:2%;">
                                      <label for="alumnos<?=$data['cod_proyecto']?>">Alumnos</label>
                                      <div class="input-group " style="width:100%;">
                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                        <select class="form-control select2 input-lg" style="width:100%;" name="alumnos[]" placeholder="Ingresar alumnos" id="alumnos<?=$data['cod_proyecto']?>" multiple="multiple" required>
                                          <option value="">Seleccione los alumnos</option>
                                          <?php
                                          foreach ($secciones as $secc2):
                                            if(!empty($secc2['cod_seccion'])):
                                              if($secc2['trayecto_seccion']==$data['trayecto_proyecto']):
                                                foreach ($gruposSec as $grupos){ 
                                                  if (!empty($grupos['cod_seccion'])){ 
                                                    if($grupos['cod_proyecto'] == $data['cod_proyecto']){ 
                                                      if($grupos['cod_seccion'] == $secc2['cod_seccion']){ 
                                                        foreach ($seccionAlumnos as $secc):
                                                          if(!empty($secc['cedula_alumno'])):
                                                            if($secc2['cod_seccion']==$secc['cod_seccion']):
                                                          ?>
                                            <option <?php foreach ($gruposAlumnos as $grupos) {
                                              if(!empty($grupos['id_SA'])){
                                                if($grupos['id_SA']==$secc['id_SA']){
                                                  if($grupos['cod_proyecto']==$data['cod_proyecto']){
                                                    echo "selected";
                                                  }else{
                                                    echo "disabled";
                                                  }
                                                }
                                              }
                                            } ?>  value="<?=$secc['id_SA']?>"><?=$secc['cedula_alumno']." ".$secc['nombre_alumno']." ".$secc['apellido_alumno'];?></option>
                                                          <?php 
                                                            endif;
                                                          endif;
                                                        endforeach;
                                                      } 
                                                    } 
                                                  } 
                                                }
                                              endif; 
                                            endif;
                                          endforeach;
                                          ?>
                                        </select>
                                      </div>
                                      <div style="width:100%;text-align:right;">
                                        <span id="alumnosE<?=$data['cod_proyecto']?>" class="mensajeError"></span>
                                      </div>
                                    </div>


                                    <div class="form-group col-xs-12 col-sm-12">
                                      <label for="tutor<?=$data['cod_proyecto']?>">Tutor</label>
                                      <div class="input-group" style="width:100%;">
                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                        <select class="form-control select2 input-lg" style="width:100%;" name="tutor<?=$data['cod_proyecto']?>" placeholder="Ingresar tutor" id="tutor<?=$data['cod_proyecto']?>" required>
                                          <option value="">Seleccione un tutor</option>
                                          <?php
                                            foreach ($profesores as $prof):
                                              if(!empty($prof['cedula_profesor'])):
                                                ?>
                                                <option <?php if ($prof['cedula_profesor']==$data['cedula_profesor']){ echo "selected"; } ?> value="<?=$prof['cedula_profesor']?>"><?=$prof['cedula_profesor']."-".ucwords(mb_strtolower($prof['nombre_profesor']." ".$prof['apellido_profesor'])); ?></option>
                                                <?php 
                                              endif;
                                            endforeach;
                                          ?>
                                        </select>
                                      </div>
                                      <div style="width:100%;text-align:right;">
                                        <span id="tutorS<?=$data['cod_proyecto']?>" class="mensajeError"></span>
                                      </div>
                                    </div>


                                  </div>


                                                     
                                </div>

                              </div>

                              <!--=====================================
                              PIE DEL MODAL
                              ======================================-->

                              <div class="modal-footer">

                                <span type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</span>

                                <button type="submit" class="btn btn-primary modificarButtonModal" id="guardar" value="<?=$data['cod_proyecto']?>">Guardar</button>

                              </div>


                            

                          </div>

                        </div>
                      </div>
                      <!-- Modificar -->
                    <?php endif; ?>
                    <?php if ($amProyectosB==1): ?>
                      <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['cod_proyecto']?>">
                        <span class="fa fa-trash"></span>
                      </button>
                    <?php endif; ?>
                  </td>
                  <?php endif ?>
                      
                      
                </tr>
                <?php
               endif; endforeach;
                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nº</th>
                    <th>Proyecto</th>
                    <!-- <th>Alumnos</th> -->
                    <th>Tutor</th>
                    <?php if ($amProyectosC==1||$amProyectosE==1||$amProyectosB==1): ?>
                    <th>Acciones</th>
                    <?php endif; ?>
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
  

  <?php //require_once 'assets/aside-config.php'; ?>
</div>
<!-- ./wrapper -->


  <?php //require_once('assets/footered.php'); ?>
<input type="hidden" id="minimoAlumnos" value="2">
<input type="hidden" id="maximoAlumnos" value="5">
<?php if(!empty($response)): ?>
<input type="hidden" class="responses" value="<?php echo $response ?>">
<?php endif; ?>
  <script src="<?=_THEME_?>/js/proyectos.js"></script>
</body>
</html>

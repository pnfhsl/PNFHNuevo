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
        <li><a href="<?=_ROUTE_.$this->encriptar("Secciones"); ?>"><?php echo $url; ?></a></li>
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
                <?php if($amSeccionesR=="1"): ?>
                  <button class="btn enviar2" style=""  data-toggle="modal" data-target="#modalAgregarSeccion">Agregar Nuevo</button>
                    <!--=====================================
                      MODAL AGREGAR Seccion
                    ======================================-->
                  <div id="modalAgregarSeccion" class="modal fade" role="dialog" style="text-align:left;">
                    <div class="modal-dialog tamModals" style="text-align:left;">
                      <div class="modal-content">
                        <!--=====================================
                        CABEZA DEL MODAL
                        ======================================-->
                        <div class="modal-header" style="background:#3c8dbc; color:white">
                          <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>
                          <h4 class="modal-title" style="text-align: left;">Agregar Sección</h4>
                        </div>
                        <!--=====================================
                        CUERPO DEL MODAL
                        ======================================-->
                        <div class="modal-body" style="max-height:70vh;overflow:auto;">
                          <div class="box-body">
                            <!-- ENTRADA PARA EL USUARIO -->
                            <div class="row">
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="periodo">Período</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                  <select class="form-control select2 input-lg" style="width:100%;" name="periodo" placeholder="Ingresar periodo" id="periodo" required>
                                    <option value="">Seleccione un periodo</option>
                                    <?php
                                    foreach ($periodos as $per):
                                      if(!empty($per['id_periodo'])):
                                    ?>
                                    <option value="<?=$per['id_periodo']?>"><?=mb_strtoupper($per['year_periodo']."-".$per['nombre_periodo']); ?></option>
                                    <?php 
                                      endif;
                                    endforeach;
                                    ?>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="periodoS" class="mensajeError"></span>
                                </div>
                              </div>

                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="trayecto">Trayecto</label>
                                <div class="input-group " style="width:100%;">
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
                                  <span id="trayectoS" class="mensajeError"></span>
                                </div>
                              </div>

                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="nombre">Nombre</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                  <input type="text" class="form-control input-lg" name="nombre" id="nombre" placeholder="Ingresar nombre (Ej.: SH3001)" maxlength="6" required>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="nombreS" class="mensajeError"></span>
                                </div>
                              </div>

                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="alumnos">Alumnos</label>
                                <div class="input-group " style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                  <select class="form-control select2SeccionAlumnos input-lg" style="width:100%;" name="trayecto" placeholder="Cargar alumnos" id="alumnos" multiple="multiple" required>
                                    <option value="" disabled="">Cargar Alumnos</option>
                                     <?php
                                    foreach ($alumnos as $alum):
                                      if(!empty($alum['cedula_alumno'])):
                                    ?>
                                    <!-- <option  -->
                                      <?php
                                        // foreach ($seccionAlumnos as $key): if(!empty($key['cedula_alumno'])): if($key['cedula_alumno'] == $alum['cedula_alumno']):
                                        //   echo 'disabled="disabled"';
                                        // endif; endif; endforeach;
                                      ?>
                                     <!-- value="<?=$alum['cedula_alumno']?>"><?=mb_strtoupper($alum['cedula_alumno'])." ".$alum['nombre_alumno']." "."".$alum['apellido_alumno']." "?></option> -->
                                    <?php 
                                      endif;
                                    endforeach;
                                    ?>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="alumnosS" class="mensajeError"></span>
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
                  <th>Sección</th>
                  <th>Periodo</th>
                  <th>Trayecto</th>
                  <?php if ($amSeccionesC==1||$amSeccionesE==1||$amSeccionesB==1): ?>
                  <th>Acciones</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
                foreach ($secciones as $data):
                if(!empty($data['cod_seccion'])):  
                ?>
                <tr>
                  <td style="width:5%">
                    <span class="contenido2">
                      <?php echo $num++; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo mb_strtoupper($data['nombre_seccion']); ?>
                      <br>
                      <small>(<?=$data['year_periodo'];   ?>)</small>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['year_periodo']."-".mb_strtoupper($data['nombre_periodo']); ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php 
                        if($data['trayecto_seccion']=="1"){
                          $numeroTrayecto = "I";
                        }else if($data['trayecto_seccion']=="2"){
                          $numeroTrayecto = "II";
                        }else if($data['trayecto_seccion']=="3"){
                          $numeroTrayecto = "III";
                        }else if($data['trayecto_seccion']=="4"){
                          $numeroTrayecto = "IV";
                        }
                        echo "Trayecto ".$numeroTrayecto; 
                      ?>
                    </span>
                  </td>
                 
                  <?php if ($amSeccionesC==1||$amSeccionesE==1||$amSeccionesB==1): ?>
                  <td style="width:10%">
                        <!--Cargar los alumnos-->
                        <?php if ($amSeccionesC==1): ?>
                          <button class="btn CargarBtn" style="border:0;background:none;color:green" value="<?php echo $data['cod_seccion']?>">
                            <span class="fa fa-list"></span>
                          </button>


                          <!--Cargar-->
                          <button type="button" id="cargarButton<?=$data['cod_seccion']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalCargarAlumnos<?=$data['cod_seccion']?>" style="display: none;">Cargar</button>
                          <div id="modalCargarAlumnos<?=$data['cod_seccion']?>" class="modal fade" role="dialog" style="text-align:left;">
                               
                            
                            <div class="modal-dialog tamModals" style="text-align:left;">
                              <?php #style="margin-right:auto;margin-left:auto;width:80%;" ?>

                              <div class="modal-content">

                                  <!--=====================================
                                  CABEZA DEL MODAL
                                  ======================================-->

                                  <div class="modal-header" style="background:#3c8dbc; color:white">

                                    <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                                    <h4 class="modal-title" style="text-align: left;">Sección <?php echo $data['nombre_seccion'];?></h4>

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
                                                    foreach ($seccionAlumnos as $dataAlum): if(!empty($dataAlum['cedula_alumno'])):  if($dataAlum['cod_seccion']==$data['cod_seccion']):
                                                  ?>
                                                    <tr>
                                                      <td style="width:5%">
                                                        <span class="contenido2">
                                                          <?php echo $numx++; ?>
                                                        </span>
                                                      </td>
                                                      <td style="width:20%">
                                                        <span class="contenido2">
                                                          <?php echo number_format($dataAlum['cedula_alumno'],0,'','.'); ?>
                                                        </span>
                                                      </td>
                                                      <td style="width:20%">
                                                        <span class="contenido2">
                                                          <?php echo $dataAlum['nombre_alumno']." ".$dataAlum['apellido_alumno']; ?>
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
                          <!--Cargar-->
                          
                        <?php endif; ?>

                        <!-- Modificar -->
                        <?php if ($amSeccionesE==1): ?>
                          <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['cod_seccion']?>">
                            <span class="fa fa-pencil"></span>
                          </button>


                          <!--Modificar-->
                          <button type="button" id="modificarButton<?=$data['cod_seccion']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarSeccion<?=$data['cod_seccion']?>" style="display: none">Modificar</button>
                          <div id="modalModificarSeccion<?=$data['cod_seccion']?>" class="modal fade" role="dialog" style="text-align:left;">
                               
                            
                            <div class="modal-dialog tamModals" style="text-align:left;">
                              <?php #style="margin-right:auto;margin-left:auto;width:80%;" ?>

                              <div class="modal-content">

                                  <!--=====================================
                                  CABEZA DEL MODAL
                                  ======================================-->

                                  <div class="modal-header" style="background:#3c8dbc; color:white">
                                    <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>
                                    <h4 class="modal-title" style="text-align: left;">Editar Sección</h4>
                                  </div>
                                  <!--=====================================
                                  CUERPO DEL MODAL
                                  ======================================-->
                                  <div class="modal-body" style="max-height:70vh;overflow:auto;">
                                    <div class="box-body">
                                      <!-- ENTRADA PARA EL USUARIO -->
                                      <div class="row" style="">
                                        
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="periodo<?=$data['cod_seccion']?>">Período</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                            <select class="form-control select2 input-lg periodoModificar" style="width:100%;" name="<?=$data['cod_seccion']?>" placeholder="Ingresar periodo" id="periodo<?=$data['cod_seccion']?>" required readonly>
                                              <!-- <option value="">Seleccione un periodo</option> Nuevo Que este comentado --> 
                                              <?php
                                              foreach ($periodos as $per):
                                                if(!empty($per['id_periodo'])):
                                                  if($data['id_periodo']==$per['id_periodo']){ //Nuevo
                                              ?>
                                              <option <?php if($data['id_periodo']==$per['id_periodo']){ echo "selected"; } ?> value="<?=$per['id_periodo']; ?>"><?=mb_strtoupper($per['year_periodo']."-".$per['nombre_periodo']); ?></option>
                                              <?php

                                                  } //Nuevo
                                              
                                                endif;
                                              endforeach;
                                              ?>
                                            </select>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="periodoS<?=$data['cod_seccion']?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                        <div class="form-group col-xs-12 col-sm-12" style="margin-top:;">
                                          <label for="trayecto<?=$data['cod_seccion']?>">Trayecto</label>
                                          <div class="input-group " style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                            <select class="form-control select2 input-lg trayectoModificar" style="width:100%;" name="<?=$data['cod_seccion']?>" placeholder="Ingresar trayecto" id="trayecto<?=$data['cod_seccion']?>" required>
                                              <option value="">Seleccione un trayecto</option>
                                              <option <?php if($data['trayecto_seccion']=="1"){ echo "selected"; } ?> value="1">Trayecto I</option>
                                              <option <?php if($data['trayecto_seccion']=="2"){ echo "selected"; } ?> value="2">Trayecto II</option>
                                              <option <?php if($data['trayecto_seccion']=="3"){ echo "selected"; } ?> value="3">Trayecto III</option>
                                              <option <?php if($data['trayecto_seccion']=="4"){ echo "selected"; } ?> value="4">Trayecto IV</option>
                                            </select>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="trayectoS<?=$data['cod_seccion']?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                        <div class="form-group col-xs-12 col-sm-12" style="margin-top:;">
                                          <label for="nombre<?=$data['cod_seccion']?>">Nombre</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:7.5%;"><i class="fa fa-user"></i></span> 
                                            <input type="text" style="width:100%;" class="form-control input-lg nombreModificar" name="<?=$data['cod_seccion']?>" id="nombre<?=$data['cod_seccion']?>" value="<?=$data['nombre_seccion']?>" placeholder="Ingresar nombre" required>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="nombreS<?=$data['cod_seccion']?>" class="mensajeError"></span>
                                          </div>
                                        </div>
                                        
                                        <div class="form-group col-xs-12 col-sm-12" style="margin-top:;">
                                          <label for="alumnos<?=$data['cod_seccion']?>">Alumnos</label>
                                          <div class="input-group " style="width:100%;">
                                            <span class="input-group-addon" style="width:8%;"><i class="fa fa-address-card"></i></span> 
                                            <select class="form-control select2SeccionAlumnos input-lg alumnosModificar" style="width:100%;color:red;" name="<?=$data['cod_seccion']?>" placeholder="Cargar alumnos" id="alumnos<?=$data['cod_seccion']?>" multiple="multiple" required>
                                              <option value="" disabled="">Cargar Alumnos</option>
                                               <?php
                                              foreach ($alumnos as $alum):
                                                if(!empty($alum['cedula_alumno'])):
                                                  if($alum['trayecto_alumno']==$data['trayecto_seccion']){
                                              ?>
                                              <option 
                                                <?php foreach ($seccionAlumnos as $secAlum) {
                                                  if(!empty($secAlum['cedula_alumno'])){
                                                    if( ($data['id_periodo']==$secAlum['id_periodo']) && ($alum['trayecto_alumno']==$secAlum['trayecto_alumno']) ){
                                                      if( ($data['cod_seccion']==$secAlum['cod_seccion']) && ($alum['cedula_alumno']==$secAlum['cedula_alumno']) ){
                                                        echo "selected";
                                                      }else if( ($data['cod_seccion']!=$secAlum['cod_seccion']) && ($alum['cedula_alumno']==$secAlum['cedula_alumno']) ){
                                                        echo "disabled";
                                                      }
                                                    }
                                                  }
                                                } ?> 
                                                value="<?=$alum['cedula_alumno']?>" ><?=$alum['cedula_alumno']." ".ucwords(mb_strtolower($alum['nombre_alumno']))." "."".ucwords(mb_strtolower($alum['apellido_alumno']))." "?></option>
                                              <?php 
                                                  }
                                                endif;
                                              endforeach;
                                              ?>
                                            </select>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="alumnosS<?=$data['cod_seccion']?>" class="mensajeError"></span>
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
                                    <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$data['cod_seccion']?>" id="modificar">Guardar</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <!--Modificar-->

                        <?php endif; ?>

                        <!-- Eliminar -->
                        <?php if ($amSeccionesB==1): ?>
                          <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['cod_seccion']?>">
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
                  <th>Sección</th>
                  <th>Periodo</th>
                  <th>Trayecto</th>
                  <?php if ($amSeccionesC==1||$amSeccionesE==1||$amSeccionesB==1): ?>
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

<input type="hidden" id="minimoAlumnos" value="2">
<input type="hidden" id="maximoAlumnos" value="40">
  <?php //require_once('assets/footered.php'); ?>
<?php if(!empty($response)): ?>
<input type="hidden" class="responses" value="<?php echo $response ?>">
<?php endif; ?>
  <script src="<?=_THEME_?>/js/secciones.js"></script>
</body>
</html>

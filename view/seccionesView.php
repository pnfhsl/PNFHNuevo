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
              <div class="col-xs-12 col-sm-6" style="text-align:right">
                <button class="btn enviar2" style=""  data-toggle="modal" data-target="#modalAgregarSeccion">Agregar Nuevo</button>
                  <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">

                 <!--=====================================
              MODAL AGREGAR Seccion
              ======================================-->

              <div id="modalAgregarSeccion" class="modal fade" role="dialog" style="text-align:left;">
                <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;"><?php #style="margin-right:auto;margin-left:auto;width:80%;" ?>
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
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>---</th>
                  <?php //endif ?>
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
                 
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <td style="width:10%">
                    <!-- <table style="background:none;text-align:center;width:100%"> -->
                      <!-- <tr> -->
                        <?php //if ($amUsuariosE==1): ?>
                        <!-- <td style="width:50%"> -->

                      <!--Cargar los alumnos-->
                         <button class="btn CargarBtn" style="border:0;background:none;color:green" value="<?php echo $data['cod_seccion']?>">
                            <span class="fa fa-list"></span>
                          </button>

                                      <!--Cargar-->
              <button type="button" id="cargarButton<?=$data['cod_seccion']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalCargarAlumnos<?=$data['cod_seccion']?>" style="display: none;">Cargar</button>
              
              <div id="modalCargarAlumnos<?=$data['cod_seccion']?>" class="modal fade" role="dialog" style="text-align:left;">
                   
                
                <div class="modal-dialog" ><?php #style="margin-right:auto;margin-left:auto;width:80%;" ?>

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
                                              <?php echo $dataAlum['cedula_alumno']; ?>
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
              


                     <!--Modificar-->
                          <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['cod_seccion']?>">
                            <span class="fa fa-pencil">
                              
                            </span>
                          </button>

                          <!--Modificar-->
              <button type="button" id="modificarButton<?=$data['cod_seccion']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarSeccion<?=$data['cod_seccion']?>" style="display: none">Modificar</button>

              <div id="modalModificarSeccion<?=$data['cod_seccion']?>" class="modal fade" role="dialog" style="text-align:left;">
                   
                
                <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;"><?php #style="margin-right:auto;margin-left:auto;width:80%;" ?>

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
                                <select class="form-control select2 input-lg periodoModificar" style="width:100%;" name="<?=$data['cod_seccion']?>" placeholder="Ingresar periodo" id="periodo<?=$data['cod_seccion']?>" required>
                                  <option value="">Seleccione un periodo</option>
                                  <?php
                                  foreach ($periodos as $per):
                                    if(!empty($per['id_periodo'])):
                                  ?>
                                  <option <?php if($data['id_periodo']==$per['id_periodo']){ echo "selected"; } ?> value="<?=$per['id_periodo']?>"><?=mb_strtoupper($per['year_periodo']."-".$per['nombre_periodo']); ?></option>
                                  <?php 
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
                                  <option <?php foreach ($seccionAlumnos as $secAlum) {
                                    if(!empty($secAlum['cedula_alumno'])){
                                        if($secAlum['cedula_alumno'] == $alum['cedula_alumno']){
                                          if($secAlum['cod_seccion'] == $data['cod_seccion']){
                                            echo "selected";
                                          }else{
                                            echo "disabled";
                                          }
                                        }
                                    }
                                  } ?> value="<?=$alum['cedula_alumno']?>" ><?=$alum['cedula_alumno']." ".ucwords(mb_strtolower($alum['nombre_alumno']))." "."".ucwords(mb_strtolower($alum['apellido_alumno']))." "?></option>
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
                        <!-- </td> -->
                        <?php //endif; ?>
                        <?php //if ($amUsuariosB==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['cod_seccion']?>">
                            <span class="fa fa-trash"></span>
                          </button>
                        <!-- </td> -->
                        <?php //endif; ?>
                      <!-- </tr> -->
                    <!-- </table> -->
                  </td>
                  <?php //endif ?>
                      
                      
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
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>---</th>
                  <?php //endif ?>
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
<script>
$(document).ready(function(){ 

  $('#nombre').on('input', function () {      
    this.value = this.value.replace(/[^0-9 H S h s]/g,''); });
    // this.value = this.value.replace(/[^0-9- H h S s ]/g,''); });
  $('.nombreModificar').on('input', function () {      
    this.value = this.value.replace(/[^0-9 H S h s]/g,''); });
  $("#alumnos").change(function(){
    var alumnos = $(this).val();
    if(alumnos.length == 0){
      $("#alumnosS").html("Seleccione los alumnos para conformar la sección");
    }else{
      var minimo = $("#minimoAlumnos").val();
      var maximo = $("#maximoAlumnos").val();
      if(alumnos.length >= minimo && alumnos.length <= maximo ){
        ralumnos = true;
        $("#alumnosS").html("");
      }else{
        $("#alumnosS").html("Debe seleccionar entre "+minimo+" y "+maximo+" alumnos para conformar la sección");
      }
    }
  });

  $(".alumnosModificar").change(function(){
    var id = $(this).attr("name");
    var alumnos = $("#alumnos"+id).val();
    if(alumnos.length == 0){
      $("#alumnosS"+id).html("Seleccione los alumnos para conformar la sección");
    }else{
      var minimo = $("#minimoAlumnos").val();
      var maximo = $("#maximoAlumnos").val();
      if(alumnos.length >= minimo && alumnos.length <= maximo ){
        ralumnos = true;
        $("#alumnosS"+id).html("");
      }else{
        $("#alumnosS"+id).html("Debe seleccionar entre "+minimo+" y "+maximo+" alumnos para conformar la sección");
      }
    }
  }); 

  $('#trayecto').change(function(){
    var url = $("#url").val();
    var trayecto = $(this).val();
    if(trayecto==""){
      var html = '';
      html += '<option disabled="" value="">Cargar Alumnos</option>';
      $("#alumnos").html(html);

    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          alumnos: true,   
          trayecto: trayecto,       
        },
        success: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            var dataSecciones = "";
            if(resp.msjSecciones=="Good"){
              dataSecciones = resp.dataSecciones;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("SECCIONES: ");
            // console.log(dataSecciones);
            // console.log(data);
            // console.log($("#alumnos").html());
            var html = '';
            html += '<option disabled="" value="">Cargar Alumnos</option>';
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['cedula_alumno']+'"';
              if(dataSecciones.length>0){
                for (var j = 0; j < dataSecciones.length; j++) {
                  if(dataSecciones[j]['trayecto_alumno']==data[i]['trayecto_alumno']){
                    html += 'disabled="disabled"'
                  }
                }
              }
              html += '>'+data[i]['cedula_alumno']+" "+data[i]['nombre_alumno']+" "+data[i]['apellido_alumno']+'</option>';
            }
            $("#alumnos").html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option disabled="" value="">Cargar Alumnos</option>';
            $("#alumnos").html(html);
          }
        },
        error: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);
          console.log(resp);
        }
      });
    }
  });

  $('.trayectoModificar').change(function(){
    var url = $("#url").val();

    var id = $(this).attr("name");
    // console.log(id);
    var trayecto = $(this).val();
    if(trayecto==""){
      var html = '';
      html += '<option disabled="" value="">Cargar Alumnos</option>';
      $("#alumnos"+id).html(html);

    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          alumnos: true,   
          trayecto: trayecto,       
        },
        success: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            var dataSecciones = "";
            if(resp.msjSecciones=="Good"){
              dataSecciones = resp.dataSecciones;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("SECCIONES: ");
            // console.log(dataSecciones);
            // console.log(data);
            // console.log($("#alumnos"+id).html());
            var html = '';
            html += '<option disabled="" value="">Cargar Alumnos</option>';
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['cedula_alumno']+'"';
              if(dataSecciones.length>0){
                for (var j = 0; j < dataSecciones.length; j++) {
                  if(dataSecciones[j]['cedula_alumno']==data[i]['cedula_alumno']){
                    if(dataSecciones[j]['cod_seccion']==id){
                      html += 'selected="selected"';
                    }else{
                      html += 'disabled="disabled"';
                    }
                  }
                }
              }
              html += '>'+data[i]['cedula_alumno']+" "+data[i]['nombre_alumno']+" "+data[i]['apellido_alumno']+'</option>';
            }
            $("#alumnos"+id).html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option disabled="" value="">Cargar Alumnos</option>';
            $("#alumnos"+id).html(html);
          }
        },
        error: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);
          console.log(resp);
        }
      });
    }
  });

  $(".modificarButtonModal").click(function(){
    var url = $("#url").val();
    var id = $(this).val();
    var response = validar(true, id);
    if(response){
      swal.fire({ 
          title: "¿Desea guardar los datos?",
          text: "Se guardaran los datos, ¿desea continuar?",
          type: "question",
          showCancelButton: true,
          confirmButtonText: "¡Guardar!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){ 

            let nombre = $("#nombreeditar"+id).val();  
            let periodo = $("#periodoeditar"+id).val();     
            let trayecto = $("#trayectoeditar"+id).val();
            let alumnos = $("#alumnoseditar"+id).val();
            
            // alert(id + " " + nombre + " " + periodo + " " + trayecto + " ");
            // alert(id + " " + nombre + " " + periodo + " " + trayecto + " " + alumnos);

            $.ajax({
              url: url+'/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,   
                codigo: id,   
                seccion: nombre,       
                periodo: periodo,
                trayecto: trayecto,
                alumnos: alumnos,
              },
              success: function(resp){
                // alert(resp);
              /*window.alert("Hola mundo");   
              console.log(resp); 
                window.alert(resp);*/
                var datos = JSON.parse(resp);   
                if (datos.msj === "Good") {   
                    Swal.fire({
                      type: 'success',
                      title: '¡Modificacion Exitosa!', 
                      text: 'Se ha modificado la seccion en el sistema', 
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    }).then((isConfirm) => {
                        location.reload();
                    } );
                  } 
                  if (datos.msj === "Repetido") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Registro repetido!',
                      text: 'La seccion ya esta agregada al sistema',
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    });
                  }
                  if (datos.msj === "Error") {   
                    Swal.fire({
                      type: 'error',
                      title: '¡Error la guardar los cambio!',
                      text: 'Intente de nuevo, si el error persiste por favor contacte con el soporte',
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    });
                  }   
                  if (datos.msj === "Vacio") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Debe rellenar todos los campos!',
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    });
                  }   
              },
              error: function(respuesta){       
                var datos = JSON.parse(respuesta);
                console.log(datos);

              }

            });
          }else { 
              swal.fire({
                  type: 'error',
                  title: '¡Proceso cancelado!',
              });
          } 
      });
    }
  });

  $(".modificarBtn").click(function(){
    var url = $("#url").val();
    swal.fire({ 
          title: "¿Desea modificar los datos?",
          text: "Se movera al formulario para modificar los datos, ¿desea continuar?",
          type: "question",
          showCancelButton: true,
          confirmButtonText: "¡Si!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){            
            let cod_seccion = $(this).val();
            // alert(cod_seccion);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                cod_seccion: cod_seccion,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") {  
                  $("#modificarButton"+cod_seccion).click(); 
                }        
              },
              error: function(respuesta){       
                // alert(respuesta);
                var resp = JSON.parse(respuesta);
                console.log(resp);
              }

            });

          }else { 
              swal.fire({
                  type: 'error',
                  title: '¡Proceso cancelado!',
              });
          } 
      });
  });

  $(".CargarBtn").click(function(){
    var url = $("#url").val();
    swal.fire({ 
          title: "¿Desea cargar los datos de los alumnos?",
          text: "Se movera al formulario para cargar los datos, ¿desea continuar?",
          type: "question",
          showCancelButton: true,
          confirmButtonText: "¡Si!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){            
            /*window.alert($(this).val());*/
            let cod_seccion = $(this).val();
             // alert(cod_seccion);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                cod_seccion: cod_seccion,       
              },
              success: function(respuesta){       
                 // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                 // alert(resp.msj);
                if (resp.msj == "Good") {  
                  $("#cargarButton"+cod_seccion).click(); 
                }        
              },
              error: function(respuesta){       
                // alert(respuesta);
                var resp = JSON.parse(respuesta);
                console.log(resp);
              }

            });

          }else { 
              swal.fire({
                  type: 'error',
                  title: '¡Proceso cancelado!',
              });
          } 
      });
  });

  $(".eliminarBtn").click(function(){
    var url = $("#url").val();
      swal.fire({ 
          title: "¿Desea borrar los datos?",
          text: "Se borraran los datos escogidos, ¿desea continuar?",
          type: "error",
          showCancelButton: true,
          confirmButtonText: "¡Si!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){            
      
                swal.fire({ 
                    title: "¿Esta seguro de borrar los datos?",
                    text: "Se borraran los datos, esta opcion no se puede deshacer, ¿desea continuar?",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonText: "¡Si!",
                    cancelButtonText: "No", 
                    closeOnConfirm: false,
                    closeOnCancel: false 
                }).then((isConfirm) => {
                    if (isConfirm.value){                      
                      var cod = $(this).val();
                      // alert(cod);
                      $.ajax({
                        url: url+'/Eliminar',    
                        type: 'POST',   
                        data: {
                          Eliminar: true,   
                          cod_seccion: cod,
                        },
                        success: function(respuesta){       
                          // alert(respuesta);
                          var datos = JSON.parse(respuesta);
                          if (datos.msj === "Good") {   
                            Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado la seccion ' + datos.data.nombre_seccion + ' del sistema',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            }).then((isConfirm) => {
                                location.reload();
                            } );
                          } 
                          if (datos.msj === "Repetido") {   
                            Swal.fire({
                              type: 'warning',
                              title: '¡Registro repetido!',
                              text: 'La seccion cargada ya esta agregada al sistema',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            });
                          }
                          if (datos.msj === "Error") {   
                            Swal.fire({
                              type: 'error',
                              title: '¡Error la guardar los cambio!',
                              text: 'Intente de nuevo, si el error persiste por favor contacte con el soporte',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            });
                          }     
                          if (datos.msj === "Vacio") {   
                            Swal.fire({
                              type: 'warning',
                              title: '¡Debe rellenar todos los campos!',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            });
                          }        
                        },
                        error: function(respuesta){       
                          var data = JSON.parse(respuesta);
                          console.log(data);

                        }

                      });
                    }else { 
                        swal.fire({
                            type: 'error',
                            title: '¡Proceso cancelado!',
                        });
                    } 
                });

          }else { 
              swal.fire({
                  type: 'error',
                  title: '¡Proceso cancelado!',
              });
          } 
      });
  });

  $("#guardar").click(function(){
    var url = $("#url").val();
    var response = validar();
    if(response){

      swal.fire({ 
            title: "¿Desea guardar los datos?",
            text: "Se guardaran los datos, ¿desea continuar?",
            type: "question",
            showCancelButton: true,
            confirmButtonText: "¡Guardar!",
            cancelButtonText: "No", 
            closeOnConfirm: false,
            closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){ 


            let nombre = $("#nombre").val();     
            let periodo = $("#periodo").val();     
            let trayecto = $("#trayecto").val();   
            let alumnos = $("#alumnos").val();

            //alert(nombre + ' ' + periodo + ' ' + trayecto + ' '+ alumnos);
              $.ajax({
                url: url+'/Agregar',    
                type: 'POST',   
                data: {
                  Agregar: true,   
                  nombre: nombre,       
                  periodo: periodo,       
                  trayecto: trayecto,
                  alumnos: alumnos,

                },
                success: function(resp){
                  // alert(resp);
                /*window.alert("Hola mundo");   
                console.log(resp); 
                  window.alert(resp);*/
                  var datos = JSON.parse(resp);     
                    if (datos.msj === "Good") {   
                      Swal.fire({
                        type: 'success',
                        title: '¡Registro Exitoso!',
                        text: 'Se ha agregado la seccion ' + nombre + ' al sistema',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      }).then((isConfirm) => {
                          location.reload();
                      } );
                    } 
                    if (datos.msj === "Repetido") {   
                      Swal.fire({
                        type: 'warning',
                        title: '¡Registro repetido!',
                        text: 'El profesor ' + nombre + ' ' + apellido + ' ya esta agregado al sistema',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      });
                    }
                    if (datos.msj === "Error") {   
                      Swal.fire({
                        type: 'error',
                        title: '¡Error la guardar los cambio!',
                        text: 'Intente de nuevo, si el error persiste por favor contacte con el soporte',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      });
                    }     
                    if (datos.msj === "Vacio") {   
                      Swal.fire({
                        type: 'warning',
                        title: '¡Debe rellenar todos los campos!',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      });
                    }     
                },
                error: function(respuesta){       
                  var datos = JSON.parse(respuesta);
                  console.log(datos);

                }

              });
          }else { 
                swal.fire({
                    type: 'error',
                    title: '¡Proceso cancelado!',
                });
          } 
      });

    }

  });
});  

function validar(modificar = false, id=""){
  var form = "";
  if(!modificar){
    form = "#modalAgregarSeccion";
  }else{
    form = "#modalModificarSeccion"+id;
  }

  var nombre = $(form+" #nombre"+id).val();
  var rnombre = false;
  if(nombre.length > 2){ 
    rnombre = true;
    $(form+" #nombreS"+id).html("");
  }else{
    $(form+" #nombreS"+id).html("Debe ingresar el nombre de la sección");
  }

  var periodo = $(form+" #periodo"+id).val();
  var rperiodo = false;
  if(periodo == ""){
    $(form+" #periodoS"+id).html("Seleccione el periodo para la sección");
  }else{
    rperiodo = true;
    $(form+" #periodoS"+id).html("");
  }

  var trayecto = $(form+" #trayecto"+id).val();
  var rtrayecto = false;
  if(trayecto == ""){
    $(form+" #trayectoS"+id).html("Seleccione un trayecto para la sección");
  }else{
    rtrayecto = true;
    $(form+" #trayectoS"+id).html("");
  }

  var alumnos = $(form+" #alumnos"+id).val();
  var ralumnos = false;
  // alert(alumnos.length);
  if(alumnos.length == 0){
    $(form+" #alumnosS"+id).html("Seleccione los alumnos para conformar la sección");
  }else{
    var minimo = $("#minimoAlumnos").val();
    var maximo = $("#maximoAlumnos").val();
    if(alumnos.length >= minimo && alumnos.length <= maximo ){
      ralumnos = true;
      $(form+" #alumnosS"+id).html("");
    }else{
      $(form+" #alumnosS"+id).html("Debe seleccionar entre "+minimo+" y "+maximo+" alumnos para conformar la sección");
    }
  }


  var validado = false;
  if(rnombre==true && rperiodo==true && rtrayecto==true && ralumnos==true){
    validado=true;
  }else{
    validado=false;
  }
  
  // alert(validado);
  return validado;
}
</script>
</body>
</html>

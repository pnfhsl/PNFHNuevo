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
              <div class="col-xs-12 col-sm-6" style="text-align:right">
                <button class="btn enviar2" style=""  data-toggle="modal" data-target="#modalAgregarSeccion">Agregar Nuevo</button>
                  <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">

                 <!--=====================================
              MODAL AGREGAR Seccion
              ======================================-->

              <div id="modalAgregarSeccion" class="modalAgregarSeccion modal fade" role="dialog" style="text-align:left;">
                <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">

                  <div class="modal-content">

                    <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                      <!--=====================================
                      CABEZA DEL MODAL
                      ======================================-->
                <?php //print_r($gruposAlumnos); ?>

                      <div class="modal-header" style="background:#3c8dbc; color:white">

                        <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                        <h4 class="modal-title" style="text-align: left;">Agregar Proyecto</h4>

                      </div>

                      <!--=====================================
                      CUERPO DEL MODAL
                      ======================================-->

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
                  <th>Proyecto</th>
                  <th>Alumnos</th>
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>Acciones</th>
                  <?php //endif ?>
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
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php 
                      foreach ($gruposAlumnos as $alumnos):
                        if (!empty($alumnos['cod_proyecto'])):
                          if ($alumnos['cod_proyecto']==$data['cod_proyecto']):
                            echo $alumnos['cedula_alumno']." ".$alumnos['nombre_alumno']." ".$alumnos['apellido_alumno']."<br>";
                          endif;
                        endif;
                      endforeach; ?>
                    </span>
                  </td>
                 
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <td style="width:10%">
                    <!-- <table style="background:none;text-align:center;width:100%"> -->
                      <!-- <tr> -->
                        <?php //if ($amUsuariosE==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['cod_proyecto']?>">
                            <span class="fa fa-pencil">
                              
                            </span>
                          </button>
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
                                    value="<?=$secc['cod_seccion']?>"><?=mb_strtoupper($secc['nombre_seccion']).""; ?></option>
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
                        <!-- </td> -->
                        <?php //endif; ?>
                        <?php //if ($amUsuariosB==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['cod_proyecto']?>">
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
                  <th>Proyecto</th>
                  <th>Alumnos</th>
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>Acciones</th>
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


  <?php //require_once('assets/footered.php'); ?>
<input type="hidden" id="minimoAlumnos" value="2">
<input type="hidden" id="maximoAlumnos" value="5">
<?php if(!empty($response)): ?>
<input type="hidden" class="responses" value="<?php echo $response ?>">
<?php endif; ?>
<script>
$(document).ready(function(){ 

  $('#nombre').on('input', function () {      
    this.value = this.value.replace(/[^a-zA-Z Ñ ñ Á á É é Í í Ó ó Ú ú ]/g,''); });

  // $('#alumnos').on('input', function () {      
  //   this.value = this.value.replace(/[^a-zA-Z Ñ ñ Á á É é Í í Ó ó Ú ú ]/g,''); });
    
  $('#trayecto').change(function(){
    var url = $("#url").val();
    var trayecto = $(this).val();
    if(trayecto==""){
      var html = '';
      html += '<option value="">Seleccione una sección</option>';
      $("#seccion").html(html);

      var html2 = '';
      html2 += '<option disabled="" value="">Seleccione los alumnos</option>';
      $("#alumnos"+id).html(html2);

    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          secciones: true,   
          trayecto: trayecto,       
        },
        success: function(respuesta){
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            // console.log(data);
            // console.log($("#seccion").html());
            var html = '';
            html += '<option value="">Seleccione una sección</option>';
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['cod_seccion']+'">'+data[i]['nombre_seccion']+'</option>';
            }
            $("#seccion").html(html);

            var html2 = '';
            html2 += '<option disabled="" value="">Seleccione los alumnos</option>';
            $("#alumnos"+id).html(html2);

          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option value="">Seleccione una sección</option>';
            $("#seccion").html(html);

            var html2 = '';
            html2 += '<option disabled="" value="">Seleccione los alumnos</option>';
            $("#alumnos"+id).html(html2);
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
    var trayecto = $(this).val();
    if(trayecto==""){
      var html = '';
      html += '<option value="">Seleccione una sección</option>';
      $("#seccion"+id).html(html);

      var html2 = '';
      html2 += '<option disabled="" value="">Seleccione los alumnos</option>';
      $("#alumnos"+id).html(html2);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          secciones: true,   
          trayecto: trayecto,       
        },
        success: function(respuesta){       
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            // console.log(data);
            // console.log($("#seccion").html());
            var html = '';
            html += '<option value="">Seleccione una sección</option>';
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['cod_seccion']+'">'+data[i]['nombre_seccion']+'</option>';
            }
            $("#seccion"+id).html(html);

            var html2 = '';
            html2 += '<option disabled="" value="">Seleccione los alumnos</option>';
            $("#alumnos"+id).html(html2);

          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option value="">Seleccione una sección</option>';
            $("#seccion"+id).html(html);

            var html2 = '';
            html2 += '<option disabled="" value="">Seleccione los alumnos</option>';
            $("#alumnos"+id).html(html2);

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

  $('#seccion').change(function(){
    var url = $("#url").val();

    var seccion = $(this).val();
    if(seccion==""){
      var html = '';
      html += '<option disabled="" value="">Seleccione los alumnos</option>';
      $("#alumnos").html(html);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          alumnos: true,   
          cod_seccion: seccion,       
        },
        success: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            var dataProyectos = "";
            if(resp.msjProyectos=="Good"){
              dataProyectos = resp.dataProyectos;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("PROYECTOS: ");
            // console.log(dataProyectos);
            // console.log($("#alumnos").html());
            var html = '';
            html += '<option disabled="" value="">Seleccione los alumnos</option>';
            // alert(dataProyectos);
            // alert(dataProyectos);
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['id_SA']+'" ';

              if(dataProyectos.length>0){
                for (var j = 0; j < dataProyectos.length; j++) {
                  if(dataProyectos[j]['id_SA']==data[i]['id_SA']){
                    html += 'disabled="disabled"'
                  }
                }
              }
              
              html += ' >'+data[i]['cedula_alumno']+' '+data[i]['nombre_alumno']+' '+data[i]['apellido_alumno']+'</option>';
            }

            $("#alumnos").html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option disabled="" value="">Seleccione los alumnos</option>';
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

  $('.seccionModificar').change(function(){

    var url = $("#url").val();
    var id = $(this).attr("name");
    var seccion = $(this).val();
    if(seccion==""){
      var html = '';
      html += '<option disabled="" value="">Seleccione los alumnos</option>';
      $("#alumnos"+id).html(html);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          alumnos: true,   
          cod_seccion: seccion,       
        },
        success: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            var dataProyectos = "";
            if(resp.msjProyectos=="Good"){
              dataProyectos = resp.dataProyectos;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("PROYECTOS: ");
            // console.log(dataProyectos);
            // console.log($("#alumnos"+id).html());
            var html = '';
            html += '<option disabled="" value="">Seleccione los alumnos</option>';
            // alert(dataProyectos);
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['id_SA']+'" ';

              if(dataProyectos.length>0){
                for (var j = 0; j < dataProyectos.length; j++) {
                  if(dataProyectos[j]['id_SA']==data[i]['id_SA']){
                    if(dataProyectos[j]['cod_proyecto']==id){
                      html += 'selected="selected"'
                    }else{
                      html += 'disabled="disabled"'
                    }
                  }
                }
              }
              
              html += ' >'+data[i]['cedula_alumno']+' '+data[i]['nombre_alumno']+' '+data[i]['apellido_alumno']+'</option>';
            }

            $("#alumnos"+id).html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option disabled="" value="">Seleccione los alumnos</option>';
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


  $("#alumnos").change(function(){
    var alumnos = $(this).val();
    var minimo = $("#minimoAlumnos").val();
    var maximo = $("#maximoAlumnos").val();
    // if (Object.keys($(this).val()).length > (maximo)) {
    //   $('option[value="' + $(this).val().toString().split(',')[maximo] + '"]').prop('selected', false);
    // }
    if(alumnos.length == 0){
      $("#alumnosE").html("Seleccione los alumnos para conformar el proyecto");
    }else{
      if(alumnos.length >= minimo && alumnos.length <= maximo ){
        ralumnos = true;
        $("#alumnosE").html("");
      }else{
        if(alumnos.length > (maximo)){
          // var xd = $(".boxalumnos .select2 .selection .select2-selection .select2-selection__rendered");
        }
        $("#alumnosE").html("Debe seleccionar entre "+minimo+" y "+maximo+" alumnos para conformar el proyecto");
      }
      var alumnos = $(this).val();
      console.log(alumnos);
    }
  });

  $(".modificarButtonModal").click(function(){

    var url = $("#url").val();
    var id = $(this).val();
    // alert(id);
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

            let nombre = $("#nombre"+id).val();     
            let trayecto = $("#trayecto"+id).val();
            let seccion = $("#seccion"+id).val();     
            let alumnos = $("#alumnos"+id).val();   

           /* alert(id+" "+nombre+" "+trayecto+" "+seccion+" "+alumnos);
            console.log(alumnos);*/
            $.ajax({
              url: url+'/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,   
                codigo: id,   
                nombre: nombre,       
                trayecto: trayecto,
                seccion: seccion,
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
                      text: 'Se ha modificado el proyecto en el sistema', 
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    }).then((isConfirm) => {
                        location.reload();
                    } );
                  } 
                  if (datos.msj === "Repetido") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Registro repetido!',
                      text: 'El proyecto ya esta agregado al sistema',
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
            /*window.alert($(this).val());*/
            let cod_proyecto = $(this).val();
            // alert(cod_proyecto);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                cod_proyecto: cod_proyecto,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") {  
                  $("#modificarButton"+cod_proyecto).click(); 
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
                          cod_proyecto: cod,
                        },
                        success: function(respuesta){       
                          // alert(respuesta);
                          var datos = JSON.parse(respuesta);
                          if (datos.msj === "Good") {   
                            Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado el proyecto ' + datos.data.titulo_proyecto + ' del sistema',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            }).then((isConfirm) => {
                                location.reload();
                            } );
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
            let trayecto = $("#trayecto").val();
            let seccion = $("#seccion").val();     
            let alumnos = $("#alumnos").val();     

            // alert(nombre + ' ' + seccion + ' ' + trayecto+ ' ' + alumnos);
              $.ajax({
                url: url+'/Agregar',
                type: 'POST',   
                data: {
                  Agregar: true,   
                  nombre: nombre,       
                  trayecto: trayecto,
                  seccion: seccion,
                  alumnos: alumnos       
                },
                success: function(resp){
                  // alert(resp);
                // window.alert("Hola mundo");   
                // console.log(resp); 
                  // window.alert(resp);
                  var datos = JSON.parse(resp);     
                    if (datos.msj === "Good") {   
                      Swal.fire({
                        type: 'success',
                        title: '¡Registro Exitoso!',
                        text: 'Se ha agregado el proyecto ' + nombre + ' al sistema',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      }).then((isConfirm) => {
                          location.reload();
                      } );
                    } 
                    if (datos.msj === "Repetido") {   
                      Swal.fire({
                        type: 'warning',
                        title: '¡Registro repetido!',
                        text: 'El proyecto ' + nombre + ' ya esta agregado al sistema',
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
    $(form+" #nombreS"+id).html("Debe ingresar el nombre del proyecto");
  }

  

  var trayecto = $(form+" #trayecto"+id).val();
  var rtrayecto = false;
  if(trayecto == ""){
    $(form+" #trayectoS"+id).html("Seleccione un trayecto para el proyecto");
  }else{
    rtrayecto = true;
    $(form+" #trayectoS"+id).html("");
  }

  var seccion = $(form+" #seccion"+id).val();
  var rseccion = false;
  if(seccion == ""){
    $(form+" #seccionS"+id).html("Seleccione una sección para el proyecto");
  }else{
    rseccion = true;
    $(form+" #seccionS"+id).html("");
  }

  var alumno = $(form+" #alumnos"+id).val();    
  var ralumno = false;    
  if(alumno.length===0){     
    $(form+" #alumnosE"+id).html("Seleccione los alumnos para el proyecto");   
  }else{    
    var minimo = $("#minimoAlumnos").val();
    var maximo = $("#maximoAlumnos").val();
    if(alumno.length >= minimo && alumno.length <= maximo ){
      ralumno = true;     
      $(form+" #alumnosE"+id).html("");   
    }else{
      $(form+" #alumnosE"+id).html("Debe seleccionar entre "+minimo+" y "+maximo+" alumnos para conformar el proyecto");
    }
  }


  var validado = false;
  if(rnombre==true && rtrayecto==true && rseccion==true && ralumno==true){
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

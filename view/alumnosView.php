<!DOCTYPE html>
<html>
<head>
  <title><?php echo _NAMESYSTEM_; ?> | <?php if(!empty($action)){echo $action; } ?> <?php if(!empty($url)){echo $url;} ?></title>
  <?php //require_once('assets/headers.php'); ?>
</head>
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
        <small><?php echo "Ver ".$url; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="?route=Home"><i class="fa fa-dashboard"></i> Inicio </a></li>
        <li><a href="?route=<?php echo $url ?>"><?php echo $url; ?></a></li>
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
                <img src="assets/img/logolista.png" style="width:25px;color:red !importante;">
                <h3 class="box-title"><?php echo "".$url.""; ?></h3>
              </div>
              <div class="col-xs-12 col-sm-6" style="text-align:right">

              <button type="button" class="btn btn-next btn-fill btn btn-success btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarArchivo">Subir archivo</button>
              <input type="hidden" id="url" value="<?=$this->encriptar($this->url); ?>">
                  <!--=====================================
                  MODAL AGREGAR ARCHIVO
                  ======================================-->

                  <div id="modalAgregarArchivo" class="#modalAgregarArchivo modal fade" role="dialog">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <form role="form" method="post" enctype="multipart/form-data" id="form_data">

                          <!--=====================================
                          CABEZA DEL MODAL
                          ======================================-->

                          <div class="modal-header" style="background:#3c8dbc; color:white">

                            <button type="button" class="close" data-dismiss="modal" style="top:25px;">&times;</button>

                            <h4 class="modal-title" style="text-align: left;">Agregar Data</h4>

                          </div>

                          <!--=====================================
                          CUERPO DEL MODAL
                          ======================================-->

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

                          <!--=====================================
                        PIE DEL MODAL
                        ======================================-->

                          <div class="modal-footer">

                            <span type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</span>

                            <span type="submit" class="btn btn-primary subir" id="subir">Subir</span>

                          </div>


                        </form>

                      </div>

                    </div>

                  </div>  

                <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarAlum">Agregar Nuevo</button>

              <!--=====================================
              MODAL AGREGAR ALUM
              ======================================-->

              <div id="modalAgregarAlum" class="modalAgregarAlum modal fade" role="dialog">
                
                <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">

                  <div class="modal-content">

                    <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                      <!--=====================================
                      CABEZA DEL MODAL
                      ======================================-->

                      <div class="modal-header" style="background:#3c8dbc;color:white">

                        <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                        <h4 class="modal-title" style="text-align: left;">Agregar Alumno</h4>

                      </div>

                      <!--=====================================
                      CUERPO DEL MODAL
                      ======================================-->

                      <div class="modal-body" style="max-height:70vh;overflow:auto;">

                        <div class="box-body">

                          <!-- ENTRADA PARA EL USUARIO -->
                          <div class="row">

                            <div class="form-group col-xs-12 col-sm-12">
                              <label for="cedula">Cedula</label>
                              <div class="input-group" style="width:100%;">
                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                <input type="text" class="form-control input-lg" name="nuevaCedula" placeholder="Ingresar cedula" id="cedula" maxlength="8"  required>
                              </div>
                              <div style="width:100%;text-align:right;">
                                <span id="cedulaS" class="mensajeError"></span>
                              </div>
                            </div>


                            <!-- ENTRADA PARA EL NOMBRE -->
                            <div class="form-group col-xs-12 col-sm-12">
                              <label for="nombre">Nombre</label>
                              <div class="input-group" style="width:100%;">
                                <span class="input-group-addon"style="width:5%;"><i class="fa fa-user"></i></span> 
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
                                <span id="telefonoS"  class="mensajeError"></span>
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
                                <span id="trayectoS"  class="mensajeError"></span>
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
                  <th>Cédula</th>
                  <th>Nombre y Apellido</th>
                  <th>Télefono</th>
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>Acciones</th>
                  <?php //endif ?>
                </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
                foreach ($alumnos as $data):
                if(!empty($data['cedula_alumno'])):  
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
                      <?php echo $data['nombre_alumno']." ".$data['apellido_alumno']; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['telefono_alumno']; ?>
                    </span>
                  </td>
                 
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <td style="width:10%">
                    <!-- <table style="background:none;text-align:center;width:100%"> -->
                      <!-- <tr> -->
                        <?php //if ($amUsuariosE==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['cedula_alumno'] ?>">
                            <span class="fa fa-pencil">
                              
                            </span>
                          </button>
                        <!-- </td> -->
                        <?php //endif; ?>
                        <?php //if ($amUsuariosB==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['cedula_alumno'] ?>">
                            <span class="fa fa-trash"></span>
                          </button>
                        <!-- </td> -->
                        <?php //endif; ?>
                      <!-- </tr> -->
                    <!-- </table> -->
                  </td> 
                  <?php //endif ?>
                  

                  <button type="button" id="modificarButton<?=$data['cedula_alumno']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarAlum<?=$data['cedula_alumno']?>" style="display: none">Modificar</button>

                  <div id="modalModificarAlum<?=$data['cedula_alumno']?>" class="modalModificarAlum modal fade modalModificarAlum<?=$data['cedula_alumno']?>" role="dialog">
                    
                    <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">
                      <div class="modal-content">

                        <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                          <!--=====================================
                          CABEZA DEL MODAL
                          ======================================-->

                          <div class="modal-header" style="background:#3c8dbc; color:white">

                            <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                            <h4 class="modal-title" style="text-align: left;">Modificar Alumno</h4>

                          </div>

                          <!--=====================================
                          CUERPO DEL MODAL
                          ======================================-->

                          <div class="modal-body"  style="max-height:70vh;overflow:auto;">

                            <div class="box-body">

                              <div class="row">
                                
                                <!-- ENTRADA PARA EL USUARIO -->
                                <div class="form-group col-xs-12 col-sm-12">
                                  <label for="cedula<?=$data['cedula_alumno']?>">Cedula</label>
                                  <div class="input-group" style="width:100%;">
                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                    <input type="text" class="form-control input-lg cedulaModificar" maxlength="8" value="<?=$data['cedula_alumno']?>" name="<?=$data['cedula_alumno']?>" placeholder="Ingresar cedula" id="cedula<?=$data['cedula_alumno']?>" required>
                                  </div>
                                  <div style="width:100%;text-align:right;">
                                    <span id="cedulaS<?=$data['cedula_alumno']?>" class="mensajeError"></span>
                                  </div>
                                </div>

                                <!-- ENTRADA PARA EL NOMBRE -->
                                <div class="form-group col-xs-12 col-sm-12">
                                  <label for="nombre<?=$data['cedula_alumno']?>">Nombre</label>
                                  <div class="input-group" style="width:100%;">
                                    <span class="input-group-addon"style="width:5%;"><i class="fa fa-user"></i></span> 
                                    <input type="text" class="form-control input-lg nombreModificar"  maxlength="25" value="<?=$data['nombre_alumno']?>" name="<?=$data['cedula_alumno']?>" id="nombre<?=$data['cedula_alumno']?>" placeholder="Ingresar nombre" required>
                                  </div>
                                  <div style="width:100%;text-align:right;">
                                    <span id="nombreS<?=$data['cedula_alumno']?>" class="mensajeError"></span>
                                  </div>
                                </div>


                                <!-- ENTRADA PARA EL APELLIDO -->
                                <div class="form-group col-xs-12 col-sm-12">
                                  <label for="apellido<?=$data['cedula_alumno']?>">Apellido</label>
                                  <div class="input-group" style="width:100%;">
                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                    <input type="text" class="form-control input-lg apellidoModificar"  maxlength="25" value="<?=$data['apellido_alumno']?>" name="<?=$data['cedula_alumno']?>" id="apellido<?=$data['cedula_alumno']?>" placeholder="Ingresar apellido" required>
                                  </div>
                                  <div style="width:100%;text-align:right;">
                                    <span id="apellidoS<?=$data['cedula_alumno']?>" class="mensajeError"></span>
                                  </div>
                                </div>                        

                                <!--ENTRADA TELÉFONO -->
                                <div class="form-group col-xs-12 col-sm-12">
                                  <label for="telefono<?=$data['cedula_alumno']?>">Telefono</label>
                                  <div class="input-group" style="width:100%;">
                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                    <input type="text" class="form-control input-lg telefonoModificar"  maxlength="11" value="<?=$data['telefono_alumno']?>" name="<?=$data['cedula_alumno']?>" id="telefono<?=$data['cedula_alumno']?>" placeholder="Ingresar Nro Telefonico" required>
                                  </div>
                                  <div style="width:100%;text-align:right;">                            
                                     <span id="telefonoS<?=$data['cedula_alumno']?>"  class="mensajeError"></span>
                                  </div>
                                </div>

                                <!-- ENTRADA TRAYECTO -->
                                <div class="form-group col-xs-12 col-sm-12">
                                  <label for="trayecto<?=$data['cedula_alumno']?>">Trayecto</label>
                                  <div class="input-group" style="width:100%;">
                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                    <select class="form-control select2 input-lg trayectoModificar" style="width:100%;" name="<?=$data['cedula_alumno']?>" placeholder="Ingresar trayecto" id="trayecto<?=$data['cedula_alumno']?>" required>
                                      <option value="">Seleccione un trayecto</option>
                                      <option <?php if($data['trayecto_alumno']=="1"){ echo "selected"; } ?> value="1">Trayecto I</option>
                                      <option <?php if($data['trayecto_alumno']=="2"){ echo "selected"; } ?> value="2">Trayecto II</option>
                                      <option <?php if($data['trayecto_alumno']=="3"){ echo "selected"; } ?> value="3">Trayecto III</option>
                                      <option <?php if($data['trayecto_alumno']=="4"){ echo "selected"; } ?> value="4">Trayecto IV</option>
                                    </select>
                                  </div>
                                  <div style="width:100%;text-align:right;">                            
                                     <span id="trayectoS<?=$data['cedula_alumno']?>"  class="mensajeError"></span>
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

                            <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$data['cedula_alumno']?>" id="modificar">Modificar</button>

                          </div>


                        <!-- </form> -->

                      </div>

                    </div>

                  </div>
                      
                </tr>
                <?php
               endif; endforeach;
                ?>
                </tbody>
               <!--  <tfoot>
                <tr>
                  <th>Nº</th>
                  <th>Nombre y Apellido</th>
                  <th>Especialidades</th>
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th> - </th>
                  <?php //endif ?>
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
  

  <?php //require_once 'assets/aside-config.php'; ?>
</div>
<!-- ./wrapper -->

 
  <?php //require_once('assets/footered.php'); ?>
<?php if(!empty($response)): ?>
<input type="hidden" class="responses" value="<?php echo $response ?>">
<?php endif; ?>
<script>
$(document).ready(function(){ 

  console.clear();
  

$("#subir").click(function(e) {
      e.preventDefault();

      if ($("#file-input").get(0).files.length == 0) {
        Swal.fire({
          position: 'center',
          type: 'warning',
          title: '¡Debe seleccionar un archivo!',
          footer: 'SCHSL',
          timer: 3000,
          showCloseButton: false,
          showConfirmButton: false,
        });
        return 0;
      }
      if ($("#file-input").get(0).files.length > 1) {
        Swal.fire({
          position: 'center',
          type: 'warning',
          title: '¡No puede seleccionar más de un archivo!',
          footer: 'SCHSL',
          timer: 3000,
          showCloseButton: false,
          showConfirmButton: false,
        });
        return 0;
      }
      var extesiones_permitidas = [".xls", ".xlsx"];
      var input_file = $("#file-input");
      var exp_reg = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + extesiones_permitidas.join('|') + ")$");

      console.log(exp_reg);
      console.log(input_file.val());

      if (!exp_reg.test(input_file.val().toLowerCase())) {
        Swal.fire({
          position: 'center',
          type: 'warning',
          title: 'Debe seleccionar un archivo con extensión .xls o .xlsx',
          footer: 'SCHSL',
          timer: 3000,
          showCloseButton: false,
          showConfirmButton: false,
        });
        return false;
      }

      var formData = new FormData($(form_data)[0]);
      console.log(formData);
      $("#subir").attr('disabled', true);
      // console.log($("#subir").attr('disabled', true));

      $.ajax({
        url: 'Alumnos/Cargar',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
           alert(respuesta);
          console.log('hola');
          var datos = JSON.parse(respuesta);
          if (datos.msj === "Good") {
            Swal.fire({
              position: 'center',
              type: 'success',
              title: 'Se han cargado los datos de los alumnos exitosamente',
              footer: 'SCHSL',
              timer: 3000,
              showCloseButton: false,
              showConfirmButton: false,
            }).then((isConfirm) => {
              location.reload();
            });
          }
          if (datos.msj === "Error") {
              Swal.fire({
                position: 'center',
                type: 'danger',
                title: 'No se han cargado los datos de los alumnos',
                footer: 'SCHSL',
                timer: 3000,
                showCloseButton: false,
                showConfirmButton: false,
              }).then((isConfirm) => {
                location.reload();
              });
            }
        }

      });

});

$('#file-input').on('change', function() {
  name = $(this).get(0).files[0].name;
  $('#archivoSeleccionado').text(name);

});

$('#cedula').on('input', function () {      
  this.value = this.value.replace(/[^0-9]/g,''); 
  if(this.value.length >= 8 && this.value.length <= 8){
    $("#cedulaS").html("");
  }else{
    $("#cedulaS").html("La cédula debe contener 8 caracteres");
  }
});

$('.cedulaModificar').on('input', function () {
  var id = $(this).attr("name");
  this.value = this.value.replace(/[^0-9]/g,'');
  if(this.value.length >= 8 && this.value.length <= 8){
    $("#cedulaS"+id).html("");
  }else{
    $("#cedulaS"+id).html("La cédula debe contener 8 caracteres");
  }
});


$('#nombre').on('input', function () {      
  this.value = this.value.replace(/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g,''); });

$('.nombreModificar').on('input', function () {      
  this.value = this.value.replace(/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g,''); });

$('#apellido').on('input', function () {      
  this.value = this.value.replace(/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g,''); });

$('.apellidoModificar').on('input', function () {      
  this.value = this.value.replace(/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g,''); });






$('#telefono').on('input', function () {      
  this.value = this.value.replace(/[^0-9+ ]/g,'');
  if(this.value.length >= 11 && this.value.length <= 11){
    $("#telefonoS").html("");
  }else{
    $("#telefonoS").html("El número de celular debe contener 11 caracteres");
  }
});

$('.telefonoModificar').on('input', function () {      
  var id = $(this).attr("name");
  // var ids = $(this).attr("id");
  // var index = ids.indexOf(" ");
  // var id = ids.substring(index+1);
  this.value = this.value.replace(/[^0-9+ ]/g,''); 
  if(this.value.length >= 11 && this.value.length <= 11){
    $("#telefonoS"+id).html("");
  }else{
    $("#telefonoS"+id).html("El número de celular debe contener 11 caracteres");
  }
});

$("#trayecto").change(function(){
  var trayecto = $(this).val();
  if(trayecto == ""){
    $("#trayectoS").html("Seleccione un trayecto para el alumno");
  }else{
    $("#trayectoS").html("");
  }
});
$(".trayectoModificar").change(function(){
  var id = $(this).attr("name");
  var trayecto = $(this).val();
  if(trayecto == ""){
    $("#trayectoS"+id).html("Seleccione un trayecto para el alumno");
  }else{
    $("#trayectoS"+id).html("");
  }
});

  $(".modificarButtonModal").click(function(){
    var id = $(this).val();
    let url = $("#url").val(); 

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

            let cedula = $("#cedula"+id).val();     
            let nombre = $("#nombre"+id).val();     
            let apellido = $("#apellido"+id).val();
            let correo = $("#correo"+id).val();
            let telefono = $("#telefono"+id).val();
            let trayecto = $("#trayecto"+id).val(); 

            $.ajax({
              url: url + '/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,   
                codigo: id,   
                cedula: cedula,       
                nombre: nombre,       
                apellido: apellido,
                correo: correo,
                telefono: telefono,
                trayecto: trayecto,

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
                      title: '¡¡Modificacion Exitosa!', 
                      text: 'Se ha modificado al alumno ' + nombre + ' ' + apellido + ' en el sistema', 
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    }).then((isConfirm) => {
                        location.reload();
                    });
                  } 
                  if (datos.msj === "Repetido") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Registro repetido!',
                      text: 'El alumno ' + nombre + ' ' + apellido + ' ya esta agregado al sistema con la cedula '+cedula,
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


  $("#guardar").click(function(){
    let url = $("#url").val();  
    // alert(url);
    var response = validar();
    // alert(response);
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


            let cedula = $("#cedula").val();     
            let nombre = $("#nombre").val();     
            let apellido = $("#apellido").val();
            let telefono = $("#telefono").val();
            let trayecto = $("#trayecto").val();

          /*alert(cedula + ' ' + nombre + ' ' + apellido + ' ' + especialidad);*/
              $.ajax({
                url: url + '/Agregar',    
                type: 'POST',   
                data: {
                  Agregar: true,   
                  cedula: cedula,       
                  nombre: nombre,       
                  apellido: apellido,
                  telefono: telefono,
                  trayecto: trayecto,
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
                        text: 'Se ha agregado al alumno ' + nombre + ' ' + apellido + ' al sistema',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      }).then((isConfirm) => {
                          location.reload();
                      } );
                    } 
                    if (datos.msj === "Repetido") {   
                      Swal.fire({
                        type: 'warning',
                        title: '¡Registro repetido!',
                        text: 'El alumno ' + nombre + ' ' + apellido + ' ya esta agregado al sistema',
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
    let url = $("#url").val(); 
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
            let userMofif = $(this).val();
            // alert(userMofif);
            $.ajax({
              url: url + '/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                userNofif: userMofif,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") {  
                  $("#modificarButton"+userMofif).click(); 

                  /*
                  alert('Bienvenido');                    
                  console.log('Aquí estoy yo'); 
                  // console.log($(".cedula").val(Json['resp']));
                  Swal.fire({
                    type: 'success',
                    title: '¡Modificación Exitosa!',
                    text: 'Has modificado al usuario ' + user + ' al sistema',
                    footer: 'SCHSL',
                    timer: 3000,
                    showCloseButton: false,
                    showConfirmButton: false,
                    
                  });
                  */

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
    let url = $("#url").val(); 
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
                        /*window.alert($(this).val());*/
                        let userDelete = $(this).val();
                      $.ajax({
                        url: url + '/Eliminar',    
                        type: 'POST',   
                        data: {
                          Eliminar: true,   
                          userDelete: userDelete,
                        },
                        success: function(respuesta){       
                          // alert(respuesta);
                          var datos = JSON.parse(respuesta);
                          if (datos.msj === "Good") {   
                            Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado al alumno ' + datos.data.nombre_alumno + ' ' + datos.data.apellido_alumno + ' ya cuya cédula es ' + userDelete+' del sistema',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            }).then((isConfirm) => {
                                location.reload();
                            } );
                          } 
                          if (datos.msj === "Repetido") {   
                            Swal.fire({
                              type: 'warning',
                              title: '¡Registro repetido!',
                              text: 'El alumno ' + nombre + ' ' + apellido + ' ya esta agregado al sistema',
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
});  

function validar(modificar = false, id=""){
  var form = "";
  if(!modificar){
    form = "#modalAgregarAlum";
  }else{
    form = "#modalModificarAlum"+id;
  }

  var cedula = $(form+" #cedula"+id).val();
  var rcedula = false;
  if(cedula.length >= 8 && cedula.length <= 8){
    $(form+" #cedulaS"+id).html("");
    rcedula = true;
  }else{
    $(form+" #cedulaS"+id).html("La cedula debe contener 8 caracteres");
  }

  var nombre = $(form+" #nombre"+id).val();
  var rnombre = false;
  if(nombre.length > 2){ 
    rnombre = true;
    $(form+" #nombreS"+id).html("");
  }else{
    $(form+" #nombreS"+id).html("Debe ingresar el nombre del alumno");
  }

  var apellido = $(form+" #apellido"+id).val();
  var rapellido = false;
  if(apellido.length > 2){ 
    rapellido = true;
    $(form+" #apellidoS"+id).html("");
  }else{
    $(form+" #apellidoS"+id).html("Debe ingresar el apellido del alumno");
  }

  var telefono = $(form+" #telefono"+id).val();
  var rtelefono = false;
  if(telefono.length >= 11 && telefono.length <= 11){
    $(form+" #telefonoS"+id).html("");
    rtelefono = true;
  }else{
    $(form+" #telefonoS"+id).html("La telefono debe contener 11 caracteres");
  }

  var trayecto = $(form+" #trayecto"+id).val();
  var rtrayecto = false;
  if(trayecto == ""){
    $(form+" #trayectoS"+id).html("Seleccione un trayecto para el alumno");
  }else{
    rtrayecto = true;
    $(form+" #trayectoS"+id).html("");
  }

  var validado = false;
  if(rcedula==true && rnombre==true && rapellido==true && rtelefono==true && rtrayecto==true){
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

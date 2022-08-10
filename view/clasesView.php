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
        <li><a href="<?=_ROUTE_.$this->encriptar("Clases"); ?>"><?php echo $url; ?></a></li>
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
               

              <!--=====================================
              MODAL MODIFICAR CLASES
              ======================================-->

              


                <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarClase">Agregar Nuevo</button>
                  <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">

              <!--=====================================
              MODAL AGREGAR PROF
              ======================================-->

              <div id="modalAgregarClase" class="modalAgregarClase modal fade" role="dialog">
                
                <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">

                  <div class="modal-content">

                    <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                      <!--=====================================
                      CABEZA DEL MODAL
                      ======================================-->

                      <div class="modal-header" style="background:#3c8dbc; color:white">

                        <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                        <h4 class="modal-title" style="text-align: left;">Agregar Clase</h4>

                      </div>

                      <!--=====================================
                      CUERPO DEL MODAL
                      ======================================-->

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
                                  <?php foreach ($secciones as $date): if(!empty($date['cod_seccion'])):  ?>
                                  <option value="<?php echo $date['cod_seccion'] ?>"><?php echo $date['nombre_seccion'] ?></option>
                                  <?php endif; endforeach; ?>
                                </select>
                              </div>
                              <div style="width:100%;text-align:right;">
                                <span id="seccionS" class="mensajeError" ></span>
                              </div>
                            </div>


                            <!-- ENTRADA PARA SELECCIONAR SABERES -->
                            <div class="form-group col-xs-12 col-sm-12">
                              <label for="saber">Saber complementario</label>
                              <div class="input-group" style="width:100%;">
                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-indent"></i></span> 
                                <select class="form-control select2 input-lg" style="width:100%;" name="nuevoPerfil" id="saber">
                                  <option value="">Saber Complementario</option>
                                  <?php foreach ($saberes as $dateS): if(!empty($dateS['id_SC'])):  ?>
                                  <!-- <option value="<?php echo $dateS['id_SC'] ?>"><?php echo $dateS['nombreSC'] ?></option> -->
                                  <?php endif; endforeach; ?>
                                </select>
                              </div>
                              <div style="width:100%;text-align:right;">
                                <span id="saberS" class="mensajeError" ></span>
                              </div>
                            </div>
                          
                          
                            <!-- ENTRADA PARA LOS ALUMNOS -->
                            <div class="form-group col-xs-12 col-sm-12">
                              <label for="profesor">Profesor</label>
                              <div class="input-group" style="width:100%;">
                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-indent"></i></span> 
                                <select class="form-control select2 input-lg" style="width:100%;" name="nuevoPerfil" id="profesor">
                                  <option value="">Profesor</option>
                                  <?php foreach ($profesores as $dateP): if(!empty($dateP['cedula_profesor'])):  ?>
                                  <option value="<?php echo $dateP['cedula_profesor'] ?>"><?php echo $dateP['nombre_profesor']." ".$dateP['apellido_profesor'] ?></option>
                                  <?php endif; endforeach; ?>
                                </select>
                              </div>
                              <div style="width:100%;text-align:right;">
                                <span id="profesorS" class="mensajeError"></span>
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
                
              <table id="" class="datatable table table-striped text-center" style="text-align:center;width:100%;font-size:1em;">
                <thead>
                <tr>
                  <th>Nº</th>
                  <th>Saber Complementario</th>
                  <th>Sección</th>
                  <th>Profesor</th>
                 
                 <!--  <?php  ?> -->
                  <th>Acciones</th>
                  <?php //endif ?>
                </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
               foreach ($clases as $data):
                if(!empty($data['id_clase'])):  
                ?>
                <tr>
                  <td style="width:5%">
                    <span class="contenido2">
                      <?php echo $num++; ?>
                    </span>
                  </td>
           

                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['nombreSC']; ?>
                    </span>
                  </td>
                   <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['nombre_seccion']; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['nombre_profesor']." ".$data['apellido_profesor']; ?>
                    </span>
                  </td>
                  <!-- <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['nombreUsuario']; ?>
                    </span>
                  </td> --> 
                 
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <td style="width:10%">
                    <!-- <table style="background:none;text-align:center;width:100%"> -->
                       <!-- <tr> -->
                        <?php //if ($amUsuariosE==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9"value="<?php echo $data['id_clase'] ?>">
                            <span class="fa fa-pencil">
                              
                            </span>
                          </button>
                        <!-- </td> --> 
                        <?php //endif; ?>
                        <?php //if ($amUsuariosB==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['id_clase'] ?>">
                            <span class="fa fa-trash"></span>
                          </button>
                        <!-- </td> -->
                        <?php //endif; ?>
                      <!-- </tr> -->
                    <!-- </table> -->
                  </td>
                  <?php //endif ?> 
                      
                  <button type="button" id="modificarButton<?=$data['id_clase']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarClase<?=$data['id_clase']?>" style="display: none">Modificar</button>

                  <div id="modalModificarClase<?=$data['id_clase']?>" class="modalModificarClase modal fade modalModificarClase<?=$data['id_clase']?>" role="dialog">
                    
                    <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;">
                      <div class="modal-content">

                        <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                          <!--=====================================
                          CABEZA DEL MODAL
                          ======================================-->

                          <div class="modal-header" style="background:#3c8dbc; color:white">

                            <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                            <h4 class="modal-title" style="text-align: left;">Modificar Clase</h4>

                          </div>

                          <!--=====================================
                          CUERPO DEL MODAL
                          ======================================-->

                          <div class="modal-body" style="max-height:70vvh;overflow:auto;">

                            <div class="box-body">

                              <div class="row">


                                <!-- ENTRADA PARA EL SECCION -->                              
                                <div class="form-group col-xs-12 col-sm-12"> 
                                  <label for="seccion<?=$data['id_clase'];?>">Seccion</label>                             
                                  <div class="input-group" style="width:100%;">
                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-cogs"></i></span> 
                                    <select class="form-control select2 input-lg seccionModificar" style="width:100%;" name="<?=$data['id_clase'];?>" id="seccion<?=$data['id_clase'];?>">
                                      <option value="">Sección</option>
                                      <?php foreach ($secciones as $date): if(!empty($date['cod_seccion'])):   ?>
                                      <option value="<?php echo $date['cod_seccion'] ?>" <?php if($date['cod_seccion']==$data['cod_seccion']){ echo "selected"; } ?> ><?php echo $date['nombre_seccion'] ?></option>
                                      <?php endif; endforeach; ?>
                                    </select>
                                  </div>
                                  <div style="width:100%;text-align:right;">
                                    <span id="seccionS<?=$data['id_clase']?>" class="mensajeError"></span>
                                  </div>
                                </div>

                                <!-- ENTRADA PARA EL SABER -->                              
                                <div class="form-group col-xs-12 col-sm-12">
                                  <label for="saber<?=$data['id_clase'];?>">Saber complementario</label>
                                  <div class="input-group" style="width:100%;">
                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-indent"></i></span> 
                                    <select class="form-control select2 input-lg saberModificar" style="width:100%;" name="nuevoPerfil" id="saber<?=$data['id_clase'];?>">
                                      <option value="">Saber Complementario</option>
                                      <?php foreach ($saberes as $dateS): if(!empty($dateS['id_SC'])): ?>
                                        <?php if (($dateS['trayecto_SC']==$data['trayecto_SC'])&&($dateS['fase_SC']==$data['fase_SC'])): ?>
                                          
                                      <option value="<?php echo $dateS['id_SC'] ?>" <?php if($dateS['id_SC']==$data['id_SC']){ echo "selected"; } ?> ><?php echo $dateS['nombreSC'] ?></option>

                                        <?php endif; ?>
                                      <?php endif; endforeach; ?>
                                    </select>
                                  </div>
                                  <div style="width:100%;text-align:right;">
                                    <span id="saberS<?=$data['id_clase']?>" class="mensajeError"></span>
                                  </div>
                                </div>

                                <!-- ENTRADA PARA EL PROFESOR -->
                                <div class="form-group col-xs-12 col-sm-12">
                                  <label for="profesor<?=$data['id_clase'];?>">Profesor</label>
                                  <div class="input-group" style="width:100%;">
                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-indent"></i></span> 
                                    <select class="form-control select2 input-lg" style="width:100%;" name="nuevoPerfil" id="profesor<?=$data['id_clase'];?>">
                                      <option value="">Profesor</option>
                                      <?php foreach ($profesores as $dateP): if(!empty($dateP['cedula_profesor'])): ?>
                                      <option value="<?php echo $dateP['cedula_profesor'] ?>" <?php if($dateP['cedula_profesor']==$data['cedula_profesor']){ echo "selected"; } ?> ><?php echo $dateP['nombre_profesor']." ".$dateP['apellido_profesor'] ?></option>
                                      <?php endif; endforeach; ?>
                                    </select>
                                  </div>
                                  <div style="width:100%;text-align:right;">
                                    <span id="profesorS<?=$data['id_clase']?>" class="mensajeError"></span>
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

                            <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$data['id_clase']?>" id="modificar">Modificar</button>

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
<!--                 <tfoot>
                <tr>
                  <th>Nº</th>
                  <th>Clases</th> -->
                  <!-- <th>Nombre de Usuario</th> -->
                <!--   <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
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
  

  <?php //require_once 'assets/aside-config.php'; ?>
</div>
<!-- ./wrapper -->


 

    <?php //require_once('assets/footered.php'); ?>
<?php if(!empty($response)): ?>
<input type="hidden" class="responses" value="<?php echo $response ?>">
<?php endif; ?>
<script>
$(document).ready(function(){ 
  $('#seccion').change(function(){
    var url = $("#url").val();
    var seccion = $(this).val();
    if(seccion==""){
      var html = '';
      html += '<option value="">Saber Complementario</option>';
      $("#saber").html(html);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          saberes: true,   
          cod_seccion: seccion,       
        },
        success: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);
          console.log(resp);
          if (resp.msj == "Good") {
            var data = resp.data;
            var dataSaberes = "";
            if(resp.msjSaberes=="Good"){
              dataSaberes = resp.dataSaberes;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("SABERES: ");
            // console.log(dataSaberes);
            var html = '';
            html += '<option value="">Saber Complementario</option>';
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['id_SC']+'" ';

              if(dataSaberes.length>0){
                for (var j = 0; j < dataSaberes.length; j++) {
                  if(dataSaberes[j]['id_SC']==data[i]['id_SC']){
                    html += 'disabled="disabled"'
                  }
                }
              }
              
              html += ' >'+data[i]['nombreSC']+'</option>';
            }
            $("#saber").html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option value="">Saber Complementario</option>';
            $("#saber").html(html);
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
    // alert(id);
    // alert(seccion);
    if(seccion==""){
      var html = '';
      html += '<option value="">Saber Complementario</option>';
      $("#saber"+id).html(html);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          saberes: true,   
          cod_seccion: seccion,       
        },
        success: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            var dataSaberes = "";
            if(resp.msjSaberes=="Good"){
              dataSaberes = resp.dataSaberes;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("Saberes: ");
            // console.log(dataSaberes);
            // console.log($("#saber"+id).html());
            var html = '';
            html += '<option value="">Saber Complementario</option>';
            // alert(dataSaberes);
            // alert(dataSaberes);

            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['id_SC']+'" ';
              if(dataSaberes.length>0){
                for (var j = 0; j < dataSaberes.length; j++) {
                  if(dataSaberes[j]['id_SC']==data[i]['id_SC']){
                    if(dataSaberes[j]['id_clase']==id){
                      html += 'selected="selected"'
                    }else{
                      html += 'disabled="disabled"'
                    }
                  }
                }
              }
              html += ' >'+data[i]['nombreSC']+'</option>';
            }
            $("#saber"+id).html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option value="">Saber Complementario</option>';
            $("#saber"+id).html(html);
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

          /* let id = $(this).val(); */
 
            let seccion = $("#seccion"+id).val();     
            let saber = $("#saber"+id).val(); 
            let profesor = $("#profesor"+id).val();  
            
            // alert( seccion + ' ' + saber + ' ' + profesor);
            $.ajax({
              url: url+'/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,   
                  id_clase: id,
                  seccion: seccion,       
                  saber: saber,
                  profesor: profesor,              
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
                      text: 'Se ha modificado la en el sistema', 
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    }).then((isConfirm) => {
                        location.reload();
                    });
                  } 
                  if (datos.msj === "Repetido") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Registro repetido!',
                      text: 'La clase ya esta agregada al sistema  ',
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    });
                  }
                  if (datos.msj === "Error") {   
                    Swal.fire({
                      type: 'error',
                      title: '¡Error al guardar los cambios!',
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

           let id = $(this).val(); 
 
            let seccion = $("#seccion"+id).val();     
            let saber = $("#saber"+id).val(); 
            let profesor = $("#profesor").val();         
               

          /*          alert( seccion + ' ' + saber + ' ' + profesor);*/
          // alert( saber);
          // alert( seccion );
          // alert( profesor);

              $.ajax({
                url: url+'/Agregar',    
                type: 'POST',   
                data: {
                  Agregar: true,   
                  seccion: seccion,       
                  saber: saber,
                  profesor: profesor,   
                  /*seccion:seccion,       
                  alumno: alumno,*/        
                  
                },
                success: function(resp){
                 /* alert(resp);*/
                /*window.alert("Hola mundo");   
                console.log(resp); 
                  window.alert(resp);*/
                 /* window.alert("hola-------------------------------------------");*/
                  var datos = JSON.parse(resp);     
                    if (datos.msj === "Good") {   
                      Swal.fire({
                        type: 'success',
                        title: '¡Registro Exitoso!',
                        text: 'Se ha creado la clase en el sistema',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      }).then((isConfirm) => {
                          location.reload();
                      } );
                    } 
                    if (datos.msj === "Repetido") {   
                      Swal.fire({
                        type: 'warning',
                        title: '¡Registro repetido!',
                        text: 'La clase ya esta creada en el sistema',
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
             $("#modificarButton"+userMofif).click(); 
            // $.ajax({
            //   url: 'Clases/Buscar',    
            //   type: 'POST',  
            //   data: {
            //     Buscar: true,   
            //     userNofif: userMofif,       
            //   },
            //   success: function(respuesta){       
            //     // alert(respuesta); 
            //     var resp = JSON.parse(respuesta);   
            //     // alert(resp.msj);
            //     if (resp.msj == "Good") {  

                  
            //       alert('Bienvenido');                    
            //       console.log('Aquí estoy yo'); 
            //       // console.log($(".cedula").val(Json['resp']));
            //       Swal.fire({
            //         type: 'success',
            //         title: '¡Modificación Exitosa!',
            //         text: 'Has modificado al usuario ' + user + ' al sistema',
            //         footer: 'SCHSL',
            //         timer: 3000,
            //         showCloseButton: false,
            //         showConfirmButton: false,
                    
            //       });
                  

            //     }        
            //   },
            //   error: function(respuesta){       
            //     // alert(respuesta);
            //     var resp = JSON.parse(respuesta);
            //     console.log(resp);

            //   }

            // });




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
                        /*window.alert($(this).val());*/
                        let claseDelete = $(this).val();

                       /* alert(claseDelete);*/
                      $.ajax({
                        url: url+'/Eliminar',    
                        type: 'POST',   
                        data: {
                          Eliminar: true,   
                          claseDelete: claseDelete,
                        },
                        success: function(respuesta){       
                         /* alert(respuesta);*/
                          var datos = JSON.parse(respuesta);
                          if (datos.msj === "Good") {   
                            Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado la clase del sistema',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            }).then((isConfirm) => {
                                location.reload();
                            } );
                          } 
                          if (datos.msj === "Repetido") {   
                            Swal.fire({
                              type: 'warning',
                              title: '¡Registro repetido!',
                              text: 'La clase ya esta agregada al sistema',
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
                            confirmButtonColor: "#ED2A77",
                        });
                    } 
                });

          }else { 
              swal.fire({
                  type: 'error',
                  title: '¡Proceso cancelado!',
                  confirmButtonColor: "#ED2A77",
              });
          } 
      });
  });
});  


function validar(modificar = false, id=""){
  var form = "";
  if(!modificar){
    form = "#modalAgregarClase";
  }else{
    form = "#modalModificarClase"+id;
  }

  var seccion = $(form+" #seccion"+id).val();
  var rseccion = false;
  if(seccion == ""){
    $(form+" #seccionS"+id).html("Seleccione una sección");
  }else{
    rseccion = true;
    $(form+" #seccionS"+id).html("");
  }

  var saber = $(form+" #saber"+id).val();
  var rsaber = false;
  if(saber == ""){
    $(form+" #saberS"+id).html("Seleccione un saber ");
  }else{
    rsaber = true;
    $(form+" #saberS"+id).html("");
  }

    var profesor = $(form+" #profesor"+id).val();
  var rprofesor = false;
  if(profesor == ""){
    $(form+" #profesorS"+id).html("Debe seleccionar un profesor para la clase");
  }else{
    rprofesor = true;
    $(form+" #profesorS"+id).html("");
  }


  
  var validado = false;
  if(rseccion==true && rsaber==true && rprofesor==true){
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

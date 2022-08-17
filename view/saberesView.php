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
        <li><a href="<?=_ROUTE_.$this->encriptar("Saberes"); ?>"><?php echo $url; ?></a></li>
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

                    <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarSC">Agregar Nuevo</button>
                  <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">

                <div id="modalAgregarSC" class="modalAgregarSC modal fade" role="dialog">
                
                <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">

                  <div class="modal-content">


                      <!--=====================================
                      CABEZA DEL MODAL
                      ======================================-->

                      <div class="modal-header" style="background:#3c8dbc; color:white">

                        <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                        <h4 class="modal-title" style="text-align: left;">Agregar Saber Complementario</h4>

                      </div>

                      <!--=====================================
                      CUERPO DEL MODAL
                      ======================================-->

                      <div class="modal-body" style="max-height:70vh;overflow:auto;">

                        <div class="box-body">

                          <div class="row">
                            
                            <!-- ENTRADA PARA EL NOMBRE DEL SC -->
                            <div class="form-group col-xs-12 col-sm-12"> 
                              <label for="nombreSC">Nombre</label>
                              <div class="input-group" style="width:100%;">
                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Saber Complementario" id="nombreSC" required>
                              </div>
                              <div style="width:100%;text-align:right;">
                                <span id="nombreS" class="mensajeError"></span>
                              </div>
                            </div>

                          
                            <!-- ENTRADA PARA EL TRAYECTO -->
                            <div class="form-group col-xs-12 col-sm-12">
                              <label for="trayectoSC">Trayecto</label>
                              <div class="input-group" style="width:100%;">
                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                <select class="form-control select2 input-lg" style="width:100%;" name="trayecto" placeholder="Ingresar trayecto" id="trayectoSC"  required>
                                  <option value="" style="text-align: left;">Seleccione un trayecto</option>
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


                            <!-- ENTRADA PARA EL FASE -->
                            <div class="form-group col-xs-12 col-sm-12">
                              <label for="faseSC">Fase</label>
                              <div class="input-group" style="width:100%;">
                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                <select class="form-control select2 input-lg" style="width:100%;" name="trayecto" placeholder="Ingresar fase" id="faseSC" required>
                                  <option value="">Seleccione un Fase</option>
                                  <option value="1">Fase I</option>
                                  <option value="2">Fase II</option>   
                                </select>
                              </div>
                              <div style="width:100%;text-align:right;">
                                <span id="faseS" class="mensajeError"></span>
                              </div>
                            </div>


                          </div>
                                <!-- <span id="fase" class="mensajeError"></span> -->
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
                  <th>Saber Complementario</th>
                  <th>Trayecto</th>
                  <th>Fase</th>
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>Acciones</th>
                  <?php //endif ?>
                </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
                foreach ($saberes as $data):
                if(!empty($data['id_SC'])):  
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
                      <?php 
                        if($data['trayecto_SC']=="1"){
                          $numeroTrayecto = "I";
                        }else if($data['trayecto_SC']=="2"){
                          $numeroTrayecto = "II";
                        }else if($data['trayecto_SC']=="3"){
                          $numeroTrayecto = "III";
                        }else if($data['trayecto_SC']=="4"){
                          $numeroTrayecto = "IV";
                        }
                        echo "Trayecto ".$numeroTrayecto; 
                      ?>
                    </span>
                  </td>

                    <td style="width:20%">
                    <span class="contenido2">
                      <?php 
                        if($data['fase_SC']=="1"){
                          $numerofase = "I";
                        }else if($data['fase_SC']=="2"){
                          $numerofase = "II";
                        } 
                        echo "Fase ".$numerofase; 
                      ?>
                    </span>
                  </td>
                 
                  
                 
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <td style="width:10%">
                    <!-- <table style="background:none;text-align:center;width:100%"> -->
                      <!-- <tr> -->
                        <?php //if ($amUsuariosE==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['id_SC'] ?>">
                            <span class="fa fa-pencil">
                              
                            </span>
                          </button>
                        <!-- </td> -->
                        <?php //endif; ?>
                        <?php //if ($amUsuariosB==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['id_SC'] ?>">
                            <span class="fa fa-trash"></span>
                          </button>
                        <!-- </td> -->
                        <?php //endif; ?>
                      <!-- </tr> -->
                    <!-- </table> -->
                  </td>
                  <?php //endif ?>

                   <button type="button" id="modificarButton<?=$data['id_SC']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalmodificarButtonsc<?=$data['id_SC']?>" style="display: none">Modificar</button>

                  <div id="modalmodificarButtonsc<?=$data['id_SC']?>" class="modalmodificarButtonsc modal fade modificarButtonsc<?=$data['id_SC']?>" role="dialog">
                    
                    <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">
                      <div class="modal-content">

                        <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                          <!--=====================================
                          CABEZA DEL MODAL
                          ======================================-->

                          <div class="modal-header" style="background:#3c8dbc; color:white">

                            <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                            <h4 class="modal-title" style="text-align: left;">Modificar Saber Complementario</h4>

                          </div>

                          <!--=====================================
                          CUERPO DEL MODAL
                          ======================================-->

                          <div class="modal-body" style="max-height:70vh;overflow:auto;">

                            <div class="box-body">

                              <div class="row">
                              
                                <!-- ENTRADA SABER COMPLEMENTARIO -->
                                <div class="form-group col-xs-12 col-sm-12">
                                  <label for="nombreSC<?=$data['id_SC']?>">Nombre</label>
                                  <div class="input-group" style="width:100%;">
                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                    <input type="text" class="form-control input-lg" value="<?=$data['nombreSC']?>" name="nuevaNombreSC" placeholder="Ingresar Saber Complementario" id="nombreSC<?=$data['id_SC']?>" required>
                                  </div>
                                  <div style="width:100%;text-align:right;">
                                    <span id="nombreS<?=$data['id_SC']?>" class="mensajeError"></span>
                                  </div>
                                </div>

                                
                                <!-- ENTRADA PARA EL TRAYECTO-->
                                <div class="form-group col-xs-12 col-sm-12">
                                  <label for="trayectoSC<?=$data['id_SC']?>">Trayecto</label>
                                  <div class="input-group" style="width:100%;">
                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                    <select class="form-control select2 input-lg" style="width:100%;" name="trayecto" placeholder="Ingresar trayecto" id="trayectoSC<?=$data['id_SC']?>" required>
                                      <option value="">Seleccione un trayecto</option>
                                      <option <?php if($data['trayecto_SC']=="1"){ echo "selected"; } ?> value="1">Trayecto I</option>
                                      <option <?php if($data['trayecto_SC']=="2"){ echo "selected"; } ?> value="2">Trayecto II</option>
                                      <option <?php if($data['trayecto_SC']=="3"){ echo "selected"; } ?> value="3">Trayecto III</option>
                                      <option <?php if($data['trayecto_SC']=="4"){ echo "selected"; } ?> value="4">Trayecto IV</option>
                                    </select>
                                  </div>
                                  <div style="width:100%;text-align:right;">
                                    <span id="trayectoS<?=$data['id_SC']?>" class="mensajeError"></span>
                                  </div>
                                </div>

                                
                                <!-- ENTRADA PARA LA FASE -->
                                <div class="form-group col-xs-12 col-sm-12">
                                  <label for="faseSC<?=$data['id_SC']?>">Fase</label>
                                  <div class="input-group " style="width:100%;">
                                    <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                    <select class="form-control select2 input-lg" style="width:100%;" name="fase" placeholder="Ingresar trayecto" id="faseSC<?=$data['id_SC']?>" required>
                                      <option value="">Seleccione un fase</option>
                                      <option <?php if($data['fase_SC']=="1"){ echo "selected"; } ?> value="1">Fase I</option>
                                      <option <?php if($data['fase_SC']=="2"){ echo "selected"; } ?> value="2">Fase II</option>
                                    </select>
                                  </div>
                                  <div style="width:100%;text-align:right;">
                                    <span id="faseS<?=$data['id_SC']?>" class="mensajeError"></span>
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

                           <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$data['id_SC']?>" id="modificar">Modificar</button>

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
                <tfoot>
                <tr>
                  <th>Nº</th>
                  <th>Saber Complementario</th>
                  <th>Trayecto</th>
                  <th>Fase</th>
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
<?php if(!empty($response)): ?>

<input type="hidden" class="responses" value="<?php echo $response ?>">
<?php endif; ?>
<script>

$(document).ready(function(){ 


/*var nombreSaber = $("#nombreSC").val();

 console.log('aqui estoy' $nombreSaber);*/

//-----------Validacion de los campos------------

/*    $('#nombreSC').keyup(function(){
      var nombre = $(this).val();
        if(nombre.length < 4){
          $("#saberC").html("Por favor ingrese el nombre");
        }else{
          $("#saberC").html("");
        }
    });

  $('#nombreSC').on('input', function(){
    this.value = this.value.replace(/[^0-9a-zA-Z á é í ó ú Á É Í Ó Ú]/g,'');
  });

//---------------Trayecto-------------


  $('#trayectoSC').change(function(){

   var trayecto = $(this).val();
   // console.log('Epale', trayecto);
   var r = false;
   
   if (trayecto ==""){
      // console.log('Entro al if');
       $("#trayecto").html("");
       r = false;
   }else{
      // console.log('Entro al else');
       $("#trayecto").html("");
     
       r = true;
   }
  });


//     $(".select").change(function(){
//    Capturas el valor y verificas
// });

//------Fase--------------------
    $('#faseSC').change(function(){

   var fase = $(this).val();

   var r = false;

   if (fase == ""){
       $("#fase").html("");
       r = false;
   }else{
       $("#fase").html("");
       r = true;
   }
  });
*/
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
        let nombreSC = $("#nombreSC").val();     
        let trayectoSC = $("#trayectoSC").val();     
        let faseSC = $("#faseSC").val();   
            
            // alert(nombreSC + ' ' + trayectoSC+ ' '+ faseSC);

              $.ajax({
                url: url+'/Agregar',    
                type: 'POST',   
                data:{

                       Agregar: true,   
                       nombreSC: nombreSC,
                       trayectoSC: trayectoSC,       
                       faseSC: faseSC,       
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
                        text: 'Se ha agregado el saber ' + nombreSC + ' al sistema',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      }).then((isConfirm) => {
                          location.reload();
                      } );
                    } 
                    if (datos.msj === "Repetido") {   
                      Swal.fire({
                        type: 'warning',
                        title: '¡Registro repetido!',
                        text: 'El saber ' + nombrSC + ' ya esta agregado al sistema',
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

            let nombreSC = $("#nombreSC" + id).val();
            let trayecto = $("#trayectoSC" + id).val();
            let fase = $("#faseSC" + id).val();
             // alert(id + ' '+ nombreSC + ' ' + trayecto + ' ' + fase);
            $.ajax({
              url: url+'/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,    

                codigo: id,
                nombreSC: nombreSC,   
                trayectoSC: trayecto,
                faseSC: fase,       
              
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
                      text: 'Se ha modificado al saber ' + nombreSC + ' en el sistema', 
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    }).then((isConfirm) => {
                        location.reload();
                    } );
                  } 
                  if (datos.msj === "Repetido") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Registro repetido!',
                      text: 'El saber ' + nombreSC + ' ya esta agregado al sistema',
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
            let userMofif = $(this).val();
            //alert(userMofif);
            $.ajax({
              url: url+'/Buscar',    
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
    var url = $("#url").val();
      swal.fire({ 
          title: "¿Desea borrar los datos?",
          text: "Se borraran los datos escogidos, ¿desea continuar?",
          type: "error",
          showCancelButton: true,
          confirmButtonText: "¡Si!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false,
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
                     
                      let userDelete = $(this).val();

                      $.ajax({
                        url: url+'/Eliminar',    
                        type: 'POST',   
                        data: {
                        Eliminar: true,   
                        userDelete: userDelete,
                        },
                        success: function(respuesta){       
                           // alert(respuesta);
                          var datos = JSON.parse(respuesta);
                          if (datos.msj === "Good"){   
                              
                              Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado el saber complementario ' + datos.data.nombreSC,
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            }).then((isConfirm) => {
                                location.reload();
                            });
                          } 
                          if (datos.msj === "Repetido") {   
                            Swal.fire({
                              type: 'warning',
                              title: '¡Registro repetido!',
                              text: 'El profesor ' + datos.data.nombreSC + ' ya esta agregado al sistema',
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
                        //    confirmButtonColor: "#ED2A77",
                        });
                    } 
                });

          }else { 
              swal.fire({
                  type: 'error',
                  title: '¡Proceso cancelado!',
                  //confirmButtonColor: "#ED2A77",
              });
          } 
      });
  });

  function validar(modificar = false, id=""){
  var form = "";
  if(!modificar){
    form = "#modalAgregarSC";
  }else{
    form = "#modalmodificarButtonsc"+id;
  }

  var nombre = $(form+" #nombreSC"+id).val();
  var rnombre = false;
  if(nombre.length > 2){ 
    rnombre = true;
    $(form+" #nombreS"+id).html("");
  }else{
    $(form+" #nombreS"+id).html("Debe ingresar el nombre del saber");
  }

  

  var trayecto = $(form+" #trayectoSC"+id).val();
  var rtrayecto = false;
  if(trayecto == ""){
    $(form+" #trayectoS"+id).html("Seleccione un trayecto");
  }else{
    rtrayecto = true;
    $(form+" #trayectoS"+id).html("");
  }

  var fase = $(form+" #faseSC"+id).val();
  var rfase = false;
  if(fase == ""){
    $(form+" #faseS"+id).html("Seleccione una fase");
  }else{
    rfase = true;
    $(form+" #faseS"+id).html("");
  }



  var validado = false;
  if(rnombre==true && rtrayecto==true && rfase==true){
    validado=true;
  }else{
    validado=false;
  }
/*  alert(validado);*/
  return validado;
}

 });




</script>
</body>
</html>

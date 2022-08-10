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
              <div class="col-xs-12 col-sm-6" style="text-align:right">


                <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Nuevo</button>
                  <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">

                 <!--=====================================
              MODAL AGREGAR USUARIO
              ======================================-->

              <div id="modalAgregarUsuario" class="modal fade" role="dialog">
                
                <div class="modal-dialog">

                  <div class="modal-content">

                    <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                      <!--=====================================
                      CABEZA DEL MODAL
                      ======================================-->

                      <div class="modal-header" style="background:#3c8dbc; color:white">

                        <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                        <h4 class="modal-title" style="text-align: left;">Agregar Usuario</h4>

                      </div>

                      <!--=====================================
                      CUERPO DEL MODAL
                      ======================================-->

                      <div class="modal-body">

                        <div class="box-body">


                          <!-- ENTRADA PARA EL ROL Y EL USUARIO -->

                           <div class="form-group">
                            
                            <div class="form-group">                              
                              <div class="input-group">
                              
                                <span class="input-group-addon"><i class="fa fa-cogs"></i></span> 

                                <select class="form-control input-lg" name="nuevoRol" id="rol">
                                  
                                  <option value="">Seleccionar rol</option>
                                      <option value="1">Administrador</option>
                                      <option value="2">Profesor</option>
                                      <option value="3">Alumno</option>

                                </select>

                                <span class="input-group-addon"><i class="fa fa-indent"></i></span> 

                                <select class="form-control input-lg" name="nuevoPerfil" id="cedula">
                                      <option value="">Selecionar usuario</option>
                                      <option value="27828164">C.I. 27.828.164. Carmen López</option>
                                      <option value="27737749">C.I. 27.737.749. Luis</option>
                                      <option value="27736916">C.I. 27.736.916. Javier</option>

                                </select>

                              </div>
                                <span id="rolS"  class="mensajeError col-lg-5"></span>
                                <span id="cedulaS"  class="mensajeError col-lg-7"></span>

                            </div>
                         

                          </div>
                          
                          
                           <!-- ENTRADA PARA EL NOMBRE -->
                          
                          <div class="form-group">                            
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                              <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nombre" placeholder="Ingresar user" maxlength="30" required>
                            </div>
                            <span id="nombreM" class="mensajeError"></span>



                          </div>


                          <!-- ENTRADA PARA EL PASSWORD -->

                           <div class="form-group">                            
                            <div class="input-group">                           
                              <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                              <input type="password" class="form-control input-lg" name="nuevoPass" placeholder="Ingresar contraseña" id="pass" maxlength="32" required>
                            </div>
                            <span id="nombreP" class="mensajeError"></span>

                          </div>
                        

                        </div>

                      </div>

                      <!--=====================================
                      PIE DEL MODAL
                      ======================================-->

                      <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                        <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>

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
                  <th>User</th>
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>Acciones</th>
                  <?php //endif ?>
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
                 
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <td style="width:10%">
                    <!-- <table style="background:none;text-align:center;width:100%"> -->
                      <!-- <tr> -->
                        <?php //if ($amUsuariosE==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn modificarBtn" id="modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['cedula_usuario'] ?>">
                            <span class="fa fa-pencil"></span>
                          </button>
                        
                        <!-- </td> -->
                        <?php //endif; ?>
                        <?php //if ($amUsuariosB==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['cedula_usuario'] ?>">
                            <span class="fa fa-trash"></span>
                          </button>
                          
                        <!-- </td> -->
                        <?php //endif; ?>
                      <!-- </tr> -->
                    <!-- </table> -->
                  </td>
                  <?php //endif ?>

                  <button type="button" id="modificarButton<?=$data['cedula_usuario']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarUsuario<?=$data['cedula_usuario']?>" style="display: none">Modificar</button>

                  <div id="modalModificarUsuario<?=$data['cedula_usuario']?>" class="modalModificarUsuario modal fade modalModificarUsuario<?=$data['cedula_usuario']?>" role="dialog">
                    
                    <div class="modal-dialog">
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

                          <div class="modal-body"  style="max-height:70vh;overflow:auto;">

                            <div class="box-body">

                          
                              <!-- ENTRADA PARA EL ROL Y EL USUARIO -->

                           <div class="form-group">
                            
                            <div class="form-group">                              
                              <div class="input-group">
                              
                                <span class="input-group-addon"><i class="fa fa-cogs"></i></span> 

                                <select class="form-control input-lg rolModificar" name="<?=$data['cedula_usuario']?>" id="rol<?=$data['cedula_usuario']?>">
                                  
                                      <option value="">Seleccionar rol</option>

                                      <option <?php if($data['id_rol']=="1"){ echo "selected"; } ?> value="1">Administrador</option>
                                      <option <?php if($data['id_rol']=="2"){ echo "selected"; } ?> value="2">Profesor</option>
                                      <option <?php if($data['id_rol']=="3"){ echo "selected"; } ?> value="3">Alumno</option>

                                </select>

                                <span class="input-group-addon"><i class="fa fa-indent"></i></span> 

                                <select class="form-control input-lg cedulaModificar" name="<?=$data['cedula_usuario']?>" id="cedula<?=$data['cedula_usuario']?>">
                                      <option value="">Selecionar usuario</option>
                                      <!-- <?php foreach ($alumnos as $alum): ?>
                                        <option <?php if($data['cedula_usuario']==$alum['cedula']){ echo "selected"; } ?> value=''> <?php echo $alum['nombre']; ?> </option>
                                      <?php endforeach ?> -->
                                      <option <?php if($data['cedula_usuario']=="27828164"){ echo "selected"; } ?> value="27828164">C.I. 27.828.164. Carmen López</option>
                                      <option <?php if($data['cedula_usuario']=="27737749"){ echo "selected"; } ?> value="27737749">C.I. 27.737.749. Luis</option>
                                      <option <?php if($data['cedula_usuario']=="27736916"){ echo "selected"; } ?> value="27736916">C.I. 27.736.916. Javier</option>

                                </select>

                              </div>
                              <div style="width:100%;text-align:right;margin-bottom:30px;">
                                  
                                <span id="rolS<?=$data['cedula_usuario']?>"  class="mensajeError col-lg-5"></span>
                                <span id="cedulaS<?=$data['cedula_usuario']?>"  class="mensajeError col-lg-7"></span>
                              </div>

                            </div>
                        
                          </div>
                              <!-- ENTRADA PARA EL NOMBRE -->
                              
                              <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                  <input type="text" class="form-control input-lg nombreModificar"  maxlength="25" value="<?=$data['nombre_usuario']?>" name="<?=$data['cedula_usuario']?>" id="nombre<?=$data['cedula_usuario']?>" placeholder="Ingresar nombre" required>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="nombreM<?=$data['cedula_usuario']?>" class="mensajeError"></span>
                                </div>
                                
                              </div>

                          <!-- ENTRADA PARA EL PASSWORD -->

                           <div class="form-group">
                            
                            <div class="">
                            
                              <div class="form-row col-lg-12">
                                  <div class="accordion w-100" id="accordion">
                                      <!-- Cantraseña -->
                                      <div class="card cont">
                                          <div class="card-header" id="headingOne">
                                              <h5 class="mb-0">
                                                  <button type="submit" class="btn btn-block cont" id="cont<?=$data['cedula_usuario']?>" value="<?=$data['cedula_usuario']?>"  data-toggle="collapse" data-target="#collapseOne<?=$data['cedula_usuario']?>" aria-expanded="false" aria-controls="collapseOne<?=$data['cedula_usuario']?>">
                                                      <h4 class="text-center">Contraseña</h4>
                                                  </button>
                                              </h5>
                                          </div>
                                          <input type="hidden" value="0" class="optpass<?=$data['cedula_usuario']?>">
                                          <div class="collapse " id="collapseOne<?=$data['cedula_usuario']?>" aria-labelledby="headingOne" data-parent="#accordion">
                                              <div class="card-body">
                                                  <div class="form-row">
                                                      <div class="col-md">
                                                              <!-- <label for="contrasena">Password</label> -->
                                                          <div class="input-group">
                                                              <!-- <input type="password" class="form-control" name="contrasena" id="contrasena" minlength="8" maxlength="20"> -->
                                                          <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                          <input type="password" class="form-control input-lg nuevoPassword"placeholder="Nueva contraseña" id="nuevoPassword<?=$data['cedula_usuario']?>" maxlength="32" value="" name="<?=$data['cedula_usuario']?>" required>
                                                          </div>
                                                          
                                                      </div>
                                                      <br>
                                                      <div class="col-md">
                                                              <!-- <label for="confirmarContrasena">Confirmar Password</label> -->
                                                          <div class="input-group">
                                                              <!-- <input type="password" class="form-control" name="confirmarContrasena" id="confirmarContrasena" minlength="8" maxlength="20"> -->
                                                          <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                          <input type="password" name="<?=$data['cedula_usuario']?>" class="form-control input-lg confirmarPassword" placeholder="Confirmar contraseña" id="confirmarPassword<?=$data['cedula_usuario']?>" maxlength="32" value="" required>
                                                          </div>
                                                          <div style="width:100%;text-align:right;">
                                                            <span id="nuevoP<?=$data['cedula_usuario']?>" class="mensajeError"></span>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      
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
                      
                      
                </tr>
                <?php
               endif; endforeach;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nº</th>
                  <th>Cédula</th>
                  <th>User</th>
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
 

<script>
$(document).ready(function(){ 

$('#nombre').on('input', function () {      
  this.value = this.value.replace(/[^0-9 a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g,''); });

$('.nombreModificar').on('input', function () {      
  this.value = this.value.replace(/[^0-9 a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g,''); });

$('#pass').on('input', function () {      
  this.value = this.value.replace(/^[a-z0-9_-]{$/,''); });

$("#rol").change(function(){
  var rol = $(this).val();
  if(rol == ""){
    $("#rolS").html("Seleccione un rol");
  }else{
    $("#rolS").html("");
  }
});

$(".rolModificar").change(function(){
  var id = $(this).attr("name");
  var rol = $(this).val();
  if(rol == ""){
    $("#rolS"+id).html("Seleccione un rol");
  }else{
    $("#rolS"+id).html("");
  }
});

$("#cedula").change(function(){
  var cedula = $(this).val();
  if(cedula == ""){
    $("#cedulaS").html("Seleccione un cedula");
  }else{
    $("#cedulaS").html("");
  }
});

$(".cedulaModificar").change(function(){
  var id = $(this).attr("name");
  var cedula = $(this).val();
  if(cedula == ""){
    $("#cedulaS"+id).html("Seleccione un cedula");
  }else{
    $("#cedulaS"+id).html("");
  }
});
$(".nuevoPassword").keyup(function(){
  var id = $(this).attr("name");
  var pass1 = $("#nuevoPassword"+id).val();
  var pass2 = $("#confirmarPassword"+id).val();
  if(pass1 == pass2){
    $("#nuevoP"+id).html("Las contraseñas coinciden");
    $("#nuevoP"+id).attr("style","color:green !important");
  }else{
    $("#nuevoP"+id).html("Las contraseñas no coinciden");
    $("#nuevoP"+id).removeAttr("style");
  }
});
$(".confirmarPassword").keyup(function(){
  var id = $(this).attr("name");
  var pass1 = $("#nuevoPassword"+id).val();
  var pass2 = $("#confirmarPassword"+id).val();
  if(pass1 == pass2){
    $("#nuevoP"+id).html("Las contraseñas coinciden");
    $("#nuevoP"+id).attr("style","color:green !important");
  }else{
    $("#nuevoP"+id).html("Las contraseñas no coinciden");
    $("#nuevoP"+id).removeAttr("style");
  }
});


  $("#guardar").click(function(){
    var url = $("#url").val();
    // alert('hola');

    var response = validar();
    // alert(response);
    if (response) {
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

          let rol = $("#rol").val();     
          let cedula = $("#cedula").val();     //Se capturan la informacion en las variables user y password 
          let user = $("#user").val();
          let pass = $("#pass").val();

        
        ajax({
            url: url+
            '/Agregar',    
            type: 'POST',   
            data: {
              Agregar: true,   
              rol: rol,       
              cedula: cedula,       
              user: user,       
              pass: pass,
            },
            success: function(respuesta){       
              var data = JSON.parse(respuesta);    
               // window.alert(respuesta);
              // alert("Hola");
              // alert(data);   
               if (data.msj === "Good") {   
                 Swal.fire({
                  type: 'success',
                  title: '¡Registro Exitoso!',
                  text: 'Has agregado al usuario ' + user + ' al sistema',
                  footer: 'SCHSL',
                  timer: 4000,
                  showCloseButton: false,            
                  showConfirmButton: false,
                }).then((isConfirm) => {
                      location.reload();
                  });
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
    }
      
    // alert("Hola mundo");
    // alert(rol + '  '  + cedula + ' ' + user + ' ' + pass);

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
            let userModif = $(this).val();
            // alert(userModif);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                userModif: userModif,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") {  
                  $("#modificarButton"+userModif).click(); 
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


 $(".modificarButtonModal").click(function(){
    var url = $("#url").val();
    var id = $(this).val();
    // alert(id);
    
    var response = validar(true, id);
    /*console.log(response);
    window.alert(response);*/
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
            // alert('Hello');
            let rol = $("#rol"+id).val();     
            let cedula = $("#cedula"+id).val();     
            let nombre = $("#nombre"+id).val();     
            let nuevoPassword = $("#nuevoPassword"+id).val();     
            let confirmarPassword = $("#confirmarPassword"+id).val();     
            // alert( rol + ' ' + cedula + ' ' + nombre);
            // alert( nuevoPassword + ' ' + confirmarPassword);

            /*if (nuevoPassword == confirmarPassword) {
              let password = nuevoPassword;
              alert(password + 'hola');
            }*/
            
            $.ajax({
              url: url+'/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,   
                codigo: id,   
                cedula: cedula, 
                nombre: nombre,   
                rol: rol,
                nuevoPassword: nuevoPassword,

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
                        text: 'Se ha modificado el usuario ' + nombre + ' en el sistema',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      }).then((isConfirm) => {
                          location.reload();
                      } );
                  } 
                  if (datos.msj === "Repetido") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Registro repetido!',
                      text: 'El usuaro ' + nombre + ' ya esta agregado al sistema con la cedula '+cedula,
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
                          // alert(datos.msj);
                          if (datos.msj === "Good") {   
                            Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado el usuario ' + datos.data.nombre_usuario + ' del sistema',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            }).then((isConfirm) => {
                                location.reload();
                            } );
                          }
                          if (datos.msj === "Repetido") {   
                            Swal.fire({
                              type: 'warning',
                              title: '¡Registro repetido!',
                              text: 'El usuario ' + userDelete + ' ya esta agregado al sistema',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            });
                          }
                          if (datos.msj === "Error") {   
                            Swal.fire({
                              type: 'error',
                              title: '¡Error la guardar los cambios!',
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



  $(".cont").click(function(){
    var id = $(this).val();
    if ($(".optpass"+id).val() == 1) {
      $(".optpass"+id).val(0);
    }else if ($(".optpass"+id).val() == 0) {
      $(".optpass"+id).val(1);
    }
      // alert('hola');
  });




function validar(modificar = false, id=""){
    var form = "";
    // var id = $("#modalModificarModulo").val(); 
    if(!modificar){
      form = "#modalAgregarUsuario";
    }else{
      form = "#modalModificarUsuario"+id;
       // alert(form);
    }
    var nombre = $(form+" #nombre"+id).val();
    // alert(nombre);
    var rnombre = false;
    if(nombre.length > 2){ 
      rnombre = true;
      $(form+" #nombreM"+id).html("");
    }else{
      $(form+" #nombreM"+id).html("Debe ingresar el nombre del usuario");
    }

    var rol = $(form+" #rol"+id).val();
    // alert(rol);
    var rrol = false;
    if(rol == ""){
      $(form+" #rolS"+id).html("Seleccione un rol");
    }else{
      rrol = true;
      $(form+" #rolS"+id).html("");
    }

    var cedula = $(form+" #cedula"+id).val();
    // alert(cedula);
    var rcedula = false;
    if(cedula == ""){
      $(form+" #cedulaS"+id).html("Seleccione un cedula");
    }else{
      rcedula = true;
      $(form+" #cedulaS"+id).html("");
    }

    var optionPass = $(".optpass"+id).val();
    if (optionPass==1) {

      var pass = $(form+" #nuevoPassword"+id).val();
      var passConfirm = $(form+" #confirmarPassword"+id).val();
      var rpass = false;
      // alert(pass);
      // alert(passConfirm);
      if (pass.trim() != "" && passConfirm.trim() != "") {
        if(pass == passConfirm){ 
          $(form+" #nuevoP"+id).html("");  
            rpass = true;
        }else{
          $(form+" #nuevoP"+id).html("Las contraseñas deben ser iguales");
           rpass = false;
        }   
      }else{
        $(form+" #nuevoP"+id).html("Debe ingresar su nueva contraseña");
        rpass = false;
      }
      // alert(rpass);
    }else{
      var rpass = true;
    }
    // $("#cont").click(function(){
      
    // });
 


    var validado = false;
    if(rnombre==true && rpass==true && rrol==true && rcedula==true && rpass==true){
      validado=true;
    }else{
      validado=false;
    }
    // alert(validado);
    return validado;
  }

}); 
</script>
</body>
</html>

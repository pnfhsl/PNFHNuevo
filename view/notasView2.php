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

               <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#agregarNotas">Agregar Nuevo</button>

                 <!--=====================================
              MODAL AGREGAR NOTA
              ======================================-->

              <div id="agregarNotas" class="modal fade" role="dialog">
                
                <div class="modal-dialog">

                  <div class="modal-content">

                    <form role="form" method="post" enctype="multipart/form-data">

                      <!--=====================================
                      CABEZA DEL MODAL
                      ======================================-->

                      <div class="modal-header" style="background:#3c8dbc; color:white">

                        <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                        <h4 class="modal-title" style="text-align: left;">Agregar Notas</h4>

                      </div>

                      <!--=====================================
                      CUERPO DEL MODAL
                      ======================================-->

                      <div class="modal-body">

                        <div class="box-body">


                          <!-- ENTRADA PARA LA SECCION -->

                           <div class="form-group">
                            
                            <div class="form-group">                              
                              <div class="input-group">
                              
                                <span class="input-group-addon"><i class="fa fa-cogs"></i></span> 

                                <select class="form-control input-lg" name="nuevoRol" id="rol">
                                  
                                  <option value="">Sección</option>
                                      <option value="Administrador">IN2102</option>
                                      <option value="Especial">Profesor</option>
                                      <option value="Vendedor">Alumno</option>

                                </select>

                                <span class="input-group-addon"><i class="fa fa-indent"></i></span> 

                                <select class="form-control input-lg" name="nuevoPerfil" id="especialidad">
                                      <option value="">Saber Complementario</option>
                                      <option value="Administrador">Metodología I</option>
                                      <option value="Especial">Metodología II</option>
                                      <option value="Vendedor">Metodología III</option>

                                </select>

                              </div>

                            </div>
                         

                          </div>
                          
                          
                           <!-- ENTRADA PARA LA NOTA -->
                          
                          <div class="form-group">
                            
                            <div class="input-group">
                            
                              <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                              <input type="text" class="form-control input-lg" name="nuevoUsuario" id="user" placeholder="Alumno" value="Lynneth Pereira" disabled required>

                              <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                              <input type="number" class="form-control input-lg" name="nuevoPass" placeholder="Nota" id="pass" required>

                            </div>

                          </div>


                          <div class="form-group">
                              
                              <div class="input-group">
                              
                                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                <input type="text" class="form-control input-lg" name="nuevoUsuario" id="user" placeholder="Alumno" value="Samuel Torrealba" disabled required>

                                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                <input type="number" class="form-control input-lg" name="nuevoPass" placeholder="Nota" id="pass" required>

                              </div>

                          </div>


                           <div class="form-group">
                              
                              <div class="input-group">
                              
                                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                <input type="text" class="form-control input-lg" name="nuevoUsuario" id="user" placeholder="Alumno" value="Yosneidy Carreño" disabled required>

                                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                <input type="number" class="form-control input-lg" name="nuevoPass" placeholder="Nota" id="pass" required>

                              </div>

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


                    </form>

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
                  <th>Id</th>
                  <th>Clase</th>
                  <th>Alumno</th>
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>Nota</th>
                  <th>Acciones</th>
                  <?php //endif ?>
                </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
                foreach ($notas as $data):
                if(!empty($data['id_nota'])):  
                ?>
                <tr>
                  <td style="width:5%">
                    <span class="contenido2">
                      <?php echo $num++; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['id_nota']; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['id_clase']; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['id_SA']; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['nota']; ?>
                    </span>
                  </td>
                 
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <td style="width:10%">
                    <!-- <table style="background:none;text-align:center;width:100%"> -->
                      <!-- <tr> -->
                        <?php //if ($amUsuariosE==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['id_nota'] ?>">
                            <span class="fa fa-pencil">
                              
                            </span>
                          </button>
                        <!-- </td> -->
                        <?php //endif; ?>
                        <?php //if ($amUsuariosB==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['id_nota'] ?>">
                            <span class="fa fa-trash"></span>
                          </button>
                        <!-- </td> -->
                        <?php //endif; ?>
                      <!-- </tr> -->
                    <!-- </table> -->
                  </td>
                  <?php //endif ?>
                  

                  <button type="button" id="modificarButton<?=$data['id_nota']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarProf<?=$data['id_nota']?>" style="display: none">Modificar</button>
                  <!--=====================================
                    MODAL MODIFICAR NOTA
                   ======================================-->
                  <input type="text" value="modalModificarProf<?=$data['id_nota']?>" name="">

                   <div id="#modalModificarProf<?=$data['id_nota']?>" class="modal fade modalModificarProf<?=$data['id_nota']?>" role="dialog">
                    
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                          <!--=====================================
                          CABEZA DEL MODAL
                          ======================================-->

                          <div class="modal-header" style="background:#3c8dbc; color:white">

                            <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                            <h4 class="modal-title" style="text-align: left;">Modificar Nota</h4>

                          </div>

                          <!--=====================================
                          CUERPO DEL MODAL
                          ======================================-->

                          <div class="modal-body">

                            <div class="box-body">

                              <!-- ENTRADA PARA EL NOMBRE -->
                              
                              <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                  <input type="text" class="form-control input-lg" value="Yosneidy Carreño" name="nuevoNombre" id="nombre<?=$data['cedula_profesor']?>" disabled placeholder="Ingresar nombre" required>

                                </div>

                              </div>

                              <!-- ENTRADA PARA LA NOTA -->
                              
                              <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                  <input type="number" class="form-control input-lg"  value="<?=$data['nota']?>" name="nuevoApellido" id="apellido<?=$data['cedula_profesor']?>" placeholder="Ingresar apellido" required>

                                </div>

                              </div>

                            </div>

                          </div>

                          <!--=====================================
                          PIE DEL MODAL
                          ======================================-->

                          <div class="modal-footer">

                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                            <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$data['id_nota']?>" id="modificar">Modificar</button>

                          </div>


                        <!-- </form> -->

                      </div>

                    </div>

                  </div>

                  <button type="button" id="modificarButton<?=$data['cedula_profesor']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarProf<?=$data['cedula_profesor']?>" style="display: none">Modificar</button>

                  <div id="modalModificarProf<?=$data['cedula_profesor']?>" class="modal fade modalModificarProf<?=$data['cedula_profesor']?>" role="dialog">
                    
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                          <!--=====================================
                          CABEZA DEL MODAL
                          ======================================-->

                          <div class="modal-header" style="background:#3c8dbc; color:white">

                            <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                            <h4 class="modal-title" style="text-align: left;">Modificar Profesor</h4>

                          </div>

                          <!--=====================================
                          CUERPO DEL MODAL
                          ======================================-->

                          <div class="modal-body">

                            <div class="box-body">

                          
                              <!-- ENTRADA PARA EL USUARIO -->

                               <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span> 

                                  <input type="text" class="form-control input-lg" value="<?=$data['cedula_profesor']?>" name="nuevaCedula" placeholder="Ingresar cedula" id="cedula<?=$data['cedula_profesor']?>" required>

                                </div>

                              </div>

                              <!-- ENTRADA PARA EL NOMBRE -->
                              
                              <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                  <input type="text" class="form-control input-lg" value="<?=$data['nombre_profesor']?>" name="nuevoNombre" id="nombre<?=$data['cedula_profesor']?>" placeholder="Ingresar nombre" required>

                                </div>

                              </div>

                              <!-- ENTRADA PARA EL APELLIDO -->
                              
                              <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                  <input type="text" class="form-control input-lg"  value="<?=$data['apellido_profesor']?>" name="nuevoApellido" id="apellido<?=$data['cedula_profesor']?>" placeholder="Ingresar apellido" required>

                                </div>

                              </div>



                              

                              <!--ENTRADA CORREO -->

                              <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                  <input type="text" class="form-control input-lg" value="<?=$data['correo_profesor']?>" name="nuevoCorreo" id="correo<?=$data['cedula_profesor']?>" placeholder="Ingresar Correo" required>

                                </div>

                              </div>


                               <!--ENTRADA TELÉFONO -->

                               
                              <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                  <input type="text" class="form-control input-lg" value="<?=$data['telefono_profesor']?>" name="nuevoTeleono" id="telefono<?=$data['cedula_profesor']?>" placeholder="Ingresar Nro Telefonico" required>

                                </div>

                              </div>

                            </div>

                          </div>

                          <!--=====================================
                          PIE DEL MODAL
                          ======================================-->

                          <div class="modal-footer">

                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                            <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$data['cedula_profesor']?>" id="modificar">Modificar</button>

                          </div>


                        <!-- </form> -->

                      </div>

                    </div>
                    

                  <!-- <div id="modalModificarProf<?=$data['id_nota']?>" class="modal fade modalModificarProf<?=$data['id_nota']?>" role="dialog">
                    
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <form role="form" method="post" enctype="multipart/form-data">


                          <div class="modal-header" style="background:#3c8dbc; color:white">

                            <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                            <h4 class="modal-title" style="text-align: left;">Modificar Profesor</h4>

                          </div>


                          <div class="modal-body">

                            <div class="box-body">

                          
                               <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span> 

                                  <input type="text" class="form-control input-lg" value="<?=$data['id_nota']?>" name="nuevaCedula" placeholder="Ingresar cedula" id="cedula<?=$data['id_nota']?>" required>

                                </div>

                              </div>

                              
                              <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                  <input type="text" class="form-control input-lg" value="<?=$data['id_clase']?>" name="nuevoNombre" id="nombre<?=$data['id_nota']?>" placeholder="Ingresar nombre" required>

                                </div>

                              </div>
                              
                              <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                  <input type="text" class="form-control input-lg"  value="<?=$data['apellido_profesor']?>" name="nuevoApellido" id="apellido<?=$data['id_nota']?>" placeholder="Ingresar apellido" required>

                                </div>

                              </div>



                              <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                  <input type="text" class="form-control input-lg" value="<?=$data['id_SA']?>" name="nuevoCorreo" id="correo<?=$data['id_nota']?>" placeholder="Ingresar Correo" required>

                                </div>

                              </div>


                            </div>

                          </div>

                          <div class="modal-footer">

                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                            <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$data['id_nota']?>" id="modificar">Modificar</button>

                          </div>


                        </form>

                      </div>

                    </div>

                  </div> -->
                      
                </tr>
                <?php
               endif; endforeach;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nº</th>
                  <th>Id</th>
                  <th>Clase</th>
                  <th>Alumno</th>
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>Nota</th>
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

  $(".modificarButtonModal").click(function(){
    var id = $(this).val();
    // alert(id);

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


            $.ajax({
              url: 'Profesores/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,   
                codigo: id,   
                cedula: cedula,       
                nombre: nombre,       
                apellido: apellido,
                correo: correo,
                telefono: telefono,
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
                      text: 'Se ha modificado al profesor ' + nombre + ' ' + apellido + ' en el sistema', 
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    }).then((isConfirm) => {
                        location.reload();
                    } );
                  } 
                  if (datos.msj === "Repetido") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Registro repetido!',
                      text: 'El profesor ' + nombre + ' ' + apellido + ' ya esta agregado al sistema con la cedula '+cedula,
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

  });


  $("#guardar").click(function(){
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
            let correo = $("#correo").val();
            let telefono = $("#telefono").val();

          /*alert(cedula + ' ' + nombre + ' ' + apellido + ' ' + especialidad);*/
              $.ajax({
                url: 'Profesores/Agregar',    
                type: 'POST',   
                data: {
                  Agregar: true,   
                  cedula: cedula,       
                  nombre: nombre,       
                  apellido: apellido,
                  correo: correo,
                  telefono: telefono,
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
                        text: 'Se ha agregado al profesor ' + nombre + ' ' + apellido + ' al sistema',
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
            window.alert($(this).val());
            let notaModif = $(this).val();
            // alert(notaModif);
            $.ajax({
              url: 'Notas/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                notaModif: notaModif,       
              },
              success: function(respuesta){       
                alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                alert(resp.msj);
                if (resp.msj == "Good") {  
                  alert(notaModif);
                  $("#modificarButton"+notaModif).click(); 

                  
                  alert('Bienvenido');                    
                  /*console.log('Aquí estoy yo');*/ 
                  

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
                        window.alert($(this).val());
                        let notaDelete = $(this).val();
                      $.ajax({
                        url: 'Notas/Eliminar',    
                        type: 'POST',   
                        data: {
                          Eliminar: true,   
                          notaDelete: notaDelete,
                        },
                        success: function(respuesta){       
                          alert(respuesta);
                          var datos = JSON.parse(respuesta);
                          if (datos.msj === "Good") {   
                            Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado la calificación ' + datos.data.id_clase + ' ' + datos.data.apellido_profesor + ' ya cuya cédula es ' + userDelete+' del sistema',
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
                              title: '¡Error al realizar la acción!',
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
</script>
</body>
</html>

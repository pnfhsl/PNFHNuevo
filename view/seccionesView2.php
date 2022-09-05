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
                <button class="btn enviar2" style=""  data-toggle="modal" data-target="#modalAgregarSeccion">Agregar Nuevo</button>

                 <!--=====================================
              MODAL AGREGAR Seccion
              ======================================-->

              <div id="modalAgregarSeccion" class="modal fade" role="dialog" style="text-align:left;">
                
                <div class="modal-dialog" ><?php #style="margin-right:auto;margin-left:auto;width:80%;" ?>

                  <div class="modal-content">

                    <form role="form" method="post" enctype="multipart/form-data">

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

                      <div class="modal-body">

                        <div class="box-body">

                          
                          <!-- ENTRADA PARA EL USUARIO -->
                          <div class="row">
                            <div class="form-group col-xs-12">
                              <div class="input-group " style="">
                                <span class="input-group-addon"><i class="fa fa-address-card"></i></span> 
                                <select class="form-control select2 input-lg" style="width:100%;" name="periodo" placeholder="Ingresar periodo" id="periodo" required>
                                  <option value="">Seleccione un periodo</option>
                                  <?php
                                  foreach ($periodos as $per):
                                    if(!empty($per['id_periodo'])):
                                  ?>
                                  <option value="<?=$per['id_periodo']?>"><?=mb_strtoupper($per['nombre_periodo'])." (".$per['year_periodo'].")"?></option>
                                  <?php 
                                    endif;
                                  endforeach;
                                  ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group col-xs-12">
                              <div class="input-group " >
                                <span class="input-group-addon"><i class="fa fa-address-card"></i></span> 
                                <select class="form-control select2 input-lg" style="width:100%;" name="trayecto" placeholder="Ingresar trayecto" id="trayecto" required>
                                  <option value="">Seleccione un trayecto</option>
                                  <option value="1">Trayecto I</option>
                                  <option value="2">Trayecto II</option>
                                  <option value="3">Trayecto III</option>
                                  <option value="4">Trayecto IV</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group col-xs-12">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                                <input type="text" class="form-control input-lg" name="nombre" id="nombre" placeholder="Ingresar nombre" required>
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
                      <?php echo mb_strtoupper($data['nombre_periodo']); ?>
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
                          <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['cod_seccion']?>">
                            <span class="fa fa-pencil">
                              
                            </span>
                          </button>
              <button type="button" id="modificarButton<?=$data['cod_seccion']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarSeccion<?=$data['cod_seccion']?>" style="display: none">Modificar</button>
              <div id="modalModificarSeccion<?=$data['cod_seccion']?>" class="modal fade" role="dialog" style="text-align:left;">
                
                <div class="modal-dialog" ><?php #style="margin-right:auto;margin-left:auto;width:80%;" ?>

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

                      <div class="modal-body">

                        <div class="box-body">

                          
                          <!-- ENTRADA PARA EL USUARIO -->
                          <div class="row" style="">
                            <div class="form-group col-xs-12">
                              <div class="input-group" style="width:100%;">
                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                <select class="form-control select2 input-lg" style="width:100%;" name="periodo" placeholder="Ingresar periodo" id="periodo<?=$data['cod_seccion']?>" required>
                                  <option value="">Seleccione un periodo</option>
                                  <?php
                                  foreach ($periodos as $per):
                                    if(!empty($per['id_periodo'])):
                                  ?>
                                  <option <?php if($data['id_periodo']==$per['id_periodo']){ echo "selected"; } ?> value="<?=$per['id_periodo']?>"><?=mb_strtoupper($per['nombre_periodo'])." (".$per['year_periodo'].")"?></option>
                                  <?php 
                                    endif;
                                  endforeach;
                                  ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group col-xs-12">
                              <div class="input-group " style="width:100%;">
                                <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                <select class="form-control select2 input-lg" style="width:100%;" name="trayecto" placeholder="Ingresar trayecto" id="trayecto<?=$data['cod_seccion']?>" required>
                                  <option value="">Seleccione un trayecto</option>
                                  <option <?php if($data['trayecto_seccion']=="1"){ echo "selected"; } ?> value="1">Trayecto I</option>
                                  <option <?php if($data['trayecto_seccion']=="2"){ echo "selected"; } ?> value="2">Trayecto II</option>
                                  <option <?php if($data['trayecto_seccion']=="3"){ echo "selected"; } ?> value="3">Trayecto III</option>
                                  <option <?php if($data['trayecto_seccion']=="4"){ echo "selected"; } ?> value="4">Trayecto IV</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group col-xs-12">
                              <div class="input-group" style="width:100%;">
                                <span class="input-group-addon" style="width:7.5%;"><i class="fa fa-user"></i></span> 
                                <input type="text" value="<?=$data['nombre_seccion']?>" style="width:100%;" class="form-control input-lg" name="nombre" id="nombre<?=$data['cod_seccion']?>" placeholder="Ingresar nombre" required>
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


  <?php //require_once('assets/footered.php'); ?>
<?php if(!empty($response)): ?>
<input type="hidden" class="responses" value="<?php echo $response ?>">
<?php endif; ?>
<script>
$(document).ready(function(){ 
    var response = $(".responses").val();
  if(response==undefined){

  }else{
    if(response == "1"){
      swal.fire({
          type: 'success',
          title: '¡Datos borrados correctamente!',
      }).then(function(){
        window.location = "?route=Campanas";
      });
    }
    if(response == "2"){
      swal.fire({
          type: 'error',
          title: '¡Error al realizar la operacion!',
      });
    }
    
  }

  $(".modificarButtonModal").click(function(){
    var id = $(this).val();

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
            let periodo = $("#periodo"+id).val();     
            let trayecto = $("#trayecto"+id).val();


            $.ajax({
              url: 'Secciones/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,   
                codigo: id,   
                seccion: nombre,       
                periodo: periodo,
                trayecto: trayecto,
              },
              success: function(resp){
                alert(resp);
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
            $.ajax({
              url: 'Secciones/Buscar',    
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
                      var cod = $(this).val();
                      // alert(cod);
                      $.ajax({
                        url: 'Secciones/Eliminar',    
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

            // alert(nombre + ' ' + periodo + ' ' + trayecto);
              $.ajax({
                url: 'Secciones/Agregar',    
                type: 'POST',   
                data: {
                  Agregar: true,   
                  nombre: nombre,       
                  periodo: periodo,       
                  trayecto: trayecto,
                },
                success: function(resp){
                  alert(resp);
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
                        text: 'La seccion ' + nombre + ' ya esta agregado al sistema',
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
});  
</script>
</body>
</html>

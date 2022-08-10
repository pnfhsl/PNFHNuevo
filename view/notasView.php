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
        <li><a href="<?=_ROUTE_.$this->encriptar('Home'); ?>"><i class="fa fa-dashboard"></i> Inicio </a></li>
        <li><a href="<?=_ROUTE_.$this->encriptar('Notas'); ?>"><?php echo $url; ?></a></li>
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
              MODAL MODIFICAR PROF
              ======================================-->

              


                <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarNota">Agregar Nuevo</button>
                  <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">

                <!--=====================================
                MODAL AGREGAR PROF
                ======================================-->

              <div id="modalAgregarNota" class="modalAgregarNota modal fade" role="dialog">
                
                <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">

                  <div class="modal-content">
                        <!--=====================================
                        CABEZA DEL MODAL
                        ======================================-->
                        <div class="modal-header" style="background:#3c8dbc; color:white">
                          <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>
                          <h4 class="modal-title" style="text-align: left;">Agregar Nota</h4>
                        </div>
                        <!--=====================================
                        CUERPO DEL MODAL
                        ======================================-->
                        <div class="modal-body" style="max-height:70vh;overflow:auto">
                          <div class="box-body">
                            <div class="row" style="width:100%;">
                              
                              <!-- ENTRADA PARA LA SECCION -->
                              <div class="form-group col-xs-12 col-sm-6">
                                <label for="seccion">Sección</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-cogs"></i></span> 
                                  <select class="form-control input-lg select2" style="width:100%;" name="nuevoRol" id="seccion">
                                    <option value="">Sección</option>
                                    <?php foreach ($secciones as $date): if(!empty($date['cod_seccion'])): ?>
                                        <option value="<?php echo $date['cod_seccion'] ?>"><?php echo $date['nombre_seccion'] ?></option>
                                    <?php endif; endforeach; ?>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="error_seccion" class="mensajeError" ></span>
                                </div>
                              </div>

                              <!-- ENTRADA PARA EL SABER -->
                              <div class="form-group col-xs-12 col-sm-6">
                                <label for="saber">Saber complementario</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-indent"></i></span> 
                                  <select class="form-control input-lg select2" style="width:100% !important;" name="nuevoPerfil" id="saber">
                                    <option value="">Saber Complementario</option>
                                    <?php /* ?>
                                    <?php foreach ($saberes as $dateS): if(!empty($dateS['id_SC'])): ?>
                                      <option value="<?php echo $dateS['id_SC'] ?>"><?php echo $dateS['nombreSC'] ?></option>
                                    <?php endif; endforeach; ?>
                                    <?php */ ?>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="error_saber" class="mensajeError" ></span>
                                </div>
                              </div>




                            </div>
                            
                            <div class="row">
                              <div class="col-xs-12" style="text-align:right;">
                                <button class="btn btn-primary" id="cargarAlumnosNotas">Cargar Alumnos</button>
                              </div>
                            </div>

                            <div class="row">
                              <hr>
                            </div>



                            <div class="row boxlist_alumnosnotas" style="display:none;">

                              <!-- <div class="form-group col-xs-12">
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                  <input type="text" class="form-control input-lg" style="width:100%;" name="nuevoAl" id="alumno" placeholder="Alumno" value="<?php echo $datos['nombre_alumno'] . ' ' . $datos['apellido_alumno'] ?>" disabled required>
                                  <span class="input-group-addon" style="width:5%"><i class="fa fa-key"></i></span> 
                                  <input type="number" class="form-control input-lg" style="width:100%;" name="nuevoPass" value="0" max="1" min="0" step="0.1" placeholder="Nota" id="nota<?=$datos['cedula_alumno']?>" required>
                                </div>
                              </div> -->

                            </div>
                           



                            
                            
                            

                            <?php 
                              /*
                              $num = 1;
                              $alumnosJson = [];
                              $i = 0;
                              foreach ($alumnos as $datos): if(!empty($datos['cedula_alumno'])):  
                            ?>
                            <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                                                       
                                      <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                                      
                                        
                                            <?php //if ($amUsuariosE==1): ?>
                                            

                                              <input type="text" class="form-control input-lg" name="nuevoAl" id="alumno" placeholder="Alumno" value="<?php echo $datos['nombre_alumno'] . ' ' . $datos['apellido_alumno'] ?>" disabled required>
                                              

                                          
                                            <?php //endif; ?>
                                           
                                          
                                     
                                      <?php //endif ?>
                                      

                                                                       
                                    

                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                                  <input type="number" class="form-control input-lg" name="nuevoPass" value="0" max="1" min="0" step="0.1" placeholder="Nota" id="nota<?=$datos['cedula_alumno']?>" required>
                                  <?php 
                                        $alumnosJson[$i] = $datos['cedula_alumno'];
                                        $i++;
                                   ?>

                                </div>

                            </div>
                            <?php
                              endif; endforeach;
                            ?>
                            <span id="notaS" class="mensajeError"></span>
                            <span class="json_alumnos" style="display:none"><?=json_encode($alumnosJson);?></span>
                            <?php
                              foreach ($sa as $dateSA):
                                if(!empty($dateSA['id_SA'])):
                            ?>
                              <input type="hidden" name="" value="<?=$dateSA['id_SA']; ?>" id="idAlumno<?=$dateSA['cedula_alumno']?>">
                            <?php
                                endif;
                              endforeach;
                              */
                            ?>



                             

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
                  <th>Saber</th>
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
                      <?php echo $data['nombre_seccion']; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['nombreSC']; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo number_format($data['cedula_alumno'],0,',','.')." ".$data['nombre_alumno']." ".$data['apellido_alumno']; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo number_format($data['nota'], 2, ',', '.'); ?>
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
                  

                  <button type="button" id="modificarButton<?=$data['id_nota']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarNota<?=$data['id_nota']?>" style="display: none">Modificar</button>

                  <div id="modalModificarNota<?=$data['id_nota']?>" class="modal fade modalModificarNota<?=$data['id_nota']?>" role="dialog">
                    
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

                          
                              <!-- ENTRADA PARA EL USUARIO -->

                              <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                  <input type="hidden" class="form-control input-lg" value="<?=$data['id_SA']?>" name="nuevoNombre" id="nombre<?=$data['id_SA']?>" disabled placeholder="Ingresar nombre" required>
                                  <input type="text" class="form-control input-lg" value="<?=number_format($data['cedula_alumno'],0,',','.')." ".$data['nombre_alumno']." ".$data['apellido_alumno']?>"disabled placeholder="" required>

                                </div>

                              </div>

                              <!-- ENTRADA PARA LA NOTA -->
                              
                              <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                                  <input type="number" class="form-control input-lg"  value="<?=$data['nota']?>" name="nuevoApellido" id="nota<?=$data['id_nota']?>" placeholder="Ingresar apellido" max="1" min="0" step="0.1" required>

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
                      
                </tr>
                <?php
               endif; endforeach;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nº</th>
                  <th>Código</th>
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
              if(dataSaberes.length>0){
                for (var j = 0; j < dataSaberes.length; j++) {
                  if(dataSaberes[j]['id_SC']==data[i]['id_SC']){
              html += '<option value="'+data[i]['id_SC']+'" ';

                    // html += 'disabled="disabled"'
              
              html += ' >'+data[i]['nombreSC']+'</option>';
                  }
                }
              }
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


  // $('.seccionModificar').change(function(){

  //   var url = $("#url").val();
  //   var id = $(this).attr("name");
  //   var seccion = $(this).val();
  //   // alert(id);
  //   // alert(seccion);
  //   if(seccion==""){
  //     var html = '';
  //     html += '<option value="">Saber Complementario</option>';
  //     $("#saber"+id).html(html);
  //   }else{
  //     $.ajax({
  //       url: url+'/Buscar',    
  //       type: 'POST',  
  //       data: {
  //         Buscar: true,   
  //         saberes: true,   
  //         cod_seccion: seccion,       
  //       },
  //       success: function(respuesta){       
  //         // alert(respuesta);
  //         var resp = JSON.parse(respuesta);   
  //         // alert(resp.msj);
  //         if (resp.msj == "Good") {  
  //           var data = resp.data;
  //           var dataSaberes = "";
  //           if(resp.msjSaberes=="Good"){
  //             dataSaberes = resp.dataSaberes;
  //           }
  //           // console.log("DATA: ");
  //           // console.log(data);
  //           // console.log("Saberes: ");
  //           // console.log(dataSaberes);
  //           // console.log($("#saber"+id).html());
  //           var html = '';
  //           html += '<option value="">Saber Complementario</option>';
  //           // alert(dataSaberes);
  //           // alert(dataSaberes);

  //           for (var i = 0; i < data.length; i++) {
  //             html += '<option value="'+data[i]['id_SC']+'" ';
  //             if(dataSaberes.length>0){
  //               for (var j = 0; j < dataSaberes.length; j++) {
  //                 if(dataSaberes[j]['id_SC']==data[i]['id_SC']){
  //                   if(dataSaberes[j]['id_clase']==id){
  //                     html += 'selected="selected"'
  //                   }else{
  //                     html += 'disabled="disabled"'
  //                   }
  //                 }
  //               }
  //             }
  //             html += ' >'+data[i]['nombreSC']+'</option>';
  //           }
  //           $("#saber"+id).html(html);
  //         }
  //         if(resp.msj == "Vacio"){
  //           var html = '';
  //           html += '<option value="">Saber Complementario</option>';
  //           $("#saber"+id).html(html);
  //         }
  //       },
  //       error: function(respuesta){       
  //         // alert(respuesta);
  //         var resp = JSON.parse(respuesta);
  //         console.log(resp);
  //       }
  //     });
  //   }
  // });

  $("#cargarAlumnosNotas").click(function(){
    var seccion = $("#seccion").val();
    var saber = $("#saber").val();
    if((seccion!="" && saber != "")){
      // alert(seccion);
      // alert(saber);
      // alert('asd');
    }else{
      Swal.fire({
        type: 'warning',
        title: '¡Debe seleccionar la sección y el saber complementario!',
        text: 'La sección y el saber complementario deben ser seleccionados para buscar a los alumnos de la clase',
        footer: 'SCHSL', showCloseButton: false, showConfirmButton: true,
        // footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
      });
    }
  });

// $("#nota").keypress(function (e) {
//         console.log(e.target)
//         expresion = /^[0-1]$/
//         validarKeyPress(expresion, e);
//     })

// $("#nota").keyup(function (e) {
//     console.log(e.target)
//     expresion = /^[0-1]{1,2}$/;
//     if(!expresion.test(e.target.value)){
//         $("#notaS").text("Edad incorrecta")
//     }
//     else{
//         $("#notaS").text("")
//     }
// })

// function validarKeyPress(expresion, e) {
//         //key obtiene el código ASCII del evento recuerde que
//         var key = e.keyCode || e.which;
//         //Luego se transforma el código ASCII en un carácter
//         var tecla = String.fromCharCode(key);
//         //Se procede a comparar con la expresión regular usando la función test
//         if (!expresion.test(tecla)) {
//             e.preventDefault(); //Si no se cumple la expresión no se escribe el valor de la tecla
//         }
//     }  



  $("#guardar").click(function(){
    var url = $("#url").val();
    // var id = $(this).val();
    // alert(id);
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
     
            let seccion = $("#seccion").val();     
            let saber = $("#saber").val();     

            var json = $(".json_alumnos").html();
            var data = JSON.parse(json);

            // alert(data.length);
            var idAlumno = new Array();
            var notaAlumno = new Array();
            for(var i = 0; i < data.length; i++){
              idAlumno[i] = $("#idAlumno"+data[i]).val();
              notaAlumno[i] = $("#nota"+data[i]).val();

            }
            // alert('asd');
              // console.log(idAlumno);
              // console.log(notaAlumno);

            // let alumno = $("#idAlumno").val(); 
            // alert(alumno);    
            // let nota = $("#nota").val();     

          // alert(saber + ' ' + seccion + ' ');
          // alert(saber + ' ' + alumno + ' ' + nota + ' ');
              $.ajax({
                url: url+'/Agregar',    
                type: 'POST',   
                data: {
                  Agregar: true,          
                  seccion: seccion,       
                  saber: saber,       
                  idSA: idAlumno,       
                  notas: notaAlumno,   
                },
                success: function(resp){
                 // alert(resp);
                 /*window.alert("Hola mundo");*/ 
                /*  
                console.log(resp); 
                  window.alert(resp);*/
                  var datos = JSON.parse(resp); 
                  /*alert(datos.msj);*/    
                    if (datos.msj === "Good") {   
                      Swal.fire({
                        type: 'success',
                        title: '¡Registro Exitoso!',
                        text: 'Se ha agregado la nota de los alumnos en el sistema',
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


  $(".modificarBtn").click(function(){
    var url = $("#url").val();
    // var id = $(this).val();
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
            let notaModif = $(this).val();
            // alert(notaModif);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                notaModif: notaModif,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") {  
                  $("#modificarButton"+notaModif).click(); 

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
    // alert(id);
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

            let nota = $("#nota"+id).val();
            // alert(nota);

            $.ajax({
              url: url+'/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,   
                codigo: id,
                nota: nota,       
              },
              success: function(resp){
                // alert(resp);
                var datos = JSON.parse(resp);   
                if (datos.msj === "Good") {   
                  // alert("asdasd");
                      Swal.fire({
                        type: 'success',
                        title: '¡Modificacion Exitosa!', 
                        text: 'Se ha modificado la nota en el sistema', 
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
                        let notaDelete = $(this).val();
                      $.ajax({
                        url: url+'/Eliminar',    
                        type: 'POST',   
                        data: {
                          Eliminar: true,   
                          notaDelete: notaDelete,
                        },
                        success: function(respuesta){       
                          // alert(respuesta);
                          var datos = JSON.parse(respuesta);
                          if (datos.msj === "Good") {   
                            Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado la nota del alumno ' + datos.data.id_SA,
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
                              title: '¡Error al realizar los cambios!',
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
      form = "#modalAgregarNota";
    }else{
      form = "#modalModificarNota"+id;
       // alert(form);
    }

      var json = $(".json_alumnos").html();
      var data = JSON.parse(json);
      // alert(data);

      var notaAlumno = new Array();
      var aNota = new Array();
      var miArreglo = new Array();
      // alert(aNota);
      // alert(aNota);
      var rnota = false;
    for(var i = 0; i < data.length; i++){   
      notaAlumno[i] = $("#nota"+data[i]).val();
      aNota[i] = false;
      // alert(notaAlumno[i]);
      // alert(aNota[i]);

      if(notaAlumno[i] > 0 && notaAlumno[i] <= 1){ 
        aNota[i] = true;  
        // alert(notaAlumno[i] + ' ' + aNota[i]);
        // rnota = true;
        $(form+" #notaS"+id).html("");
      }else if (notaAlumno[i] < 0) {
        aNota[i] = false;
        $(form+" #notaS"+id).html("La calificación del alumno no debe ser menor a 0pt");
      }else{
        aNota[i] = false;
        // alert(notaAlumno[i] + ' ' + aNota[i]);
        $(form+" #notaS"+id).html("La calificación del alumno no debe ser mayor a 1pt");

      }
        miArreglo = aNota[i] + ' ';   // guardar en el arreglo todos los valores, sean true o false 
      // alert(miArreglo);


      var validado = false;
      if(aNota[i]==true ){
        validado=true;
      }else{
        validado=false;
      }
     alert(validado);
    return validado;
    }
    // var nota = $(form+" #nota").val();
    // alert(nota);
    

}
</script>
</body>
</html>

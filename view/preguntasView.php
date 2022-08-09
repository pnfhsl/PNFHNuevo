<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo _NAMESYSTEM_; ?> | <?php if(!empty($action)){echo $action; } ?> <?php if(!empty($url)){echo $url;} ?></title>
</head>
<style>
    body{
        background-color: #ecf0f5;
    }
    .main-footer{
        margin-left: 0px;
        width: 100%;
        bottom: 0px;
        position: fixed;
    }
</style>
<body>
    <br><br><br><br><br><br>
    <!-- left column -->
    <div class="col-md-3"></div>
    <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" style="margin-top:10px; margin-bottom:10px;">Preguntas de Seguridad</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                  <div class="form-group">
                    <label>Pregunta #1</label>
                    <select class="form-control" id="preg_uno">
                      <?php 
                        foreach ($preguntas as $data):
                          if(!empty($data['id'])):  
                      ?>
                      <option value="<?php echo $data['id']; ?>"><?php echo $data['pregunta']; ?></option>
                      <?php
                        endif; endforeach;
                      ?>
                    </select>
                  </div>
                <div class="form-group">
                  <label for="">Respuesta</label>
                  <input type="text" class="form-control" id="resp_uno" placeholder="Ingrese su respuesta">
                </div>

                <div class="form-group">
                    <label>Pregunta #2</label>
                    <select class="form-control" id="preg_dos">
                    <?php 
                        foreach ($preguntas as $data):
                          if(!empty($data['id'])):  
                      ?>
                      <option value="<?php echo $data['id']; ?>"><?php echo $data['pregunta']; ?></option>
                      <?php
                        endif; endforeach;
                      ?>
                    </select>
                  </div>
                <div class="form-group">
                  <label for="">Respuesta</label>
                  <input type="text" class="form-control" id="resp_dos" placeholder="Ingrese su respuesta">
                </div>

                <div class="form-group">
                    <label>Pregunta #3</label>
                    <select class="form-control" id="preg_tres">
                    <?php 
                        foreach ($preguntas as $data):
                          if(!empty($data['id'])):  
                      ?>
                      <option value="<?php echo $data['id']; ?>"><?php echo $data['pregunta']; ?></option>
                      <?php
                        endif; endforeach;
                      ?>
                    </select>
                  </div>
                <div class="form-group">
                  <label for="">Respuesta</label>
                  <input type="text" class="form-control" id="resp_tres" placeholder="Ingrese su respuesta">
                </div>
            
              </div>
              <!-- /.box-body -->
              
            </form>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
            </div>
          </div>
          <!-- /.box -->
          <br><br><br><br><br><br>
         
          <!-- /.box -->


              <!-- /.row -->

             
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <br><br><br><br><br><br>
<?php require_once('assets/footer.php'); ?>

<script>
  $(document).ready(function() { //Al Cargar la paginaZ
    
    // console.clear();

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


            let preg_uno = $("#preg_uno").val();     
            let preg_dos = $("#preg_dos").val();     
            let preg_tres = $("#preg_tres").val();
            let resp_uno = $("#resp_uno").val();     
            let resp_dos = $("#resp_dos").val();     
            let resp_tres = $("#resp_tres").val();

              $.ajax({
                url: 'Preguntas/Agregar',    
                type: 'POST',   
                data: {
                  Agregar: true,   
                  resp_uno: resp_uno,       
                  resp_dos: resp_dos,       
                  resp_tres: resp_tres,
                  resp_uno: resp_uno,       
                  resp_dos: resp_dos,       
                  resp_tres: resp_tres,
                },
                success: function(resp){
                  // alert(resp);
                  var datos = JSON.parse(resp);     
                    if (datos.msj === "Good") {   
                      Swal.fire({
                        type: 'success',
                        title: '¡Registro Exitoso!',
                        text: 'Se han agregado las preguntas exitosamente',
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
    

  });

  });
</script>
</body>
</html>
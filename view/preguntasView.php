<!DOCTYPE html>
<html>
<head>
  <title><?php echo _NAMESYSTEM_; ?> | <?php if(!empty($action)){echo $action; } ?> <?php if(!empty($url)){echo $url;} ?></title>
  <?php //require_once('assets/headers.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style="height:10px;">

  <?php require_once('assets/top_menu.php'); ?>

  <?php //require_once('assets/menu.php'); ?>


  <div class="content-wrapper">
    <section class="content-header" >
      <h1>
        <?php echo "Complete sus datos"; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=_ROUTE_.$this->encriptar('Preguntas'); ?>"><i class="fa fa-dashboard"></i> Inicio </a></li>
        <li class="active">Complete sus datos</li>
      </ol>
      <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
                <div class="box-header with-border">
                  <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">
                  <h3 class="box-title" style="margin-top:10px; margin-bottom:10px;">Preguntas de Seguridad</h3>
                </div>
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
                
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
                </div>
          </div>

        </div>
      </div>
    </section>
  </div>

  <?php require_once('assets/footer.php'); ?>
  

  <?php //require_once('assets/aside-config.php'); ?>
</div>


  <?php //require_once('assets/footered.php'); ?>
<?php if(!empty($response)): ?>
<input type="hidden" class="responses" value="<?php echo $response ?>">
<?php endif; ?>
<script>
$(document).ready(function() { //Al Cargar la paginaZ
    
  console.clear();

  $("#guardar").click(function(){
      var url = $("#url").val();
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
            // alert(preg_uno + ' ' + preg_dos + ' ' + preg_tres);
            // alert(resp_uno + ' ' + resp_dos + ' ' + resp_tres);
              $.ajax({
                url: url + '/Agregar',    
                type: 'POST',   
                data: {
                  Agregar: true,   
                  preg_uno: preg_uno,       
                  preg_dos: preg_dos,       
                  preg_tres: preg_tres,
                  resp_uno: resp_uno,       
                  resp_dos: resp_dos,       
                  resp_tres: resp_tres,
                },
                success: function(resp){
                  alert(resp);
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
                        text: 'El usuario ya tiene las preguntas de seguridad agregadas al sistema',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      });
                    }
                    if (datos.msj === "Error") {   
                      Swal.fire({
                        type: 'error',
                        title: '¡Error al guardar los cambio!',
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

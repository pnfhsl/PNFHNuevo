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
                      <label for="preg_uno">Pregunta #1</label>
                      <select class="form-control" id="preg_uno">
                        <option value=""></option>
                        <?php 
                          foreach ($preguntas as $data):
                            if(!empty($data['id'])):  
                        ?>
                        <option class="optionpreg preg_uno<?php echo $data['id']; ?>" value="<?php echo $data['id']; ?>"><?php echo $data['pregunta']; ?></option>
                        <?php
                          endif; endforeach;
                        ?>
                      </select>
                      <div style="width:100%;text-align:right;">
                        <span id="error_preg_uno" class="mensajeError"></span>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="resp_uno">Respuesta #1</label>
                      <input type="text" class="form-control" id="resp_uno" placeholder="Ingrese su respuesta">
                      <div style="width:100%;text-align:right;">
                        <span id="error_resp_uno" class="mensajeError"></span>
                      </div>
                    </div>



                    <div class="form-group">
                      <label for="preg_dos">Pregunta #2</label>
                      <select class="form-control" id="preg_dos">
                        <option value=""></option>
                        <?php 
                          foreach ($preguntas as $data):
                            if(!empty($data['id'])):  
                        ?>
                        <option class="optionpreg preg_dos<?php echo $data['id']; ?>" value="<?php echo $data['id']; ?>"><?php echo $data['pregunta']; ?></option>
                        <?php
                          endif; endforeach;
                        ?>
                      </select>
                      <div style="width:100%;text-align:right;">
                        <span id="error_preg_dos" class="mensajeError"></span>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="resp_dos">Respuesta #2</label>
                      <input type="text" class="form-control" id="resp_dos" placeholder="Ingrese su respuesta">
                      <div style="width:100%;text-align:right;">
                        <span id="error_resp_dos" class="mensajeError"></span>
                      </div>
                    </div>



                    <div class="form-group">
                      <label for="preg_tres">Pregunta #3</label>
                      <select class="form-control" id="preg_tres">
                        <option value=""></option>
                        <?php 
                          foreach ($preguntas as $data):
                            if(!empty($data['id'])):  
                        ?>
                        <option class="optionpreg preg_tres<?php echo $data['id']; ?>" value="<?php echo $data['id']; ?>"><?php echo $data['pregunta']; ?></option>
                        <?php
                          endif; endforeach;
                        ?>
                      </select>
                      <div style="width:100%;text-align:right;">
                        <span id="error_preg_tres"  class="mensajeError"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="resp_tres">Respuesta #3</label>
                      <input type="text" class="form-control" id="resp_tres" placeholder="Ingrese su respuesta">
                      <div style="width:100%;text-align:right;">
                        <span id="error_resp_tres" class="mensajeError"></span>
                      </div>
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

  $("#preg_uno").change(function(){
    var id = $(this).val();
    $(".optionpreg").removeAttr("disabled");
    $(".optionpreg").removeAttr("style");
    
    $(".preg_dos"+id).attr("disabled","disabled");
    $(".preg_dos"+id).attr("style","color:#777;background:#ccc;");
    $(".preg_tres"+id).attr("disabled","disabled");
    $(".preg_tres"+id).attr("style","color:#777;background:#ccc;");

    var id2 = $("#preg_dos").val();
    $(".preg_uno"+id2).attr("disabled","disabled");
    $(".preg_uno"+id2).attr("style","color:#777;background:#ccc;");
    $(".preg_tres"+id2).attr("disabled","disabled");
    $(".preg_tres"+id2).attr("style","color:#777;background:#ccc;");

    var id3 = $("#preg_tres").val();
    $(".preg_uno"+id3).attr("disabled","disabled");
    $(".preg_uno"+id3).attr("style","color:#777;background:#ccc;");
    $(".preg_dos"+id3).attr("disabled","disabled");
    $(".preg_dos"+id3).attr("style","color:#777;background:#ccc;");
  });

  $("#preg_dos").change(function(){
    var id = $(this).val();
    $(".optionpreg").removeAttr("disabled");
    $(".optionpreg").removeAttr("style");
    
    $(".preg_uno"+id).attr("disabled","disabled");
    $(".preg_uno"+id).attr("style","color:#777;background:#ccc;");
    $(".preg_tres"+id).attr("disabled","disabled");
    $(".preg_tres"+id).attr("style","color:#777;background:#ccc;");

    var id1 = $("#preg_uno").val();
    $(".preg_dos"+id1).attr("disabled","disabled");
    $(".preg_dos"+id1).attr("style","color:#777;background:#ccc;");
    $(".preg_tres"+id1).attr("disabled","disabled");
    $(".preg_tres"+id1).attr("style","color:#777;background:#ccc;");

    var id3 = $("#preg_tres").val();
    $(".preg_uno"+id3).attr("disabled","disabled");
    $(".preg_uno"+id3).attr("style","color:#777;background:#ccc;");
    $(".preg_dos"+id3).attr("disabled","disabled");
    $(".preg_dos"+id3).attr("style","color:#777;background:#ccc;");
  });

  $("#preg_tres").change(function(){
    var id = $(this).val();
    $(".optionpreg").removeAttr("disabled");
    $(".optionpreg").removeAttr("style");
    
    $(".preg_uno"+id).attr("disabled","disabled");
    $(".preg_uno"+id).attr("style","color:#777;background:#ccc;");
    $(".preg_dos"+id).attr("disabled","disabled");
    $(".preg_dos"+id).attr("style","color:#777;background:#ccc;");

    var id1 = $("#preg_uno").val();
    $(".preg_dos"+id1).attr("disabled","disabled");
    $(".preg_dos"+id1).attr("style","color:#777;background:#ccc;");
    $(".preg_tres"+id1).attr("disabled","disabled");
    $(".preg_tres"+id1).attr("style","color:#777;background:#ccc;");

    var id2 = $("#preg_dos").val();
    $(".preg_uno"+id2).attr("disabled","disabled");
    $(".preg_uno"+id2).attr("style","color:#777;background:#ccc;");
    $(".preg_tres"+id2).attr("disabled","disabled");
    $(".preg_tres"+id2).attr("style","color:#777;background:#ccc;");

  });

  $("#guardar").click(function(){
    var result = false;
    result = validar();
    if(result==true){
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
                  // alert(resp);
                  // console.log(resp);
                  var datos = JSON.parse(resp);     
                    if (datos.msj === "Good") {   
                      Swal.fire({
                        type: 'success',
                        title: '¡Registro Exitoso!',
                        text: 'Se han agregado las preguntas exitosamente',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      }).then((isConfirm) => {
                          // location.reload();
                          location.href = "<?= _ROUTE_ ?>";
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
    }
  });
});

function validar(){
  var preg1 = $("#preg_uno").val();
  var rpreg1 = false;

  var preg2 = $("#preg_dos").val();
  var rpreg2 = false;

  var preg3 = $("#preg_tres").val();
  var rpreg3 = false;

  if(preg1 != ""){
    rpreg1=true;
    $("#error_preg_uno").html("");
  }else{
    $("#error_preg_uno").html("Seleccionar pregunta de seguridad #1");
    rpreg1=false;
  }

  if(preg2 != ""){
    rpreg2=true;
    $("#error_preg_dos").html("");
  }else{
    $("#error_preg_dos").html("Seleccionar pregunta de seguridad #2");
    rpreg2=false;
  }

  if(preg3 != ""){
    rpreg3=true;
    $("#error_preg_tres").html("");
  }else{
    $("#error_preg_tres").html("Seleccionar pregunta de seguridad #3");
    rpreg3=false;
  }

  var resp1 = $("#resp_uno").val();
  var rresp1 = false;

  var resp2 = $("#resp_dos").val();
  var rresp2 = false;

  var resp3 = $("#resp_tres").val();
  var rresp3 = false;

  if(resp1.trim() != ""){
    if(resp1.length > 2){
      $("#error_resp_uno").html("");
      rresp1=true;
    }else{
      $("#error_resp_uno").html("La respuesta de seguridad debe ser mas amplia");
      rresp1=false;      
    }
  }else{
    $("#error_resp_uno").html("Ingresar su respuesta de seguridad #1");
    rresp1=false;
  }

  if(resp2.trim() != ""){
    if(resp2.length > 2 ){
      $("#error_resp_dos").html("");
      rresp2=true;
    }else{
      $("#error_resp_dos").html("La respuesta de seguridad debe ser mas amplia");
      rresp2=false;
    }
  }else{
    $("#error_resp_dos").html("Ingresar su respuesta de seguridad #2");
    rresp2=false;
  }

  if(resp3.trim() != ""){
    if(resp3.length > 2){
      $("#error_resp_tres").html("");
      rresp3=true;
    }else{
      $("#error_resp_tres").html("La respuesta de seguridad debe ser mas amplia");
      rresp3=false;
    }
  }else{
    $("#error_resp_tres").html("Ingresar su respuesta de seguridad #3");
    rresp3=false;
  }


  var validado = false;
  if(rpreg1==true && rpreg2==true && rpreg3==true && rresp1==true && rresp2==true && rresp3==true){
    validado = true;
  }
  // alert(validado);
  return validado;

}
</script>
</body>
</html>

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
                <img src="<?=_THEME_?>/img/logolista.png" style="width:25px;color:red !importante;">
                <h3 class="box-title"><?php echo "".$url.""; ?></h3>
              </div>
              <div class="col-xs-12 col-sm-6" style="text-align:right">
                <button class="btn enviar2" style="">Agregar Nuevo</button>
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body ">
              <div class="table-responsive">
              <?php if($mantenimiento['ejecucion']==true): ?>

                  <div style='margin:2%;'>
                    <!-- position:absolute;right:5%;top:140px; -->
                    <button class="d-none" id="descargar" style="float:right;background:#2222dd;box-shadow:0px 0px 3px #3333dd;padding:10px 20px;color:#fff;border-radius:5px;" value="<?php echo $mantenimiento['response']?>">Descargar</button>
                    <?php 
                    
                    // $_SESSION['unlink'] = substr($mantenimiento['response'], strpos($mantenimiento['response'], 'libs'));
                      $files = substr($mantenimiento['response'], strpos($mantenimiento['response'], 'libs'));
                    // $_SESSION['unlink'] = $mantenimiento['response'];
                      // $files = $mantenimiento['response'];

                     ?>

                    <p style='font-size:1.5em;'><b>Respaldo de la Base de datos Creado Correctamente</b></p>
                    <br><br>
                    <pre style='font-size:0.8em;padding:2%;border:1px solid #dedede;box-shadow:0px 0px 2px #ccc;background:#ffffffaa;max-height:60vh;border-radius:20px'>
                      Respaldo de la Base de datos descargado con exito.
                      <?php //readfile($datos['respaldo']); ?>
                    </pre>
                  </div>

              <?php else: ?>
                
                  <div style='margin:2%;'>
                    <p style='font-size:1.5em;'><b>No se pudo Crear el Respaldo de la Base de datos</b></p>
                    <pre style='font-size:0.8em;padding:2%;border:1px solid #dedede;box-shadow:0px 0px 2px #ccc;background:#ffffffaa;max-height:60vh;border-radius:20px'>
                      No se pudo Crear el Respaldo de la Base de datos
                    </pre>
                  </div>
              <?php endif; ?>

              </div>
              <input type="hidden" class="routes" value="<?php echo _ROUTE_; ?>">
              <input type="hidden" class="files" value="<?=$files?>">

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
<?php if(!empty($response)): ?>
<input type="hidden" class="responses" value="<?php echo $response ?>">



<?php endif; ?>
<script>

$(document).ready(function(){ 
  var x =$("#descargar").val();
  open(x);
  var url = <?=_ROUTE_?>+'Mantenimiento/Borrarfile';
  var files = $(".files").val();

$.ajax({
  url: url,
  type: 'POST',
  data: {
    ajax: true,
    file: files,
  },
  success: function(respuesta){
    console.log(respuesta);
    if(respuesta==1){
      
    }
  }
});
  
  var response = $(".responses").val();
  if(response==undefined){

  }else{
    if(response == "1"){
      swal.fire({
          type: 'success',
          title: '¡Datos borrados correctamente!',
          confirmButtonColor: "#ED2A77",
      }).then(function(){
        window.location = "?route=Campanas";
      });
    }
    if(response == "2"){
      swal.fire({
          type: 'error',
          title: '¡Error al realizar la operacion!',
          confirmButtonColor: "#ED2A77",
      });
    }
    
  }

  $(".modificarBtn").click(function(){
    swal.fire({ 
          title: "¿Desea modificar los datos?",
          text: "Se movera al formulario para modificar los datos, ¿desea continuar?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#ED2A77",
          confirmButtonText: "¡Si!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){            
            window.location = $(this).val();
          }else { 
              swal.fire({
                  type: 'error',
                  title: '¡Proceso cancelado!',
                  confirmButtonColor: "#ED2A77",
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
                  confirmButtonColor: "#ED2A77",
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
                  confirmButtonColor: "#ED2A77",
                    confirmButtonText: "¡Si!",
                    cancelButtonText: "No", 
                    closeOnConfirm: false,
                    closeOnCancel: false 
                }).then((isConfirm) => {
                    if (isConfirm.value){                      
                        window.location = $(this).val();
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
<?php 

// unlink($mantenimiento['response']);
// rmdir('../backup/');

?>
</body>
</html>

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
                <button class="btn enviar2" style="">Agregar Nuevo</button>
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body ">
              <div class="table-responsive">
                
              <table id="datatable" class="table table-striped text-center" style="text-align:center;width:100%;font-size:1em;">
                <thead>
                <tr>
                  <th>Nº</th>
                  <th>Cohortes</th>
                  <!-- <th>Nombre de Usuario</th> -->
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>---</th>
                  <?php //endif ?>
                </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
                foreach ($cohortes as $data):
                if(!empty($data['idCohorte'])):  
                ?>
                <tr>
                  <td style="width:5%">
                    <span class="contenido2">
                      <?php echo $num++; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['nombreCohorte']; ?>
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
                          <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="?route=<?php echo $url; ?>&action=Modificar&id=<?php echo $data['id_usuario'] ?>">
                            <span class="fa fa-pencil">
                              
                            </span>
                          </button>
                        <!-- </td> -->
                        <?php //endif; ?>
                        <?php //if ($amUsuariosB==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="?route=<?php echo $url; ?>&id=<?php echo $data['id_usuario'] ?>&permission=1">
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
                  <th>Cohortes</th>
                  <!-- <th>Nombre de Usuario</th> -->
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
</body>
</html>

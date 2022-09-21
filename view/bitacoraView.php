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
              <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">
            </div>
            <!-- /.box-header -->

            <div class="box-body ">
              <div class="table-responsive">
                
             <table id="datatable" class="table table-striped text-center" style="text-align:center;width:100%;font-size:1em;">
                <thead>
                <tr>
                  <th>Nº</th>
                  <th>Cedula de usuario</th>
                  <th>Modulo</th>
                  <th>Acción</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $num = 1;
                  foreach ($bitacoras as $data):
                    if(!empty($data['id_bitacora'])):  
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
                          <?php echo $data['modulo_bitacora']; ?>
                        </span>
                      </td>

                      <td style="width:20%">
                        <span class="contenido2">
                          <?php echo $data['accion_bitacora']; ?>
                        </span>
                      </td>

                      <td style="width:20%">
                        <span class="contenido2">
                          <?php echo $this->bitacora->arreglarFecha($data['fecha_bitacora']); ?>
                        </span>
                      </td>

                      <td style="width:20%">
                        <span class="contenido2">
                          <?php echo $data['hora_bitacora']; ?>
                        </span>
                      </td>
                    </tr>
                    <?php
                    endif;
                  endforeach;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nº</th>
                  <th>Cedula de usuario</th>
                  <th>Modulo</th>
                  <th>Acción</th>
                  <th>Fecha</th>
                  <th>Hora</th>
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
  <script src="<?=_THEME_?>/js/saberes.js"></script>
</body>
</html>

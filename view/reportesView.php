<!DOCTYPE html>
<html>
<head>
  <title><?php echo _NAMESYSTEM_; ?> | <?php if(!empty($action)){echo $action; } ?> <?php if(!empty($url)){echo $url;} ?></title>
  <?php //require_once('assets/headers.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style="height:10px;">

  <?php require_once('assets/top_menu.php'); ?>

  <?php require_once('assets/menu.php'); ?>


  <div class="content-wrapper">
    <section class="content-header" >
      <h1 style="">
        <?php echo "Reportes"; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=_ROUTE_.$this->encriptar('Home'); ?>"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="<?=_ROUTE_.$this->encriptar('Reportes'); ?>"><?php echo $url; ?></a></li>
        <li class="active"><?php echo $url; ?></li>
      </ol>
    </section>

              <br><br><br><br><br>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        


        <div class="col-xs-12">
          <!-- /.box -->

          <div class="col-lg-2"></div>
          <div class="col-lg-3">
            <div class="box card" style="border-radius:15px;border-left:5px solid #F90;border-top:none;">
                      <a href="<?=_ROUTE_.$this->encriptar('Reportes')?>/Aprobacion" target="_blank">
              <div class="box-body" style="">
                <div class="row"  style="margin:12px 2px;">
                      <br>
                  <div style="text-align:left;font-size:2em;" class="col-xs-6 ">
                    <b>
                        <span style="color:#F90;">Aprobación</span>
                    </b>
                  </div>
                  <div style="text-align:right;" class="col-xs-6 col-auto"> <img src="assets/img/archivo.png" width="40px"></div>
                      
                </div>
                      <br>
              </div>
                      </a>
            </div>
          </div>

          
          <div class="col-lg-3 col-md-6 href">
            <div class="box card" style="border-radius:15px;border-left:5px solid #4AC;border-top:none;">
          <!-- <style type="text/css">
            a:hover {
              background-color: #000;
              color: #fff;
            }
          </style> -->
                      <a href="<?=_ROUTE_?>Mantenimiento/Restaurar">
              <div class="box-body" style="">
                <div class="row"  style="margin:12px 2px;">
                      <br>
                  <div style="text-align:left;font-size:2em;" class="col-xs-6 ">
                    <b>
                        <span style="color:#4AC">Usuarios</span>
                    </b>
                  </div>
                  <div style="text-align:right;" class="col-xs-6 col-auto"> <img src="assets/img/descarga.png" width="40px"></div>
                </div>
                      <br>
              </div>
                      </a>
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
</body>
</html>

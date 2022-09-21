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
      <h1>
        <?php echo "Inicio"; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=_ROUTE_.$this->encriptar('Home'); ?>"><i class="fa fa-dashboard"></i> Inicio </a></li>
        <li class="active"><?php echo $url; ?></li>
      </ol>
    </section>

              <br>
              <!-- <div style="width:100%;text-align:center;"><a href="?route=<?php echo $url ?>&action=Registrar" class="color_btn_sweetalert" style="text-decoration-line:underline;">Registrar Campaña</a></div> -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        

        <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="col-lg-3 col-md-6">
            <div class="box card" style="border-radius:15px;border-left:5px solid #2C7;border-top:none;">
              <div class="box-body">
                <div class="row" style="margin:12px 2px;">
                  <div style="text-align:left;font-size:1em;" class="col-xs-6">
                    <b>
                      <span style="color:#2C7;">Secciones</span>
                      <br>
                      <span style="font-size:2em;">
                        5
                      </span>
                    </b>
                  </div>
                  <div style="text-align:right;" class="col-xs-6 col-auto"> <img src="assets/img/secciones.png" width="40px"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="box card" style="border-radius:15px;border-left:5px solid #27C;border-top:none;">
              <div class="box-body">
                <div class="row"  style="margin:12px 2px;">
                  <div style="text-align:left;font-size:1em;" class="col-xs-6">
                    <b>
                      <span style="color:#27C;">Saberes</span>
                      <br>
                      <span style="font-size:2em;">
                        6
                      </span>
                    </b>
                  </div>
                  <div style="text-align:right;" class="col-xs-6 col-auto"> <img src="assets/img/saberes.png" width="40px"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="box card" style="border-radius:15px;border-left:5px solid #F90;border-top:none;">
              <div class="box-body">
                <div class="row"  style="margin:12px 2px;">
                  <div style="text-align:left;font-size:1em;" class="col-xs-6 ">
                    <b>
                      <span style="color:#F90">Alumnos</span>
                      <br>
                      <span style="font-size:2em;">
                        4
                      </span>
                    </b>
                  </div>
                  <div style="text-align:right;" class="col-xs-6 col-auto"> <img src="assets/img/alumno.png" width="40px"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="box card" style="border-radius:15px;border-left:5px solid #4AC;border-top:none;">
              <div class="box-body">
                <div class="row"  style="margin:12px 2px;">
                  <div style="text-align:left;font-size:1em;" class="col-xs-6 ">
                    <b>
                      <span style="color:#4AC">Profesores</span>
                      <br>
                      <span style="font-size:2em;">
                        4
                      </span>
                    </b>
                  </div>
                  <div style="text-align:right;" class="col-xs-6 col-auto"> <img src="assets/img/prof.png" width="40px"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="col-lg-3 col-md-6">
            <div class="box card" style="border-radius:15px;border-left:5px solid #C55;border-top:none;">
              <div class="box-body" style="">
                <div class="row"  style="margin:12px 2px;">
                  <div style="text-align:left;font-size:1em;" class="col-xs-6 ">
                    <b>
                      <span style="color:#C55">Tutores</span>
                      <br>
                      <span style="font-size:2em;">
                        4
                      </span>
                    </b>
                  </div>
                  <div style="text-align:right;" class="col-xs-6 col-auto"> <img src="assets/img/tutor.png" width="40px"></div>
                </div>
              </div>
            </div>
          </div> -->
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
$(document).ready(function(){ 

  console.clear();
  
  console.log(<?=json_encode($_SESSION); ?>);
  var url = $("#url").val();
});  
</script>
</body>
</html>

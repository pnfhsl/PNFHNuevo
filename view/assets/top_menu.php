<style type="text/css">
.element-Message{
  background:#ccc !important;
  color:red !important;
}
.d-none{
  display:none;
}
</style>
  <header class="main-header" style="background:#135 !important;">
    <!-- Logo -->
    <a href="<?=_ROUTE_?>" class="logo" style="background:#135 !important;">
      <!-- <span class="logo-mini color-completo">
        <b class="color-corto">
          <img src="<?=_ROUTE_?>assets/img/libretita.png" style="width:100%">
        </b>
      </span> -->
      <span class="logo-lg color-completo">
        <!-- <img src="<?=_ROUTE_?>assets/img/libretita.png" style="width:8vh;" class='xs-none sm-none'> -->
        <img src="<?=_ROUTE_?>assets/img/libretita.png" style="width:5vh;" class='logoTopMenu'>
        <b class="color-corto"> </b><b><i>SCHSL</i></b>
      </span>
    </a>


    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background:#047 !important">
      
      <!-- Sidebar toggle button-->
      <!-- <style type="text/css">.sidebar-toggle:hover{background: red}</style> -->
      <a href="#" class="sidebar-toggle tasks-menu" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <?php if ($_SESSION['cuenta_usuario']['estatus']=="1"): ?>
            
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle box_notificaciones" data-toggle="dropdown">
              <i class="fa fa-bell-o" style="font-size:1.2em"></i>
              <?php require_once'code/topNotificaciones.php'; ?>
              <span class="label cantidad_notificaciones" <?php if($cantidadNoVistas>0){ ?> style="background:red" <?php } ?>><?php if($cantidadNoVistas>0){ echo $cantidadNoVistas; } ?></span>
            </a>
            <ul class="dropdown-menu" class="notification" ><!-- style="width:320px" -->
              <li class="header"><b>Tiene <span class="cantidadNoVista"><?=$cantidadNoVistas; ?></span> <span class="tipoNovista">notificaciones sin revisar</span></b></li>
              <li>
                <ul class="menu menu_notificaciones" ><!-- style="width:400px" -->
                  <?php
                    require_once'code/bodyNotificaciones.php';
                  ?>
                </ul>
              </li>
              <li class="footer"><a href="?route=Notificaciones">Ver Todas</a></li>

            </ul>
          </li>
          <?php endif; ?>


          <li>
              <!-- <i class="fa fa-gears"></i> -->
              <!-- <i class="fa fa-envelope" ></i> -->
              <a href="#" data-toggle="control-sidebar">
                <!-- <i class="fa fa-envelope-o" ></i> -->
              </a>

          </li>


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php 
                  $fotoPerfil = "assets/img/perfil/user-default.png";
                  if($_SESSION['cuenta_usuario']['imagen']!=""){
                    $fotoPerfil = $_SESSION['cuenta_usuario']['imagen'];
                  }
              ?>
              <img src="<?=_ROUTE_.$fotoPerfil;?>" style='background:#fff;width:30px;height:30px;margin-top:-5px;' class="user-image" alt="User Image">
              <span class="hidden-xs">
              <?php echo $_SESSION['cuenta_persona']['nombre'] . " " . $_SESSION['cuenta_persona']['apellido']; ?>
              </span>
            </a>
            <ul class="dropdown-menu" style="box-shadow:0px 0px 2px #000">
              <li class="user-header " style="background:url(<?=$fotoPortada?>);background-size:100% 100%;">
                    <img src="<?=_ROUTE_.$fotoPerfil;?>" style='background:#fff' class="img-circle" alt="User Image">
                    
                    <p style="color:#fff;text-shadow:0px 0px 3px #000">
                      Web Developer
                      <small><?=$_SESSION['cuenta_usuario']['nombre_rol']?> SCHSL</small>
                     
                    </p>
                  
              </li>
              
              <li class="user-footer">
                <?php if ($_SESSION['cuenta_usuario']['estatus']=="1"): ?>
                <div class="pull-left">
                  <a href="<?=_ROUTE_.$this->encriptar('Perfil'); ?>" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <?php endif; ?>
                <div class="pull-right">
                  <a href="<?=_ROUTE_.$this->encriptar('Logout'); ?>" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <input type="hidden" class="rolhidden" value="<?php echo $rol; ?>">
    </nav>
  </header>

<?php

?>
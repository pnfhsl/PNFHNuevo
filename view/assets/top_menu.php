<style type="text/css">
.element-Message{
  background:#ccc !important;
  color:red !important;
}
.d-none{
  display:none;
}
</style>
  <header class="main-header">
    <!-- Logo -->
    <a href="<?=_ROUTE_?>" class="logo">
      <span class="logo-mini color-completo"><b class="color-corto"></b>
        <img src="<?=_ROUTE_?>assets/img/libretita.png" style="width:100%">
      </span>
      <span class="logo-lg color-completo">
        <img src="<?=_ROUTE_?>assets/img/libretita.png" style="width:25%;">
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

          
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle box_notificaciones" data-toggle="dropdown">
              <i class="fa fa-bell-o" style="font-size:1.2em"></i>
              <span class="label cantidad_notificaciones d-none">10</span>
            </a>
            <ul class="dropdown-menu" class="notification" ><!-- style="width:320px" -->
              <li class="header"><b>Tiene <span class="cantidadNoVista"></span> <span class="tipoNovista"></span></b></li>
              <li>
                <ul class="menu menu_notificaciones" ><!-- style="width:400px" -->

                  <!-- <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li> -->

                </ul>
              </li>
              <li class="footer"><a href="?route=Notificaciones">Ver Todas</a></li>

            </ul>
          </li>


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
                  $fotoPerfil = "public/assets/img/perfil/Masculino.png";
              ?>
              <img src="<?=_ROUTE_?>assets/img/user-3.png" style='background:#fff' class="user-image" alt="User Image">
              <span class="hidden-xs">
                Alexander Pierce
              </span>
            </a>
            <ul class="dropdown-menu" style="box-shadow:0px 0px 2px #000">
              <li class="user-header " style="background:url(<?=$fotoPortada?>);background-size:100% 100%;">
                    <img src="<?=_ROUTE_?>assets/img/user-3.png" style='background:#fff' class="img-circle" alt="User Image">
                    
                    <p style="color:#fff;text-shadow:0px 0px 3px #000">
                      Web Developer
                      <small>Desarrollador SCHSL</small>
                     
                    </p>
                  
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
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
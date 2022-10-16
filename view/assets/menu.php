  <aside class="main-sidebar">

    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image ReadlImage2 img-circle" style="background:#fff;padding:0;margin:0;">
          <!-- <?php echo $fotoPerfil; ?> -->
          <img src="<?=_ROUTE_.$fotoPerfil; ?>" style="background:#fff;" class="img-circle imageImage2">
        </div>
        <div class="pull-left info">
          <p>
            <?= $_SESSION['cuenta_persona']['nombre'] ?> <?= $_SESSION['cuenta_persona']['apellido'] ?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <style>
          /*.skin-blue .wrapper,.skin-blue .main-sidebar,.skin-blue .left-side {  background-color: #000;} 
.skin-blue .sidebar-menu > li:hover > a,.skin-blue .sidebar-menu > li.active > a,.skin-blue .sidebar-menu > li.menu-open > a {  color: #DDD;  background:#111;}
.skin-blue .sidebar-menu > li > .treeview-menu {  margin: 0 1px;  background: #333;}
.skin-blue .sidebar-menu > li.header {  color: #ddd;  background: #111;}
.skin-blue .sidebar-menu > li.active > a {  border-left-color: #333;}*/

          .skin-blue .wrapper,
          .skin-blue .main-sidebar,
          .skin-blue .left-side {
            background-color: #024;
          }

          .skin-blue .sidebar-menu>li:hover>a,
          .skin-blue .sidebar-menu>li.active>a,
          .skin-blue .sidebar-menu>li.menu-open>a {
            color: #DDD;
            background: #035;
          }

          .skin-blue .sidebar-menu>li>.treeview-menu {
            margin: 0 1px;
            background: #146;
          }

          .skin-blue .sidebar-menu>li.header {
            color: #ddd;
            background: #135;
          }

          .skin-blue .sidebar-menu>li.active>a {
            border-left-color: #359;
          }

          .color-corto {
            color: #0055AA;
          }

          .color-completo {
            color: #FFF;
          }

          .logo {
            background: #FFFFFF11 !important;
          }

          .skin-blue .sidebar a {
            color: #FFF;
          }

          .skin-blue .user-panel>.info,
          .skin-blue .user-panel>.info>a {
            color: #fff;
          }

          .skin-blue .sidebar a:hover {
            text-decoration: none;
          }

          .skin-blue .sidebar-menu .treeview-menu>li.active>a,
          .skin-blue .sidebar-menu .treeview-menu>li>a:hover {
            color: #FFF;
          }

          .skin-blue .sidebar-menu .treeview-menu>li>a {
            color: #CCC;
          }

          .main-footer {
            background: #000;
          }

          .main-footer .string {
            color: #FFF;
          }

          .control-sidebar-dark,
          div.control-sidebar-bg,
          .control-sidebar-tabs li.active a {
            color: #FFF;
            background: #000 !important;
          }

          .control-sidebar-tabs a {
            background: #FFFFFF11 !important;
            color: #ddd !important;
          }

          .tab-pane li a:hover p,
          .tab-pane li a:hover h3,
          .tab-pane li a:hover h4,
          .tab-pane li a:hover label {
            color: #ddd !important;
          }

          .tab-pane li a:hover {
            background: #111 !important;
            color: #FFF !important;
          }

          .tab-content p,
          .tab-content h3,
          .tab-content h4,
          .tab-content label {
            color: #DDD !important;
          }

          .skin-blue .sidebar-menu .treeview-menu2>li>a {
            background: #212121 !important
          }
        </style>

        <!-- ======================================================================================================================= -->



        <li class="header">NAVEGACION PRINCIPAL </li>
        <?php require_once('accesos.php'); ?>
        <!-- =================================================================== -->
        <!--  HOME   -->
        <!-- =================================================================== -->
        <?php if ($url == "Home") { ?>
          <li class="active">
          <?php } else { ?>
          <li>
          <?php } ?>
          <a href="<?= _ROUTE_ . $this->encriptar('Home'); ?>">
            <i class="fa fa-home"></i> <span>Inicio
            </span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
          </li>

          <!-- ================================================================== -->



          <!-- ======================================================================================================================= -->
          <!--  ALUMNOS   -->
          <!-- ======================================================================================================================= -->

          <?php if ((!empty($amAlumnos) && $amAlumnos == 1)) { ?>

            <?php if ($url == "Alumnos") { ?>
              <li class="active">
              <?php } else { ?>
              <li class="">
              <?php } ?>
              <a href="<?= _ROUTE_ . $this->encriptar('Alumnos'); ?>">
                <i class="fa fa-street-view"></i> <span>Alumnos</span>
                <span class="pull-right-container">
                  <!-- <i class="fa fa-angle-left pull-right"></i> -->
                </span>
              </a>

              </li>
            <?php } ?>


            <?php if ((!empty($amProfesores) && $amProfesores == 1)) { ?>
              <?php if ($url == "Profesores") { ?>
                <li class="active">
                <?php } else { ?>
                <li class="">
                <?php } ?>
                <a href="<?= _ROUTE_ . $this->encriptar('Profesores'); ?>">
                  <i class="fa fa-users"></i> <span>Profesores</span>
                  <span class="pull-right-container">
                    <!-- <i class="fa fa-angle-left pull-right"></i> -->
                  </span>
                </a>
                </li>
              <?php } ?>


              <!-- ======================================================================================================================= -->




              <!-- ======================================================================================================================= -->
              <!--  CONFIG SC   -->
              <!-- ======================================================================================================================= -->
              <?php if ((!empty($amClases) && $amClases == 1) || (!empty($amPeriodos) && $amPeriodos == 1) || (!empty($amSecciones) && $amSecciones == 1) || (!empty($amSaberes) && $amSaberes == 1)) { ?>
                <?php if ($url == "Clases" || $url == "Periodos" || $url == "Secciones" || $url == "Saberes") { ?>
                  <li class="active treeview">
                  <?php } else { ?>
                  <li class="treeview">
                  <?php } ?>
                  <a href="#">
                    <i class="fa fa-gears"></i> <span>Config. SC</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <?php if ((!empty($amPeriodos) && $amPeriodos == 1)) { ?>
                      <?php if ($url == "Periodos") { ?>
                        <li class="active">
                        <?php } else { ?>
                        <li>
                        <?php } ?>
                        <a href="<?= _ROUTE_ . $this->encriptar('Periodos'); ?>">
                          <i class="fa fa-hourglass-2"></i> <span>Periodos</span>
                        </a>
                        </li>
                      <?php } ?>



                      <?php if ((!empty($amSaberes) && $amSaberes == 1)) { ?>
                        <?php if ($url == "Saberes") { ?>
                          <li class="active">
                          <?php } else { ?>
                          <li class="">
                          <?php } ?>
                          <a href="<?= _ROUTE_ . $this->encriptar('Saberes'); ?>">
                            <i class="fa fa-puzzle-piece"></i> <span>Saberes</span>
                          </a>
                          </li>
                        <?php } ?>


                        <?php if ((!empty($amSecciones) && $amSecciones == 1)) { ?>
                          <?php if ($url == "Secciones") { ?>
                            <li class="active">
                            <?php } else { ?>
                            <li class="">
                            <?php } ?>
                            <a href="<?= _ROUTE_ . $this->encriptar('Secciones'); ?>">
                              <i class="fa fa-tags"></i> <span>Secciones</span>
                            </a>
                            </li>
                          <?php } ?>



                          <?php if ((!empty($amClases) && $amClases == 1)) { ?>
                            <?php if ($url == "Clases") { ?>
                              <li class="active">
                              <?php } else { ?>
                              <li class="">
                              <?php } ?>
                              <a href="<?= _ROUTE_ . $this->encriptar('Clases'); ?>">
                                <i class="fa fa-book"></i> <span>Clases</span>
                              </a>
                              </li>
                            <?php } ?>




                  </ul>
                  </li>
                <?php } ?>

                <!-- ======================================================================================================================= -->



                <?php if ((!empty($amProyectos) && $amProyectos == 1)) { ?>
                  <?php if ($url == "Proyectos") { ?>
                    <li class="active">
                    <?php } else { ?>
                    <li class="">
                    <?php } ?>
                    <a href="<?= _ROUTE_ . $this->encriptar('Proyectos'); ?>">
                      <i class="fa fa-paper-plane-o"></i> <span>Proyectos</span>
                      <span class="pull-right-container">
                        <!-- <i class="fa fa-angle-left pull-right"></i> -->
                      </span>
                    </a>
                    </li>
                  <?php } ?>




                  <!-- ======================================================================================================================= -->
                  <!--  USUARIOS   -->
                  <!-- ======================================================================================================================= -->
                  <?php if ((!empty($amNotas) && $amNotas == 1)) { ?>
                    <?php if ($url == "Notas") { ?>
                      <li class="active ">
                      <?php } else { ?>
                      <li class="">
                      <?php } ?>
                      <a href="<?= _ROUTE_ . $this->encriptar('Notas'); ?>">
                        <i class="fa fa-mortar-board"></i> <span>Notas</span>
                        <span class="pull-right-container">
                          <!-- <i class="fa fa-angle-left pull-right"></i> -->
                        </span>
                      </a>
                      </li>
                    <?php } ?>


                    <?php if ((!empty($amUsuarios) && $amUsuarios == 1)) { ?>
                      <?php if ($url == "Usuarios") { ?>
                        <li class="active ">
                        <?php } else { ?>
                        <li class="">
                        <?php } ?>
                        <a href="<?= _ROUTE_ . $this->encriptar('Usuarios'); ?>">
                          <i class="fa fa-user-circle-o"></i> <span>Usuarios</span>
                          <span class="pull-right-container">
                            <!-- <i class="fa fa-angle-left pull-right"></i> -->
                          </span>
                        </a>
                        </li>
                      <?php } ?>


                      <?php if ((!empty($amReportes) && $amReportes == 1)) { ?>
                        <?php if ($url == "Reportes") { ?>
                          <li class="active ">
                          <?php } else { ?>
                          <li class="">
                          <?php } ?>
                          <a href="<?= _ROUTE_ . $this->encriptar('Reportes'); ?>">
                            <i class="fa fa-download"></i> <span>Reportes</span>
                            <span class="pull-right-container">
                              <!-- <i class="fa fa-angle-left pull-right"></i> -->
                            </span>
                          </a>
                          </li>
                        <?php } ?>


                        <!-- ======================================================================================================================= -->
                        <!--  CONFIG Seguridad   -->
                        <!-- ======================================================================================================================= -->


                        <?php if ((!empty($amBitacora) && $amBitacora == 1) || (!empty($amBloqueados) && $amBloqueados == 1) || (!empty($amModulos) && $amModulos == 1) || (!empty($amPermisos) && $amPermisos == 1) || (!empty($amRoles) && $amRoles == 1)) { ?>

                          <?php if ($url == "Modulos" || $url == "Permisos" || $url == "Roles" || $url == "Bloqueo" || $url == "Bitacora") { ?>
                            <li class="active treeview">
                            <?php } else { ?>
                            <li class="treeview">
                            <?php } ?>
                            <a href="#">
                              <i class="fa fa-unlock-alt"></i> <span>Seguridad</span>
                              <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-ri"></i>
                              </span>
                            </a>
                            <ul class="treeview-menu">

                                <?php if ((!empty($amBitacora) && $amBitacora == 1)) { ?>
                                  <?php if ($url == "Bitacora") { ?>
                                  <li class="active">
                                  <?php } else { ?>
                                  <li class="">
                                  <?php } ?>
                                  <a href="<?= _ROUTE_ . $this->encriptar('Bitacora'); ?>">
                                    <i class="fa fa-paperclip"></i> <span>Bitacora</span>
                                  </a>
                                  </li>
                                <?php } ?>

                                <?php if ((!empty($amBloqueados) && $amBloqueados == 1)) { ?>
                                  <?php if ($url == "Bloqueo") { ?>
                                  <li class="active">
                                  <?php } else { ?>
                                  <li class="">
                                  <?php } ?>
                                  <a href="<?= _ROUTE_ . $this->encriptar('Bloqueo'); ?>">
                                    <i class="fa fa-unlock"></i> <span>Bloqueo de Usuario</span>
                                  </a>
                                  </li>
                                <?php } ?>

                                <?php if ((!empty($amModulos) && $amModulos == 1)) { ?>
                                  <?php if ($url == "Modulos") { ?>
                                  <li class="active">
                                  <?php } else { ?>
                                  <li class="">
                                  <?php } ?>
                                  <a href="<?= _ROUTE_ . $this->encriptar('Modulos'); ?>">
                                    <i class="fa fa-list-alt"></i> <span>Módulos</span>
                                  </a>
                                  </li>
                                <?php } ?>


                                <?php if ((!empty($amPermisos) && $amPermisos == 1)) { ?>
                                  <?php if ($url == "Permisos") { ?>
                                  <li class="active">
                                  <?php } else { ?>
                                  <li>
                                  <?php } ?>
                                  <a href="<?= _ROUTE_ . $this->encriptar('Permisos'); ?>">
                                    <i class="fa fa-chain-broken"></i> <span>Permisos</span>
                                  </a>
                                  </li>
                                <?php } ?>


                                <?php if ((!empty($amRoles) && $amRoles == 1)) { ?>
                                  <?php if ($url == "Roles") { ?>
                                  <li class="active">
                                  <?php } else { ?>
                                  <li class="">
                                  <?php } ?>
                                  <a href="<?= _ROUTE_ . $this->encriptar('Roles'); ?>">
                                    <i class="fa fa-code-fork"></i> <span>Roles</span>
                                  </a>
                                  </li>
                                <?php } ?>

                            </ul>
                            </li>
                        <?php } ?>

                            <!-- ======================================================================================================================= -->



                            <?php if ((!empty($amMantenimiento) && $amMantenimiento == 1)) { ?>
                              <?php if ($url == "Mantenimiento") { ?>
                              <li class="active ">
                              <?php } else { ?>
                              <li class="">
                              <?php } ?>
                              <a href="<?= _ROUTE_ . $this->encriptar('Mantenimiento'); ?>">
                                <i class="fa fa-database"></i> <span>Mantenimiento</span>
                                <span class="pull-right-container">
                                  <!-- <i class="fa fa-angle-left pull-right"></i> -->
                                </span>
                              </a>
                              </li>
                            <?php } ?>



                              <!-- ======================================================================================================================= -->




      </ul>
    </section>
  </aside>
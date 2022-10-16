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
    <section class="content-header">
      <h1>
        <?php echo $url; ?>
        <small><?php echo "Ver ".$url; ?></small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?=_ROUTE_.$this->encriptar('Home'); ?>"><i class="fa fa-dashboard"></i> Inicio </a></li>
          <li><a href="<?=_ROUTE_.$this->encriptar('Permisos'); ?>"><?php echo $url; ?></a></li>
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
              <div class="col-xs-12 col-sm-6" style="text-align:right">
                <?php if($amPermisosR=="1"): ?>
                  <!--=====================================
                  MODAL MODIFICAR PERMISOS
                  ======================================-->
                  <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarPermiso">Agregar Nuevo</button>
                  <div id="modalAgregarPermiso" class="modal fade" role="dialog">
                    <div class="modal-dialog tamModals" style="text-align:left;">
                      <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc; color:white">
                          <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>
                          <h4 class="modal-title" style="text-align: left;">Agregar Permiso</h4>
                        </div>

                        <div class="modal-body">
                          <div class="box-body">
                            <!-- ENTRADA PARA EL NOMBRE -->
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                                <input type="text" class="form-control input-lg" name="nuevoNombre" id="nombre" placeholder="Ingresar nombre" maxlength="30" required>
                              </div>
                              <span id="nombreP" class="mensajeError"></span>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <span type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</span>
                          <span type="submit" class="btn btn-primary" id="guardar">Guardar</span>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              </div>

            </div>
            <!-- /.box-header -->

            <div class="box-body ">
              <div class="table-responsive">
                
              <table id="datatable" class="table table-striped text-center" style="text-align:center;width:100%;font-size:1em;">
                <thead>
                  <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                    <?php if ($amPermisosE==1||$amPermisosB==1): ?>
                    <th>Acciones</th>
                    <?php endif; ?>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
                foreach ($permisos as $data):
                if(!empty($data['id_permiso'])):  
                ?>
                <tr>
                  <td style="width:5%">
                    <span class="contenido2">
                      <?php echo $num++; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['nombre_permiso']; ?>
                    </span>
                  </td>
                                    
                  
                  <?php if ($amPermisosE==1||$amPermisosB==1): ?>
                  <td style="width:10%">
                    <?php if ($amUsuariosE==1): ?>
                      <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['id_permiso'] ?>">
                        <span class="fa fa-pencil"></span>
                      </button>

                      <!-- Modificar -->
                      <button type="button" id="modificarButton<?=$data['id_permiso']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarPermiso<?=$data['id_permiso']?>" style="display: none">Modificar</button>
                      <div id="modalModificarPermiso<?=$data['id_permiso']?>" class="modal fade modalModificarPermiso<?=$data['id_permiso']?>" role="dialog">
                        
                        <div class="modal-dialog tamModals" style="text-align:left;">
                          <div class="modal-content">

                            <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                              <!--=====================================
                              CABEZA DEL MODAL
                              ======================================-->

                              <div class="modal-header" style="background:#3c8dbc; color:white">

                                <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                                <h4 class="modal-title" style="text-align: left;">Modificar Permiso</h4>

                              </div>

                              <!--=====================================
                              CUERPO DEL MODAL
                              ======================================-->

                              <div class="modal-body">

                                <div class="box-body">


                                  <!-- ENTRADA PARA EL NOMBRE -->
                                  
                                  <div class="form-group col-xs-12 col-sm-12">
                                    
                                    <div class="input-group" style="width:100%;">
                                    
                                      <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 

                                      <input type="text" class="form-control input-lg nombreModificar" style="width:100%;" value="<?=$data['nombre_permiso']?>" name="nuevoNombre" id="nombre<?=$data['id_permiso']?>" placeholder="Ingresar nombre" required>
                                    </div>

                                    <div style="width: 100%; text-align: right;">
                                      <span id="nombreP<?=$data['id_permiso']?>" class="mensajeError"></span>                                  
                                    </div>

                                  </div>


                                </div>

                              </div>

                              <!--=====================================
                              PIE DEL MODAL
                              ======================================-->

                              <div class="modal-footer">

                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$data['id_permiso']?>" id="modificar">Modificar</button>

                              </div>


                            <!-- </form> -->

                          </div>

                        </div>
                      </div>
                      <!-- Modificar -->
                    <?php endif; ?>
                    <?php if ($amUsuariosB==1): ?>
                      <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['id_permiso'] ?>">
                        <span class="fa fa-trash"></span>
                      </button>
                    <?php endif; ?>
                  </td>
                  <?php endif; ?>
                  
                      
                </tr>
                <?php
               endif; endforeach;
                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                    <?php if ($amPermisosE==1||$amPermisosB==1): ?>
                    <th>Acciones</th>
                    <?php endif; ?>
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
  <script src="<?=_THEME_?>/js/permisos.js"></script>
</body>
</html>

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
        <li><a href="<?=_ROUTE_.$this->encriptar('Roles'); ?>"><?php echo $url; ?></a></li>
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
                <?php if($amRolesR=="1"): ?>
                  <!--=====================================
                    MODAL MODIFICAR Roles
                  ======================================-->
                  <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarRoles">Agregar Nuevo</button>
                  <div id="modalAgregarRoles" class="modalAgregarRoles modal fade" role="dialog">
                    <div class="modal-dialog tamModals" style="text-align:left;">
                      <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc; color:white">
                          <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>
                          <h4 class="modal-title" style="text-align: left;">Agregar Rol</h4>
                        </div>

                        <div class="modal-body" style="max-height:70vh;overflow:auto;">
                          <div class="box-body">
                            <div class="row">
                              <!-- ENTRADA PARA EL NOMBRE -->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="nombre">Nombre</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                  <input type="text" class="form-control input-lg" name="nuevoNombre" id="nombre" placeholder="Ingresar nombre" maxlength="30" required>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="nombreS" class="mensajeError"></span>
                                </div>
                              </div>
                              <br>
                              <div class="form-group col-xs-12 col-sm-12">
                                <table class="table text-center">
                                  <thead>
                                    <tr>
                                      <th class="switch-button">
                                        <label  for="all" style="font-size:.8em">
                                          Seleccionar Todos<br>
                                        </label>
                                        <input type="checkbox" id="all" class="switch-button__checkbox" value="off">
                                        <label for="all" name="switch-button" class="switch-button__label">
                                          <!-- Seleccionar Todos -->
                                        </label>
                                      </th>
                                      <?php foreach ($permisos as $p): if(!empty($p['id_permiso'])): ?>
                                        <th style="font-size:.9em">
                                          <u><?=$p['nombre_permiso'];?></u>
                                          <br>
                                          <br>
                                        </th>
                                      <?php endif; endforeach; ?>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($modulos as $m): if(!empty($m['id_modulo'])): ?>
                                    <tr>
                                        <th style="width:20%;font-size:.9em;">
                                          <u><?=$m['nombre_modulo'];?></u>
                                        </th>
                                        <?php foreach ($permisos as $p): if(!empty($p['id_permiso'])): ?>
                                          <td style="width:20%;text-align:center;">
                                            <div class="input-group switch-button">
                                              <label for="m<?=$m['id_modulo']?>-p<?=$p['id_permiso']?>">
                                                <?php echo $p['nombre_permiso']." ".$m['nombre_modulo'];?>
                                              </label>
                                              <br>
                                                <input type="checkbox" id="m<?=$m['id_modulo']?>-p<?=$p['id_permiso']?>" name="switch-button" class="switch-button__checkbox checkboxopcion" value='off'>
                                              <label class="text-center switch-button__label" style="font-size:.8em;" for="m<?=$m['id_modulo']?>-p<?=$p['id_permiso']?>">
                                                <?php //echo $p['nombre_permiso']." ".$m['nombre_modulo']; ?>
                                              </label>
                                            </div>
                                          </td>
                                        <?php endif; endforeach; ?>
                                    </tr>
                                      <?php endif; endforeach; ?>
                                  </tbody>
                                </table>
                              </div>
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
                    <th>Nombre de Rol</th>
                    <?php if ($amRolesC==1||$amRolesE==1||$amRolesB==1): ?>
                    <th>Acciones</th>
                    <?php endif; ?>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
                foreach ($roles as $data):
                if(!empty($data['id_rol'])):  
                ?>
                <tr>
                  <td style="width:5%">
                    <span class="contenido2">
                      <?php echo $num++; ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['nombre_rol']; ?>
                    </span>
                  </td>
                 
                  <?php if ($amRolesC==1||$amRolesE==1||$amRolesB==1): ?>
                  <td style="width:10%">
                    <?php if ($amRolesC==1): ?>
                      <button class="btn CargarBtn" style="border:0;background:none;color:green" value="<?=$data['id_rol']?>">
                        <span class="fa fa-list"></span>
                      </button>

                      <!-- Cargar -->
                      <button type="button" id="mostrarButton<?=$data['id_rol']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalMostrarRoles<?=$data['id_rol']?>" style="display: none">Cargar</button>
                      <div id="modalMostrarRoles<?=$data['id_rol']?>" class="modalMostrarRoles modal fade modalMostrarRoles<?=$data['id_rol']?>" role="dialog">
                        
                        <div class="modal-dialog tamModals" style="text-align:left;">

                          <div class="modal-content">


                              <!--=====================================
                              CABEZA DEL MODAL
                              ======================================-->

                              <div class="modal-header" style="background:#3c8dbc; color:white">

                                <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                                <h4 class="modal-title" style="text-align: left;">Permisos del Rol</h4>

                              </div>

                              <!--=====================================
                              CUERPO DEL MODAL
                              ======================================-->

                              <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                <div class="box-body">

                        
                                  <div class="row">
                                  
                                    <!-- ENTRADA PARA EL NOMBRE -->
                                    <div class="form-group col-xs-12 col-sm-12" >
                                      <label>Nombre</label>
                                      <div class="input-group" style="width:100%;">
                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                        <input type="text" class="form-control input-lg col-xs-12 nombreModificar" name="nuevoNombre" id="nombre<?=$data['id_rol']?>" placeholder="Ingresar nombre" maxlength="30" value="<?=$data['nombre_rol']?>" readonly>
                                      </div>
                                      <span id="nombreS" class="mensajeError"></span>
                                    </div>

                                    <div class="form-group col-xs-12 col-sm-12">
                                      <table class="table text-center">
                                        <thead>
                                          <tr>
                                            <th>
                                            </th>
                                            <?php foreach ($permisos as $p): if(!empty($p['id_permiso'])): ?>
                                              <th style="font-size:.9em">
                                                <u><?=$p['nombre_permiso'];?></u>
                                                <br>
                                                <br>
                                              </th>
                                            <?php endif; endforeach; ?>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($modulos as $m): if(!empty($m['id_modulo'])): ?>
                                          <tr>
                                              <th style="width:20%;font-size:.9em;">
                                                <u><?=$m['nombre_modulo'];?></u>
                                              </th>
                                              <?php foreach ($permisos as $p): if(!empty($p['id_permiso'])): ?>
                                                <td style="width:20%;text-align:center;">
                                                  <div class="input-group switch-button">
                                                    <label>
                                                      <?php echo $p['nombre_permiso']." ".$m['nombre_modulo'];?>
                                                    </label>
                                                    <br>
                                                      <input <?php 
                                                        foreach ($accesos as $acc){ if(!empty($acc['id_accesos'])){
                                                          if($acc['id_rol']==$data['id_rol']){
                                                            if(($m['id_modulo']==$acc['id_modulo']) && ($p['id_permiso']==$acc['id_permiso'])){
                                                              ?>
                                                                checked="checked"
                                                                value='on'
                                                              <?php
                                                            }
                                                          }
                                                        }}
                                                       ?> type="checkbox" name="switch-button" class="switch-button__checkbox checkboxopcion" value='off' readonly>
                                                    <label class="text-center switch-button__label" style="font-size:.8em;">
                                                      <?php //echo $p['nombre_permiso']." ".$m['nombre_modulo']; ?>
                                                    </label>
                                                  </div>
                                                </td>
                                              <?php endif; endforeach; ?>
                                          </tr>
                                            <?php endif; endforeach; ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  
                                  </div>


                                </div>

                              </div>

                              <!--=====================================
                              PIE DEL MODAL
                              ======================================-->

                              <div class="modal-footer">

                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                              </div>



                          </div>

                        </div>
                      </div>
                      <!-- Cargar -->
                    <?php endif; ?>

                    <?php if ($amRolesE==1): ?>
                      <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['id_rol'] ?>">
                        <span class="fa fa-pencil"></span>
                      </button>

                      <!-- Modificar -->
                      <button type="button" id="modificarButton<?=$data['id_rol']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarRoles<?=$data['id_rol']?>" style="display: none">Modificar</button>
                      <div id="modalModificarRoles<?=$data['id_rol']?>" class="modalModificarRoles modal fade modalModificarRoles<?=$data['id_rol']?>" role="dialog">
                        
                        <div class="modal-dialog tamModals" style="text-align:left;">

                          <div class="modal-content">


                              <!--=====================================
                              CABEZA DEL MODAL
                              ======================================-->

                              <div class="modal-header" style="background:#3c8dbc; color:white">

                                <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                                <h4 class="modal-title" style="text-align: left;">Modificar Rol</h4>

                              </div>

                              <!--=====================================
                              CUERPO DEL MODAL
                              ======================================-->

                              <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                <div class="box-body">

                                  <div class="row">
                                    
                                    <!-- ENTRADA PARA EL NOMBRE -->
                                    <div class="form-group col-xs-12 col-sm-12">
                                      <div class="input-group" style="width:100%;">
                                        <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                        <input type="text" class="form-control input-lg col-xs-12 nombreModificar" name="nuevoNombre" id="nombre<?=$data['id_rol']?>" placeholder="Ingresar nombre" maxlength="30" value="<?=$data['nombre_rol']?>" required>
                                      </div>
                                      <div style="width:100%;text-align:right;">                                
                                        <span id="nombreS<?=$data['id_rol']?>" class="mensajeError"></span>
                                      </div>
                                    </div>

                                    
                                    <div class="form-group">
                                      <table class="table text-center">
                                        <thead>
                                          <tr>
                                            <th class="switch-button">
                                              <label style="font-size:.8em">
                                                Seleccionar Todos<br>
                                              </label>
                                              <input type="checkbox" id="all_modif<?=$data['id_rol']?>" name="<?=$data['id_rol']?>" class="switch-button__checkbox all_modif" value="off">
                                              <label for="all_modif<?=$data['id_rol']?>" name="switch-button" class="switch-button__label">
                                                <!-- Seleccionar Todos -->
                                              </label>
                                            </th>
                                            <?php foreach ($permisos as $p): if(!empty($p['id_permiso'])): ?>
                                              <th style="font-size:.9em">
                                                <u><?=$p['nombre_permiso'];?></u>
                                                <br>
                                                <br>
                                              </th>
                                            <?php endif; endforeach; ?>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($modulos as $m): if(!empty($m['id_modulo'])): ?>
                                          <tr>
                                              <th style="width:20%;font-size:.9em;">
                                                <u><?=$m['nombre_modulo'];?></u>
                                              </th>
                                              <?php foreach ($permisos as $p): if(!empty($p['id_permiso'])): ?>
                                                <td style="width:20%;text-align:center;">
                                                  <div class="input-group switch-button">
                                                    <label>
                                                      <?php echo $p['nombre_permiso']." ".$m['nombre_modulo'];?>
                                                    </label>
                                                    <br>
                                                      <input <?php 
                                                        foreach ($accesos as $acc){ if(!empty($acc['id_accesos'])){
                                                          if($acc['id_rol']==$data['id_rol']){
                                                            if(($m['id_modulo']==$acc['id_modulo']) && ($p['id_permiso']==$acc['id_permiso'])){
                                                              ?>
                                                                checked="checked"
                                                                value='on'
                                                              <?php
                                                            }
                                                          }
                                                        }}
                                                       ?> type="checkbox" id="m<?=$m['id_modulo']?>-p<?=$p['id_permiso']?>_modif<?=$data['id_rol']?>" name="switch-button" class="switch-button__checkbox checkboxopcion" value='off'>
                                                    <label class="text-center switch-button__label" style="font-size:.8em;" for="m<?=$m['id_modulo']?>-p<?=$p['id_permiso']?>_modif<?=$data['id_rol']?>">
                                                      <?php //echo $p['nombre_permiso']." ".$m['nombre_modulo']; ?>
                                                    </label>
                                                  </div>
                                                </td>
                                              <?php endif; endforeach; ?>
                                          </tr>
                                            <?php endif; endforeach; ?>
                                        </tbody>
                                      </table>
                                    </div>


                                  </div>


                                </div>

                              </div>

                              <!--=====================================
                              PIE DEL MODAL
                              ======================================-->

                              <div class="modal-footer">

                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$data['id_rol']?>" id="modificar">Guardar</button>

                              </div>



                          </div>

                        </div>
                      </div>
                      <!-- Modificar -->
                    <?php endif; ?>

                    <?php if ($amRolesB==1): ?>
                      <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['id_rol'] ?>">
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
                    <th>Nombre de Rol</th>
                    <?php if ($amRolesC==1||$amRolesE==1||$amRolesB==1): ?>
                    <th>Acciones</th>
                    <?php endif; ?>
                  </tr>
                </tfoot>
              </table>

              </div>

              <span style="display:none;" class='json-modulos'><?php echo json_encode($modulos); ?></span>
              <span style="display:none;" class='json-permisos'><?php echo json_encode($permisos); ?></span>

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

<style type="text/css" media="screen">
    :root {
        --color-green: #00a878;
        --color-red: #ff2222; /*#ff2222;*/ /*#767676*/
        --color-button: #fdffff;
        --color-black: #000;
    }
    .switch-button {
        display: inline-block;
    }
    .switch-button .switch-button__checkbox {
        display: none;
    }
    .switch-button .switch-button__label {
        background-color: var(--color-red);
        width: 5rem;
        height: 3rem;
        border-radius: 3rem;
        display: inline-block;
        position: relative;
    }
    .switch-button .switch-button__label:before {
        transition: .2s;
        display: block;
        position: absolute;
        width: 3rem;
        height: 3rem;
        background-color: var(--color-button);
        content: '';
        border-radius: 50%;
        box-shadow: inset 0px 0px 0px 1px var(--color-black);
    }
    .switch-button .switch-button__checkbox:checked + .switch-button__label {
        background-color: var(--color-green);
    }
    .switch-button .switch-button__checkbox:checked + .switch-button__label:before {
        transform: translateX(2rem);
    }
  
</style>
  <?php //require_once('assets/footered.php'); ?>
<?php if(!empty($response)): ?>
<input type="hidden" class="responses" value="<?php echo $response ?>">
<?php endif; ?>
  <script src="<?=_THEME_?>/js/roles.js"></script>
</body>
</html>

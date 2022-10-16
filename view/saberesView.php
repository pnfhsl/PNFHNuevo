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
              <div class="col-xs-12 col-sm-6" style="text-align:right">
                <?php if($amSaberesR=="1"): ?>
                  <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarSC">Agregar Nuevo</button>
                  <div id="modalAgregarSC" class="modalAgregarSC modal fade" role="dialog">
                    <div class="modal-dialog tamModals" style="text-align:left;">
                      <div class="modal-content">
                        <!--=====================================
                        CABEZA DEL MODAL
                        ======================================-->
                        <div class="modal-header" style="background:#3c8dbc; color:white">
                          <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>
                          <h4 class="modal-title" style="text-align: left;">Agregar Saber Complementario</h4>
                        </div>
                        <!--=====================================
                        CUERPO DEL MODAL
                        ======================================-->
                        <div class="modal-body" style="max-height:70vh;overflow:auto;">
                          <div class="box-body">
                            <div class="row">
                              <!-- ENTRADA PARA EL NOMBRE DEL SC -->
                              <div class="form-group col-xs-12 col-sm-12"> 
                                <label for="nombreSC">Nombre</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Saber Complementario" id="nombreSC" required>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="nombreS" class="mensajeError"></span>
                                </div>
                              </div>

                              <!-- ENTRADA PARA EL TRAYECTO -->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="trayectoSC">Trayecto</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                  <select class="form-control select2 input-lg" style="width:100%;" name="trayecto" placeholder="Ingresar trayecto" id="trayectoSC"  required>
                                    <option value="" style="text-align: left;">Seleccione un trayecto</option>
                                    <option value="1">Trayecto I</option>
                                    <option value="2">Trayecto II</option>
                                    <option value="3">Trayecto III</option>
                                    <option value="4">Trayecto IV</option>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="trayectoS" class="mensajeError"></span>
                                </div>
                              </div>

                              <!-- ENTRADA PARA EL FASE -->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="faseSC">Fase</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                  <select class="form-control select2 input-lg" style="width:100%;" name="trayecto" placeholder="Ingresar fase" id="faseSC" required>
                                    <option value="">Seleccione un Fase</option>
                                    <option value="1">Fase I</option>
                                    <option value="2">Fase II</option>   
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="faseS" class="mensajeError"></span>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!--=====================================
                        PIE DEL MODAL
                        ======================================-->
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
                  <th>Saber Complementario</th>
                  <th>Trayecto</th>
                  <th>Fase</th>
                  <?php if ($amSaberesE==1||$amSaberesB==1): ?>
                  <th>Acciones</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
                foreach ($saberes as $data):
                if(!empty($data['id_SC'])):  
                ?>
                <tr>

                  <td style="width:5%">
                    <span class="contenido2">
                      <?php echo $num++; ?>
                    </span>
                  </td>

                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['nombreSC']; ?>
                    </span>
                  </td>

                    <td style="width:20%">
                    <span class="contenido2">
                      <?php 
                        if($data['trayecto_SC']=="1"){
                          $numeroTrayecto = "I";
                        }else if($data['trayecto_SC']=="2"){
                          $numeroTrayecto = "II";
                        }else if($data['trayecto_SC']=="3"){
                          $numeroTrayecto = "III";
                        }else if($data['trayecto_SC']=="4"){
                          $numeroTrayecto = "IV";
                        }
                        echo "Trayecto ".$numeroTrayecto; 
                      ?>
                    </span>
                  </td>

                    <td style="width:20%">
                    <span class="contenido2">
                      <?php 
                        if($data['fase_SC']=="1"){
                          $numerofase = "I";
                        }else if($data['fase_SC']=="2"){
                          $numerofase = "II";
                        } 
                        echo "Fase ".$numerofase; 
                      ?>
                    </span>
                  </td>
                 
                  
                 
                  <?php if ($amSaberesE==1||$amSaberesB==1): ?>
                  <td style="width:10%">
                        <?php if ($amSaberesE==1): ?>
                          <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['id_SC'] ?>">
                            <span class="fa fa-pencil">
                              
                            </span>
                          </button>


                          <!-- Modificar -->
                          <button type="button" id="modificarButton<?=$data['id_SC']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalmodificarButtonsc<?=$data['id_SC']?>" style="display: none">Modificar</button>
                          <div id="modalmodificarButtonsc<?=$data['id_SC']?>" class="modalmodificarButtonsc modal fade modificarButtonsc<?=$data['id_SC']?>" role="dialog">
                            
                            <div class="modal-dialog tamModals" style="text-align:left;">
                              <div class="modal-content">

                                <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                                  <!--=====================================
                                  CABEZA DEL MODAL
                                  ======================================-->

                                  <div class="modal-header" style="background:#3c8dbc; color:white">

                                    <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                                    <h4 class="modal-title" style="text-align: left;">Modificar Saber Complementario</h4>

                                  </div>

                                  <!--=====================================
                                  CUERPO DEL MODAL
                                  ======================================-->

                                  <div class="modal-body" style="max-height:70vh;overflow:auto;">

                                    <div class="box-body">

                                      <div class="row">
                                      
                                        <!-- ENTRADA SABER COMPLEMENTARIO -->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="nombreSC<?=$data['id_SC']?>">Nombre</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                            <input type="text" class="form-control input-lg" value="<?=$data['nombreSC']?>" name="nuevaNombreSC" placeholder="Ingresar Saber Complementario" id="nombreSC<?=$data['id_SC']?>" required>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="nombreS<?=$data['id_SC']?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                        
                                        <!-- ENTRADA PARA EL TRAYECTO-->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="trayectoSC<?=$data['id_SC']?>">Trayecto</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                            <select class="form-control select2 input-lg" style="width:100%;" name="trayecto" placeholder="Ingresar trayecto" id="trayectoSC<?=$data['id_SC']?>" required>
                                              <option value="">Seleccione un trayecto</option>
                                              <option <?php if($data['trayecto_SC']=="1"){ echo "selected"; } ?> value="1">Trayecto I</option>
                                              <option <?php if($data['trayecto_SC']=="2"){ echo "selected"; } ?> value="2">Trayecto II</option>
                                              <option <?php if($data['trayecto_SC']=="3"){ echo "selected"; } ?> value="3">Trayecto III</option>
                                              <option <?php if($data['trayecto_SC']=="4"){ echo "selected"; } ?> value="4">Trayecto IV</option>
                                            </select>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="trayectoS<?=$data['id_SC']?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                        
                                        <!-- ENTRADA PARA LA FASE -->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="faseSC<?=$data['id_SC']?>">Fase</label>
                                          <div class="input-group " style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span> 
                                            <select class="form-control select2 input-lg" style="width:100%;" name="fase" placeholder="Ingresar trayecto" id="faseSC<?=$data['id_SC']?>" required>
                                              <option value="">Seleccione un fase</option>
                                              <option <?php if($data['fase_SC']=="1"){ echo "selected"; } ?> value="1">Fase I</option>
                                              <option <?php if($data['fase_SC']=="2"){ echo "selected"; } ?> value="2">Fase II</option>
                                            </select>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="faseS<?=$data['id_SC']?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                  <!--=====================================
                                  PIE DEL MODAL
                                  ======================================-->

                                  <div class="modal-footer">

                                   <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                   <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$data['id_SC']?>" id="modificar">Modificar</button>

                                  </div>


                                <!-- </form> -->

                              </div>

                            </div>
                          </div>
                          <!-- Modificar -->


                        <?php endif; ?>
                        <?php if ($amSaberesB==1): ?>
                          <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['id_SC'] ?>">
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
                  <th>Saber Complementario</th>
                  <th>Trayecto</th>
                  <th>Fase</th>
                  <?php if ($amSaberesE==1||$amSaberesB==1): ?>
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
  <script src="<?=_THEME_?>/js/saberes.js"></script>
</body>
</html>

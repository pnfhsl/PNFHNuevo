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
        <li><a href="<?=_ROUTE_.$this->encriptar("Periodos"); ?>"><?php echo $url; ?></a></li>
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
                <?php if($amPeriodosR=="1"): ?>
                  <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarPeriodo">Agregar Nuevo</button>
                  <div id="modalAgregarPeriodo" class="modal fade" role="dialog">
                    <div class="modal-dialog tamModals" style="text-align:left;">
                      <div class="modal-content">
                        <!--=====================================
                        CABEZA DEL MODAL
                        ======================================-->
                        <div class="modal-header" style="background:#3c8dbc; color:white">
                          <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>
                          <h4 class="modal-title" style="text-align: left;">Agregar Periodo</h4>
                        </div>

                        <!--=====================================
                        CUERPO DEL MODAL
                        ======================================-->
                        <div class="modal-body" style="max-height:70vh;overflow:auto;">
                          <div class="box-body">
                            <div class="row">
                              <!-- ENTRADA PARA EL AÑO DEL PERIODO -->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="year">Año del Periodo</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                  <!-- <input type="text" class="form-control input-lg" name="year" id="year" placeholder="Año (Ej.: 2000)" maxlength="4"  required> -->
                                  <select class="form-control select2 input-lg" style="width:100%;" name="year" id="year">
                                    <option value="">Año (Ej.: <?=date('Y'); ?>)</option>
                                    <?php for ($i=date('Y'); $i >= 2015; $i--): ?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                    <?php endfor; ?>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="yearP" class="mensajeError"></span>
                                </div>
                              </div>
                              
                              <!--ENTRADA PARA EL NOMBRE DEL PERIODO-->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="periodo">Periodo</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                  <input type="text" class="form-control input-lg" style="width:40%;background:none;" name="nuevoNombre" placeholder="Año (Ej.: <?=date('Y')?>)"  maxlength="6" id="nombrePr" readonly>
                                  <div style="width:10%;display:inline-block;">
                                    <input type="text" value="-" class="form-control input-lg" style="text-align:center;padding:0;background:none;width:100%;" readonly>
                                  </div>
                                  <div style="width:50%;display:inline-block;">
                                    <select class="form-control input-lg" style="width:100%;" id="numeroPr">
                                      <option value="">Numero de Periodo</option>
                                      <option value="I">I</option>
                                      <option value="II">II</option>
                                    </select>
                                  </div>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="nombreP" class="mensajeError"></span>
                                </div>
                              </div>

                              <!-- ENTRADA PARA EL PERIODO DE APERTURA-->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="fechaA">Fecha de apertura</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                  <input type="date" class="form-control input-lg" name="fechaAP" id="fechaA" placeholder="Apertura" required>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="fechaAP" class="mensajeError"></span>
                                </div>
                              </div>

                              <!-- ENTRADA PARA EL PERIODO DE CIERRE-->
                              <div class="form-group col-xs-12 col-sm-12">
                                <label for="fechaC">Fecha de culminación</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                  <input type="date" class="form-control input-lg" name="fechaAC" id="fechaC" placeholder="Cierre" required>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="fechaCP" class="mensajeError"></span>
                                  <span id="fechaV" class="mensajeError"></span>
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
                  <th>Año</th>
                  <th>Periodo</th>
                  <th>Fecha de Apertura</th>
                  <th>Fecha de Cierre</th>
                  <?php if ($amPeriodosE==1||$amPeriodosB==1): ?>
                  <th>Acciones</th>
                  <?php endif; ?>
                </tr>
                </thead>

                <tbody>

                <?php 
                $num = 1;
                foreach ($periodos as $data):
                if(!empty($data['id_periodo'])):  
                ?>
                <tr>
                  <td style="width:5%">
                    <span class="contenido2">
                      <?php echo $num++; ?>
                    </span>
                  </td>


                  <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['year_periodo'];?>
                    </span>
                  </td>

                   <td style="width:20%">
                    <span class="contenido2">
                      <?php echo $data['year_periodo']."-".mb_strtoupper($data['nombre_periodo']);?>
                    </span>
                  </td>

                  <td style="width:20%">
                    <span class="contenido2">
                      <?php 
                        $fechaApertura = $this->periodo->arreglarFecha($data['fecha_apertura']);
                        echo $fechaApertura;
                      ?>
                    </span>
                  </td>
                   
                    <td style="width:20%">
                    <span class="contenido2">
                      <?php 
                        $fechaCierre = $this->periodo->arreglarFecha($data['fecha_cierre']);
                        echo $fechaCierre;
                      ?>
                    </span>
                  </td>

                 
                  <?php if ($amPeriodosE==1||$amPeriodosB==1): ?>
                  <td style="width:10%">
                        <?php if ($amPeriodosE==1): ?>
                         <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['id_periodo'] ?>">
                            <span class="fa fa-pencil"></span>
                          </button>
                          

                          <!-- Modificar -->
                          <button type="button" id="modificarButton<?=$data['id_periodo']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarPeriodo<?=$data['id_periodo']?>" style="display: none">Modificar</button>
                          <div id="modalModificarPeriodo<?=$data['id_periodo']?>" class="modal fade modalModificarPeriodo<?=$data['id_periodo']?>" role="dialog">
                            
                            <div class="modal-dialog tamModals" style="text-align:left;">
                              <div class="modal-content">

                                <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

                                  <!--=====================================
                                  CABEZA DEL MODAL
                                  ======================================-->

                                  <div class="modal-header" style="background:#3c8dbc; color:white">

                                    <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                                    <h4 class="modal-title" style="text-align: left;">Modificar Periodo</h4>

                                  </div>

                                  <!--=====================================
                                  CUERPO DEL MODAL
                                  ======================================-->

                                  <div class="modal-body" style="max-height:70vh;overflow:auto">

                                    <div class="box-body">
                                      <div class="row">

                                        <!-- ENTRADA PARA EL AÑO DEL PERIODO -->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="year">Año del Periodo</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                            <!-- <input type="text" class="form-control input-lg" name="year" id="year" placeholder="Año (Ej.: 2000)" maxlength="4"  required> -->
                                            <select class="form-control select2 input-lg yearModificar" style="width:100%;" name="<?=$data['id_periodo']?>" id="year<?=$data['id_periodo']?>">
                                              <option value="">Año (Ej.: <?=date('Y'); ?>)</option>
                                              <?php for ($i=date('Y'); $i >= 2015; $i--): ?>
                                              <option <?php if($i==$data['year_periodo']){ ?> selected="selected" <?php } ?> value="<?=$i?>"><?=$i?></option>
                                              <?php endfor; ?>
                                            </select>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="yearP<?=$data['id_periodo']?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                        
                                        <!--ENTRADA PARA EL NOMBRE DEL PERIODO-->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="periodo">Periodo</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-address-card"></i></span>
                                            <input type="text" class="form-control input-lg nombrePrModificar" style="width:40%;background:none;" name="<?=$data['id_periodo']?>" placeholder="Año (Ej.: <?=date('Y')?>)" value="<?=$data['year_periodo']?>" maxlength="6" id="nombrePr<?=$data['id_periodo']?>" readonly>
                                            <div style="width:10%;display:inline-block;">
                                              <input type="text" value="-" class="form-control input-lg" style="text-align:center;padding:0;background:none;width:100%;" readonly>
                                            </div>
                                            <div style="width:50%;display:inline-block;">
                                              <select class="form-control input-lg numeroPrModificar" style="width:100%;" id="numeroPr<?=$data['id_periodo']?>">
                                                <option value="">Numero de Periodo</option>
                                                <option <?php if($data['nombre_periodo']=="I" || $data['nombre_periodo']=="i"){ ?> selected="selected" <?php } ?> value="I">I</option>
                                                <option <?php if($data['nombre_periodo']=="II" || $data['nombre_periodo']=="ii" || $data['nombre_periodo']=="Ii" || $data['nombre_periodo']=="iI"){ ?> selected="selected" <?php } ?> value="II">II</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="nombreP<?=$data['id_periodo']?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                        
                                        <!-- ENTRADA PARA EL PERIODO DE APERTURA-->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="fechaA">Fecha de apertura</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                            <input type="date" class="form-control input-lg fechaAModificar" min="<?=$data['year_periodo']?>-01-01" max="<?=$data['fecha_cierre']?>" value="<?=$data['fecha_apertura']?>" name="<?=$data['id_periodo']?>" id="fechaA<?=$data['id_periodo']?>" placeholder="Apertura" required>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="fechaAP<?=$data['id_periodo']?>" class="mensajeError"></span>
                                          </div>
                                        </div>

                                        
                                        <!-- ENTRADA PARA EL PERIODO DE CIERRE-->
                                        <div class="form-group col-xs-12 col-sm-12">
                                          <label for="fechaC">Fecha de culminación</label>
                                          <div class="input-group" style="width:100%;">
                                            <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span> 
                                            <input type="date" class="form-control input-lg fechaCModificar" min="<?=$data['fecha_apertura']?>" max="<?=$data['year_periodo']?>-12-01" value="<?=$data['fecha_cierre']?>" name="<?=$data['id_periodo']?>" id="fechaC<?=$data['id_periodo']?>" placeholder="Cierre" required>
                                          </div>
                                          <div style="width:100%;text-align:right;">
                                            <span id="fechaCP<?=$data['id_periodo']?>" class="mensajeError"></span>
                                            <span id="fechaV<?=$data['id_periodo']?>" class="mensajeError"></span>
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

                                   <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$data['id_periodo']?>" id="modificar">Modificar</button>

                                  </div>


                                <!-- </form> -->

                              </div>

                            </div>
                          </div>
                          <!-- Modificar -->

                          
                        <?php endif; ?>
                        <?php if ($amPeriodosB==1): ?>
                           <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['id_periodo'] ?>">
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
                  <th>Año</th>
                  <th>Periodo</th>
                  <th>Fecha de Apertura</th>
                  <th>Fecha de Cierre</th>
                  <?php if ($amPeriodosE==1||$amPeriodosB==1): ?>
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
  <script src="<?=_THEME_?>/js/periodos.js"></script>
</body>
</html>

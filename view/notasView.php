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
        <li><a href="<?=_ROUTE_.$this->encriptar('Notas'); ?>"><?php echo $url; ?></a></li>
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
              <div class="col-xs-12 col-sm-6" style="text-align:right">


              <!--=====================================
              MODAL MODIFICAR PROF
              ======================================-->

              


                <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarNota">Agregar Nuevo</button>
                  <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">

                <!--=====================================
                MODAL AGREGAR PROF
                ======================================-->

              <div id="modalAgregarNota" class="modalAgregarNota modal fade" role="dialog">
                
                <div class="modal-dialog tamModals" style="text-align:left;">

                  <div class="modal-content">
                        <!--=====================================
                        CABEZA DEL MODAL
                        ======================================-->
                        <div class="modal-header" style="background:#3c8dbc; color:white">
                          <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>
                          <h4 class="modal-title" style="text-align: left;">Agregar Nota</h4>
                        </div>
                        <!--=====================================
                        CUERPO DEL MODAL
                        ======================================-->
                        <div class="modal-body" style="max-height:70vh;overflow:auto">
                          <div class="box-body">
                            <div class="row" style="width:100%;">
                              
                              <!-- ENTRADA PARA LA SECCION -->
                              <div class="form-group col-xs-12 col-sm-6">
                                <label for="seccion">Sección</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-cogs"></i></span> 
                                  <select class="form-control input-lg select2" style="width:100%;" name="nuevoRol" id="seccion">
                                    <option value="">Sección</option>
                                    <?php foreach ($secciones as $date): if(!empty($date['cod_seccion'])): ?>
                                        <option value="<?php echo $date['cod_seccion'] ?>"><?php echo $date['nombre_seccion'] ?></option>
                                    <?php endif; endforeach; ?>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="error_seccion" class="mensajeError" ></span>
                                </div>
                              </div>

                              <!-- ENTRADA PARA EL SABER -->
                              <div class="form-group col-xs-12 col-sm-6">
                                <label for="saber">Saber complementario</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-indent"></i></span> 
                                  <select class="form-control input-lg select2" style="width:100% !important;" name="nuevoPerfil" id="saber">
                                    <option value="">Saber Complementario</option>
                                    <?php /* ?>
                                    <?php foreach ($saberes as $dateS): if(!empty($dateS['id_SC'])): ?>
                                      <option value="<?php echo $dateS['id_SC'] ?>"><?php echo $dateS['nombreSC'] ?></option>
                                    <?php endif; endforeach; ?>
                                    <?php */ ?>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="error_saber" class="mensajeError" ></span>
                                </div>
                              </div>




                            </div>
                            
                            <div class="row">
                              <div class="col-xs-12" style="text-align:right;">
                                <button class="btn btn-primary" id="cargarAlumnosNotas">Cargar Alumnos</button>
                              </div>
                            </div>

                            <div class="row">
                              <hr>
                            </div>



                            <div class="row boxlist_alumnosnotas" style="display:none;">

                              <!-- <div class="form-group col-xs-12">
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                  <input type="text" class="form-control input-lg" style="width:100%;" name="nuevoAl" id="alumno" placeholder="Alumno" value="<?php echo $datos['nombre_alumno'] . ' ' . $datos['apellido_alumno'] ?>" disabled required>
                                  <span class="input-group-addon" style="width:5%"><i class="fa fa-key"></i></span> 
                                  <input type="number" class="form-control input-lg" style="width:100%;" name="nuevoPass" value="0" max="1" min="0" step="0.1" placeholder="Nota" id="nota<?=$datos['cedula_alumno']?>" required>
                                </div>
                              </div> -->

                            </div>
                           



                            
                            
                            

                          <?php 
                            /*
                            $num = 1;
                            $alumnosJson = [];
                            $i = 0;
                            foreach ($alumnos as $datos): if(!empty($datos['cedula_alumno'])):  
                            ?>
                            <div class="form-group">
                                
                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                                                                       
                                      <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                                      
                                        
                                            <?php //if ($amUsuariosE==1): ?>
                                            

                                              <input type="text" class="form-control input-lg" name="nuevoAl" id="alumno" placeholder="Alumno" value="<?php echo $datos['nombre_alumno'] . ' ' . $datos['apellido_alumno'] ?>" disabled required>
                                              

                                          
                                            <?php //endif; ?>
                                           
                                          
                                     
                                      <?php //endif ?>
                                      

                                                                       
                                    

                                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                                  <input type="number" class="form-control input-lg" name="nuevoPass" value="0" max="1" min="0" step="0.1" placeholder="Nota" id="nota<?=$datos['cedula_alumno']?>" required>
                                  <?php 
                                        $alumnosJson[$i] = $datos['cedula_alumno'];
                                        $i++;
                                   ?>

                                </div>

                            </div>
                            <?php
                              endif; endforeach;
                            ?>
                            <span id="notaS" class="mensajeError"></span>
                            <span class="json_alumnos" style="display:none"><?=json_encode($alumnosJson);?></span>
                            <?php
                              foreach ($sa as $dateSA):
                                if(!empty($dateSA['id_SA'])):
                            ?>
                            <input type="hidden" name="" value="<?=$dateSA['id_SA']; ?>" id="idAlumno<?=$dateSA['cedula_alumno']?>">
                            <?php
                                endif;
                              endforeach;
                              */
                          ?>



                             

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


              </div>


            </div>
            <!-- /.box-header -->

            <div class="box-body ">
              <div class="table-responsive">
              <table id="datatable" class="table table-striped text-center" style="text-align:center;width:100%;font-size:1em;">
                <thead>
                <tr>
                  <th>Nº</th>
                  <th>Sección</th>
                  <th>Saber</th>
                  <!-- <th>Alumno</th> -->
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <!-- <th>Nota</th> -->
                  <th>Acciones</th>
                  <?php //endif ?>
                </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
                foreach ($notas as $data):
                if(!empty($data['cod_seccion']) && !empty($data['id_SC']) && !empty($data['id_clase'])):  
                  $codigoModal = $data['cod_seccion']."-".$data['id_SC']."-".$data['id_clase'];
                  // $codigoModal = $data['cod_seccion'].$data['id_SC'].$data['id_clase'];
                ?>
                <tr>
                  <td style="width:10%">
                    <span class="contenido2">
                      <?php echo $num++; ?>
                    </span>
                  </td>                 
                  <td style="width:25%">
                    <span class="contenido2">
                      <?php echo $data['nombre_seccion']; ?>
                    </span>
                  </td>
                  <td style="width:25%">
                    <span class="contenido2">
                      <?php echo $data['nombreSC']; ?>
                    </span>
                  </td>
                  <!-- <td style="width:20%">
                    <span class="contenido2">
                      <?php 
                        // echo number_format($data['cedula_alumno'],0,',','.')." ".$data['nombre_alumno']." ".$data['apellido_alumno'];
                      ?>
                    </span>
                  </td>
                  <td style="width:20%">
                    <span class="contenido2">
                      <?php 
                        // echo number_format($data['nota'], 2, ',', '.');
                      ?>
                    </span>
                  </td> -->
                 
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <td style="width:40%">
                    <!-- <table style="background:none;text-align:center;width:100%"> -->
                      <!-- <tr> -->
                        <?php //if ($amUsuariosE==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn visualizarBtn" style="border:0;background:none;color:green" value="<?=$codigoModal;?>">
                            <span class="fa fa-list">
                              
                            </span>
                          </button>
                  <button type="button" id="visualizarButton<?=$codigoModal;?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalvisualizarNota<?=$codigoModal;?>" style="display:none;">visualizar</button>

                  <div id="modalvisualizarNota<?=$codigoModal;?>" class="modal fade modalvisualizarNota<?=$codigoModal;?>" role="dialog">
                    
                    <div class="modal-dialog tamModals" style="text-align:left;">
                      <div class="modal-content">
                          <!--=====================================
                          CABEZA DEL MODAL
                          ======================================-->

                          <div class="modal-header" style="background:#3c8dbc; color:white">

                            <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                            <h4 class="modal-title" style="text-align: left;">Ver Notas</h4>
                            <?php //echo $codigoModal;?>
                          </div>

                          <!--=====================================
                          CUERPO DEL MODAL
                          ======================================-->

                          <div class="modal-body" style="max-height:70vh;overflow:auto">
                          <div class="box-body">
                            <div class="row" style="width:100%;">
                              
                              <!-- ENTRADA PARA LA SECCION -->
                              <div class="form-group col-xs-12">
                                <label style="font-size:1.5em;">Sección:
                                    <?php 
                                      foreach ($secciones as $date):
                                        if(!empty($date['cod_seccion'])):
                                          if($data['cod_seccion']==$date['cod_seccion']){
                                            echo "<i>".$date['nombre_seccion']."</i>";
                                          } 
                                        endif;
                                      endforeach;
                                    ?>
                                </label>
                                <br>
                              <!-- ENTRADA PARA EL SABER -->
                                <label style="font-size:1.5em;">Saber complementario:
                                  <?php
                                    if($data['nombre_periodo']=="I"){ $faseData="1"; }
                                    if($data['nombre_periodo']=="1"){ $faseData="1"; }
                                    if($data['nombre_periodo']=="II"){ $faseData="2"; }
                                    if($data['nombre_periodo']=="2"){ $faseData="2"; }
                                    foreach ($saberes as $dateS):
                                        if(!empty($dateS['id_SC'])):
                                        if ($data['trayecto_seccion']==$dateS['trayecto_SC']):
                                          if ($faseData==$dateS['fase_SC']):
                                            if($data['id_SC']==$dateS['id_SC']){
                                              echo "<i>".strtoupper($dateS['nombreSC'])."</i>";
                                            }
                                          endif;
                                        endif;
                                      endif;
                                    endforeach;
                                  ?>
                                </label>
                              </div>




                            </div>
                            
                            <div class="row">
                              <hr>
                            </div>



                            <div class="row boxlist_alumnosnotas<?=$codigoModal;?>" style="display:;">
                              <?php 
                                $alumnosLength = 0;
                                $dataAlumnosJsonModif = [];
                                foreach ($alumnos as $alumnotas) {
                                  if(!empty($alumnotas['cod_seccion']) && !empty($alumnotas['id_clase']) && !empty($alumnotas['id_nota'])){
                                    if($data['cod_seccion']==$alumnotas['cod_seccion'] and $data['id_clase']==$alumnotas['id_clase']){
                                      $dataAlumnosJsonModif[$alumnosLength] = $alumnotas;
                                      $alumnosLength++;
                                    }
                                  }
                                }
                              ?>
                              <div class="col-xs-12">
                                <div class="table-responsive">
                                  <table class="table datatable" style="text-align:left;width:100%;">
                                    <thead>
                                      <tr>
                                        <th colspan='5' style='text-align:left;width:100%;'>Mostrando un total de <?=$alumnosLength;?> alumnos</th>
                                      </tr>
                                      <tr>
                                        <th style='width:10% !important;'>
                                          <span>N°</span>
                                        </th>
                                        <th style='width:20% !important;'>
                                          <span>Cedula</span>
                                        </th>
                                        <th style='width:20% !important;'>
                                          <span>Nombre</span>
                                        </th>
                                        <th style='width:20% !important;'>
                                          <span>Apellido</span>
                                        </th>
                                        <th style='width:30% !important;'>
                                          <span>Notas</span>
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php  
                                        $numex = 1;
                                        foreach ($alumnos as $alumnotas) {
                                          if(!empty($alumnotas['cod_seccion']) && !empty($alumnotas['id_clase']) && !empty($alumnotas['id_nota'])){
                                            if($data['cod_seccion']==$alumnotas['cod_seccion'] and $data['id_clase']==$alumnotas['id_clase']){
                                      ?>
                                        <tr>
                                          <td><?=$numex++;?></td>
                                          <td><?=$alumnotas['cedula_alumno'];?></td>
                                          <td><?=$alumnotas['nombre_alumno'];?></td>
                                          <td><?=$alumnotas['apellido_alumno'];?></td>
                                          <td>
                                            <span><?php if($alumnotas['nota']!=""){ echo number_format($alumnotas['nota'],1,',',''); }else{ echo "0"; } ?> </span>
                                          </td>
                                        </tr>
                                      <?php
                                            }
                                          }
                                        }
                                      ?>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <th style='width:10% !important;'>
                                          <span>N°</span>
                                        </th>
                                        <th style='width:20% !important;'>
                                          <span>Cedula</span>
                                        </th>
                                        <th style='width:20% !important;'>
                                          <span>Nombre</span>
                                        </th>
                                        <th style='width:20% !important;'>
                                          <span>Apellido</span>
                                        </th>
                                        <th style='width:30% !important;'>
                                          <span>Notas</span>
                                        </th>
                                      </tr>
                                    </tfoot>
                                  </table>
                                </div>
                              </div>
                              <!-- <div class="form-group col-xs-12">
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                  <input type="text" class="form-control input-lg" style="width:100%;" name="nuevoAl" id="alumno" placeholder="Alumno" value="<?php echo $datos['nombre_alumno'] . ' ' . $datos['apellido_alumno'] ?>" disabled required>
                                  <span class="input-group-addon" style="width:5%"><i class="fa fa-key"></i></span> 
                                  <input type="number" class="form-control input-lg" style="width:100%;" name="nuevoPass" value="0" max="1" min="0" step="0.1" placeholder="Nota" id="nota<?=$datos['cedula_alumno']?>" required>
                                </div>
                              </div> -->

                            </div>

                          </div>

                        </div>

                          <!--=====================================
                          PIE DEL MODAL
                          ======================================-->

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                            <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$codigoModal;?>" id="modificar">Modificar</button>
                          </div>
                          <span style="display:none;" class="alumnosJsonModif<?=$codigoModal;?>"><?php echo json_encode($dataAlumnosJsonModif); ?></span>

                        <!-- </form> -->

                      </div>

                    </div>

                  </div>

                          <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?=$codigoModal;?>">
                            <span class="fa fa-pencil">
                              
                            </span>
                          </button>
                  <button type="button" id="modificarButton<?=$codigoModal;?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarNota<?=$codigoModal;?>" style="display:none;">Modificar</button>

                  <div id="modalModificarNota<?=$codigoModal;?>" class="modal fade modalModificarNota<?=$codigoModal;?>" role="dialog">
                    
                    <div class="modal-dialog tamModals" style="text-align:left;">
                      <div class="modal-content">
                          <!--=====================================
                          CABEZA DEL MODAL
                          ======================================-->

                          <div class="modal-header" style="background:#3c8dbc; color:white">

                            <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>

                            <h4 class="modal-title" style="text-align: left;">Modificar Notas</h4>
                            <?php //echo $codigoModal;?>
                          </div>

                          <!--=====================================
                          CUERPO DEL MODAL
                          ======================================-->

                          <div class="modal-body" style="max-height:70vh;overflow:auto">
                          <div class="box-body">
                            <div class="row" style="width:100%;">
                              
                              <!-- ENTRADA PARA LA SECCION -->
                              <div class="form-group col-xs-12 col-sm-6">
                                <label for="seccion">Sección</label>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-cogs"></i></span> 
                                  <select class="form-control input-lg select2 seccionModificar" style="width:100%;" name="<?=$codigoModal;?>" id="seccion<?=$codigoModal;?>">
                                    <!-- <option value="">Sección</option> -->
                                    <?php foreach ($secciones as $date): if(!empty($date['cod_seccion'])): ?>
                                      <?php if($data['cod_seccion']==$date['cod_seccion']){ ?>
                                        <option selected="selected"  value="<?php echo $date['cod_seccion'] ?>"><?php echo $date['nombre_seccion'] ?></option>
                                        <?php } ?>
                                    <?php endif; endforeach; ?>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="error_seccion<?=$codigoModal;?>" class="mensajeError" ></span>
                                </div>
                              </div>

                              <!-- ENTRADA PARA EL SABER -->
                              <div class="form-group col-xs-12 col-sm-6">
                                <label for="saber">Saber complementario</label>
                                <?php
                                  if($data['nombre_periodo']=="I"){ $faseData="1"; }
                                  if($data['nombre_periodo']=="1"){ $faseData="1"; }
                                  if($data['nombre_periodo']=="II"){ $faseData="2"; }
                                  if($data['nombre_periodo']=="2"){ $faseData="2"; }
                                ?>
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-indent"></i></span> 
                                  <select class="form-control input-lg select2 saberModificar" style="width:100% !important;" name="<?=$codigoModal;?>" id="saber<?=$codigoModal;?>">
                                    <!-- <option value="">Saber Complementario</option> -->
                                    <?php  ?>
                                    <?php foreach ($saberes as $dateS): if(!empty($dateS['id_SC'])): ?>
                                      <?php if ($data['trayecto_seccion']==$dateS['trayecto_SC']): ?>
                                        <?php if ($faseData==$dateS['fase_SC']): ?>
                                          <?php if($data['id_SC']==$dateS['id_SC']){ ?>
                                      <option  selected="selected"  value="<?php echo $dateS['id_SC'] ?>"><?php echo $dateS['nombreSC'] ?></option>
                                          <?php } ?>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php endif; endforeach; ?>
                                    <?php  ?>
                                  </select>
                                </div>
                                <div style="width:100%;text-align:right;">
                                  <span id="error_saber<?=$codigoModal;?>" class="mensajeError" ></span>
                                </div>
                              </div>




                            </div>
                            
                            <!-- <div class="row">
                              <br>
                              <div class="col-xs-12" style="text-align:right;">
                                <button class="btn btn-primary cargarAlumnosNotasModif" name="<?=$codigoModal;?>" id="cargarAlumnosNotas">Cargar Alumnos</button>
                              </div>
                            </div> -->

                            <div class="row">
                              <hr>
                            </div>



                            <div class="row boxlist_alumnosnotas<?=$codigoModal;?>" style="display:;">
                              <?php 
                                $alumnosLength = 0;
                                $dataAlumnosJsonModif = [];
                                foreach ($alumnos as $alumnotas) {
                                  if(!empty($alumnotas['cod_seccion']) && !empty($alumnotas['id_clase']) && !empty($alumnotas['id_nota'])){
                                    if($data['cod_seccion']==$alumnotas['cod_seccion'] and $data['id_clase']==$alumnotas['id_clase']){
                                      $dataAlumnosJsonModif[$alumnosLength] = $alumnotas;
                                      $alumnosLength++;
                                    }
                                  }
                                }
                              ?>
                              <div class="col-xs-12">
                                <div class="table-responsive">
                                  <table class="table" style="text-align:left;width:100%;">
                                    <thead>
                                      <tr>
                                        <th colspan='5' style='font-size:.8em;text-align:left;width:100%;'>Mostrando un total de <?=$alumnosLength;?> alumnos</th>
                                      </tr>
                                      <tr>
                                        <th style='width:10% !important;'>
                                          <span>N°</span>
                                        </th>
                                        <th style='width:20% !important;'>
                                          <span>Cedula</span>
                                        </th>
                                        <th style='width:20% !important;'>
                                          <span>Nombre</span>
                                        </th>
                                        <th style='width:20% !important;'>
                                          <span>Apellido</span>
                                        </th>
                                        <th style='width:30% !important;'>
                                          <span>Notas</span>
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php  
                                        $numex = 1;
                                        foreach ($alumnos as $alumnotas) {
                                          if(!empty($alumnotas['cod_seccion']) && !empty($alumnotas['id_clase']) && !empty($alumnotas['id_nota'])){
                                            if($data['cod_seccion']==$alumnotas['cod_seccion'] and $data['id_clase']==$alumnotas['id_clase']){
                                      ?>
                                        <tr>
                                          <td><?=$numex++;?></td>
                                          <td><?=$alumnotas['cedula_alumno'];?></td>
                                          <td><?=$alumnotas['nombre_alumno'];?></td>
                                          <td><?=$alumnotas['apellido_alumno'];?></td>
                                          <td>
                                            <span><input type='number' class='form-control notasAlumnos' name='notasAlumnos[]' onfocusout='if($(this).val()>=1){ $(this).val(1); } if($(this).val()<=0){ $(this).val(0); }' <?php if($alumnotas['nota']!=""){ echo "value='".$alumnotas['nota']."'"; }else{ echo "value='0'"; } ?> max='1' min='0' style='width:100%;' step='0.1' id='nota<?=$alumnotas['cedula_alumno'];?>' required oninput="this.value=this.value.replace(/[^0-9 .]/g, '');" ></span>
                                          </td>
                                        </tr>
                                        <tr style='padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;'>
                                          <td colspan='5' style='padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;'>
                                            <span style='width:100%;text-align:right;display:block;' class='mensajeError' id='notaS<?=$alumnotas['cedula_alumno'];?>'></span>
                                          </td>
                                        </tr>
                                      <?php
                                            }
                                          }
                                        }
                                      ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <!-- <div class="form-group col-xs-12">
                                <div class="input-group" style="width:100%;">
                                  <span class="input-group-addon" style="width:5%;"><i class="fa fa-user"></i></span>
                                  <input type="text" class="form-control input-lg" style="width:100%;" name="nuevoAl" id="alumno" placeholder="Alumno" value="<?php echo $datos['nombre_alumno'] . ' ' . $datos['apellido_alumno'] ?>" disabled required>
                                  <span class="input-group-addon" style="width:5%"><i class="fa fa-key"></i></span> 
                                  <input type="number" class="form-control input-lg" style="width:100%;" name="nuevoPass" value="0" max="1" min="0" step="0.1" placeholder="Nota" id="nota<?=$datos['cedula_alumno']?>" required>
                                </div>
                              </div> -->

                            </div>

                          </div>

                        </div>

                          <!--=====================================
                          PIE DEL MODAL
                          ======================================-->

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                            <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$codigoModal;?>" id="modificar">Modificar</button>
                          </div>
                          <span style="display:none;" class="alumnosJsonModif<?=$codigoModal;?>"><?php echo json_encode($dataAlumnosJsonModif); ?></span>

                        <!-- </form> -->

                      </div>

                    </div>

                  </div>
                        <!-- </td> -->
                        <?php //endif; ?>
                        <?php //if ($amUsuariosB==1): ?>
                        <!-- <td style="width:50%"> -->
                          <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?=$codigoModal; ?>">
                            <span class="fa fa-trash"></span>
                          </button>
                        <!-- </td> -->
                        <?php //endif; ?>
                      <!-- </tr> -->
                    <!-- </table> -->
                  </td>
                  <?php //endif ?>
                  

                      
                </tr>
                <?php
               endif; endforeach;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nº</th>
                  <th>Código</th>
                  <th>Clase</th>
                  <!-- <th>Alumno</th> -->
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <!-- <th>Nota</th> -->
                  <th>Acciones</th>
                  <?php //endif ?>
                </tr>
                </tfoot>
              </table>

              </div>
              <span style="display:none;" class="alumnosJson"></span>

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
<script>
$(document).ready(function(){ 
  // alert($(window).width());
  // ($(window).width() < 576))
  if($(window).width() < 768){ // XS
    $(".tamModals").attr("style","width:95%;margin-left:auto;margin-right:auto;text-align:left !important;");
  }
  if($(window).width() >= 768 && $(window).width() < 992){ // SM
    $(".tamModals").attr("style","width:85%;margin-left:auto;margin-right:auto;text-align:left !important;");
  }
  if($(window).width() >= 992 && $(window).width() < 1200){ // MD
    $(".tamModals").attr("style","width:70%;margin-left:auto;margin-right:auto;text-align:left !important;");
  }
  if($(window).width() >= 1200){ // MD
    $(".tamModals").attr("style","width:70%;margin-left:auto;margin-right:auto;text-align:left !important;");
  }

  $('#seccion').change(function(){
    var url = $("#url").val();
    var seccion = $(this).val();
    $(".boxlist_alumnosnotas").slideUp(500);
    if(seccion==""){
      var html = '';
      html += '<option value="">Saber Complementario</option>';
      $("#saber").html(html);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          saberes: true,   
          cod_seccion: seccion,       
        },
        success: function(respuesta){       
          // alert(respuesta);
          // console.log(respuesta);
          var resp = JSON.parse(respuesta);
          if (resp.msj == "Good") {
            var data = resp.data;
            var dataSaberes = "";
            if(resp.msjSaberes=="Good"){
              dataSaberes = resp.dataSaberes;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("SABERES: ");
            // console.log(dataSaberes);
            // console.log(dataSaberes.length);
            var html = '';
            html += '<option value="">Saber Complementario</option>';
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['id_SC']+'" ';

              if(dataSaberes.length>0){
                for (var j = 0; j < dataSaberes.length; j++) {
                  // alert(data[i]['id_SC']);
                  // alert(dataSaberes[j]['id_SC']);
                  if(dataSaberes[j]['id_SC']==data[i]['id_SC']){
                    html += 'disabled="disabled"'
                  }
                }
              }
              html += ' >'+data[i]['nombreSC']+'</option>';
            }
            $("#saber").html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option value="">Saber Complementario</option>';
            $("#saber").html(html);
          }
        },
        error: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);
          console.log(resp);
        }
      });
    }
  });

  $('.seccionModificar').change(function(){
    var url = $("#url").val();
    var id = $(this).attr("name");
    var seccion = $(this).val();
    // alert(id);
    // alert(url);
    // alert(seccion);
    $(".boxlist_alumnosnotas"+id).slideUp(500);
    if(seccion==""){
      var html = '';
      html += '<option value="">Saber Complementario</option>';
      $("#saber"+id).html(html);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          saberes: true,   
          cod_seccion: seccion,       
        },
        success: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);
          // console.log(resp);
          if (resp.msj == "Good") {
            var data = resp.data;
            var dataSaberes = "";
            if(resp.msjSaberes=="Good"){
              dataSaberes = resp.dataSaberes;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("SABERES: ");
            // console.log(dataSaberes);
            var html = '';
            html += '<option value="">Saber Complementario</option>';
            for (var i = 0; i < data.length; i++) {
              if(dataSaberes.length>0){
                for (var j = 0; j < dataSaberes.length; j++) {
                  if(dataSaberes[j]['id_SC']==data[i]['id_SC']){
              html += '<option value="'+data[i]['id_SC']+'" ';

                    // html += 'disabled="disabled"'
              
              html += ' >'+data[i]['nombreSC']+'</option>';
                  }
                }
              }
            }
            $("#saber"+id).html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option value="">Saber Complementario</option>';
            $("#saber"+id).html(html);
          }
        },
        error: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);
          console.log(resp);
        }
      });
    }
  });

  $("#cargarAlumnosNotas").click(function(){
    var url = $("#url").val();
    var seccion = $("#seccion").val();
    var saber = $("#saber").val();
    if((seccion!="" && saber != "")){
      $("#error_seccion").html("");
      $("#error_saber").html("");
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',   
        data: {
          Buscar: true,
          alumnosSeccion: true,
          cod_seccion: seccion,
          id_SC: saber,       
        },
        success: function(resp){
          // alert(resp);
          var datos = JSON.parse(resp); 
          if (datos.msj === "Good") {
            var nada = ""; 
            var html = "";
            html += "<div class='col-xs-12'>";
              html += "<div class='table-responsive'>"
                html += "<table class='datatable table' style='text-align:left;width:100% !important;' >";
                  html += "<thead>";
                    html += "<tr>"; 
                      html += "<th colspan='5' style='font-size:.8em;text-align:left;width:100%;'>Mostrando un total de "+datos.data.length+" alumnos</th>";
                    html += "</tr>";
                    html += "<tr>";
                      html += "<th style='width:10% !important;'>";
                        html += "<span>N°</span>";
                      html += "</th>";
                      html += "<th style='width:20% !important;'>";
                        html += "<span>Cedula</span>";
                      html += "</th>";
                      html += "<th style='width:20% !important;'>";
                        html += "<span>Nombre</span>";
                      html += "</th>";
                      html += "<th style='width:20% !important;'>";
                        html += "<span>Apellido</span>";
                      html += "</th>";
                      html += "<th style='width:30% !important;'>";
                        html += "<span>Notas</span>";
                      html += "</th>";
                    html += "</tr>";
                  html += "</thead>";
                  html += "<tbody>";
                  if(datos.data.length > 0){
                    var data = datos.data;
                    $(".alumnosJson").html(JSON.stringify(data));
                    for (var i = 0; i < data.length; i++) {
                      // console.log(data[i]);
                      html += "<tr>";
                        html += "<td>";
                          html += "<span>"+(i+1)+"</span>";
                        html += "</td>";
                        html += "<td>";
                          html += "<span>"+data[i]["cedula_alumno"]+"</span>";
                        html += "</td>";
                        html += "<td>";
                          html += "<span>"+data[i]["nombre_alumno"]+"</span>";
                        html += "</td>";
                        html += "<td>";
                          html += "<span>"+data[i]["apellido_alumno"]+"</span>";
                        html += "</td>";
                        html += "<td>";
                          nada = "";
                          html += "<span><input type='number' class='form-control notasAlumnos' name='notasAlumnos[]' onfocusout='if($(this).val()>=1){ $(this).val(1); } if($(this).val()<=0){ $(this).val(0); }' value='0' max='1' min='0' step='0.1' id='nota"+data[i]['cedula_alumno']+"' required oninput='this.value=this.value.replace(/[^0-9 .]/g,"+","+");' ></span>";
                          //alert(this.value)
                        html += "</td>";
                      html += "</tr>";
                      html += "<tr style='padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;'>";
                        html += "<td colspan='5' style='padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;'>";
                        html += "<span style='width:100%;text-align:right;display:block;' class='mensajeError' id='notaS"+data[i]["cedula_alumno"]+"'></span>";
                        html += "</td>";
                      html += "</tr>";
                    }
                  }else{
                      html += "<tr>";
                        html += "<td colspan='5'>";
                          html += "<span>No hay alumnos cargados en esta clase</span>";
                        html += "</td>";
                      html += "</tr>";
                  }
                    html += "<tr>";
                      html += "<td colspan='5'>";
                        html += "<th>";
                      html += "</td>";
                    html += "</tr>";
                  html += "</tbody>";
                  // html += "<tfoot>";
                  //   html += "<tr>";
                  //     html += "<th style='width:10%;'>";
                  //       html += "<span>N°</span>";
                  //     html += "</th>";
                  //     html += "<th>";
                  //       html += "<span>Cedula</span>";
                  //     html += "</th>";
                  //     html += "<th>";
                  //       html += "<span>Nombre</span>";
                  //     html += "</th>";
                  //     html += "<th>";
                  //       html += "<span>Apellido</span>";
                  //     html += "</th>";
                  //     html += "<th>";
                  //       html += "<span>Notas</span>";
                  //     html += "</th>";
                  //   html += "</tr>";
                  // html += "</tfoot>";
                html += "</table>";
              html += "</div>";
            html += "</div>";
            $(".boxlist_alumnosnotas").html(html);
            $(".boxlist_alumnosnotas").slideDown(500);
          } 
        },
        error: function(respuesta){       
          var datos = JSON.parse(respuesta);
          console.log(datos);

        }

      });
    }else{
      if(seccion==""){
        $("#error_seccion").html("Debe seleccionar una sección");
      }else{
        $("#error_seccion").html("");
      }
      if(saber==""){
        $("#error_saber").html("Debe seleccionar un saber");
      }else{
        $("#error_saber").html("");
      }
      // Swal.fire({
      //   type: 'warning',
      //   title: '¡Debe seleccionar la sección y el saber complementario!',
      //   text: 'La sección y el saber complementario deben ser seleccionados para buscar a los alumnos de la clase',
      //   footer: 'SCHSL', showCloseButton: false, showConfirmButton: true,
      //   // footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
      // });
    }
  });

  $(".cargarAlumnosNotasModif").click(function(){
    var url = $("#url").val();
    var id = $(this).attr("name");
    var seccion = $("#seccion"+id).val();
    var saber = $("#saber"+id).val();

    if((seccion!="" && saber != "")){
      $("#error_seccion"+id).html("");
      $("#error_saber"+id).html("");
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',   
        data: {
          Buscar: true,
          alumnosSeccion: true,
          cod_seccion: seccion,
          id_SC: saber,       
        },
        success: function(resp){
          // alert(resp);
          var datos = JSON.parse(resp); 
          if (datos.msj === "Good") {
            var nada = ""; 
            var html = "";
            html += "<div class='col-xs-12'>";
              html += "<div class='table-responsive'>"
                html += "<table class='table' style='text-align:left;width:100% !important;'>";
                  html += "<thead>";
                    html += "<tr>";
                      html += "<th colspan='5' style='font-size:.8em;text-align:left;width:100%;'>Mostrando un total de "+datos.data.length+" alumnos</th>";
                    html += "</tr>";
                    html += "<tr>";
                      html += "<th style='width:10%;'>";
                        html += "<span>N°</span>";
                      html += "</th>";
                      html += "<th style='width:20%;'>";
                        html += "<span>Cedula</span>";
                      html += "</th>";
                      html += "<th style='width:20%;'>";
                        html += "<span>Nombre</span>";
                      html += "</th>";
                      html += "<th style='width:20%;'>";
                        html += "<span>Apellido</span>";
                      html += "</th>";
                      html += "<th>";
                        html += "<span>Notas</span>";
                      html += "</th>";
                    html += "</tr>";
                  html += "</thead>";
                  html += "<tbody>";
                  if(datos.data.length > 0){
                    var data = datos.data;
                    $(".alumnosJsonModif").html(JSON.stringify(data));
                    for (var i = 0; i < data.length; i++) {
                      // console.log(data[i]);
                      html += "<tr>";
                        html += "<td>";
                          html += "<span>"+(i+1)+"</span>";
                        html += "</td>";
                        html += "<td>";
                          html += "<span>"+data[i]["cedula_alumno"]+"</span>";
                        html += "</td>";
                        html += "<td>";
                          html += "<span>"+data[i]["nombre_alumno"]+"</span>";
                        html += "</td>";
                        html += "<td>";
                          html += "<span>"+data[i]["apellido_alumno"]+"</span>";
                        html += "</td>";
                        html += "<td>";
                          html += "<span><input type='number' class='form-control notasAlumnos' name='notasAlumnos[]' onfocusout='if($(this).val()>=1){ $(this).val(1); } if($(this).val()<=0){ $(this).val(0); }' value='0' max='1' min='0' step='0.1' id='nota"+data[i]['cedula_alumno']+"' style='width:100%;' required oninput='this.value=this.value.replace(/[^0-9 .]/g,"+","+"); alert(this.value)'></span>";
                        html += "</td>";
                      html += "</tr>";
                      html += "<tr style='padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;'>";
                        html += "<td colspan='5' style='padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;'>";
                        html += "<span style='width:100%;text-align:right;display:block;' class='mensajeError' id='notaS"+data[i]["cedula_alumno"]+"'></span>";
                        html += "</td>";
                      html += "</tr>";
                    }
                  }else{
                      html += "<tr>";
                        html += "<td colspan='5'>";
                          html += "<span>No hay alumnos cargados en esta clase</span>";
                        html += "</td>";
                      html += "</tr>";
                  }
                    html += "<tr>";
                      html += "<td colspan='5'>";
                        html += "<th>";
                      html += "</td>";
                    html += "</tr>";
                  html += "</tbody>";
                html += "</table>";
              html += "</div>";
            html += "</div>";
            $(".boxlist_alumnosnotas"+id).html(html);
            $(".boxlist_alumnosnotas"+id).slideDown(500);
          } 
        },
        error: function(respuesta){       
          var datos = JSON.parse(respuesta);
          console.log(datos);

        }
      });
    }else{
      if(seccion==""){
        $("#error_seccion"+id).html("Debe seleccionar una sección");
      }else{
        $("#error_seccion"+id).html("");
      }
      if(saber==""){
        $("#error_saber"+id).html("Debe seleccionar un saber");
      }else{
        $("#error_saber"+id).html("");
      }
    }
  });

  $("#guardar").click(function(){
    var url = $("#url").val();
    // var id = $(this).val();
    // alert(id);
    var response = validar();
    // alert(response);

    if(response){
      swal.fire({ 
            title: "¿Desea guardar los datos?",
            text: "Se guardaran los datos, ¿desea continuar?",
            type: "question",
            showCancelButton: true,
            confirmButtonText: "¡Guardar!",
            cancelButtonText: "No", 
            closeOnConfirm: false,
            closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){ 
     
            let seccion = $("#seccion").val();     
            let saber = $("#saber").val();    
            var json = $(".alumnosJson").html();
            var data = JSON.parse(json);
            var notas = new Array();
            var alumnos = new Array();
            var ids="";
            for(var i = 0; i < data.length; i++){
              ids = data[i]['cedula_alumno'];
              notas[i] = $("#nota"+ids).val();
              alumnos[i] = data[i]['id_SA'];
            }
            // console.log(seccion);
            // console.log(saber);
            // console.log(alumnos);
            // console.log(notas);

            $.ajax({
              url: url+'/Agregar',    
              type: 'POST',   
              data: {
                Agregar: true,
                seccion: seccion,
                saber: saber,
                idSA: alumnos,
                notas: notas,
              },
              success: function(resp){
                console.log(resp); 
                // alert(resp);

                var datos = JSON.parse(resp); 
                if (datos.msj === "Good") {   
                  Swal.fire({
                    type: 'success',
                    title: '¡Registro Exitoso!',
                    text: 'Se ha agregado la nota de los alumnos en el sistema',
                    footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                  }).then((isConfirm) => {
                      location.reload();
                  } );
                } 
                if (datos.msj === "Repetido") {   
                  Swal.fire({
                    type: 'warning',
                    title: '¡Registro repetido!',
                    text: 'El profesor ' + nombre + ' ' + apellido + ' ya esta agregado al sistema',
                    footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                  });
                }
                if (datos.msj === "Error") {   
                  Swal.fire({
                    type: 'error',
                    title: '¡Error la guardar los cambio!',
                    text: 'Intente de nuevo, si el error persiste por favor contacte con el soporte',
                    footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                  });
                }     
                if (datos.msj === "Vacio") {   
                  Swal.fire({
                    type: 'warning',
                    title: '¡Debe rellenar todos los campos!',
                    footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                  });
                }     
              },
              error: function(respuesta){       
                var datos = JSON.parse(respuesta);
                console.log(datos);

              }

            });
          }else { 
                swal.fire({
                    type: 'error',
                    title: '¡Proceso cancelado!',
                });
          } 
      });

    }
  });


  $(".modificarBtn").click(function(){
    var url = $("#url").val();
    // var id = $(this).val();
    swal.fire({ 
          title: "¿Desea modificar los datos?",
          text: "Se movera al formulario para modificar los datos, ¿desea continuar?",
          type: "question",
          showCancelButton: true,
          confirmButtonText: "¡Si!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){            
            /*window.alert($(this).val());*/
            let notaModif = $(this).val();
            // alert(notaModif);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                notaModif: notaModif,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") { 

                  $("#modificarButton"+notaModif).click(); 

                }        
              },
              error: function(respuesta){       
                // alert(respuesta);
                var resp = JSON.parse(respuesta);
                console.log(resp);

              }

            });




          }else { 
              swal.fire({
                  type: 'error',
                  title: '¡Proceso cancelado!',
              });
          } 
      });
  });

  $(".visualizarBtn").click(function(){
    var url = $("#url").val();
    // var id = $(this).val();
    swal.fire({ 
          title: "¿Desea Visualizar las notas?",
          text: "Se mostrara la tabla para ver los datos, ¿desea continuar?",
          type: "question",
          showCancelButton: true,
          confirmButtonText: "¡Si!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){            
            /*window.alert($(this).val());*/
            let notaModif = $(this).val();
            // alert(notaModif);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                notaModif: notaModif,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") { 

                  $("#visualizarButton"+notaModif).click(); 

                }        
              },
              error: function(respuesta){       
                // alert(respuesta);
                var resp = JSON.parse(respuesta);
                console.log(resp);

              }

            });




          }else { 
              swal.fire({
                  type: 'error',
                  title: '¡Proceso cancelado!',
              });
          } 
      });
  });

  $(".modificarButtonModal").click(function(){
    var url = $("#url").val();
    var id = $(this).val();
    var respuesta = validar(true, id);
    if(respuesta){
      swal.fire({ 
          title: "¿Desea guardar los datos?",
          text: "Se guardaran los datos, ¿desea continuar?",
          type: "question",
          showCancelButton: true,
          confirmButtonText: "¡Guardar!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){ 

            // let nota = $("#nota"+id).val();
            // alert(nota);
            let seccion = $("#seccion"+id).val();     
            let saber = $("#saber"+id).val();    
            var json = $(".alumnosJsonModif"+id).html();
            var data = JSON.parse(json);
            var notas = new Array();
            var alumnos = new Array();
            var ids="";
            for(var i = 0; i < data.length; i++){
              ids = data[i]['cedula_alumno'];
              notas[i] = $("#nota"+ids).val();
              alumnos[i] = data[i]['id_SA'];
            }

            // console.log(seccion);
            // console.log(saber);
            // console.log(alumnos);
            // console.log(notas);

            $.ajax({
              url: url+'/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,
                seccion: seccion,
                saber: saber,
                idSA: alumnos,
                notas: notas,     
              },
              success: function(resp){
                alert(resp);
                var datos = JSON.parse(resp);   
                if (datos.msj === "Good") {   
                  // alert("asdasd");
                      Swal.fire({
                        type: 'success',
                        title: '¡Modificacion Exitosa!', 
                        text: 'Se ha modificado la nota en el sistema', 
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      }).then((isConfirm) => {
                          location.reload();
                      } );
                  } 
                  if (datos.msj === "Repetido") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Registro repetido!',
                      text: 'El profesor ' + nombre + ' ' + apellido + ' ya esta agregado al sistema con la cedula '+cedula,
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    });
                  }
                  if (datos.msj === "Error") {   
                    Swal.fire({
                      type: 'error',
                      title: '¡Error la guardar los cambio!',
                      text: 'Intente de nuevo, si el error persiste por favor contacte con el soporte',
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    });
                  }   
                  if (datos.msj === "Vacio") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Debe rellenar todos los campos!',
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    });
                  }   
              },
              error: function(respuesta){       
                var datos = JSON.parse(respuesta);
                console.log(datos);

              }

            });
          }else { 
              swal.fire({
                  type: 'error',
                  title: '¡Proceso cancelado!',
              });
          } 
      });
    }

  });

  $(".eliminarBtn").click(function(){
    var url = $("#url").val();
      swal.fire({ 
          title: "¿Desea borrar los datos?",
          text: "Se borraran los datos escogidos, ¿desea continuar?",
          type: "error",
          showCancelButton: true,
          confirmButtonText: "¡Si!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){            
                swal.fire({ 
                    title: "¿Esta seguro de borrar los datos?",
                    text: "Se borraran los datos, esta opcion no se puede deshacer, ¿desea continuar?",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonText: "¡Si!",
                    cancelButtonText: "No", 
                    closeOnConfirm: false,
                    closeOnCancel: false 
                }).then((isConfirm) => {
                    if (isConfirm.value){                      
                        /*window.alert($(this).val());*/
                        let notaDelete = $(this).val();
                        // alert(notaDelete);
                      $.ajax({
                        url: url+'/Eliminar',    
                        type: 'POST',   
                        data: {
                          Eliminar: true,   
                          notaDelete: notaDelete,
                        },
                        success: function(respuesta){       
                          // alert(respuesta);
                          var datos = JSON.parse(respuesta);
                          if (datos.msj === "Good") {   
                            Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se han eliminado las notas ',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            }).then((isConfirm) => {
                                location.reload();
                            } );
                          } 
                          if (datos.msj === "Error") {   
                            Swal.fire({
                              type: 'error',
                              title: '¡Error al borrar las notas!',
                              text: 'Intente de nuevo, si el error persiste por favor contacte con el soporte',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            });
                          }           
                        },
                        error: function(respuesta){       
                          var data = JSON.parse(respuesta);
                          console.log(data);

                        }

                      });
                    }else { 
                        swal.fire({
                            type: 'error',
                            title: '¡Proceso cancelado!',
                        });
                    } 
                });

          }else { 
              swal.fire({
                  type: 'error',
                  title: '¡Proceso cancelado!',
              });
          } 
      });
  });


});  

function validar(modificar = false, id=""){
    var form = "";
    if(!modificar){
      form = "#modalAgregarNota";
      var json = $(".alumnosJson").html();
    }else{
      form = "#modalModificarNota"+id;
      var json = $(".alumnosJsonModif"+id).html();
    }

    var data = JSON.parse(json);
    // console.log(data);
    var notaAlumno = new Array();
    var aNota = new Array();
    var rnota = false;
    var ids = "";

    for(var i = 0; i < data.length; i++){
      ids = data[i]['cedula_alumno'];
      notaAlumno[i] = $(form+" #nota"+ids).val();
      // alert(notaAlumno[i]);
      aNota[i] = 0;
      if(notaAlumno[i] > 0 && notaAlumno[i] <= 1){ 
        aNota[i] = 1;  
        $(form+" #notaS"+ids).html("");
      }else if (notaAlumno[i] <= 0) {
        aNota[i] = 0;
        $(form+" #notaS"+ids).html("La calificación del alumno debe ser mayor a 0pt");
      }else if (notaAlumno[i] > 1) {
        aNota[i] = 0;
        $(form+" #notaS"+ids).html("La calificación del alumno debe ser menor o igual a 1pt");
      }
    }
    var cant = 0;
    for(var i = 0; i < data.length; i++){
      cant += aNota[i];
    }
    if(data.length == cant){
      rnota = true;
    }else{
      rnota = false;
    }
    var validado = false;
    if(rnota == true){
      validado = true;
    }else{
      validado = false;
    }
    return validado;
}
</script>
</body>
</html>

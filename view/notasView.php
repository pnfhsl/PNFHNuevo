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
              <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">
              <div class="col-xs-12 col-sm-6" style="text-align:right">
                <?php if($amNotasR=="1"): ?>
                  <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarNota">Agregar Nuevo</button>
                  <!--=====================================
                    MODAL AGREGAR PROF
                  ======================================-->
                  <div id="modalAgregarNota" class="modalAgregarNota modal fade" role="dialog">
                    <div class="modal-dialog tamModals" style="text-align:left;">
                      <div class="modal-content">
                        <div class="modal-header" style="background:#3c8dbc; color:white">
                          <button type="button" class="close" data-dismiss="modal" style="top:25px;" >&times;</button>
                          <h4 class="modal-title" style="text-align: left;">Agregar Nota</h4>
                        </div>

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
                                        <option value="<?php echo $date['cod_seccion'] ?>"><?=$date['nombre_seccion'] ?> (<?=$date['year_periodo']."-".$date['nombre_periodo']; ?>)</option>
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
                    <th>Sección</th>
                    <th>Saber</th>
                    <!-- <th>Alumno</th> -->
                    <?php if ($amNotasC==1||$amNotasE==1||$amNotasB==1): ?>
                    <th>Acciones</th>
                    <?php endif; ?>
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
                      <br>
                      <small>(<?php echo $data['year_periodo']."-".$data['nombre_periodo']; ?>)</small>
                    </span>
                  </td>
                  <td style="width:25%">
                    <span class="contenido2">
                      <?php echo $data['nombreSC']; ?>
                    </span>
                  </td>
                 
                  <?php if ($amNotasC==1||$amNotasE==1||$amNotasB==1): ?>
                  <td style="width:40%">
                    <?php if ($amNotasC==1): ?>
                      <button class="btn visualizarBtn" style="border:0;background:none;color:green" value="<?=$codigoModal;?>">
                        <span class="fa fa-list"></span>
                      </button>

                      <!-- Cargar -->
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
                                              <td><?=number_format($alumnotas['cedula_alumno'],0,'','.');?></td>
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
                
                                </div>

                              </div>

                            </div>

                              <!--=====================================
                              PIE DEL MODAL
                              ======================================-->

                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                                <!-- <button type="submit" class="btn btn-primary modificarButtonModal" value="<?=$codigoModal;?>" id="modificar">Modificar</button> -->
                              </div>
                              <span style="display:none;" class="alumnosJsonModif<?=$codigoModal;?>"><?php echo json_encode($dataAlumnosJsonModif); ?></span>

                            <!-- </form> -->

                          </div>

                        </div>
                      </div>
                      <!-- Cargar -->
                    <?php endif; ?>
                    <?php if ($amNotasE==1): ?>
                      <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?=$codigoModal;?>">
                        <span class="fa fa-pencil"></span>
                      </button>

                      <!-- Modificar -->
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
                                            <option selected="selected"  value="<?php echo $date['cod_seccion'] ?>"><?=$date['nombre_seccion'] ?> (<?=$date['year_periodo']."-".$date['nombre_periodo']; ?>)</option>
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
                                                <span><input type='number' class='form-control notasAlumnos' name='notasAlumnos[]' onkeyup='if( $(this).val() > 1.0 ){ $(this).val( ($(this).val()/10) ); $(this).focus(); }' onfocusout='if($(this).val()>=1){ $(this).val(1); } if($(this).val()<=0){ $(this).val(0); }' <?php if($alumnotas['nota']!=""){ echo "value='".$alumnotas['nota']."'"; }else{ echo "value='0'"; } ?> max='1' min='0' style='width:100%;' step='0.1' id='nota<?=$alumnotas['cedula_alumno'];?>' required oninput="this.value=this.value.replace(/[^0-9 .]/g, '');" ></span>
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
                      <!-- Modificar -->
                    <?php endif; ?>
                    <?php if ($amNotasB==1): ?>
                      <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?=$codigoModal; ?>">
                        <span class="fa fa-trash"></span>
                      </button>
                    <?php endif; ?>
                  </td>
                  <?php endif ?>
                  

                      
                </tr>
                <?php
               endif; endforeach;
                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nº</th>
                    <th>Sección</th>
                    <th>Saber</th>
                    <!-- <th>Alumno</th> -->
                    <?php if ($amNotasC==1||$amNotasE==1||$amNotasB==1): ?>
                    <th>Acciones</th>
                    <?php endif; ?>
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
  <script src="<?=_THEME_?>/js/notas.js"></script>
</body>
</html>

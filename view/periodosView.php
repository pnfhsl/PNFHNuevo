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
              <div class="col-xs-12 col-sm-6" style="text-align:right">

                <button type="button" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalAgregarPeriodo">Agregar Nuevo</button>
                  <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">



                <div id="modalAgregarPeriodo" class="modal fade" role="dialog">
                
                <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">

                  <div class="modal-content">

                    <!-- <form role="form" method="post" enctype="multipart/form-data"> -->


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
                                  <input type="text" value="-" class="form-control input-lg" style="text-align:center;padding:0;background:none;" readonly>
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


                    <!-- </form> -->

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
                  <th>Año</th>
                  <th>Periodo</th>
                  <th>Fecha de Apertura</th>
                  <th>Fecha de Cierre</th>
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>Acciones</th>
                  <?php //endif ?>
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

                      echo $fechaCierre;?>
                    </span>
                  </td>

                 
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <td style="width:10%">
                    <!-- <table style="background:none;text-align:center;width:100%"> -->
                      <!-- <tr> -->
                        <?php //if ($amUsuariosE==1): ?>
                        <!-- <td style="width:50%"> -->
                         <button class="btn modificarBtn" style="border:0;background:none;color:#04a7c9" value="<?php echo $data['id_periodo'] ?>">
                            <span class="fa fa-pencil">
                              
                            </span>
                          </button>
                        <!-- </td> -->
                        <?php //endif; ?>
                        <?php //if ($amUsuariosB==1): ?>
                        <!-- <td style="width:50%"> -->
                           <button class="btn eliminarBtn" style="border:0;background:none;color:red" value="<?php echo $data['id_periodo'] ?>">
                            <span class="fa fa-trash"></span>
                          </button>
                        <!-- </td> -->
                        <?php //endif; ?>
                      <!-- </tr> -->
                    <!-- </table> -->
                  </td>
                  <?php //endif ?>

                     <button type="button" id="modificarButton<?=$data['id_periodo']?>" class="btn enviar2 btn-next btn-fill btn btn-primary btn-wd btn-sm" data-toggle="modal" data-target="#modalModificarPeriodo<?=$data['id_periodo']?>" style="display: none">Modificar</button>

                  <div id="modalModificarPeriodo<?=$data['id_periodo']?>" class="modal fade modalModificarPeriodo<?=$data['id_periodo']?>" role="dialog">
                    
                    <div class="modal-dialog" style="width:60%;margin-left:20%;margin-right:20%;text-align:left;">
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
                                      <input type="text" value="-" class="form-control input-lg" style="text-align:center;padding:0;background:none;" readonly>
                                    </div>
                                    <div style="width:50%;display:inline-block;">
                                      <select class="form-control input-lg numeroPrModificar" style="width:100%;" id="numeroPr<?=$data['id_periodo']?>">
                                        <option value="">Numero de Periodo</option>
                                        <option <?php if($data['year_periodo']=="I" || $data['year_periodo']=="i"){ ?> selected="selected" <?php } ?> value="I">I</option>
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


                              <!-- ENTRADA NOMBRE PERIODO -->
                              <!-- <div class="form-group">
                                 <div class="input-group">
                                   <span class="input-group-addon"><i class="fa fa-address-card"></i></span> 
                                   <input type="text" class="form-control input-lg nombreModificar" value="<?=$data['nombre_periodo']?>" name="nuevaNombrepr" maxlength="6" placeholder="Ingresar periodo" id="nombrePr<?=$data['id_periodo']?>" required>
                                 </div>
                                 <div style="width:100%;text-align:right;">
                                   <span id="nombreP<?=$data['id_periodo']?>" class="mensajeError"></span>
                                 </div>
                              </div> -->

                              <!-- ENTRADA AÑO -->
                              <!-- <div class="form-group">
                                 <div class="input-group">
                                   <span class="input-group-addon"><i class="fa fa-address-card"></i></span> 
                                   <input type="text" class="form-control input-lg yearModificar" value="<?=$data['year_periodo']?>" name="nuevoYear" maxlength="4" placeholder="Ingresar Año" id="year<?=$data['id_periodo']?>" required>
                                 </div>
                                 <div style="width:100%;text-align:right;">
                                   <span id="yearP<?=$data['id_periodo']?>" class="mensajeError"></span>
                                 </div>
                              </div> -->

                              <!-- ENTRADA FECHA APERTURA -->
                              <!-- <div class="form-group">
                                 <div class="input-group">
                                   <span class="input-group-addon"><i class="fa fa-address-card"></i></span> 
                                   <input type="date" class="form-control input-lg" value="<?=$data['fecha_apertura']?>" name="nuevafechaAP" placeholder="Ingresar Fecha Apertura" id="fechaA<?=$data['id_periodo']?>" required>
                                 </div>
                                 <div style="width:100%;text-align:right;">
                                   <span id="fechaAP<?=$data['id_periodo']?>" class="mensajeError"></span>
                                 </div>
                              </div> -->

                              <!-- ENTRADA FECHA CIERRE -->
                              <!-- <div class="form-group">
                                  <div class="input-group">
                                     <span class="input-group-addon"><i class="fa fa-address-card"></i></span> 
                                     <input type="date" class="form-control input-lg" value="<?=$data['fecha_cierre']?>" name="nuevafechacr" placeholder="Ingresar Fecha Cierre" id="fechaC<?=$data['id_periodo']?>" required>
                                   </div>
                                   <div style="width:100%;text-align:right;">
                                     <span id="fechaCP<?=$data['id_periodo']?>" class="mensajeError"></span>
                                     <span id="fechaV<?=$data['id_periodo']?>" class="mensajeError"></span>
                                  </div>
                              </div> -->
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
                  <?php //if ($amUsuariosE==1||$amUsuariosB==1): ?>
                  <th>Acciones</th>
                  <?php //endif ?>
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

<script>

$(document).ready(function(){ 
 

  // $('#nombrePr').on('input', function () {  
  //   this.value = this.value.replace(/[^0-9]/g,''); 
  // });     
  // $('#numeroPr').on('input', function () {  
  //   this.value = this.value.replace(/[^I Inicio]/g,''); 
  // });
    // this.value = this.value.replace(/[^0-9]{4}[-]{1}[I]{1}/g,''); 
    // this.value = this.value.replace(/^((\[[0-9]{1,4}))$/,''); 

  // $("#nombrePr").keypress(function (e) {
  //     console.log(e.target)
  //     expresion = /^[0-9]$/
  //     validarKeyPress(expresion, e);
  // });
  // $("#nombrePr").keyup(function (e) {
  //     console.log(e.target)
  //     expresion = /^[0-9]{1,2}$/
  //     if(!expresion.test(e.target.value)){
  //         $("#nombreP").text("Edad incorrecta")
  //     }
  //     else{
  //         $("#nombreP").text("")
  //     }
  // }); 
  // function validarKeyPress(expresion, e) {
  //   //key obtiene el código ASCII del evento recuerde que
  //   var key = e.keyCode || e.which;
  //   //Luego se transforma el código ASCII en un carácter
  //   var tecla = String.fromCharCode(key);
  //   //Se procede a comparar con la expresión regular usando la función test
  //   if (!expresion.test(tecla)) {
  //       e.preventDefault(); //Si no se cumple la expresión no se escribe el valor de la tecla
  //   }
  // }


  // $('.nombreModificar').on('input', function () {      
    // this.value = this.value.replace(/[^0-9-I]/g,''); });
    
  $("#year").change(function(){
    var val = $(this).val();
    $("#nombrePr").val(val);
    if(val==""){
      $("#fechaA").removeAttr("min");
      $("#fechaA").removeAttr("max");
      $("#fechaC").removeAttr("min");
      $("#fechaC").removeAttr("max");
    }else{
      $("#fechaA").attr("min",val+"-01-01");
      $("#fechaA").attr("max",val+"-12-31");
      $("#fechaC").attr("min",val+"-01-01");
      $("#fechaC").attr("max",val+"-12-31");
    }
    $("#fechaA").val("");
    $("#fechaC").val("");
  });

  $(".yearModificar").change(function(){
    var id = $(this).attr("name");
    var val = $(this).val();
    // alert(val);
    // alert(id);
    $("#nombrePr"+id).val(val);
    if(val==""){
      $("#fechaA"+id).removeAttr("min");
      $("#fechaA"+id).removeAttr("max");
      $("#fechaC"+id).removeAttr("min");
      $("#fechaC"+id).removeAttr("max");
    }else{
      $("#fechaA"+id).attr("min",val+"-01-01");
      $("#fechaA"+id).attr("max",val+"-12-31");
      $("#fechaC"+id).attr("min",val+"-01-01");
      $("#fechaC"+id).attr("max",val+"-12-31");
    }
    $("#fechaA"+id).val("");
    $("#fechaC"+id).val("");
  });

  // $('#year').on('input', function () {      
    // this.value = this.value.replace(/[^0-9+ ]/g,''); });

  // $('yearModificar').on('input', function () {      
    // this.value = this.value.replace(/[^0-9+ ]/g,''); });

  $("#fechaA").change(function(){
    var fechaA = $(this).val();
    var fechaC = $("#fechaC").val();
    // var year = $("#year").val();
    if((fechaA!="") && (fechaC!="")){
      if(fechaA > fechaC){ $(this).val(fechaC); }
    }
    if(fechaA == ""){
      $("#fechaAP").html("Seleccione un fecha");
      $("#fechaC").removeAttr("min");
    }else{
      $("#fechaAP").html("");
      $("#fechaC").attr("min",fechaA);
    }
  });

  $(".fechaAModificar").change(function(){
    var id = $(this).attr("name");
    var fechaA = $(this).val();
    var fechaC = $("#fechaC"+id).val();
    if((fechaA!="") && (fechaC!="")){
      if(fechaA > fechaC){ $(this).val(fechaC); }
    }
    if(fechaA == ""){
      $("#fechaAP"+id).html("Seleccione un fecha");
      $("#fechaC"+id).removeAttr("min");
    }else{
      $("#fechaAP"+id).html("");
      $("#fechaC"+id).attr("min",fechaA);
    }
  });

  $("#fechaC").change(function(){
    var fechaC = $(this).val();
    var fechaA = $("#fechaA").val();
    // var year = $("year").val();
    if((fechaA!="") && (fechaC!="")){
      if(fechaC < fechaA){ $(this).val(fechaA); }
    }
    if(fechaC == ""){
      $("#fechaCP").html("Seleccione un fecha");
      $("#fechaA").removeAttr("max");
    }else{
      $("#fechaCP").html("");
      $("#fechaA").attr("max",fechaC);
    }
  });

  $(".fechaCModificar").change(function(){
    var id = $(this).attr("name");
    var fechaC = $(this).val();
    var fechaA = $("#fechaA"+id).val();
    if((fechaA!="") && (fechaC!="")){
      if(fechaC < fechaA){ $(this).val(fechaA); }
    }
    if(fechaC == ""){
      $("#fechaCP"+id).html("Seleccione un fecha");
      $("#fechaA"+id).removeAttr("max");
    }else{
      $("#fechaCP"+id).html("");
      $("#fechaA"+id).attr("max",fechaC);
    }
  });

  $("#guardar").click(function(){
    var url = $("#url").val();
    var response = validar();
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

            let numeroPr = $("#numeroPr").val();
            let yearPeriodo = $("#year").val();
            let fechaAP = $("#fechaA").val();
            let fechaAC = $("#fechaC").val();


         // alert(numeroPr + ' ' + yearPeriodo + ' ' + fechaAP + ' ' + fechaAC);

              $.ajax({
                url: url+'/Agregar',    
                type: 'POST',   
                data: {

                  Agregar: true,   
                  numeroPr: numeroPr,       
                  yearPeriodo: yearPeriodo,       
                  fechaAP: fechaAP,
                  fechaAC: fechaAC,
            
                },

                success: function(resp){
               // alert(resp);
                /*window.alert("Hola mundo");   
                console.log(resp); 
                  window.alert(resp);*/
                  var datos = JSON.parse(resp);     
                    if (datos.msj === "Good") {   
                      Swal.fire({
                        type: 'success',
                        title: '¡Registro Exitoso!',
                        text: 'Se ha agregado el periodo ' + yearPeriodo + '-' + numeroPr,
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      }).then((isConfirm) => {
                          location.reload();
                      } );
                    } 
                    if (datos.msj === "Repetido") {   
                      Swal.fire({
                        type: 'warning',
                        title: '¡Registro repetido!',
                        text: 'El periodo ' + yearPeriodo + '-' + numeroPr + ' ya esta agregado al sistema',
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
            let userMofif = $(this).val();
            //alert(userMofif);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                userNofifId: userMofif,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") {  
                 
                  $("#modificarButton"+userMofif).click(); 

                  /*
                  alert('Bienvenido');                    
                  console.log('Aquí estoy yo'); 
                  // console.log($(".cedula").val(Json['resp']));
                  Swal.fire({
                    type: 'success',
                    title: '¡Modificación Exitosa!',
                    text: 'Has modificado al usuario ' + user + ' al sistema',
                    footer: 'SCHSL',
                    timer: 3000,
                    showCloseButton: false,
                    showConfirmButton: false,
                    
                  });
                  */

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
    var response = validar(true, id);
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

              // let nombrePr = $("#nombrePr" + id).val();
              let numeroPr = $("#numeroPr" + id).val();
              let yearPeriodo = $("#year" + id).val();
              let fechaAP = $("#fechaA" + id).val();
              let fechaAC = $("#fechaC" + id).val();
                // alert(id + ' '+ nombrePr + ' ' + yearPeriodo + ' ' + fechaAP + ' ' + fechaAC);
              $.ajax({
                url: url+'/Modificar',    
                type: 'POST',   
                data: {
                  
                    Editar: true, 
                    id_periodo: id,   
                    numeroPr: numeroPr,       
                    yearPeriodo: yearPeriodo,       
                    fechaAP: fechaAP,
                    fechaAC: fechaAC,      
                
                },
                success: function(resp){
                    // alert(resp);
                  var datos = JSON.parse(resp);   
                  if (datos.msj === "Good") {   
                      Swal.fire({
                        type: 'success',
                        title: '¡Modificacion Exitosa!', 
                        text: 'Se ha modificado al periodo ' + yearPeriodo + '-'+ numeroPr + ' en el sistema', 
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      }).then((isConfirm) => {
                          location.reload();
                      } );
                    } 
                    if (datos.msj === "Repetido") {   
                      Swal.fire({
                        type: 'warning',
                        title: '¡Registro repetido!',
                        text: 'El periodo ' + yearPeriodo + '-'+ numeroPr + ' ya esta agregado al sistema',
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
          closeOnCancel: false,
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
                     
                      let userDelete = $(this).val();
                   

                      $.ajax({
                        url: url+'/Eliminar',    
                        type: 'POST',   
                        data: {
                        Eliminar: true,   
                   
                        userDelete: userDelete,
                        },
                        success: function(respuesta){       
                           // alert(respuesta);
                          var datos = JSON.parse(respuesta);
                          if (datos.msj === "Good"){   
                              
                              Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado el periodo',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            }).then((isConfirm) => {
                                location.reload();
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
      form = "#modalAgregarPeriodo";
    }else{
      form = "#modalModificarPeriodo"+id;
    }

    var year = $(form+" #year"+id).val();
    var ryear = false;
    if(year.length == 4){
      ryear = true;
      $(form+" #yearP"+id).html("");
    }else{
      $(form+" #yearP"+id).html("Debe ingresar el año del periodo");
    }


    var nombre = $(form+" #numeroPr"+id).val();
    var rnombre = false;
    if(nombre == ""){ 
      $(form+" #nombreP"+id).html("Debe ingresar el número de periodo");
    }else{
      rnombre = true;
      $(form+" #nombreP"+id).html("");
    }

    var fechaA = $(form+" #fechaA"+id).val();
    // alert(fechaA);
    var rfechaA = false;
    if(fechaA == ""){
      $(form+" #fechaAP"+id).html("Seleccione un fecha de apertura");
    }else{
      rfechaA = true;
      $(form+" #fechaAP"+id).html("");
    }

    var fechaC = $(form+" #fechaC"+id).val();
    // alert(fechaC);
    var rfechaC = false;
    if(fechaC == ""){
      $(form+" #fechaCP"+id).html("Seleccione un fecha de cierre");
    }else{
      rfechaC = true;
      $(form+" #fechaCP"+id).html("");
    }


    // alert(fechaA);
    // alert(fechaC);
    var rfechaV = false;
    if(fechaC < fechaA){
      $(form+" #fechaV"+id).html("La fecha final debe ser mayor a la fecha inicial");
    }else{
      rfechaV = true;
      $(form+" #fechaV"+id).html("");
    }

    var validado = false;
    if(rnombre==true  && ryear==true && rfechaA==true && rfechaC==true && rfechaV==true){
      validado=true;
    }else{
      validado=false;
    }
    // alert(validado);
    return validado;
}



</script>
</body>
</html>

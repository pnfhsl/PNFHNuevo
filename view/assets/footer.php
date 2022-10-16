<div class="box-cargando" style="background:rgba(0,0,0,.8);position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100vh;z-index:1100;text-align:center;display:none;color:#767676;">

<!-- <img src="assets/gifty/loading-11.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<!-- <img src="assets/gifty/loading-25.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<!-- <img src="assets/gifty/loading-22.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<!-- <img src="assets/gifty/loading-56.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<!-- <img src="assets/gifty/loading-102.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<!-- <img src="assets/gifty/loading-103.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->

<!-- <img src="assets/gifty/loading-14.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<!-- <img src="assets/gifty/loading-33.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->

<!-- <img src="assets/gifty/loading-4.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->

<img src="assets/gifty/loading-13.gif" alt="cargando" style="margin-top:15vh;max-height:100vh;max-width:100vh;width:30vh;">
<h3>Cargando . . .</h3> 


</div>

<style type="text/css">
.mensajeError{
	/*background: #A52A2A /*!important;*/
	color: #A52A2A !important; 
}</style>

<?php if(!empty($_GET['campaing'])){ ?>

<input type="hidden" value="<?php echo $_GET['campaing'] ?>" class='campaing'>

<?php } ?>

<?php if(!empty($_GET['n'])){ ?>

<input type="hidden" value="<?php echo $_GET['n'] ?>" class='num_campaing'>

<?php } ?>

<?php if(!empty($_GET['y'])){ ?>

<input type="hidden" value="<?php echo $_GET['y'] ?>" class='year_campaing'>

<?php } ?>

<?php if(!empty($_GET['dpid'])){ ?>

<input type="hidden" value="<?php echo $_GET['dpid'] ?>" class='despacho_id'>

<?php } ?>

<?php if(!empty($_GET['dp'])){ ?>

<input type="hidden" value="<?php echo $_GET['dp'] ?>" class='num_despacho'>

<?php } ?>
<footer class="main-footer">

    <div class="pull-right hidden-xs string">
        <input type="hidden" id="urlNotificaciones" value="<?=$this->encriptar(ucwords(mb_strtolower('Notificaciones'))); ?>">
      <b>Version</b> 2.0

    </div>

    <strong class="string">Copyright &copy; 2022-2023 <a>SCHSL</a>.</strong> <span class="string">Todos los derechos reservados.</span>

  </footer>
  <style type="text/css">
      body{
        margin-right:0 !important;
        width:100% !important;
      }
      .wrapper{
        margin-right:0 !important;
        width:100% !important;
      }
  </style>
<script>
$(document).ready(function(){

	if($(window).width() < 768){ // XS
        $(".logoTopMenu").attr("style","width:5vh;");
    }
    if($(window).width() >= 768 && $(window).width() < 992){ // SM
        $(".logoTopMenu").attr("style","width:5vh;");
    }
    if($(window).width() >= 992 && $(window).width() < 1200){ // MD
        $(".logoTopMenu").attr("style","width:8vh;");
    }
    if($(window).width() >= 1200){ // MD
        $(".logoTopMenu").attr("style","width:8vh;");
    }
    // $(".wrapper").attr("style","padding-right:0 !important;width:100% !important;");
    // $("body").attr("style","padding-right:0 !important;width:100% !important;");
    $(window).resize(function(){
        if($(window).width() < 768){ // XS
	        $(".logoTopMenu").attr("style","width:5vh;");
        }
        if($(window).width() >= 768 && $(window).width() < 992){ // SM
	        $(".logoTopMenu").attr("style","width:5vh;");
        }
        if($(window).width() >= 992 && $(window).width() < 1200){ // MD
	        $(".logoTopMenu").attr("style","width:8vh;");
        }
        if($(window).width() >= 1200){ // MD
	        $(".logoTopMenu").attr("style","width:8vh;");
        }
        // $(".wrapper").attr("style","padding-right:0 !important;width:100% !important;");
        // $("body").attr("style","padding-right:0 !important;width:100% !important;");
    });
    // $(window).scroll(function(){
    //     $(".wrapper").attr("style","padding-right:0 !important;width:100% !important;");
    //     $("body").attr("style","padding-right:0 !important;width:100% !important;");
    // });
    // $(".closeModal").click(function(){
    //     $(".wrapper").attr("style","padding-right:0 !important;width:100% !important;");
    //     $("body").attr("style","padding-right:0 !important;width:100% !important;");
    // });
    // NuevoPeriodo();
    CierrePeriodoSubidaNotas();
    // NotificacionVerificacionDeNotas();
    $(".lanzarNotificacion").click(function(){
        var id = $(this).attr("id");
        // alert(id);
        // alert('asd');
        $(".formNotificaciones"+id).submit();
    });
});
function NuevoPeriodo(){
    var url = $("#urlNotificaciones").val();
    $.ajax({
        url: url+'/NuevoPeriodo',    
        type: 'POST',  
        data: {
            Buscar: true,
        },
        success: function(respuesta){       
            // alert(respuesta);
            var resp = JSON.parse(respuesta);
            console.log(resp);
            // if (resp.msj == "Good") {
            //     var data = resp.data;
            //     var dataSaberes = "";
            //     if(resp.msjSaberes=="Good"){
            //         dataSaberes = resp.dataSaberes;
            //     }
            //     // console.log("DATA: ");
            //     // console.log(data);
            //     // console.log("SABERES: ");
            //     // console.log(dataSaberes);
            //     var html = '';
            //     html += '<option value="">Saber Complementario</option>';
            //     for (var i = 0; i < data.length; i++) {
            //         html += '<option value="'+data[i]['id_SC']+'" ';

            //         if(dataSaberes.length>0){
            //             for (var j = 0; j < dataSaberes.length; j++) {
            //                 if(dataSaberes[j]['id_SC']==data[i]['id_SC']){
            //                     html += 'disabled="disabled"';
            //                 }
            //             }
            //         }
                  
            //         html += ' >'+data[i]['nombreSC']+'</option>';
            //     }
            //     $("#saber").html(html);
            // }
            // if(resp.msj == "Vacio"){
            //     var html = '';
            //     html += '<option value="">Saber Complementario</option>';
            //     $("#saber").html(html);
            // }
        },
        error: function(respuesta){       
            // alert(respuesta);
            var resp = JSON.parse(respuesta);
            console.log(resp);
        }
    });
    // setTimeout("NuevoPeriodo()",2000);
}
function CierrePeriodoSubidaNotas(){
    var url = $("#urlNotificaciones").val();
    $.ajax({
        url: url+'/CierrePeriodoSubidaNotas',    
        type: 'POST',  
        data: {
            Buscar: true,
        },
        success: function(respuesta){       
            // alert(respuesta);
            // var resp = JSON.parse(respuesta);
            // console.log(resp);
        },
        error: function(respuesta){       
            // alert(respuesta);
            // var resp = JSON.parse(respuesta);
            // console.log(resp);
        }
    });
    // setTimeout("CierrePeriodoSubidaNotas()",2000);
}
function NotificacionVerificacionDeNotas(){
    var url = $("#urlNotificaciones").val();
    $.ajax({
        url: url+'/NotificacionVerificacionDeNotas',    
        type: 'POST',  
        data: {
            Buscar: true,
        },
        success: function(respuesta){       
            // alert(respuesta);
            // var resp = JSON.parse(respuesta);
            // console.log(resp);
        },
        error: function(respuesta){       
            // alert(respuesta);
            // var resp = JSON.parse(respuesta);
            // console.log(resp);
        }
    });
    // setTimeout("NotificacionVerificacionDeNotas()",2000);
}
</script>
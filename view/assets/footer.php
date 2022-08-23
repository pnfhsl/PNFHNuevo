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

      <b>Version</b> 2.0

    </div>

    <strong class="string">Copyright &copy; 2022-2023 <a>SCHSL</a>.</strong> <span class="string">Todos los derechos reservados.</span>

  </footer>

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
    });
});
</script>
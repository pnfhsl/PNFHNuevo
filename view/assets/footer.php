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
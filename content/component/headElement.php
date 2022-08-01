<?php	

	namespace content\component;

	class headElement {

		static public function Heading(){
				// <link rel="stylesheet" href="'._ROUTE_.'view/vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
			echo (
				'<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">

				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta name="author" content="Madelyn&Kppa">
				<meta name="description" content="Silkroad">

				<!--favicon-->
				<link rel="shortcut icon" type="image/k-icon" href="'._ROUTE_.'assets/img/ic.png" class="img-circle">

				<!--css-->
				<link rel="stylesheet" href="'._ROUTE_.'view/vendor/bower_components/bootstrap/dist/css/bootstrap.min.css">
				<link rel="stylesheet" href="'._ROUTE_.'view/vendor/bower_components/font-awesome/css/font-awesome.min.css">
				<link rel="stylesheet" href="'._ROUTE_.'view/vendor/bower_components/Ionicons/css/ionicons.min.css">
				<link rel="stylesheet" href="'._ROUTE_.'view/vendor/dist/css/AdminLTE.min.css">
				<link rel="stylesheet" href="'._ROUTE_.'view/vendor/dist/css/skins/_all-skins_style.css">
				<link rel="stylesheet" href="'._ROUTE_.'view/vendor/plugins/sweetalert/sweetalert.css">
				<link rel="stylesheet" href="'._ROUTE_.'view/vendor/plugins/select2/css/select2.css">
				<link rel="stylesheet" type="text/css" href="'._ROUTE_.'view/vendor/plugins/DataTables/DataTables/css/dataTables.bootstrap.css">
				<link rel="stylesheet" type="text/css" href="'._ROUTE_.'view/vendor/plugins/DataTables/DataTables/css/responsive.dataTables.min.css">

				<!--js-->
				<script src="'._ROUTE_.'view/vendor/bower_components/jquery/dist/jquery.min.js"></script>
				<script src="'._ROUTE_.'view/vendor/bower_components/bootstrap/dist/js/bootstrap.js"></script>
				<script src="'._ROUTE_.'view/vendor/dist/js/adminlte.js"></script>
				<script src="'._ROUTE_.'view/vendor/plugins/DataTables/datatables.js"></script>
				<script src="'._ROUTE_.'view/vendor/plugins/DataTables/DataTables/js/dataTables.bootstrap.js"></script>
				<script src="'._ROUTE_.'view/vendor/plugins/DataTables/DataTables/js/dataTables.responsive.min.js"></script>
				<script src="'._ROUTE_.'view/vendor/plugins/sweetalert/sweet-alert.js"></script>
				<script src="'._ROUTE_.'view/vendor/plugins/select2/js/select2.js"></script>
				<script src="'._ROUTE_.'view/assets/js/validacionCampos.js"></script>
				<script src="'._ROUTE_.'view/assets/js/volver.js"></script>


<script>
  $(document).ready(function(){
      var widthImage2 = $(".ReadlImage2").width();
      $(".imageImage2").attr("style","height:"+widthImage2+"px;width:"+widthImage2+"px");
      $(window).resize(function(){
        var widthImage2 = $(".ReadlImage2").width();
        $(".imageImage2").attr("style","height:"+widthImage2+"px;width:"+widthImage2+"px");
      }); 
  });
  $(function () {
    $(".datatable").DataTable({
      "language": {
        "url": "'._ROUTE_.'view/vendor/plugins/DataTables/spanish.json",
        "info": true,
      },
      responsive: true,
    });
    $(".datatable2").DataTable({
      "language": {
        "url": "'._ROUTE_.'view/vendor/plugins/DataTables/spanish.json",
      },
      "order": [[ 0, "desc" ]],
      responsive: true,
    });
    $("#datatable").DataTable({
      "language": {
        "url": "'._ROUTE_.'view/vendor/plugins/DataTables/spanish.json",
        "info": true,
      },
      responsive: true,
    });
    $("#datatable2").DataTable({
      "language": {
        "url": "'._ROUTE_.'view/vendor/plugins/DataTables/spanish.json",
      },
      "order": [[ 0, "desc" ]],
      responsive: true,
    });
    $("#mini-datatable").DataTable({
      "language": {
        "url": "'._ROUTE_.'view/vendor/plugins/DataTables/spanish.json",
        "info": true,
        "pageLength": 5,
      },
      responsive: true,
    });
    $("#datatableOrder").DataTable({
      "language": {
        "url": "'._ROUTE_.'view/vendor/plugins/DataTables/spanish.json",
      },
      "order": [[ 2, "desc" ],[ 3, "desc" ]],
      responsive: true,
    });
    $("#datatable3").DataTable({
      "paging"      : true,
      "lengthChange": false,
      "searching"   : false,
      "ordering"    : true,
      "info"        : true,
      "autoWidth"   : false
    });
    $(".select2").select2();
    $("input").attr("autocomplete","off");
    







  })
  
</script>
				'
			);
		}

	}


?>






				
				<!--
    var rolhidden = $(".rolhidden").val();
    if(rolhidden != "Vendedor"){
      verifyNotifyAdmin();
    }
    if(rolhidden == "Vendedor"){
      verifyNotifyVendedor();
    } 

    verPedidoPendiente();
    verPlanesAgregados();
    verTiempoDeDesperfectos();






    
				<script src="'._ROUTE_.'view/vendor/dist/js/pages/dashboard.js"></script>

				
				<link rel="stylesheet" href="'._ROUTE_.'view/vendor/bower_components/jvectormap/jquery-jvectormap.css">
				<script src="'._ROUTE_.'assets/js/adminlte.js"></script>
				<script src="'._ROUTE_.'assets/js/Foto.js"></script>
				<script src="'._ROUTE_.'assets/plugins/bootstrap/js/bootstrap.js"></script>

				<script>$.widget.bridge("uibutton", $.ui.button);</script>

				<script src="'._ROUTE_.'view/vendor/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
				<script src="'._ROUTE_.'view/vendor/bower_components/fastclick/lib/fastclick.js"></script>
 				
 				<script src="'._ROUTE_.'view/vendor/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
				<script src="'._ROUTE_.'view/vendor/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
				<script src="'._ROUTE_.'assets/plugins/jquery/jquery.min.js"></script>
				<script src="'._ROUTE_.'view/vendor/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
				<script src="'._ROUTE_.'view/vendor/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
				<script src="'._ROUTE_.'view/vendor/bower_components/moment/min/moment.min.js"></script>
				<script src="'._ROUTE_.'view/vendor/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
				<script src="'._ROUTE_.'view/vendor/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
				<script src="'._ROUTE_.'view/vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
				<script src="'._ROUTE_.'view/vendor/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
				<script src="'._ROUTE_.'view/vendor/bower_components/fastclick/lib/fastclick.js"></script>
				
				-->

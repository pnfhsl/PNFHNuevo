<?php 

$info = '<!DOCTYPE html>
<html>
<head>
  <title> '. _NAMESYSTEM_.' | Constancia de Aprobación</title>
  
</head>
<style>
*{
  font-size:1.010em;
}
</style>

<body class="">


  

  <div class="box-body">

    <section class="content">
      <div style="width:100%;display:inline-block;">
        <div style="width:100%;margin:auto;text-align:center;">
          <p style="width:100%;">
            <b style="font-family:arial;">
              REPÚBLICA BOLIVARIANA DE VENEUELA<br>MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN<br>UNIVERSIDAD POLITECNICA TERRITORIAL ANDRÉS ELOY BLANCO

            </b>
          </p>
          
          <p style="width:100%;margin-top:15%;">
            <b style="font-family:arial;">
              CONSTANCIA DE APROBACIÓN 

            </b>
          </p>

          <p style="width:75%;margin:auto;margin-top:5%;text-align:justify;">
              <span style="margin-left:5%;"> </span>Quien suscribe: Licenciado <b>Joan Perez</b>, C.I. V-18.690.684, encargado del departamento de HIGIENE Y SEGURIDAD LABORAL, ubicado en las instalaciones de la UPTAEB, estado Lara.
          </p>

          <p style="width:75%;margin:auto;margin-top:2%;text-align:justify;">
              <span style="margin-left:5%;"> </span>Por medio de la presente hago constar que el/la estudiante: <b>SAMUEL JOSÉ TORREALBA RIVERO</b>, C.I. V-27.736.916, aprobó con éxito los Saberes Complementarios correspondientes a la FASE I del TRAYECTO III, cursados en dicho PNF.
          </p>

          <p style="width:75%;margin:auto;margin-top:2%;text-align:justify;">
              <span style="margin-left:5%;"> </span>Constancia que se expide, por medio de la parte interesada, en Barquisimeto a los 26 días del mes de Mayo de 2022.
          </p>

          <p style="width:75%;margin:auto;margin-top:35%;text-align:justify;">
              <hr style="border-bottom:1px solid #000;width:35%;">
              Ldo. Joan Pérez<br>
              C.I. V-18.123.543<br>
              Encargado
          </p>
        </div>
      </div>
   

          
         
    </section>
  </div>
 




</body>
</html>';

  // echo $info;
  $this->dompdf->loadHtml($info);
  $this->dompdf->render();
  $this->dompdf->stream("Nota de entrega N. StyleCollection", array("Attachment" => false));

?>

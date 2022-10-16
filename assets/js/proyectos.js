$(document).ready(function(){ 
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
        $(".tamModals").attr("style","width:60%;margin-left:auto;margin-right:auto;text-align:left !important;");
    }
    $(window).resize(function(){
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
            $(".tamModals").attr("style","width:60%;margin-left:auto;margin-right:auto;text-align:left !important;");
        }
    });
    console.clear();
  $('#nombre').on('input', function () {      
    this.value = this.value.replace(/[^a-zA-Z Ñ ñ Á á É é Í í Ó ó Ú ú ]/g,''); });

  // $('#alumnos').on('input', function () {      
  //   this.value = this.value.replace(/[^a-zA-Z Ñ ñ Á á É é Í í Ó ó Ú ú ]/g,''); });
    
  $('#trayecto').change(function(){
    var url = $("#url").val();
    var trayecto = $(this).val();
    if(trayecto==""){
      var html = '';
      html += '<option value="">Seleccione una sección</option>';
      $("#seccion").html(html);

      var html2 = '';
      html2 += '<option disabled="" value="">Seleccione los alumnos</option>';
      $("#alumnos"+id).html(html2);

    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          secciones: true,   
          trayecto: trayecto,       
        },
        success: function(respuesta){
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            // console.log(data);
            // console.log($("#seccion").html());
            var html = '';
            html += '<option value="">Seleccione una sección</option>';
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['cod_seccion']+'">'+data[i]['nombre_seccion']+" ("+data[i]['year_periodo']+"-"+data[i]['nombre_periodo']+')</option>';
            }
            $("#seccion").html(html);

            var html2 = '';
            html2 += '<option disabled="" value="">Seleccione los alumnos</option>';
            $("#alumnos"+id).html(html2);

          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option value="">Seleccione una sección</option>';
            $("#seccion").html(html);

            var html2 = '';
            html2 += '<option disabled="" value="">Seleccione los alumnos</option>';
            $("#alumnos"+id).html(html2);
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

  $('.trayectoModificar').change(function(){

    var url = $("#url").val();
    var id = $(this).attr("name");
    var trayecto = $(this).val();
    if(trayecto==""){
      var html = '';
      html += '<option value="">Seleccione una sección</option>';
      $("#seccion"+id).html(html);

      var html2 = '';
      html2 += '<option disabled="" value="">Seleccione los alumnos</option>';
      $("#alumnos"+id).html(html2);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          secciones: true,   
          trayecto: trayecto,       
        },
        success: function(respuesta){       
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            // console.log(data);
            // console.log($("#seccion").html());
            var html = '';
            html += '<option value="">Seleccione una sección</option>';
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['cod_seccion']+'">'+data[i]['nombre_seccion']+" ("+data[i]['year_periodo']+"-"+data[i]['nombre_periodo']+')</option>';
            }
            $("#seccion"+id).html(html);

            var html2 = '';
            html2 += '<option disabled="" value="">Seleccione los alumnos</option>';
            $("#alumnos"+id).html(html2);

          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option value="">Seleccione una sección</option>';
            $("#seccion"+id).html(html);

            var html2 = '';
            html2 += '<option disabled="" value="">Seleccione los alumnos</option>';
            $("#alumnos"+id).html(html2);

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

  $('#seccion').change(function(){
    var url = $("#url").val();

    var seccion = $(this).val();
    if(seccion==""){
      var html = '';
      html += '<option disabled="" value="">Seleccione los alumnos</option>';
      $("#alumnos").html(html);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          alumnos: true,   
          cod_seccion: seccion,       
        },
        success: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            var dataProyectos = "";
            if(resp.msjProyectos=="Good"){
              dataProyectos = resp.dataProyectos;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("PROYECTOS: ");
            // console.log(dataProyectos);
            // console.log($("#alumnos").html());
            var html = '';
            html += '<option disabled="" value="">Seleccione los alumnos</option>';
            // alert(dataProyectos);
            // alert(dataProyectos);
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['id_SA']+'" ';

              if(dataProyectos.length>0){
                for (var j = 0; j < dataProyectos.length; j++) {
                  if(dataProyectos[j]['id_SA']==data[i]['id_SA']){
                    html += 'disabled="disabled"'
                  }
                }
              }
              
              html += ' >'+data[i]['cedula_alumno']+' '+data[i]['nombre_alumno']+' '+data[i]['apellido_alumno']+'</option>';
            }

            $("#alumnos").html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option disabled="" value="">Seleccione los alumnos</option>';
            $("#alumnos").html(html);
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
    if(seccion==""){
      var html = '';
      html += '<option disabled="" value="">Seleccione los alumnos</option>';
      $("#alumnos"+id).html(html);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          alumnos: true,   
          cod_seccion: seccion,       
        },
        success: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            var dataProyectos = "";
            if(resp.msjProyectos=="Good"){
              dataProyectos = resp.dataProyectos;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("PROYECTOS: ");
            // console.log(dataProyectos);
            // console.log($("#alumnos"+id).html());
            var html = '';
            html += '<option disabled="" value="">Seleccione los alumnos</option>';
            // alert(dataProyectos);
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['id_SA']+'" ';

              if(dataProyectos.length>0){
                for (var j = 0; j < dataProyectos.length; j++) {
                  if(dataProyectos[j]['id_SA']==data[i]['id_SA']){
                    if(dataProyectos[j]['cod_proyecto']==id){
                      html += 'selected="selected"'
                    }else{
                      html += 'disabled="disabled"'
                    }
                  }
                }
              }
              
              html += ' >'+data[i]['cedula_alumno']+' '+data[i]['nombre_alumno']+' '+data[i]['apellido_alumno']+'</option>';
            }

            $("#alumnos"+id).html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option disabled="" value="">Seleccione los alumnos</option>';
            $("#alumnos"+id).html(html);
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


  $("#alumnos").change(function(){
    var alumnos = $(this).val();
    var minimo = $("#minimoAlumnos").val();
    var maximo = $("#maximoAlumnos").val();
    // if (Object.keys($(this).val()).length > (maximo)) {
    //   $('option[value="' + $(this).val().toString().split(',')[maximo] + '"]').prop('selected', false);
    // }
    if(alumnos.length == 0){
      $("#alumnosE").html("Seleccione los alumnos para conformar el proyecto");
    }else{
      if(alumnos.length >= minimo && alumnos.length <= maximo ){
        ralumnos = true;
        $("#alumnosE").html("");
      }else{
        if(alumnos.length > (maximo)){
          // var xd = $(".boxalumnos .select2 .selection .select2-selection .select2-selection__rendered");
        }
        $("#alumnosE").html("Debe seleccionar entre "+minimo+" y "+maximo+" alumnos para conformar el proyecto");
      }
      var alumnos = $(this).val();
      console.log(alumnos);
    }
  });

  $(".modificarButtonModal").click(function(){

    var url = $("#url").val();
    var id = $(this).val();
    // alert(id);
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

            let nombre = $("#nombre"+id).val();     
            let trayecto = $("#trayecto"+id).val();
            let seccion = $("#seccion"+id).val();     
            let alumnos = $("#alumnos"+id).val();   
            let tutor = $("#tutor"+id).val();

           /* alert(id+" "+nombre+" "+trayecto+" "+seccion+" "+alumnos);
            console.log(alumnos);*/
            $.ajax({
              url: url+'/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,   
                codigo: id,   
                nombre: nombre,       
                trayecto: trayecto,
                seccion: seccion,
                alumnos: alumnos,
                tutor: tutor,
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
                      title: '¡Modificacion Exitosa!', 
                      text: 'Se ha modificado el proyecto en el sistema', 
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    }).then((isConfirm) => {
                        location.reload();
                    } );
                  } 
                  if (datos.msj === "Invalido") {
                      Swal.fire({
                          type: 'warning',
                          title: '¡Datos invalidos!',
                          text: 'Los datos ingresados son invalido',
                          footer: 'SCHSL',
                          timer: 3000,
                          showCloseButton: false,
                          showConfirmButton: false,
                      });
                  }
                  if (datos.msj === "Repetido") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Registro repetido!',
                      text: 'El proyecto ya esta agregado al sistema',
                      footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    });
                  }
                  if (datos.msj === "Error") {   
                    Swal.fire({
                      type: 'error',
                      title: '¡Error al guardar los cambio!',
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
            let cod_proyecto = $(this).val();
            // alert(cod_proyecto);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                cod_proyecto: cod_proyecto,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") {  
                  $("#modificarButton"+cod_proyecto).click(); 
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

  $(".cargarBtn").click(function(){
    var url = $("#url").val();
    swal.fire({ 
          title: "¿Desea listar los datos?",
          text: "Se mostraran los datos, ¿desea continuar?",
          type: "question",
          showCancelButton: true,
          confirmButtonText: "¡Si!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){            
            let cod_proyecto = $(this).val();
            $("#cargarButton"+cod_proyecto).click(); 
         

          }else { 
              swal.fire({
                  type: 'error',
                  title: '¡Proceso cancelado!',
              });
          } 
      });
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
                      var cod = $(this).val();
                      // alert(cod);
                      $.ajax({
                        url: url+'/Eliminar',    
                        type: 'POST',   
                        data: {
                          Eliminar: true,   
                          cod_proyecto: cod,
                        },
                        success: function(respuesta){       
                          // alert(respuesta);
                          var datos = JSON.parse(respuesta);
                          if (datos.msj === "Good") {   
                            Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado el proyecto ' + datos.data.titulo_proyecto + ' del sistema',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            }).then((isConfirm) => {
                                location.reload();
                            } );
                          } 
                          if (datos.msj === "Error") {   
                            Swal.fire({
                              type: 'error',
                              title: '¡Error al guardar los cambio!',
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


            let nombre = $("#nombre").val();     
            let trayecto = $("#trayecto").val();
            let seccion = $("#seccion").val();
            let alumnos = $("#alumnos").val();
            let tutor = $("#tutor").val();

            // alert(nombre + ' ' + seccion + ' ' + trayecto+ ' ' + alumnos);
              $.ajax({
                url: url+'/Agregar',
                type: 'POST',   
                data: {
                  Agregar: true,
                  nombre: nombre,
                  trayecto: trayecto,
                  seccion: seccion,
                  alumnos: alumnos,
                  tutor: tutor,
                },
                success: function(resp){
                  // alert(resp);
                // window.alert("Hola mundo");   
                // console.log(resp); 
                  // window.alert(resp);
                  var datos = JSON.parse(resp);     
                    if (datos.msj === "Good") {   
                      Swal.fire({
                        type: 'success',
                        title: '¡Registro Exitoso!',
                        text: 'Se ha agregado el proyecto ' + nombre + ' al sistema',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      }).then((isConfirm) => {
                          location.reload();
                      } );
                    } 
                    if (datos.msj === "Invalido") {
                      Swal.fire({
                          type: 'warning',
                          title: '¡Datos invalidos!',
                          text: 'Los datos ingresados son invalido',
                          footer: 'SCHSL',
                          timer: 3000,
                          showCloseButton: false,
                          showConfirmButton: false,
                      });
                    }
                    if (datos.msj === "Repetido") {   
                      Swal.fire({
                        type: 'warning',
                        title: '¡Registro repetido!',
                        text: 'El proyecto ' + nombre + ' ya esta agregado al sistema',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      });
                    }
                    if (datos.msj === "Error") {   
                      Swal.fire({
                        type: 'error',
                        title: '¡Error al guardar los cambio!',
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


});
function validar(modificar = false, id=""){
  var form = "";
  if(!modificar){
    form = "#modalAgregarSeccion";
  }else{
    form = "#modalModificarSeccion"+id;
  }

  var nombre = $(form+" #nombre"+id).val();
  var rnombre = false;
  if(nombre.length > 2){ 
    rnombre = true;
    $(form+" #nombreS"+id).html("");
  }else{
    $(form+" #nombreS"+id).html("Debe ingresar el nombre del proyecto");
  }

  

  var trayecto = $(form+" #trayecto"+id).val();
  var rtrayecto = false;
  if(trayecto == ""){
    $(form+" #trayectoS"+id).html("Seleccione un trayecto para el proyecto");
  }else{
    rtrayecto = true;
    $(form+" #trayectoS"+id).html("");
  }

  var seccion = $(form+" #seccion"+id).val();
  var rseccion = false;
  if(seccion == ""){
    $(form+" #seccionS"+id).html("Seleccione una sección para el proyecto");
  }else{
    rseccion = true;
    $(form+" #seccionS"+id).html("");
  }

  var alumno = $(form+" #alumnos"+id).val();    
  var ralumno = false;    
  if(alumno.length===0){     
    $(form+" #alumnosE"+id).html("Seleccione los alumnos para el proyecto");   
  }else{    
    var minimo = $("#minimoAlumnos").val();
    var maximo = $("#maximoAlumnos").val();
    if(alumno.length >= minimo && alumno.length <= maximo ){
      ralumno = true;     
      $(form+" #alumnosE"+id).html("");   
    }else{
      $(form+" #alumnosE"+id).html("Debe seleccionar entre "+minimo+" y "+maximo+" alumnos para conformar el proyecto");
    }
  }

  var tutor = $(form+" #tutor"+id).val();
  var rtutor = false;
  if(tutor == ""){
    $(form+" #tutorS"+id).html("Seleccione un tutor para el proyecto");
  }else{
    rtutor = true;
    $(form+" #tutorS"+id).html("");
  }


  var validado = false;
  if(rnombre==true && rtrayecto==true && rseccion==true && ralumno==true && rtutor==true){
    validado=true;
  }else{
    validado=false;
  }
  // alert(validado);
  return validado;
}
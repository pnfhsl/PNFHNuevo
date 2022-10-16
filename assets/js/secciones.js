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
    this.value = this.value.replace(/[^0-9 H S h s]/g,''); });
    // this.value = this.value.replace(/[^0-9- H h S s ]/g,''); });
  $('.nombreModificar').on('input', function () {      
    this.value = this.value.replace(/[^0-9 H S h s]/g,''); });
  $("#alumnos").change(function(){
    var alumnos = $(this).val();
    if(alumnos.length == 0){
      $("#alumnosS").html("Seleccione los alumnos para conformar la sección");
    }else{
      var minimo = $("#minimoAlumnos").val();
      var maximo = $("#maximoAlumnos").val();
      if(alumnos.length >= minimo && alumnos.length <= maximo ){
        ralumnos = true;
        $("#alumnosS").html("");
      }else{
        $("#alumnosS").html("Debe seleccionar entre "+minimo+" y "+maximo+" alumnos para conformar la sección");
      }
    }
  });

  $(".alumnosModificar").change(function(){
    var id = $(this).attr("name");
    var alumnos = $("#alumnos"+id).val();
    if(alumnos.length == 0){
      $("#alumnosS"+id).html("Seleccione los alumnos para conformar la sección");
    }else{
      var minimo = $("#minimoAlumnos").val();
      var maximo = $("#maximoAlumnos").val();
      if(alumnos.length >= minimo && alumnos.length <= maximo ){
        ralumnos = true;
        $("#alumnosS"+id).html("");
      }else{
        $("#alumnosS"+id).html("Debe seleccionar entre "+minimo+" y "+maximo+" alumnos para conformar la sección");
      }
    }
  }); 

  $("#periodo").change(function(){
    html = '';
    html += '<option value="" selected>Seleccione un trayecto</option>';
    html += '<option value="1">Trayecto I</option>';
    html += '<option value="2">Trayecto II</option>';
    html += '<option value="3">Trayecto III</option>';
    html += '<option value="4">Trayecto IV</option>';
    $('#trayecto').html(html);
    html2 = "";
    html2 += '<option disabled="" value="">Cargar Alumnos</option>';
    $("#alumnos").html(html2);
  });

  $('#trayecto').change(function(){
    var url = $("#url").val();
    var trayecto = $(this).val();
    var periodo = $("#periodo").val();
    if(trayecto==""){
      var html = '';
      html += '<option disabled="" value="">Cargar Alumnos</option>';
      $("#alumnos").html(html);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,
          alumnos: true,
          trayecto: trayecto,
          periodo: periodo,
        },
        success: function(respuesta){       
          // alert(respuesta);
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            var dataSecciones = "";
            if(resp.msjSecciones=="Good"){
              dataSecciones = resp.dataSecciones;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("SECCIONES: ");
            // console.log(dataSecciones);
            // console.log(data);
            // console.log($("#alumnos").html());
            var html = '';
            html += '<option disabled="" value="">Cargar Alumnos</option>';
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['cedula_alumno']+'"';
              if(dataSecciones.length>0){
                for (var j = 0; j < dataSecciones.length; j++) {
                  if((dataSecciones[j]['trayecto_alumno']==data[i]['trayecto_alumno']) && dataSecciones[j]['cedula_alumno']==data[i]['cedula_alumno']){
                    html += 'disabled="disabled"';
                  }
                }
              }
              html += '>'+data[i]['cedula_alumno']+" "+data[i]['nombre_alumno']+" "+data[i]['apellido_alumno']+'</option>';
            }
            $("#alumnos").html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option disabled="" value="">Cargar Alumnos</option>';
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

  $('.trayectoModificar').change(function(){
    var url = $("#url").val();

    var id = $(this).attr("name");
    // console.log(id);
    var trayecto = $(this).val();
    // alert(id);
    var periodo = $("#periodo"+id).val();
    // alert(periodo);
    if(trayecto==""){
      var html = '';
      html += '<option disabled="" value="">Cargar Alumnos</option>';
      $("#alumnos"+id).html(html);

    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          Buscar: true,   
          alumnos: true,   
          trayecto: trayecto,
          periodo: periodo,
        },
        success: function(respuesta){ 
          // alert(respuesta);
          var resp = JSON.parse(respuesta);   
          // alert(resp.msj);
          if (resp.msj == "Good") {  
            var data = resp.data;
            var dataSecciones = "";
            if(resp.msjSecciones=="Good"){
              dataSecciones = resp.dataSecciones;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("SECCIONES: ");
            // console.log(dataSecciones);
            // console.log(data);
            // console.log($("#alumnos"+id).html());
            var html = '';
            html += '<option disabled="" value="">Cargar Alumnos</option>';
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['cedula_alumno']+'"';
              if(dataSecciones.length>0){
                for (var j = 0; j < dataSecciones.length; j++) {
                  // if(dataSecciones[j]['cedula_alumno']==data[i]['cedula_alumno']){
                  if((dataSecciones[j]['trayecto_alumno']==data[i]['trayecto_alumno']) && dataSecciones[j]['cedula_alumno']==data[i]['cedula_alumno']){
                    if(dataSecciones[j]['cod_seccion']==id){
                      html += 'selected="selected"';
                    }else{
                      html += 'disabled="disabled"';
                    }
                  }
                }
              }
              html += '>'+data[i]['cedula_alumno']+" "+data[i]['nombre_alumno']+" "+data[i]['apellido_alumno']+'</option>';
            }
            $("#alumnos"+id).html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option disabled="" value="">Cargar Alumnos</option>';
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

  $(".modificarButtonModal").click(function(){
    var url = $("#url").val();
    var id = $(this).val();
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
            let periodo = $("#periodo"+id).val();     
            let trayecto = $("#trayecto"+id).val();
            let alumnos = $("#alumnos"+id).val();
            
            // alert(id + " " + nombre + " " + periodo + " " + trayecto + " ");
            // alert(id + " " + nombre + " " + periodo + " " + trayecto + " " + alumnos);

            $.ajax({
              url: url+'/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,   
                codigo: id,   
                seccion: nombre,       
                periodo: periodo,
                trayecto: trayecto,
                alumnos: alumnos,
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
                      text: 'Se ha modificado la seccion en el sistema', 
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
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                    });
                  }
                  if (datos.msj === "Repetido") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Registro repetido!',
                      text: 'La seccion ya esta agregada al sistema',
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
            let cod_seccion = $(this).val();
            // alert(cod_seccion);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                cod_seccion: cod_seccion,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") {  
                  $("#modificarButton"+cod_seccion).click(); 
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

  $(".CargarBtn").click(function(){
    var url = $("#url").val();
    swal.fire({ 
          title: "¿Desea listar los datos de los alumnos?",
          text: "Se mostraran los datos, ¿desea continuar?",
          type: "question",
          showCancelButton: true,
          confirmButtonText: "¡Si!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){            
            /*window.alert($(this).val());*/
            let cod_seccion = $(this).val();
             // alert(cod_seccion);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                cod_seccion: cod_seccion,       
              },
              success: function(respuesta){       
                 // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                 // alert(resp.msj);
                if (resp.msj == "Good") {  
                  $("#cargarButton"+cod_seccion).click(); 
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
                          cod_seccion: cod,
                        },
                        success: function(respuesta){       
                          // alert(respuesta);
                          var datos = JSON.parse(respuesta);
                          if (datos.msj === "Good") {   
                            Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado la seccion ' + datos.data.nombre_seccion + ' del sistema',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            }).then((isConfirm) => {
                                location.reload();
                            } );
                          } 
                          if (datos.msj === "Repetido") {   
                            Swal.fire({
                              type: 'warning',
                              title: '¡Registro repetido!',
                              text: 'La seccion cargada ya esta agregada al sistema',
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
            let periodo = $("#periodo").val();     
            let trayecto = $("#trayecto").val();   
            let alumnos = $("#alumnos").val();

            //alert(nombre + ' ' + periodo + ' ' + trayecto + ' '+ alumnos);
              $.ajax({
                url: url+'/Agregar',    
                type: 'POST',   
                data: {
                  Agregar: true,   
                  nombre: nombre,       
                  periodo: periodo,       
                  trayecto: trayecto,
                  alumnos: alumnos,

                },
                success: function(resp){
                  alert(resp);
                /*window.alert("Hola mundo");   
                console.log(resp); 
                  window.alert(resp);*/
                  var datos = JSON.parse(resp);     
                    if (datos.msj === "Good") {   
                      Swal.fire({
                        type: 'success',
                        title: '¡Registro Exitoso!',
                        text: 'Se ha agregado la seccion ' + nombre + ' al sistema',
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
                          footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      });
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
    $(form+" #nombreS"+id).html("Debe ingresar el nombre de la sección");
  }

  var periodo = $(form+" #periodo"+id).val();
  var rperiodo = false;
  if(periodo == ""){
    $(form+" #periodoS"+id).html("Seleccione el periodo para la sección");
  }else{
    rperiodo = true;
    $(form+" #periodoS"+id).html("");
  }

  var trayecto = $(form+" #trayecto"+id).val();
  var rtrayecto = false;
  if(trayecto == ""){
    $(form+" #trayectoS"+id).html("Seleccione un trayecto para la sección");
  }else{
    rtrayecto = true;
    $(form+" #trayectoS"+id).html("");
  }

  var alumnos = $(form+" #alumnos"+id).val();
  var ralumnos = false;
  // alert(alumnos.length);
  if(alumnos.length == 0){
    $(form+" #alumnosS"+id).html("Seleccione los alumnos para conformar la sección");
  }else{
    var minimo = $("#minimoAlumnos").val();
    var maximo = $("#maximoAlumnos").val();
    if(alumnos.length >= minimo && alumnos.length <= maximo ){
      ralumnos = true;
      $(form+" #alumnosS"+id).html("");
    }else{
      $(form+" #alumnosS"+id).html("Debe seleccionar entre "+minimo+" y "+maximo+" alumnos para conformar la sección");
    }
  }


  var validado = false;
  if(rnombre==true && rperiodo==true && rtrayecto==true && ralumnos==true){
    validado=true;
  }else{
    validado=false;
  }
  
  // alert(validado);
  return validado;
}
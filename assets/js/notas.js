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
    $(".tamModals").attr("style","width:70%;margin-left:auto;margin-right:auto;text-align:left !important;");
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
      $(".tamModals").attr("style","width:70%;margin-left:auto;margin-right:auto;text-align:left !important;");
    }
  });

  console.clear();
  
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
                          html += "<span><input type='number' class='form-control notasAlumnos' name='notasAlumnos[]' onkeyup='if( $(this).val() > 1.0 ){ $(this).val( ($(this).val()/10) ); $(this).focus(); }' onfocusout='if($(this).val()>=1){ $(this).val(1); } if($(this).val()<=0){ $(this).val(0); }' value='0' max='1' min='0' step='0.1' id='nota"+data[i]['cedula_alumno']+"' required oninput='this.value=this.value.replace(/[^0-9 .]/g,"+","+");' ></span>";
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
                          html += "<span><input type='number' class='form-control notasAlumnos' name='notasAlumnos[]' onkeyup='if( $(this).val() > 1.0 ){ $(this).val( ($(this).val()/10) ); $(this).focus(); }' onfocusout='if($(this).val()>=1){ $(this).val(1); } if($(this).val()<=0){ $(this).val(0); }' value='0' max='1' min='0' step='0.1' id='nota"+data[i]['cedula_alumno']+"' style='width:100%;' required oninput='this.value=this.value.replace(/[^0-9 .]/g,"+","+");'></span>";
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
                // console.log(resp); 
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
          title: "¿Desea Listar las notas?",
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
                // alert(resp);
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
                      text: 'El profesor ' + nombre + ' ' + apellido + ' ya esta agregado al sistema con la cedula '+cedula,
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
      if(notaAlumno[i] >= 0 && notaAlumno[i] <= 1){ 
        aNota[i] = 1;  
        $(form+" #notaS"+ids).html("");
      }else if (notaAlumno[i] < 0) {
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
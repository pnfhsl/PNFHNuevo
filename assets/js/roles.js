$(document).ready(function () {
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

 
  $(".checkboxopcion").change(function(){
    var val = $(this).val();
    if($(this)[0].checked==true){ // if(val=="off"){
      val = "on";
    }else if($(this)[0].checked==false){    // }else if(val=="on"){
      val = "off";
    }
    $(this).val(val);
  });

  $("#all").change(function(){
    var val = $(this).val();
    if($(this)[0].checked==true){ // if(val=="off"){
      val = "on";
    }else if($(this)[0].checked==false){    // }else if(val=="on"){
      val = "off";
    }
    $(this).val(val);
    var modulos = $('.json-modulos').html();
    var permisos = $('.json-permisos').html();
    modulos = JSON.parse(modulos);
    permisos = JSON.parse(permisos);
    for (var i = 0; i < modulos.length; i++) {
      for (var j = 0; j < permisos.length; j++) {
        idm = modulos[i]['id_modulo'];
        idp = permisos[j]['id_permiso'];
        var names = "m"+idm+"-p"+idp;
        $("#"+names).val(val);
        // console.log($("#"+names)[0].checked);
        // if($("#"+names)[0].checked==true){ // 
        if(val=="on"){
          // $("#"+names).removeAttr("checked");
        //}else if($("#"+names)[0].checked==false){ // 
          $("#"+names)[0].checked = true;
        }else if(val=="off"){
          $("#"+names)[0].checked = false;
          // $("#"+names).attr("checked","checked");
        }
      }
    }
  });

  $(".all_modif").change(function(){
    var id = $(this).attr("name");
    var val = $(this).val();
    if($(this)[0].checked==true){ // if(val=="off"){
      val = "on";
    }else if($(this)[0].checked==false){    // }else if(val=="on"){
      val = "off";
    }
    $(this).val(val);
    var modulos = $('.json-modulos').html();
    var permisos = $('.json-permisos').html();
    modulos = JSON.parse(modulos);
    permisos = JSON.parse(permisos);
    for (var i = 0; i < modulos.length; i++) {
      for (var j = 0; j < permisos.length; j++) {
        idm = modulos[i]['id_modulo'];
        idp = permisos[j]['id_permiso'];
        var names = "m"+idm+"-p"+idp+"_modif"+id;
        $("#"+names).val(val);
        // console.log($("#"+names)[0].checked);
        // if($("#"+names)[0].checked==true){ // 
        if(val=="on"){
          // $("#"+names).removeAttr("checked");
        //}else if($("#"+names)[0].checked==false){ // 
          $("#"+names)[0].checked = true;
        }else if(val=="off"){
          $("#"+names)[0].checked = false;
          // $("#"+names).attr("checked","checked");
        }
      }
    }
  });
  

  $('#nombre').on('input', function () {      
    this.value = this.value.replace(/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g,''); });

  $('.nombreModificar').on('input', function () {      
    this.value = this.value.replace(/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g,''); });

  $("#guardar").click(function(){
    var url = $("#url").val();
    var response = validar();
    if(response){

      var modulos = $('.json-modulos').html();
      var permisos = $('.json-permisos').html();
      modulos = JSON.parse(modulos);
      permisos = JSON.parse(permisos);
      var names = Array();
      var ops = Array();
      var modul = Array();
      var perm = Array();
      var x = 0;
      var idm;
      var idp;
      var options = Array();
      for (var i = 0; i < modulos.length; i++) {
        for (var j = 0; j < permisos.length; j++) {
          idm = modulos[i]['id_modulo'];
          idp = permisos[j]['id_permiso'];
          names[x] = "m"+idm+"-p"+idp;
          ops[x] =  $("#"+names[x]).val();
          modul[x] = idm;
          perm[x] = idp;
          x++;
        }
      }
      options = [names, ops, modul, perm];
      // console.log(options);

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
            // alert(nombre);
            // alert(options);
            // console.log(nombre);
            // console.log(options);
          /*alert(cedula + ' ' + nombre + ' ' + apellido + ' ' + especialidad);*/
              $.ajax({
                url: url+'/Agregar',    
                type: 'POST',   
                data: {
                  Agregar: true,   
                  nombre: nombre,
                  accesos: options,  
                },
                success: function(resp){
                  // console.log(resp); 
                  // alert(resp);
                  var datos = JSON.parse(resp);     
                  if (datos.msj === "Good") {   
                    Swal.fire({
                      type: 'success',
                      title: '¡Registro Exitoso!',
                      text: 'Se ha agregado el rol ' + nombre + ' al sistema',
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
                      text: 'El rol ' + nombre + ' ya esta agregado al sistema',
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

  $(".modificarButtonModal").click(function(){
    var url = $("#url").val();
    var id = $(this).val();
    var response = validar(true, id);
    if(response){
      var modulos = $('.json-modulos').html();
      var permisos = $('.json-permisos').html();
      modulos = JSON.parse(modulos);
      permisos = JSON.parse(permisos);
      var names = Array();
      var ops = Array();
      var modul = Array();
      var perm = Array();
      var x = 0;
      var idm;
      var idp;
      var options = Array();
      for (var i = 0; i < modulos.length; i++) {
        for (var j = 0; j < permisos.length; j++) {
          idm = modulos[i]['id_modulo'];
          idp = permisos[j]['id_permiso'];
          names[x] = "m"+idm+"-p"+idp+"_modif"+id;
          ops[x] =  $("#"+names[x]).val();
          modul[x] = idm;
          perm[x] = idp;
          x++;
        }
      }
      options = [names, ops, modul, perm];
      // console.log(options);

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

            $.ajax({
              url: url+'/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,   
                id: id,   
                nombre: nombre,
                accesos: options,

              },
              success: function(resp){
              // console.log(resp); 
                // alert(resp);
              /*window.alert("Hola mundo");   
                window.alert(resp);*/
                var datos = JSON.parse(resp);   
                if (datos.msj === "Good") {   
                  Swal.fire({
                    type: 'success',
                    title: '¡¡Modificacion Exitosa!', 
                    text: 'Se ha modificado el rol ' + nombre + ' en el sistema', 
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
                    text: 'El rol ' + nombre + ' ya esta agregado al sistema con la cedula '+cedula,
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
            let userNofif = $(this).val();
            // alert(userNofif);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                userNofif: userNofif,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") {  
                  $("#modificarButton"+userNofif).click(); 

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

  $(".CargarBtn").click(function(){
    var url = $("#url").val();
    swal.fire({ 
          title: "¿Desea cargar los datos del rol?",
          text: "Se movera a la tabla para cargar los datos, ¿desea continuar?",
          type: "question",
          showCancelButton: true,
          confirmButtonText: "¡Si!",
          cancelButtonText: "No", 
          closeOnConfirm: false,
          closeOnCancel: false 
      }).then((isConfirm) => {
          if (isConfirm.value){            
            /*window.alert($(this).val());*/
            let userNofif = $(this).val();
            // alert(userNofif);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                userNofif: userNofif,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") {  
                  $("#mostrarButton"+userNofif).click(); 

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
                          console.log(respuesta);
                          var datos = JSON.parse(respuesta);
                          if (datos.msj === "Good") {   
                            Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado al rol ' + datos.data.nombre_rol + ' del sistema',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            }).then((isConfirm) => {
                                location.reload();
                            } );
                          } 
                          // if (datos.msj === "Repetido") {   
                          //   Swal.fire({
                          //     type: 'warning',
                          //     title: '¡Registro repetido!',
                          //     text: 'El rol ' + nombre + ' ya esta agregado al sistema',
                          //     footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                          //   });
                          // }
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
});  

function validar(modificar = false, id=""){
  var form = "";
  if(!modificar){
    form = "#modalAgregarRoles";
  }else{
    form = "#modalModificarRoles"+id;
  }

  var nombre = $(form+" #nombre"+id).val();
  var rnombre = false;
  if(nombre.length > 2){ 
    rnombre = true;
    $(form+" #nombreS"+id).html("");
  }else{
    $(form+" #nombreS"+id).html("Debe ingresar el nombre del rol");
  }


  var validado = false;
  if(rnombre==true){
    validado=true;
  }else{
    validado=false;
  }
  return validado;
}
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

  $('#nombre').on('input', function () { 
    this.value = this.value.replace(/[^0-9 a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g,''); });

  $('.nombreModificar').on('input', function () {      
    this.value = this.value.replace(/[^0-9 a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g,''); });

  $('#pass').on('input', function () {      
    this.value = this.value.replace(/^[a-z0-9_-]{$/,''); });

  $(".cont").click(function(){
    var id = $(this).val();
    // alert($(".optpass"+id).val());
    $(".contadorBoxPassword").click();
  });

  $(".contadorBoxPassword").click(function(){
    var id = $(this).val();
    if ($(".optpass"+id).val() == 1) {
      $(".optpass"+id).val(0);
    }else if ($(".optpass"+id).val() == 0) {
      $(".optpass"+id).val(1);
    }
  });


  $('#rol').change(function(){
    var url = $("#url").val();
    var id_rol = $(this).val();
    if(id_rol==""){
      var html = '';
      html += '<option value="">Seleccionar usuario</option>';
      $("#cedula").html(html);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          BuscarSegunRol: true,   
          id_rol: id_rol,       
        },
        success: function(respuesta){       
          // alert(respuesta);
          console.log(respuesta);
          var resp = JSON.parse(respuesta);
          console.log(resp);
          if (resp.msj == "Good") {
            var data = resp.data;
            var dataUsuario = "";
            if(resp.msjUsuario=="Good"){
              dataUsuario = resp.dataUsuario;
            }
            console.log("DATA: ");
            console.log(data);
            console.log("USUARIOS: ");
            console.log(dataUsuario);
            var html = '';
            html += '<option value="">Seleccionar usuario</option>';
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['codigo']+'" ';

              if(dataUsuario.length>0){
                for (var j = 0; j < dataUsuario.length; j++) {
                  if(dataUsuario[j]['cedula_usuario']==data[i]['codigo']){
                    html += 'disabled="disabled"'
                  }
                }
              }
              
              html += ' >C.I.: '+data[i]['cedula']+' '+data[i]['nombre']+' '+data[i]['apellido']+'</option>';
            }
            $("#cedula").html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option value="">Seleccionar usuario</option>';
            $("#cedula").html(html);
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

  $('.rolModificar').change(function(){
    var id = $(this).attr("name");
    var url = $("#url").val();
    var id_rol = $(this).val();
    if(id_rol==""){
      var html = '';
      html += '<option value="">Seleccionar usuario</option>';
      $("#cedula"+id).html(html);
    }else{
      $.ajax({
        url: url+'/Buscar',    
        type: 'POST',  
        data: {
          BuscarSegunRol: true,   
          id_rol: id_rol,       
        },
        success: function(respuesta){       
          // alert(respuesta);
          console.log(respuesta);
          var resp = JSON.parse(respuesta);
          // console.log(resp);
          if (resp.msj == "Good") {
            var data = resp.data;
            var dataUsuario = "";
            if(resp.msjUsuario=="Good"){
              dataUsuario = resp.dataUsuario;
            }
            // console.log("DATA: ");
            // console.log(data);
            // console.log("USUARIOS: ");
            // console.log(dataUsuario);
            var html = '';
            html += '<option value="">Seleccionar usuario</option>';
            for (var i = 0; i < data.length; i++) {
              html += '<option value="'+data[i]['codigo']+'" ';

              if(dataUsuario.length>0){
                for (var j = 0; j < dataUsuario.length; j++) {
                  if(dataUsuario[j]['cedula_usuario']==data[i]['codigo']){
                    if(dataUsuario[j]['cedula_usuario']==id){
                      html += 'selected="selected"'
                    }else{
                      html += 'disabled="disabled"'
                    }
                  }
                }
              }
              
              html += ' >C.I.: '+data[i]['cedula']+' '+data[i]['nombre']+' '+data[i]['apellido']+'</option>';
            }
            $("#cedula"+id).html(html);
          }
          if(resp.msj == "Vacio"){
            var html = '';
            html += '<option value="">Seleccionar usuario</option>';
            $("#cedula"+id).html(html);
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

  $("#cedula").change(function(){
    var cedula = $(this).val();
    if(cedula == ""){
      $("#cedulaS").html("Seleccione un cedula");
    }else{
      $("#cedulaS").html("");
    }
  });

  $(".cedulaModificar").change(function(){
    var id = $(this).attr("name");
    var cedula = $(this).val();
    if(cedula == ""){
      $("#cedulaS"+id).html("Seleccione un cedula");
    }else{
      $("#cedulaS"+id).html("");
    }
  });
  $(".nuevoPassword").keyup(function(){
    var id = $(this).attr("name");
    var pass1 = $("#nuevoPassword"+id).val();
    var pass2 = $("#confirmarPassword"+id).val();
    // alert(id);
    // alert(pass1);
    // alert(pass2);
    if(pass1.trim()!=""){
      $("#nombreP"+id).html("");
    }
    if(pass1 == pass2){
      $("#nombrePC"+id).html("Las contraseñas coinciden");
      $("#nombrePC"+id).attr("style","color:green !important");
    }else{
      $("#nombrePC"+id).html("Las contraseñas no coinciden");
      $("#nombrePC"+id).removeAttr("style");
    }
  });
  $(".confirmarPassword").keyup(function(){
    var id = $(this).attr("name");
    var pass1 = $("#nuevoPassword"+id).val();
    var pass2 = $("#confirmarPassword"+id).val();
    if(pass2.trim()!=""){
      $("#nombrePC"+id).html("");
      $("#nombrePC"+id).removeAttr("style");
    }
    if(pass1 == pass2){
      $("#nombrePC"+id).html("Las contraseñas coinciden");
      $("#nombrePC"+id).attr("style","color:green !important");
    }else{
      $("#nombrePC"+id).html("Las contraseñas no coinciden");
      $("#nombrePC"+id).removeAttr("style");
    }
  });


  $("#guardar").click(function(){
    var url = $("#url").val();
    // alert('hola');

    var response = validar();
    // alert(response);
    if (response) {
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

          let rol = $("#rol").val();     
          let cedula = $("#cedula").val();     //Se capturan la informacion en las variables user y password 
          let user = $("#nombre").val();
          let pass = $("#nuevoPassword").val();
          // alert(rol + ' ' + cedula + ' ' + user + ' ' + pass);
          //alert(url);
        
        $.ajax({
            url: url + '/Agregar',    
            type: 'POST',   
            data: {
              Agregar: true,   
              rol: rol,       
              cedula: cedula,       
              user: user,       
              pass: pass,
            },
            success: function(respuesta){       
              // alert(respuesta);
              var data = JSON.parse(respuesta);    
              if (data.msj === "Good") {   
                Swal.fire({
                  type: 'success',
                  title: '¡Registro Exitoso!',
                  text: 'Has agregado al usuario ' + user + ' al sistema',
                  footer: 'SCHSL',
                  timer: 4000,
                  showCloseButton: false,            
                  showConfirmButton: false,
                }).then((isConfirm) => {
                  location.reload();
                });
              }
              if (data.msj === "Repetido") {   
                  Swal.fire({
                    type: 'warning',
                    title: '¡Registro repetido!',
                    text: 'El alumno ' + nombre + ' ' + apellido + ' ya esta agregado al sistema',
                    footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                  });
              }
              if (data.msj === "Error") {   
                  Swal.fire({
                    type: 'error',
                    title: '¡Error la guardar los cambio!',
                    text: 'Intente de nuevo, si el error persiste por favor contacte con el soporte',
                    footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                  });
              }
              if (data.msj === "Vacio") {   
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
    }
      
    // alert("Hola mundo");
    // alert(rol + '  '  + cedula + ' ' + user + ' ' + pass);

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
            let userModif = $(this).val();
            // alert(userModif);
            $.ajax({
              url: url+'/Buscar',    
              type: 'POST',  
              data: {
                Buscar: true,   
                userModif: userModif,       
              },
              success: function(respuesta){       
                // alert(respuesta); 
                var resp = JSON.parse(respuesta);   
                // alert(resp.msj);
                if (resp.msj == "Good") {  
                  $("#modificarButton"+userModif).click(); 
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
    // alert(id);
    
    var response = validar(true, id);
    /*console.log(response);
    window.alert(response);*/
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
            // alert('Hello');
            let rol = $("#rol"+id).val();     
            let cedula = $("#cedula"+id).val();     
            let nombre = $("#nombre"+id).val();     
            let nuevoPassword = $("#nuevoPassword"+id).val();     
            let confirmarPassword = $("#confirmarPassword"+id).val();     
            // alert( rol + ' ' + cedula + ' ' + nombre);
            // alert( nuevoPassword + ' ' + confirmarPassword);

            /*if (nuevoPassword == confirmarPassword) {
              let password = nuevoPassword;
              alert(password + 'hola');
            }*/
            
            $.ajax({
              url: url+'/Modificar',    
              type: 'POST',   
              data: {
                Editar: true,   
                codigo: id,   
                cedula: cedula, 
                nombre: nombre,   
                rol: rol,
                nuevoPassword: nuevoPassword,

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
                        text: 'Se ha modificado el usuario ' + nombre + ' en el sistema',
                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                      }).then((isConfirm) => {
                          location.reload();
                      } );
                  } 
                  if (datos.msj === "Repetido") {   
                    Swal.fire({
                      type: 'warning',
                      title: '¡Registro repetido!',
                      text: 'El usuaro ' + nombre + ' ya esta agregado al sistema con la cedula '+cedula,
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
                          var datos = JSON.parse(respuesta);
                          // alert(datos.msj);
                          if (datos.msj === "Good") {   
                            Swal.fire({
                              type: 'success',
                              title: 'Eliminación Exitosa',
                              text: 'Se ha eliminado el usuario ' + datos.data.nombre_usuario + ' del sistema',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            }).then((isConfirm) => {
                                location.reload();
                            } );
                          }
                          if (datos.msj === "Repetido") {   
                            Swal.fire({
                              type: 'warning',
                              title: '¡Registro repetido!',
                              text: 'El usuario ' + userDelete + ' ya esta agregado al sistema',
                              footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                            });
                          }
                          if (datos.msj === "Error") {   
                            Swal.fire({
                              type: 'error',
                              title: '¡Error la guardar los cambios!',
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
    // var id = $("#modalModificarModulo").val(); 
    if(!modificar){
      form = "#modalAgregarUsuario";
    }else{
      form = "#modalModificarUsuario"+id;
       // alert(form);
    }
    var nombre = $(form+" #nombre"+id).val();
    // alert(nombre);
    var rnombre = false;
    if(nombre.length > 2){ 
      rnombre = true;
      $(form+" #nombreM"+id).html("");
    }else{
      $(form+" #nombreM"+id).html("Debe ingresar el nombre del usuario");
    }

    var rol = $(form+" #rol"+id).val();
    // alert(rol);
    var rrol = false;
    if(rol == ""){
      $(form+" #rolS"+id).html("Seleccione un rol");
    }else{
      rrol = true;
      $(form+" #rolS"+id).html("");
    }

    var cedula = $(form+" #cedula"+id).val();
    // alert(cedula);
    var rcedula = false;
    if(cedula == ""){
      $(form+" #cedulaS"+id).html("Seleccione un usuario");
    }else{
      rcedula = true;
      $(form+" #cedulaS"+id).html("");
    }

    var optionPass = $(".optpass"+id).val();
    if (optionPass==1) {

      var pass = $(form+" #nuevoPassword"+id).val();
      var passConfirm = $(form+" #confirmarPassword"+id).val();
      var rpass = false;
      if (pass.trim() != "" && passConfirm.trim() != "") {
        if(pass == passConfirm){ 
          $(form+" #nombrePC"+id).html("");  
            rpass = true;
        }else{
          $(form+" #nombrePC"+id).html("Las contraseñas deben ser iguales");
           rpass = false;
        }   
      }else{
        if(pass.trim()==""){
          $(form+" #nombreP"+id).html("Debe ingresar su nueva contraseña");
        }
        if(passConfirm.trim()==""){
          $(form+" #nombrePC"+id).html("Debe ingresar y confirmar su nueva contraseña");
        }
        rpass = false;
      }
      // alert(rpass);
    }else{
      var rpass = true;
    }
    // $("#cont").click(function(){
      
    // });
 


    var validado = false;
    if(rnombre==true && rpass==true && rrol==true && rcedula==true && rpass==true){
      validado=true;
    }else{
      validado=false;
    }
    // alert(validado);
    return validado;
}
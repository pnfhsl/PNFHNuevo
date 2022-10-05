$(document).ready(function () {

  if ($(window).width() < 768) { // XS
    $(".tamModals").attr("style", "width:95%;margin-left:auto;margin-right:auto;text-align:left !important;");
  }
  if ($(window).width() >= 768 && $(window).width() < 992) { // SM
    $(".tamModals").attr("style", "width:85%;margin-left:auto;margin-right:auto;text-align:left !important;");
  }
  if ($(window).width() >= 992 && $(window).width() < 1200) { // MD
    $(".tamModals").attr("style", "width:70%;margin-left:auto;margin-right:auto;text-align:left !important;");
  }
  if ($(window).width() >= 1200) { // MD
    $(".tamModals").attr("style", "width:60%;margin-left:auto;margin-right:auto;text-align:left !important;");
  }
  $(window).resize(function () {
    if ($(window).width() < 768) { // XS
      $(".tamModals").attr("style", "width:95%;margin-left:auto;margin-right:auto;text-align:left !important;");
    }
    if ($(window).width() >= 768 && $(window).width() < 992) { // SM
      $(".tamModals").attr("style", "width:85%;margin-left:auto;margin-right:auto;text-align:left !important;");
    }
    if ($(window).width() >= 992 && $(window).width() < 1200) { // MD
      $(".tamModals").attr("style", "width:70%;margin-left:auto;margin-right:auto;text-align:left !important;");
    }
    if ($(window).width() >= 1200) { // MD
      $(".tamModals").attr("style", "width:60%;margin-left:auto;margin-right:auto;text-align:left !important;");
    }
  });

  console.clear();


  $(".modificarBtn").click(function () {
    // alert('Ajax');
    let url = $("#url").val();
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
      if (isConfirm.value) {
        let userModif = $(this).val();
        $("#modificarButton" + userModif).click();
      }

    });
  });

  $(".modificarButtonModal").click(function () {
    var url = $("#url").val();
    var id = $(this).val();
    var response = validarModificarPerfil(id);
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
        if (isConfirm.value) {
          // alert('Hello');     
          let cedula = $("#cedula" + id).val();
          let nombre = $("#nombre" + id).val();
          let apellido = $("#apellido" + id).val();
          let telefono = $("#telefono" + id).val();
          let correo = $("#correo" + id).val();
          let trayecto = $("#trayecto").val();
          // let rol = $("#rol").val();
          // alert(correo);
          // alert(cedula + ' ' + nombre + ' ' + apellido + ' ' +telefono);

          $.ajax({
            url: url + '/Modificar',
            type: 'POST',
            data: {
              Editar: true,
              codigo: id,
              cedula: cedula,
              nombre: nombre,
              apellido: apellido,
              telefono: telefono,
              correo: correo,
              trayecto: trayecto,

            },
            success: function (resp) {
              // alert(resp);
              // console.log(resp);
              var datos = JSON.parse(resp);
              // console.log(datos.exec.msj);
              // console.log(datos.email.msj);
              // alert(datos);
              if (datos.exec.msj === "Good" && datos.email.msj === "Good") {
                Swal.fire({
                  type: 'success',
                  title: '¡Modificacion Exitosa!',
                  text: 'Se ha modificado el usuario ' + nombre + ' ' + apellido + ' en el sistema',
                  footer: 'SCHSL',
                  timer: 3000,
                  showCloseButton: false,
                  showConfirmButton: false,
                }).then((isConfirm) => {
                  location.reload();
                });
              }
              if (datos.msj === "Repetido") {
                Swal.fire({
                  type: 'warning',
                  title: '¡Registro repetido!',
                  text: 'El usuario ' + nombre + ' ' + apellido + ' ya esta agregado al sistema con la cedula ' + cedula,
                  footer: 'SCHSL',
                  timer: 3000,
                  showCloseButton: false,
                  showConfirmButton: false,
                });
              }
              if (datos.msj === "Error") {
                Swal.fire({
                  type: 'error',
                  title: '¡Error al guardar los cambio!',
                  text: 'Intente de nuevo, si el error persiste por favor contacte con el soporte',
                  footer: 'SCHSL',
                  timer: 3000,
                  showCloseButton: false,
                  showConfirmButton: false,
                });
              }
              if (datos.msj === "Vacio") {
                Swal.fire({
                  type: 'warning',
                  title: '¡Debe rellenar todos los campos!',
                  footer: 'SCHSL',
                  timer: 3000,
                  showCloseButton: false,
                  showConfirmButton: false,
                });
              }
            },
            error: function (respuesta) {
              var datos = JSON.parse(respuesta);
              console.log(datos);

            }

          });
        } else {
          swal.fire({
            type: 'error',
            title: '¡Proceso cancelado!',
          });
        }
      });
    }
  });



  $(".modificarBtnContraseña").click(function () {

    let url = $("#url").val();
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
      if (isConfirm.value) {

        // let userMofif = $(this).val();
        let userMofif = $(this).attr("id");
        $("#modificarButtonC" + userMofif).click();


      }

    });
  });


  $(".modificarButtonModalC").click(function () {
    var url = $("#url").val();
    var urlHome = $("#urlHome").val();
    // console.log("llego aquí");
    let user = $("#usuario").val();
    let pass = $("#password").val();
    // alert(user);
    // alert(pass);
    $.ajax({
      url: url + '/Verificar',
      type: 'POST',
      data: {
        ValidarContraseña: true,
        username: user,
        password: pass,
      },
      success: function (respuesta) {
        // alert(respuesta);
        console.log(respuesta);
        var data = JSON.parse(respuesta);
        // console.log(data);
        // alert(data.msj);

        if (data.msj === "Good") {
          // alert("hola");
          // let userModif = $(this).val();
          $("#modificarButtonContraseña").click();
          // $("#modificarButtonContraseña" + userModif).click();
          // $("#modalModificarPerfilContraseñaLista").click();
          console.log("entre aquí");


        }


        if (data.msj === "Usuario o contraseña invalido!") {
          Swal.fire({
            type: 'warning',
            title: '¡Usuario o contraseña inválido',
            text: 'El nombre de usuario y la contraseña no coinciden',
            footer: 'SCHSL',
            timer: 3500,
            showCloseButton: false,
            showConfirmButton: false,
          });
        }


      },
    });
  });


  $(".modificarButtonModalContraseñaLista").click(function () {
    var url = $("#url").val();
    var id = $(this).val();
    // alert(id);

    var response = validarContras(id);
    /*console.log(response);
    window.alert(response);*/
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
        if (isConfirm.value) {
          // alert('Hello');
          let rol = $("#rol").val();
          let cedula = $("#cedula" + id).val();
          let nombre = $("#usuario").val();
          let nuevoPassword = $("#nuevoPassword").val();
          let confirmarPassword = $("#confirmarPassword").val();
          let correo = $("#correoHiddenContras").val();
          // let pass = $("#password").val();    
          // alert( cedula + ' ' + nombre + ' ' + rol );
          // alert( nuevoPassword + ' ' + confirmarPassword);

          // if (nuevoPassword == confirmarPassword) {
          //   let password = nuevoPassword;
          //   alert(password + 'hola');
          // }

          $.ajax({
            url: url + '/ModificarUsuario',
            type: 'POST',
            data: {
              Editar: true,
              codigo: id,
              cedula: cedula,
              nombre: nombre,
              correo: correo,
              // password: pass,  
              rol: rol,
              nuevoPassword: nuevoPassword,

            },
            success: function (resp) {
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
                });
              }
              if (datos.msj === "Repetido") {
                Swal.fire({
                  type: 'warning',
                  title: '¡Registro repetido!',
                  text: 'El usuaro ' + nombre + ' ya esta agregado al sistema con la cedula ' + cedula,
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
            error: function (respuesta) {
              var datos = JSON.parse(respuesta);
              console.log(datos);

            }

          });
        } else {
          swal.fire({
            type: 'error',
            title: '¡Proceso cancelado!',
          });
        }
      });
    }
  });


  $(".modificarFotoBtn").click(function () {
    // alert('Ajax');
    let url = $("#url").val();
    // alert("llego aquí");
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
      if (isConfirm.value) {
        // console.log("entro aquí");
        let userModif = $(this).val();
        $("#modificarFotoButton" + userModif).click();
      }

    });
  });

  $("#imagen").click(function () {
    let url = $("#url").val();
    // alert(img);
    // alert(url);
    var formData = new FormData($(form_data)[0]);
    // console.log(formData);
    $.ajax({
      url: url + '/Guardar',
      type: 'POST',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (resp) {
        // alert(resp);
        var data = JSON.parse(resp);
        // console.log(data.msj);
        if (data.msj === "Good") {
          Swal.fire({
            type: 'success',
            title: '¡Imagen Modificada!',
            text: 'La imagen se ha modificado exitosamente',
            footer: 'SCHSL',
            timer: 3000,
            showCloseButton: false,
            showConfirmButton: false,
          }).then((isConfirm) => {
            location.reload();
          });
        } else {
          Swal.fire({
            type: 'warning',
            title: '¡Error al modificar la imagen!',
            text: 'No se ha podido modificar la imagen ',
            footer: 'SCHSL',
            timer: 3000,
            showCloseButton: false,
            showConfirmButton: false,
          })
        }

      },
      error: function (respuesta) {
        var datos = JSON.parse(respuesta);
        console.log(datos);
      }
    });
  });

  $('#file-input').on('change', function () {
    var name = $(this).get(0).files[0].name;
    $('#archivoSeleccionado').text(name);

  });


  $('.telefonoModificar').on('input', function () {
    var id = $(this).attr("name");
    // var ids = $(this).attr("id");
    // var index = ids.indexOf(" ");
    // var id = ids.substring(index+1);
    this.value = this.value.replace(/[^0-9+ ]/g, '');
    if (this.value.length >= 11 && this.value.length <= 11) {
      $("#telefonoS" + id).html("");
    } else {
      $("#telefonoS" + id).html("El número de celular debe contener 11 caracteres");
    }
  });


  $('.correoModificar').on('input', function () {
    var id = $(this).attr("name");
    // var ids = $(this).attr("id");
    // var index = ids.indexOf(" ");
    // var id = ids.substring(index+1);
    this.value = this.value.replace(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,4}\.[0-9]{1,4}\.[0-9]{1,4}\.[0-9]{1,4}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{4,6}))$/, '');
    let pos1 = this.value.indexOf("@");
    let pos = this.value.indexOf(".com");
    if ((pos > 1) && (pos1 > 1) && (pos > pos1)) {
      let maxleng = this.value.length;
      $(this).attr("maxlength", maxleng);
      $("#correoS" + id).html("");
    } else {
      $("#correoS" + id).html("Ingresar una dirección de correo electronico valida");
      $(this).attr("maxlength", "");
    }
  });


  $(".correoModificar").blur(function () {
    var url = $("#url").val();
    var id = $(this).attr("name");
    var correo = $(this).val().trim();
    $.ajax({
      url: url + '/Verificar',
      type: 'POST',
      data: {
        VerificarUnicoCorreo: true,
        correo: correo,
        id: id,
      },
      success: function (respuesta) {
        // alert(respuesta); 
        var resp = JSON.parse(respuesta);
        if (resp.msj == "Good") {
          var valido = resp.valido;
          $("#valcorreo" + id).val(valido);
          if (valido == "1") {
            $("#correoS" + id).html("");
          }
          if (valido == "0") {
            $("#correoS" + id).html("Correo electrónico ya esta siendo utilizado");
          }
        }
      },
      error: function (respuesta) {
        var resp = JSON.parse(respuesta);
        console.log(resp);
      }
    });
  });



  // $(".nuevoPassword").keyup(function () {
  //   // var id = $(this).attr("name");
  //   var pass1 = $("#nuevoPassword").val();
  //   var pass2 = $("#confirmarPassword").val();
  //   // alert(id);
  //   // alert(pass1);
  //   // alert(pass2);
  //   if (pass1.trim() != "") {
  //     $("#nombreP").html("");
  //   }
  //   if (pass1 == pass2) {
  //     $("#nombrePC").html("Las contraseñas coinciden");
  //     $("#nombrePC").attr("style", "color:green !important");
  //   } else {
  //     $("#nombrePC").html("Las contraseñas no coinciden");
  //     $("#nombrePC").removeAttr("style");
  //   }
  // });
  // $(".confirmarPassword").keyup(function () {
  //   // var id = $(this).attr("name");
  //   var pass1 = $("#nuevoPassword").val();
  //   var pass2 = $("#confirmarPassword").val();
  //   if (pass2.trim() != "") {
  //     $("#nombrePC").html("");
  //     $("#nombrePC").removeAttr("style");
  //   }
  //   if (pass1 == pass2) {
  //     $("#nombrePC").html("Las contraseñas coinciden");
  //     $("#nombrePC").attr("style", "color:green !important");
  //   } else {
  //     $("#nombrePC").html("Las contraseñas no coinciden");
  //     $("#nombrePC").removeAttr("style");
  //   }
  // });

  $(".nuevoPassword").keyup(function(){
    var pass = $("#nuevoPassword").val();
    var rpass = checkPassword(pass);
    var passConfirm = $("#confirmarPassword").val();
    var rpassConfirm = checkPassword(passConfirm);
    if (rpass == true && rpassConfirm == true) {
      if(pass == passConfirm){ 
        $("#nombrePC").html("");  
        $("#nombrePC").html("Las contraseñas coinciden");
        $("#nombrePC").attr("style","color:green !important");
      }else{
        $("#nombrePC").html("Las contraseñas deben ser iguales");
        $("#nombrePC").removeAttr("style");
      }   
    }else{
      if(rpass==false){
        if(pass.trim()==""){
          $("#nombreP").html("Debe ingresar su nueva contraseña");
        }else{
          $("#nombreP").html("La contraseña debe contener al menos 8 digitos, una letra en minuscula, una letra en mayuscula, un numero y un caracter especial");
        }
      }else{
        $("#nombreP").html("");
      }
      if(rpassConfirm==false){
        if(passConfirm.trim()==""){
          $("#nombrePC").html("Debe confirmar su nueva contraseña");
        }else{
          $("#nombrePC").html("Al confirmar la contraseña debe contener al menos 8 digitos, una letra en minuscula, una letra en mayuscula, un numero y un caracter especial");
        }
      }else{
        $("#nombrePC").html("");
      }
    }
  });

  $(".confirmarPassword").keyup(function(){
    var pass = $("#nuevoPassword").val();
    var rpass = checkPassword(pass);
    var passConfirm = $("#confirmarPassword").val();
    var rpassConfirm = checkPassword(passConfirm);
    if (rpass == true && rpassConfirm == true) {
      if(pass == passConfirm){ 
        $("#nombrePC").html("");  
        $("#nombrePC").html("Las contraseñas coinciden");
        $("#nombrePC").attr("style","color:green !important");
      }else{
        $("#nombrePC").html("Las contraseñas deben ser iguales");
        $("#nombrePC").removeAttr("style");
      }   
    }else{
      if(rpass==false){
        if(pass.trim()==""){
          $("#nombreP").html("Debe ingresar su nueva contraseña");
        }else{
          $("#nombreP").html("La contraseña debe contener al menos 8 digitos, una letra en minuscula, una letra en mayuscula, un numero y un caracter especial");
        }
      }else{
        $("#nombreP").html("");
      }
      if(rpassConfirm==false){
        if(passConfirm.trim()==""){
          $("#nombrePC").html("Debe confirmar su nueva contraseña");
        }else{
          $("#nombrePC").html("Al confirmar la contraseña debe contener al menos 8 digitos, una letra en minuscula, una letra en mayuscula, un numero y un caracter especial");
        }
      }else{
        $("#nombrePC").html("");
      }
    }
  });

  $("#username").blur(function () {
    var url = $("#url").val();
    var id = $(this).attr("name");
    var username = $(this).val().trim();
    // alert(username);
    $.ajax({
      url: url + '/Verificar',
      type: 'POST',
      data: {
        VerificarUnicoUsername: true,
        username: username,
        id: id,
      },
      success: function (respuesta) {
        // alert(respuesta); 
        var resp = JSON.parse(respuesta);
        // console.log(resp);
        if (resp.msj == "Good") {
          var valido = resp.valido;
          $("#valusuario").val(valido);
          if (valido == "1") {
            $("#usuarioS").html("");
          }
          if (valido == "0") {
            $("#usuarioS").html("Nombre de usuario ya esta siendo utilizado");
          }
        }
      },
      error: function (respuesta) {
        var resp = JSON.parse(respuesta);
        console.log(resp);
      }
    });
  });

});

function checkPassword(str){
  var re = /^(?=.*\d)(?=.*[!@#$%^/&.*+-])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  return re.test(str);
}

function validarModificarPerfil(id = "") {
  var form = "#modalModificarPerfil" + id;

  var cedula = $(form + " #cedula" + id).val();
  var rcedula = false;
  if (cedula.length >= 8 && cedula.length <= 8) {
    $(form + " #cedulaS" + id).html("");
    rcedula = true;
  } else {
    $(form + " #cedulaS" + id).html("La cedula debe contener 8 caracteres");
  }

  var nombre = $(form + " #nombre" + id).val();
  var rnombre = false;
  if (nombre.length > 2) {
    rnombre = true;
    $(form + " #nombreS" + id).html("");
  } else {
    $(form + " #nombreS" + id).html("Debe ingresar el nombre del alumno");
  }

  var apellido = $(form + " #apellido" + id).val();
  var rapellido = false;
  if (apellido.length > 2) {
    rapellido = true;
    $(form + " #apellidoS" + id).html("");
  } else {
    $(form + " #apellidoS" + id).html("Debe ingresar el apellido del alumno");
  }

  var telefono = $(form + " #telefono" + id).val();
  var rtelefono = false;
  // alert(telefono);
  if (telefono.length >= 11 && telefono.length <= 11) {
    $(form + " #telefonoS" + id).html("");
    rtelefono = true;
  } else {
    $(form + " #telefonoS" + id).html("La telefono debe contener 11 caracteres");
  }

  var correo = $(form + " #correo" + id).val();
  var rcorreo = false;
  var pos1 = correo.indexOf("@");
  var pos = correo.indexOf(".com");
  if ((pos > 1) && (pos1 > 1) && (pos > pos1)) {
    var maxleng = correo.length;
    $(this).attr("maxlength", maxleng);
    $(form + " #correoS" + id).html("");
    rcorreo = true;
  } else {
    $(form + " #correoS" + id).html("Ingresar una direccion de correo electronico valida");
    $(this).attr("maxlength", "");
  }

  var valcorreo = $(".valcorreo" + id).val();
  if (nombre.trim().length > 0) {
    if (valcorreo == "1") {
      $("#correoS").html("");
    }
    if (valcorreo == "0") {
      $("#correoS").html("Correo electrónico ya esta siendo utilizado");
    }
  }

  var validado = false;
  if (rcedula == true && rnombre == true && rapellido == true && rtelefono == true && rcorreo == true && valcorreo == "1") {
    validado = true;
  } else {
    validado = false;
  }

  return validado;
}

function validarContras(id = "") {
  var form = "#modalModificarPerfilContraseñaLista" + id;


  var nombre = $(form + " #username").val();
  // alert(nombre);
  var rnombre = false;
  if (nombre.length > 2) {
    rnombre = true;
    $(form + " #usuarioS").html("");
  } else {
    $(form + " #usuarioS").html("Debe ingresar el nombre del usuario");
  }

  // var pass = $(form + " #nuevoPassword").val();
  // var passConfirm = $(form + " #confirmarPassword").val();
  // var rpass = false;
  // if (pass.trim() != "" && passConfirm.trim() != "") {
  //   if (pass == passConfirm) {
  //     $(form + " #nombrePC").html("");
  //     rpass = true;
  //   } else {
  //     $(form + " #nombrePC").html("Las contraseñas deben ser iguales");
  //     rpass = false;
  //   }
  // } else {
  //   if (pass.trim() == "") {
  //     $(form + " #nombreP").html("Debe ingresar su nueva contraseña");
  //   }
  //   if (passConfirm.trim() == "") {
  //     $(form + " #nombrePC").html("Debe ingresar y confirmar su nueva contraseña");
  //   }
  //   rpass = false;
  // }
  var pass = $(form + " #nuevoPassword").val();
  var rpass = checkPassword(pass);
  var passConfirm = $(form + " #confirmarPassword").val();
  var rpassConfirm = checkPassword(passConfirm);
  // alert(rpass);
  // alert(rpassConfirm);
  var rpass3 = false;
  if (rpass == true && rpassConfirm == true) {
    // var rpass = false;
    // if (pass.trim() != "" && passConfirm.trim() != "") {
    if(pass == passConfirm){ 
      $(form+" #nombrePC"+id).html("");  
        // rpass = true;
        rpass3 = true;
    }else{
      $(form+" #nombrePC"+id).html("Las contraseñas deben ser iguales");
        rpass3 = false;
       // rpass = false;
    }   
  }else{
    if(rpass==false){
      if(pass.trim()==""){
        // alert('Pass Esta vacio');
        $(form+" #nombreP"+id).html("Debe ingresar su nueva contraseña");
      }else{
        // alert('Pass No esta vacio');
        $(form+" #nombreP"+id).html("La contraseña debe contener al menos 8 digitos, una letra en minuscula, una letra en mayuscula, un numero y un caracter especial");
      }
    }
    if(rpassConfirm==false){
      if(passConfirm.trim()==""){
        // alert('PassConfirm Esta vacio');
        $(form+" #nombrePC"+id).html("Debe confirmar su nueva contraseña");
      }else{
        // alert('PassConfirm No esta vacio');
        $(form+" #nombreP"+id).html("Al confirmar la contraseña debe contener al menos 8 digitos, una letra en minuscula, una letra en mayuscula, un numero y un caracter especial");
      }
    }

    // rpass = false;
  }


  var valnombre = $(".valusuario").val();
  if (nombre.trim().length > 0) {
    if (valnombre == "1") {
      $("#usuarioS").html("");
    }
    if (valnombre == "0") {
      $("#usuarioS").html("Nombre de usuario ya esta siendo utilizado");
    }
  }

  // alert("DAta: "+nombre+ " | "+rnombre);
  // alert("DAta: "+pass+ " | "+rpass);
  // alert("DAta: "+valnombre);

  var validado = false;
  if (rnombre == true && rpass == true && rpassConfirm == true && rpass3 == true && valnombre == "1") {
    validado = true;
  } else {
    validado = false;
  }
  // alert(validado);
  return validado;
}
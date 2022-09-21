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
    // alert(id);
    // var response = validar(true, id);
    /*console.log(response);
    window.alert(response);*/
    // alert(response);
    // if(response){
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
            console.log(resp);
            var datos = JSON.parse(resp);
            console.log(datos.exec.msj);
            console.log(datos.email.msj);
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
                title: '¡Error la guardar los cambio!',
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
    // }
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
        // alert('xd');
        let userMofif = $(this).attr("id");
        // alert(userMofif);
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
        // console.log(respuesta);
        var data = JSON.parse(respuesta);
        // alert(data.msj);

        if (data.msj === "Good") {
          // console.log(data.data[0].cedula_usuario);
          // alert("hola");
          // let userModif = $(this).val();
          let cedula = data.data[0].cedula_usuario;

          $(".closemodificarButtonC"+cedula).click();
          $("#modificarButtonContraseña"+cedula).click();

          // $("#modificarButtonContraseña" + userModif).click();
          // $("#modalModificarPerfilContraseñaLista").click();
          // console.log("entre aquí");


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
  $(".modificarButtonFoto").click(function () {


    let frm = document.getElementById('frm_registrar');
    let formData= new FormData(frm);

            // $.ajax({
            //   url: url + '/Funciones',
            // type: 'POST',
            // data: {
            //   cache:false,
            //   processData: false,
            //   contentType:false,
            //   success:{e} => {

            //   
  
    
        // let rol = $("#rol").val();
        // alert(correo);
        // alert(cedula + ' ' + nombre + ' ' + apellido + ' ' +telefono);

        $.ajax({
        
                  url: url + '/Funciones',
                  type: 'POST',
                  data: {
                  cache:false,
                  processData: false,
                  contentType:false,

          },
          success: function (resp) {
            // alert(resp);
            console.log(resp); 
            var datos = JSON.parse(resp);
            console.log(datos.exec.msj); 
            console.log(datos.email.msj); 
            // alert(datos);
            if (datos.exec.msj === "Good" && datos.email.msj === "Good" ) {
              Swal.fire({
                type: 'success',
                title: '¡Modificacion Exitosa!',
                // text: 'Se ha modificado el usuario ' + nombre + ' ' + apellido + ' en el sistema',
                footer: 'SCHSL',
                timer: 3000,
                showCloseButton: false,
                showConfirmButton: false,
              }).then((isConfirm) => {
                location.reload();
              });
            }
            // if (datos.msj === "Repetido") {
            //   Swal.fire({
            //     type: 'warning',
            //     title: '¡Registro repetido!',
            //     text: 'El usuario ' + nombre + ' ' + apellido + ' ya esta agregado al sistema con la cedula ' + cedula,
            //     footer: 'SCHSL',
            //     timer: 3000,
            //     showCloseButton: false,
            //     showConfirmButton: false,
            //   });
            // }
            if (datos.msj === "Error") {
              Swal.fire({
                type: 'error',
                title: '¡Error la guardar los cambio!',
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
    
    
  });



});

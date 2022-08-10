$(document).ready(function () {

    console.clear();

    $("#subir").click(function (e) {
        e.preventDefault();

        if ($("#file-input").get(0).files.length == 0) {
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: '¡Debe seleccionar un archivo!',
                footer: 'SCHSL',
                timer: 3000,
                showCloseButton: false,
                showConfirmButton: false,
            });
            return 0;
        }
        if ($("#file-input").get(0).files.length > 1) {
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: '¡No puede seleccionar más de un archivo!',
                footer: 'SCHSL',
                timer: 3000,
                showCloseButton: false,
                showConfirmButton: false,
            });
            return 0;
        }
        var extesiones_permitidas = [".xls", ".xlsx"];
        var input_file = $("#file-input");
        var exp_reg = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + extesiones_permitidas.join('|') + ")$");

        console.log(exp_reg);
        console.log(input_file.val());

        if (!exp_reg.test(input_file.val().toLowerCase())) {
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Debe seleccionar un archivo con extensión .xls o .xlsx',
                footer: 'SCHSL',
                timer: 3000,
                showCloseButton: false,
                showConfirmButton: false,
            });
            return false;
        }

        var formData = new FormData($(form_data)[0]);
        console.log(formData);
        $("#subir").attr('disabled', true);
        // console.log($("#subir").attr('disabled', true));

        $.ajax({
            url: 'Profesores/Cargar',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                //  alert(respuesta);
                console.log('hola');
                var datos = JSON.parse(respuesta);
                if (datos.msj === "Good") {
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Se han cargado los datos de los profesores exitosamente',
                        footer: 'SCHSL',
                        timer: 3000,
                        showCloseButton: false,
                        showConfirmButton: false,
                    }).then((isConfirm) => {
                        location.reload();
                    });
                } else {
                    alert('probando');
                    Swal.fire({
                        position: 'center',
                        type: 'danger',
                        title: 'No se han cargado los datos de los profesores',
                        footer: 'SCHSL',
                        timer: 3000,
                        showCloseButton: false,
                        showConfirmButton: false,
                    }).then((isConfirm) => {
                        location.reload();
                    });
                }
            }

        });

    });

    $('#file-input').on('change', function () {
        name = $(this).get(0).files[0].name;
        $('#archivoSeleccionado').text(name);

    });

    $('#cedula').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
        if (this.value.length >= 8 && this.value.length <= 8) {
            $("#cedulaS").html("");
        } else {
            $("#cedulaS").html("La cédula debe contener 8 caracteres");
        }
    });


    $('.cedulaModificar').on('input', function () {
        var id = $(this).attr("name");
        // var ids = $(this).attr("id");
        // var index = ids.indexOf(" ");
        // var id = ids.substring(index+1);
        this.value = this.value.replace(/[^0-9]/g, '');
        // alert(this.value);
        if (this.value.length >= 8 && this.value.length <= 8) {
            $("#cedulaS" + id).html("");
        } else {
            $("#cedulaS" + id).html("La cédula debe contener 8 caracteres");
        }
    });



    // $('#cedula').on('input', function () {      
    //   this.value = this.value.replace(/[^0-9]/g,''); });

    $('#nombre').on('input', function () {
        // alert("ASDASd");
        this.value = this.value.replace(/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g, '');
    });
    $('.nombreModificar').on('input', function () {
        this.value = this.value.replace(/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g, '');
    });

    $('#apellido').on('input', function () {
        this.value = this.value.replace(/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g, '');
    });

    $('.apellidoModificar').on('input', function () {
        this.value = this.value.replace(/[^a-zA-Z ñ Ñ Á á É é Í í Ó ó Ú ú ]/g, '');
    });



    $('#telefono').on('input', function () {
        this.value = this.value.replace(/[^0-9+ ]/g, '');
        if (this.value.length >= 11 && this.value.length <= 11) {
            $("#telefonoS").html("");
        } else {
            $("#telefonoS").html("El numero de celular debe contener 11 caracteres");
        }
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
            $("#telefonoS" + id).html("El numero de celular debe contener 11 caracteres");
        }
    });



    $("#guardar").click(function () {
        let url = $("#url").val();
        var response = validar();
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


                    let cedula = $("#cedula").val();
                    let nombre = $("#nombre").val();
                    let apellido = $("#apellido").val();
                    let telefono = $("#telefono").val();

                    /*alert(cedula + ' ' + nombre + ' ' + apellido + ' ' + especialidad);*/
                    $.ajax({
                        url: url + '/Agregar',
                        type: 'POST',
                        data: {
                            Agregar: true,
                            cedula: cedula,
                            nombre: nombre,
                            apellido: apellido,
                            telefono: telefono,
                        },
                        success: function (resp) {
                            // alert(resp);
                            /*window.alert("Hola mundo");   
                            console.log(resp); 
                              window.alert(resp);*/
                            var datos = JSON.parse(resp);
                            if (datos.msj === "Good") {
                                Swal.fire({
                                    type: 'success',
                                    title: '¡Registro Exitoso!',
                                    text: 'Se ha agregado al profesor ' + nombre + ' ' + apellido + ' al sistema',
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
                                    text: 'El profesor ' + nombre + ' ' + apellido + ' ya esta agregado al sistema',
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
        }

    });


    $(".modificarBtn").click(function () {
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
                /*window.alert($(this).val());*/
                let userMofif = $(this).val();
                // alert(userMofif);
                $.ajax({
                    url: url + '/Buscar',
                    type: 'POST',
                    data: {
                        Buscar: true,
                        userNofif: userMofif,
                    },
                    success: function (respuesta) {
                        // alert(respuesta); 
                        var resp = JSON.parse(respuesta);
                        // alert(resp.msj);
                        if (resp.msj == "Good") {
                            $("#modificarButton" + userMofif).click();

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
                    error: function (respuesta) {
                        // alert(respuesta);
                        var resp = JSON.parse(respuesta);
                        console.log(resp);

                    }

                });




            } else {
                swal.fire({
                    type: 'error',
                    title: '¡Proceso cancelado!',
                });
            }
        });
    });

    $(".modificarButtonModal").click(function () {
        let url = $("#url").val();
        var id = $(this).val();
        // alert(id);
        var response = validar(true, id);
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

                    let cedula = $("#cedula" + id).val();
                    let nombre = $("#nombre" + id).val();
                    let apellido = $("#apellido" + id).val();
                    let telefono = $("#telefono" + id).val();


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
                        },
                        success: function (resp) {
                            // alert(resp);
                            /*window.alert("Hola mundo");   
                            console.log(resp); 
                              window.alert(resp);*/
                            var datos = JSON.parse(resp);
                            if (datos.msj === "Good") {
                                Swal.fire({
                                    type: 'success',
                                    title: '¡Modificacion Exitosa!',
                                    text: 'Se ha modificado al profesor ' + nombre + ' ' + apellido + ' en el sistema',
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
                                    text: 'El profesor ' + nombre + ' ' + apellido + ' ya esta agregado al sistema con la cedula ' + cedula,
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
        }

    });

    $(".eliminarBtn").click(function () {
        let url = $("#url").val();
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
            if (isConfirm.value) {

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
                    if (isConfirm.value) {
                        /*window.alert($(this).val());*/
                        let userDelete = $(this).val();
                        $.ajax({
                            url: url + '/Eliminar',
                            type: 'POST',
                            data: {
                                Eliminar: true,
                                userDelete: userDelete,
                            },
                            success: function (respuesta) {
                                // alert(respuesta);
                                var datos = JSON.parse(respuesta);
                                if (datos.msj === "Good") {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Eliminación Exitosa',
                                        text: 'Se ha eliminado al profesor ' + datos.data.nombre_profesor + ' ' + datos.data.apellido_profesor + ' ya cuya cédula es ' + userDelete + ' del sistema',
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
                                        text: 'El profesor ' + nombre + ' ' + apellido + ' ya esta agregado al sistema',
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
                                var data = JSON.parse(respuesta);
                                console.log(data);

                            }

                        });
                    } else {
                        swal.fire({
                            type: 'error',
                            title: '¡Proceso cancelado!',
                            confirmButtonColor: "#ED2A77",
                        });
                    }
                });

            } else {
                swal.fire({
                    type: 'error',
                    title: '¡Proceso cancelado!',
                    confirmButtonColor: "#ED2A77",
                });
            }
        });
    });
});


function validar(modificar = false, id = "") {
    var form = "";
    if (!modificar) {
        form = "#modalAgregarProf";
    } else {
        form = "#modalModificarProf" + id;
    }

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
        $(form + " #nombreS" + id).html("Debe ingresar el nombre del profesor");
    }

    var apellido = $(form + " #apellido" + id).val();
    var rapellido = false;
    if (apellido.length > 2) {
        rapellido = true;
        $(form + " #apellidoS" + id).html("");
    } else {
        $(form + " #apellidoS" + id).html("Debe ingresar el apellido del profesor");
    }

    // var correo = $(form + " #correo" + id).val();
    // var rcorreo = false;

    // var pos1 = correo.indexOf("@");
    // var pos = correo.indexOf(".com");
    // if ((pos > 1) && (pos1 > 1) && (pos > pos1)) {
    //     var maxleng = correo.length;
    //     $(this).attr("maxlength", maxleng);
    //     $(form + " #correoS" + id).html("");
    //     rcorreo = true;
    // } else {
    //     $(form + " #correoS" + id).html("Ingresar una direccion de correo electronico valida");
    //     $(this).attr("maxlength", "");
    // }

    var telefono = $(form + " #telefono" + id).val();
    var rtelefono = false;
    if (telefono.length >= 11 && telefono.length <= 11) {
        $(form + " #telefonoS" + id).html("");
        rtelefono = true;
    } else {
        $(form + " #telefonoS" + id).html("La telefono debe contener 11 caracteres");
    }



    var validado = false;
    if (rcedula == true && rnombre == true && rapellido == true && rtelefono == true /*&& rtrayecto==true*/) {
        validado = true;
    } else {
        validado = false;
    }
    // alert(validado);
    return validado;
}
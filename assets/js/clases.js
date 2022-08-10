$(document).ready(function () {

    // alert('hola');

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

                    let id = $(this).val();

                    let seccion = $("#seccion" + id).val();
                    let saber = $("#saber" + id).val();
                    let profesor = $("#profesor").val();


                    /*          alert( seccion + ' ' + saber + ' ' + profesor);*/
                    // alert( saber);
                    // alert( seccion );
                    // alert( profesor);

                    $.ajax({
                        url: url + '/Agregar',
                        type: 'POST',
                        data: {
                            Agregar: true,
                            seccion: seccion,
                            saber: saber,
                            profesor: profesor,
                            /*seccion:seccion,       
                            alumno: alumno,*/

                        },
                        success: function (resp) {
                            /* alert(resp);*/
                            /*window.alert("Hola mundo");   
                            console.log(resp); 
                              window.alert(resp);*/
                            /* window.alert("hola-------------------------------------------");*/
                            var datos = JSON.parse(resp);
                            if (datos.msj === "Good") {
                                Swal.fire({
                                    type: 'success',
                                    title: '¡Registro Exitoso!',
                                    text: 'Se ha creado la clase en el sistema',
                                    footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                                }).then((isConfirm) => {
                                    location.reload();
                                });
                            }
                            if (datos.msj === "Repetido") {
                                Swal.fire({
                                    type: 'warning',
                                    title: '¡Registro repetido!',
                                    text: 'La clase ya esta creada en el sistema',
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
                $("#modificarButton" + userMofif).click();
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

                    /* let id = $(this).val(); */

                    let seccion = $("#seccion" + id).val();
                    let saber = $("#saber" + id).val();
                    let profesor = $("#profesor" + id).val();

                    // alert( seccion + ' ' + saber + ' ' + profesor);
                    $.ajax({
                        url: url + '/Modificar',
                        type: 'POST',
                        data: {
                            Editar: true,
                            id_clase: id,
                            seccion: seccion,
                            saber: saber,
                            profesor: profesor,
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
                                    title: '¡¡Modificacion Exitosa!',
                                    text: 'Se ha modificado la en el sistema',
                                    footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                                }).then((isConfirm) => {
                                    location.reload();
                                });
                            }
                            if (datos.msj === "Repetido") {
                                Swal.fire({
                                    type: 'warning',
                                    title: '¡Registro repetido!',
                                    text: 'La clase ya esta agregada al sistema  ',
                                    footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                                });
                            }
                            if (datos.msj === "Error") {
                                Swal.fire({
                                    type: 'error',
                                    title: '¡Error al guardar los cambios!',
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
                        let claseDelete = $(this).val();

                        /* alert(claseDelete);*/
                        $.ajax({
                            url: url + '/Eliminar',
                            type: 'POST',
                            data: {
                                Eliminar: true,
                                claseDelete: claseDelete,
                            },
                            success: function (respuesta) {
                                /* alert(respuesta);*/
                                var datos = JSON.parse(respuesta);
                                if (datos.msj === "Good") {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Eliminación Exitosa',
                                        text: 'Se ha eliminado la clase del sistema',
                                        footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                                    }).then((isConfirm) => {
                                        location.reload();
                                    });
                                }
                                if (datos.msj === "Repetido") {
                                    Swal.fire({
                                        type: 'warning',
                                        title: '¡Registro repetido!',
                                        text: 'La clase ya esta agregada al sistema',
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
        form = "#modalAgregarClase";
    } else {
        form = "#modalModificarClase" + id;
    }

    var seccion = $(form + " #seccion" + id).val();
    var rseccion = false;
    if (seccion == "") {
        $(form + " #seccionS" + id).html("Seleccione una sección");
    } else {
        rseccion = true;
        $(form + " #seccionS" + id).html("");
    }

    var saber = $(form + " #saber" + id).val();
    var rsaber = false;
    if (saber == "") {
        $(form + " #saberS" + id).html("Seleccione un saber ");
    } else {
        rsaber = true;
        $(form + " #saberS" + id).html("");
    }

    var profesor = $(form + " #profesor" + id).val();
    var rprofesor = false;
    if (profesor == "") {
        $(form + " #profesorS" + id).html("Debe seleccionar un profesor para la clase");
    } else {
        rprofesor = true;
        $(form + " #profesorS" + id).html("");
    }



    var validado = false;
    if (rseccion == true && rsaber == true && rprofesor == true) {
        validado = true;
    } else {
        validado = false;
    }
    // alert(validado);
    return validado;
}

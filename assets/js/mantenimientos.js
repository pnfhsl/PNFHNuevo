$(document).ready(function(){

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
        var extesiones_permitidas = [".sql"];
        // console.log(extesiones_permitidas);
        var input_file = $("#file-input");

        var exp_reg = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + extesiones_permitidas.join('|') + ")$");

        // console.log(exp_reg);
        // console.log(input_file.val());

        if (!exp_reg.test(input_file.val().toLowerCase())) {
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Debe seleccionar un archivo con extensión .sql',
                footer: 'SCHSL',
                timer: 3000,
                showCloseButton: false,
                showConfirmButton: false,
            });
            return false;
        }

        var formData = new FormData($(form_data)[0]);
        // console.log(formData);
        $("#subir").attr('disabled','disabled');
        let url = $("#url").val();
        $(".box-cargando").show();
        $.ajax({
            url: url + '/Restaurar',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                // alert(respuesta);
                // console.log(respuesta);
                var datos = JSON.parse(respuesta);
                console.log(datos.stat);
                $(".box-cargando").hide();

                if (datos.stat == "1") {
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: datos.message,
                        footer: 'SCHSL',
                        timer: 3000,
                        showCloseButton: false,
                        showConfirmButton: false,
                    }).then((isConfirm) => {
                        location.reload();
                    });
                }
                if (datos.stat == "2" || datos.stat == "3" || datos.stat == "4") {
                    Swal.fire({
                        position: 'center',
                        type: 'danger',
                        title: datos.message,
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

    $("#respaldar").click(function () {
        var url = $("#url").val();
        // var ruta = $(this).attr("name");
        swal.fire({
            title: "¿Desea Crear un Respaldo de la Base de datos?",
            text: "Se descargará una copia de la base de datos, ¿desea continuar?",
            type: "question",
            showCancelButton: true,
            confirmButtonText: "¡Guardar!",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((isConfirm) => {
            if (isConfirm.value) {

                $(".box-cargando").show();
                $.ajax({
                    url: url + '/Respaldar',
                    type: 'POST',
                    data: {
                        Buscar: true,
                    },
                    success: function (respuesta) {
                        $(".box-cargando").hide();
                        // alert(respuesta);
                        var resp = JSON.parse(respuesta);
                        // console.log(resp);
                        if (resp.msj == "Good") {
                            var file = resp.rutaFile;

                            // alert(file);
                            // var configuracion_ventana = "menubar=yes, location=yes, resizable=yes,scrollbars=yes,status=yes";
                            // objeto_window_referencia = window.open(file, configuracion_ventana);

                            open(file);
                            $.ajax({
                                url: url + '/Borrarfile',
                                type: 'POST',
                                data: {
                                    Buscar: true,
                                    file,
                                    file,
                                },
                                success: function (respuesta) {
                                    // alert(respuesta);
                                    var resp = JSON.parse(respuesta);
                                    // console.log(resp);
                                    if (resp.msj == "Good") {
                                        Swal.fire({
                                            type: 'success',
                                            title: '¡Respaldo de la Base de datos descargado con exito.!',
                                            text: 'Se ha respaldado la base de datos del el sistema',
                                            footer: 'SCHSL',
                                            showCloseButton: false,
                                            showConfirmButton: true,
                                        });
                                    }
                                    if (resp.msj == "Error") {
                                        Swal.fire({
                                            type: 'success',
                                            title: '¡Respaldo de la Base de datos descargado con exito.!',
                                            text: 'Se ha respaldado la base de datos del el sistema',
                                            footer: 'SCHSL',
                                            showCloseButton: false,
                                            showConfirmButton: true,
                                        });
                                    }
                                },
                                error: function (respuesta) {
                                    // alert(respuesta);
                                    // var resp = JSON.parse(respuesta);
                                    // console.log(resp);
                                }
                            });
                        }
                        if (resp.msj == "Vacio") { }
                        if (resp.msj == "Error") { }
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

    console.clear();
});
    
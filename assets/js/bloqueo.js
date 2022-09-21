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


    var input = $("#myInput").val();
    // $(".myInputDos").val(input);
    // alert(input);

    if (input === 'Administrador') {
        $(".usuarioG").attr('style', 'display:none');
    }
    if (input === 'Superusuario') {
        $(".usuarioD").attr('style', 'display:none');
    }



    $(".usuarioG").click(function () {
        var id = $(this).val();
        if($(".collapseGenerar").val()=="1"){
            $(".contadorGenerarBoxPassword" + id).click();
            $("#firmaAdmin" + id).val("");
            $(".collapseGenerar").val("0");
        }

        $("#verifyAdmin" + id).click(function () {
            let url = $("#url").val();
            let firma = $("#firmaAdmin" + id).val();
            // console.log(firma.length);
            var response = validar(id, "Admin");
            if (response) {
                $.ajax({
                    url: url + '/Buscar',
                    type: 'POST',
                    data: {
                        Buscar: true,
                        firma: firma,
                    },
                    success: function (resp) {
                        var datos = JSON.parse(resp);
                        console.log(datos);
                        // alert(id);
                        if (datos.datos && datos.datos != "" && (datos.datos[0].nombre_rol == "Administrador" || datos.datos[0].nombre_rol == "Superusuario")) {

                            $(".contadorGenerarBoxPassword" + id).click();
                            $(".collapseGenerar").val("1");

                            $("#cedulaAdmin" + id).html(datos.datos[0].cedula_profesor);
                            $("#nombreAdmin" + id).html(datos.datos[0].nombre_profesor);
                            $("#apellidoAdmin" + id).html(datos.datos[0].apellido_profesor);
                            $("#telefAdmin" + id).html(datos.datos[0].telefono_profesor);
                            // alert('Asina nona');

                            $("#comprobarAdmin" + id).click(function () {
                                var public = $("#publicAdmin" + id).val();
                                // console.log(public);
                                // console.log(datos.datos[0].llave_publica);
                                var valid = validarLlave(id);
                                if (valid) {
                                    if (public == datos.datos[0].llave_publica) {
                                        $.ajax({
                                            url: url + '/Generar',
                                            type: 'POST',
                                            data: {
                                                Generar: true,
                                                public: public,
                                                usuarioG: id,
                                            },
                                            success: function (resp) {
                                                console.log(resp);
                                                var data = JSON.parse(resp);
                                                if (data.result.msj === "Good") {
                                                    $("#codigoAdmin" + id).val(data.encrypt);
                                                    Swal.fire({
                                                        type: 'success',
                                                        title: '¡Código Generado!',
                                                        text: 'Se ha generado el código exitosamente',
                                                        footer: 'SCHSL',
                                                        timer: 3000,
                                                        showCloseButton: false,
                                                        showConfirmButton: false,
                                                    })
                                                }
                                                $("#copyClip" + id).click();

                                            },
                                            error: function (respuesta) {
                                                var datos = JSON.parse(respuesta);
                                                console.log(datos);
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            type: 'warning',
                                            title: '¡Sin coincidencias!',
                                            text: 'La clave pública no pertenece al Administrador',
                                            footer: 'SCHSL',
                                            timer: 3000,
                                            showCloseButton: false,
                                            showConfirmButton: false,
                                        })
                                    }


                                }
                            });

                        } else {
                            Swal.fire({
                                type: 'warning',
                                title: '¡Sin coincidencias!',
                                text: 'La firma digital no coincide con nigún Administrador del Sistema',
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
            }
        });
    });


    $(".usuarioD").click(function () {
        var id = $(this).val();
        if($(".collapseDesbloqueo").val()=="1"){
            $(".contadorDesbloqueoBoxPassword" + id).click();
            $("#firmaOperador" + id).val("");
            $(".collapseDesbloqueo").val("0");
        }
        
        // alert('verifyOperador' + id);
        $("#verifyOperador" + id).click(function () {
            let url = $("#url").val();
            let firma = $("#firmaOperador" + id).val();
            console.log(firma);
            var response = validar(id, "Operador");
            // alert(response);
            if (response) {
                $.ajax({
                    url: url + '/Buscar',
                    type: 'POST',
                    data: {
                        Buscar: true,
                        firma: firma,
                    },
                    success: function (resp) {
                        // console.log(resp); 
                        // alert(resp);
                        var datos = JSON.parse(resp);
                        console.log(datos);
                        if (datos.datos && datos.datos != "" && datos.datos[0].nombre_rol == "Superusuario") {

                            $(".contadorDesbloqueoBoxPassword" + id).click();
                            $(".collapseDesbloqueo").val("1");

                            $("#cedulaOperador" + id).html(datos.datos[0].cedula_profesor);
                            $("#nombreOperador" + id).html(datos.datos[0].nombre_profesor);
                            $("#apellidoOperador" + id).html(datos.datos[0].apellido_profesor);
                            $("#telefOperador" + id).html(datos.datos[0].telefono_profesor);

                            $("#desbloquear" + id).click(function () {
                                let codigo = $("#codigoOperador" + id).val();
                                let private = $("#privateOperador" + id).val();

                                var valid = validarOperador(id);
                                // alert(valid);
                                if (valid) {
                                    // alert(id);
                                    $.ajax({
                                        url: url + '/VerificarCodigo',
                                        type: 'POST',
                                        data: {
                                            Verificar: true,
                                            usuarioD: id,
                                        },
                                        success: function (resp) {
                                            // console.log(resp);
                                            alert(resp);
                                            var data = JSON.parse(resp);
                                            console.log(data);
                                            if (codigo === data.datos[0].codigo_desbloqueo) {
                                                let admin = $("#admin").val();
                                                // alert(admin);
                                                $.ajax({
                                                    url: url + '/VerificarClave',
                                                    type: 'POST',
                                                    data: {
                                                        Verificar: true,
                                                        cedula: admin,
                                                    },
                                                    success: function (resp) {
                                                        console.log(resp);
                                                        // alert(resp);
                                                        var data = JSON.parse(resp);
                                                        console.log(data);
                                                        // alert(data.date[0].llave_privada);
                                                        console.log(data.date[0].llave_privada);
                                                        if (private == data.date[0].llave_privada) {
                                                            // alert('ciao');
                                                            $.ajax({
                                                                url: url + '/Desbloquear',
                                                                type: 'POST',
                                                                data: {
                                                                    Desbloquear: true,
                                                                    codigo: codigo,
                                                                    private: private,
                                                                    firma: firma,
                                                                    cedula: id,
                                                                },
                                                                success: function (resp) {
                                                                    console.log(resp);
                                                                    // alert(resp);
                                                                    var data = JSON.parse(resp);
                                                                    console.log(data);
                                                                    console.log(data.look.msj);
                                                                    if (data.look.msj === "Good") {
                                                                        Swal.fire({
                                                                            type: 'success',
                                                                            title: '¡Usuario Desbloqueado!',
                                                                            text: 'Se ha desbloqueado al usuario exitosamente',
                                                                            footer: 'SCHSL',
                                                                            timer: 3000,
                                                                            showCloseButton: false,
                                                                            showConfirmButton: false,
                                                                        }).then((isConfirm) => {
                                                                            location.reload();
                                                                        })
                                                                    } else {
                                                                        Swal.fire({
                                                                            type: 'warning',
                                                                            title: '¡Error!',
                                                                            text: 'No se ha podido desbloquear al usuario',
                                                                            footer: 'SCHSL',
                                                                            timer: 3000,
                                                                            showCloseButton: false,
                                                                            showConfirmButton: false,
                                                                        })
                                                                    }

                                                                },
                                                                error: function (resp) {
                                                                    var datos = JSON.parse(resp);
                                                                    console.log(datos);

                                                                }

                                                            });
                                                        } else {
                                                            Swal.fire({
                                                                type: 'warning',
                                                                title: '¡Sin coincidencias!',
                                                                text: 'La clave privada es incorrecta',
                                                                footer: 'SCHSL',
                                                                timer: 3000,
                                                                showCloseButton: false,
                                                                showConfirmButton: false,
                                                            })
                                                        }

                                                    },
                                                    error: function (resp) {
                                                        var datos = JSON.parse(resp);
                                                        console.log(datos);

                                                    }

                                                });


                                            } else {
                                                Swal.fire({
                                                    type: 'warning',
                                                    title: '¡Sin coincidencias!',
                                                    text: 'El código de desbloqueo del usuario no coincide',
                                                    footer: 'SCHSL',
                                                    timer: 3000,
                                                    showCloseButton: false,
                                                    showConfirmButton: false,
                                                })
                                            }


                                        },
                                        error: function (resp) {
                                            var datos = JSON.parse(resp);
                                            console.log(datos);

                                        }

                                    });


                                }

                            });
                        } else {
                            Swal.fire({
                                type: 'warning',
                                title: '¡Sin coincidencias!',
                                text: 'La firma digital no coincide con nigún Super Usuario del Sistema',
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
            }

        });

    });



})

function validar(id = "", acto) {
    var rfirma = false;
    if(acto=="Admin"){
        var firmaAdmin = $("#firmaAdmin" + id).val();
        // var rfirmaAdmin = false;
        var rfirma = false;
        if (firmaAdmin.length >= 32) {
            // rfirmaAdmin = true;
            rfirma = true;
            $("#nombreF" + id).html("");
        } else {
            $("#nombreF" + id).html("Debe ingresar la firma digital");
        }
    }
    if(acto=="Operador"){
        var firmaOperador = $("#firmaOperador" + id).val();
        // var rfirmaOperador = false;
        var rfirma = false;
        if (firmaOperador.length >= 32) {
            // rfirmaOperador = true;
            rfirma = true;
            $("#nombreO" + id).html("");
        } else {
            $("#nombreO" + id).html("Debe ingresar la firma digital");
        }
    }
        

    var validado = false;
    // if (rfirmaAdmin == true || rfirmaOperador == true) {
    if (rfirma == true) {
        // if (rfirmaAdmin == true) {
        validado = true;
    } else {
        validado = false;
    }
    // alert(validado);
    return validado;
}

function validarLlave(id = "") {
    var public = $("#publicAdmin" + id).val();
    // alert(public);
    if (public.length >= 828) {
        rpublic = true;
        $("#publicF" + id).html("");
    } else {
        $("#publicF" + id).html("Debe ingresar la llave pública");
    }
    var validado = false;
    if (rpublic == true) {
        validado = true;
    } else {
        validado = false;
    }
    return validado;
}

function validarOperador(id = "") {
    var private = $("#privateOperador" + id).val();
    if (private.length >= 3048) {
        rprivate = true;
        $("#privateF" + id).html("");
    } else {
        $("#privateF" + id).html("Debe ingresar la llave privada");
    }
    var codigo = $("#codigoOperador" + id).val();
    if (codigo.length >= 344) {
        rcodigo = true;
        $("#codigoF" + id).html("");
    } else {
        $("#codigoF" + id).html("Debe ingresar el código");
    }
    var validado = false;
    if (rprivate == true && rcodigo == true) {
        validado = true;
    } else {
        validado = false;
    }
    // alert(validado);
    return validado;
};

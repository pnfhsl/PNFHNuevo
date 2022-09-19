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


    var input= $("#myInput").val();
    // $(".myInputDos").val(input);
    // alert(input);
    
    if (input === 'Administrador') {        
        $(".usuarioG").attr('style', 'display:none');
    }

    $(".cont").click(function () {
        var id = $(this).val();
        // alert($(".optpass"+id).val());
        $(".contadorBoxPassword").click();
    });

    $(".contadorBoxPassword").click(function () {
        var id = $(this).val();
        if ($(".optpass" + id).val() == 1) {
            $(".optpass" + id).val(0);
        } else if ($(".optpass" + id).val() == 0) {
            $(".optpass" + id).val(1);
        }
    });


    $("#verifyAdmin").click(function () {
        // alert('hola');
        let url = $("#url").val();
        // alert(url);
        let firma = $("#firmaAdmin").val();
        // alert(firma); 
        console.log(firma);
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
                var usuarioG = $("#usuarioG").val();
                console.log(usuarioG);
                if (datos.datos) {
                    // alert('aqui');
                    // var cedula = datos.datos[0].cedula_profesor;
                    // var cedula = '15432287';
                    
                    $("#cedulaAdmin").html(datos.datos[0].cedula_profesor);
                    $("#nombreAdmin").html(datos.datos[0].nombre_profesor);
                    $("#apellidoAdmin").html(datos.datos[0].apellido_profesor);
                    $("#telefAdmin").html(datos.datos[0].telefono_profesor);

                    $("#comprobarAdmin").click(function () {
                        var public = $("#publicAdmin").val();
                        // alert(public);
                        $.ajax({
                            url: url + '/Generar',
                            type: 'POST',
                            data: {
                                Generar: true,
                                public: public,
                                usuarioG: usuarioG,
                            },
                            success: function (resp) {
                                console.log(resp);
                                var data = JSON.parse(resp);
                                // console.log(data);
                                // console.log(data.result.msj);
                                // $("#clave_public").html(data.encrypt); 

                                if (data.result.msj === "Good") {
                                    $("#codigoAdmin").val(data.encrypt);
                                    Swal.fire({
                                        type: 'success',
                                        title: '¡Códifgo Generado!',
                                        text: 'Se ha generado el código exitosamente',
                                        footer: 'SCHSL',
                                        timer: 3000,
                                        showCloseButton: false,
                                        showConfirmButton: false,
                                    })
                                }
                                $("#copyClip").click(function () {
                                    /* Get the text field */
                                    // var copyText = document.getElementById("codigoAdmin");
                                    // var copyText =  $("#codigoAdmin").val();
                                    // console.log(copyText);
                                    /* Select the text field */
                                    // copyText.select();
                                    /* Copy the text inside the text field */
                                    // document.execCommand("copy");
                                    // console.log(document.execCommand("copy"));
                                    console.log('hola');

                                });

                            },
                            error: function (respuesta) {
                                var datos = JSON.parse(respuesta);
                                console.log(datos);

                            }

                        });

                    });

                }
            },
            error: function (respuesta) {
                var datos = JSON.parse(respuesta);
                console.log(datos);

            }

        });
    });

    $("#verifyOperador").click(function () {
        // alert('hola');
        let url = $("#url").val();
        let firma = $("#firmaOperador").val();
        // alert(firma);
        console.log(firma);
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
                if (datos.datos) {
                    // alert('aqui');
                    $("#cedulaOperador").html(datos.datos[0].cedula_profesor);
                    $("#nombreOperador").html(datos.datos[0].nombre_profesor);
                    $("#apellidoOperador").html(datos.datos[0].apellido_profesor);
                    $("#telefOperador").html(datos.datos[0].telefono_profesor);

                    $("#desbloquear").click(function () {
                        let codigo = $("#codigoOperador").val();
                        let private = $("#privateOperador").val();
                        let cedula = $("#usuarioD").val();
                        // alert(cedula);
                        console.log(cedula);
                        $.ajax({
                            url: url + '/Desbloquear',
                            type: 'POST',
                            data: {
                                Desbloquear: true,
                                codigo: codigo,
                                private: private,
                                firma: firma,
                                cedula: cedula,
                            },
                            success: function (resp) {
                                console.log(resp);
                                // alert(resp);
                                var data = JSON.parse(resp);
                                console.log(data);
                                console.log(data.look.msj);
                                // console.log(data.result.msj);
                                // $("#clave_public").html(data.encrypt); 

                                if (data.look.msj === "Good") {
                                    // alert('ciao');
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
                                    });
                                }

                            },
                            error: function (resp) {
                                var datos = JSON.parse(resp);
                                console.log(datos);

                            }

                        });

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

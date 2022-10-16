<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login </title>
  <!-- meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, 
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
  <!-- /meta tags -->
  <!-- custom style sheet -->
  <link href="<?= _THEME_ ?>/css/style.css" rel="stylesheet" type="text/css" />
  <!-- /custom style sheet -->
  <!-- fontawesome css -->
  <link href="<?= _THEME_ ?>/css/fontawesome-all.css" rel="stylesheet" />
  <!-- /fontawesome css -->
  <!-- google fonts-->
  <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- /google fonts-->

</head>


<body>
<div class="box-cargando" style="background:rgba(0,0,0,.8);position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100vh;z-index:1100;text-align:center;display:none;color:#767676;">
<!-- <img src="assets/gifty/loading-11.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<!-- <img src="assets/gifty/loading-25.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<!-- <img src="assets/gifty/loading-22.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<!-- <img src="assets/gifty/loading-56.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<!-- <img src="assets/gifty/loading-102.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<!-- <img src="assets/gifty/loading-103.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->

<!-- <img src="assets/gifty/loading-14.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<!-- <img src="assets/gifty/loading-33.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->

<!-- <img src="assets/gifty/loading-4.gif" alt="cargando" style="margin-top:10vh;max-height:100vh;max-width:100vh;">  -->
<img src="assets/gifty/loading-13.gif" alt="cargando" style="margin-top:15vh;max-height:100vh;max-width:100vh;width:30vh;">
<h3>Cargando . . .</h3> 
</div>


  <!-- <input type="hidden" id="url" value="<?= $this->url; ?>"> -->
  <input type="hidden" id="url" value="<?= $this->encriptar($this->url); ?>">
  <input type="hidden" id="urlPreguntas" value="<?= $this->encriptar("Preguntas"); ?>">
  <input type="hidden" id="urlHome" value="<?= $this->encriptar("Home"); ?>">
  <h1>Iniciar Sesión</h1>
  <div class=" w3l-login-form">
    <!-- <h2>Inicio de Sesión</h2> -->
    <form action="#" method="POST">
      <div class=" w3l-form-group">
        <label>Username:</label>
        <div class="group">
          <i class="fas fa-user" style="margin-top: 5px;"></i>
          <input type="text" class="form-control" id="usuario" placeholder="Username" required="required" />
        </div>
        <div class="content-input user" style="color:white">
          <p></p>
        </div>
      </div>
      <div class=" w3l-form-group">
        <label>Password:</label>
        <div class="group">
          <i class="fas fa-unlock" style="margin-top:5px;"></i>
          <input type="password" class="form-control" id="password" placeholder="Password" required="required" />
        </div>
        <div class="content-input pass" style="color:white">
          <p></p>
        </div>
      </div>
      <div class="forgot">
        <a href="#" data-toggle="modal" data-target="#modaEnviarCorreo" id="modificarPass">¿Deseas modificar la contraseña?</a>
        <!-- <p><input type="checkbox">Recordar</p> -->
      </div>
      <button type="submit" id="loginBtn">Login</button>
    </form>
    <!-- <p class=" w3l-register-p">¿No tienes cuenta?<a href="#" class="register"> Regístrate</a></p> -->
  </div>



  <button type="submit" id="preguntas" data-toggle="modal" data-target="#modalPreguntas" style="display:none;">Preguntas</button>
  <div id="modalPreguntas" class="#modalPreguntas modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header" style="background:#3c8dbc; color:white">
            <h4 class="modal-title" style="text-align: left;">Seguridad</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" id="cedulaUsuarioPreguntas">
            <div class="box-body">
              <div class="form-group">
                <label for="" id="preg_uno"></label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" style="border: 1px solid #d2d6de !important;" name="" id="respuesta_uno" placeholder="Ingresar su respuesta" required>
                </div>
                <br>
                <label for="" id="preg_dos"></label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" style="border: 1px solid #d2d6de !important;" name="" id="respuesta_dos" placeholder="Ingresar su respuesta" required>
                </div>
                <br>
                <label for="" id="preg_tres"></label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" style="border: 1px solid #d2d6de !important;" name="" id="respuesta_tres" placeholder="Ingresar su respuesta" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <span type="button" class="btn btn-default pull-left cerrarPreguntasModal" data-dismiss="modal">Salir</span>
            <span type="submit" class="btn btn-primary" id="enviarPregunta">Enviar</span>
          </div>
      </div>
    </div>
  </div>

  <div id="modaEnviarCorreo" class="#modaEnviarCorreo modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <!--=====================================
              CABEZA DEL MODAL
              ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title" style="text-align: left;">Modificar Contraseña</h4>
        </div>
        <!--=====================================
                  CUERPO DEL MODAL
              ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--ENTRADA CORREO -->
            <div class="form-group">
              <label for="">Ingrese su correo para modificar su contraseña</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" style="border: 1px solid #d2d6de !important;" name="nuevoCorreo" id="correo" placeholder="Ingresar Correo" required>
              </div>
            </div>
          </div>
        </div>
        <!--=====================================
                      PIE DEL MODAL
            ======================================-->
        <div class="modal-footer">
          <span type="button" class="btn btn-default pull-left cerrarEnviarCorreo" data-dismiss="modal">Salir</span>
          <span type="submit" class="btn btn-primary subir" id="enviarCorreo">Enviar</span>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <p class="copyright-agileinfo"> &copy; 2022 Todos los Derechos Reservados | <a href="#">SCHSL</a></p>
  </footer>

<script type="text/javascript">
$(document).ready(function() { //Al Cargar la paginaZ

  console.clear();
  $('#loginBtn').click(function(e) {

    var url = $("#url").val();
    var urlPreguntas = $("#urlPreguntas").val();
    var urlHome = $("#urlHome").val();
    e.preventDefault();

    if ($("#usuario").val().length > 3) {
      $(".content-input.user p").attr("style", "visibility:hidden;margin-top:.2vw");
      if ($("#password").val().length > 3) {
        $(".content-input.pass p").attr("style", "visibility:hidden;margin-top:.2vw");
        let user = $("#usuario").val();
        let pass = $("#password").val();

        $(".box-cargando").show();
        $.ajax({
          url: '',
          type: 'POST',
          data: {
            loginSistema: true,
            username: user,
            password: pass,
          },
          success: function(respuesta) {
            $(".box-cargando").hide();

            // alert(respuesta);
             // console.log(respuesta);
            var data = JSON.parse(respuesta);
            // console.log(data);

            // console.log(data.preguntas);
            // console.log(data.preguntas[0].pregunta);
            // console.log(data.preguntas[0].respuesta);
            // console.log(data.preguntas[1].pregunta);
            // console.log(data.preguntas[1].respuesta);
            // console.log(data.preguntas[2].pregunta);
            // console.log(data.preguntas[2].respuesta);

            if (data.access === "Acceder") {
              // Swal.fire({
              //   type: 'success',
              //   title: '¡Ingreso exitoso!',
              //   text: 'El nombre de usuario y la contraseña coinciden',
              //   footer: 'SCHSL', timer: 2000, showCloseButton: false, showConfirmButton: false,
              // }); 
              $(".content-input.pass p").attr("style", "visibility:hidden;margin-top:.2vw");
              $(".content-input.user p").attr("style", "visibility:hidden;margin-top:.2vw");

              if (data.stat == "1") {
                location.href = "<?= _ROUTE_ ?>";
                // location.href = "<?= _ROUTE_ ?>"+urlHome; 
                // location.href = "<?= _ROUTE_ ?>"; 
              }

              if (data.stat == "2") {
                location.href = "<?= _ROUTE_ ?>" + urlPreguntas;
                // location.href = "<?= _ROUTE_ ?>Preguntas"; 
              }

            }

            if (data.msj == "Cuenta Bloqueada") {
                $("#usuario").focus();
                $("#usuario").val("");
                $("#password").val("");
                Swal.fire({
                  type: 'warning',
                  title: '¡Usuario bloqueado',
                  text: 'comuniquese con el soporte.',
                  footer: 'SCHSL',
                  timer: 2000,
                  showCloseButton: false,
                  showConfirmButton: false,
                });  
            }
            if (data.msj === "Usuario o contraseña invalido!") {
              // alert('asd');
              // Swal.fire({
              //   type: 'warning',
              //   title: '¡Usuario o contraseña inválido',
              //   text: 'El nombre de usuario y la contraseña no coinciden',
              //   footer: 'SCHSL', timer: 2000, showCloseButton: false, showConfirmButton: false,
              // }); 
              $("#usuario").focus();
              $("#usuario").val("");
              $("#password").val("");
              Swal.fire({
                type: 'warning',
                title: '¡Usuario o contraseña inválido',
                text: 'El nombre de usuario y la contraseña no coinciden',
                footer: 'SCHSL',
                timer: 2000,
                showCloseButton: false,
                showConfirmButton: false,
              });
            }

            if (data.look === "Bloqueo") {
              $("#preguntas").click();
              console.log(data);
              $("#cedulaUsuarioPreguntas").val(data.cedula);
              $("#preg_uno").html(data.preguntas[0].pregunta);
              $("#preg_dos").html(data.preguntas[1].pregunta);
              $("#preg_tres").html(data.preguntas[2].pregunta);
              // Swal.fire({
              //   type: 'warning',
              //   title: '¡Usuario bloqueado!',
              //   text: 'El usuario ' + user + ' ha sido bloqueado',
              //   footer: 'SCHSL', timer: 2000, showCloseButton: false, showConfirmButton: false,
              // });

            }

            // var pregunta = $("#enviarPregunta").click();
            $('#enviarPregunta').on('click', function() {
              // alert('hizo click sobre el boton');
              let respuesta_uno = $("#respuesta_uno").val();
              let respuesta_dos = $("#respuesta_dos").val();
              let respuesta_tres = $("#respuesta_tres").val();
              // alert(respuesta_uno + ' ' + respuesta_dos + ' ' + respuesta_tres);
              if ((respuesta_uno == data.preguntas[0].respuesta) && (respuesta_dos == data.preguntas[1].respuesta) && (respuesta_tres == data.preguntas[2].respuesta)) {
                $("#modificarPass").click();
              } else {
                $(".cerrarPreguntasModal").click();
                $("#respuesta_uno").val("");
                $("#respuesta_dos").val("");
                $("#respuesta_tres").val("");
                Swal.fire({
                  type: 'warning',
                  title: '¡Usuario bloqueado!',
                  text: 'El usuario ' + user + ' ha sido bloqueado. Contacte al administrador para su desbloqueo',
                  footer: 'SCHSL',
                  timer: 3000,
                  showCloseButton: false,
                  showConfirmButton: false,
                });
              }
            });

          },
          error: function(respuesta) {
            var data = JSON.parse(respuesta);
            console.log(data);

          }
        });

      } else {
        $(".content-input.pass p").html("Ingrese contraseña!");
        $(".content-input.pass p").attr("style", "visibility:;margin-top:.2vw");
      }

    } else {
      $(".content-input.user p").html("Ingrese nombre de usuario!");
      $(".content-input.user p").attr("style", "visibility:;margin-top:.2vw");
    }

  });

  $("#enviarCorreo").click(function() {
    var url = $("#url").val();
    let correo = $("#correo").val();

    $(".box-cargando").show();
    $.ajax({
      url: url + '/enviarLink',
      type: 'POST',
      data: {
        correo: correo,
      },
      success: function(resp) {
        $(".box-cargando").hide();
        // alert(resp);
        console.log(resp);
        var datos = JSON.parse(resp);
        if (datos.msj === "Good") {
          Swal.fire({
            type: 'success',
            title: '¡Correo enviado!',
            text: 'El link para el cambio de contraseña se ha enviado exitosamente al correo ' + correo,
            footer: 'SCHSL',
            timer: 3000,
            showCloseButton: false,
            showConfirmButton: false,
          });
          $(".cerrarEnviarCorreo").click();
          $("#correo").val("");
        }
        if (datos.msj === "Vacio") {
          Swal.fire({
            type: 'warning',
            title: '¡Correo no coincide!',
            text: 'El correo electronico ' + correo + ' no fue encontrado',
            footer: 'SCHSL',
            timer: 3000,
            showCloseButton: false,
            showConfirmButton: false,
          });
        }
        if (datos.msj === "error") {
          Swal.fire({
            type: 'warning',
            title: '¡Correo no enviado!',
            text: 'No se pudo enviar el correo electronico',
            footer: 'SCHSL',
            timer: 3000,
            showCloseButton: false,
            showConfirmButton: false,
          });
        }
        if (datos.msj == "Bloqueado") {
          $("#usuario").focus();
          $("#usuario").val("");
          $("#password").val("");
          Swal.fire({
            type: 'warning',
            title: '¡Usuario bloqueado',
            text: 'comuniquese con el soporte.',
            footer: 'SCHSL',
            timer: 2000,
            showCloseButton: false,
            showConfirmButton: false,
          });  
        }
      },
      error: function(respuesta) {
        var datos = JSON.parse(respuesta);
        console.log(datos);

      }
    });
  });

  // $("#enviarPregunta").click(function() {
  //   var url = $("#url").val();
  //   $("#cedulaUsuarioPreguntas").val(data.cedula);
  //   $("#respuesta_uno").html(data.preguntas[0].pregunta);
  //   $("#respuesta_dos").html(data.preguntas[1].pregunta);
  //   $("#respuesta_tres").html(data.preguntas[2].pregunta);
  //   // let correo = $("#correo").val();

  //   $(".box-cargando").show();
  //   $.ajax({
  //     url: url + '/generarCodigoRedireccion',
  //     type: 'POST',
  //     data: {
  //       correo: correo,
  //     },
  //     success: function(resp) {
  //       $(".box-cargando").hide();
  //       alert(resp);
  //       // console.log(resp);
  //       // var datos = JSON.parse(resp);
  //       // if (datos.msj === "Good") {
  //       //   Swal.fire({
  //       //     type: 'success',
  //       //     title: '¡Correo enviado!',
  //       //     text: 'El link para el cambio de contraseña se ha enviado exitosamente al correo ' + correo,
  //       //     footer: 'SCHSL',
  //       //     timer: 3000,
  //       //     showCloseButton: false,
  //       //     showConfirmButton: false,
  //       //   });
  //       //   $(".cerrarEnviarCorreo").click();
  //       //   $("#correo").val("");
  //       // }
  //       // if (datos.msj === "Vacio") {
  //       //   Swal.fire({
  //       //     type: 'warning',
  //       //     title: '¡Correo no coincide!',
  //       //     text: 'El correo electronico ' + correo + ' no fue encontrado',
  //       //     footer: 'SCHSL',
  //       //     timer: 3000,
  //       //     showCloseButton: false,
  //       //     showConfirmButton: false,
  //       //   });
  //       // }
  //       // if (datos.msj === "error") {
  //       //   Swal.fire({
  //       //     type: 'warning',
  //       //     title: '¡Correo no enviado!',
  //       //     text: 'No se pudo enviar el correo electronico',
  //       //     footer: 'SCHSL',
  //       //     timer: 3000,
  //       //     showCloseButton: false,
  //       //     showConfirmButton: false,
  //       //   });
  //       // }
  //     },
  //     error: function(respuesta) {
  //       var datos = JSON.parse(respuesta);
  //       console.log(datos);

  //     }
  //   });
  // });

});



</script>

</body>

</html>
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
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="<?=_THEME_?>/css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="<?=_THEME_?>/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->

</head>


<body>

                  <!-- <input type="hidden" id="url" value="<?=$this->url; ?>"> -->
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
                    <div class="content-input user" style="color:white"><p></p></div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock" style="margin-top:5px;"></i>
                    <input type="password" class="form-control" id="password" placeholder="Password" required="required" />
                </div>
                    <div class="content-input pass" style="color:white"><p></p></div>
            </div>
            <div class="forgot">
                <a href="#" data-toggle="modal" data-target="#modalAgregarArchivo">¿Deseas modificar la contraseña?</a>
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

            <form role="form" method="post" enctype="multipart/form-data" id="form_data">

              <div class="modal-header" style="background:#3c8dbc; color:white">

                

                <h4 class="modal-title" style="text-align: left;">Seguridad</h4>

              </div>

              <div class="modal-body">

                <div class="box-body">


                  <div class="form-group">

                    <label for="">¿Cuál es su año de nacimiento?</label>
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                      <input type="text" class="form-control input-lg" style="border: 1px solid #d2d6de !important;" name="nuevoCorreo" id="respuesta_uno" placeholder="Ingresar su respuesta" required>

                    </div>
                    <br>
                    <label for="">¿Cuál es el nombre se primer perro?</label>
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                      <input type="text" class="form-control input-lg" style="border: 1px solid #d2d6de !important;" name="nuevoCorreo" id="respuesta_dos" placeholder="Ingresar su respuesta" required>

                    </div>
                    <br>
                    <label for="">¿Cuál es la profesión de su madre?</label>
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                      <input type="text" class="form-control input-lg" style="border: 1px solid #d2d6de !important;" name="nuevoCorreo" id="respuesta_tres" placeholder="Ingresar su respuesta" required>

                    </div>


                  </div>


                </div>

              </div>

              <div class="modal-footer">

                <span type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</span>

                <span type="submit" class="btn btn-primary subir" id="enviarPregunta">Enviar</span>

              </div>


            </form>

          </div>

        </div>

    </div>

    <div id="modalAgregarArchivo" class="#modalAgregarArchivo modal fade" role="dialog">

        <div class="modal-dialog">

          <div class="modal-content">

            <!-- <form role="form" method="post" enctype="multipart/form-data" id="form_data"> -->

              <!--=====================================
              CABEZA DEL MODAL
              ======================================-->

              <div class="modal-header" style="background:#3c8dbc; color:white">

                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->

                <h4 class="modal-title" style="text-align: left;">Enviar correo</h4>

              </div>

              <!--=====================================
                  CUERPO DEL MODAL
              ======================================-->

              <div class="modal-body">

                <div class="box-body">

                  <!--ENTRADA CORREO -->

                  <div class="form-group">

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

                <span type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</span>

                <span type="submit" class="btn btn-primary subir" id="enviarCorreo">Enviar</span>

              </div>


            <!-- </form> -->

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

            $.ajax({
              url: '', 
              type: 'POST', 
              data: {
                loginSistema: true, 
                username: user, 
                password: pass,
              },
              success: function(respuesta) {
                // alert(respuesta);
                var data = JSON.parse(respuesta); 
                console.log(data);

                if (data.access === "Acceder") { 
                  Swal.fire({
                    type: 'success',
                    title: '¡Ingreso exitoso!',
                    text: 'El nombre de usuario y la contraseña no coinciden',
                    footer: 'SCHSL', timer: 2000, showCloseButton: false, showConfirmButton: false,
                  }); 
                  $(".content-input.pass p").attr("style", "visibility:hidden;margin-top:.2vw");
                  $(".content-input.user p").attr("style", "visibility:hidden;margin-top:.2vw");
                  
                  if(data.stat=="1"){
                    location.href = "<?= _ROUTE_ ?>"; 
                    // location.href = "<?= _ROUTE_ ?>"+urlHome; 
                    // location.href = "<?= _ROUTE_ ?>"; 
                  }

                  if(data.stat=="2"){
                    location.href = "<?= _ROUTE_ ?>"+urlPreguntas; 
                    // location.href = "<?= _ROUTE_ ?>Preguntas"; 
                  }

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
                    footer: 'SCHSL', timer: 2000, showCloseButton: false, showConfirmButton: false,
                  });
                }

                if (data.look === "Bloqueo") {
                  $("#preguntas").click(); 
                  // Swal.fire({
                  //   type: 'warning',
                  //   title: '¡Usuario bloqueado!',
                  //   text: 'El usuario ' + user + ' ha sido bloqueado',
                  //   footer: 'SCHSL', timer: 2000, showCloseButton: false, showConfirmButton: false,
                  // });
                
                }


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

      })


      $("#enviarCorreo").click(function(){
        var url = $("#url").val();
        let correo = $("#correo").val();
        $.ajax({
          url: url+'/enviarLink',    
          type: 'POST',   
          data: { 
            correo: correo,    
          },
          success: function(resp){
            // alert(resp);
            console.log(resp);
            var datos = JSON.parse(resp);     
              if (datos.msj === "Good") {  
                Swal.fire({
                  type: 'success',
                  title: '¡Correo enviado!',
                  text: 'El link para el cambio de contraseña se ha enviado exitosamente al correo ' + correo,
                  footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                });
              } 
              if (datos.msj === "Vacio") {  
                Swal.fire({
                  type: 'warning',
                  title: '¡Correo no coinciden!',
                  text: 'El correo electronico '+correo+' no fue encontrado',
                  footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                });
              }
              if (datos.msj === "error") {  
                Swal.fire({
                  type: 'warning',
                  title: '¡Correo no enviado!',
                  text: 'No se pudo enviar el correo electronico',
                  footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                });
              }
            },
            error: function(respuesta){       
              var datos = JSON.parse(respuesta);
              console.log(datos);

          }
        });  
      });
  });
</script>

</body>
</html>



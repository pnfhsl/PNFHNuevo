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
  <h1>Recuperar contraseña</h1>
  <div class=" w3l-login-form">
    <!-- <h2>Inicio de Sesión</h2> -->
    <form action="#" method="POST">

      <div class=" w3l-form-group">
        <label>Password:</label>
        <div class="group">
          <i class="fas fa-user" style="margin-top: 5px;"></i>
          <input type="password" class="form-control" id="usuario" placeholder="Password" required="required" />
        </div>
        <div class="content-input user" style="color:white">
          <p></p>
        </div>
      </div>
      <div class=" w3l-form-group">
        <label>confirmar Password:</label>
        <div class="group">
          <i class="fas fa-unlock" style="margin-top:5px;"></i>
          <input type="password" class="form-control" id="password" placeholder="confirmar Password" required="required" />
        </div>
        <div class="content-input pass" style="color:white">
          <p></p>
        </div>
      </div>
      <div class="forgot">
        <!-- <a href="#" data-toggle="modal" data-target="#modalAgregarArchivo">¿Has olvidado la contraseña?</a> -->
        <!-- <p><input type="checkbox">Recordar</p> -->
      </div>

      <button type="submit" id="loginBtn">Recuperar</button>
    </form>
    <p class=" w3l-register-p">¿Ya tienes cuenta?<a href="#" class="register"> Inicia Sesión</a></p>
  </div>
 
  <footer>
    <p class="copyright-agileinfo"> &copy; 2022 Todos los Derechos Reservados | <a href="#">SCHSL</a></p>
  </footer>

  <script type="text/javascript">
    $(document).ready(function() { 
      console.clear();
      $('#loginBtn').click(function(e) { 
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

                if (data.msj === "Good") { 
                  $(".content-input.pass p").attr("style", "visibility:hidden;margin-top:.2vw");
                  $(".content-input.user p").attr("style", "visibility:hidden;margin-top:.2vw");

                  location.href = "<?= _ROUTE_ ?>Home"; 

                }

                if (data.msj === "Usuario o contraseña invalido!") {
                  $(".content-input.pass p").html(data.msj);
                  $(".content-input.pass p").attr("style", "visibility:;margin-top:.2vw");
                  return;
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

    });
  </script>

</body>

</html>
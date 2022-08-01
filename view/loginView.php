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
                <a href="#">¿Has olvidado la contraseña?</a>
                <p><input type="checkbox">Recordar</p>
            </div>
            <button type="submit" id="loginBtn">Login</button>
        </form>
        <p class=" w3l-register-p">¿No tienes cuenta?<a href="#" class="register"> Regístrate</a></p>
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2022 Todos los Derechos Reservados | <a href="#">SCHSL</a></p>
    </footer>

    <script type="text/javascript">
        
      $(document).ready(function() { //Al Cargar la pagina

      $('#loginBtn').click(function(e) { //Si ejecuta el evento del click al boton con el id loginBtn
        e.preventDefault(); //bloquea el envio del formulario

        if($("#usuario").val().length > 3) {        //Verifica el valor para comprobar que los caracteres                                   ingresados sean mayores a 3
          $(".content-input.user p").attr("style", "visibility:hidden;margin-top:.2vw"); //muestra alerta  indicando que ingrese el usuario
          if($("#password").val().length > 3) {     //Contraseña mayor a 3 caracteres
            $(".content-input.pass p").attr("style", "visibility:hidden;margin-top:.2vw");
            let user = $("#usuario").val();     //Se capturan la informacion en las variables user y password 
            let pass = $("#password").val();
            
            $.ajax({        // se envian mediante ajax
                url: '',    //se deja tal cual ya que estamos manejando ese controlador
                type: 'POST',   //empleamos el metodo post
                data: {
                  loginSistema: true,   //esta variable permite identificar en el controlador en cual elemento va a entrar
                  username: user,       //se pasan las variables de usuario y contraseña
                  password: pass,
                },
                success: function(respuesta){       //Si la respuesta es satisfactoria
                  // alert(respuesta);
                  var data = JSON.parse(respuesta);     // Obtiene la respuesta desde el controlador obtenida del modelo y se transforma el string a Json

                   if (data.msj === "Good") {       //Si el mensaje es igual a Good tal y como esta en el modelo, oculta los errores del formulario 
                     $(".content-input.pass p").attr("style", "visibility:hidden;margin-top:.2vw");
                     $(".content-input.user p").attr("style", "visibility:hidden;margin-top:.2vw");
                     
                        location.href = "<?=_ROUTE_?>Home";     //Me redirige a la vista de inicio del sistema
                      
                   }
              
               if (data.msj === "Usuario o contraseña invalido!") {
                 $(".content-input.pass p").html(data.msj);
                 $(".content-input.pass p").attr("style", "visibility:;margin-top:.2vw");
                 return;
               }
                  
                },error: function(respuesta){       
                  var data = JSON.parse(respuesta);
                  console.log(data);

                }
              }); 
          
          }else{
            $(".content-input.pass p").html("Ingrese contraseña!");
            $(".content-input.pass p").attr("style", "visibility:;margin-top:.2vw");
          }

        } else{
          $(".content-input.user p").html("Ingrese nombre de usuario!");
          $(".content-input.user p").attr("style", "visibility:;margin-top:.2vw");
        }
        
      })
    });
    </script>

</body>
</html>



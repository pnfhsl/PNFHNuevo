<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Recuperar contraseña</title>
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
<style type="text/css">
.mensajeError{
  /*background: #A52A2A /*!important;*/
  /*color: #A52A2A !important; */
  color:#FFF;
  /*color: #2AFF2A !important; */
}</style>


<body>
  <h1>Recuperar contraseña</h1>
  <div class=" w3l-login-form">
    <!-- <h2>Inicio de Sesión</h2> -->
    <form action="#" method="POST">

      <div class=" w3l-form-group">
        <label>Password:</label>
        <div class="group">
          <i class="fas fa-user" style="margin-top: 5px;"></i>
          <input type="password" class="form-control nuevoPassword" id="password" placeholder="Password" required="required" />
        </div>
        <div style="width:100%;text-align:right;">
          <span id="nombreP" class="mensajeError"></span>
        </div>
      </div>
      <div class=" w3l-form-group">
        <label>confirmar Password:</label>
        <div class="group">
          <i class="fas fa-unlock" style="margin-top:5px;"></i>
          <input type="password" class="form-control confirmarPassword" id="pass" placeholder="confirmar Password" required="required" />
        </div>
        <div style="width:100%;text-align:right;">
          <span id="nombrePC" class="mensajeError"></span>
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
    var resul = validarContras();
    if(resul == true){
      // alert('asd');
      if ($("#password").val().length > 3) {
        $(".content-input.user p").attr("style", "visibility:hidden;margin-top:.2vw"); 
        if ($("#pass").val().length > 3) { 
          $(".content-input.pass p").attr("style", "visibility:hidden;margin-top:.2vw");
          let password = $("#password").val(); 
          let pass = $("#pass").val();

          // alert(pass);
          $.ajax({
              url: 'Login/recuperarAcceso',    
              type: 'POST',   
              data: {
                recuperarSistema: true,
                pass: pass,
              },
              success: function(respuesta){
                // alert(respuesta);
                // console.log(respuesta);
                var data = JSON.parse(respuesta); 
                console.log(data);

                if (data.msj === "Good") {   
                  Swal.fire({
                    type: 'success',
                    title: '¡Modificación Exitosa!',
                    text: 'Se ha modificado la contraseña exitosamente',
                    footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
                  }).then((isConfirm) => {
                    location.href = '<?=_ROUTE_?>Login';
                  });
                }

                if (data.msj === "Usuario o contraseña invalido!") {
                  $(".content-input.pass p").html(data.msj);
                  $(".content-input.pass p").attr("style", "visibility:;margin-top:.2vw");
                  return;
                }
             },
              error: function(respuesta){       
                var datos = JSON.parse(respuesta);
                console.log(datos);

              }

            });
          // $.ajax({
          //   url: 'Login',    
          //   type: 'POST',
          //   data: {
          //     recuperarSistema: true,
          //     pass: pass,
          //   },
          //   success: function(respuesta) {
          //     alert(respuesta);

          //     console.log(respuesta);
          //     var data = JSON.parse(respuesta); 
          //     console.log(data);

          //         if (data.msj === "Good") {   
          //           Swal.fire({
          //             type: 'success',
          //             title: '¡Modificación Exitosa!',
          //             text: 'Se ha modificado la contraseña exitosamente',
          //             footer: 'SCHSL', timer: 3000, showCloseButton: false, showConfirmButton: false,
          //           });
          //         }

          //     if (data.msj === "Usuario o contraseña invalido!") {
          //       $(".content-input.pass p").html(data.msj);
          //       $(".content-input.pass p").attr("style", "visibility:;margin-top:.2vw");
          //       return;
          //     }

          //   },
          //   error: function(respuesta) {
          //     var data = JSON.parse(respuesta);
          //     console.log(data);
          //   }
          // });

        } else {
          $(".content-input.pass p").html("confirme la contraseña!");
          $(".content-input.pass p").attr("style", "visibility:;margin-top:.2vw");
        }

      } else {
        $(".content-input.user p").html("Ingrese la contraseña");
        $(".content-input.user p").attr("style", "visibility:;margin-top:.2vw");
      }
    }

  });

  $(".nuevoPassword").keyup(function(){
    var pass = $(".nuevoPassword").val();
    var rpass = checkPassword(pass);
    var passConfirm = $(".confirmarPassword").val();
    var rpassConfirm = checkPassword(passConfirm);
    if (rpass == true && rpassConfirm == true) {
      if(pass == passConfirm){ 
        $("#nombrePC").html("");  
        $("#nombrePC").html("Las contraseñas coinciden");
        $("#nombrePC").attr("style","color:#2AFF2A !important");
      }else{
        $("#nombrePC").html("Las contraseñas deben ser iguales");
        // $("#nombrePC").removeAttr("style");
      }   
    }else{
      if(rpass==false){
        if(pass.trim()==""){
          $("#nombreP").html("Debe ingresar su nueva contraseña");
        }else{
          $("#nombreP").html("La contraseña debe contener al menos 8 digitos, una letra en minuscula, una letra en mayuscula, un numero y un caracter especial");
        }
      }else{
        $("#nombreP").html("");
      }
      if(rpassConfirm==false){
        if(passConfirm.trim()==""){
          $("#nombrePC").html("Debe confirmar su nueva contraseña");
        }else{
          $("#nombrePC").html("Al confirmar la contraseña debe contener al menos 8 digitos, una letra en minuscula, una letra en mayuscula, un numero y un caracter especial");
        }
      }else{
        $("#nombrePC").html("");
      }
    }
  });

  $(".confirmarPassword").keyup(function(){
    var pass = $(".nuevoPassword").val();
    var rpass = checkPassword(pass);
    var passConfirm = $(".confirmarPassword").val();
    var rpassConfirm = checkPassword(passConfirm);
    
    if (rpass == true && rpassConfirm == true) {
      if(pass == passConfirm){ 
        $("#nombrePC").html("");  
        $("#nombrePC").html("Las contraseñas coinciden");
        $("#nombrePC").attr("style","color:#2AFF2A !important");
      }else{
        $("#nombrePC").html("Las contraseñas deben ser iguales");
        $("#nombrePC").removeAttr("style");
      }   
    }else{
      $("#nombrePC").removeAttr("style");
      if(rpass==false){
        if(pass.trim()==""){
          $("#nombreP").html("Debe ingresar su nueva contraseña");
        }else{
          $("#nombreP").html("La contraseña debe contener al menos 8 digitos, una letra en minuscula, una letra en mayuscula, un numero y un caracter especial");
        }
      }else{
        $("#nombreP").html("");
      }
      if(rpassConfirm==false){
        if(passConfirm.trim()==""){
          $("#nombrePC").html("Debe confirmar su nueva contraseña");
        }else{
          $("#nombrePC").html("Al confirmar la contraseña debe contener al menos 8 digitos, una letra en minuscula, una letra en mayuscula, un numero y un caracter especial");
        }
      }else{
        $("#nombrePC").html("");
      }
    }
  });
});


function checkPassword(str){
  var re = /^(?=.*\d)(?=.*[!@#$%^/&.*+-])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  return re.test(str);
}
function validarContras(id = "") {

  var pass = $(".nuevoPassword").val();
  var rpass = checkPassword(pass);
  var passConfirm = $(".confirmarPassword").val();
  var rpassConfirm = checkPassword(passConfirm);
  // alert(rpass);
  // alert(rpassConfirm);
  var rpass3 = false;

  if (rpass == true && rpassConfirm == true) {
    if(pass == passConfirm){ 
      $("#nombrePC"+id).html("");
      rpass3 = true;
    }else{
      $("#nombrePC"+id).html("Las contraseñas deben ser iguales");
      rpass3 = false;
    }   
  }else{
    if(rpass==false){
      if(pass.trim()==""){
        // alert('Pass Esta vacio');
        $("#nombreP"+id).html("Debe ingresar su nueva contraseña");
      }else{
        // alert('Pass No esta vacio');
        $("#nombreP"+id).html("La contraseña debe contener al menos 8 digitos, una letra en minuscula, una letra en mayuscula, un numero y un caracter especial");
      }
    }
    if(rpassConfirm==false){
      if(passConfirm.trim()==""){
        // alert('PassConfirm Esta vacio');
        $("#nombrePC"+id).html("Debe confirmar su nueva contraseña");
      }else{
        // alert('PassConfirm No esta vacio');
        $("#nombreP"+id).html("Al confirmar la contraseña debe contener al menos 8 digitos, una letra en minuscula, una letra en mayuscula, un numero y un caracter especial");
      }
    }

  }

  var validado = false;
  if (rpass == true && rpassConfirm == true && rpass3==true) {
    validado = true;
  } else {
    validado = false;
  }
  // alert(validado);
  return validado;
}

</script>

</body>

</html>
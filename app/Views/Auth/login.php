<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bribon Fiscal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/Auth/login.css">
</head>
<body>
  <div class="wrapper">
    <div class="top-bar" >
      <p> Un sitio Web oficial de la empresa <b>RENOVATIO PyME</b></p>
    </div>

    <nav class="navbar">
      <!-- <img src="assets/Auth/img/LogoBribonFiscal_Imagen.png" alt="Logo"> -->

      <button>Inicie Sesi&oacute;n en Bribon Fiscal</button>
    </nav>

    <div class="questions">
      <img src="assets/img/Auth/LogoBribonFiscal_Imagen1.png" alt="Logo">
      <br><br><br>
      <label data-target="respuesta1" class="selected">¿Qu&eacute; es Bribon Fiscal?</label>
      <label data-target="respuesta2">¿C&oacute;mo accedo a Bribon Fiscal?</label>
      <label data-target="respuesta3">Prop&oacute;sito de Bribon Fiscal</label>
    </div>

    <div class="content">
      <div class="answers" id="respuesta1">
        <div class="text-container">
          <h2>¿Qu&eacute; es Bribon Fiscal?</h2>
          <br>
          <br>
          <p class="panswers">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
          </p>
        </div>
        <div class="image-container">
          <img src="assets/img/Auth/CentroProcesosDatosLSD.png" class="answer-image">
        </div>
      </div>

      <div class="answers" id="respuesta2" style="display: none;">
        <div class="text-container">
          <h2>¿C&oacute;mo accedo a Bribon Fiscal?</h2>
          <br>
          <br>
          <p class="panswers">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
          </p>
        </div>
        <div class="image-container">
          <img src="assets/img/Auth/SecurityLapMD.png" class="answer-image">
        </div>
      </div>

      <div class="answers" id="respuesta3" style="display: none;">
        <div class="text-container">
          <h2>Prop&oacute;sito de Bribon Fiscal</h2>
          <br>
          <br>
          <p class="panswers">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
          </p>
        </div>
        <div class="image-container">
          <img src="assets/img/Auth/ProposIt.png" class="answer-image">
        </div>
      </div>
    </div>

    <div class="footer">

      <p> Copyright &copy; 2025 <b></b> Todos los derechos reservados. </p> - <p id="datetime"></p>
    </div>
  </div>


<!-- Fondo oscuro para el modal -->
<div class="modal-overlay"></div>

<!-- Modal de inicio de sesión -->
<div class="sign-up-modal" id="loginModal">
  <!-- <div id="close-modal-button"></div> -->

  <div class="logo-container">
   <!--  <svg class="logo" width="94.4px" height="56px">
      <g>
        <polygon points="49.3,56 49.3,0 0,28" />
        <path d="M53.7,3.6v46.3l40.7-23.2L53.7,3.6z M57.9,10.6l28.4,16.2L57.7,42.9V10.6z" />
      </g>
    </svg> -->
    <img src="assets/img/Auth/LogoBribonFiscalSF.png">
  </div>
  <br>
  <form class="details">
    <div class="input-container">
      <input class="col-sm-12 email-input with-placeholder" id="email" type="email" placeholder="Email" value="crisreyesc26@gmail.com" />
    </div>
    <div class="input-container">
      <input class="col-sm-12 password-input with-placeholder" id="password" type="password" placeholder="Password" value="R74-16C" />
    </div>

    <div class="col-sm-12 form-checkbox">
      <label>
        <input type="checkbox" value="true"> Keep me signed in
      </label>
    </div>

    <input id="sign-up-button" type="submit" value="Sign Up">

    <p>Already have an account? <a href="#signIn">Sign in</a></p>
  </form>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/Auth/login.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  
// mandar datos para iniciar sesion
$(document).ready(function(){

$("#sign-up-button").click(function(e){

  e.preventDefault();
  let email = $("#email").val();
  let password = $("#password").val();

  console.log(email);
  
  $.ajax({
 url: "<?= base_url('auth/verificarLogin') ?>", // Ruta al controlador
 type: "POST",
 data: { username: email, password: password },
 dataType: "json",
 success: function(response) {
  if (response.status === "ok") {
    //alert("Inicio de sesión exitoso");
                window.location.href = "<?= base_url('Home/Dashboard') ?>"; // Redirigir si es necesario
              } else {
                alert(response.message);
              }
            },
            error: function() {
              alert("Error en la solicitud");
            }
          });
});

});
</script>
</body>
</html>
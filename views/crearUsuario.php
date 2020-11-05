<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dirección de Comunicación Estratégica</title>
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- Icon UTP -->
  <link rel="shortcut icon" href="https://utp.ac.pa/sites/default/files/favicon.ico" type="image/vnd.microsoft.icon" />
</head>

<body>

  <div class="container">
    <h4 class="text-center display-4 mt-2 title">Crear cuenta</h4>
    <hr>
    <!-- Mensajes de información -->
    <div id="alerta">
    </div>
    <!-- Incluir archivo registro. -->
    <div class="message-success">
      <?php
      include("../admin/procesarUsuario.php");
      ?>
    </div>
    <!-- Sección del formulario -->
    <div class="container mb-2">
      <div class="row">
        <div class="col-md-6 section-left">

          <form action="crearUsuario.php" method="POST" name="formulario" enctype="multipart/form-data">
            <div class="form-group">
              <label class="font-weight-bold">Nombre</label>
              <input type="text" class="form-control font-italic" name="nombre" placeholder="Nombre..." required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Apellido</label>
              <input type="text" class="form-control font-italic" name="apellido" placeholder="Apellido..." required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Correo</label>
              <input type="email" class="form-control font-italic" name="correo" placeholder="Ejemplo@ejemplo.com" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Contraseña</label>
              <input type="password" class="form-control font-italic" name="contrasena" id="contrasena" placeholder="***********" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Confirmar Contraseña</label>
              <input type="password" class="form-control font-italic" name="confirmarcontra" id="valcontra" placeholder="***********" required>
            </div>

            <button type="submit" name="registro" class="btn btn-block btn-dark " onclick="validarFormulario()">Registrarse</button>
          </form>
          <small class="text-muted">Si eres un robot, bienvenido, acá no discriminamos.</small>

        </div>

        <div class="col-md-6 my-auto text-center section-right">
          <img src="../images/bat.gif" style="width: 350px; height: 350px; border: 2px solid #000;">
          <hr style="width:85%">
          <p class="session">¿Ya tienes una cuenta? <a class="font-weight-bold text-dark" href="../index.php" style="text-decoration: none;">Inicia Sesión</a></p>
        </div>

      </div>
    </div>

  </div>

  <!-- Archivo JS -->
  <script src="../js/personalJS/validar.js"></script>
  <!-- Bootstrap 4 Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>
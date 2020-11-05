<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dirección de Comunicación Estratégica</title>
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- Icon UTP -->
  <link rel="shortcut icon" href="https://utp.ac.pa/sites/default/files/favicon.ico" type="image/vnd.microsoft.icon" />
  <!-- Css Rocio -->
</head>

<body>
  <div class="container">
    <h4 class="text-center display-4 mt-2 title">Iniciar Sesión</h4>
    <hr>
    <!-- Alerta de mensaje -->
    <p class="text-danger text-center"> <?php if (isset($_GET['msg'])) echo $_GET['msg']; ?> </p>
    <div class="container">
      <div class="mx-auto w-50">
        
        <form action="admin/procesarLogin.php" method="POST">
          <div class="form-group">
            <label class="font-weight-bold">Correo</label>
            <input type="email" class="form-control font-italic" name="correo" placeholder="Ejemplo@ejemplo.com" required>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Contraseña</label>
            <input type="password" class="form-control font-italic" name="contrasena" placeholder="***********" required>
          </div>

          <button type="submit" name="iniciar" class="btn btn-block btn-dark">Iniciar Sesión</button>
          <button type="reset" class="btn btn-block btn-outline-danger">Cancelar</button>
        </form>

        <small class="text-muted">Ingresa a nuestra página y báilala como lisa.</small>
        <hr>
        <p>¿No tienes una cuenta? <a class="font-weight-bold text-dark" href="views/crearUsuario.php" style="text-decoration: none;">Regístrate</a></p>
      </div>
    </div>

  </div>

</body>

</html>
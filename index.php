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
  <title>LoginRegistro</title>
<link rel="stylesheet" href="css/estilos.css">


</head>

<body>
<div class="contenedor-form">

        <div id="crear" class="toggle">
            <span>Crear Cuenta</span>

        </div>
        <h2>DICOMES</h2>
        <h6>Sistema para comunicación y prensa para eventos en la UTP.</h6>
        <div id="login" class="formulario">
            <img src="images/logo_utp.jpg" class="logo">
            
            <h2>Iniciar Sesión</h2>
            <form action="admin/iniciar.php" method="POST">
                <input type="email" placeholder="&#128272; Correo" name="email" required>
                <input type="password" placeholder="&#128272; Contraseña" name="password" required>
                <input type="submit" value="Iniciar Sesión">

            </form>

        </div>
        <div id="iniciar" class="toggle-in">
            <span>LOGIN</span>

        </div>
        <div id="registro" class="formulario">
            <img src="images/logo_utp.jpg" class="logo" alt="">
            <h2>Crear Usuario</h2>
            <form action="admin/procesarUsuario.php" method="POST">
                <input type="text" placeholder="Nombre"  name="nombre" required>
                <input type="text" placeholder="Apellido" name="apellido" required>
                <input type="email" placeholder="Correo" name="email" required>
                <input type="password" placeholder="Contraseña" name="password1" required>
                <input type="password" placeholder="Repetir Contraseña" name="password2" required>
                <input type="submit" value="Registrarse">

            </form>

        </div>
        <div class="reset-password">
            <a href="#">¿Olvidó su contraseña?</a>
        </div>


    </div>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/form.js"></script>

    
</body>

</html>
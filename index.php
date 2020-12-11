<?php
    session_start();
    if(isset($_SESSION['sesionActiva']) == true){
        header('location: views/bienvenido.php');
    }
?>
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
<link rel="stylesheet" href="css/estilos.css">
<!-- Css Hi Rocio -->

</head>

<body>
<div class="contenedor-form">

        <div id="crear" class="toggle">
            <span>Crear Cuenta</span>

        </div>
        <h2>DICOMES</h2>
        <h6>Sistema para comunicación y prensa para eventos en la UTP</h6>
        <div id="login" class="formulario">
            <img src="images/logo_utp.jpg" class="logo">
            
            <h2>Iniciar Sesión</h2>
            <?php if(!empty($_REQUEST['msg']))
                echo "<span class='text-danger font-weight-bold'>".$_GET['msg']."</span>";
            ?>
            <?php if(!empty($_REQUEST['registroMensaje']))
                echo "<span class='text-danger font-weight-bold'>".$_GET['registroMensaje']."</span>";
            ?>

            <form action="admin/procesarLogin.php" method="POST">
                <input type="email" placeholder="&#128272; Correo" name="email" required>
                <input type="password" placeholder="&#128272; Contraseña" name="password" required>
                <input type="submit" value="Iniciar Sesión">

            </form>

        </div>
        <div id="iniciar" class="toggle-in">
            <span>Inicar Sesión</span>

        </div>
        <div id="registro" class="formulario">
            <!--<img src="images/logo_utp.jpg" class="logo" alt="">-->
            <h2>Crear Usuario</h2> 
            <form action="admin/procesarUsuario.php" method="POST"  id="form">
                <input type="text" placeholder="Nombre"  name="nombre" required>
                <input type="text" placeholder="Apellido" name="apellido" required>
                <input type="text" placeholder="Cédula"  name="cedula" required>
                <?php if(!empty($_REQUEST['registroMensaje']))
                echo "<span class='text-danger font-weight-bold'>".$_GET['registroMensaje']."</span>";
                ?>
                <div class="form-row">
                    <div class="col">
                    <input name="emailPrefijo" type="text" class="form-control" placeholder="nombre.apellido">
                    </div>
                    <div class="col">
                    <input name="emailSufijo" type="text" class="form-control" value="@utp.ac.pa" class="email2Parte" readonly>
                    </div>
                </div>

                <input type="password" placeholder="Contraseña" name="password1" id="password1" required>
                <div id="error" style="color:red;"></div>
                <input type="password" placeholder="Repetir Contraseña" name="password2"  id="password2" required>
                <select name="sede" class="custom-select" required>
                    <option value="" selected>Seleccione un Centro regional</option>
                    <option value="Centro Regional de Veraguas">Centro Regional de Veraguas</option>
                    <option value="Centro Regional de Panamá Oeste">Centro Regional de Panamá Oeste</option>
                    <option value="Centro Regional de Azuero">Centro Regional de Azuero</option>
                    <option value="Centro Regional de Chiriquí">Centro Regional de Chiriquí</option>
                    <option value="Centro Regional de Colón">Centro Regional de Colón</option>
                    <option value="Centro Regional de Coclé">Centro Regional de Coclé</option>
                </select>

                <input type="submit" value="Registrarse">

            </form>

        </div>
        <div class="reset-password">
            <a href="#">¿Olvidó su contraseña?</a>
        </div>


    </div>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/form.js"></script>
    <script defer src="js/personalJS/registro.js"></script>
</body>

</html>
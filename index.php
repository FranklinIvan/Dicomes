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
            <img src="img/logo_utp.jpg" class="logo" alt="">
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

    <!---------- Footer ------->
    <footer class="page-footer font-smal pt-5 text-white" style="background-color:rgb(81,3,79); padding-bottom: 20px;">
        <div class="container-fluid text-center text-md-left">
  
        <!-- Grid row -->
        <div class="row">

        <div class="col-lg-1 col-md-1  mb-md-0 mb-3"></div>
        <!-- Grid column -->
        <div class=" col-lg-1 col-md-2 col-sm-12 mt-md-0 mb-3">
            <img src="images/logoutp3.png" class="img-fluid" id="footer-utp-logo">
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-4 col-md-3 col-sm-12 mt-md-0 mt-3">
          <!-- Contenido izquierdo -->
          <span style="font-size:12px;">
            Universidad Tecnológica de Panamá - 2020<br>
            Dirección: Avenida Universidad Tecnológica de Panamá, Vía Puente Centenario,<br>
            Campus Metropolitano Víctor Levi Sasso. <br>
            Teléfono. (507) 560-3000 <br>
            Correo electrónico: buzondesugerencias@utp.ac.pa <br>
            Políticas de Privacidad
            </span>
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none pb-3">
  
        <div class="col-lg-2 col-md-1 mb-md-0 mb-3"></div>

        <!-- Grid column -->
        <!-- Links lado izquierdo -->
        <div class="col-lg-1 col-md-2 mb-md-0 mb-3" id="footer-right-links">
          <ul class="list-unstyled">
            <li>
              <a href="http://matricula.utp.ac.pa/" target="_blank" class="text-white" id="footer-link">Matrícula UTP</a>
            </li>
            <li>
              <a href="http://correo.utp.ac.pa/" target="_blank" class="text-white">Correo UTP</a>
            </li>
            <li>
              <a href="http://www.sistemadebibliotecas.utp.ac.pa/" target="_blank" class="text-white">Biblioteca UTP</a>
            </li>
            <li>
              <a href="https://utp.ac.pa/introduccion-la-seccion-de-publicaciones" target="_blank" class="text-white">Publicaciones</a>
            </li>
            <li>
                <a href="https://utp.ac.pa/noticias" target="_blank" class="text-white">Sala de Prensa</a>
            </li>
            <li>
                <a href="https://utp.ac.pa/bolsa-de-trabajo-0" target="_blank" class="text-white">Bolsa de Trabajo</a>
            </li>
            <li>
                <a href="https://utp.ac.pa/introduccion-acreditacion" target="_blank" class="text-white">Acreditación</a>
            </li>
            <li>
                <a href="http://centrodelenguas.utp.ac.pa/" target="_blank" class="text-white">Centro de Lenguas</a>
            </li>
          </ul>
  
        </div>
        <!-- /links lado izquierdo -->
        <!-- Grid column -->
  
        <!-- Grid column -->
        <!-- Links lado derecho -->
        <div class="col-lg-2 col-md-2 mb-md-0 mb-3" id="footer-left-links">
          <ul class="list-unstyled">
            <li>
              <a href="https://utp.ac.pa/mapas-de-ubicacion" target="_blank" class="text-white">Mapa de Ubicación</a>
            </li>
            <li>
              <a href="https://utp.ac.pa/mapa-del-sitio" target="_blank" class="text-white">Mapa del Sitio</a>
            </li>
            <li>
              <a href="https://utp.ac.pa/directorio-telefonico" target="_blank" class="text-white">Directorio Telefónico</a>
            </li>
            <li>
              <a href="https://utp.ac.pa/contactenos" target="_blank" class="text-white">Contáctenos</a>
            </li>
            <li>
                <a href="https://utp.ac.pa/identidad-visual-de-la-utp" target="_blank" class="text-white">Identidad Visual</a>
            </li>
          </ul>
            <!--Iconos de redes sociales-->
            <!-- Grid column -->
            <div class="col-md-12 py-5">
                <div class="mb-5 flex-center">
                <a href="https://www.facebook.com/paginautp" target="_blank" rel="noopener noreferrer" title="UTP en Facebook">
                    <img src="images/SocialMediaIcons/facebook.png" id="footer-social" >
                </a>

                <a href="https://twitter.com/utppanama" target="_blank" rel="noopener noreferrer" title="UTP en Twitter">
                    <img src="images/SocialMediaIcons/twitter.png"  id="footer-social" >
                </a>

                <a href="https://www.youtube.com/user/UTPPanama" target="_blank" rel="noopener noreferrer" title="UTP en Youtube">
                    <img src="images/SocialMediaIcons/youtube.png" id="footer-social">
                </a>

                <a href="https://www.instagram.com/utppanama" target="_blank" rel="noopener noreferrer" title="UTP en Instagram">
                    <img src="images/SocialMediaIcons/instagram.png" id="footer-social">
                </a>

                </div>
            </div>
            <!-- Grid column -->
            <!--/Iconos de redes sociales-->

        </div>
        <!-- /links lado izquierdo -->
        <!-- Grid column -->
  
      </div>
      <!-- Grid row -->
  </footer>
  <!----- /Footer ----->

</body>

</html>
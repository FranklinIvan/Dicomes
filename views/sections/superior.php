<?php
include('../admin/verificarSesion.php');
require('../admin/conexionDB.php');
if ($_SESSION['tipoUsuario'] == 1) {
    $sql = $conex->query("SELECT * FROM v_notificacion WHERE id_cliente =" . $_SESSION['id']);
    $sinLeer = $conex->query("SELECT * FROM v_notificacion WHERE leido = 1 and id_cliente =" . $_SESSION['id'])->rowCount();
} else {
    $sql = $conex->query("SELECT * FROM v_notificacion");
    $sinLeer = $conex->query("SELECT * FROM v_notificacion WHERE leido = 0")->rowCount();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Icon UTP -->
    <link rel="shortcut icon" href="https://utp.ac.pa/sites/default/files/favicon.ico" type="image/vnd.microsoft.icon" />

    <!-- Assets JS -->
    <script src="../js/personalJS/funciones.js"></script>

    <title>Dirección de Comunicación Estratégica</title>

    <!-- Custom fonts for this template-->
    <link href="../css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        #solicitudesCobertura,
        #listaDeEventos,
        #solicitudCambio,
        #agenda,
        #sobreNosotros,
        #contacto {
            transition: background-color 0.2s ease;
        }

        #solicitudesCobertura:hover,
        #listaDeEventos:hover,
        #solicitudCambio:hover,
        #agenda:hover,
        #sobreNosotros:hover,
        #contacto:hover {
            background-color: #91089669;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #68086c;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../views/bienvenido.php">


                <div class="sidebar-brand-icon">
                    <img src="../images/logoutp3.png" alt="imagen" style="width: 50px; height: 50px;">

                </div>
                <div class="sidebar-brand-text mx-3"> Dicomes </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="agenda">
                <a class="nav-link" href="../views/bienvenido.php">
                    <i id="agendaIcon" class="fas fa-fw fa-calendar-alt"></i>
                    <span id="agendaTitulo">Agenda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Visualizar
            </div>

            <?php if ($tipoUsuario == 1) { ?>
                <!-- Nav Item - Tables -->
                <li class="nav-item" id="">
                    <a class="nav-link" href="../views/Cli_misSolicitudes.php">
                        <i class="fas fa-fw fa-envelope" id=""></i>
                        <span id="">Mis Solicitudes</span></a>
                </li>

                <li class="nav-item" id="">
                    <a class="nav-link" href="#">
                        <i class="fas fa-fw fa-envelope" id=""></i>
                        <span id="">Preguntas Frecuentes</span></a>
                </li>
            <?php } else { ?>
                <li class="nav-item" id="solicitudesCobertura">
                    <a class="nav-link" href="../views/solicitudesCobertura.php">
                        <i class="fas fa-fw fa-envelope" id="solicitudesCoberturaIcon"></i>
                        <span id="solicitudesCoberturaTitulo">Solicitudes de cobertura</span></a>
                </li>

                <li class="nav-item" id="listaDeEventos">
                    <a class="nav-link" href="../views/listaEventos.php">
                        <i class="fas fa-fw fa-calendar-check" id="listaDeEventosIcon"></i>
                        <span id="listaDeEventosTitulo">Lista de eventos</span></a>
                </li>

                <li class="nav-item" id="solicitudCambio">
                    <a class="nav-link" href="../views/solicitudesCambio.php">
                        <i class="fas fa-fw fa-exchange-alt" id="solicitudCambioIcono"></i>
                        <span id="solicitudCambioTitulo">Solicitudes de cambio</span></a>
                </li>
            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Información
            </div>

            <li class="nav-item" id="sobreNosotros">
                <a class="nav-link" href="../views/sobreNosotros.php">
                    <i class="fas fa-fw fa-table" id="sobreNosotrosIcon"></i>
                    <span id="sobreNosotrosTitulo">Sobre Nosotros</span></a>
            </li>

            <li class="nav-item" id="contacto">
                <a class="nav-link" href="../views/contacto.php">
                    <i class="fas fa-fw fa-address-card" id="contactoIcon"></i>
                    <span id="contactoTitulo">Contacto</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>



                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw text-gray-500"></i>
                            <!-- Counter - Messages -->
                            <?php if ($sinLeer > 0) {  ?>
                                <span class="badge badge-danger badge-counter"><?php echo $sinLeer ?></span>
                            <?php } ?>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <!-- <h6 class="dropdown-header" style="background-color: #2f2f2f; border:1px solid #2f2f2f;">
                                Mensajes
                            </h6> -->
                            <?php
                            if ($sinLeer == 0) { ?>
                                <!-- Mensaje cuandono hay notificaciones -->
                                <div class="font-weight-bold text-center mt-3">
                                    <p>No tienes mensajes nuevos</p>
                                </div>
                            <?php } else { ?>
                                <div class="dropdown-item text-center text-gray-500">Mensajes</div>
                                <?php
                                foreach ($sql as $noti) {
                                    $datos = $noti['nombre'] . "/" .
                                        $noti['apellido'] . "/" .
                                        $noti['mensaje'];
                                ?>
                                    <a onclick="mostrarNoti('<?php echo $datos ?>')" data-toggle="modal" data-target="#messageModal" class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="../images/imagesDB/5.png" alt="">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate"><?php echo $noti['mensaje'] ?></div>
                                            <div class="small text-gray-500"><?php echo $noti['nombre'] . $noti['apellido'] ?></div>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Leer más mensajes</a>
                            <?php
                            }
                            ?>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-dark small"><?php echo $nombre . " " . $apellido ?></span>
                            <img class="img-profile rounded-circle" src="../images/imagesDB/6.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="../views/datosPersonales.php">
                                <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                Datos Personales
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cerrar Sesión
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
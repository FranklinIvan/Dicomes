<?php
    session_start();
    if(isset($_SESSION['sesionActiva']) == false){
        header('location: ../index.php');
    }else{
        $id = $_SESSION['id'];
        $nombre = $_SESSION['nombre'];
        $apellido = $_SESSION['apellido'];
        $correo = $_SESSION['correo'];
        $foto = $_SESSION['foto'];
    }
?>

<?php
    session_start();
    //require('verificarSesion.php');
    //Conexión BD
    require('conexionDB.php');

    if(isset($_POST['correo']) and isset($_POST['contrasena'])){
        $sql = $conex->prepare('SELECT id_usuario, nombre, apellido, correo, foto FROM usuario WHERE correo=:correo and password=:contrasena');
        $sql->bindParam(':correo',$_POST['correo']);
        $sql->bindParam(':contrasena',md5($_POST['contrasena']));
        $sql->execute();

        $resultados = $sql->fetch(PDO::FETCH_ASSOC);

        if($resultados){
            $_SESSION['sesionActiva'] = true;
            $_SESSION['id'] = $resultados['id_usuario'];
            $_SESSION['correo'] = $resultados['correo'];
            $_SESSION['nombre'] = $resultados['nombre'];
            $_SESSION['apellido'] = $resultados['apellido'];
            $_SESSION['foto'] = $resultados['foto'];
            header("location: ../views/bienvenido.php");
        }else{
            $error = "Datos incorrectos para ingresar. Intente otra vez.";
            header("location: ../index.php?msg=$error");
            exit;
        }
    }

?>
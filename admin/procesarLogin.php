<?php
    session_start();
    //require('verificarSesion.php');
    //Conexión BD
    require('conexionDB.php');

    if(isset($_POST['email']) and isset($_POST['password'])){

        $email = $_POST['email'];
        $contrasena = md5($_POST['password']);
        //Consulta inicial para ver si existe el usuario CLIENTE.
        $sql = $conex->prepare('SELECT id_cliente, nombre, apellido, correo FROM cliente WHERE correo=:correo AND contrasena=:contrasena');
        $sql->bindParam(':correo',$email);
        $sql->bindParam(':contrasena',$contrasena);
        $sql->execute();

        $resultados = $sql->fetch(PDO::FETCH_ASSOC);

        //CLIENTE
        if($resultados){
            //Ahora toca revisar si la cuenta ha sido activada
            $sql2 = $conex->prepare('SELECT * FROM cliente WHERE correo=:correo AND activacion=1');
            $sql2->bindParam(':correo',$email);
            $sql2->execute();

            $validarActivacion = $sql2->fetch(PDO::FETCH_ASSOC);
            //Si la cuenta esta activada asigna valor a las sesiones y entra al sistema.
            if($validarActivacion){
                $_SESSION['sesionActiva'] = true;
                $_SESSION['id'] = $resultados['id_cliente'];
                $_SESSION['correo'] = $resultados['correo'];
                $_SESSION['nombre'] = $resultados['nombre'];
                $_SESSION['apellido'] = $resultados['apellido'];
                //$_SESSION['foto'] = $resultados['foto'];
                header("location: http://prensautp.ds507.online/Prototipo/ClienteDicomes/views/bienvenido.php");
                
                exit;
            }else{
                $error = "La cuenta no ha sido activada.";
                header("location: ../index.php?msg=$error");
                exit;
            }
        }else{
            //TODO: si no esta en la tabla de cliente entonces se debe buscar en la tabla de personal.
            //Si existe en la tabla personal resta ver si es un admin o comunicador social.
            $sql = $conex->prepare('SELECT * FROM personal WHERE correo=:correo AND contrasena=:contrasena');
            $sql->bindParam(':correo',$email);
            $sql->bindParam(':contrasena',$contrasena);
            $sql->execute();

            $resultados = $sql->fetch(PDO::FETCH_ASSOC);

            if($resultados){
                $_SESSION['sesionActiva'] = true;
                $_SESSION['id'] = $resultados['id_personal'];
                $_SESSION['correo'] = $resultados['correo'];
                $_SESSION['nombre'] = $resultados['nombre'];
                $_SESSION['apellido'] = $resultados['apellido'];
                //$_SESSION['foto'] = $resultados['foto'];
                header("location: ../views/bienvenido.php");
                exit;
            }
            else{
                $error = "Datos incorrectos.";
                header("location: ../index.php?msg=$error");
                exit;
            }

        }
    }



/* --- CODIGO ORIGINAL QUE SOLO VALIDA AL CLIENTE.
    session_start();
    //require('verificarSesion.php');
    //Conexión BD
    require('conexionDB.php');

    if(isset($_POST['email']) and isset($_POST['password'])){

        $email = $_POST['email'];
        $contrasena = md5($_POST['password']);
        //Consulta inicial para ver si existe el usuario.
        $sql = $conex->prepare('SELECT id_cliente, nombre, apellido, correo FROM cliente WHERE correo=:correo AND contrasena=:contrasena');
        $sql->bindParam(':correo',$email);
        $sql->bindParam(':contrasena',$contrasena);
        $sql->execute();

        $resultados = $sql->fetch(PDO::FETCH_ASSOC);

        //Si el usuario existe entra al if
        if($resultados){
            //Ahora toca revisar si la cuenta ha sido activada
            $sql2 = $conex->prepare('SELECT * FROM cliente WHERE correo=:correo AND activacion=1');
            $sql2->bindParam(':correo',$email);
            $sql2->execute();

            $validarActivacion = $sql2->fetch(PDO::FETCH_ASSOC);
            //Si la cuenta esta activada asigna valor a las sesiones y entra al sistema.
            if($validarActivacion){
                $_SESSION['sesionActiva'] = true;
                $_SESSION['id'] = $resultados['id_cliente'];
                $_SESSION['correo'] = $resultados['correo'];
                $_SESSION['nombre'] = $resultados['nombre'];
                $_SESSION['apellido'] = $resultados['apellido'];
                //$_SESSION['foto'] = $resultados['foto'];
                header("location: ../views/bienvenido.php");
                exit;
            }else{
                $error = "La cuenta no ha sido activada.";
                header("location: ../index.php?msg=$error");
                exit;
            }
        }else{
            //Si la cuenta no existe, ahora toca ver que ingreso mal.
            //Primero revisa si el correo existe en la base de datos.
            $sql3 = $conex->prepare('SELECT * FROM cliente WHERE correo=:correo');
            $sql3->bindParam(':correo',$email);
            $sql3->execute();
            $validarCorreo = $sql3->fetch(PDO::FETCH_ASSOC);
            //Si el correo EXISTE en la base de datos... ingreso una Contraseña Incorrecta
            if($validarCorreo){
                $error = "Contraseña incorrecta.";
            }else{
            //Si no se encuentra el correo.... El usuario no existe
                $error = "Usuario no encontrado, intente nuevamente.";
            }  
            header("location: ../index.php?msg=$error");
            exit;
        }
    }
 */

?>


<?php 
    include("conexionDB.php");

    //Verificar que haya llegado mediante el link de activacion
    if(isset($_GET['e'])  && isset($_REQUEST['a'])){
        $emailActivacion = $_REQUEST['e'];
        $hash = $_REQUEST['a'];

        $resultActivacion = $conex->prepare("SELECT * FROM cliente WHERE correo=? and hash=?");
        $resultActivacion->execute([$emailActivacion,$hash]);

        if($resultActivacion->rowCount() > 0){
            $row = $resultActivacion->fetch();
            $id = $row['id_cliente'];
            $sqlActivarUsuario = $conex->exec("UPDATE cliente set activacion = 1 WHERE id_cliente = '$id'");

            header("location: ../views/activarUsuario.php?msg=Usuario activado correctamente. <br> Ya puede inicar sesion al sistema");
            exit;
        }else{
            header("location: ../views/activarUsuario.php?msg=Activacion fallida. Usuario no encontrado.");
            exit;
        }

    }else{
        header("location: ../index.php");
        exit;
    }


?>
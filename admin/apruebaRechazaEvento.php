<?php
    require("conexionDB.php");
    
    if (isset ($_REQUEST['id_servicio'])){
    $id_servicio = $_REQUEST['id_servicio'];
    $id_cliente =  $_REQUEST['id_cliente'];
    }
    else{
        echo "La variable no esta definida";
    }

    if( $_POST['submit'] =='Aceptar'){
        $estado = "aceptado";
        $color = "mediumseagreen";
        try {
            $sql=$conex->exec("UPDATE servicio SET estado='$estado', color='$color' WHERE id ='$id_servicio'");

            $mensaje = "Aceptado";
            $leido = 1;
            $sql2=$conex->exec("UPDATE notificaciones SET mensaje='$mensaje', leido='$leido' WHERE id_servicio = '$id_servicio'" );

            } catch (PDOException $e) {
                throw $e;
            }
    }else{
        try {
            $sql=$conex->exec("DELETE FROM notificaciones WHERE id_servicio ='$id_servicio'");
            $sql2=$conex->exec("DELETE FROM servicio WHERE id ='$id_servicio'");

            $mensaje = "Rechazado";
            $leido = 1;
            $sql3=$conex->exec("INSERT INTO notificaciones(mensaje,leido,id_cliente) VALUES('$mensaje','$leido','$id_cliente')");

            
        } catch (PDOException $e) {
            throw $e;
        }
    }

    echo $_POST['submit'].$estado;
    
    if($sql==true){
            header("Location:../views/solicitudesCobertura.php");
    }else{
        echo  "Error en la actualizacion";
    }
?>
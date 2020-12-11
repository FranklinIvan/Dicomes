<?php
    include('../admin/verificarSesion.php');
    require("conexionDB.php");
    
    if (isset ($_REQUEST['id_servicio'])){
    $id_servicio = $_REQUEST['id_servicio'];
    $id_cliente =  $_REQUEST['id_cliente'];
    }
    else{
        echo "La variable no esta definida";
    }

    if( $_POST['submit'] =='Aceptar'){
        //Mensaje y color para mostrar en la pagina.
        $msg = "Solicitud aceptada";
        $colorMsg = "alert-success";

        $estado = "aceptado";
        $color = "mediumseagreen";
        try {
            $sql=$conex->exec("UPDATE servicio SET estado='$estado', color='$color', id_personal = '$id' WHERE id ='$id_servicio'");

            if($_REQUEST['motivo'] == ""){
                $mensaje = "Su solicitud ha sido aceptado.";
            }else{
                $mensaje = $_REQUEST['motivo'];
            }
            $leido = 1;
            $sql2=$conex->exec("UPDATE notificaciones SET mensaje='$mensaje', leido='$leido' WHERE id_servicio = '$id_servicio'" );

            

            } catch (PDOException $e) {
                throw $e;
            }
    }else{
        try {
            //Mensaje y color para mostrar en la pagina.
            $msg = "Solicitud rechazada";
            $colorMsg = "alert-warning";

            $sql=$conex->exec("DELETE FROM notificaciones WHERE id_servicio ='$id_servicio'");
            $sql2=$conex->exec("DELETE FROM servicio WHERE id ='$id_servicio'");
            
            if($_REQUEST['motivo'] == ""){
                $mensaje = "Su solicitud ha sido rechazada.";
            }else{
                $mensaje = $_REQUEST['motivo'];
            }
            $leido = 1;
            $sql3=$conex->exec("INSERT INTO notificaciones(mensaje,leido,id_cliente) VALUES('$mensaje','$leido','$id_cliente')");

            
        } catch (PDOException $e) {
            throw $e;
        }
    }

    echo $_POST['submit'].$estado;
    
    if($sql==true){
            header("Location:../views/solicitudesCobertura.php?msg=".$msg."&color=".$colorMsg);
    }else{
        echo  "Error en la actualizacion";
    }
?>
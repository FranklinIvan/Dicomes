<?php
    include('../admin/verificarSesion.php');
    require("conexionDB.php");
    
    if (isset ($_REQUEST['id_servicio'])){
    $id_servicio = $_REQUEST['id_servicio'];
    $id_cliente =  $_REQUEST['id_cliente'];
    $tipoSevicio =  $_REQUEST['verTipoServicio'];
    echo $tipoSevicio;
    }
    else{
        echo "La variable no esta definida";
    }

    if( $_POST['submit'] =='Aceptar'){
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

            // Esto no lo quiero hacer, pero bueno.
            if($tipoSevicio == "Graduación"){
                $tipoSevicio = 1;
            }else if($tipoSevicio == "Congreso"){
                $tipoSevicio = 2;
            }else if($tipoSevicio == "Seminario"){
                $tipoSevicio = 3;
            }else if($tipoSevicio == "Presentación"){
                $tipoSevicio = 4;
            }else if($tipoSevicio == "Evento"){
                $tipoSevicio = 5;
            }else if($tipoSevicio == "Otro"){
                $tipoSevicio = 6;
            }

            $sql3=$conex->exec("INSERT INTO atiende (id_servicio, id_personal, cod_tipo) VALUES('$id_servicio','$id_cliente','$tipoSevicio')");
 
            if($sql == true and $sql2 == true and $sql3 == true){
                header("Location:../views/solicitudesCobertura.php?solicitudAceptada");
            }else{
                header("Location:../views/solicitudesCobertura.php?error");
            }
            
        } catch (PDOException $e) {
            throw $e;
        }
    }else{
        try {
            $sql=$conex->exec("DELETE FROM servicio WHERE id ='$id_servicio'");
            
            if($_REQUEST['motivo'] == ""){
                $mensaje = "Su solicitud ha sido rechazada.";
            }else{
                $mensaje = $_REQUEST['motivo'];
            }
            $leido = 1;
            $sql2=$conex->exec("INSERT INTO notificaciones(mensaje,leido,id_cliente) VALUES('$mensaje','$leido','$id_cliente')");

            if($sql == true and $sql2 == true){
                header("Location:../views/solicitudesCobertura.php?solicitudRechazada");
            }else{
                header("Location:../views/solicitudesCobertura.php?error");
            }

        } catch (PDOException $e) {
            throw $e;
        } 
    }

?>
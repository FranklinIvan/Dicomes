<?php
require("conexionDB.php");

//Se valida si selecciono una solicitud, o sea si viene de la pagina solicitudesCambio.php
if(isset($_REQUEST['idSolicitud'])){

    $mensaje = "";
    $color = "";
    //Si fue ACEPTADA
    if($_REQUEST['accion'] == 'aceptar' ){
        $sql = "UPDATE servicio SET start=?, hora_inicio=?, hora_final=?, ubicacion=?, descripcion=? WHERE id=?";
        $stmt= $conex->prepare($sql);
        $stmt->execute([$_REQUEST['a_fechaForm'], $_REQUEST['a_hora_inicioForm'], $_REQUEST['a_hora_finalForm'], 
        $_REQUEST['a_ubicacionForm'],  $_REQUEST['a_descripcionForm'],  $_REQUEST['idServicio']]);
    
        //Si se ejecuto, elimina esta solicitud de la tabla.
        if($stmt){
            $sql = "DELETE FROM actualizar WHERE id_solicitud=?";
            $stmt= $conex->prepare($sql);
            $stmt->execute([$_REQUEST['idSolicitud']]);
            $mensajeEvento = "Cambios realizados";
            $color = "alert-success";
        }
        //SI FUE RECHAZADA.
    }else if ($_REQUEST['accion'] == 'rechazar' ) {
        $sql = "DELETE FROM actualizar WHERE id_solicitud=?";
        $stmt= $conex->prepare($sql);
        $stmt->execute([$_REQUEST['idSolicitud']]);
        $mensajeEvento = "Solicitud rechazada";
        $color = "alert-warning";
    }

    //Se manda el mensaje al cliente.
    $mensaje = $_REQUEST['mensaje'];
    $leido = 1;
    $id_servicio =  $_REQUEST['idServicio'];
    $sql2=$conex->exec("UPDATE notificaciones SET mensaje='$mensaje', leido='$leido' WHERE id_servicio = '$id_servicio'" );

    header("location: ../views/solicitudesCambio.php?msg=". $mensajeEvento .".&color=".$color);
    exit;

}else{
    header("location: ../views/solicitudesCambio.php");
    exit;
}

?>
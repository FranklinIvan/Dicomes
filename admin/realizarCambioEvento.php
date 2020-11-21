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
            $mensaje = "Cambios realizados";
            $color = "alert-success";
        }
        //SI FUE RECHAZADA.
    }else if ($_REQUEST['accion'] == 'rechazar' ) {
        $sql = "DELETE FROM actualizar WHERE id_solicitud=?";
        $stmt= $conex->prepare($sql);
        $stmt->execute([$_REQUEST['idSolicitud']]);
        $mensaje = "Solicitud rechazada";
        $color = "alert-warning";
    }

    //Se manda el mensaje al cliente.
    $sql = "INSERT INTO notificaciones (mensaje,id_cliente,leido) VALUES (?,?,?)";
    $stmt= $conex->prepare($sql);
    $stmt->execute([$_REQUEST['mensaje'],$_REQUEST['idCliente'],0]);
    //Se vuelve a la pagina anterior con los mensajes.
    header("location: ../views/solicitudesCambio.php?msg=". $mensaje .".&color=".$color);
    exit;

}else{
    header("location: ../views/solicitudesCambio.php");
    exit;
}

?>
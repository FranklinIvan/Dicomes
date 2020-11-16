<?php
require("conexionDB.php");

if(isset($_REQUEST['idSolicitud'])){



    $sql = "UPDATE servicio SET fecha=?, hora_inicio=?, hora_final=?, ubicacion=?, descripcion=? WHERE id_servicio=?";
    $stmt= $conex->prepare($sql);
    $stmt->execute([$_REQUEST['a_fechaForm'], $_REQUEST['a_hora_inicioForm'], $_REQUEST['a_hora_finalForm'], 
    $_REQUEST['a_ubicacionForm'],  $_REQUEST['a_descripcionForm'],  $_REQUEST['idServicio']]);

    if($stmt){
        $sql = "DELETE FROM actualizar WHERE id_servicio=?";
        $stmt= $conex->prepare($sql);
        $stmt->execute([$_REQUEST['idServicio']]);
        header("location: ../views/solicitudesCambio.php?msg=Cambios realizados.");
        exit;
    }

}else{
    header("location: ../views/solicitudesCambio.php");
    exit;
}

?>
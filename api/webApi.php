<?php
    include("../admin/conexionDB.php");
    header("Content-type: application/json");

    $consulta = $conex->query("SELECT*FROM servicio WHERE estado = 'aceptado'");
    $listadoEventos = $consulta->fetchAll(PDO::FETCH_OBJ);
    print_r(json_encode($listadoEventos,JSON_UNESCAPED_UNICODE));
?>
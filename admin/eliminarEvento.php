<?php
        include("conexionDB.php");

        if (isset ($_REQUEST['id_servicioE']))
        {
        $id_servicio=$_REQUEST['id_servicioE'];

        $sentencia=$conex->exec("DELETE FROM servicio WHERE id_servicio='$id_servicio'");

        if($sentencia=true){
            
            return header ("Location:../views/listaEventos.php");
        }else{
            echo"Error al eliminar";
        }
        }else{
             echo "La variable no esta definida";
            }
?>
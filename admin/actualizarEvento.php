<?php

        require("conexionDB.php");
        if (isset ($_REQUEST['id_servicioA']))
        {
        $id_servicio=$_REQUEST['id_servicioA'];
        $fecha=$_REQUEST['nuevaFecha'];
        $ubicacion=$_REQUEST['nuevaUbicacion'];
        $hora_inicial=$_REQUEST['nuevaHoraInicial'];
        $hora_final=$_REQUEST['nuevaHoraFinal'];
        $descripcion=$_REQUEST['nuevaDescripcion'];

        $sql=$conex->exec("UPDATE servicio SET start='$fecha', 
                                                ubicacion='$ubicacion', 
                                                hora_inicio='$hora_inicial', 
                                                hora_final='$hora_final', 
                                                descripcion='$descripcion'
                                                WHERE id='$id_servicio' ");   
                if($sql==true){
                        header("Location:../views/listaEventos.php?msgActualizado=Actualizado");

                }else{
                        echo  "Error en la actualizacion";
                }
        }else{
                echo "La variable no esta definida";
        }



        ?>
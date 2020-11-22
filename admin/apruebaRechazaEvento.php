<?php
       
    require("conexionDB.php");
    $estado=0;

    if (isset ($_REQUEST['id_servicio'])){
    $id_servicio = $_REQUEST['id_servicio'];
    }
    else{
        echo "La variable no esta definida";
    }

    if( $_POST['submit'] =='Aceptar'){
        $estado = "aceptado";
        $color= "mediumseagreen";
        try {
            $sql=$conex->exec("UPDATE servicio SET estado='$estado', color='$color' WHERE id ='$id_servicio'"); 

            } catch (PDOException $e) {
                throw $e;
            }
    }else{
        try {
            $sql=$conex->exec("DELETE FROM servicio WHERE id ='$id_servicio'"); 
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
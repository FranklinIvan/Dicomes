<?php
       
        require("conexionDB.php");
        $estado=0;
        
            if (isset ($_REQUEST['id_servicio']))
        {
        $id_servicio = $_REQUEST['id_servicio'];
        }else{
            echo "La variable no esta definida";
        }

        if( $_POST['submit'] =='Aceptar') 
        {
            $estado = 1;
        }else {
            $estado = 2;
        }
        
        echo $_POST['submit'].$estado;

        try {

        $sql=$conex->exec("UPDATE servicio SET estado='$estado' WHERE id ='$id_servicio'"); 

        } catch (mysqli_sql_exception $e) {
            throw $e;
        }

                if($sql==true){
                        header("Location:../views/solicitudesCobertura.php");

                }else{
                       
                        echo  "Error en la actualizacion";
                }
        
   


        ?>
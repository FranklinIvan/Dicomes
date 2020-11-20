<?php

session_start();
require('conexionDB.php');


    try {
        $sql = ('SELECT  fecha, ubicacion, horainicio, horafinal, tiposervicio,tipoevento, cantperson, descripcion FROM servicio');
        $stmt = $conex->prepare($sql);
        $stmt->execute();

        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
       
        if($resultados){
            $_SESSION['sesionActiva'] = true;
            $_SESSION['id'] = $resultados['id_usuario'];
            $_SESSION['correo'] = $resultados['correo'];
            $_SESSION['nombre'] = $resultados['nombre'];
            $_SESSION['apellido'] = $resultados['apellido'];
            $_SESSION['foto'] = $resultados['foto'];
            header("location: ../views/solicitudesCobertura.php");
        }else{
            $error = "Datos incorrectos para ingresar. Intente otra vez.";
            header("location: ../index.php?msg=$error");
            exit;
        }
       
    } catch (PDOException $e) {
        $error = $stmt->errorInfo();
        //echo var_dump($error);
        if($error[1] == 1062){
            ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <span>El correo que ha ingresado, ya existe.</span>
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
                    </button>
                </div>
            <?php
        }
        
    }

?>
<?php 
    require('verificarSesion.php');
    require('conexionDB.php');

    if(isset($_POST['actualizar'])){
        try {

            $sqlUpdate = "UPDATE usuario SET nombre=:nombre, apellido=:apellido, correo=:correo, foto=:foto WHERE id_usuario = '$id'";
            $stmt = $conex->prepare($sqlUpdate);
            $stmt->bindParam(':nombre',$_POST['nombre']);
            $stmt->bindParam(':apellido',$_POST['apellido']);
            $stmt->bindParam(':correo',$_POST['correo']);
            
            // Validar foto 
            $permitidos = array("image/jpg","image/jpeg","image/png");
            $fotoEnviada = ($_FILES['foto']['name']);
            if($fotoEnviada == true) {
                $temp = ($_FILES['foto']['tmp_name']);
                $foto = $id.".png";
                move_uploaded_file($temp, "../images/imagesDB/".$foto);
            }
            $stmt->bindParam(':foto',$foto);
            
            if($stmt->execute() == true){
                header('location: ../views/datosPersonales.php?actualizacion');
            }else{
                header('location: ../views/datosPersonales.php?errorActualizacion');
            }

        } catch (PDOException $e) {
            echo "Ha ocurrido un error".$e;
        }
    }

?>
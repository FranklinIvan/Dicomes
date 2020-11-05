<?php
    //Conexión BD
    require('conexionDB.php');

    if(isset($_POST['registro'])){
        try {
            $sql = "INSERT INTO usuario (nombre, apellido, correo, password, foto) VALUES (:nombre, :apellido, :correo, :password, :foto)";
            $stmt = $conex->prepare($sql);
            $stmt->bindParam(':nombre',$_POST['nombre']);
            $stmt->bindParam(':apellido',$_POST['apellido']);
            $stmt->bindParam(':correo',$_POST['correo']);
            $contra = md5($_POST['contrasena']);
            $stmt->bindParam(':password',$contra);
            $foto = "profile.png";
            $stmt->bindParam(':foto',$foto);

            if($stmt->execute() == true){
                ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <span>¡Te has registrado correctamente!</span>
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
                        </button>
                    </div>
                <?php
            }else{
                ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <span>¡Ups, ha ocurrido un error!</span>
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
                        </button>
                    </div>
                <?php
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
    }

?>

<!-- Bootstrap 4 Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

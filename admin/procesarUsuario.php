<?php 
include("conexionDB.php");
include("enviarEmail.php");

//Validando que pase por el registro
if(isset($_REQUEST['emailPrefijo']) && isset($_REQUEST['password1'])){

    $cedula = $_REQUEST['cedula'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $correo = $_REQUEST['emailPrefijo'].$_REQUEST['emailSufijo'];
    $pass = md5($_REQUEST['password1']);
    $sede = $_REQUEST['sede'];
    $foto = 'default.jpg';
    $activacion = 0;
    $hash= md5(rand(0,10000));

    try{
        $sql = "INSERT INTO cliente (cedula, nombre, apellido, correo, contrasena, sede,hash,activacion) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conex->prepare($sql);
        if($stmt->execute([$cedula,$nombre, $apellido,$correo, $pass, $sede,$hash, $activacion])){
            header('location: ../views/mensajeActivarCuenta.html');
            enviarActivacion($correo,$hash,$nombre,$apellido); //Enviar link para activar cuenta
        }
        
    }catch(PDOException $e ){
        if($e->getCode() == 23000){
            header('location: ../index.php?registroMensaje=Email no disponible');
            exit;
        }
    }
}//Si no ha pasado por el registro....
else{
    echo '<meta http-equiv="refresh" content="0; url= ../index.php">';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/mensajeActivarCuenta.css">
      <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Icon UTP -->
    <link rel="shortcut icon" href="https://utp.ac.pa/sites/default/files/favicon.ico" type="image/vnd.microsoft.icon" />
    <!-- Css Rocio -->
</head>
<body>
    <div class="contenedor-form">

        <img src="../images/logo_utp.jpg" class="logo">
        <h2>DICOMES</h2>
        <?php if(isset($_REQUEST['msg'])){?>
            <h5><?php echo $_REQUEST['msg'] ?></h5>
        <?php }else {?>
            <h5>Error</h5>
        <?php } ?>
        <h5><a href='../index.php' style="color:rgb(166, 187, 255)">Iniciar sesión</a></h5>
        
    </div>
</body>
</html>
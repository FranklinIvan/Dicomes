<?php
    session_start();

    session_destroy(); //Destruir la sesión.

    header('location: ../index.php');
    exit;
?>
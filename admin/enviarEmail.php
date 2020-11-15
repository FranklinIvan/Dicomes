<?php 
    function enviarActivacion($email,$hash,$nombre,$apellido){
        $para = $email;
        $asunto = 'Activacion de cuenta';
        $mensaje = '
            <html>
            <head>
                <title>Activacion de cuenta</title>
            </head>
            <body>
                <h3>¡ Hola '.$nombre.' '. $apellido.' !</h3>
                <p>Para activar tu cuenta accede al siguiente link</p>
                <a href="http://localhost/AdminDicomes/admin/activarUser.php?e='.$email.'&a='.$hash.'" target="_blank"> Activar Cuenta </a>

            </body>
            </html>
        ';
        $cabeceras = 'MIME-Version: 1.0'. "\r\n";
        $cabeceras = 'Content-type: text/html; charset:utf-8'. "\r\n";
        $cabeceras = 'From: INFO <info@prueba.com/>'."\r\n";

        //Enviar correo
       mail($para, $asunto, $mensaje, $cabeceras);
    }

?>
<?php 
    function enviarActivacion($email,$hash,$nombre,$apellido){
        $para = $email;
        $asunto = 'Activacion de cuenta';
        $mensaje = '
        <html>
        <head>
        <title>ACTIVACION DE CUENTA</title>
        </head>
        <body>
        
        <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
          <tr>
            <td><div align="center"><img src="http://prensautp.ds507.online/PruebasCorreo/images/logo_utp.jpg" width="100" height="100" alt="UTP" longdesc="UTP"></div></td>
          </tr>
          <tr>
            <td bgcolor="#F4FAFF"><p align="center"><strong>'.$nombre.' '.$apellido.'</strong> <br>
              Gracias por registrarse a nuestro sistema<br>
                Para acceder seleccione el siguiente link </p>
              <p align="center"><<a href="http://localhost/AdminDicomes/admin/activarUser.php?e='.$email.'&a='.$hash.'" target="_blank"> Activar Cuenta </a>"></a><br>
            </p>    </td>
          </tr>
          <tr>
            <td bgcolor="51034f"><div align="center" style="color:#FFFFFF";>Universidad Tecnol&oacute;gica de Panam&aacute; - 2020<br>
                Direcci&oacute;n: Avenida Universidad Tecnol&oacute;gica de Panam&aacute;, V&iacute;a Puente Centenario,<br>
                Campus Metropolitano V&iacute;ctor Levi Sasso.<br>
                Tel&eacute;fono. (507) 560-3000<br>
                Correo electr&oacute;nico: buzondesugerencias@utp.ac.pa<br>
            Pol&iacute;ticas de Privacidad</div></td>
          </tr>
        </table>
        </body>
        </html>
        ';
        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset:utf-8'. "\r\n";
        $cabeceras .= 'From: INFO <info@prueba.com/>'."\r\n";

        //Enviar correo
       mail($para, $asunto, $mensaje, $cabeceras);
    }

?>
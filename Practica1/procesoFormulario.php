<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php

            $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            $mensaje = filter_var($_POST["mensaje"], FILTER_SANITIZE_STRING);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                echo "Dirección de correo electrónico no válida";
                exit;
            }

            // Aquí podrías enviar los datos a tu base de datos o por correo electrónico

            echo "Gracias por enviarnos un mensaje, te responderemos lo antes posible.";
        ?>
    </body>
</html>
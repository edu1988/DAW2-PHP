<?php

    session_start();

    echo "Has sido expulsado por más de 3 intentos fallidos.";

    if(isset($_POST["enviar"])){
        session_destroy();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">

        <input type="submit" name="enviar" value="Cerrar sesión"/>

    </form>
    
</body>
</html>
<?php

    session_start();
    session_destroy();
    header("Location:index.php");

    echo "Has sido expulsado por 3 intentos fallidos<br>";
    echo "Se te enviará una nueva contraseña por correo";

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
    <a href="index.php"><h3>VOLVER AL INDEX</h3></a>
</body>
</html>
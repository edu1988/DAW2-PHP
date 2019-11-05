<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php
        session_start();
        if(!isset($_SESSION["usuario"]) or !isset($_SESSION["password"])){
            header("Location:login.php");
        }

    ?>

    <h1>BIENVENIDO A LA APLICACIÓN</h1>
    
</body>
</html>
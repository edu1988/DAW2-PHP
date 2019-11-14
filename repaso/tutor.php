<?php
    session_start();

    //Si el usuario logueado no es un tutor, le echamos
    if($_SESSION["usuario"]["rol"]!="tutor"){
        session_destroy();
        header("Location:index.php");
    }

    


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--link rel="stylesheet" href="estilos.css" /-->
    <title>Tutor</title>
    <style>

    </style>
</head>

<body>
    <h1>TUTOR</h1>
    <nav>
        <ul>
            <li><a href="modificar.php">Modificar las notas de un alumno</a></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </nav>

</body>

</html>
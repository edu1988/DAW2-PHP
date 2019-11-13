<?php
 session_start();

 //Restringimos el acceso a la página a todo aquel que no sea profesor
 if($_SESSION["usuario"]["rol"]!=="profesor"){
     header("Location:index.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROFESOR</title>
</head>
<body>
    <h1>PROFESOR</h1>
    <a href="vernotas.php">Ver notas de los alumnos</a>
    <br><br>
    <a href="logout.php">CERRAR SESIÓN</a>
</body>
</html>
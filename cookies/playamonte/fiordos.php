<?php

    include "funciones.php";
    
    //Actualizamos la cookie con la página que está visitando y la fecha
    $infoCookie=$_COOKIE["info"];
    setcookie("info",actualizarFechaCookie(actualizarPaginaCookie($infoCookie,"fiordos")));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INICIO</title>
</head>
<body>
    
    <h1>PÁGINA DE LOS FIORDOS</h1>
    <a href="index.php">Volver a inicio</a>
    
</body>
</html>
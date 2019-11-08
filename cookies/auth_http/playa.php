<?php

    include "funciones.php";
    
    //Actualizamos la cookie con la página que está visitando y la fecha
    $infoCookie=$_COOKIE["infor"];
    setcookie("infor",actualizarFechaCookie(actualizarPaginaCookie($infoCookie,"playa")),time()+60*60*24*60);

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
    
    <h1>PÁGINA DE LA PLAYA</h1>
    <a href="index.php">Volver a inicio</a>
    
</body>
</html>
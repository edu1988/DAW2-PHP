<?php

    session_start();

    if($_SESSION["actual"] != "productoa"){
    
        include "funciones.php";
        $visitas=$_COOKIE["visitas"];
        sumarVisitaProducto($visitas,"a");

        //Actualizamos (sobreescribimos) la cookie
        setcookie("visitas",$visitas,time()+30*24*60*60);

        $_SESSION["actual"]="productoa";

    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body{
            text-align:center;
        }
        div{
            display:inline-block;
            border: 3px solid blue;
            background-color: olivedrab;
            padding:20px;
        }
        a{
            display:block;
            margin:20px;
        }
    </style>
</head>
<body>

    <div>
        <h1>PRODUCTO A</h1>
        <h4>LAND ROVER</h4>
        <a href="index.php">MENÚ</a>
        <a href="productob.php">PRODUCTO B</a>
        <a href="productoc.php">PRODUCTO C</a>
    </div>
    
</body>
</html>
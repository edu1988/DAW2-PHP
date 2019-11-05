<?php
    session_start();

    include "funciones.php";
    
    $_SESSION["tiempoc"]=time();

    /*Comprobamos si venimos a esta página de algún otro producto para guardar
    el tiempo que haya pasado visitando aquél */

    if($_SESSION["actual"]=="b"){
        $_SESSION["tiempob"]=time()-$_SESSION["tiempob"];
        //Registramos este tiempo en la cookie
        $info=$_COOKIE["visitas"];
        sumarTiempoProducto($info,"b",$_SESSION["tiempob"]);
        setcookie("visitas",$info,time()+30*24*60*60);
    }

    if($_SESSION["actual"]=="a"){
        $_SESSION["tiempoa"]=time()-$_SESSION["tiempoa"];
        //Registramos este tiempo en la cookie
        $info=$_COOKIE["visitas"];
        sumarTiempoProducto($info,"a",$_SESSION["tiempoa"]);
        setcookie("visitas",$info,time()+30*24*60*60);
    }

    /*Después de hacer las comprobaciones, actualizamos la variable de sesión
    actual para que apunte al producto al que nos encontramos */
    $_SESSION["actual"]="c";



    
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
        <h1>PRODUCTO C</h1>
        <h4>KIA</h4>
        <a href="index.php">MENÚ</a>
        <a href="productoa.php">PRODUCTO A</a>
        <a href="productob.php">PRODUCTO B</a>
    </div>
    
</body>
</html>
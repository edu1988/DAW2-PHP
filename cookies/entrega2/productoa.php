<?php

    session_start();

    //Si no existe la variable de sesión, la creamos como un array asociativo
    if(!isset($_SESSION["visitas"])){
        $_SESSION["visitas"]=["productoa"=>1,"productob"=>0,"productoc"=>0];
    }else{
        //Si sí que existe, incrementamos en 1 el valor del producto A
        $_SESSION["visitas"]["productoa"]++;
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
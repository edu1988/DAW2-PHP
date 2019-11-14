<?php

    session_start();

    //Cargamos el array en memoria desde el fichero, será necesario para actualizarlo
    $clientes=[];
    include "funciones_ficheros.php";
    fileToArray("CtaCliente.txt","~",$clientes);

    //Expulsamos al usuario si no existen las variables de sesión correspondientes
    if(!isset($_SESSION["dni"]) || !isset($_SESSION["pass"])){
        header("Location:index.php");
    }

    //Acción cuando se envie el formulario
    if(isset($_POST["enviar"])){
        $nombre=$_POST["nombre"];

        //Creamos un array cliente con todos los datos y saldo 0
        $dni=$_SESSION["dni"];
        $pass=$_SESSION["pass"];

        $cliente=["dni"=>$dni, "contra"=>$pass, "nombre"=>$nombre, "saldo"=>0];

        //Lo introducimos en el array
        $clientes[]=$cliente;

        //Lo volcamos al fichero
        arrayToFile($clientes,"CtaCliente.txt","~");

        //Le notificamos y le redirigimos a login.php
        echo "¡REGISTRO CORRECTO!<br>Se le redirigirá al login en 5 segundos.";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='5;URL=http://localhost/examen_edu/login.php'>";

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

    <h1>BIENVENIDO NUEVO USUARIO</h1>
    <p>Regístrese, si lo desea, introduciendo tan solo su nombre</p>
    <p>Su saldo inicial será de 0€</p>

    <form action="" method="post">

        NOMBRE:<input type="text" name="nombre" id="nombre" required>
        <input type="submit" name="enviar" value="Enviar">

    </form>
</body>
</html>
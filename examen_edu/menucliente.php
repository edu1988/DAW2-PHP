<?php
    session_start();

    //Si no proviene de un login correcto, le expulsamos
    if(!isset($_SESSION["cliente"])){
        session_destroy();
        header("Location:login.php");
    }

    //Guardamos en una variable de sesión
    //El instante exacto en el que el usuario inición sesión
    //Y solo la inicializamos una vez y en esta página
    if(!isset($_SESSION["instante_inicial"])){
        $_SESSION["instante_inicial"]=time();
    }

    /*Una vez que esa variable de sesión está creada, bien porque el usuario
    vuelve a esta página desde otra, o bien porque actualiza la página, hacemos
    la comprobación de tiempo correspondiente */
    if(isset($_SESSION["instante_inicial"])){
        /*Comprobamos siempre, en cada salto de página dentro de la sesión
        de un cliente, que no han pasado más de tres minutos desde que inició
        sesión */
        $instante_actual = time();
        $instante_inicial = $_SESSION["instante_inicial"];
        $tiempo_sesion_segundos = $instante_actual - $instante_inicial;
        if($tiempo_sesion_segundos > 180){
            //Destruimos la sesión y le redirigimos al index
            session_destroy();
            header("Location:login.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MENÚ CLIENTE</title>
</head>
<body>
    <h1>BIENVENIDO <?php echo $_SESSION["cliente"]["nombre"] ?>, ELIJA UNA OPCION:</h1>

    <a href="retirar.php">RETIRAR DINERO</a><br>
    <a href="consultar.php">CONSULTAR MOVIMIENTOS</a>
    
</body>
</html>
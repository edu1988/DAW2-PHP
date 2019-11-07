<?php
    /*Info de la cookie: nombre, fecha ultima visita, última elección, numero visitas
        Ej: "Pepe-11/11/2019-Playa-8" */
    session_start();
    include "funciones.php";

    if(!isset($_COOKIE["info"])){
        
        if(!isset($_SESSION["nombre"])){
            $info="BIENVENIDO, ES LA PRIMERA VEZ QUE NOS VISITA. LE PEDIREMOS SU NOMBRE.";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=http://localhost/cookies/playamonte/pedirnombre.php'>";
        }else{
            $nombre=$_SESSION["nombre"];
            $info="BIENVENIDO ".$nombre.". ES LA VEZ 1 QUE NOS VISITA";

            //Establecemos la cookie
            $fecha=fechaHoraActual();
            $infoCookie=$nombre."-".$fecha."-"."index"."-"."1";
            setcookie("info",$infoCookie,time()+60*60*24*60);

            //Inicializamos la variable de sesion "actual"
            $_SESSION["actual"]="index";
        }

    }else{ //Sí existe la cookie, no es su primera visita

         //Extraemos la informacion de las visitas
         $infoCookie=$_COOKIE["info"];
         $veces=explode("-",$infoCookie)[3];

        if(!isset($_SESSION["actual"])){ //Sucesivas visitas provenientes del exterior

            //Es una nueva visita, la añadimos a la cookie
            //También hay que guardar en la cookie la informacion de la fecha-hora actual

            setcookie("info",actualizarFechaCookie(sumarVisitaCookie($infoCookie)),time()+60*60*24*60);
            $veces = explode("-",$_COOKIE["info"])[3];
            $veces++;

            //Vemos cuál fue la última página que visitó
            $sitio=explode("-",$infoCookie)[2];


            $_SESSION["actual"]="index";

        }else{ //Sucesivas visitas al index proveniente del interior de la web

            //Guardamos también la fecha hora en la cookie
            setcookie("info",actualizarFechaCookie($infoCookie),time()+60*60*24*60);

        }

        //Extraemos la informacion de la cookie
        $infoCookie=$_COOKIE["info"];
        $datos=explode("-",$infoCookie);
        $nombre=$datos[0];
        //$visitas=$datos[3];

        $info="BIENVENIDO ".$nombre.". ES LA VEZ ".$veces." QUE NOS VISITA";
    }

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
    <h1><?php echo (isset($info))?$info:"";?></h1>
    <?php
        if(isset($sitio)){
            echo "<h1>El último sitio que visitó fue $sitio</h1>";
        }
    ?>
    <p>Elija una opción</p>
    <a href="playa.php">PLAYA</a>
    <br>
    <a href="monte.php">MONTAÑA</a>
</body>
</html>
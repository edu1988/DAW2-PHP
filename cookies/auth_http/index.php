<?php
    /*Info de la cookie: nombre, fecha ultima visita, última elección, numero visitas
        Ej: "Pepe-11/11/2019-Playa-8" */
    session_start();

    include "funciones.php";

    /*Autenticación con fichero txt*/

    if (!isset($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_USER'])) { 
        header('WWW-Authenticate: Basic realm="Acceso restringido"'); 
        header('HTTP/1.0 401 Unauthorized'); 
        echo 'IDENTIFIQUESE'; 
        exit; 
     } 
      
     $fich = file("passwords.txt"); 
     $i=0; $validado=0; 
     while ($i<count($fich) and !$validado) { 
        $campo = explode("~",$fich[$i]); 
        if (($_SERVER['PHP_AUTH_USER']==$campo[0]) && ($_SERVER['PHP_AUTH_PW']==chop($campo[1]))) $validado=1; 
        $i++; 
     } 
  
     if (!$validado) { 
        header('WWW-Authenticate: Basic realm="Acceso restringido"'); 
        header('HTTP/1.0 401 Unauthorized'); 
        echo 'Authorization Required.'; 
        exit; 
     } 
    
    if(!isset($_COOKIE["infor"])){
        /*Una vez que nos hemos logueado correctamente, creamos la cookie*/
        $infoCookie=$_SERVER['PHP_AUTH_USER']."-".fechaHoraActual()."-index-1";
        setcookie("infor",$infoCookie,time()+60*60*24*60);
        $info = "Bienvenido " . $_SERVER['PHP_AUTH_USER'] . ". Es su primera vez aquí";
        $veces=1;
        $_SESSION["actual"]="index";
        /*
        
        
        $veces=1;
        $info="BIENVENIDO, ES LA PRIMERA VEZ QUE NOS VISITA. LE PEDIREMOS SU NOMBRE.";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=http://localhost/cookies/auth_http/pedirnombre.php'>";
        */

    }else{ //Sí existe la cookie, no es su primera visita

         //Extraemos la informacion de las visitas
         $infoCookie=$_COOKIE["infor"];
         $datos=explode("-",$infoCookie);
         $nombre=$datos[0];
         $fecha=$datos[1];
         $veces=$datos[3];

        if(!isset($_SESSION["actual"])){ //Sucesivas visitas provenientes del exterior

            //Es una nueva visita, la añadimos a la cookie
            //También hay que guardar en la cookie la informacion de la fecha-hora actual

            setcookie("infor",actualizarFechaCookie(sumarVisitaCookie($infoCookie)),time()+60*60*24*60);
            
            $veces++;

            //Vemos cuál fue la última página que visitó
            $sitio=explode("-",$infoCookie)[2];


            $_SESSION["actual"]="index";

        }else{ //Sucesivas visitas al index proveniente del interior de la web

            //Guardamos también la fecha hora en la cookie
            setcookie("infor",actualizarFechaCookie($infoCookie),time()+60*60*24*60);

        }

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
        if(isset($fecha)){
            echo "<h1>Fecha y hora de su última visita: $fecha</h1>";
        }
        
    ?>
    <p>Elija una opción</p>
    <a href="playa.php">PLAYA</a>
    <br>
    <a href="monte.php">MONTAÑA</a>
    <br>
    <?php
        if($veces > 5){
            echo "Nueva promoción: <a href='fiordos.php'>Fiordos Gallegos</a>";
        }
    ?>
    <br>
    <form action="" method="post">
        <input type="submit" name="cerrar" value="Cerrar Sesión"/>
    </form>
    <?php
        if(isset($_POST["cerrar"])){
            session_destroy();
            header("location:../");
            unset($_SERVER['PHP_AUTH_USER']);
        }
    ?>
</body>
</html>
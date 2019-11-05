<?php
    session_start();

    include "funciones.php";

    /*Si no existe ninguna cookie para guardar la información, la creamos.
    Guardaremos en ella el número de veces que se visita cada producto y el
    número de visitas totales de la página*/

    if(!isset($_COOKIE["visitas"])){ 
        
        //Crear la cookie
        setcookie("visitas","0-0-0-1",time()+30*24*60*60);

        //Variable para guardar el número de veces que nos han visitado
        $veces=1; //Veces que nos han visitado

        $_SESSION["actual"]="index";

        $venimosDefuera=true; //Variable de control

    }else{
        /*La cookie sí que existe, por lo tanto extraemos su información y
        la actualizamos añadiendo la visita actual, en caso de que sea una
        visita real desde el exterior (sin existencia previa de sesiones) */

        $cookie=$_COOKIE["visitas"];
        $veces = explode("-",$cookie)[3];

        $venimosDefuera=false;

        if(!isset($_SESSION["actual"])){
            $veces+=1;
            
            //Actualizamos la información de la cookie con la visita actual
            sumarVisitaProducto($cookie,"index");
            setcookie("visitas",$cookie,time()+60*60*24*30);


            /*Creamos la variable de sesión para que en sucesivas actualizaciones
            no se ejecute este código */
            $_SESSION["actual"]="index";

            $venimosDefuera=true;

        }else{

            /*Si sí que existe la sesión actual también puede ser que vengamos al
            menú desde la página de algún producto, en cuyo caso debemos registrar
            el tiempo que el usuario pasó en ese producto */

            if($_SESSION["actual"] != "index"){

                if($_SESSION["actual"]=="a"){
                    $_SESSION["tiempoa"]=time()-$_SESSION["tiempoa"];
                    //Registramos este tiempo en la cookie
                    $info=$_COOKIE["visitas"];
                    sumarTiempoProducto($info,"a",$_SESSION["tiempoa"]);
                    setcookie("visitas",$info,time()+30*24*60*60);
                }

                if($_SESSION["actual"]=="b"){
                    $_SESSION["tiempob"]=time()-$_SESSION["tiempob"];
                    //Registramos este tiempo en la cookie
                    $info=$_COOKIE["visitas"];
                    sumarTiempoProducto($info,"b",$_SESSION["tiempob"]);
                    setcookie("visitas",$info,time()+30*24*60*60);
                }
            
                if($_SESSION["actual"]=="c"){
                    $_SESSION["tiempoc"]=time()-$_SESSION["tiempoc"];
                    //Registramos este tiempo en la cookie
                    $info=$_COOKIE["visitas"];
                    sumarTiempoProducto($info,"c",$_SESSION["tiempoc"]);
                    setcookie("visitas",$info,time()+30*24*60*60);
                }
            
                /*Después de hacer las comprobaciones, actualizamos la variable de sesión
                actual para que apunte al producto al que nos encontramos */
                $_SESSION["actual"]="index";
            }
        }

        

    }
    
    if($veces==1){
        $info="Bienvenido, es la primera vez que nos visita. Disfrute de la página.";
    }else{
        if(!$venimosDefuera){
            //Varias visitas, pero volvemos al menú desde algún producto
            //No redirigimos
            $info="Es la " . $veces . " vez que nos visita. ";
        }else{
            //Varias visitas, acceso desde el exterior. Redirigimos.
            $info="Es la " . $veces . " vez que nos visita. ";
        
            //Extraemos de la cookie el producto con más tiempo visitado
            $cookie=$_COOKIE["visitas"];
            list($a,$b,$c,$index)=explode("-",$cookie);

            //Reseteamos la cookie para futuras visitas
            $cookie="0-0-0-".$veces;
            setcookie("visitas",$cookie,time()+60*60*24*30);

            //Posibilidades
            if($a>=$b && $a>=$c){//El a es el más visitado
                $info.= "Se le redirigirá al producto A, que estuvo vistando ".$a." segundos.";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=http://localhost/cookies/tiempo_visita/productoa.php'>";
            }else if($b>=$c && $b>=$a){//El b es el más visitado
                $info.= "Se le redirigirá al producto B, que estuvo vistando ".$b." segundos.";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=http://localhost/cookies/tiempo_visita/productob.php'>";
            }else{//El c es el más visitado
                $info.= "Se le redirigirá al producto C, que estuvo vistando ".$c." segundos.";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=http://localhost/cookies/tiempo_visita/productoc.php'>";
            }
        }
        
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
        <h1>MENU PRINCIPAL</h1>
        <a href="productoa.php">PRODUCTO A</a>
        <a href="productob.php">PRODUCTO B</a>
        <a href="productoc.php">PRODUCTO C</a>
    </div>

    <h3>
        <?php
            echo (isset($info))?$info:"";
        ?>
    </h3>
    
</body>
</html>
<?php
    session_start();
    include "funciones.php";

    //Establecemos una variable de sesion
    if(!isset($_SESSION["actual"])){
        $_SESSION["actual"]="index";
    }
        
    //Cookie para registrar el número de visitas a las secciones de la página
    //Si no existe, la creamos
    if(!isset($_COOKIE["visitas"])){ //Primera entrada en la web
        
        //Crear la cookie
        setcookie("visitas","0-0-0-1",time()+30*24*60*60);
        $veces=1; //Veces que nos han visitado

    }else{ //Posteriores entradas en la web

        //Creamos una variable de sesion para distinguir las acciones de refresh
        if($_SESSION["actual"]=="index"){   //Entradas en index desde el exterior

            //Actualizamos su información
            $visitas=$_COOKIE["visitas"];
            sumarVisitaProducto($visitas,"index");
            //Actualizamos (sobreescribimos) la cookie
            setcookie("visitas",$visitas,time()+30*24*60*60);
            //Recuperamos la información de la cookie
            list($a,$b,$c,$d)=explode("-",$visitas);
            $veces=$d; //Veces que nos han visitado

            $_SESSION["actual"] = "siguientes";

            //CODIGO DE REDIRECCIÓN
            //Calculamos el producto visitado más veces
            //Redireccionamos en consecuencia
            if($a>=$b && $a>=$c){ //El a es el más visitado
                $cadena="Se le redireccionará al Producto A...";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='6;URL=http://localhost/cookies/entrega/productoa.php'>";
            }else if($b>=$c && $b>=$a){ //El b es el más visitado
                $cadena="Se le redireccionará al Producto B...";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='6;URL=http://localhost/cookies/entrega/productob.php'>";
            }else{ //El c es el mas visitado
                $cadena="Se le redireccionará al Producto C...";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='6;URL=http://localhost/cookies/entrega/productoc.php'>";
            }

        }else{  //Entradas en index volviendo desde algún producto o refrescando

            $_SESSION["actual"]="siguientes";

            $visitas=$_COOKIE["visitas"];
            list($a,$b,$c,$d)=explode("-",$visitas);
            $veces=$d; //Veces que nos han visitado

            //CODIGO DE REDIRECCIÓN
            //Calculamos el producto visitado más veces
            //Redireccionamos en consecuencia
            if($a>=$b && $a>=$c){ //El a es el más visitado
                $cadena="Se le redireccionará al Producto A...";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='6;URL=http://localhost/cookies/entrega/productoa.php'>";
            }else if($b>=$c && $b>=$a){ //El b es el más visitado
                $cadena="Se le redireccionará al Producto B...";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='6;URL=http://localhost/cookies/entrega/productob.php'>";
            }else{ //El c es el mas visitado
                $cadena="Se le redireccionará al Producto C...";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='6;URL=http://localhost/cookies/entrega/productoc.php'>";
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
    
    <h3>Bienvenido, es la vez número <?php echo $veces; ?> que nos visita</h3>
    <div>
        <h1>MENU PRINCIPAL</h1>
        <a href="productoa.php">PRODUCTO A</a>
        <a href="productob.php">PRODUCTO B</a>
        <a href="productoc.php">PRODUCTO C</a>
    </div>
    <h3>
        <?php
            echo (isset($cadena))?$cadena:"";
        ?>
    </h3>
    
</body>
</html>
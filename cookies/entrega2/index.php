<?php
    session_start();

    if(isset($_SESSION["visitas"])){
        /*Recuperamos la información de esta variable de sesión para ver
        cuántas veces ha entrado el usuario en cada producto*/
        foreach($_SESSION["visitas"] as $clave => $valor){
            $$clave=$valor;
        }
        if($productoa>=$productob && $productoa>=$productoc){
            //El producto A es el más consultado
            $info="El producto más visitado es el A, visitado ".$productoa." veces...";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=http://localhost/cookies/entrega2/productoa.php'>";
        }else if($productob>=$productoa && $productob>=$productoc){
            //El producto B es el más consultado
            $info="El producto más visitado es el B, visitado ".$productob." veces...";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=http://localhost/cookies/entrega2/productob.php'>";
        }else{
            //El producto C es el más consultado
            $info="El producto más visitado es el C, visitado ".$productoc." veces...";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=http://localhost/cookies/entrega2/productoc.php'>";
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
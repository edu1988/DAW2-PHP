<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php

        $a=3;
        $b=6;
        $c=1;

        //Cuál es el mayor de los tres
        $mayor=$a;

        if($b > $mayor){
            $mayor=$b;
        }

        if($c > $mayor){
            $mayor=$c;
        }

        echo "El número mayor de los 3 es el: ", $mayor,"<br>";

        /*Dados tres valores a, b y c, que son longitudes de segmentos, saber si forman
        o no un triángulo*/ 

        /*Condición indispensable: que el lado más largo sea mayor que la suma de los
        otros dos*/
    ?>
    
</body>
</html>
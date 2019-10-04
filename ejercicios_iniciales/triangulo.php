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
         /*Dados tres valores a, b y c, que son longitudes de segmentos, saber si forman
        o no un triángulo*/ 

        /*Condición indispensable: que el lado más largo sea mayor que la suma de los
        otros dos*/
        $a=11;
        $b=11;
        $c=24;

        echo "La longitud de los lados es: $a, $b y $c<br>";

        /*Cóndicion única a lo bestia*/
        //Problema con lados iguales

        if((($a>=$b) and ($a>=$c) and ($a<$b+$c)) or 
           (($b>=$a) and ($b>=$c) and ($b<$c+$a)) or
           (($c>=$b) and ($c>=$a) and ($c<$a+$b))){

                echo "Se puede formar un triángulo<br>";

                if(($a==$b) and ($b==$c)){
                    echo "Es un triángulo equilátero<br>";
                }else{
                    if(($a==$b)or($a==$c)or($b==$c)){
                        echo "Es un triángulo isósceles ";
                    }else{
                        echo "Es un triángulo escaleno ";
                    }
        
                    /*Comprobar aquí si es también rectángulo*/
                }

        }else{
                echo "No se puede formar un triángulo<br>";
        }
    ?>
    
</body>
</html>
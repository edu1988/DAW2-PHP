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
        $a=1;
        $b=1;
        $c=sqrt(2);

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

        echo "<br>";

        //Otra forma de hacerlo
        //Primero ordenamos las longitudes de los lados
        $lados = [$a,$b,$c];
        include "../funciones/funciones_ordenacion.php";
        ordenarBurb($lados);
        $a = $lados[0]; $b=$lados[1]; $c = $lados[2];
        $rect=0;
        if(($a+$b)>$c){
            
            if((int)(pow($a,2)+pow($b,2))==(int)pow($c,2)){
                $rect=1;
            }
            if($a==$b && $a==$c){
                echo "<br>Es un triángulo equilátero<br>";
            }else{
                if($a==$b || $a==$c || $b==$c){
                    echo "<br>Es un triángulo isosceles ";
                    if($rect){
                        echo " y rectángulo";
                    }
                }else{
                    echo "<br>Es un triángulo escaleno ";
                    if($rect){
                        echo " y rectángulo";
                    }
                }
            }
        }else{
            echo "<br>No se puede formar un triángulo<br>";
        }

    ?>
    
</body>
</html>
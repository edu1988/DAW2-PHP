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

        $a=23;
        $b=10;
        $c=10;

        echo "Los 3 números elegidos son: $a, $b, $c<br>";

        //Cuál es el mayor de los tres
        $mayor=$a;

        if($b > $mayor){
            $mayor=$b;
        }

        if($c > $mayor){
            $mayor=$c;
        }

        echo "El número mayor de los 3 es el: ", $mayor,"<br>";

        //Otra forma
        if($a>$b and $a>$c){
            echo "El mayor valor es a: $a<br>";
        }

        //Ordenar los valores

        //Método de la burbuja
        if($a<$b){
            $recipiente=$b;
            $b=$a;
            $a=$recipiente;
        }if($b<$c){
            $recipiente=$b;
            $b=$c;
            $c=$recipiente;
        }
        if($a<$b){
            $recipiente=$b;
            $b=$a;
            $a=$recipiente;
        }

        echo "Valores ordenados: $a, $b, $c<br>";

        //Método de la burbuja con un array
        $lista = array(4,2,3,1,8,32,3,8,54,2);

        for($i = 1; $i<= sizeof($lista); $i++){
            for($j = 0; $j < sizeof($lista)-1; $j++){
                if($lista[$j] > $lista[$j+1]){
                    $aux = $lista[$j];
                    $lista[$j] = $lista[$j+1];
                    $lista[$j+1] = $aux;
                }
            }
        }

        $resultado = "Valores del array ordenados: ";

        for($i = 0; $i < sizeof($lista); $i++){
            $resultado .= $lista[$i] . ", ";
        }

        echo $resultado,"<br>";

        

        /*Dados tres valores a, b y c, que son longitudes de segmentos, saber si forman
        o no un triángulo*/ 

        /*Condición indispensable: que el lado más largo sea mayor que la suma de los
        otros dos*/
        $a=11;
        $b=11;
        $c=24;

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
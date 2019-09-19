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

        //Ejemplo bucle do-while
        $numero = 0;

        do{
            echo "$numero, ";
            $numero+=2;
        }while($numero <= 100);

        echo "<br>";

        //Ejemplo bucle while
        $numero=0;
        while($numero <= 100){
            if($numero==100){
                echo "$numero.";
            }else{
                echo "$numero, ";
            }
            $numero+=2;
        }

        echo "<br>";

        //Ejemplo bucle for
        for($numero=0; $numero<=100; $numero+=2){
            echo "$numero, ";
        }

        echo "<br>";

        //Obtener divisores de un numero
        $numero=102;
        for($i=2; $i<=$numero/2;$i++){
            if($numero%$i == 0){
                echo "$i es divisor de $numero<br>";
            }
        }
        echo "<br>";
        //Comprobar si un número es primo

        $numero = 24;
        $divisor = 2;
        
        while(($numero%$divisor!=0) && ($divisor<=$numero/2)){

            $divisor++;
            
        }

        if($numero%$divisor==0){
            echo "$numero no es un numero primo";
        }else{
            echo "$numero es un numero primo";
        }

        //Cuantos divisores hay entre 1 y 100 y mostrarlos
        echo "<br>",microtime(),"<br>";

        $xmax=100;
        $contador=2;
        echo "<br>Números primos hasta el $xmax: ";

        for($x=2; $x <= $xmax; $x++){

            $divisor=2;
            while(($x % $divisor != 0) && ($divisor<=$x/2)){

                $divisor++;

            }

            if($x % $divisor != 0  /*$divisor > $x/2*/){
                echo "$x, ";
                $contador++;
            }

        }

        echo "<br>Hay $contador numeros primos entre 0 y $xmax";
        
        
    ?>

</body>
</html>
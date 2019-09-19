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

        $tiempo_inicial = microtime(true);

        echo "<br>";

        while( microtime(true) - $tiempo_inicial < 100){

            echo time()."<br>";

        }

        /*
        $xmax=1000;
        $contador=2;
        echo "<br>Números primos hasta el $xmax: ";

        for($x=2; $x <= $xmax; $x++){

            $divisor=2;
            while(($x % $divisor != 0) && ($divisor<=$x/2)){

                $divisor++;

            }

            if($x % $divisor != 0  /*$divisor > $x/2){
                echo "$x, ";
                $contador++;
            }

        }

        */

    ?>
</body>
</html>
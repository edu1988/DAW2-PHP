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

        $tiempo_inicial = time();
        $tiempo_transcurrido = time()-$tiempo_inicial;
        
        $contador=0;
        echo "<br>";

        $x=3;

        while($tiempo_transcurrido < 20){

            $divisor=2;
            while(($x % $divisor != 0) && ($divisor<=$x/2)){

                $divisor++;

            }

            if($x % $divisor != 0  /*$divisor > $x/2*/){
                echo "$x, ";
                $contador++;
            }
			
		
            
            $tiempo_transcurrido=time()-$tiempo_inicial;
            $x++;
        }

        echo "<br>$contador numeros primos calculados en 1 segundo";

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
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

        /*
            Funcion time(), devuelve los segundos transcurridos desde el 0 Unix (1970)
             -escala UNIX
             -escala Gregoriana
            
            La funcion date() convierte un tiempo UNIX en un tiempo Cristiano


        */

        $intervalo = 40*24*60*60; //15 dias en segundos
        $tFut = time() + $intervalo;

        echo date("Y/m/d - H:i:s", $tFut);


    ?>
    
</body>
</html>
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

        /*$intervalo = 40*24*60*60; //15 dias en segundos
        $tFut = time() + $intervalo;

        echo date("Y/m/d - H:i:s", $tFut);
        echo "<br>";*/
        /**Funcion mktime() hace la función inversa
         * Función strtotime();
         * 
         */

         $fecha = "15/10/2024";
         list($d,$m,$a) = explode("/",$fecha);
         echo "Fecha introducida: dia " . $d . ", mes= " . $m . " año = " . $a;
         echo "<br>";

         $tUnix = mktime(0,0,0,$m,$d,$a);


         echo "El tiempo unix de la fecha pasada es " . $tUnix;
         echo "<br>";
         echo "El tiempo unix actual es = " . time();

         $fechaNueva = date("d/m/Y", $tUnix);
         echo "<br>";

         echo "La fecha con ". time() ." es = " . date("d/m/Y",time());
         echo "<br>";
         echo "La fecha con ". $tUnix . " calculado es = " . date("d/m/Y", $tUnix);

        /*Cuantas veces ha respirado felix desde su nacimiento
        y cuantas veces ha latido su corazón
            15 respiraciones por minuto
            60 pulsaciones por minuto
        */
        echo "<br>";

        $tiempoUnix = mktime(3,18,20,2,1,1999);
        $tiempoDeVida = time() - $tiempoUnix;
        $respiraciones = ($tiempoDeVida / 60 ) * 15;
        $latidos = $tiempoDeVida;

        echo "Respiraciones = " . $respiraciones . " y latidos = " . $latidos;

        include "../funciones/funciones_tiempo.php";

        $anyos = edadA(1,10,1988);

        echo "<br>" . $anyos;

        $fechaMuerteAdri = fechaMuerte(10,9,2000,"f");
        echo "<br>". $fechaMuerteAdri . "<br>";



    ?>
    
</body>
</html>
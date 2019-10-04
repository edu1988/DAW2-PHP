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

        include "../funciones/funciones_ordenacion.php";

        //Generamos un array aleatorio con 1000 valores
        $lista=[];
        for($i=0; $i<5000; $i++){
            $lista[] = rand(1,1000);
        }

        //Creamos una copia del array (en php los array se pasan por valor);
        $lista2 = $lista;

        //Medimos el tiempo que tarda cada algoritmo en ordenar cada array
        $tiempo_inicial = microtime_float();
        ordenarSelec($lista);
        $tiempo_final = microtime_float();
        $tiempo_transcurrido = $tiempo_final - $tiempo_inicial;

        //Tiempo para el algoritmo de selección
        echo "Tiempo para el ALGORITMO DE SELECCION<br>";
        echo "Tiempo inicial --> $tiempo_inicial<br>";
        echo "Tiempo final --> $tiempo_final<br>";
        echo "Tiempo transcurrido --> $tiempo_transcurrido<br>";
        echo "<br>";
        //Tiempo para el algoritmo de burbuja
        echo "Tiempo para el ALGORITMO DE BURBUJA<br>";
        $tiempo_inicial = microtime_float();
        ordenarSelec($lista2);
        $tiempo_final = microtime_float();
        $tiempo_transcurrido = $tiempo_final - $tiempo_inicial;
        echo "Tiempo inicial --> $tiempo_inicial<br>";
        echo "Tiempo final --> $tiempo_final<br>";
        echo "Tiempo transcurrido --> $tiempo_transcurrido<br>";

        echo "<br>";
        echo "PRIMER ARRAY <br>";

        //Mostramos los dos arrays ordenados
        for($i=0;$i<count($lista);$i++){
            echo "$lista[$i] ";
        }

        echo "<br><br>";
        echo "SEGUNDO ARRAY <br>";

        for($i=0;$i<count($lista);$i++){
            echo "$lista2[$i] ";
        }


        //Función para gestionar mejor los datos de la función microtime();
        function microtime_float(){
            list($usec, $sec) = explode(" ", microtime());
            return (float)$usec + (float)$sec;
        }

    ?>
    
</body>
</html>
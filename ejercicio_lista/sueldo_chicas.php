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

        include "arrayclientes.php";

        //Función para saber si un string que se le pasa por parámetro
        //con el formato [apellido apellido, nombre] es una chica o un
        //chico en función de si el nombre empieza por "Ma" o termina por "a"
        //De lo contrario se considera que es un chico
        function esChica($nomApe){
            $elementos = explode(",",$nomApe);
            $nombre = substr($elementos[1],1);
            if(substr($nombre,0,2)=="Ma" || substr($nombre,strlen($nombre)-1)=="a"){
                return true;
            }else{
                return false;
            }
        }

        //Creamos dos variables para guardar la suma de sueldos
        $sueldoChicos=0;
        $sueldoChicas=0;

        //Recorremos el array de clientes
        for($i=0; $i<count($clientes); $i++){
            if(esChica($clientes[$i]["nombre"])){
                $sueldoChicas += $clientes[$i]["saldo"];
            }else{
                $sueldoChicos += $clientes[$i]["saldo"];
            }
        }

        //Calculamos el sueldo de las chicas respecto del total
        $sueldoTotal=$sueldoChicas+$sueldoChicos;
        $sueldoRelChicas=round(($sueldoChicas/$sueldoTotal)*100,2);

        echo "El sueldo total de las chicas es: " . $sueldoChicas . " €<br>";
        echo "El sueldo total de los chicos es: " . $sueldoChicos . " €<br>";

        echo "El porcentaje de sueldo correspondiente a chicas es el ".$sueldoRelChicas.
            " %";


    ?>
</body>
</html>
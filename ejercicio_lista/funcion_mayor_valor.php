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

        /*Función que nos devuelve el indice de la fila con el mayor valor
        dado para una columna que le pasamos por parámetro*/

        function mayorValor($tabla,$columna){
            $imax=0; //Fila del valor máximo
            for($i=1; $i<count($tabla); $i++){
                if($tabla[$i][$columna]>$tabla[$imax][$columna]){
                    $imax=$i;
                }
            }
            return $imax;
        }

        include "arrayclientes.php";
        $imax = mayorValor($clientes,"saldo");

        echo "<h1>Mayor valor calculado con una función</h1>";

        echo "El mayor saldo es " . $clientes[$imax]["saldo"] .
            " que corresponde al cliente ",$clientes[$imax]["nombre"];
    ?>
</body>
</html>
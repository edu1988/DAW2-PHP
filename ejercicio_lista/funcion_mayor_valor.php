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

        /*Función que nos devuelve los índices de las filas con el mayor valor
        para el saldo, en caso de que sean repetidas*/

        /*Esta función recibe como entrada el array bidimensional con la tabla
        y la columna que queremos analizar */

        function mayoresValores($tabla,$columna){
            $filas=array();
            $filas[]=0;
            $saldoMaximo = $tabla[0][$columna];
            for($i=1; $i<count($tabla); $i++){
                if($tabla[$i][$columna]>$saldoMaximo){
                    $saldoMaximo=$tabla[$i][$columna];
                    unset($filas);
                    $filas[]=$i;
                }else if($tabla[$i][$columna]==$saldoMaximo){
                    $filas[]=$i;
                }
            }
            return $filas;
        }

        //La probamos
        $lista = mayoresValores($clientes,"saldo");

        for($i=0; $i<count($lista); $i++){
            echo $lista[$i],"<br>";
        }

    ?>
</body>
</html>
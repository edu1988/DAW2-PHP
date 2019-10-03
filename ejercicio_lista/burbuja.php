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

        //Vamos a ordenar un array con el método de la burbuja

        $lista = [17,11,22,7,5,13,-9];

        $n = count($lista);

        $r=0;
        $switch=1;
        while($r < $n && $switch){
            $switch=0;
            for($i=0; $i<($n-1)-$r; $i++){
                if($lista[$i]>$lista[$i+1]){
                    $aux=$lista[$i];
                    $lista[$i]=$lista[$i+1];
                    $lista[$i+1]=$aux;
                    $switch=1;
                }
            }
            $r++;
        }

        /*Función para ordenar un array bidimensional en función de los datos 
        de una sola columna que le pasamos por parámetro. Todas las filas 
        del array original cambian de orden para ajustarse al orden en la columna 
        indicada. */

        function ordenarTabla(&$tabla,$col){
            $n=count($tabla); //Número de filas de la tabla.
            $r=0; $switch=1;
            while($r < $n && $switch){
                $switch=0;
                for($i=0; $i < ($n-1)-$r; $i++){
                    if($tabla[$i][$col] > $tabla[$i+1][$col]){
                        $aux=$tabla[$i];
                        $tabla[$i] = $tabla[$i+1];
                        $tabla[$i+1] = $aux;
                        $switch = 1;
                    }
                }
                $r++;
            }
        }

        /* Vamos a intentar hacer un método similar pero que lo ordene de manera que los más ligeros 
        vayan hacia arriba en lugar de que los más pesados caigan. */

        function ordenarTablaBur(&$tabla,$col){
            $n=count($tabla); //Número de filas de la tabla.
            $r=0; $switch=1;
            while($r < $n && $switch){
                $switch=0;
                for($i=($n-1); $i > 0; $i--){
                    if($tabla[$i][$col] < $tabla[$i-1][$col]){
                        $aux=$tabla[$i];
                        $tabla[$i] = $tabla[$i-1];
                        $tabla[$i-1] = $aux;
                        $switch = 1;
                    }
                }
                $r++;
            }
        }

        //Lo probamos
        include "arrayclientes.php";
         //Visualizar la tabla
         echo "<table>";
         //Mostrar cabecera
         echo "<tr>";
         for($i=0;$i<count($cabecera);$i++){
             echo "<td>",$cabecera[$i],"</td>";
         }
         echo "</tr>";
         //Mostrar clientes
         for($i=0;$i<count($clientes);$i++){
             echo "<tr>";
             foreach($clientes[$i] as $valor){
                 echo "<td>",$valor,"</td>";
             }
             echo "</tr>";
         }
         echo "</table>";
         echo "<br><br><br>";

         ordenarTablaBur($clientes,"saldo");

         
         echo "<table>";
         //Mostrar cabecera
         echo "<tr>";
         for($i=0;$i<count($cabecera);$i++){
             echo "<td>",$cabecera[$i],"</td>";
         }
         echo "</tr>";
         //Mostrar clientes
         for($i=0;$i<count($clientes);$i++){
             echo "<tr>";
             foreach($clientes[$i] as $valor){
                 echo "<td>",$valor,"</td>";
             }
             echo "</tr>";
         }
         echo "</table>";
    ?>
</body>
</html>
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

       /*  Función para encontrar la fila en la que se encuentra
        un determinado dato. La función recible como datos de entrada
        la tabla, la columna en la que queremos buscar y el dato que
        queremos buscar. */
        function buscaFila($tabla,$columna,$dato){
            //No repetido
            $encontrado = 0;
            $i = 0; //Filas
            while($i < count($tabla) && !$encontrado){
                if($tabla[$i][$columna]==$dato){
                    $encontrado = 1;
                }else{
                    $i++;
                }
            }
            if($encontrado){
                return $i;
            }else{
                return -1; //Informar en el programa principal
            }
        }

       /*  Función para encontrar en una tabla un dato que puede
        estar repetido en diferentes filas. En tal caso, nos 
        retornará un array con las filas en las que se encuentra. */
        
        function buscaFilaRep($tabla,$columna,$dato){
            $filas=array();
            for($i=0; $i<count($tabla); $i++){
                if($tabla[$i][$columna]==$dato){
                    $filas[] = $i;
                }
            }
            return $filas;
        }

        //Lo probamos
        include "arrayclientes.php";

        $fila = buscaFila($clientes,"saldo",15.43);
        echo $fila;

        $filas = buscaFilaRep($clientes,"saldo",10420.13);
        echo "<br>";
        for($i=0; $i<count($filas); $i++){
            echo "$filas[$i]" . "<br>";
        }
    ?>
    
</body>
</html>
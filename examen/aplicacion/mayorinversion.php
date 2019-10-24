<?php

    include "misfunciones.inc.php";
    include "lotes.php";

    
    //Cargamos el array en memoria procedente del fichero
    $lotes=[];
    fileToArray("almacen.txt","~",$lotes);

    //Variable para guardar el valor máximo, la inicializamos con el primer valor de la tabla
    //Indice cantidad --> 4
    //Indice precio --> 5

    $mayorInversion=$lotes[0][4] * $lotes[0][5];
    $indice=0;

    //Recorremos el resto del array y comparamos
    for($i=1; $i<count($lotes); $i++){
        $precioProducto=$lotes[$i][4] * $lotes[$i][5];
        if($precioProducto > $mayorInversion){
            $mayorInversion=$precioProducto;
            //Guardamos el índice de la fila
            $indice=$i;
        }
    }

    echo "El producto en el que más se ha invertido es el de codigo " . $lotes[$indice][0] .
         " en el que se han invertido " . $mayorInversion . " euros";

?>
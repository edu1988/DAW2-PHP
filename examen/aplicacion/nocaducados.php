<?php

    include "misfunciones.inc.php";
    include "lotes.php";

    //Recorrermos el array principal

    //Guardamos en un nuevo array los alimentos no caducados
    $noCaducados = [];

    for($i=0; $i<count($lotes); $i++){

        if(!caducado($lotes[$i][2])){ //La fecha es el campo 2
            //Insertamos al final de nuestro array el "registro correspondiente"
            $noCaducados[] = $lotes[$i];
        }

    }

    //Al terminar, tenemos que ordenar por fecha el array de noCaducados
    ordenarTabla($noCaducados,2);

    //Mostramos la tabla
    verTablaN($noCaducados);

    //Debido a que las fechas están en el formato aaaa-mm-dd
    //Podemos comparar fechas con el operador normal de comparación
    //La función de ordenarTabla cumple su proposito


    /**Mostrar array no-asociativo de dos dimensiones */
    function verTablaN($tabla){
        echo "<table border='1'>";
        foreach($tabla as $fila){
            echo "<tr>";
            foreach($fila as $clave => $valor){
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }




?>
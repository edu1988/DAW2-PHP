<?php

    function valorMedioColumna($tabla,$indice,$columna1,$columna2){
        //Obtenemos el dato buscado de la persona de referencia
        $valor=$tabla[$indice][$columna1];

        /*Recorremos el array. En todas las filas cuyo valor para columna1
        coincida con el valor de referencia, recogemos el valor de la columna2
        para calcular la media*/
        $sumaTotal=0;
        $numeroFilas=0;
        foreach($tabla as $fila){
            if($fila[$columna1]==$valor){
                $sumaTotal+=$fila[$columna2];
                $numeroFilas++; //Guardamos el número de filas que cumplen la condicion
            }
        }
        return $sumaTotal/$numeroFilas; //Retornamos el valor medio
    }



?>
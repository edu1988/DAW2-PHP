<?php

    /*Método para insertar una fila de datos en una tabla (array bidimensional)
     * que se encuentre previamente ordenado por los campos de una columna y para
     * que la fila que insertamos quede directamente en la posición que le corresponda.
     * Al método le pasamos por parámetro la fila que queremos insertar (un array
     * unidimensional), la columna por la cual queremos que quede ordenado, y una
     * referencia de la tabla donde queremos insertarlo.
     * 
     * Este método hará uso de un método de búsqueda binaria para determinar la
     * posición en el que la nueva fila debe insertarse.
     */
    function insertarOrdenado($fila,$columna,&$tabla){
        //Buscamos el elemento que queremos insertar para ver si ya existe
        $indice = busquedaBinTabla($tabla,$columna,$fila[$columna]);
        if($indice == -1){
            echo "El valor que intentas insertar ya existe";
        }else{
            //Movemos todos los elementos a partir del índice localizado
            //una posición hacia la derecha
            for($i=count($tabla)-1; $i>=$indice; $i--){
                $tabla[$i+1] = $tabla[$i];
            }
            //Una vez, desplazados, insertamos nuestro elemento
            $tabla[$indice] = $fila;
        }
    }



    /**Función para búsqueda binaria de un valor en la columna de un
     * array bidimensional
     */
    function busquedaBinTabla($tabla,$columna,$valor){
        $i=0; //Posicion inicial
        $j=count($tabla)-1; //Posicion final
        $medio = (int)(($i+$j)/2); //Índice de la posición media
        while($tabla[$medio][$columna] != $valor && ($i<=$j)){
            if($valor < $tabla[$medio][$columna]){
                $j = $medio - 1; //El tope superior será el anterior al medio
            }else{
                $i = $medio + 1; //El tope inferior será el posterior al medio
            }
            $medio = (int)(($i+$j)/2); //Recalculamos el indice medio
        }
        //Al abandonar del bucle ya se ha escaneado todo el array
        if($tabla[$medio][$columna]!=$valor){
            return $i; //Posición en la que debe quedar el elemento que insertemos
        }else{
            return -1; //Código para el caso de que el elemento ya exista
        }
    }


    //Método necesario de búsqueda binaria
    function busquedaBinaria($lista,$valor){
        $i=0; //Posicion inicial
        $j=count($lista)-1; //Posicion final
        $medio = (int)(($i+$j)/2); //Índice de la posición media
        while($lista[$medio] != $valor && ($i<=$j)){
            if($valor < $lista[$medio]){
                $j = $medio - 1; //El tope superior será el anterior al medio
            }else{
                $i = $medio + 1; //El tope inferior será el posterior al medio
            }
            $medio = (int)(($i+$j)/2); //Recalculamos el indice medio
        }
        //Al abandonar del bucle ya se ha escaneado todo el array
        if($lista[$medio]!=$valor){
            //No se ha encontrado el elemento
            return $i; //Posición en la que debería estar el elemento que insertemos
        }else{
            //El elemento se ha encontrado, enviamos código de "error";
            return -1;
        }
    }





?>
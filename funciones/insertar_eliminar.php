<?php

    include "funciones_busqueda.php";

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
        $indice = busquedaBinariaTabla($tabla,$columna,$fila[$columna]);
        if(is_int($indice)){
            echo "El valor que intentas insertar ya existe";
        }else{
            //Extraemos la posición donde debemos insertar el elemento
            $indice=intval(substr($indice,1));

            /*Movemos todos los elementos a partir del índice localizado
              una posición hacia delante.*/
              
            for($i=count($tabla)-1; $i>=$indice; $i--){
                $tabla[$i+1] = $tabla[$i];
            }
            //Una vez, desplazados, insertamos nuestro elemento
            $tabla[$indice] = $fila;
        }
    }


    function eliminarFila(&$tabla,$columna,$valor){
        //Buscamos el valor pasado en la columna correspondiente
        $indiceFila=busquedaBinariaTabla($tabla,$columna,$valor);
        if(!is_int($indiceFila)){
            return -1;//Código de error, el elemento que queremos eliminar no existe
        }else{
            //Eliminamos el elemento desplazando todas la filas posteriores a una posición anterior
            for($i=$indiceFila; $i<count($tabla)-1; $i++){
                $tabla[$i] = $tabla[$i+1];
            }
            //Nos cargamos el último elemento, que está repetido al final
            unset($tabla[count($tabla)-1]);
        }
    }


?>
<?php
    /*
    Función para búsqueda binaria de un valor en la columna de un
    array bidimensional.

    El parámetro $orden puede tomar solo los valores de "asc" o "desc"
     */

    function busquedaBinTabla($tabla,$columna,$valor,$orden){
        //Vamos a recorrer previamente la columna para ver si está ordenada
        if($orden=="asc"){
            for($i=0; $i<count($tabla)-1; $i++){
                if($tabla[$i][$columna] > $tabla[$i+1][$columna]){ //esperamos orden ascendente
                    return -2; //Código de error para el caso de no ordenado
                }
            }
            //Si está ordenado, buscamos el valor
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
                return -1; //Código de error para el programa principal
            }else{
                return $medio;
            }
        }else if($orden=="desc"){
            //Comprobamos si está bien ordenado descendentemente
            for($i=0; $i<count($tabla)-1; $i++){
                if($tabla[$i][$columna] < $tabla[$i+1][$columna]){ //esperamos orden descendente
                    return -3; //Código de error para el caso de no ordenado
                }
            }
            //Si llegamos hasta aquí es que sí está ordenado
            $i=0; //Posicion inicial
            $j=count($tabla)-1; //Posicion final
            $medio = (int)(($i+$j)/2); //Índice de la posición media
            while($tabla[$medio][$columna] != $valor && ($i<=$j)){
                if($valor < $tabla[$medio][$columna]){
                    $i = $medio + 1; //El tope inferior será el posterior al medio
                }else{
                    $j = $medio - 1; //El tope superior será el anterior al medio
                }
                $medio = (int)(($i+$j)/2); //Recalculamos el indice medio
            }
            //Al abandonar del bucle ya se ha escaneado todo el array
            if($tabla[$medio][$columna]!=$valor){
                return -1; //Código de error para el programa principal
            }else{
                return $medio;
            }
        }else{
            return -4; //Error: parámetro $orden mal introducido
        }
    }

?>
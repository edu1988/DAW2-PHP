<?php

    
    /*Misma función pero con ligeras variaciones*/

    function busquedaBinariaLista($lista,$valor){
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
            echo "No se ha encontrado el elemento";
        }else{
            echo "El valor $valor se encontró en la posición $medio";
        } 
    }

    /**Función para búsqueda binaria de un valor en la columna de un
     * array bidimensional
     */
    function busquedaBinariaTabla($tabla,$columna,$valor){
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
            return "x".$i; //Retornamos la posición teórica donde debería estar etiquetada
        }else{
            return $medio; //Retornamos la posición donde está.
        }
    }

    /*Función para buscar un valor en un array unidimensional
    mediante el algoritmo de búsqueda dicotómica o binaria

    function busquedaDic($lista,$valor){
        $n = count($lista);
        $pi = 0;
        $pf = $n;
        $posMed = (int)(($pi+$pf)/2);

        while($valor != $lista[$posMed] and ($pf-$pi)>1){
            if($valor > $lista[$posMed]){
                $pi = $posMed;
            }else{
                $pf = $posMed;
            }
            $posMed = (int)(($pi+$pf)/2);
        }
        if($valor == $lista[$posMed]){
            echo "Valor $valor encontrado en $posMed";
        }else{
            if($valor == $lista[$n-1]){
                echo "Valor $valor encontrado en $n";
            }else{
                echo "Valor $valor no encontrado";
            }
        }
    }
     */


?>
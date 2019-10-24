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
            return "x".$i; //Retornamos la posición donde debería estar, pero etiquetada.
        }else{
            return $medio; //Posición donde lo encontramos
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
            return "x".$i; //Retornamos la posición teórica donde debería estar, pero etiquetada
        }else{
            return $medio; //Retornamos la posición donde está.
        }
    }

    /*
    function busquedaDicRango($tabla,$campo,$valor,$asc){
        $cuales=[]; //Array para guardar los resultados de la búsqueda
        $pos=-2;
        $suelo=0;
        $techo=count($tabla)-1;
        while($pos==-2 && $suelo <= $techo){
            $donde=floor(($suelo+$techo)/2);
            if($valor==$tabla[$donde][$campo]){
                $pos=$donde;
            }
            if(($asc && $tabla[$donde][$campo] > $valor) || (!$asc) && $tabla[$donde][$campo] < $valor]){
                $techo = $donde - 1;
            }else{
                $suelo = $donde + 1;
            }
        }
        while($pos >= 0 && $tabla[$pos][$campo]==$valor){
            $cuales[0] = $pos--;
        }
        $pos++;
        while($pos >= 0 && $pos < count($tabla) && $tabla[$pos][$campo]==$valor){
            $cuales[1] = $pos++;
        }
        return $cuales?$cuales:[$suelo];

    }
    */
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
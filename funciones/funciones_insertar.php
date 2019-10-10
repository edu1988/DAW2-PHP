<?php

    function insertarOrdenado($valor,$tabla){

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
            return $i;
        }else{
            //El elemento se ha encontrado, enviamos código de "error";
            return -1;
        }
    }





?>
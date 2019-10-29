<?php

    /*Función para actualizar la información de la cookie que almacena el
    número de veces que se ha visitado cada página con el formato xx~xx~xx
    Le pasamos por parámetro la cookie que queremos actualizar y el número
    del producto, que será un valor del 1 al 3 */

    function sumarVisitaProducto($cadena,$producto){
        list($a,$b,$c) = explode("~",$cadena);
        if($producto==1){
            $a++;
        }
        if($producto==2){
            $b++;
        }
        if($producto==3){
            $c++;
        }
        $valores=[$a,$b,$c];
        $cookie=implode("~",$valores);
        return $cookie;
    }
    
    

?>
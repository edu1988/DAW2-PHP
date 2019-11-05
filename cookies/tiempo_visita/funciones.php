<?php

    /*Función para actualizar la información de la cookie que almacena el
    número de veces que se ha visitado cada página con el formato xx~xx~xx
    Le pasamos por parámetro la cookie que queremos actualizar y el número
    del producto, que será un valor del 1 al 3 */

    function sumarVisitaProducto(&$cadena,$producto){
        list($a,$b,$c,$d) = explode("-",$cadena);
        if($producto=="a"){
            $a++;
        }
        if($producto=="b"){
            $b++;
        }
        if($producto=="c"){
            $c++;
        }
        if($producto=="index"){
            $d++;
        }
        $valores=[$a,$b,$c,$d];
        $cadena=implode("-",$valores);
    }

    function sumarTiempoProducto(&$cadena,$producto,$tiempo){
        list($a,$b,$c,$d) = explode("-",$cadena);
        if($producto=="a"){
            $a+=$tiempo;
        }
        if($producto=="b"){
            $b+=$tiempo;
        }
        if($producto=="c"){
            $c+=$tiempo;
        }

        $valores=[$a,$b,$c,$d];
        $cadena=implode("-",$valores);
    }
    
    

?>
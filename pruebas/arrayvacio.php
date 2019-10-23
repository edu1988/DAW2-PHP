<?php

    $lista = [];

    $variable = boolval($lista);

    echo $variable?"veradera":"falsa";

    if($lista){
        echo "lista existe";
    }else{
        echo "lista no existe";
    }


?>
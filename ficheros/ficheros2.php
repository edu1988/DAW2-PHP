<?php

    include "../funciones/ficheros.php";
    include "../ejercicio_lista/arrayclientes.php";

    arrayToFile($clientes,"clientes.txt");

    $clientes2=[];

    
    fileToArray("clientes.txt","~",$clientes2);
?>
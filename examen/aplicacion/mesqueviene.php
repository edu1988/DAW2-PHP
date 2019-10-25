<?php

    include "misfunciones.inc.php";
    include "lotes.php";


    //Cargamos el array en memoria procedente del fichero
    $lotes=[];
    fileToArray("almacen.txt","~",$lotes);

    //Primero calculamos mes y año del mes que viene
    $tiempoActualUnix = time();

    $mesActual = date("m",$tiempoActualUnix);
    $anoActual = date("y",$tiempoActualUnix);

    




?>
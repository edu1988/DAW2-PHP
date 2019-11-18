<?php
    session_start();

    //Borramos la ip del fichero
    $ip=$_SESSION["ip"];

    //Cargamos el array de ips del fichero en memoria
    $ips=file("sesiones_abiertas.txt",FILE_IGNORE_NEW_LINES);

    //Buscamos y borramos la ip en cuestión
    
    $i=0;
    $borrado=false;
    while($i<count($ips) && !$borrado){
        if($ips[$i]==$ip){
            unset($ips[$i]);
            $borrado=true;
        }
        $i++;
    }

    $ips=array_merge($ips);

    //Reescribimos el fichero
    include "funciones_ficheros.php";
    arrayToFileUni($ips, "sesiones_abiertas.txt");

    session_destroy();
    
?>
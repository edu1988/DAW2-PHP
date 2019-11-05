<?php

    include "misfunciones.inc.php";
    $almacen=array();
    fileToArray("almacen.txt",$almacen);
    for($i=0; $i<count($almacen); $i++){
        list($diaCad,$mesCad,$anoCad)=explode("/",$almacen[$i]["fecha"]);
        $mesActual=date("m");
        $anoActual=date("Y");
        $mesSig=$mesActual+1;
        if($mesSig==13){
            $mesSig=1;
        }
        if(($mesCad==$mesSig)&&($anoCad==$anoActual) || ($mesSig==1)&&($anoCad==$anoActual+1)){
            echo "Lote: ",$almacen[$i]["nombre"]," caduca el mes que viene<br>";
        }
    }

?>
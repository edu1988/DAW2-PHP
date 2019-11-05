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


    //Apartado 5
    $almacen=array();
    fileToArray("almacen.txt",$almacen);
    $prod_max=$almacen[0]["nombre"];
    $precio=$almacen[0]["stock"]*$almacen[0]["precio"];
    for($i=0; $i<count($almacen); $i++){
        $producto=$almacen[$i]["nombre"];
        if(!isset($inversion[$producto])){
            $inversion[$producto]=$almacen[0]["stock"]*$almacen[0]["precio"];
        }else{
            $inversion[$producto]+=$almacen[0]["stock"]*$almacen[0]["precio"];
        }
    }

    $mayorInversion=$inversion["patatas"];
    $producto="patatas";
    foreach($inversion as $clave => $valor){
        if($valor > $mayorInversion){
            $producto=$clave;
        }
    }

    echo "El producto con la mayor inversion es " . $producto;


?>
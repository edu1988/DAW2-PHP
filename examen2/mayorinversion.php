<?php

    include "../funciones/ficheros.php";
    include "../funciones/funciones_ordenacion.php";
    include "../funciones/mostrar_arrays.php";
    include "../funciones/insertar_eliminar.php";
    include "lotes.php";

    if(!file_exists("almacen.txt")){
        //Creamos el fichero
        arrayToFile($lotes,"almacen.txt","~");
    }else{
        //Cargamos el array en memoria procedente del fichero
        $lotes=[];
        fileToArray("almacen.txt","~",$lotes);
    }

    //Ordenamos el array por nombre
    ordenarTabla($lotes,"nombre");

    verTabla($lotes);
    echo "<br>";

    $productoInicial = $lotes[0]["nombre"]; //Nombre primer producto
    $sumaPrecioTotal=0; //Acumulador coste por producto
    $mayorInversion=0; //Para guardar el mayor coste
    $producto=$productoInicial; //Para guardar el precio del producto con mayor coste
    

    for($i=0; $i<count($lotes); $i++){
        //Calculamos el coste de ese lote
        $precioTotal=$lotes[$i]["stock"]*$lotes[$i]["precio"];

        if($lotes[$i]["nombre"]==$productoInicial){
            $sumaPrecioTotal+=$precioTotal;
        }else{
            if($sumaPrecioTotal > $mayorInversion){
                $mayorInversion=$sumaPrecioTotal;
                $producto=$lotes[$i-1]["nombre"]; //Nombre del producto anterior
            }
            $productoInicial=$lotes[$i]["nombre"];
            $sumaPrecioTotal=$precioTotal;
        }
    }
    if($sumaPrecioTotal > $mayorInversion){
        $mayorInversion=$sumaPrecioTotal;
        $producto=$lotes[$i]["nombre"];
    }

    echo "El producto con mayor inversión ha sido: " . $producto . "<br>";
    echo "Su inversión ha sido de " . $mayorInversion . " euros";


?>
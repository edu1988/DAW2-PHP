<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php

        include "lotes.php";
        include "misfunciones.inc.php";
            
        if(!file_exists("almacen.txt")){
            //Creamos el fichero
            arrayToFile($lotes,"almacen.txt","~");
        }else{
            //Cargamos el array en memoria procedente del fichero
            $lotes=[];
            fileToArray("almacen.txt","~",$lotes);
        }

        //Vamos a recorrer el array de lotes y vamos a eliminar (unset) los que hayan caducado
        $eliminados=0;
        $precioTotalPerdido = 0;
        for($i=0; $i<count($lotes); $i++){
            if(caducado($lotes[$i][2])){
                //Primero calculamos el precio total de este lote
                $cantidad = $lotes[$i][4];
                $precio = $lotes[$i][5];
                $precioLote = $cantidad * $precio;
                $precioTotalPerdido += $precioLote;
                //Eliminamos el elemento
                unset($lotes[$i]);
                $eliminados++;
            }
        }


        echo "El número de lotes eliminados es " . $eliminados . "<br>" .
             "Los euros totales perdidos son: " . $precioTotalPerdido;
        

        //Actualizamos el fichero txt
        arrayToFile($lotes,"almacen.txt","~");


    ?>
    
</body>
</html>
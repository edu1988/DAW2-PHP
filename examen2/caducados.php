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
    verTabla($lotes);

    
    //Eliminamos los caducados
    foreach($lotes as $clave=>$valor){
        if(caducado($valor["fecha"])){
            unset($lotes[$clave]);
        }
    }

    
    //Recompactamos el array
    $lotes=array_values($lotes);

    verTabla($lotes);


    function caducado($fecha){
        list($ano,$mes,$dia)=explode("-",$fecha);
        
        $diaActual=date("d");
        $mesActual=date("m");
        $anoActual=date("Y");


        if($ano < $anoActual){
            return true;
        }else if($ano > $anoActual){
            return false;
        }else{
            if($mes < $mesActual){
                return true;
            }else if($mes > $mesActual){
                return false;
            }else{
                if($dia < $diaActual){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }



?>
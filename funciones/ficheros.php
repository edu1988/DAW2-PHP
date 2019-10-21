<?php

    /*Funcion para convertir un fichero txt en un array asociativo.
    Se le pasa por parámetro el nombre del fichero, el carácter separador
    y el array que se quiere generar.
    Se presupone una estructura para el fichero de entrada:
        -La primera línea contendrá los nombres de las claves
        -En el resto del fichero, cada línea sera un "registro" */
    function fileToArray($nombreFich,$separador,&$tabla){
        //Abrimos el archivo
        $fichero=fopen($nombreFich,"r");
        //Primera linea para extraer las claves
        $primeraLinea=fgets($fichero);
        $primeraLinea=str_replace("\n","",$primeraLinea);
        //Extraemos las claves
        $listaKeys=explode($separador,$primeraLinea);
        $registro=fgets($fichero);
        
        $tabla=[]; //Vaciamos el array, me lo den como me lo den
        while($registro){
            
            $registro=str_replace("\n","",$registro);
            $lista=explode($separador,$registro);
            $fila=[];
            for($i=0; $i<count($listaKeys); $i++){
                $key=$listaKeys[$i];
                $fila[$key]=$lista[$i];
            }
            $tabla[] = $fila;
            
            $registro=fgets($fichero);
        }
        fclose($fichero);
    }

    /*Función para volcar el contenido de un array unidimensional en
    un fichero txt.
    Recibe por parámetros el array bidimensional y el nombre del fichero
    En la primera línea del fichero se escribirán las claves.
    Cada campo del fichero irá separado por el caracter "~" */
    function arrayToFile($tabla,$nombreFich,$separador){
        if(count($tabla)>0){
            $claves=array_keys($tabla[0]); //Guardamos las claves
            $fichero=fopen($nombreFich,"w");
            //Escribimos las claves en la primera linea
            $linea=implode($separador,$claves)."\n";
            fwrite($fichero,$linea);
            //Escribimos el resto del contenido
            foreach($tabla as $clave => $valor){
                $linea="";
                foreach($valor as $clave2 => $valor2){
                    //fwrite($fichero,$valor2);
                    $linea.=$valor2."~";
                }
                $linea=substr($linea,0,strlen($linea)-1)."\n";
                fwrite($fichero,$linea);
            }
            fclose($fichero);
        }
    }

    /*Función para volcar un array bidimensional NO-ASOCIATIVO
    en un fichero de texto txt. En este caso no guardaremos ninguna
    fila con las claves*/
    function fileToArrayN($nombreFich,$separador,&$tabla){
        /*Usamos la funcion file() para hacer una primera conversion
        Nos devuelve un array unidimensional en el que cada fila del
        fichero corresponde a una posición*/
        $array=file($nombreFich,FILE_IGNORE_NEW_LINES);

        /*Convertimos nuestro array unidimensional en otro bidimensional*/
        $tabla=[];
        for($i=0; $i<count($array); $i++){
            $lista=explode($separador,$array[$i]);
            $tabla[]=$lista;
        }
    }

    /*Función para volcar el contenido de un array no-asociativo
    en un fichero txt. En este caso no crearemos ningún primer 
    registro con los datos de los nombres de las claves. La primera
    fila del fichero será el primer registro de datos de array. */
    function arrayToFileN($tabla,$nombreFich){
        //Abrimos el fichero o lo creamos si no existe (para escritura)
        $fichero=fopen($nombreFich,"w");
        //Escribimos el contenido
        for($i=0; $i<count($tabla); $i++){
            $linea="";
            for($j=0; $j<count($tabla[$i]); $j++){
                $linea.=$tabla[$i][$j]."~";
            }
            //Eliminamos el separador al final de la linea y añadimos salto de línea
            $linea=substr($linea,0,strlen($linea)-1)."\n";
            //Escribimos la linea en el fichero
            fwrite($fichero,$linea);
        }
        fclose($fichero);
    }

?>
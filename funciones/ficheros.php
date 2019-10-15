<?php

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


    function arrayToFile($tabla,$nombreFich){
        $claves=array_keys($tabla[0]); //Guardamos las claves
        $fichero=fopen($nombreFich,"w");
        //Escribimos las claves en la primera linea
        $linea=implode("~",$claves)."\n";
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

?>
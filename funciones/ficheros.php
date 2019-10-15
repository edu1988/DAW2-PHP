<?php

    function fileToArray($nombreFich,$separador,&$tabla){
        //Abrimos el archivo
        $fichero=fopen($nombreFich,"r");
        //Extraemos las claves
        $listaRegistros=explode($separador,fgets($fichero));

        while(!feof($fichero)){
            $registro=fgets($fichero);
            $lista=explode($separador,$registro);
            $fila=[];
            if($registro!=""){
                for($i=0; $i<count($listaRegistros); $i++){
                    $fila[$listaRegistros[$i]]=$lista[$i];
                }
                $tabla[] = $fila;
            }
        }
        fclose($fichero);
    }


    function arrayToFile(&$tabla,$nombreFich){
        $claves=array_keys($tabla[0]); //Guardamos las claves
        $fichero=fopen($nombreFich,"w");
        //Escribimos las claves en la primera linea
        $linea=implode("~",$claves)."\n";
        fwrite($fichero,$linea);
        //Escribimos el resto del contenido
        foreach($tabla as $clave => $valor){
            $linea="";
            foreach($valor as $clave => $valor2){
                //fwrite($fichero,$valor2);
                $linea.=$valor2."~";
            }
            $linea=substr($linea,0,strlen($linea)-1)."\n";
            fwrite($fichero,$linea);
        }
        fclose($fichero);
    }

?>
<?php

    /*
        Crea un funcion que devuelva la  edad correpondiente 
        a una fecha de nacimiento, en años (sin decimales).
    */

    function edadA($dia,$mes,$ano){
        $fechaNacUnix = mktime(0,0,0,$mes,$dia,$ano);
        $segsAnyo = 365.25 * 24 * 60 * 60;
        $anyos = (time()-$fechaNacUnix)/$segsAnyo;
        return floor($anyos);
    }

    /*
        Fecha prevista de fallecimeinto para una fecha de 
        nacimiento, considerando género y fecha de nacimeito 
        asignado a variables.

    */

    function fechaMuerte($dia,$mes,$ano,$genero){
        if(strtolower($genero)=="m"){
            $segundos = 80*365.25*24*60*60;  
        }else{
            $segundos = 85*365.25*24*60*60;
        }
        $fechaNac=mktime(0,0,0,$mes,$dia,$ano);
        $fechaMuerteU = $fechaNac + $segundos;
        $fechaMuerte = date("d/m/Y",$fechaMuerteU);
        return $fechaMuerte;
    }

    /*Función de Elias de la pizarra*/

    function edad($fecha){
        //Formato de la fecha: AAAA/mm/dd
        list($a,$m,$d)=explode("/",$fecha);
        if((strlen($a)!==4) || ($fecha[4] != "/")){
            echo "Error en el formato de fecha"; //o devolver codigo de error
        }
        //Lógica de fecha
        if(!checkdate($m,$d,$a)){
            echo "Fecha incorrecta"; //O código de error específico
        }
        $tnto = mktime(0,0,0,$m,$d,$a);
        $tvida = time()-$tnto;
        $annos = $tvida / (365.25*24*60*60); //aproximado
        $annos = explode(".", $annos)[0]; //floor();
        return $annos;
    }

?>
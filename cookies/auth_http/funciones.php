<?php

    function fechaHoraActual(){
        $actual = getdate();
        return $actual["mday"]."/".$actual["mon"]."/".$actual["year"]." ".$actual["hours"].":".$actual["minutes"].":".$actual["seconds"];
    }

    function sumarVisitaCookie($cookie){
        $datos=explode("-",$cookie);
        $visitas=$datos[3];
        $visitas++;
        return $datos[0]."-".$datos[1]."-".$datos[2]."-".$visitas;
    }

    function actualizarFechaCookie($cookie){
        $datos=explode("-",$cookie);
        return $datos[0]."-".fechaHoraActual()."-".$datos[2]."-".$datos[3];
    }

    function actualizarPaginaCookie($cookie,$pagina){
        $datos=explode("-",$cookie);
        return $datos[0]."-".$datos[1]."-".$pagina."-".$datos[3];
    }



?>
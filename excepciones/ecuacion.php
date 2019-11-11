<?php

    function ecuacionSegGrado($a,$b,$c){
        if($a==0){
            throw new Exception("No es una ecuación de segundo grado");
        }

        if(pow($b,2)-(4*$a*$c) < 0){
            throw new Exception("No tiene soluciones reales");
        }

        $soluciones[] = (-$b+sqrt(pow($b,2)-(4*$a*$c)))/(2*$a);
        $soluciones[] = (-$b-sqrt(pow($b,2)-(4*$a*$c)))/(2*$a);

        return $soluciones;
    }

    //Vamos a probarla
    $a=0; $b=-2; $c=-4;

    try{
        $soluciones=ecuacionSegGrado($a,$b,$c);
        echo "Solución 1: ".$soluciones[0]."<br>Solucion 2: ".$soluciones[1];
    }catch(Exception $e){
        echo $e->getMessage();
    }


?>
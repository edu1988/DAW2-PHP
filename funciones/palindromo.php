<?php

    function esPalindromo($frase){
        $frase = strtolower(str_replace(" ","",trim($frase)));
        $n = strlen($frase); //Ultimo indice
        $palindromo=1;
        $i=0;
        while($i < ($n-1-$i) && $palindromo){
            if($frase[$i]!=$frase[$n-1-$i]){
                $palindromo=0;
            }
            $i++;
        }
        return $palindromo;
    }



?>
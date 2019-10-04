<?php


    function busquedaDic($lista,$valor){
        $n = count($lista);
        $pi = 0;
        $pf = $n;
        $posMed = (int)(($pi+$pf)/2);

        while($valor != $lista[$posMed] and ($pf-$pi)>1){
            if($valor > $lista[$posMed]){
                $pi = $posMed;
            }else{
                $pf = $posMed;
            }
            $posMed = (int)(($pi+$pf)/2);
        }
        if($valor == $lista[$posMed]){
            echo "Valor $valor encontrado en $posMed";
        }else{
            if($valor == $lista[$n-1]){
                echo "Valor $valor encontrado en $n";
            }else{
                echo "Valor $valor no encontrado";
            }
        }
    }


?>
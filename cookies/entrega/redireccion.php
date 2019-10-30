<?php
    //CODIGO DE REDIRECCIÓN
    //Calculamos el producto visitado más veces
    //Redireccionamos en consecuencia
    if($a>=$b && $a>=$c){ //El a es el más visitado
        $cadena="Se le redireccionará al Producto A...";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='6;URL=http://localhost/cookies/entrega/productoa.php'>";
    }else if($b>=$c && $b>=$a){ //El b es el más visitado
        $cadena="Se le redireccionará al Producto B...";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='6;URL=http://localhost/cookies/entrega/productoa.php'>";
    }else{ //El c es el mas visitado
        $cadena="Se le redireccionará al Producto C...";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='6;URL=http://localhost/cookies/entrega/productoa.php'>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php

        include "arrayclientes.php";
        $maximo = $clientes[0]["saldo"];//Primer saldo de la tabla
        $imax = 0; //El cliente con el máximo sueldo, por defecto el 1.
        for($i=1;$i<count($clientes);$i++){
            if($clientes[$i]["saldo"]>$maximo){
                $maximo = $clientes[$i]["saldo"];
                $imax=$i;
            }
        }
        echo "El saldo máximo es " . $maximo . " y corresponde al cliente " .
                $clientes[$imax]["nombre"];

        echo "<br><br>";
        
        //Como guardar varios clientes con el mismo sueldo máximo

        $maximo = $clientes[0]["saldo"];
        $lista = array();
        $lista[] = 0;
        for($i=1; $i<count($clientes); $i++){
            if($clientes[$i]["saldo"]>$maximo){
                $maximo = $clientes[$i]["saldo"];
                unset($lista);
                $lista[] = $i;
            }else if($clientes[$i]["saldo"]==$maximo){
                $lista[] = $i;
            }
        }

        //Mostramos los sueldos
        for($x=0; $x<count($lista); $x++){
            echo $lista[$x],"<br>";
        } 

    ?>
    
</body>
</html>
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

        echo "LOTERIA: 6 valores aleatorios no repetidos entre 1 y 49<br>";
        
        $lista = [];
        $cantidad = 6;

        for($i=0; $i<$cantidad; $i++){

            do{
                $repetido = false;

                $lista[$i] = rand(1,49);

                $ultimoIndice = count($lista)-1;
                $indice = $ultimoIndice;

                while($indice >= 1 && !$repetido){

                    if($lista[$ultimoIndice] == $lista[$indice-1]){

                        $repetido = true;

                    }

                    $indice--;
                }

            }while($repetido);

        }

        for($i=0; $i < count($lista); $i++){

            echo "$lista[$i] -";
        }
        




    ?>
    
</body>
</html>
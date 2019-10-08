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

        function cuantosChicos($lista){
            $palabras = explode(",",$lista[0]);
            for($i=0; $i<count($palabras);$i++){
                echo "$palabras[$i]<br>";
            }
        }

        $lista2 = ["Pere Miguel, Eduardo", "robes chavlela, carlos"];
        cuantosChicos($lista2);


    ?>
</body>
</html>
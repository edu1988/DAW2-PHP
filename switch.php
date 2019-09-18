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

        //Elaborar una quiniela aleatoria

        for($i=1; $i<12; $i++){
            $aleatorio=rand(1,3);
            switch($aleatorio){
                case 1: echo "Local<br>";
                    break;
                case 2: echo "Visitante<br>";
                    break;
                case 3: echo "Empatan<br>";
                    break;
            }
        }
    ?>
</body>
</html>
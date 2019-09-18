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
        
        for($i=1; $i<30; $i++){
            $rand = rand(rand(1,10),10);
            echo "$rand, ";
        }

        echo "<br>";

        for($i=1; $i<12; $i++){
            $aleatorio=rand(1,3);
            if($aleatorio==3){
                $aleatorio="X";
            }
            echo $aleatorio," ";
        }
    ?>
</body>
</html>
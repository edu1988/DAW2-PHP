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

        /**Números aleatorios ponderados */
        
        for($i=1; $i <=15; $i++){
            $aleatorio = rand(1,10);
            if($aleatorio >= 0 && $aleatorio <= 7){
                $aleatorio = 1;
            }else{
                $aleatorio=rand(1,2);
                if($aleatorio == 1){
                    $aleatorio = "X";
                }else{
                    $aleatorio = 2;
                }
            }
            echo $aleatorio,", ";
        }

        //Elaborar una quiniela aleatoria

        $aleatorio=rand(1,3);
        if($aleatorio==3){
            echo "X<br>";
        }else{
            echo "$aleatorio<br>";
        }

        $aleatorio=rand(1,3);
        if($aleatorio==3){
            echo "X<br>";
        }else{
            echo "$aleatorio<br>";
        }

        $aleatorio=rand(1,3);
        if($aleatorio==3){
            echo "X<br>";
        }else{
            echo "$aleatorio<br>";
        }

        $aleatorio=rand(1,3);
        if($aleatorio==3){
            echo "X<br>";
        }else{
            echo "$aleatorio<br>";
        }

        $aleatorio=rand(1,3);
        if($aleatorio==3){
            echo "X<br>";
        }else{
            echo "$aleatorio<br>";
        }

        $aleatorio=rand(1,3);
        if($aleatorio==3){
            echo "X<br>";
        }else{
            echo "$aleatorio<br>";
        }

        $aleatorio=rand(1,3);
        if($aleatorio==3){
            echo "X<br>";
        }else{
            echo "$aleatorio<br>";
        }

        $aleatorio=rand(1,3);
        if($aleatorio==3){
            echo "X<br>";
        }else{
            echo "$aleatorio<br>";
        }

        $aleatorio=rand(1,3);
        if($aleatorio==3){
            echo "X<br>";
        }else{
            echo "$aleatorio<br>";
        }

        $aleatorio=rand(1,3);
        if($aleatorio==3){
            echo "X<br>";
        }else{
            echo "$aleatorio<br>";
        }

        $aleatorio=rand(1,3);
        if($aleatorio==3){
            echo "X<br>";
        }else{
            echo "$aleatorio<br>";
        }

        $aleatorio=rand(1,3);
        if($aleatorio==3){
            echo "X<br>";
        }else{
            echo "$aleatorio<br>";
        }


        //Numeros de la primitiva
        $aleatorio=rand(1,49);
        echo "$aleatorio, ";
        $aleatorio=rand(1,49);
        echo "$aleatorio, ";
        $aleatorio=rand(1,49);
        echo "$aleatorio, ";
        $aleatorio=rand(1,49);
        echo "$aleatorio, ";
        $aleatorio=rand(1,49);
        echo "$aleatorio, ";
        $aleatorio=rand(1,49);
        echo "$aleatorio, ";

        echo "<br>";

        

    ?>
</body>
</html>
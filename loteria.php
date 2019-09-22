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

        do{
            $aleatorio1 = rand(1,49);
            $aleatorio2 = rand(1,49);
            $aleatorio3 = rand(1,49);
            $aleatorio4 = rand(1,49);
            $aleatorio5 = rand(1,49);
            $aleatorio6 = rand(1,49);
        }while($aleatorio1 == $aleatorio2 || $aleatorio1 == $aleatorio3 ||
               $aleatorio1 == $aleatorio4 || $aleatorio1 == $aleatorio5 ||
               $aleatorio1 == $aleatorio6 || $aleatorio2 == $aleatorio3 ||
               $aleatorio2 == $aleatorio4 || $aleatorio2 == $aleatorio5 ||
               $aleatorio2 == $aleatorio6 || $aleatorio3 == $aleatorio4 ||
               $aleatorio3 == $aleatorio5 || $aleatorio3 == $aleatorio6 ||
               $aleatorio4 == $aleatorio5 || $aleatorio4 == $aleatorio6 ||
               $aleatorio5 == $aleatorio6);
        
        echo $aleatorio1,", ",$aleatorio2,", ",$aleatorio3,", ",$aleatorio4,", ",$aleatorio5,", ",$aleatorio6;



        




    ?>

</body>
</html>
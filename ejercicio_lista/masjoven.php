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

        function fechaMenor($fecha1,$fecha2){
            $valores1 = explode("/",$fecha1);
            $valores2 = explode("/",$fecha2);
            if($valores1[2] < $valores2[2]){
                return $fecha1;
            }else if($valores1[2]>$valores2[2]){
                
            }
        }

        echo time();

    ?>
</body>
</html>
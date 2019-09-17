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
            $variable = null;
            $variable2 = (string)$variable;
            echo "<br>",gettype($variable2),"&nbsp",$variable2;
            if($variable2){
                echo "<br>true";
            }else{
                echo "<br>false"; 
            }

            if($variable2==""){
                echo "<br>cadena vacia";
            }else{
                echo "<br>otra cosa"; 
            }
    ?>
    
</body>
</html>
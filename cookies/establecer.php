<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ESTABLECER UNA COOKIE DE UN MINUTO DE DURACIÓN</h1>
    <?php

        if(isset($_COOKIE["micookie"])){
            echo "La cookie ya existe";
        }else{
            echo "La cookie 'micookie' no existía<br>";
            echo "Acabamos de crear la cookie 'micookie'";
            setcookie("micookie","contenido de mi cookie",time()+60);
        }
        
        


    ?>
    
</body>
</html>
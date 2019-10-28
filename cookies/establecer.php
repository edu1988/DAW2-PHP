<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ESTABLECER UNA COOKIE</h1>
    <?php
        echo "Vamos a establecer una cookie llamada 'micookie' y cuyo contenido es 'contenido de mi cookie'";
        setcookie("micookie","contenido de mi cookie",time()+60*60*1000);

    ?>
    
</body>
</html>
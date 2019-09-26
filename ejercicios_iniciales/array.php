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

        //Cargar un array con los 100 primeros numeros pares y mostrarlos

        $numeros = array();
        $variable = 0;

        for($i=0; $i<100; $i++){
            $numeros[$i] = $variable;
            $variable += 2;
        }

        var_dump($numeros);


        //Resolver el problema de la primitiva con arrays

    ?>

</body>
</html>
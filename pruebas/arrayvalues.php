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

        $clientes = array(
            "datos1" => array("nombre" => "Edu", "edad" => 24),
            "datos2" => array("nombre" => "Pepe", "edad" => 34),
            "datos3" => array("nombre" => "marisa", "edad" => 14)
        );

        var_dump($clientes);
        echo "<br>";
        unset($clientes[1]);

        $convertido = array_values($clientes);

        var_dump($convertido);

    ?>
    
</body>
</html>
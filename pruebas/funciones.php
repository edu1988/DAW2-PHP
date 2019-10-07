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

        include "../funciones/mostrar_arrays.php";
        include "../funciones/funciones_ordenacion.php";
        include "../ejercicio_lista/arrayclientes.php";
        $lista=array("España"=>"Madrid","Italia"=>"Roma","Francia"=>"Paris");

        verTabla($clientes);
        ordenarTablaBur($clientes,"nombre"); echo "<br><br>";
        verTabla($clientes);
        

    ?>
</body>
</html>
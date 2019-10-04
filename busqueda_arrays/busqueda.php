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
        include "../funciones/funciones_ordenacion.php";
        include "../funciones/funciones_busqueda.php";

        $lista = [1,2,3,4,5,6,7,8,9,11,12,13,34,54,76,45,29,77];
        ordenarBurb($lista);

        for($i=0;$i<count($lista);$i++){
            echo "$lista[$i], ";
        }

        echo "<br>";

        busquedaDic($lista,1);

    ?>
    
</body>
</html>
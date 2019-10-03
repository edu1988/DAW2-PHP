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
        //Prueba de la función de intercambio
        $a = 4; $b = 3;
        echo "Antes del intercambio<br>";
        echo '$a = ' . $a . "<br>";
        echo '$b = ' . $b . "<br>";

        intercambia($a,$b);
        echo "Después del intercambio<br>";
        echo '$a = ' . $a . "<br>" . '$b = ' . $b . "<br>";

        //Prueba de la función de ordenación por selección
        $lista=[4,56,4,7,6,9,71,11,2,1,6,54,3,23,5];
        //Mostramos el array tal cual
        for($i=0; $i<count($lista); $i++){
            echo "$lista[$i], ";
        }
        echo "<br>";
        ordenarBurb($lista);
        for($i=0; $i<count($lista); $i++){
            echo "$lista[$i], ";
        }


    ?>
</body>
</html>
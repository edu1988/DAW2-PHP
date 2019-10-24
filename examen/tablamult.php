<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
        }

        td{
            text-align:center;
            border: 1px solid black;
            width:40px;
        }

        .negrita{
            font-weight:bold;
        }
    </style>
</head>
<body>

    <?php

        echo "<table>";
        //Primera fila es especial
        echo "<tr class='negrita'><td>x</td>";
        for($i=0; $i<10; $i++){
            echo "<td>$i</td>";
        }
        echo "</tr>";

        //Resto de la tabla
        for($i=0; $i<10; $i++){
            echo "<tr>";
            echo "<td class='negrita'>$i</td>";
            for($j=0; $j<10; $j++){
                $producto=$i*$j;
                echo "<td>$producto</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

    ?>
    
</body>
</html>
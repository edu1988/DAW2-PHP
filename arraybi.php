<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            padding:20px;
        }
        .cabecera{
            background-color:lightgrey;
            text-align: center;
        }

        td{
            border:1px solid red;
            padding:10px;
        }
    </style>
</head>
<body>

    <?php

        $lista = array(
            array("21882361A", "Saez Lopez, Francisco", "02/03/1987", "Burgos", 12543.21),
            array("13226185Z", "Perez Saez, Manuel", "12/08/1957", "Cuenca", 783.21),
            array("73281911C", "Gago Fernandez, Cristian", "10/01/1999", "Leon", 87.15),
            array("75684752C", "Palencia Mulero, Raul", "11/11/1911", "Palencia", 8821.23),
            array("34113879X", "Martín Crespo, Luis Carlos", "23/03/1993", "Burgos", 16543.21),
        );

        echo "<table>";
        echo "<tr class='cabecera'>
                <td>DNI</td><td>Nombre</td>
                <td>Fecha Nac</td>
                <td>Localidad</td>
                <td>Saldo</td>
              </tr>";

        for($i=0; $i<count($lista);$i++){

            echo "<tr>";

            for($j=0; $j < count($lista[$i]); $j++){
                echo "<td>";
                echo $lista[$i][$j];
                echo "</td>";
            }

            echo "</tr>";
        }

        echo "</table>";
        echo "<br>";

        //Qué cliente tiene más dinero
        //Recorremos solo la última columna del array
        $cantidad_maxima = $lista[0][4];
        $cliente = 0;
        for($i=1; $i<count($lista); $i++){
            if($lista[$i][4] > $cantidad_maxima){
                $cantidad_maxima = $lista[$i][4];
                $cliente = $i;
            }
        }

        echo "El cliente ", $lista[$cliente][1], " es el que más dinero tiene (", $cantidad_maxima, ")";

        echo "<br>";

        //Dinero total de los clientes. Recorremos el array y sumamos
        $total=0;
        for($i=0; $i<count($lista); $i++){
            $total+=$lista[$i][4];
        }
        echo "La cantidad total de dinero es: ", $total;
        echo "<br>";

        //Cliente más joven
        $fecha = DateTime::createFromFormat("d/m/Y",$lista[0][2]);
        for($i=1; $i<count($lista); $i++){
            $fecha2 = DateTime::createFromFormat("d/m/Y",$lista[$i][2]);
            if($fecha2 > $fecha){
                $fecha = $fecha2;
                $cliente = $i;
            }
        }

        echo "El cliente más joven es ", $lista[$cliente][1], " nacido el ", $fecha->format("d/m/Y");

        


    ?>
    
</body>
</html>
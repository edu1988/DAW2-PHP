<?php
    session_start();

    //Restringimos el acceso a la página a todo aquel que no sea profesor o tutor
    if($_SESSION["usuario"]["rol"]!=="profesor" && $_SESSION["usuario"]["rol"]!=="tutor"){
        header("Location:index.php");
    }

    //Cargamos el array de alumnos en memoria a partir del fichero
    include "../funciones/ficheros.php";
    $usuarios=[];
    fileToArray("datos.txt","~",$usuarios);

    //Mostramos las notas de los alumnos en una tabla en el html

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--link rel="stylesheet" href="estilos.css"/-->
    <title>TODAS LAS NOTAS</title>
</head>

<body>
    
    <h1>TODAS LAS NOTAS</h1>

    <?php

        $claves=["1ev","2ev","3ev"];

        echo "<table border='1'>";
        echo "<tr><td></td><td>EV 1</td><td>EV 2</td><td>EV 3</td></tr>";
        for($i=0; $i<count($usuarios); $i++){
            if($usuarios[$i]["rol"]=="alumno"){
                echo "<tr><td>".$usuarios[$i]["email"]."</td>";
                for($j=0; $j<count($claves); $j++){
                    echo "<td>".$usuarios[$i][$claves[$j]]."</td>";
                }
                echo "</tr>";
            }
        }
        echo "</table>";

    ?>

    <BR>
    <a href="logout.php">CERRAR SESIÓN</a>

</body>

</html>
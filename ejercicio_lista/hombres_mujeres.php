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

        include "arrayclientes.php";

        //Vamos a ver cuantos hombres y mujeres hay en la tabla
        /*Si un nombre termina en 'o' lo consideramos hombre,
        si termina en 'a' lo consideramos mujer */

        //Inicializamos las variables donde acumularemos la cantidad
        $chicos = 0;
        $chicas = 0;
        //Recorremos el array con un bucle foreach
        for($i=0; $i<count($clientes);$i++){
            //Guardamos el nombre en una variable
            $nombreApe=trim($clientes[$i]["nombre"]);
            //Lo procesamos
            $posicion=strpos($nombreApe,",");
            $nombre=substr($nombreApe,$posicion+2);
            if(substr($nombre,strlen($nombre)-1)=="o"){
                $chicos++;
            }
            if(substr($nombre,strlen($nombre)-1)=="a"){
                $chicas++;
            }
        }

        echo "Hay $chicos chicos en toda la lista.";
        echo "<br>";
        echo "Hay $chicas chicas en toda la lista.";
        echo htmlspecialchars(chr(166));

    ?>
    
</body>
</html>
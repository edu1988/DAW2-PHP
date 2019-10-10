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
        include "../ejercicio_lista/arrayclientes.php";
        include "../funciones/mostrar_arrays.php";
        include "../funciones/funciones_ordenacion.php";
        include "../funciones/funciones_insertar.php";

        //Mostramos el array de clientes
        verTabla($clientes);
        echo "<br>";
        //La ordenamos por DNI y la volvemos a mostrar
        ordenarTabla($clientes,"ciudad");
        verTabla($clientes);
        echo "<br>";
        //Insertamos una fila
        $fila=array("dni"=>"32882192X","nombre"=>"Gil Siloé, Alberto", 
                    "fecha"=>"10/02/2002","ciudad"=>"Burgos","saldo"=>113,
                    "idiomas"=>"francés,checo,alemán");
        
        insertarOrdenado($fila,"ciudad",$clientes);
        verTabla($clientes);


    ?>
    
</body>
</html>
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
        td{
            background-color:lightgrey;
            padding:10px;
        }
    </style>
</head>
<body>

    <?php
        include('arrayclientes.php');
        isset($clientes); //Devuelve true, porque la variable clientes existe en el fichero del include

        //Visualizar la tabla
        echo "<table>";
        //Mostrar cabecera
        echo "<tr>";
        for($i=0;$i<count($cabecera);$i++){
            echo "<td>",$cabecera[$i],"</td>";
        }
        echo "</tr>";
        //Mostrar clientes
        for($i=0;$i<count($clientes);$i++){
            echo "<tr>";
            foreach($clientes[$i] as $valor){
                echo "<td>",$valor,"</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<br><br>";

        //Vamos a ordenar los valores de la tabla por saldo
        include "../funciones/funciones_ordenacion.php";
        ordenarTabla($clientes,"dni");
        //La volvemos a mostrar
        echo "<table>";
        //Mostrar cabecera
        echo "<tr>";
        for($i=0;$i<count($cabecera);$i++){
            echo "<td>",$cabecera[$i],"</td>";
        }
        echo "</tr>";
        //Mostrar clientes
        for($i=0;$i<count($clientes);$i++){
            echo "<tr>";
            foreach($clientes[$i] as $valor){
                echo "<td>",$valor,"</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<br><br>";

        //Vamos a buscar un dni con la función de búsqueda binaria para tablas
        include "../funciones/funciones_busqueda.php";
        $dni = "73887234A";
        $fila = busquedaBinTabla($clientes,"dni",$dni);
        if($fila != -1){
            $fila++;
            echo "<br>El dni $dni se ha encontrado en la fila $fila";
        }else{
            echo "<br>No se ha encontrado ese valor";
        }
        

    ?>
    
</body>
</html>
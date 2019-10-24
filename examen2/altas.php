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

    include "../funciones/ficheros.php";
    include "../funciones/funciones_ordenacion.php";
    include "../funciones/mostrar_arrays.php";
    include "../funciones/insertar_eliminar.php";
    include "lotes.php";

    if(!file_exists("almacen.txt")){
        //Creamos el fichero
        arrayToFile($lotes,"almacen.txt","~");
    }else{
        //Cargamos el array en memoria procedente del fichero
        $lotes=[];
        fileToArray("almacen.txt","~",$lotes);
    }

    //Ordenamos el array por codigo
    ordenarTabla($lotes,"codigo");

    

    //Si enviamos el formulario
    if(isset($_POST["enviar"])){

        //Recogemos las variables
        foreach($_POST as $clave => $valor){
            $$clave=$valor;
        }

        //Elaboramos un lote
        $lote=array("codigo"=>$codigo,"nombre"=>$nombre,"fecha"=>$fecha,
                    "procedencia"=>$procedencia,"stock"=>$stock,"precio"=>$precio);

        //Lo insertamos ordenado por codigo
        insertarOrdenado($lote,"codigo",$lotes);

        //Reconstruimos el fichero
        arrayToFile($lotes,"almacen.txt","~");


    }

    //Lo mostramos
    verTabla($lotes);

    ?>

<form method="post" action="">
    Código: <input type="text" name="codigo" required/><br>
    Descripción: <input type="text" name="nombre" required/><br>
    Caducidad: <input type="date" name="fecha" required><br>
    <!--Localidad: <input type="text" name="localidad" required/><br>-->
    Procedencia: <input type="text" name="procedencia" required/><br>
    Stock: <input type="number" name="stock" required/><br>
    Precio: <input type="number" name="precio" required><br>
    <input type="submit" name="enviar" value="Añadir"/>
</form>
        
</body>
</html>


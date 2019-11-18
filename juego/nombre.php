<?php
    session_start();

    //Cargamos el array de puntuaciones en memoria
    include "funciones_ficheros.php";
    include "funciones_ordenacion.php";
    include "insertar_eliminar.php";
    $puntuaciones=[];
    fileToArray("puntuaciones.txt",".",$puntuaciones);

    //Ordenamos el array por el campo puntuación
    ordenarTabla($puntuaciones,"puntuacion");


    //Recuperamos la información que queremos guardar en el archivo
    if(isset($_POST["enviar"])){
        $nombre=$_POST["nombre"];
        $fecha=date("Y-m-d");
        $puntuacion=$_SESSION["contador"];

        //Elaboramos el registro a escribir en el fichero
        $registro=array("nombre"=>$nombre, "fecha"=>$fecha, "puntuacion"=>$puntuacion);

        //Lo insertamos ordenado en el array
        insertarOrdenado($registro,"puntuacion",$puntuaciones);

        //Reescribimos el fichero
        arrayToFile($puntuaciones,"puntuaciones.txt",".");


        unset($_SESSION["aleatorio"]);
        unset($_SESSION["limites"]);
        unset($_SESSION["contador"]);

        //header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>INTRODUCE TU NOMBRE</h1>
    <form action="" method="post">
        <input type="text" name="nombre">
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>
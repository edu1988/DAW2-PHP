<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        padding:30px;
    }
</style>
<body>

    <?php
        //PROCESAR DATOS
        if(isset($_POST["enviar"])){
            $nombre = $_POST["nombre"];
            echo $nombre;
        }


        //MOSTRAMOS LA TABLA
        include "../ejercicio_lista/arrayclientes.php";
        include "../funciones/mostrar_arrays.php";
        verTabla($clientes);

    ?>

    
    <h1>AÑADIR CLIENTE</h1>
    <form method="post" action="">
        <input type="text" name="nombre"/>
        <input type="submit" name="enviar" value="AÑADIR CLIENTE"/>
    </form>

    
</body>
</html>
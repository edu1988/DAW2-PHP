<?php

    session_start();

    //Restricción de acceso
    if(!isset($_SESSION["admin"])){
        session_destroy();
        header("Location:login.php");
    }

    //Cargamos en memoria los dos ficheros
    include "funciones_ficheros.php";
    $clientes=[];
    $movimientos=[];

    fileToArray("CtaCliente.txt","~",$clientes);
    fileToArray("Movimiento.txt","~",$movimientos);

    //En el html, generamos un select option
    //con tantas opciones (dni) como clientes hay en el archivo de clientes

    //Si enviamos el formulario
    if(isset($_POST["borrar"])){
        //Extraemos el dni
        $dniElegido=$_POST["clientes"];

        //Borramos el dni del array de clientes
        include "funciones_insercion_borrado.php";
        eliminarFila($clientes,"dni",$dniElegido);

        //Reescribimos el fichero
        arrayToFile($clientes,"CtaCliente.txt","~");

        //Borramos todos los registros de movimientos que correspondan a ese cliente
        $i=0;
        $totalMovimientos = count($movimientos);
        while($i < $totalMovimientos){
            if($movimientos[$i]["dnicli"]==$dniElegido){
                eliminarFila($movimientos,"dnicli",$dniElegido);
            }
            $totalMovimientos=count($movimientos);
            $i++;
        }

        //Reescribimos el fichero
        arrayToFile($movimientos,"Movimiento.txt","~");



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
    <h1>ELIMINAR UN CLIENTE Y TODOS SUS MOVIMIENTOS</h1>

    <form action="" method="post">

        <select name="clientes" id="clientes">

            <?php
                for($i=0; $i<count($clientes); $i++){
                    echo "<option value='".$clientes[$i]["dni"]."'>".$clientes[$i]["dni"] ."</option>";
                }
            ?>

        </select>

        <br><br>

        <input type="submit" name="borrar" value="Borrar">

    </form>
    
</body>
</html>
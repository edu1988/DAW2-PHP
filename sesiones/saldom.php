<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            text-align: center;
        }

        body {
            background: #B6E7ED;
        }

        h1 {
            text-align: center;
        }

        table {
            background-color: #B6E7FD;
            padding: 15px;
            border: #666 5px solid;
            align: center;
            width: auto;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            margin-bottom:40px;
        }
    </style>
</head>

<body>
    <?php

    session_start();

    //Recuperamos las variables de sesion
    if (isset($_SESSION["usuario"])) {

        $usuario = $_SESSION["usuario"];
        $nombreUsuario = $usuario["nombre"];
        
        //Calculamos el saldo medio de la localidad de dicho usuario.
        //Primero obtenemos su localidad
        $ciudad = $usuario["ciudad"];

        //Recuperamos el array a partir del fichero
        $clientes=[];
        include "../funciones/ficheros.php";
        fileToArray("clientes.txt","~",$clientes);

        //Ordenamos el array por localidades
        include "../funciones/funciones_ordenacion.php";
        ordenarTabla($clientes,"ciudad");

        //Buscamos la primera fila que encuentre donde esté esa ciudad
        include "../funciones/funciones_busqueda.php";
        $resultado = busquedaBinariaTabla($clientes,"ciudad",$ciudad);

        //Retrocedemos en el array hasta encontrar la primera ocurrencia de una ciudad distinta
        while($resultado >=0 && $clientes[$resultado]["ciudad"]==$ciudad){
            $resultado--;
        }

        //Al salir del bucle $resultado+1 almacena el índice de la primera ocurrencia
        //Recorremos el array hacia adelante para sumar todas y hacer la media
        $numeroCiudades=0;
        $sumaSaldos=0;
        $i=$resultado+1;
        while($clientes[$i]["ciudad"]==$ciudad){
            $sumaSaldos+=$clientes[$i]["saldo"];
            $i++;
            $numeroCiudades++;
        }

        $media=$sumaSaldos/$numeroCiudades;

        echo "<h1>BIENVENIDO $nombreUsuario</h1>
              <form action='' method='post'>
              <table>
                <tr>
                    <td>
                        <h2>Saldo medio de $ciudad: $media €</h2>
                    </td>
                </tr>
               </table>
              </form>";

        echo "<h4><a href='frontend.php'>VOLVER</a></h4>";

        echo "<form method='post' action=''>
              <input type='submit' name='cerrar' value='Cerrar sesion'/>
            </form>";
    } else {
        echo "<h1>NO TIENE ACCESO A ESTA PÁGINA</h1>";
    }


    if (isset($_POST["cerrar"])) {
        session_unset();
        header("Location: index.php");
    }

    ?>

</body>

</html>
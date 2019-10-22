<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        text-align:center;
    }
    body {
        background: #B6E7ED;
    }

    h1 {
        text-align: center;
        margin-top: 20px;
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
        border-collapse: collapse;
    }

    td {
        margin: 5px;
        padding: 10px;
        font-size: 1.5em;
    }
    input[type="submit"]{
        margin:20px;
    }
</style>

<body>

    <?php

    session_start();

    //Recuperamos las variables de sesion
    if (isset($_SESSION["user"]) && isset($_SESSION["pass"])) {

        $usuario = $_SESSION["user"];
        $pass = $_SESSION["pass"];

        if ($usuario == "admin" && $pass == "1234") {

            //Lo primero generamos el array de clientes a partir del fichero
            $clientes = [];
            include "../funciones/ficheros.php";
            fileToArray("clientes.txt", "~", $clientes);

            echo "<h1>BIENVENIDO ADMINISTRADOR</h1>";
            echo "<h3>INFORME</h3>";

            //TAREA PRINCIPAL

            //FORMA 1

            //GENERAMOS UN ARRAY ASOCIATIVO CON LOS DATOS DE CADA CIUDAD Y SU SALDO TOTAL
            for ($i = 0; $i < count($clientes); $i++) {
                $loc = $clientes[$i]["ciudad"];
                if (!isset($total[$loc])) {
                    $total[$loc] = $clientes[$i]["saldo"]; //Inicializar total
                } else {
                    $total[$loc] += $clientes[$i]["saldo"]; //Incrementar
                }
            }

            //Mostramos la información
            $info = "";
            echo "<table>";
            foreach ($total as $clave => $valor) {
                echo "<tr><td>El saldo total de $clave es</td><td>$valor</td></tr>";
            }
            echo "</table>";

            //FORMA 2

            /*
            TAREA
            Hacer el informe partiendo de un array ordenado por localidades
            y con un solo recorrido.
            Se trata de recorrer el array e ir acumulando datos mientras nos
            mantenemos en la misma ciudad.
            Cuando cambiamos de ciudad, mostramos los datos de la ciudad anterior
            y empezamos a acumular los nuevos
            */

            //Primero ordenamos el array por localidad
            include "../funciones/funciones_ordenacion.php";
            ordenarTabla($clientes, "ciudad");

            //Una variable guardará la primera ciudad de cada "seccion";
            $ciudadInicial = $clientes[0]["ciudad"];
            //Otra variable guardará las sumas
            $sumaSaldos = $clientes[0]["saldo"];

            echo "<table>";
            for ($i = 1; $i < count($clientes); $i++) {
                if($clientes[$i]["ciudad"]==$ciudadInicial){
                    $sumaSaldos+=$clientes[$i]["saldo"];
                }else{
                    echo "<tr><td>Saldo total de $ciudadInicial: $sumaSaldos €</td></tr>";
                    $ciudadInicial=$clientes[$i]["ciudad"];
                    $sumaSaldos=$clientes[$i]["saldo"];
                }
                if($i==count($clientes)-1){
                    echo "<tr><td>Saldo total de $ciudadInicial: $sumaSaldos €</td></tr>";
                }
            }
            echo "</table>";


            echo "<form method='post' action=''>
                    <input type='submit' name='cerrar' value='Cerrar sesion'/>
                  </form>";

            echo "<a href='backend.php'><h3>VOLVER</h3></a>";
        }
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
<?php
session_start();

//Includes necesarios
include "funciones_ficheros.php";
include "funciones_busqueda.php";

//Cargamos el fichero de puntuaciones en memoria para mostrarlo en el html
$puntuaciones = [];
fileToArray("puntuaciones.txt", ".", $puntuaciones);

//Calculamos un numero aleatorio entre 1 y 100
if (!isset($_SESSION["aleatorio"])) {
    $numero = rand(1, 100);
    $_SESSION["aleatorio"] = $numero;
    echo $numero;
}

if (isset($_POST["enviar"])) {
    //Variables para guardar los intervalos durante la sesión de intentos
    if (!isset($_SESSION["limites"])) {
        $_SESSION["limites"] = array("superior" => 100, "inferior" => 1);
        $_SESSION["contador"] = 0;
    }

    //Recuperamos la variable escrita por el usuario
    $num_escrito = $_POST["numero"];
    //Recuperamos el número aleatorio generado al comienzo
    $numero = $_SESSION["aleatorio"];

    if ($num_escrito > $numero) {

        $_SESSION["contador"]++; //Incrementar contador
        $_SESSION["limites"]["superior"] = $num_escrito - 1; //Ajustar limite superior
        $info = "La solucion está entre {$_SESSION['limites']['inferior']} y {$_SESSION['limites']['superior']}.";
    } elseif ($num_escrito < $numero) {

        $_SESSION["contador"]++;
        $_SESSION["limites"]["inferior"] = $num_escrito + 1;
        $info = "La solucion está entre {$_SESSION['limites']['inferior']} y {$_SESSION['limites']['superior']}.";
    } else {

        $_SESSION["contador"]++;
        $alfin = 1;
        $info = "¡ACERTASTE! Te ha costado {$_SESSION["contador"]} intentos.";

        //Nos vamos a otra página donde le pediremos su nombre y lo guardaremos
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='2;URL=http://localhost/juego/nombre.php'>";
    }

    //Mensajes de insulto
    if (!isset($alfin)) {
        if ($_SESSION["contador"] == 2) {
            $info .= " Llevas dos intentos. Eres un poco zoquete.";
        } elseif ($_SESSION["contador"] == 3) {
            $info .= " Llevas tres intentos. Me preocupas.";
        } elseif ($_SESSION["contador"] > 3) {
            $info .= " Has fracasado en toda regla.";
        }
    }
}



if (!isset($_SESSION["actual"])) {

    $ip = $_SERVER['REMOTE_ADDR']; //Ip del visitante

    //Guardamos la ip en una variable de sesión 
    $_SESSION["ip"] = $ip;

    //Cargamos el array con las ips en memoria
    $ips = file("sesiones_abiertas.txt", FILE_IGNORE_NEW_LINES);

    //Añadimos la ip actual al array solo si no existe ya
    //Comprobamos si ya existe en nuestro fichero
    //Puede haber entrado con la misma ip pero dos navegadores diferentes

    $posicion = busquedaSecuencialLista($ips, $ip);

    if ($posicion == -1) {
        $ips[] = $ip;
        //Reescribimos el fichero
        arrayToFileUni($ips, "sesiones_abiertas.txt");
    }



    //Iniciamos la variable de sesión actual
    $_SESSION["actual"] = "index";
}

//En cada recarga recuperamos los datos de ips del archivo por si se hubiera actualizado
$ips = file("sesiones_abiertas.txt", FILE_IGNORE_NEW_LINES);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JUEGO</title>
</head>

<body>

    <h1>AVERIGUA UN VALOR ENTRE 1 Y 100</h1>

    <form action="" method="post">
        <input type="number" name="numero" min="1" max="100">
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <p>
        <?php if (isset($info)) {
            echo $info;
        } ?>
        </h1>

        <!--Vamos a mostrar una tabla con las 10 mejores puntuaciones -->
        <h3>Mejores puntuaciones</h3>
        <table border="1">
            <tr>
                <td>Nombre</td>
                <td>Fecha</td>
                <td>Puntuación</td>
            </tr>
            <?php
                foreach($puntuaciones as $puntuacion){
                    echo "<tr>";
                    foreach($puntuacion as $clave => $valor){
                        echo "<td>$valor</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>

        <!--Vamos a mostrar las ips conectadas consultándolas en el fichero-->
        <h3>IPs conectadas ahora</h3>
        <table border="1">
            <?php
            for ($i = 0; $i < count($ips); $i++) {
                echo "<tr><td>" . $ips[$i] . "</td></tr>";
            }
            ?>
        </table>

        <a href="cerrar_sesion.php"><h4>CERRAR SESIÓN</h4></a>

</body>

</html>
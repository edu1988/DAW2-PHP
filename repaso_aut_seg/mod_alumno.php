<?php
session_start();

if ($_SESSION["usuario"]["rol"] !== "tutor") {
    header("Location:index.php");
}

//Cargamos el fichero en memoria
include "../funciones/ficheros.php";
$usuarios = array();
fileToArray("datos.txt", "~", $usuarios);

//Buscamos el alumno escogido en el fichero a partir de su email
$email = $_SESSION["alumno"];

include "../funciones/funciones_busqueda.php";
$fila = busquedaSecuencial($usuarios, "email", $email);

//A partir de ahora nuestro alumno será $usuarios[$fila]

//Extraemos las notas de sus evaluaciones, que colocaremos en los values de los inputs
$nota1=$usuarios[$fila]["1ev"];
$nota2=$usuarios[$fila]["2ev"];
$nota3=$usuarios[$fila]["3ev"];

//Si damos al boton para modificar las notas
if (isset($_POST["modificar"])) {
    //Las extraemos
    $nota1 = $_POST["ev1"];
    $nota2 = $_POST["ev2"];
    $nota3 = $_POST["ev3"];

    //Modificamos el registro del alumno
    $usuarios[$fila]["1ev"]=$nota1;
    $usuarios[$fila]["2ev"]=$nota2;
    $usuarios[$fila]["3ev"]=$nota3;

    //Reescribimos el fichero
    arrayToFile($usuarios,"datos.txt","~");
    echo "¡Alumno modificado!";
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        input[type="number"] {
            width: 30px;
        }
    </style>
</head>

<body>
    <h1>MODIFICAR ALUMNO <?php echo $usuarios[$fila]["email"]; ?></h1>
    <form action="" method="post">

        <label for="ev1">1ª EV</label>
        <input type="number" min="0" max="10" name="ev1" value="<?php echo $nota1; ?>">

        <label for="ev2">2ª EV</label>
        <input type="number" min="0" max="10" name="ev2" value="<?php echo $nota2; ?>">

        <label for="ev3">3ª EV</label>
        <input type="number" min="0" max="10" name="ev3" value="<?php echo $nota3; ?>">
        <br><br>
        <input type="submit" name="modificar" value="Modificar" />
    </form>
    <br>
    <a href="modificar.php">VOLVER</a>
</body>

</html>
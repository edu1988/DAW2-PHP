<?php
session_start();

if ($_SESSION["usuario"]["rol"] !== "tutor") {
    header("Location:index.php");
}

//Cargamos el fichero en memoria
include "../funciones/ficheros.php";
$usuarios = array();
fileToArray("datos.txt", "~", $usuarios);


//Construimos un select > option con todos los alumnos
$opciones = "";
foreach ($usuarios as $usuario) {
    if ($usuario["rol"] == "alumno") {
        $opciones .= "<option value='" . $usuario["email"] . "'>" . $usuario["email"] . "</option>";
    }
}

//Si enviamos el formulario, nos vamos otra página y nos llevamos en una
//Variable de sesión la información sobre el alumno seleccionado
if(isset($_POST["elegir_alumno"])){
    $_SESSION["alumno"]=$_POST["alumnos"];
    header("Location:mod_alumno.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--link rel="stylesheet" href="estilos.css" /-->
    <title>Document</title>
    <style>

    </style>
</head>

<body>
    <h1>MODIFICAR LAS NOTAS DE UN ALUMNO</h1>
    <form action="" method="post">
        <select name="alumnos" id="alumnos">
            <?php echo $opciones; ?>
        </select>
        <input type="submit" name="elegir_alumno" value="Elegir" />
    </form>


</body>

</html>
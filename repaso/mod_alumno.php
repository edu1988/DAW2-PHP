<?php
session_start();

//Cargamos el fichero en memoria
include "../funciones/ficheros.php";
$usuarios = array();
fileToArray("datos.txt", "~", $usuarios);

if ($_SESSION["usuario"]["rol"] == "tutor") {

    //Buscamos el alumno escogido en el fichero a partir de su email
    $email = $_SESSION["alumno"];
    include "../funciones/funciones_busqueda.php";
    $fila=busquedaSecuencial($usuarios,"email",$email);

    //Recuperamos todos los datos del alumno
    $alumno=$usuarios[$fila];

    //Extraemos las notas de sus evaluaciones
    $notas["1ev"]=explode(",",$alumno["1ev"]);
    $notas["2ev"]=explode(",",$alumno["2ev"]);
    $notas["3ev"]=explode(",",$alumno["3ev"]);

    if(isset($_POST["modificar"])){

        $nota = $_POST["1ev2"];
        echo $nota;


    }

    //Construimos un formulario con inputs
    $formulario="";
    foreach($notas as $clave => $valor){
        $formulario.=$clave . " ";
        for($i=0; $i<count($valor); $i++){
            $name=$clave.$i;
            $value=$valor[$i];
            $formulario.="<input type='number' name='$name' value='$value'/>";
        }
        $formulario.="<br>";
    }





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
        input[type="number"]{
            width:30px;
        }
    </style>
</head>

<body>
    <h1>MODIFICAR ALUMNO <?php echo $alumno["email"]; ?></h1>
    <form action="" method="post">
        <?php
            echo $formulario;
        ?>
        <br>
        <input type="submit" name="modificar" value="Modificar"/>
    </form>
</body>

</html>
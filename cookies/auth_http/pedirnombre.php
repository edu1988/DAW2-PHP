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
        include "funciones.php";

        if(isset($_POST["enviar"])){
            $infoCookie=$_POST["nombre"]."-".fechaHoraActual()."-index-1";
            setcookie("infor",$infoCookie,time()+60*60*24*60);
            header("Location:index.php");
        }

    ?>

    <form action="" method="post">
        <h1>DÍGANOS SU NOMBRE</h1><br>
        <input type="text" name="nombre" id="nombre"/><br><br>
        <input type="submit" name="enviar" value="Enviar"/>
    </form>
    
</body>
</html>
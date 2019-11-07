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
        session_start();

        if(isset($_POST["enviar"])){
            $_SESSION["nombre"]=$_POST["nombre"];
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
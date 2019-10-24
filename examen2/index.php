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

        if(isset($_POST["enviar"])){

            //Recogemos las variables
            foreach($_POST as $clave => $valor){
                $$clave=$valor;
            }

            if($usuario=="abc" && $password=="123"){
                header("Location: altas.php");
            }

        }


    ?>

    <form method="post" action="">
        Usuario: <input type="text" name="usuario"/>
        <br>
        Password: <input type="text" name="password"/>
        <br>
        <input type="submit" name="enviar" value="Enviar"/>
    </form>
    
</body>
</html>
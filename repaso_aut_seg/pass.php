<?php

    session_start();

    //Comprobamos que el usuario haya pasado por el login
    if(isset($_SESSION["usuario"])){
        //Extraemos el usuario
        $usuario = $_SESSION["usuario"];

        //Extraemos su contraseña y su rol
        $password = $usuario["password"];
        $rol = $usuario["rol"];

        //Número de intentos
        $intentos=0;

        //Validamos la contraseña
        if(isset($_POST["pass"])){
            $pass=$_POST["pass"];

            if($pass==$password){
                //Si las credenciales son correctas, le redirigimos en función de su rol
                if($rol=="alumno"){
                    header("Location:alumno.php");
                }
                if($rol=="profesor"){
                    header("Location:profesor.php");
                }

            }else{
                $intentos++;
            }

            if($intentos==3){
                echo "Has superado el numero máximo de intentos";
            }
        }
    }else{
        echo "No tienes acceso a esta página";
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

    <?php if(isset($_SESSION["usuario"])): ?>
    <form action="" method="post">
        <label for="email">Introduzca password:&nbsp;</label>
        <input type="password" name="pass" required/>
        <input type="submit" name="enviar" value="Enviar"/>
    </form>
    <?php endif; ?>

</body>
</html>
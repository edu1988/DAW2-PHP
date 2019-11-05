
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" required/>
        <br>
        <label for="pass">Contraseña</label>
        <input type="text" name="pass" id="pass" required>
        <br>
        <input type="submit" name="enviar" value="Entrar"/>
    </form>

    <?php
        session_start();

        if(!isset($_COOKIE["info"])){

            header("Location:alta.php");
            exit();

        }else{

            if(isset($_POST["enviar"])){

                //Extraemos la información de la cookie y contrastamos

                $info=$_COOKIE["info"];
                $usuario=explode("-",$info)[0];
                $password=explode("-",$info)[1];

                if($usuario==$_POST["usuario"] && $password==$_POST["pass"]){
                    //Si las credenciales son correctas
                    //Guardamos la información de sesión
                    $_SESSION["usuario"]=$usuario;
                    $_SESSION["password"]=$password;

                    //Nos vamos
                    header("Location:aplicacion.php");
                }else{

                    echo "Usuario o contraseña incorrectos";

                }

            }
            
    }

?>
    
</body>
</html>
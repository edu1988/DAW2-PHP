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
        //Iniciamos registro de sesion
        session_start();

        //Creamos la variable de sesión $_SESSION["intentos"] la primera vez que se ingresa
        if(!isset($_SESSION["intentos"])){
            $_SESSION["intentos"]=0;
        }

        if(isset($_POST["enviar"])){
            //Recogemos las variables
            foreach($_POST as $clave => $valor){
                $$clave=$valor;
            }

            if($usuario=="admin" && $pass=="1234"){
                echo "¡Log-in correcto!";
                echo "<meta http-equiv='refresh' content='5; url=http://www.meteohacinas.es'>";
                exit;
            }else{
                $_SESSION["intentos"]++;

                $intentosRestantes=3-$_SESSION["intentos"];

                if($intentosRestantes>0){
                    echo "Le quedan " . $intentosRestantes . " intentos.";
                }
               
                if($intentosRestantes==0){
                    echo "Lo siento pringao. Te vas a google en 5 segundos";
                    echo "<meta http-equiv='refresh' content='5; url=http://www.google.es'>";
                    exit;
                }
            }
        }

    ?>
    <form method="post" action="">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario"/><br>
        <label for="pass">Contraseña:</label>
        <input type="text" name="pass" id="pass"/><br>
        <input type="submit" name="enviar" value="Enviar"/>
    </form>
</body>
</html>
<?php
    session_start();

    include "datos.php";
    include "../funciones/ficheros.php";

    //Cargamos el array en memoria desde el fichero
    $usuarios=[];
    fileToArray("datos.txt","~",$usuarios);

    //Comprobamos si el mail introducido existe
    if(isset($_POST["enviar"])){
        $email = $_POST["email"];

        //Recorremos el array
        $i=0;
        $dato_email = $usuarios[$i]["email"];
        
        while($dato_email != $email && $i<count($usuarios)){
            
            $dato_email=$usuarios[$i]["email"];
            if($dato_email != $email){
                $i++;
            }
            
        }

        //Si lo encontramos
        if($i<count($usuarios)){
            $usuario=$usuarios[$i];
            $_SESSION["usuario"]=$usuario; //Guardamos el usuario en una variable de sesión
            header("Location:pass.php");
        }else{
            echo "Ese email no existe";
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
</head>
<body>

    <form action="" method="post">
        <label for="email">Introduzca email:&nbsp;</label>
        <input type="email" name="email" required/>
        <input type="submit" name="enviar" value="Enviar"/>
    </form>
    
</body>
</html>
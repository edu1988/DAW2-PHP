<?php
    session_start();

    include "datos.php";
    include "../funciones/ficheros.php";
    include "../funciones/funciones_busqueda.php";

    /*
    //Generamos el fichero txt
    arrayToFile($usuarios,"datos.txt","~");
    */

    //Variables de sesión para almacenar información
    if(!isset($_SESSION["actual"])){
        $_SESSION["email"]="";
        $_SESSION["mostrar_pass"]=false;
        $_SESSION["actual"]="index";
        $_SESSION["intentos"]=0; //Intentos de inicio de sesión
    }


    //Variables para mostrar informacion en los placeholder
    $infoEmail = "Introduzca email";
    $infoPassword = "Password";

    //Cargamos el array en memoria desde el fichero
    //arrayToFile($usuarios,"datos.txt","~");
    $usuarios=[];
    fileToArray("datos.txt","~",$usuarios);

    //Acción al enviar el formulario
    if(isset($_POST["enviar"])){

        /*Tarea 1: buscar el email en el archivo. Solo la realizaremos
        una vez*/
        if($_SESSION["email"]==""){
            $email=$_POST["email"];
            
            $fila=busquedaSecuencial($usuarios,"email",$email);

            

            if($fila !== -1){
                //En caso de que el email sí exista
                //Guardamos todo el usuario en una variable de sesión
                $_SESSION["usuario"]=$usuarios[$fila];
                $_SESSION["email"]=$email;
                //Mostramos el campo del password
                $_SESSION["mostrar_pass"]=true;

                //Guardamos la fila en la que se encuentra en una variable de sesión para futuros usos
                $_SESSION["fila"]=$fila;
            }else{
                //Mostramos que el email no existe
                $infoEmail="Ese email no existe";
            }

        }else{
            //Recargas de la página con un email correcto ya introducido
            //Validación de la contraseña
            $pass_usuario=$_SESSION["usuario"]["password"];
            $pass_introducido=$_POST["pass"];
            

            if($pass_introducido==$pass_usuario){
                //Comprobamos el rol del usuario
                $rol=$_SESSION["usuario"]["rol"];
                if($rol=="alumno"){
                    //Nos vamos, nos llevamos todos los datos en la variable de sesión USUARIO
                    header("Location:alumno.php");
                }else if($rol=="profesor"){
                    //Nos vamos, nos llevamos todos los datos en la variable de sesión USUARIO
                    header("Location:profesor.php");
                }else if($rol=="tutor"){
                    //Nos vamos
                    header("Location:tutor.php");
                }
            }else{
                $_SESSION["intentos"]++;
                $infoPassword=$_SESSION["intentos"]." intentos de 3";
                if($_SESSION["intentos"]>2){
                    //Preparamos una contraseña aleatoria
                    include "../funciones/aleatorizacion.php";
                    $claveAleatoria = generarClaveAleatoria();

                    //Actualizamos el array y la clave en el fichero para ese usuario
                    $usuarios[$_SESSION["fila"]]["password"]=$claveAleatoria;
                    arrayToFile($usuarios,"datos.txt","~");

                    //Enviamos un correo con la contraseña al usuario
                    mail($_SESSION["email"],'Contraseña nueva',$claveAleatoria);


                    //Cerramos sesión y refrescamos la página en 5 segundos, tras mostrar un mensaje
                    session_destroy();
                    $enviado="Ha agotado sus intentos. Se le enviará un correo con una contraseña nueva";
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='5;URL=http://www.edudaw.com/clase_php/index.php'>";
                    
                    
                }
            }
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css"/>
    <title>Document</title>

</head>
<body>

    <form action="" method="post" class="box">

        <h1>Login</h1>
        <input type="email" name="email" placeholder="<?php 
                echo $infoEmail; ?>" 
                value="<?php echo $_SESSION["email"]; ?>" 
                required
                <?php if($_SESSION["mostrar_pass"]){echo "disabled";}?>/>
        <?php if($_SESSION["mostrar_pass"]): ?>
        <input type="password" name="pass" placeholder="<?php
                    echo $infoPassword;
                ?>" required/>
        <?php endif;?>
        <input type="submit" name="enviar" value="Enviar"/>
        <p style="color:white">
            <?php
                if(isset($enviado)){
                    echo $enviado;
                }
            ?>
        </p>

    </form>
    
</body>
</html>
<?php
    session_start();

    //FUNCIÓN MICAPTCHA
    //RETORNA UN CODIGO HTML CON CARACTERES ETIQUETADOS CON SPAN y la palabra orignal
    function micaptcha(){
        $colores=["red","green","blue"];
        $tamaños=["8px","12px","16px"];
        $fuentes=["arial","verdana","times new roman"];
        $html="";
        $palabra="";
        for($i=0; $i<=6; $i++){
            $numAle=[rand(0,2),rand(0,2),rand(0,2)];
            $letraAle=chr(rand(65,90));
            $palabra.=$letraAle;
            $estilosAle="style='color:".$colores[$numAle[0]]."; font-family:".$fuentes[$numAle[1]]."; font-size:".$tamaños[$numAle[2]]."'";
            $html.="<span ".$estilosAle.">".$letraAle."</span>";
        }
        return [$palabra,$html];
    }

    //Generamos un captcha y la cadena original sin formatear la vamos guardando
    //en una variable de sesión con forma de array, para que cada vez que se 
    //actualice la página, podamos recuperar el valor del captcha que introdujimos
    //en el input en primera instancia, que será el de la posición penúltima del
    //array. (El de la última posición es el nuevo que se genera al actualizar).
    $captcha = micaptcha();
    if(!isset($_SESSION["captcha"])){
        $_SESSION["captcha"]=array();
        $_SESSION["captcha"][]=$captcha[0];
    }else{
        $_SESSION["captcha"][]=$captcha[0];
    }
    

    include "datos.php";
    include "../funciones/ficheros.php";
    include "../funciones/funciones_busqueda.php";

    if(!file_exists("datos.txt")){
        //Vamos a modificar el fichero para encriptar las contraseñas
        //Recorremos el array $usuario y encriptamos las contraseñas
        for($i=0; $i<count($usuarios); $i++){
            $usuarios[$i]["password"]=md5($usuarios[$i]["password"]);
        }
        //Generamos el archivo
        arrayToFile($usuarios,"datos.txt","~");
    }


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

                //La variable de sesion "email" cambia, de manera que este if ya no volverá
                //a ejecutarse
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
            
            //Para comprar contraseñas también hay que codificar lo que el usuario introduzca
            //Vemos cuál fue el captcha introducido en la última recarga
            $captchaInt=$_SESSION["captcha"][count($_SESSION["captcha"])-2];
            echo $captchaInt." ".$_POST["captcha"];
            if(md5($pass_introducido)==$pass_usuario && $captchaInt===$_POST["captcha"]){
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
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='5;URL=http://localhost/index.php'>";
                    
                    
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
        <p>Rellena el captcha antes de enviar</p>
        <div style="display:inline-block; border:1px solid grey; padding:5px"><?php echo $captcha[1]; ?></div>
        <input type="text" name="captcha"><br><br>
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
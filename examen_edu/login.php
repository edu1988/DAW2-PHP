<?php
    session_start();

    //Cargamos en un array los datos del fichero ctacliente.txt
    $clientes=[];
    include "funciones_ficheros.php";
    fileToArray("CtaCliente.txt","~",$clientes);

    //Acción a realizar cuando enviamos el formulario
    if(isset($_POST["enviar"])){
		
        //Recogemos las variables
        $dni = $_POST["dni"];
        $pass = $_POST["pass"];
		
        //Antes de comprobar si es un usuario que existe en el fichero
        //Vamos a comprobar si el que accede es el administrador
        if($dni=="admin" && $pass=="password"){
            //Variable de sesión para identificarle
            $_SESSION["admin"]="admin";
            //Nos vamos
            header("Location:backend.php");
			
        }
            

        //Comprobamos si el DNI existe
        include "funciones_busqueda.php";
        $fila=busquedaSecuencial($clientes,"dni",$dni);

        //Si SÍ que existe
        if($fila != -1){
            //Comprobamos si introdujo bien la contraseña
            $cliente = $clientes[$fila];
            $pass_cliente = $cliente["contra"];

            //Contraseña correcta
            if($pass_cliente==$pass){
                //Guardamos en una variable de sesión EL CLIENTE ENTERO
                /*Único lugar donde se inicializa la variable de sesión
                con ese nombre (cliente) */
                $_SESSION["cliente"]=$cliente;

                //Nos vamos
                header("Location:menucliente.php");
            }else{
                //Caso de que la contraseña introducida sea incorrecta
                //Le mandamos a otra página donde le damos la bienvenida
                //Y le proponemos volver a la entrada
                //Recogemos el nombre del cliente en una variable de sesion
                $_SESSION["nombre"]=$cliente["nombre"];
                header("Location:errorpass.php");
            }


        //Si NO existe
        }else{

            //Le enviamos a otra página donde proponemos que se registre
            //Añadiendo los dos campos que le faltan en el proceso
            //Nombre y saldo (0€)
            //(Guardamos los datos ya introducidos en variables de sesión)
            $_SESSION["dni"]=$dni;
            $_SESSION["pass"]=$pass;

            //Nos vamos
            header("Location:registro.php");


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
    <h1>LOGIN</h1>
    <form action="" method="post">
        DNI:<input type="text" name="dni" id="dni">
        CONTRASEÑA:<input type="text" name="pass" id="pass">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    
</body>
</html>
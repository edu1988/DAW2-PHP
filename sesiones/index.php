<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background: #B6E7ED;
        }

        h1 {
            text-align: center;
        }

        table {
            background-color: #B6E7FD;
            padding: 15px;
            border: #666 5px solid;
            align: center;
            width: 15%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>INICIAR SESIÓN</h1>
    <?php
    //Iniciamos una sesion
    session_start();

    //Includes de las funciones
    include "../funciones/funciones_ordenacion.php";
    include "../funciones/funciones_busqueda.php";
    include "../funciones/ficheros.php";

    if (!file_exists("clientes.txt")) {
        //SI NO EXISTE EL FICHERO CLIENTES.TXT, LO GENERAMOS YA ORDENADO
        include "arrayclientes.php";
        //Ordenamos el array
        ordenarTabla($clientes, "dni");
        //Generamos el fichero
        arrayToFile($clientes, "clientes.txt", "~");
    } else {
        //Si sí que existe el fichero, cargamos el array $clientes en memoria
        $clientes = [];
        fileToArray("clientes.txt", "~", $clientes);
    }

    $codigoError=""; //Variable para guardar un código de error

    if (isset($_POST["enviar"])) {

        //Extraemos las variables
        $dni = $_POST["dni"];
        $pass = $_POST["pass"];

        //Credenciales del administrador
        if ($dni == "admin" && $pass == "1234") {
            $_SESSION["user"] = "admin";
            $_SESSION["pass"] = "1234";
            header("Location: backend.php");
            exit;
        }

        //Credenciales de los usuarios
        //En el caso de que no sea administrador, miramos si está en la "base de datos"
        //Trabajamos con el array $clientes que ya tenemos cargado en memoria
        //Buscamos si el dni insertado existe
        
        $resultado = busquedaBinariaTabla($clientes, "dni", $dni);

        //Sí la función nos devuelve un entero, es que sí que existe
        if (is_int($resultado)) {
            //Comprobamos si en esa fila del array, el password coincide con el insertado
            $passReal = $clientes[$resultado]["pass"]; //password del cliente
            if ($pass == $passReal) {
                //Guardamos las variables de sesion
                //Guardamos el usuario entero
                $_SESSION["usuario"] = $clientes[$resultado];

                //NOS VAMOS A FRONTEND.PHP
                header("Location: frontend.php");
                exit;

            } else { //contraseña incorrecta
                $codigoError=1; //contraseña incorrecta
            }
        } else { //Si la función no nos retorna un entero, el dni no existe
           $codigoError=2; //usuario no existe en la base de datos
        }
    }
    ?>

    <!--ACORDARSE DE IMPLEMENTAR LA PERSISTENCIA DE DATOS CORRECTOS-->
    <form action="" method="post" name="datos_usuario" id="datos_usuario">
        <table>
            <tr>
                <td><label for="dni">DNI:</label></td>
                <td>
                    <input type="text" name="dni" id="dni" value="<?php if (isset($dni)) {
                                                                        echo $dni;
                                                                    } else {
                                                                        echo "Inserte dni";
                                                                    } ?>">
                </td>
            </tr>
            <tr>
                <td><label for="pass">Contraseña:</label></td>
                <td>
                    <input type="password" name="pass" id="pass">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="enviar" id="enviar" value="Enviar">
                </td>
            </tr>
            <tr>
                <td colspan="2" id="mensajes">
                <td>
            </tr>
        </table>
    </form>
    <h1>
        <?php if($codigoError==""){
                    echo "";
              }else if($codigoError==1){
                    echo "CONTRASEÑA INCORRECTA";
              }else if($codigoError==2){
                    echo "USUARIO NO EXISTE";
              }
        ?>
    </h1>
</body>

</html>
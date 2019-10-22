<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    * {
        text-align: center;
    }

    body {
        background: #B6E7ED;
    }

    h1 {
        text-align: center;
        margin-top: 20px;
    }

    table {
        background-color: #B6E7FD;
        padding: 15px;
        border: #666 5px solid;
        align: center;
        width: auto;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
    }


    .error {
        background-color: orange;
        border: 2px solid red;
    }
</style>

<body>

    <?php

    session_start();

    $usuario=""; $passw="";

    //Recuperamos las variables de sesion
    if (isset($_SESSION["user"]) && isset($_SESSION["pass"])) {

        $usuario = $_SESSION["user"];
        $passw = $_SESSION["pass"];

        if ($usuario == "admin" && $passw == "1234") {
            echo "<h1>ALTAS</h1>";

            //Mostramos todo el contenido de la página

            //INCLUDES NECESARIOS

            include "../funciones/mostrar_arrays.php";
            include "../funciones/funciones_ordenacion.php";
            include "../funciones/insertar_eliminar.php";
            include "../funciones/funciones_validacion.php";
            include "../funciones/ficheros.php";

            //Recuperamos el array de clientes del fichero
            $clientes = [];
            fileToArray("clientes.txt", "~", $clientes);

            //Inicializamos variables necesarias para su uso posterior
            $claseNombre = "";
            $claseDni = "";
            $claseFecha = "";
            $claseSaldo = "";
            $clasePass = "";

            $error = []; //Array para guardar los mensajes de error

            //ACCIÓN PRINCIPAL

            //BOTON ENVIAR PULSADO
            if (isset($_POST["enviar"])) {

                //Array para GENERAR UN ARRAY DE ERRORES Y GENERAR LAS VARIABLES SIMPLES
                foreach ($_POST as $key => $dato) {
                    $error[$key] = "";
                    $$key = $dato;
                    if (!isset($$key)) { //Si alguna variable no se inicializa la convertimos a cadena vacía
                        $$key = "";
                    }
                }

                //Comenzamos con las validaciones
                //VALIDAR DNI
                if ($dni == "") {
                    $error["dni"] = "Debes introducir un dni. ";
                    $claseDni = "error";
                } else {
                    if (!validarDni($dni)) {
                        $error["dni"] = "Formato incorrecto";
                        $claseDni = "error";
                    } else {
                        //Combrobamos si ya existe
                        $resultado = busquedaBinariaTabla($clientes, "dni", $dni);
                        //Si esta función nos devuelve un entero, es que el elemento YA ESTÁ EN LA TABLA
                        if (is_numeric($resultado)) {
                            //Mostramos el mensaje de error
                            $error["dni"] = "ESE DNI YA EXISTE";
                            $claseDni = "error";
                        }
                    }
                }

                //VALIDAR PASS
                if ($pass == "") {
                    $error["pass"] = "Falta ingresar el password. ";
                    $clasePass = "error";
                }

                //VALIDAR NOMBRE
                if ($nombre == "") {
                    $error["nombre"] = "Falta ingresar el nombre. ";
                    $claseNombre = "error";
                } else {
                    if (count(explode(" ", $nombre)) < 2) {
                        $error["nombre"] .= "Debes escribir nombre y apellido. ";
                        $claseNombre = "error";
                    }
                    if (substr($nombre, 0, 1) != strtoupper(substr($nombre, 0, 1))) {
                        $error["nombre"] .= "La primera letra debe ser mayúscula. ";
                        $claseNombre = "error";
                    }
                }

                //VALIDAR FECHA
                if ($fecha == "") {
                    $error["fecha"] = "Falta ingresar la fecha";
                    $claseFecha = "error";
                }

                //VALIDAR SALDO (DEBE SER NÚMERICO)
                if ($saldo == "") {
                    $error["saldo"] = "Falta ingresar el saldo";
                    $claseSaldo = "error";
                } else {
                    if (!is_numeric($saldo)) {
                        $error["saldo"] = "El saldo debe ser numerico";
                        $claseSaldo = "error";
                    }
                }

                //Si todo está bien hasta aquí, empezamos a procesar datos
                //INSERTAMOS EL CLIENTE
                if (
                    $claseNombre == "" && $claseDni == "" && $claseFecha == ""
                    && $claseSaldo == "" && $clasePass == ""
                ) {

                    //Construimos el string con los idiomas especificados
                    if (isset($idiomas)) {
                        $cadenaIdiomas = "";
                        for ($i = 0; $i < count($idiomas); $i++) {
                            $cadenaIdiomas .= $idiomas[$i] . ",";
                        }
                        $cadenaIdiomas = substr($cadenaIdiomas, 0, strlen($cadenaIdiomas) - 1); //Quitamos la coma final
                    } else {
                        $cadenaIdiomas = "";
                    }

                    //Creamos el cliente

                    $cliente = array(
                        "dni" => $dni, "pass" => $pass, "nombre" => $nombre, "fecha" => $fecha,
                        "ciudad" => $ciudad, "saldo" => $saldo, "idiomas" => $cadenaIdiomas
                    );

                    //Insertamos el cliente en la posición que le corresponde
                    insertarOrdenado($cliente, "dni", $clientes);
                    $insertado=true; //Variable de control para saber cuando se inserta
                    //Regeneramos el fichero txt
                    arrayToFile($clientes, "clientes.txt", "~");
                } //Fin del if (todo correcto para insertar cliente)

            } //Fin del if (boton enviar pulsado)

            //Mostramos el formulario con php


        }
    } else { //Si no existen las variables de sesión es que no hemos hecho el login
        echo "<h1>NO TIENE ACCESO A ESTA PÁGINA</h1>";
    }

    //Funcionalidad del botón para cerrar sesión y volver al index
    if (isset($_POST["cerrar"])) {
        session_unset();
        header("Location: index.php");
    }

    ?>

    <?php if ($usuario == "admin" && $passw == "1234") : ?>

        <form method="post" action="">
            <table>
                <tr class="<?php echo $claseDni; ?>">
                    <td><label for="dni">DNI&nbsp;&nbsp;</label></td>
                    <td><input type="text" name="dni" id="dni" <?php if (isset($dni)) {
                                                                        if ($claseDni == "") {
                                                                            echo "value='$dni'";
                                                                        }
                                                                    } else {
                                                                        echo " ";
                                                                    } ?>"/></td>
                    <td><?php if (isset($error["dni"])) {
                                echo $error["dni"];
                            } ?></td>
                </tr>

                <tr class="<?php echo $clasePass; ?>">
                    <td><label for="pass">Password&nbsp;&nbsp;</label></td>
                    <td><input type="password" name="pass" id="pass" <?php if (isset($pass)) {
                                                                                if ($clasePass == "") {
                                                                                    echo "value='$pass'";
                                                                                }
                                                                            } ?>><br></td>
                    <td><?php if (isset($error["pass"])) {
                                echo $error["pass"];
                            } ?></td>
                </tr>

                <tr class="<?php echo $claseNombre; ?>">
                    <td><label for="nombre">Nombre&nbsp;&nbsp;</label></td>
                    <td><input type="text" name="nombre" id="nombre" <?php if (isset($nombre)) {
                                                                                if ($error["nombre"] == "") {
                                                                                    echo "value='$nombre'";
                                                                                }
                                                                            } ?> /></td>
                    <td><?php if (isset($error["nombre"])) {
                                echo $error["nombre"];
                            }; ?></td>
                </tr>

                <tr class="<?php echo $claseFecha; ?>">
                    <td><label for="fecha">Fecha&nbsp;&nbsp;</label></td>
                    <td><input type="date" name="fecha" id="fecha" value="<?php if (isset($fecha)) {
                                                                                    echo $fecha;
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>" /></td>
                    <td><?php if (isset($error["fecha"])) {
                                echo $error["fecha"];
                            } ?></td>
                </tr>
                <tr>
                    <td><label for="ciudad">Ciudad&nbsp;&nbsp;</label></td>
                    <td>
                        <select name="ciudad" id="ciudad">
                            <option value="Burgos">Burgos</option>
                            <option value="Ávila">Ávila</option>
                            <option value="Palencia">Palencia</option>
                            <option value="Leon">León</option>
                            <option value="Zamora">Zamora</option>
                        </select>
                    </td>
                </tr>
                <tr class="<?php echo $claseSaldo; ?>">
                    <td><label for="saldo">Saldo&nbsp;&nbsp;</label></td>
                    <td><input type="text" name="saldo" id="saldo" value="<?php if (isset($fecha)) {
                                                                                    echo $saldo;
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>" /><br></td>
                    <td><?php if (isset($error["saldo"])) {
                                echo $error["saldo"];
                            } ?></td>
                </tr>
                <tr>
                    <td><label for="idioma">Idiomas</label></td>
                    <td>
                        <select name="idiomas[]" id="idiomas" size="5" multiple>
                            <option value="español">Español</option>
                            <option value="inglés">Inglés</option>
                            <option value="francés">Francés</option>
                            <option value="alemán">Alemán</option>
                            <option value="danés">Danés</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center" colspan="2">
                        <input type="submit" name="enviar" value="AÑADIR CLIENTE" />
                    </td>
                </tr>
            </table>

            <br>
        </form>

        <h1><?php if(isset($insertado)){echo "¡CLIENTE INSERTADO!";} ?></h1>

        <form method='post' action=''>
            <input type='submit' name='cerrar' value='Cerrar sesion' />
        </form>

        <a href='backend.php'><h3>VOLVER</h3></a>

    <?php endif; ?>

</body>

</html>
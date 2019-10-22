<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            text-align: center;
        }

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
            width: auto;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            margin-bottom:40px;
        }
    </style>
</head>

<body>
    <?php

    session_start();

    //Recuperamos las variables de sesion
    if (isset($_SESSION["usuario"])) {

        $usuario = $_SESSION["usuario"];
        $nombreUsuario = $usuario["nombre"];

        echo "<h1>BIENVENIDO $nombreUsuario</h1>
              <form action='' method='post'>
              <table>
                <tr>
                    <td>
                        <h3>Elija la opción que desea</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type='submit' name='saldo' value='Ver mi saldo' />
                        <input type='submit' name='saldom' value='Saldo medio de mi localidad' />
                    </td>
                </tr>
               </table>
              </form>";

        echo "<form method='post' action=''>
              <input type='submit' name='cerrar' value='Cerrar sesion'/>
            </form>";
    } else {
        echo "<h1>NO TIENE ACCESO A ESTA PÁGINA</h1>";
    }

    if (isset($_POST["saldo"])) {
        //NOS VAMOS A SALDO.PHP
        header("Location: saldo.php");
    }

    if (isset($_POST["saldom"])) {
        header("Location: saldom.php");
    }


    if (isset($_POST["cerrar"])) {
        session_unset();
        header("Location: index.php");
    }

    ?>






</body>

</html>
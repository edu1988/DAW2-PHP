<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        	body{
				background:#B6E7ED;
			}
			
			h1{
				text-align:center;
			}

			table{
				background-color:#B6E7FD;
				padding:15px;
				border:#666 5px solid;
                align:center;
                width:15%;
                margin-left:auto;
                margin-right:auto;
                margin-top:10px;
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
        
        if(!file_exists("clientes.txt")){
            //SI NO EXISTE EL FICHERO CLIENTES.TXT, LO GENERAMOS YA ORDENADO
            include "arrayclientes.php";
            //Ordenamos el array
            ordenarTabla($clientes,"dni");
            //Generamos el fichero
            arrayToFile($clientes,"clientes.txt","~");
        }else{
            //Si sí que existe el fichero, cargamos el array $clientes en memoria
            $clientes=[];
            fileToArray("clientes.txt","~",$clientes);
        }

        

        if(isset($_POST["enviar"])){

            //Extraemos las variables
            $dni = $_POST["dni"];
            $pass = $_POST["pass"];

            if($dni=="admin" && $pass=="1234"){
                $_SESSION["user"] = "admin";
                $_SESSION["pass"] = "1234";
                header("Location: backend.php");
                exit;
            }




        }
    ?>

    <!--ACORDARSE DE IMPLEMENTAR LA PERSISTENCIA DE DATOS CORRECTOS-->
    <form action="" method="post" name="datos_usuario" id="datos_usuario">
        <table>
            <tr>
                <td><label for="dni">DNI:</label></td>
                <td>
                    <input type="text" name="dni" id="dni" value="<?php if(isset($dni)){echo $dni;}else{echo "Inserte dni";}?>">
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
                <td colspan="2" id="mensajes"><td>
            </tr>
        </table>
	</form>
</body>
</html>
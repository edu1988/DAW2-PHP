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
                margin-top:100px;
			}
    </style>
</head>
<body>
    <?php
        //Si se pulsa el botón enviar
        if(isset($_POST["enviar"])){

            //Recuperamos las variables de los inputs
            $usuario=$_POST["usuario"];
            $pass=$_POST["pass"];

            if($usuario=="abc" && $pass=="123"){
                //Nos vamos a opciones.php
                header("Location: opciones.php");
                exit;
            }

        }

    ?>
    <form action="" method="post" name="datos_usuario" id="datos_usuario">
        <table>
            <tr>
                <td><label for="usuario">Usuario:</label></td>
                <td>
                    <input type="text" name="usuario" id="usuario">
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
</body>
</html>
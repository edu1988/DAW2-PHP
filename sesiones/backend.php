<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            text-align:center;
        }
        body{
			background:#B6E7ED;
		}
			
		h1{
			text-align:center;
            margin-top:20px;
		}

		table{
            background-color:#B6E7FD;
            padding:15px;
            border:#666 5px solid;
            align:center;
            width:auto;
            margin-left:auto;
            margin-right:auto;
            margin-top:10px;
            margin-bottom:50px;
            border-collapse:collapse;
		}

        td{
            padding:15px;
        }
    </style>
</head>
<body>

    <?php

        session_start();

        //Recuperamos las variables de sesion
        if(isset($_SESSION["user"]) && isset($_SESSION["pass"])){

            $usuario = $_SESSION["user"];
            $pass = $_SESSION["pass"];

            if($usuario=="admin" && $pass=="1234"){
                echo "<h1>BIENVENIDO ADMINISTRADOR</h1>";
                echo "<table>
                        <tr><td><a href='lista.php'>LISTADO</a></td></tr>
                        <tr><td><a href='altas.php'>ALTAS</a></td></tr>
                        <tr><td><a href='bajas.php'>BAJAS</a></td></tr>
                        <tr><td><a href='informe.php'>INFORME</a></td></tr>
                     </table>";
    
                echo "<form method='post' action=''>
                        <input type='submit' name='cerrar' value='Cerrar sesion'/>
                      </form>";
            }
        }else{
            echo "<h1>NO TIENE ACCESO A ESTA PÁGINA</h1>";
        }
        

        if(isset($_POST["cerrar"])){
            session_unset();
            header("Location: index.php");
        }


    ?>
    

</body>
</html>
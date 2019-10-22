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
            padding:5px;
        }

        tr:first-child{
            background-color: #EEEEEE;
        }
    </style>
</head>
<body>

    <?php
        session_start();

        include "../funciones/mostrar_arrays.php";
        include "../funciones/ficheros.php";

        //Obtenemos el array de clientes a partir del fichero
        $clientes=[];
        fileToArray("clientes.txt","~",$clientes);

        //Recuperamos las variables de sesion
        if(isset($_SESSION["user"]) && isset($_SESSION["pass"])){

            $usuario=$_SESSION["user"];
            $pass=$_SESSION["pass"];

            if($usuario=="admin" && $pass=="1234"){
                echo "<h1>LISTA DE CLIENTES</h1>";

                verTabla($clientes);
    
                echo "<form method='post' action=''>
                        <input type='submit' name='cerrar' value='Cerrar sesion'/>
                      </form>";
            }
        }else{
            echo "<h1>NO TIENE ACCESO A ESTA PÁGINA</h1>";
        }
        
        //Implementamos un botón para cerrar sesión y volver al index
        if(isset($_POST["cerrar"])){
            session_unset();
            header("Location: index.php");
        }
        

        //Lo mostramos
        //verTabla($clientes);
    
    ?>


</body>
</html>
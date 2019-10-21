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
            width:auto;
            margin-left:auto;
            margin-right:auto;
            margin-top:100px;
            border-collapse:collapse;
		}
    </style>
</head>
<body>
    <?php

        if(isset($_GET["admin"]) && isset($_GET["pass"])){

            if($_GET["admin"] == "admin" && $_GET["pass"] == "1234"){
                echo "<table>
                <tr>
                    <td><h1>BIENVENIDO ADMINISTRADOR</h1></td>
                </tr>
                <tr>
                    <td><a href='lista.php'>1. Listado</a></td>
                </tr>
                <tr>
                    <td><a href='altas.php'>2. Altas</a></td>
                </tr>
                <tr>
                    <td><a href='bajas.php'>3. Bajas</a></td>
                </tr>
                <tr>
                    <td><a href='informe.php'>4. Informe</a></td>
                </tr>
                </table>";
            }else{
                echo "<h1>NO TIENE ACCESO A ESTA PÁGINA</h1>";
            }
        }else{
            echo "<h1>NO TIENE ACCESO A ESTA PÁGINA</h1>";
        }
        
    
    ?>
    

</body>
</html>
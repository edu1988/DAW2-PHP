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
		}

     
    </style>
</head>
<body>
    <?php

    ?>


    <h1>BIENVENIDO <?php echo "hola"; ?></h1>
    <form action="" method="post">
        <table>
            <tr>
                <td><h3>Elija la opción que desea</h3></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="saldo" value="Ver mi saldo"/>
                    <input type="submit" name="saldom" value="Saldo medio de mi localidad "/>
                </td>
            </tr>
        </table>
    </form>

    <a href="saldo.php">Saldo de mi cuenta</a>
    <a href="saldomloc.php">Saldo medio de mi localidad</a>
    <a href="logout.php">Cerrar sesión</a>


</body>
</html>
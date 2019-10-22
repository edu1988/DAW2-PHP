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

        td table{
            margin-top:0px;
        }


    </style>
</head>
<body>

    <?php 
        include "../funciones/mostrar_arrays.php";
        include "../funciones/ficheros.php";

        //Obtenemos el array de clientes a partir del fichero
        $clientes=[];
        fileToArray("clientes.txt","~",$clientes);

        //Lo mostramos
        //verTabla($clientes);
    
    ?>

    <table>
        <tr><td><h1>Listado clientes</h1></td></tr>
        <tr><td><?php verTabla($clientes); ?></td></tr>
    </table>

</body>
</html>
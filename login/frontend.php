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
		}
    </style>
</head>
<body>
    <?php
        //includes necesarios
        include "../funciones/ficheros.php";
        include "../funciones/funciones_busqueda.php";
        include "../funciones/funciones_calculos.php";

        //Cargamos el array de clientes en memoria
        $clientes=[];
        fileToArray("clientes.txt","~",$clientes);

        //Obtenemos los datos de sesion (dni) del fichero sesion.txt
        $fichero=fopen("sesion.txt","r");
        $dni=trim(fgets($fichero)); //Eliminamos espacios en blanco por si acaso

        //Obtenemos el nombre que corresponde a nuestro dni
        $indice=busquedaBinariaTabla($clientes,"dni",$dni);
        $nombre=$clientes[$indice]["nombre"];  //Lo mostramos en el html

        //Obtenemos el saldo de su cuenta
        $saldo=$clientes[$indice]["saldo"];

        //Obtenemos el saldo medio de los clientes de su misma localidad
        $saldoMedio=valorMedioColumna($clientes,$indice,"ciudad","saldo");

        

    ?>
    <table>
        <tr>
            <td><h1>BIENVENIDO/A<?php echo " $nombre"?></h1></td>
        </tr>
        <tr>
            <td><?php echo "El saldo de tu cuenta es: " . $saldo . " euros." ?></td>
        </tr>
        <tr>
            <td><?php echo "El saldo medio de tu localidad es: ".$saldoMedio." euros." ?></td>
        </tr>

    </table>

</body>
</html>
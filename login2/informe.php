<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
        	body{
				background:#B6E7ED;
			}
			
			h1{
				text-align:center;
                margin-top:80px;
			}

			h1+table{
				background-color:#B6E7FD;
				padding:15px;
				border:#666 5px solid;
                align:center;
                width:auto;
                margin-left:auto;
                margin-right:auto;
                margin-top:10px;
                border-collapse:collapse;
			}

            form table{
                border-collapse:collapse;
            }

            td{
                margin:5px;
                padding:5px;
            }

    .error{
        background-color: orange;
        border:2px solid red;
    }
</style>
<body>

    <?php
        //INCLUDES NECESARIOS
        
        include "../funciones/mostrar_arrays.php";
        include "../funciones/funciones_ordenacion.php";
        include "../funciones/insertar_eliminar.php";
        include "../funciones/funciones_validacion.php";
        include "../funciones/ficheros.php";

        if(!file_exists("clientes.txt")){
            include "../ejercicio_lista/arrayclientes.php";
            //Ordenamos el array
            ordenarTabla($clientes,"dni");
            //Generamos el fichero
            arrayToFile($clientes,"clientes.txt");
        }else{
            $clientes=[];
            fileToArray("clientes.txt","~",$clientes);
        }

        //VAMOS A GENERAR EL INFORME
        //PRIMERO GENERAMOS UN ARRAY CON TODAS LAS LOCALIDADES QUE EXISTEN
        $listaCiudades=[];
        foreach($clientes as $registro){
            $ciudad = $registro["ciudad"];
            if(!in_array($ciudad,$listaCiudades)){
                $listaCiudades[] = $ciudad;
            }
        }

        //Ahora vamos crear un array bidimensional donde guardemos ciudad y saldo total
        $listaSaldos=[];
        foreach($listaCiudades as $ciudad){
            $totalCiudad=0; //Variable para guardar el total de saldo
            foreach($clientes as $registro){
                if($ciudad==$registro["ciudad"]){
                    $totalCiudad+=$registro["saldo"];
                }
            }
            $fila=[$ciudad,$totalCiudad];
            $listaSaldos[]=$fila;
        }

        //Al llegar aquí ya tenemos toda la información que queremos en $listaSaldos
        //Vamos a presentar la información en una cadena
        $info="";
        foreach($listaSaldos as $registro){
            $info.="El saldo total de ".$registro[0]." es ".$registro[1]." euros<br>";
        }

    ?>

    
    <h1>INFORME</h1>
    <table><tr><td>
    <form method="post" action="">

        <table>
            <tr>
                <td>
                    <h3><?php echo $info; ?></h3>
                </td>
            </tr>
        </table>  
 
    </form>
    </td></tr></table>
    
</body>
</html>
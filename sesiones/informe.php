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
                padding:10px;
                font-size:1.5em;
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
            arrayToFile($clientes,"clientes.txt","~");
        }else{
            $clientes=[];
            
            fileToArray("clientes.txt","~",$clientes);
        }

        //GENERAMOS UN ARRAY ASOCIATIVO CON LOS DATOS DE CADA CIUDAD Y SU SALDO TOTAL
        for($i=0; $i<count($clientes); $i++){
            $loc = $clientes[$i]["ciudad"];
            if(!isset($total[$loc])){
                $total[$loc] = $clientes[$i]["saldo"]; //Inicializar total
            }else{
                $total[$loc] += $clientes[$i]["saldo"]; //Incrementar
            }
        }

        //Mostramos la información
        $info = "";
        echo "<h1>INFORME</h1>";
        echo "<table>";
        foreach($total as $clave => $valor){
            echo "<tr><td>El saldo total de $clave es</td><td>$valor</td></tr>";
        }
        echo "</table>";

        /*
            TAREA
            Hacer el informe partiendo de un array ordenado por localidades
            y con un solo recorrido.
            Se trata de recorrer el array e ir acumulando datos mientras nos
            mantenemos en la misma ciudad.
            Cuando cambiamos de ciudad, mostramos los datos de la ciudad anterior
            y empezamos a acumular los nuevos
        */

        //Primero ordenamos el array por localidad
        ordenarTabla($clientes,"ciudad");
        arrayToFile($clientes,"clientesord.txt","~");

        $ciudadInicial = $clientes[0]["ciudad"]; //Guardamos la primera ciudad de cada sector
        $sumaSaldos = 0;

        for($i=0; $i<count($clientes); $i++){
            

        }

    ?>

    
    
    
</body>
</html>
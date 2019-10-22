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
                text-align:center;
                margin:5px;
                padding:5px;
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
            include "arrayclientes.php";
            //Ordenamos el array
            ordenarTabla($clientes,"dni");
            //Generamos el fichero
            arrayToFile($clientes,"clientes.txt");
        }else{
            $clientes=[];
            fileToArray("clientes.txt","~",$clientes);
        }


        if(isset($_POST["borrar"])){

            $dni=$_POST["dni"]; //Extraemos el dni a borrar del desplegable

            //Si quedan clientes en el array, los borramos

            if(count($clientes)>0){
                //Eliminamos el dni del array
                eliminarFila($clientes,"dni",$dni);


                //Regeneramos el fichero
                arrayToFile($clientes,"clientes.txt","~");
            }
               
        }
    ?>

    
    <h1>BORRAR</h1>
    <table><tr><td>
    <form method="post" action="">

        <table>
            <tr>
                <td>
                    <select name="dni">
                        <?php
                            for($i=0; $i<count($clientes); $i++){
                                echo "<option value='".$clientes[$i]["dni"]."'>".$clientes[$i]["dni"]."</option>";
                            }
                        ?>
                    </select>
                
                </td>
                
            </tr>

            <tr>
                <td style="text-align:center" colspan="2">
                    <input type="submit" name="borrar" value="BORRAR CLIENTE"/>
                </td>
            </tr>
            <tr>
                <td>
                    <?php if(isset($dni)){echo "DNI --> ".$dni." BORRADO";}else{echo "";} ?>
                </td>
            </tr>
        </table> 

    </form>
    </td></tr></table>
    <a href="backend.php"><h1>VOLVER</h1></a>
    
</body>
</html>
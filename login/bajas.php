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

        $claseDni=""; //Variable donde guardaremos el atributo class

        if(isset($_POST["borrar"])){

            //Generamos tambien una variable para guardar el error
            $error["dni"]="";

            $dni=$_POST["dni"]; //Extraemos el dni a borrar del campo DNI

            if($dni==""){
                $error["dni"].="Falta ingresar el DNI. ";
                $claseDni="error";
            }else{
                if(!validarDni($dni)){
                    $error["dni"].="Formato incorrecto. ";
                    $claseDni="error";
                }else{
                    if(!is_int(busquedaBinariaTabla($clientes,"dni",$dni))){
                        $error["dni"].="Ese dni no existe. ";
                        $claseDni="error";
                    }
                }
            }

            //SI TODO VA BIEN, BORRAMOS EL CLIENTE CON EL DNI CORRESPONDIENTE
            if($claseDni==""){
                 //Borramos la fila correspondiente a ese dni del array
                 eliminarFila($clientes,"dni",$dni);
                 $error["dni"] = "¡DNI BORRADO!";

                 //Regeneramos el fichero
                 arrayToFile($clientes,"clientes.txt");
            }

        }



    ?>

    
    <h1>BORRAR</h1>
    <table><tr><td>
    <form method="post" action="">

        <table>
            <tr class="<?php echo $claseDni; ?>">
                <td><label for="dni">DNI&nbsp;&nbsp;</label></td>
                <td><input type="text" name="dni" id="dni" <?php if(isset($dni)){if($claseDni==""){echo "value='$dni'";}} ?>><br></td>
                <td><?php if(isset($error["dni"])){echo $error["dni"];} ?></td>
            </tr>

            <tr>
                <td style="text-align:center" colspan="2">
                    <input type="submit" name="borrar" value="BORRAR CLIENTE"/>
                </td>
            </tr>
        </table>  
 
    </form>
    </td></tr></table>
    
</body>
</html>
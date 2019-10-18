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
                width:15%;
                margin-left:auto;
                margin-right:auto;
                margin-top:100px;
			}
    </style>
</head>
<body>
    <?php
        //Includes de las funciones
        include "../funciones/funciones_ordenacion.php";
        include "../funciones/funciones_busqueda.php";
        include "../funciones/ficheros.php";
        
        if(!file_exists("clientes.txt")){
            //SI NO EXISTE EL FICHERO CLIENTES.TXT, LO GENERAMOS YA ORDENADO
            include "arrayclientes.php";
            //Ordenamos el array
            ordenarTabla($clientes,"dni");
            //Generamos el fichero
            arrayToFile($clientes,"clientes.txt","~");
        }else{
            //Si sí que existe el fichero, cargamos el array $clientes en memoria
            $clientes=[];
            fileToArray("clientes.txt","~",$clientes);
        }

        //SI PULSAMOS AL BOTÓN DE ENVIAR
        if(isset($_POST["enviar"])){
            //Primero comprobamos si se ha logueado como administrador
            if($_POST["dni"]=="admin" && $_POST["pass"]=="1234"){
                //NOS VAMOS A BACKEND.PHP
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=http://localhost/login/backend.php'>";
            }else{
                //En el caso de que no sea administrador, miramos si está en la "base de datos"
                //Trabajamos con el array $clientes que ya tenemos cargado en memoria
                //Buscamos si el dni insertado existe
                $dni=$_POST["dni"];
                $resultado=busquedaBinariaTabla($clientes,"dni",$dni);
                //Sí la función nos devuelve un entero, es que sí que existe
                if(is_int($resultado)){
                    //Comprobamos si en esa fila del array, el password coincide con el insertado
                    $passIntroducido = $_POST["pass"];
                    $passReal = $clientes[$resultado]["pass"];
                    if($passIntroducido==$passReal){
                        //Generamos otro archivo con los datos que nos llevaremos a frontend.php
                        $fichero=fopen("sesion.txt","w");
                        fwrite($fichero,$dni);

                        //NOS VAMOS A FRONTEND.PHP
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=http://localhost/login/frontend.php'>";

                    }else{//contraseña incorrecta
                        echo "<script>
                                window.onload = function mostrar(){
                                    document.getElementById('mensajes').innerHTML='Contraseña incorrecta';
                                }
                             </script>";
                    }
                }else{//Si la función no nos retorna un entero, el dni no existe
                    echo "<script>
                                window.onload = function mostrar(){
                                    document.getElementById('mensajes').innerHTML='El DNI no existe';
                                }
                          </script>";
                }


            }


        }
    ?>
    <form action="" method="post" name="datos_usuario" id="datos_usuario">
        <table>
            <tr>
                <td><label for="dni">DNI:</label></td>
                <td>
                    <input type="text" name="dni" id="dni">
                </td>
            </tr>
            <tr>
                <td><label for="pass">Contraseña:</label></td>
                <td>
                    <input type="password" name="pass" id="pass">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="enviar" id="enviar" value="Enviar">
                </td>
            </tr>
            <tr>
                <td colspan="2" id="mensajes"><td>
            </tr>
        </table>
	</form>
</body>
</html>
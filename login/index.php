<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div{
            border:2px solid red;
            display:inline-block;
            padding:10px;
            margin:100px;
            text-align:center;
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
            arrayToFile($clientes,"clientes.txt");
        }else{
            //Si sí que existe el fichero, cargamos el array $clientes en memoria
            $clientes=[];
            fileToArray("clientes.txt","~",$clientes);
        }

        //SI PULSAMOS AL BOTÓN DE ENVIAR
        if(isset($_POST["enviar"])){
            //Primero comprobamos si se ha logueado como administrador
            if($_POST["dni"]=="admin" && $_POST["pass"]=="1234"){
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=http://localhost/login/backend.php'>";
            }else{
                //En el caso de que no sea administrador, miramos si está en la "base de datos"
                //Trabajamos con el array $clientes que ya tenemos cargado en memoria
                //Buscamos si el dni insertado existe
                $dni=$_POST["dni"];
                $resultado=busquedaBinariaTabla($clientes,"dni",$dni);
                if(is_int($resultado)){
                    //Comprobamos si en esa fila del array, el password coincide con el insertado
                    $passIntroducido = $_POST["pass"];
                    $passReal = $clientes[$resultado]["pass"];
                    if($passIntroducido==$passReal){
                        //NOS VAMOS A FRONTEND.PHP nos vamos
                    }else{//contraseña incorrecta
                        echo "Contraseña Incorrecta";
                    }
                }else{//el dni no existe
                    echo "El dni no existe";
                }


            }


        }
    ?>
    <div>
        <form method="post" action="">
            <label for="dni">Introduzca DNI:&nbsp;</label>
            <input type="text" name="dni">
            <br><br>
            <label for="pass">Introduzca password:&nbsp;</label>
            <input type="password" name="pass">
            <br><br>
            <input type="submit" name="enviar" value="Ingresar">
        </form>
    </div>
</body>
</html>
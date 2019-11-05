<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        
        if(isset($_POST["enviar"])){

            $usuario=$_POST["usuario"];
            $password=$_POST["pass"];
            $infoCookie=$usuario."-".$password;
            echo $infoCookie,"<br>";

            //Si el fichero existe, es que hay registros previos
            //Miramos a ver si ya existen dichas credenciales
            if(file_exists("cookies.txt")){

                
                //Guardamos en un array todas sus lineas de contenido con la funcion file
                $datos=file("cookies.txt",FILE_IGNORE_NEW_LINES);

               

                //Hacemos una búsqueda secuencial
                $i=0;
                while($i<count($datos)){
                    echo $datos[$i],"<br>";
                    if(strcmp($datos[$i],$infoCookie)==0){
                        $i=count($datos)+1;
                    }
                    $i++;
                }
                
                //Si $i es menor a count($datos)+1 es que si lo ha encontrado
                if($i<count($datos)+1){
                    echo "No puedes registrarte con las mismas credenciales en ordenadores distintos";
                }else{
                    //Creamos el fichero y guardamos los datos
                    //Vamos a guardar en un fichero la info de esta cookie
                    $fichero = fopen("cookies.txt","a");
                    fwrite($fichero,$infoCookie."\n");
                    fflush($fichero);
                    fclose($fichero);
                    //Creamos la cookie con la informacion
                    setcookie("info",$infoCookie,time()+60*60*24*30);

                    echo "Registro correcto. Se le redireccionará a la página de acceso...";
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=http://localhost/cookies/login/login.php'>";
                }
                
            }else{
                //Creamos el fichero y guardamos los datos
                //Vamos a guardar en un fichero la info de esta cookie
                $fichero = fopen("cookies.txt","a");
                fwrite($fichero,$infoCookie."\n");
                fflush($fichero);
                fclose($fichero);

                 //Creamos la cookie con la informacion
                setcookie("info",$infoCookie,time()+60*60*24*30);

                echo "Registro correcto. Se le redireccionará a la página de acceso...";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=http://localhost/cookies/login/login.php'>";
            }
            
           
        }

    ?>
    <form action="" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" required/>
        <br>
        <label for="pass">Contraseña</label>
        <input type="text" name="pass" id="pass" required>
        <br>
        <input type="submit" name="enviar" value="Registrarme"/>
    </form>
    
</body>
</html>
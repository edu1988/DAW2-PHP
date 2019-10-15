<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="text"/>
        <input type="submit" name="enviar"/>
    </form>
    <?php
        
        if(isset($_POST["enviar"])){+
            
            $archivo = fopen("archivo.txt","w");
            if(!$archivo){
                echo "El archivo no existe";
            }
            fwrite($archivo,$_POST["text"]);
            fclose($archivo);
        }
    ?>
</body>
</html>
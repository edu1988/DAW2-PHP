<?php
    session_start();

    $email="";
    $html="";

    //Restringimos el acceso si no ha pasado por el login
    if(isset($_SESSION["usuario"])){
        //Extraemos los datos del usuario
        $usuario=$_SESSION["usuario"];
        $email=$usuario["email"];

        //Los partimos por campos


        //Presentamos el contenido en una tabla
        $html="";
        
        for($i=1; $i<=3; $i++){
            $html.="<table>";
            $nombre="eval".$i;
            $html.="<caption>EVALUACION $i</caption><tr>";
            $suma=0;
            $contador=0;
            foreach($$nombre as $valor){
                $suma+=$valor;
                $contador++;
                $html.="<td>$valor</td>";
            }
            $media=$suma/$contador;
           
            $html.="</tr><tr><td colspan='$contador'>Media: $media</td></tr>";
            $html.="</table>";
        }
        


    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css"/>
    <title>Document</title>
    <style>
        h5{color:white;}
        td{
            width:auto;
            color:white;
            padding:10px;
            border:1px solid white;
        }
        table{
            margin:0 auto
            width:200px;
            font-size:0.8em;
            display:inline-table;
        }
        caption{
            color:white;
            padding:10px;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="box">
        <h1>PROFESOR</h1>
        <h5><?php echo $email; ?></h5>
        <?php echo $html; ?>
        <div id="boton">
            <a href="logout.php">CERRAR SESIÓN</a>
        </div>
    </div>

</body>

</html>
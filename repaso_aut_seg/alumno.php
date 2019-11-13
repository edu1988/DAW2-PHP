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
        $eval1=explode(",",$usuario["1ev"]);
        $eval2=explode(",",$usuario["2ev"]);
        $eval3=explode(",",$usuario["3ev"]);

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

</head>

<body>
    <div class="box">
        <h1>ALUMNO</h1>
        <h5><?php echo $email; ?></h5>
        <?php echo $html; ?>
        <div id="boton">
            <a href="logout.php">CERRAR SESIÓN</a>
        </div>
    </div>

</body>

</html>
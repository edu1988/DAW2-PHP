<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
            *{
                text-align:center;
            }
        	body{
				background:#B6E7ED;
			}
			
			h1{
				text-align:center;
                margin-top:80px;
			}

			table{
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

    .error{
        background-color: red;
        
    }
</style>
<body>

    <?php

    include "lotes.php";
    include "misfunciones.inc.php";
        
    if(!file_exists("almacen.txt")){
        //Creamos el fichero
        arrayToFile($lotes,"almacen.txt","~");
    }else{
        //Cargamos el array en memoria procedente del fichero
        $lotes=[];
        fileToArray("almacen.txt","~",$lotes);
    }
    
    //Ordenamos por código el fichero

    //Primero ordenamos el array
    ordenarTabla($lotes,2);
    //Regeneramos el fichero
    arrayToFile($lotes,"almacen.txt","~");

    $error=[];

    //VALIDACION DE LA INSERCCIÓN
    if(isset($_POST["enviar"])){

        //Array para GENERAR UN ARRAY DE ERRORES Y GENERAR LAS VARIABLES SIMPLES
        foreach($_POST as $key => $dato){
            $error[$key]="";
            $$key=$dato;
        }

        $claseCod=""; $claseDesc=""; $claseCad=""; $claseFech=""; 
        $claseLoc=""; $claseProc=""; $claseStock=""; $clasePrec="";

        //Validaciones
        if($codigo==""){
            $error["codigo"] = "Debes introducir un codigo";
            $claseCod="error";
        }
        if($descripcion==""){
            $error["descripcion"] = "Debes introducir una descripcion";
            $claseDesc="error";
        }
        if($caducidad==""){
            $error["caducidad"] = "Debes introducir una caducidad";
            $claseCad="error";
        }
        if($localidad==""){
            $error["localidad"] = "Debes introducir una localidad";
            $claseLoc="error";
        }
        if($procedencia==""){
            $error["procedencia"] = "Debes introducir una procedencia";
            $claseProc="error";
        }
        if($stock==""){
            $error["stock"] = "Debes introducir un stock";
            $claseStock="error";
        }else{
            if(!is_numeric($stock)){
                $error["stock"] = "El stock debe ser un dato numerico";
                $claseStock="error";
            }
        }
        if($precio==""){
            $error["precio"] = "Debes introducir un precio";
            $clasePrec="error";
        }else{
            if(!is_numeric($precio)){
                $error["precio"] = "El precio debe ser un dato numerico";
                $clasePrec="error";
            }
        }

        //SI TODO ES CORRECTO, INSERTAMOS, PERO INSERTAMOS ORDENADO POR CODIGO
        if($claseCod=="" && $claseDesc=="" && $claseCad=="" && $claseFech=="" &&
           $claseLoc=="" && $claseProc=="" && $claseStock=="" && $clasePrec==""){

            //Creamos el lote
            $lote = array("codigo"=>$codigo, "descripcion"=>$descripcion, "caducidad"=>$caducidad, "procedencia"=>$procedencia, "stock"=>$stock, "precio"=>$precio);

            insertarOrdenado($lote,"codigo",$lotes);

            //Regeneramos el fichero txt
            arrayToFile($lotes,"almacen.txt","~");

            echo "Lote insertado";
        }



    }

    ?>

    
    <h1>AÑADIR</h1>
    
    <form method="post" action="">

        Código: <input class="<?php echo $claseCod; ?>" type="text" name="codigo"/><br>
        Descripción: <input class="<?php echo $claseDesc; ?>" type="text" name="descripcion"/><br>
        Caducidad: <input class="<?php echo $claseCad; ?>" type="date" name="caducidad"><br>
        Localidad: <input class="<?php echo $claseLoc; ?>" type="text" name="localidad"/><br>
        Procedencia: <input class="<?php echo $claseProc; ?>" type="text" name="procedencia"/><br>
        Stock: <input class="<?php echo $claseStock; ?>" type="text" name="stock"/><br>
        Precio: <input class="<?php echo $clasePrec; ?>" type="text" name="precio"><br>
        <input type="submit" name="enviar" value="Añadir"/>

    </form>
    <table><tr><td>
        <?php
            foreach($error as $key => $valor){
                echo $valor . "<br>";
            }
        ?>
    
    </td></tr></table> 
    
</body>
</html>
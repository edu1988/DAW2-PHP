<?php

    if($_POST["enviar"]){

        //array para errores
        foreach($_POST as $key => $dato){
            $error[$key] = "";
        }

        //generar array de variables simples
        foreach($_POST as $key => $dato){
            $$key = $dato;
        }

        //validaciones
        if($nombre==""){
            $error["nombre"] .= "Debes introducir un nombre.";
        }else{
            if(!strpos(",",$nombre)){
                $error["nombre"] .= "El nombre no debe contener comas.";
            }
            if(count(explode(",",$nombre))>2){
                //
            }
        }

        if(!$error){ //El array de errores está vacío
            //Nos vamos
            echo "<meta http-equiv='refresh' content='0; URL=index....html'>"
        }


    }

    ?>

    <form>
    
        <input type="text" name="nombre" value="<?php if(isset($nombre)){if($error["nombre"]==""){echo $nombre}} ?>"
    
    </form>
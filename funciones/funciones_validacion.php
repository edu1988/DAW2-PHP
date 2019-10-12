<?php

    /*Función para validar un DNI
    Si el dni no responde a la estructura de 8 números y una letra,
    el método retornará false, de lo contrario, true */

    function validarDni($dni){
        //Si la longitud total del dni no son 9 caracteres, ni seguimos comprobando
        if(strlen($dni)==9){
            $correcto=true;
            $i=0;
            while($correcto && $i <= 8){
                if($i <= 7){ //8 primeros elementos --> Deben ser numeros
                    if(!is_numeric($dni[$i])){
                        $correcto=false;
                    }
                }else{ //Último elemento --> Debe ser una letra
                    if(!ctype_alpha($dni[$i])){ //Si el último caracter no es una letra [A-Za-z]
                        $correcto=false;
                    }
                }
                $i++;
            }
        }else{
            $correcto=false;
        }
        return $correcto;
    }

?>
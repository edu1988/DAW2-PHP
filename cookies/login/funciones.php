<?php

    function identificarEquipoPorVolumen(){
        //Obtenemos la cadena de salida
        $salida = shell_exec('vol');
        //La procesamos
        $salida=trim($salida);
        //Nos quedamos con el último elemento despues del espacio
        $palabras=explode(" ",$salida);
        $ultimaPalabra=$palabras[count($palabras)-1];
        return $ultimaPalabra;
    }

    function getBrowser($user_agent){
    
        if(strpos($user_agent, 'MSIE') !== FALSE)
            return 'explorer';
        elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
            return 'edge';
        elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
            return 'explorer';
        elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
            return "operamini";
        elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
            return "opera";
        elseif(strpos($user_agent, 'Firefox') !== FALSE)
            return 'firefox';
        elseif(strpos($user_agent, 'Chrome') !== FALSE)
            return 'chrome';
        elseif(strpos($user_agent, 'Safari') !== FALSE)
            return "safari";
        else
            return 'No hemos podido detectar su navegador';
    }



?>
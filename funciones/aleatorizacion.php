<?php

    function generarClaveAleatoria(){
        //10 caracteres [a-z], ascii a--> 97 ; z --> 122
        $password="";
        for($i=0; $i<10; $i++){
            $asciiAleatorio=rand(97,122);
            $password.=chr($asciiAleatorio);
        }
        return $password;
    }

?>
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

    function micaptcha(){
        $colores=["red","green","blue"];
        $tamaños=["8px","12px","16px"];
        $fuentes=["arial","verdana","times new roman"];
        $html="";
        for($i=0; $i<=6; $i++){
            $numAle=[rand(0,2),rand(0,2),rand(0,2)];
            $letraAle=chr(rand(65,90));
            $estilosAle="style='color:".$colores[$numAle[0]]."; font-family:".$fuentes[$numAle[1]]."; font-size:".$tamaños[$numAle[2]]."'";
            $html.="<span ".$estilosAle.">".$letraAle."</span>";
        }
        return $html;
    }

    echo micaptcha();

?>
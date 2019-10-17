<?php

    include "../funciones/ficheros.php";
    include "../ejercicio_lista/arrayclientes.php";
    include "../funciones/insertar_eliminar.php";
    include "../funciones/funciones_ordenacion.php";
    include "../funciones/mostrar_arrays.php";

    verTabla($clientes);

    $clientes2 = array(
        array("Pepe","Burgos",32),
        array("Edu","Madrid",22),
        array("Manoli","Pamplona",11)
    );
    
    verTablaN($clientes2);
    arrayToFileN($clientes2,"clientes2.txt");


    /*

    ordenarTabla($clientes,"dni");

    $cliente=["dni"=>"71299244A","nombre"=>"Eduardo Perez", "saldo"=>"1234"];
    $cliente3=["dni"=>"71299244C","nombre"=>"Eduardo Perez", "saldo"=>"1234"];

    arrayToFile($clientes,"mifichero.txt");

    
    fileToArray("mifichero.txt","~",$clientes);



    //insertarOrdenado($cliente,"dni",$replica);

    arrayToFile($clientes,"mifichero2.txt");

    //insertarOrdenado($cliente3,"dni",$replica);

    arrayToFile($clientes,"mifichero3.txt");

    */
?>
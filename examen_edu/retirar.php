<?php

    session_start();

    /*Seguridad. Impedir acceso por url */
    if(!isset($_SESSION["cliente"])){
        //Destruimos la sesión y le redirigimos al index
        session_destroy();
        header("Location:login.php");
    }

    /*Comprobamos siempre, en cada salto de página dentro de la sesión
    de un cliente, que no han pasado más de tres minutos desde que inició
    sesión */
    $instante_actual = time();
    $instante_inicial = $_SESSION["instante_inicial"];
    $tiempo_sesion_segundos = $instante_actual - $instante_inicial;
    if($tiempo_sesion_segundos > 180){
        //Destruimos la sesión y le redirigimos al index
        session_destroy();
        header("Location:login.php");
    }

    /*Comprobamos si el usuario ya ha hecho algúna retirada de dinero
    en el dia presente con la ayuda del fichero de movimientos */
    //Cargamos dicho fichero en un array
    $movimientos=[];
    include "funciones_ficheros.php";
    fileToArray("Movimiento.txt","~",$movimientos);

    //var_dump($movimientos);

    $diaActual=date("Y-m-d");
    $dniCliente=$_SESSION["cliente"]["dni"];

    //Recorremos el array
    $puedeRetirar=true;
    /*
    for($i=0; $i<count($movimientos); $i++){
        if($movimientos[$i]["dnicli"]==$dniCliente && 
           $movimientos[$i]["fecha"]==$diaActual){
                //Generamos una variable booleana de control
                //La utilizamos para modificar el HTML
                //$puedeRetirar=false;
        }
    }
    */
    //Accion a realizar cuando se envía el formulario
    if(isset($_POST["retirar"])){
        //Recogemos el dinero que pretende retirar
        $valorRetirada=$_POST["retirada"];

        //Lo comparamos con su saldo total
        //En la variable de sesión cliente almácenabamos toda la información
        $saldo_total=$_SESSION["cliente"]["saldo"];

        if($valorRetirada > $saldo_total){
            //Le mostramos un mensaje
            echo "No puede retirar una cantidad superior a su saldo";
        }else{
            //Le mostramos un mensaje
            echo "Retirada de dinero realizada";

            //Le actualizamos el saldo en el fichero de cuentas
            $saldoRestante = $saldo_total - $valorRetirada;
            //Antes hay que cargar el fichero en memoria
            $clientes=[];
            fileToArray("CtaCliente.txt","~",$clientes);

            //Buscamos al cliente en el array
            include "funciones_busqueda.php";
            $fila=busquedaSecuencial($clientes,"dni",$_SESSION["cliente"]["dni"]);
            //Modificamos el dato de esa fila
            $clientes[$fila]["saldo"]=$saldoRestante;

            //Reescribimos el fichero
            arrayToFile($clientes,"CtaCliente.txt","~");

            //Anotamos el movimiento en el fichero movimientos
            //(Ya lo tenemos cargado en memoria de antes)
            //Obtenemos el id del último movimiento
            $id_ult_mov=count($movimientos)+1;
            //Creamos el array con la información del movimiento
            $movimiento=array("id_mvto"=>$id_ult_mov, "dni_cli"=>$clientes[$fila]["dni"],
                              "cantidad"=>$valorRetirada, "fecha"=>date("Y-m-d"));

            //Añadimos el movimiento al array
            $movimientos[]=$movimiento;

            //Reescribimos el fichero
            arrayToFile($movimientos,"Movimiento.txt","~");

            //Por último hay que actualizar la variable de sesión que
            //Almacena la información del cliente, ya que es sobre la
            //que se apoya este archivo para extraer sus datos en cada
            //operacion
            $_SESSION["cliente"]=$clientes[$fila];
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>RETIRAR DINERO</h1>
    <?php
        if(!$puedeRetirar){
            echo "<p>
                    Usted no puede retirar dinero porque ya ha realizado
                    alguna retirada en el día de hoy
                 </p>";
        }
    ?>
    <form action="" method="post">
    
        <!--SI NO PUEDE RETIRAR, NO LE MOSTRAMOS NI EL INPUT-->
        <?php if($puedeRetirar): ?>
            CANTIDAD A RETIRAR:<input type="number" name="retirada" id="retirada">
        <?php endif; ?>

        <input type="submit" name="retirar" value="Enviar">

    </form>
    
</body>
</html>
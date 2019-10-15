<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        padding:30px;
        box-sizing: border-box;
    }
    input{
        width:125px;
    }
    input[type="submit"]{
        width:200px;
    }
    select{
        width:130px;
    }
    #formu{
        display:inline-block;
        border:1px solid black;
        /*width:400px;*/
        text-align:left;
        padding-left:20px;
        padding-right:20px;
    }
    table{
        display:inline-block;
        border-collapse: collapse;
    }

    td{
        padding:3px;
    }

    .error{
        background-color: orange;
        border:2px solid red;
    }
</style>
<body>

    <?php
        //INCLUDES NECESARIOS
        include "../ejercicio_lista/arrayclientes.php";
        include "../funciones/mostrar_arrays.php";
        include "../funciones/funciones_ordenacion.php";
        include "../funciones/insertar_eliminar.php";
        include "../funciones/funciones_validacion.php";
        include "../funciones/ficheros.php";

        $clientesDef=[];

        if(!file_exists("clientes.txt")){
            arrayToFile($clientes,"clientes.txt");
            
        }else{
            fileToArray("clientes.txt","~",$clientesDef);
        }
        
        
        //Ordenamos la tabla
        ordenarTabla($clientesDef,"dni");

        

        //Inicializamos variables necesarias para su uso posterior
        $claseNombre=""; 
        $claseDni=""; 
        $claseFecha="";
        $claseSaldo="";
        
        $error=[];
        //ACCIÓN PRINCIPAL
        //BOTON ENVIAR
        if(isset($_POST["enviar"])){

           

            //Array para GENERAR UN ARRAY DE ERRORES Y GENERAR LAS VARIABLES SIMPLES
            foreach($_POST as $key => $dato){
                $error[$key]="";
                $$key=$dato;
                if(!isset($$key)){ //Si alguna variable no se inicializa la convertimos a cadena vacía
                    $$key="";
                }
            }

            //Comenzamos con las validaciones
            //VALIDAR DNI
            if($dni==""){
                $error["dni"]="Debes introducir un dni. ";
                $claseDni = "error";
            }else{
                if(!validarDni($dni)){
                    $error["dni"]="Formato incorrecto";
                    $claseDni="error";
                }else{
                    //Combrobamos si ya existe
                    $resultado=busquedaBinariaTabla($clientes,"dni",$dni);
                    //Si esta función nos devuelve un entero, es que el elemento YA ESTÁ EN LA TABLA
                    if(is_numeric($resultado)){
                        //Mostramos el mensaje de error
                        $error["dni"]="ESE DNI YA EXISTE";
                        $claseDni="error";
                    }
                }
            }
            
            //VALIDAR NOMBRE
            if($nombre==""){
                $error["nombre"]="Falta ingresar el nombre. ";
                $claseNombre="error";
            }else{
                if(count(explode(" ",$nombre))<2){
                    $error["nombre"].= "Debes escribir nombre y apellido. ";
                    $claseNombre="error";
                }
                if(substr($nombre,0,1) != strtoupper(substr($nombre,0,1))){
                    $error["nombre"].= "La primera letra debe ser mayúscula. ";
                    $claseNombre="error";
                }
            }

            //VALIDAR FECHA
            if($fecha==""){
                $error["fecha"]="Falta ingresar la fecha";
                $claseFecha="error";
            }

            //VALIDAR SALDO (DEBE SER NÚMERICO)
            if($saldo==""){
                $error["saldo"]="Falta ingresar el saldo";
                $claseSaldo="error";
            }else{
                if(!is_numeric($saldo)){
                    $error["saldo"]="El saldo debe ser numerico";
                    $claseSaldo="error";
                }
            }

            //Si todo está bien hasta aquí, empezamos a procesar datos
            //INSERTAMOS EL CLIENTE
            if($claseNombre=="" && $claseDni=="" && $claseFecha=="" && $claseSaldo==""){

                //Construimos el string con los idiomas especificados
                if(isset($idiomas)){
                    $cadenaIdiomas="";
                    for($i=0;$i<count($idiomas);$i++){
                        $cadenaIdiomas .= $idiomas[$i] . ",";
                    }
                    $cadenaIdiomas = substr($cadenaIdiomas,0,strlen($cadenaIdiomas)-1); //Quitamos la coma final
                }else{
                    $cadenaIdiomas="";
                }
        
                //Creamos el cliente
            
                $cliente=array("dni"=>$dni,"nombre"=>$nombre,"fecha"=>$fecha,
                              "ciudad"=>$ciudad, "saldo"=>$saldo, "idiomas"=>$cadenaIdiomas);

                //Insertamos el cliente en la posición que le corresponde
                insertarOrdenado($cliente,"dni",$clientesDef);
                
            }//Fin del if (todo correcto para insertar cliente)

        } //Fin del if (boton enviar pulsado)

        //BORRAR CLIENTE
        if(isset($_POST["borrar"])){

            $dni=$_POST["dni"]; //Extraemos el dni a borrar del campo DNI

            if($dni==""){
                $msgDni="Falta ingresar el DNI";
                $claseDni="error";
            }else{
                if(!validarDni($dni)){
                    $msgDni="Formato incorrecto";
                    $claseDni="error";
                }
            }

            //SI TODO VA BIEN, BORRAMOS EL CLIENTE CON EL DNI CORRESPONDIENTE
            if($claseDni==""){
                 //Borramos la fila correspondiente a ese dni del array
                 $eliminado=eliminarFila($clientes,"dni",$dni);
                 if($eliminado==-1){
                     $msgDni="Ese DNI no existe";
                     $claseDni="error";
                 }else{
                     $msgDni="DNI BORRADO";
                 }
            }

        }

    ?>

    <div id="formu">
    <h1>AÑADIR/BORRAR</h1>
    <form method="post" action="">

        <table>
            <tr class="<?php echo $claseDni; ?>">
                <td><label for="dni">DNI&nbsp;&nbsp;</label></td>
                <td><input type="text" name="dni" id="dni" <?php if(isset($dni)){if($claseDni==""){echo "value='$dni'";}} ?>><br></td>
                <td><?php if(isset($error["dni"])){echo $error["dni"];} ?></td>
            </tr>
            
            <tr class="<?php echo $claseNombre;?>">
                <td><label for="nombre">Nombre&nbsp;&nbsp;</label></td>
                <td><input type="text" name="nombre" id="nombre" <?php if(isset($nombre)){if($error["nombre"]==""){echo "value='$nombre'";}} ?>/></td>
                <td><?php if(isset($error["nombre"])){echo $error["nombre"];};?></td>
            </tr>
            
            <tr class="<?php echo $claseFecha;?>">
                <td><label for="fecha">Fecha&nbsp;&nbsp;</label></td>
                <td><input type="date" name="fecha" id="fecha" value="<?php if(isset($fecha)){echo $fecha;}else{echo "";}?>"/></td>
                <td><?php if(isset($error["fecha"])){echo $error["fecha"];} ?></td>
            </tr> 
            <tr>
                <td><label for="ciudad">Ciudad&nbsp;&nbsp;</label></td>
                <td>
                    <select name="ciudad" id="ciudad">
                        <option value="Burgos">Burgos</option>
                        <option value="Ávila">Ávila</option>
                        <option value="Palencia">Palencia</option>
                        <option value="Leon">León</option>
                        <option value="Zamora">Zamora</option>
                    </select>
                </td>
            </tr>
            <tr class="<?php echo $claseSaldo; ?>">
                <td><label for="saldo">Saldo&nbsp;&nbsp;</label></td>
                <td><input type="text" name="saldo" id="saldo" value="<?php if(isset($fecha)){echo $saldo;}else{echo "";}?>"/><br></td>
                <td><?php if(isset($error["saldo"])){echo $error["saldo"];} ?></td>
            </tr>
            <tr>
                <td><label for="idioma">Idiomas</label></td>
                <td>
                    <select name="idiomas[]" id="idiomas" size="5" multiple>
                        <option value="español">Español</option>
                        <option value="inglés">Inglés</option>
                        <option value="francés">Francés</option>
                        <option value="alemán">Alemán</option>
                        <option value="danés">Danés</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align:center; padding:20px;" colspan="2">
                    <input type="submit" name="enviar" value="AÑADIR CLIENTE"/>
                    <br><br>
                    <input type="submit" name="borrar" value="ELIMINAR CLIENTE"/>
                </td>
            </tr>
        </table>  
 
        <br>
    </form>
    </div>

    <?php
        //MOSTRAMOS LA TABLA
       
        verTabla($clientesDef);
        
        
    ?>
    
</body>
</html>
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
    }
</style>
<body>

    <?php
        //INCLUDES NECESARIOS
        include "../ejercicio_lista/arrayclientes.php";
        include "../funciones/mostrar_arrays.php";

        //PROCESAR DATOS
        if(isset($_POST["enviar"])){
            //Extraemos variables
            $dni=$_POST["dni"];
            $nombre=$_POST["nombre"];
            $fecha=$_POST["fecha"];
            $ciudad=$_POST["ciudad"];
            $saldo=$_POST["saldo"];
            $idiomas=$_POST["idiomas"];
            
            //Construimos el string con los idiomas especificados
            $cadenaIdiomas="";
            for($i=0;$i<count($idiomas);$i++){
                $cadenaIdiomas .= $idiomas[$i] . ",";
            }

            //Añadimos el cliente al array
            $clientes[]=array("dni"=>$dni,"nombre"=>$nombre,"fecha"=>$fecha,
                              "ciudad"=>$ciudad, "saldo"=>$saldo, "idiomas"=>$cadenaIdiomas);
            
            
            }

        //MOSTRAMOS LA TABLA
        verTabla($clientes);

    ?>

    
    <h1>AÑADIR CLIENTE</h1>
    <form method="post" action="">

        <table>
            <tr>
                <td><label for="dni">DNI&nbsp;&nbsp;</label></td>
                <td><input type="text" name="dni" id="dni"/><br></td>
            </tr>
            <tr>
                <td><label for="nombre">Nombre&nbsp;&nbsp;</label></td>
                <td><input type="text" name="nombre" id="nombre"/></td>
            </tr> 
            <tr>
                <td><label for="fecha">Fecha&nbsp;&nbsp;</label></td>
                <td><input type="text" name="fecha" id="fecha"/><br></td>
            </tr> 
            <tr>
                <td><label for="ciudad">Ciudad&nbsp;&nbsp;</label></td>
                <td><input type="text" name="ciudad" id="ciudad"/><br></td>
            </tr>
            <tr>
                <td><label for="saldo">Saldo&nbsp;&nbsp;</label></td>
                <td><input type="text" name="saldo" id="saldo"/><br></td>
            </tr>
            <tr>
                <td><label for="idioma">Idiomas</label></td>
                <td>
                    <select name="idiomas[]" id="idiomas" size="5" multiple="multiple"
                            style="width:166px">
                        <option value="español">Español</option>
                        <option value="inglés">Inglés</option>
                        <option value="francés">Francés</option>
                        <option value="alemán">Alemán</option>
                        <option value="danés">Danés</option>
                    </select>
                </td>
            </tr>
            <tr><td style="text-align:center; padding:20px;" colspan="2">
                <input type="submit" name="enviar" value="AÑADIR CLIENTE"/>
            </td></tr>
        </table>  
 
        <br>
    </form>

    
</body>
</html>
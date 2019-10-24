<?php

    /*Función para volcar el contenido de un array bidimensional en
    un fichero txt.
    Recibe por parámetros el array bidimensional y el nombre del fichero
    En la primera línea del fichero se escribirán las claves.
    */
    function arrayToFile($tabla,$nombreFich,$separador){
        $fichero=fopen($nombreFich,"w");
        //Si el array está vacío, borramos todo el fichero y salimos
        if(count($tabla)==0){
            
            fwrite($fichero,"");
            return;
        }
        //Escribimos elcontenido
        foreach($tabla as $clave => $valor){
            $linea="";
            foreach($valor as $clave2 => $valor2){
                //fwrite($fichero,$valor2);
                $linea.=$valor2.$separador;
            }
            $linea=substr($linea,0,strlen($linea)-1)."\n";
            fwrite($fichero,$linea);
        }
        fclose($fichero);
    }

    /*Funcion para convertir un fichero txt en un array asociativo.
    Se le pasa por parámetro el nombre del fichero, el carácter separador
    y el array que se quiere generar.
    Se presupone una estructura para el fichero de entrada:
        -La primera línea contendrá los nombres de las claves
        -En el resto del fichero, cada línea sera un "registro" */
        function fileToArray($nombreFich,$separador,&$tabla){
            //Abrimos el archivo
            $fichero=fopen($nombreFich,"r");
            $registro=fgets($fichero);
            
            $tabla=[]; //Vaciamos el array, me lo den como me lo den
            while($registro){
                
                $registro=str_replace("\n","",$registro);
                $lista=explode($separador,$registro);
                $tabla[] = $lista;
                
                $registro=fgets($fichero);
            }
            fclose($fichero);
        }

         /*Función para ordenar un array bidimensional en función de los datos 
        de una sola columna que le pasamos por parámetro. Todas las filas 
        del array original cambian de orden para ajustarse al orden en la columna 
        indicada. */

        function ordenarTabla(&$tabla,$col){
            $n=count($tabla); //Número de filas de la tabla.
            $r=0; $switch=1;
            while($r < $n && $switch){
                $switch=0;
                for($i=0; $i < ($n-1)-$r; $i++){
                    if($tabla[$i][$col] > $tabla[$i+1][$col]){
                        $aux=$tabla[$i];
                        $tabla[$i] = $tabla[$i+1];
                        $tabla[$i+1] = $aux;
                        $switch = 1;
                    }
                }
                $r++;
            }
        }

    /*Método para insertar una fila de datos en una tabla (array bidimensional)
     * que se encuentre previamente ordenado por los campos de una columna y para
     * que la fila que insertamos quede directamente en la posición que le corresponda.
     * Al método le pasamos por parámetro la fila que queremos insertar (un array
     * unidimensional), la columna por la cual queremos que quede ordenado, y una
     * referencia de la tabla donde queremos insertarlo.
     * 
     * Este método hará uso de un método de búsqueda binaria para determinar la
     * posición en el que la nueva fila debe insertarse.
     */
    function insertarOrdenado($fila,$columna,&$tabla){
        //Buscamos el elemento que queremos insertar para ver si ya existe
        $indice = busquedaBinariaTabla($tabla,$columna,$fila[$columna]);
        /*Extraemos el índice donde debería estar o bien aquel en el que ya
        está, en cuyo caso también lo insertaremos duplicado en esa posición
        y desplazaremos todos los demás*/
        if(!is_int($indice)){
            //Extraemos la posición eliminando la etiqueta "x" que nos devuelve el metodo de búsqueda
            $indice=intval(substr($indice,1));
        }
        /*Movemos todos los elementos a partir del índice localizado
        una posición hacia delante.*/ 
        for($i=count($tabla)-1; $i>=$indice; $i--){
            $tabla[$i+1] = $tabla[$i];
        }
        //Una vez, desplazados, insertamos nuestro elemento
        $tabla[$indice] = $fila;
    }

    function busquedaBinariaTabla($tabla,$columna,$valor){
        $i=0; //Posicion inicial
        $j=count($tabla)-1; //Posicion final
        $medio = (int)(($i+$j)/2); //Índice de la posición media
        while($tabla[$medio][$columna] != $valor && ($i<=$j)){
            if($valor < $tabla[$medio][$columna]){
                $j = $medio - 1; //El tope superior será el anterior al medio
            }else{
                $i = $medio + 1; //El tope inferior será el posterior al medio
            }
            $medio = (int)(($i+$j)/2); //Recalculamos el indice medio
        }
        //Al abandonar del bucle ya se ha escaneado todo el array
        if($tabla[$medio][$columna]!=$valor){
            return "x".$i; //Retornamos la posición teórica donde debería estar, pero etiquetada
        }else{
            return $medio; //Retornamos la posición donde está.
        }
    }

    function eliminarFila(&$tabla,$columna,$valor){
        //Buscamos el valor pasado en la columna correspondiente
        $indiceFila=busquedaBinariaTabla($tabla,$columna,$valor);
        if(!is_int($indiceFila)){
            return -1;//Código de error, el elemento que queremos eliminar no existe
        }else{
            //Eliminamos el elemento desplazando todas la filas posteriores a una posición anterior
            for($i=$indiceFila; $i<count($tabla)-1; $i++){
                $tabla[$i] = $tabla[$i+1];
            }
            //Nos cargamos el último elemento, que está repetido al final
            unset($tabla[count($tabla)-1]);
            return 0;
        }
    }

     /*Función para comprobar si un producto ha caducado a partir de su fecha.
        Si la fecha de caducidad es superior a la fecha actual el producto no ha caducado
        De lo contrario retorna true, es decir, sí ha caducado.
        */
        function caducado($fechaCaducidad){
            //Formato de la fecha: AAAA-mm-dd
            list($a,$m,$d)=explode("-",$fechaCaducidad);

            $tiempoUnixProducto = mktime(0,0,0,intval($m),intval($d),intval($a));
            $tiempoUnixActual = time();
            
            if($tiempoUnixProducto >= $tiempoUnixActual){
                return false;
            }else{
                return true;
            }
        }



?>
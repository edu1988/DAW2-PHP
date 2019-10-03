<?php

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

        /* Vamos a intentar hacer un método similar pero que lo ordene de manera que los más ligeros 
        vayan hacia arriba en lugar de que los más pesados caigan. */

        function ordenarTablaBur(&$tabla,$col){
            $n=count($tabla); //Número de filas de la tabla.
            $r=0; $switch=1;
            while($r < $n && $switch){
                $switch=0;
                for($i=($n-1); $i > $r; $i--){
                    if($tabla[$i][$col] < $tabla[$i-1][$col]){
                        $aux=$tabla[$i];
                        $tabla[$i] = $tabla[$i-1];
                        $tabla[$i-1] = $aux;
                        $switch = 1;
                    }
                }
                $r++;
            }
        }

        /*Función para ordenar los valores de un array unidimensional
        por el método de selección*/

        function ordenarSelec(&$lista){
            for($i=0; $i<count($lista)-1; $i++){
                for($j=$i+1; $j<count($lista); $j++){
                    if($lista[$i]>$lista[$j]){
                        intercambia($lista[$i],$lista[$j]);
                    }
                }
            }
        }

        /*Función para ordenar los valores de un array unidimensional
        por el método de burbuja */

        function ordenarBurb(&$lista){
            $i=0;
            $switch=1;
            while($i<count($lista) && $switch){
                $switch=0;
                for($j=count($lista)-1; $j>0; $j--){
                    if($lista[$j] < $lista[$j-1]){
                        intercambia($lista[$j],$lista[$j-1]);
                        $switch=1;
                    }
                }
                $i++; 
            }
        }


        /*Función que intercambia los valores de dos variables*/
        function intercambia(&$a,&$b){
            $aux = $a;
            $a = $b;
            $b = $aux;
        }





?>
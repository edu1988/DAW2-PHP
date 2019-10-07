<?php

    /**Mostrar array asociativo de una dimensión */
    function verLista($lista){
        echo "<table border='1'>";
        foreach($lista as $clave => $valor){
            echo "<tr><td style='padding:5px'>$clave</td>".
                 "<td style='padding:5px'>$valor</td></tr>";
        }
        echo "</table>";
    }


    /**Mostrar array asociativo de dos dimensiones */
    function verTabla($tabla){
        echo "<table border='1'>";
        echo "<tr>";
        foreach($tabla[0] as $clave => $valor){
            echo "<td>$clave</td>";
        }
        echo "</tr>";
        foreach($tabla as $fila){
            echo "<tr>";
            foreach($fila as $clave => $valor){
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        echo "</tr>";
        echo "</table>";
    }

?>
/*

Crea mediante codigo un array de dos dimensiones que en cada fila
contenga los datos de un cliente de un banco, en el siguiente orden:
 primer dato: dni,
 segundo dato: fecha de nacimiento
 tercer dato: localidad
 cuarto dato: saldo

    1. Mostrar la tabla en pantalla (html puro)(con etiqueta table tr td th)
    2. Encontrar qué cliente tiene más dinero.
    3. Cuanto dinero tiene el conjunto de todos los clientes
    4. Ver quién es el más joven y el más viejo.
    5. (Suponemos que son chicas cuyo nombre acaba en a o empieza por "ma")(Cuantas chicas y )

6. Ordenar por dni y mostrar
7. Ordenar por localidad y mostrar
8. Totalizar saldos por todas y cada una de las localidades
9. Muestra los datos del dni asignado a una variable (asignas dni a una variable y muestras sus datos)
    (con tabla desordenada, búsqueda secuencial)
    (con tabla ordenada, busqueda binaria)

10. Buscar una determinada localidad asignada a una variable(cliente o clientes);

 
 */

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>
 <body>

    <?php

        $clientes = array(
            array("dni"=>"73887234A","nombre"=>"Perez Miguel, Eduardo", 
            "fecha"=>"10/05/1988","ciudad"=>"Burgos","saldo"=>10423.23),
            array("dni"=>"73887234A","nombre"=>"Perez Miguel, Eduardo", 
            "fecha"=>"10/05/1988","ciudad"=>"Burgos","saldo"=>10423.23),
            array("dni"=>"73887234A","nombre"=>"Perez Miguel, Eduardo", 
            "fecha"=>"10/05/1988","ciudad"=>"Burgos","saldo"=>10423.23),
            array("dni"=>"73887234A","nombre"=>"Perez Miguel, Eduardo", 
            "fecha"=>"10/05/1988","ciudad"=>"Burgos","saldo"=>10423.23),
            array("dni"=>"73887234A","nombre"=>"Perez Miguel, Eduardo", 
            "fecha"=>"10/05/1988","ciudad"=>"Burgos","saldo"=>10423.23),
            array("dni"=>"73887234A","nombre"=>"Perez Miguel, Eduardo", 
            "fecha"=>"10/05/1988","ciudad"=>"Burgos","saldo"=>10423.23),
            array("dni"=>"73887234A","nombre"=>"Perez Miguel, Eduardo", 
            "fecha"=>"10/05/1988","ciudad"=>"Burgos","saldo"=>10423.23),
        );

    ?>
     
 </body>
 </html>
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

        /*Elaboración de una quiniela ponderada*/

        //15 valores aleatorios (1, X o 2)
        //La probabilidad de obtener un 1 es del 70%
        //Del 30% restante de probabilidades hay la mitad para X y la mitad para 2

        echo "Quiniela con valores ponderados (1-70%; X-15%, 2-15%)<br>";
        
        for($i=1; $i <=15; $i++){
            $aleatorio = rand(1,10);
            if($aleatorio >= 0 && $aleatorio <= 7){
                $aleatorio = 1;
            }else{
                $aleatorio=rand(1,2);
                if($aleatorio == 1){
                    $aleatorio = "X";
                }else{
                    $aleatorio = 2;
                }
            }
            echo $aleatorio,", ";
        }

        /*
        //Loteria primitiva
        do{
            $aleatorio1 = rand(1,49);
            $aleatorio2 = rand(1,49);
            $aleatorio3 = rand(1,49);
            $aleatorio4 = rand(1,49);
            $aleatorio5 = rand(1,49);
            $aleatorio6 = rand(1,49);
        }while($aleatorio1 == $aleatorio2 || $aleatorio1 == $aleatorio3 ||
               $aleatorio1 == $aleatorio4 || $aleatorio1 == $aleatorio5 ||
               $aleatorio1 == $aleatorio6 || $aleatorio2 == $aleatorio3 ||
               $aleatorio2 == $aleatorio4 || $aleatorio2 == $aleatorio5 ||
               $aleatorio2 == $aleatorio6 || $aleatorio3 == $aleatorio4 ||
               $aleatorio3 == $aleatorio5 || $aleatorio3 == $aleatorio6 ||
               $aleatorio4 == $aleatorio5 || $aleatorio4 == $aleatorio6 ||
               $aleatorio5 == $aleatorio6);
        
        echo $aleatorio1,", ",$aleatorio2,", ",$aleatorio3,", ",$aleatorio4,", ",$aleatorio5,", ",$aleatorio6;
        echo "<br><br><br><br><br>";
        //Intentar sacar esto mismo con el enfoque de variable de variable
        

        do{
            $cantidad=6;

            for($i=1; $i <= $cantidad; $i++){
                $nombre = "aleatorio" . $i;
                $$nombre = rand(1,49);
            }

            $repetidos = false;

            for($i=1; $i<=$cantidad && !$repetidos; $i++){
                for($j=$i+1; $j<=$cantidad && !$repetidos; $j++){
                    $nombre1 = "aleatorio" . $i;
                    $nombre2 = "aleatorio" . $j;
                    if($$nombre1 == $$nombre2){
                        $repetidos = true;
                    }
                }
            }
        }while($repetidos);

        for($i=1; $i<=$cantidad; $i++){
            $nombre = "aleatorio" . $i;
            echo $$nombre,", ";
        }

        echo "<br><br>";
        
        //Otra forma
       $numeros=[];
       $repeticion=false;
       do{
            //Rellenamos el array con números aleatorios
            for($i=0; $i<6; $i++){
                $numeros[$i]=rand(1,49);
            }

            //Comprobamos si hay repetidos
            for($i=0; $i<6; $i++){

                for($j=$i+1; $j<6; $j++){
                    if($numeros[$i] == $numeros[$j]){
                        $repeticion=true;
                    }
                }
            }
       }while($repeticion);

       for($i=0; $i<6; $i++){
           echo $numeros[$i] . "---";
       }
       
       echo "<br>----<br>";
       
       //Otra forma pero con bucles while en vez de for
       $numeros=[];
       $repetido=false;
       do{
            //Rellenamos el array con números aleatorios
            for($i=0; $i<6; $i++){
                $numeros[$i]=rand(1,49);
            }

            $i=0;
            while($i<6 && !$repetido){
                $j=$i+1;
                while($j<6 && !$repetido){
                    if($numeros[$i]==$numeros[$j]){
                        $repetido=true;
                    }
                    $j++;
                }
                $i++;
            }
       }while($repetido);

       //Los mostramos
       for($i=0; $i<6; $i++){
           echo $numeros[$i] . "---";
       }

       echo "<br>-------<br>";
       /*
       //Otra forma
       for($i=0; $i<6; $i++){
           $nombre = "aleatorio" . $i;

       }


       

        //Otra forma quizá más limpia
        echo "<br><br><br><br>";

        $x1 = rand(1,49);
        echo "Primero: $x1<br>";

        do{
            $x2 = rand(1,49);
        }while($x2 == $x1);

        echo "Segundo: $x2<br>";

        do{
            $x3 = rand(1,49);
        }while($x3 == $x1 || $x3 == $x2); 

        echo "Tercero: $x3<br>";

        do{
            $x4 = rand(1,49);
        }while($x4==$x3 || $x4 == $x2 || $x4 == $x1);

        echo "Cuarto: $x4<br>";

        //Y así sucesivamente

        //Otra opción

        */

        echo "<br><br>";
        echo "LOTERIA: 6 valores aleatorios no repetidos entre 1 y 49<br>";
        
        $lista = [];
        $cantidad = 6;

        for($i=0; $i<$cantidad; $i++){

            do{
                $repetido = false;

                $lista[$i] = rand(1,49);

                $ultimoIndice = count($lista)-1;
                $indice = $ultimoIndice;

                while($indice >= 1 && !$repetido){

                    if($lista[$ultimoIndice] == $lista[$indice-1]){

                        $repetido = true;

                    }

                    $indice--;
                }

            }while($repetido);

        }

        for($i=0; $i < count($lista); $i++){

            echo "$lista[$i] -";
        }
        




    ?>

</body>
</html>
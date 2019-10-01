<html>

	<head>
		<title>phpinfo()</title>
	</head>
	
	<body>
	
		<?php

            $a=3;
            $b=2;
            $c=1;

            echo "a = $a ; b = $b ; c = $c<br>";

            if($a==0){
                echo "NO ES UNA ECUACIÓN DE SEGUNDO GRADO";
            }else{

                $d=pow($b,2)-4*$a*$c; //Discriminante
                if($d<0){
                    echo "ERROR: NO EXISTEN SOLUCIONES REALES";
                }
                if($d==0){
                    echo "Solución doble: ", -$b/(2*$a);
                }
                if($d>0){
                    echo "Dos soluciones reales:<br>";
                    echo "x1 = ",-$b+sqrt($d)/(2*$a),"<br>";
                    echo "x2 = ",-$b-sqrt($d)/(2*$a),"<br>";
                }

            }

            $variable = null;
            $variable2 = (string)$variable;
            echo "<br>",gettype($variable2),"&nbsp",$variable2;
            if($variable2){
                echo "<br>true";
            }else{
                echo "<br>false"; 
            }

            if($variable2==""){
                echo "<br>cadena vacia";
            }else{
                echo "<br>otra cosa"; 
            }


		
		?>
	
	</body>

</html>
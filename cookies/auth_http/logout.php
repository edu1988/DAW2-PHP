<?php
session_start();

	if(isset($_SERVER['PHP_AUTH_USER'])){
		unset($_SERVER['PHP_AUTH_USER']);
	}        
	
	if (isset($_SERVER['PHP_AUTH_PW'])) {
		unset($_SERVER['PHP_AUTH_PW']);
	}

	echo "Hola que tal";

session_destroy();

?>
<html>
<head>
<title>FIN DE LA SESION!!!!!</title>
</head>
<body>
	HASTA LA PROXIMA
	<br>
	<br>
	<a href="index.php">Volver al LOGIN (o a otra dirección)</a>
</body>
</html>
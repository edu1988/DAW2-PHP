<?php 
	session_start();

   if (!isset($_SERVER['PHP_AUTH_USER'])) {
      header('WWW-Authenticate: Basic realm="Acceso restringido"');
      header('HTTP/1.0 401 Unauthorized');
      echo 'Authorization Required.';
      exit;
   } else {
	  echo "Ha introducido el nombre de usuario:". $_SERVER['PHP_AUTH_USER']."<br>";
      echo "Ha introducido la contraseña:". $_SERVER['PHP_AUTH_PW']."<br>";
   }

   if (($_SERVER['PHP_AUTH_USER']!="admin") || ($_SERVER['PHP_AUTH_PW']!="1234")) {
	   
      if (!isset($_SESSION["contador"])){
			$_SESSION["contador"]=1;
	  }
	  
	  echo "Llevas: ".$_SESSION["contador"]." intentos sobre 3 máximo<br>";
	  
	  if ($_SESSION["contador"]==3){
			echo "Has superado el maximo de intentos permitido";
			echo "<meta http-equiv =\"refresh\" content=\"8;http://www.edudaw.com\">";
			exit;
	  
	  }
	  
	  $_SESSION["contador"]++;
	  
	  header('WWW-Authenticate: Basic realm="Error de acceso.'. ' Intento '.$_SESSION["contador"]);
      header('HTTP/1.0 401 Unauthorized');
      echo 'Authorization Required.';
      exit;
   }
?>
<html>
	<head>
		<title>Mi web</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen" />
	</head>
	<body>
		<header>
			<h1>Desarrollo web</h1>
		</header>
		<nav>
			<a href="java.html"><span>JAVA</span></a>
			<span>PHP</span>
			<span>SQL</span>
			<a href="javascript.html"><span>JAVASCRIPT</span></a>
		</nav>
		<main>
		
			<h1>HAS CONSEGUIDO ACCESO A LA ZONA RESTRINGIDA</h1>

		</main>
	</body>
</html>
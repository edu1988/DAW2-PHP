<?php //ACCESO RESTRINGIDO
session_start();
/*Se puede restringir el acceso a según qué páginas,
Para que solo los usuarios autorizados puedan acceder a ciertas paginas del sitio web usaremos el sistema de autentificación del protocolo HTTP, utilizando las variables globales $PHP_AUTH_USER y $PHP_AUTH_PW.

Atención: las variables globales de servidor $PHP_AUTH_USER, $PHP_AUTH_PW y $PHP_AUTH_TYPE solo funcionan si PHP ha sido instalado como un módulo de Apache, si ha sido instalado como cgi no funcionarán.
Para conseguir la autentificación en las páginas 

    $_SERVER['PHP_AUTH_USER']. Nombre de usuario introducido.
    $_SERVER['PHP_AUTH_PW']. Contraseña introducida.

Para que el navegador nos muestre la ventana de petición de nombre de usuario y contraseña basta con enviar la siguiente cabecera:
*/

   if (!isset($_SERVER['PHP_AUTH_USER'])) {
      header('WWW-Authenticate: Basic realm="Acceso restringido"');
      header('HTTP/1.0 401 Unauthorized');
      echo 'Authorization Required.';
      exit;
   }
   else {
	  echo "Ha introducido el nombre de usuario:". $_SERVER['PHP_AUTH_USER']."<br>";
      echo "Ha introducido la contraseña:". $_SERVER['PHP_AUTH_PW']."<br>";
   }
/*
Esto hace que se muestre la ventana de nombre de usuario y contraseña y los datos introducidos se asignen a las variables $PHP_AUTH_USER y $PHP_AUTH_PW.
A partir de aquí realizar las comprobaciones necesarias para asegurar que los datos introducidos son los correctos.

En este ejemplo se pide autorización y comprobaremos si el nombre de usuario es "pepe" y la contraseña "123", si es así tenemos acceso al resto de la página:*/
?>
<?php // control de acceso
   if (($_SERVER['PHP_AUTH_USER']!="pepe") || ($_SERVER['PHP_AUTH_PW']!="123")) {
      if (!isset($_SESSION["contador"])){
			$_SESSION["contador"]=1;
	  }
	  echo "llevas: ".$_SESSION["contador"]." intentos sobre 3 máximo";
	  if ($_SESSION["contador"]==3){
			echo "has superado el maximo de intentos permitido";
			echo "<meta http-equiv =\"refresh\" content=\"8;salir.php\">";
			exit;
	  
	  }
	  $_SESSION["contador"]++;
	  
	  header('WWW-Authenticate: Basic realm="NOTACUERDAS!!!???? intento ".$_SESSION["contador"]');
      header('HTTP/1.0 401 Unauthorized');
      echo 'Authorization Required.';
      exit;
   }
?>

<html>
<head>
   <title>Ejemplo de PHP</title>
</head>
<body>
Has conseguido el acceso a la <B>zona restringida</B>.
</body>
</html> 
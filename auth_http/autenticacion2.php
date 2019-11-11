<?php // Manual de PHP de WebEstilo.com 
    if (!isset($_SERVER['PHP_AUTH_USER'])) { 
      header('WWW-Authenticate: Basic realm="Acceso restringido"'); 
      header('HTTP/1.0 401 Unauthorized'); 
      echo 'IDENTIFIQUESE'; 
      exit; 
   } 
    
   $fich = file("passwords.txt"); 
   $i=0; $validado=0; 
   while ($i<count($fich) and !$validado) { 
      $campo = explode("~",$fich[$i]); 
      if (($_SERVER['PHP_AUTH_USER']==$campo[0]) && ($_SERVER['PHP_AUTH_PW']==chop($campo[1]))) $validado=1; 
      $i++; 
   } 

   if (!$validado) { 
      header('WWW-Authenticate: Basic realm="Acceso restringido"'); 
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
Ha conseguido el acceso a la <B>zona restringida</B> con el usuario <?php echo $_SERVER['PHP_AUTH_USER']?>. 
</body> 
</html> 
<?php
/* En la anterior página todo el mundo que tenía acceso a la parte restringida entraba con el mismo nombre de usuario y contraseña, esto evidentemente no es una buena solución, es mejor que cada persona tenga un nombre de usuario y contraseña, ya que de esta forma podemos inhabilitar a un usuario sin ver comprometida la seguridad de nuestro sitio.

En esta página veremos la forma de realizar esto, teniendo un fichero separado con los nombres de usuario y las contraseñas válidas. Dicho fichero podría tener el siguiente formato: nombre_de_usuario|contraseña. Por ejemplo:

passwords.txt
luis~1235 
Pedro~qwer 
juan~hola 
elena~adios

En este ejemplo se pide la autorización al comienzo de la página si no se ha establecido con anterioridad y se comprueba con el fichero de contraseñas que hemos llamado passwords.txt, si el nombre de usuario y contraseña coincide con alguna entrada del fichero se nos permite ver el resto de la página.
*/
?>
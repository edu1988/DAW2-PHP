
<?php
	header("Accept-Charset:utf-8");

	echo $_SERVER['REMOTE_ADDR'];
	echo "<br>";
	$cabeceras= getallheaders();
	
	foreach($cabeceras as $clave => $valor){
		echo $clave," --> ",$valor,"<br>";
	}
	
?>

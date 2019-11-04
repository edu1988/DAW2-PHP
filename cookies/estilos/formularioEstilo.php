<html>

<head>
	<meta name="Alberto Sanmartín" content="xx">
	<meta http-equiv="cache-control" content="no-cache">
	<title>Uso de cookies en PHP</title>
</head>

<body>
	<h1>Selección de estilos</h1>
	<form action="" method="POST">
		Aqui puedes seleccionar color de fondo que desees para la página:
		<br><br>
		<select name="colorfondo">
			<option value="verde">Verde</option>
			<option value="rosa" >Rosa</option>
			<option value="negro">Negro</option>
		</select>
		<input type="submit" value="enviar" />
		<br><br>
		Aqui puedes seleccionar color para los titulos:
		<br><br>
		<select name="colortitulos">
			<option value="green">Verde</option>
			<option value="pink">Rosa</option>
			<option value="black">Negro</option>
		</select>
		<input type="submit" value="enviar" />
	</form>
	<?php
	// Veo si recibo datos del formulario
	if (isset($_POST["colorfondo"])) {
		// es que estoy recibiendo un estilo nuevo, lo que tengo que meter en la cookie
		$colorfondo = $_POST["colorfondo"];
		// meto el estilo en una cookie
		setcookie("colorfondo", $colorfondo, time() + (60 * 60 * 24 * 90));
	} else {
		// si no he recibido el estilo que desea el usuario en la página, miro si hay una cookie creada
		if (isset($_COOKIE["colorfondo"])) {
			// es que tengo la cookie
			$colorfondo = $_COOKIE["colorfondo"];
		}
	}

	if (isset($colorfondo)) {
		echo '<link rel="stylesheet" type="text/css" href="css/' . $colorfondo . '.css">';
	}

	if(isset($_POST["colortitulos"])){
		$colortitulos=$_POST["colortitulos"];
		setcookie("colortitulos", $colortitulos, time() + (60 * 60 * 24 * 90));
	}else{
		if(isset($_COOKIE["colortitulos"])){
			$colortitulos=$_COOKIE["colortitulos"];
		}
	}

	if(isset($colortitulos)){
		echo '<style>h1{color:'.$colortitulos.'}</style>';
	}
	?>
</body>

</html>
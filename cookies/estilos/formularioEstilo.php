<html>
	<head>
		<meta name="Alberto Sanmartín" content="xx">
		<meta http-equiv="cache-control" content="no-cache">
		<title>Uso de cookies en PHP</title>
	</head>
	<body>
		<h1>Selección de estilos</h1>
			<form action="" method="POST">
				Aqui puedes seleccionar el estilo (color de fondo) que desees para la página:
				<br><br>
				<select name="estilo">
					<option value="verde">Verde</option>
					<option value="rosa">Rosa</option>
					<option value="negro">Negro</option>
				</select>
				<input type="submit" value="enviar"/>
			</form>
        <?php
            // Veo si recibo datos del formulario
			if(isset($_POST["estilo"])){
				// es que estoy recibiendo un estilo nuevo, lo que tengo que meter en la cookie
				$estilo = $_POST["estilo"];
				// meto el estilo en una cookie
				setcookie("estilo",$estilo,time()+(60*60*24*90));
			} else {
				// si no he recibido el estilo que desea el usuario en la página, miro si hay una cookie creada
				if(isset($_COOKIE["estilo"])) {
					// es que tengo la cookie
					$estilo = $_COOKIE["estilo"];
				}
			}

			if(isset($estilo)){
				echo '<link rel="stylesheet" type="text/css" href="css/'.$estilo.'.css">';
			}
		?>
	</body>
</html>
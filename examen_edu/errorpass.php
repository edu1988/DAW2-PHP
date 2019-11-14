<?php
    session_start();

    //Extraemos el nombre del cliente
    $nombre = $_SESSION["nombre"];

    //Le damos la bienvenida
    echo "Bienvenido " . $nombre . ".<br>";
    echo "Ha introducido mal su contraseña.<br>";
    echo "Vuelva a la página de login para reintroducirla.<br><br>";
    echo "<a href='login.php'>VOLVER AL LOGIN</a>";

?>
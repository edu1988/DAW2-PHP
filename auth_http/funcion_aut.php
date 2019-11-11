
<?php
function autenticar() {
    header('WWW-Authenticate: Basic realm="Sistema de autenticación de prueba"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Debe introducir un ID y contraseña de identificación válidos para acceder a este recurso\n";
    exit;
}
 
if (!isset($_SERVER['PHP_AUTH_USER']) ||
    ($_POST['VistoAntes'] == 1 && $_POST['UsuarioAntiguo'] == $_SERVER['PHP_AUTH_USER'])) {
    autenticar();
} else {
    echo "<p>Bienvenido: " . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "<br />";
    echo "Antiguo: " . htmlspecialchars($_REQUEST['UsuarioAntiguo']);
    echo "<form action='' method='post'>\n";
    echo "<input type='hidden' name='VistoAntes' value='1' />\n";
    echo "<input type='hidden' name='UsuarioAntiguo' value=\"" . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "\" />\n";
    echo "<input type='submit' value='Reautenticar' />\n";
    echo "</form></p>\n";
}
?>


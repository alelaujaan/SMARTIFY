<?php


session_start();
include_once("API/api.php");
if (!isset($_SESSION["logeado"])) {
    header("Location: index.php");
}

$usuario = strtoupper($_SESSION["logeado"]);

$conn = conectar();

$query = mysqli_query($conn, "SELECT * FROM Usuarios WHERE usuario = '$usuario'");
$filas = $query->fetch_all(MYSQLI_ASSOC);

foreach ($filas as $fila) {
    $id = $fila["id_usuario"];
    $nombre = $fila["nomusu"];
    $apellidos = $fila["apeusi"];
    $correo = $fila["mailusu"];
    $usuario = $fila["usuario"];
    $contrasena = $fila["contrasena"];
}

echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo    "<meta charset='UTF-8'>";
echo    "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo    "<title>Modificar Perfil - Smart Home</title>";
echo    "<link rel='stylesheet' href='ESTILOS/modificar.css'>";
echo    "<link rel='shortcut icon' href='FOTOS/icono.png' type='image/x-icon'>";
echo "</head>";
echo "<body>";
echo "<header>";
echo    "<h1 style='font-size: 50px; padding-right: 25%;' id='titulo'>SMARTIFY</h1>";
echo    "<img src='FOTOS/icono.png' alt='' style='width: 50%;' id='logoimg' onclick='window.location.href = \"principal.php\"'>";
echo "</header>";

echo "<main>";
echo    "<section class='perfil'>";
echo        "<h2>Modificar Perfil</h2>";
echo        "<form action='API/mod.php' method='POST'>";

echo            "<input type='hidden' id='id' name='id' value='$id'>";

echo            "<label for='nombre'>Nombre:</label>";
echo            "<input type='text' id='nombre' name='nombre' value='$nombre'>";

echo            "<label for='nombre'>Apellidos:</label>";
echo            "<input type='text' id='apellidos' name='apellidos' value='$apellidos'>";

echo            "<label for='email'>Correo Electrónico:</label>";
echo            "<input type='email' id='email' name='email' value='$correo'>";

echo            "<label for='nombre'>Usuario:</label>";
echo            "<input type='text' id='usuario' name='usuario' value='$usuario'>";

echo            "<label for='contrasena'>Contraseña:</label>";
echo            "<input type='password' id='contrasena' name='contrasena' required>";

echo            "<label for='confirmar_contrasena'>Confirmar Contraseña:</label>";
echo            "<input type='password' id='confirmar_contrasena' name='confirmar_contrasena' required>";

echo            "<button type='submit'>Guardar Cambios</button>";
echo        "</form>";
echo    "</section>";
echo "</main>";

echo "<footer>";
echo    "<p>&copy; 2024 Smartify. Todos los derechos reservados.</p>";
echo "</footer>";
echo "</body>";
echo "</html>";
?>

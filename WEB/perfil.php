<?php

include_once("API/api.php");
session_start();
if (!isset($_SESSION["logeado"])) {
    header("Location: index.php");
}

$usuario = strtoupper($_SESSION["logeado"]);

$conn = conectar();

$query = mysqli_query($conn, "SELECT * FROM Usuarios WHERE usuario = '$usuario'");
$filas = $query->fetch_all(MYSQLI_ASSOC);

// Inicializar la variable de verificación de administrador
$esAdmin = false;

foreach ($filas as $fila) {
    $nombre = $fila["nomusu"];
    $apellidos = $fila["apeusi"];
    $correo = $fila["mailusu"];
    $usuario = $fila["usuario"];
    $contrasena = $fila["contrasena"];
    // Verificar si el usuario es administrador
    if ($fila["id_usuario"] == 1) {
        $esAdmin = true;
    }
}

echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo    "<meta charset='UTF-8'>";
echo    "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo    "<title>Perfil - Smart Home</title>";
echo    "<link rel='stylesheet' href='ESTILOS/perfil.css'>";
echo    "<link rel='shortcut icon' href='FOTOS/icono.png' type='image/x-icon'>";
echo "</head>";
echo "<body>";
echo "<header>";
echo    "<h1 style='font-size: 50px; padding-right: 25%;' id='titulo'>SMARTIFY</h1>";
echo    "<img src='FOTOS/icono.png' alt='' style='width: 50%;' id='logoimg' onclick='window.location.href = \"principal.php\"'>";
echo    "<nav>";
echo        "<ul>";
echo            "<li><a href='modificar.php'>Modificar Perfil</a></li>";
echo            "<li><a href='API/cerrar.php'>Cerrar Sesión</a></li>";
// Mostrar botones adicionales si el usuario es administrador
if ($esAdmin) {
    echo "<li><a href='administracion.php'>Administración</a></li>";
    echo "<li><a href='logs.php'>Logs</a></li>";
}
echo        "</ul>";
echo    "</nav>";
echo "</header>";

echo "<main>";
echo    "<section class='perfil'>";
echo        "<h2>Mi Perfil</h2>";
echo        "<form action='#' method='POST'>";
echo            "<label for='nombre'>Nombre:</label>";
echo            "<input type='text' id='nombre' name='nombre' value='$nombre' readonly>";
echo            "<label for='apellidos'>Apellidos:</label>";
echo            "<input type='text' id='apellidos' name='apellidos' value='$apellidos' readonly>";
echo            "<label for='email'>Correo Electrónico:</label>";
echo            "<input type='email' id='email' name='email' value='$correo' readonly>";
echo            "<label for='usuario'>Usuario:</label>";
echo            "<input type='text' id='usuario' name='usuario' value='$usuario' readonly>";
echo            "<label for='pass'>Contraseña:</label>";
echo            "<input type='text' id='pass' name='pass' value='$contrasena' readonly>";
echo        "</form>";
echo    "</section>";
echo "</main>";

echo "<footer>";
echo    "<p>&copy; 2024 Smartify. Todos los derechos reservados.</p>";
echo "</footer>";
echo "</body>";
echo "</html>";
?>

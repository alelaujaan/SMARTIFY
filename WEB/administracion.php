<?php
session_start();
include_once("API/api.php");
$conn = conectar();
if (!isset($_SESSION["logeado"])) {
    header("Location: index.php");
} else {
    $logeado = $_SESSION["logeado"];
}

$query1 = mysqli_query($conn, "SELECT * FROM Usuarios WHERE usuario = '$logeado' ");
$filas1 = $query1->fetch_all(MYSQLI_ASSOC);
foreach ($filas1 as $fila) {
    if ($fila["id_usuario"] != 1) {
        header("Location: index.php");
    }
}

$query2 = mysqli_query($conn, "SELECT * FROM Usuarios WHERE id_usuario > 1");
$usuarios = $query2 -> fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración - Smart Home</title>
    <link rel="stylesheet" href="ESTILOS/administracion.css">
    <link rel="shortcut icon" href="FOTOS/icono.png" type="image/x-icon">
</head>

<body>
    <header>
        <h1 style="font-size: 50px; padding-right: 25%;" id="titulo">SMARTIFY - Administración</h1>
        <nav>
            <ul>
                <li><a href="principal.php">Inicio</a></li>
                <li><a href="API/cerrar.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="usuarios">
            <h2>Usuarios</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Acción</th>
                </tr>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?php echo $usuario["id_usuario"]; ?></td>
                        <td><?php echo $usuario["nomusu"]; ?></td>
                        <td><?php echo $usuario["mailusu"]; ?></td>
                        <td><a href="API/eliminar_usuario.php?id=<?php echo $usuario["id_usuario"]; ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </main>

    <footer>
        <p>© 2024 Smart Home. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
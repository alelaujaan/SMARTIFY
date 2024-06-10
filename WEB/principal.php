<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION["logeado"])) {
    header("Location: index.php");
}
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Página Principal - SMARTIFY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="FOTOS/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="ESTILOS/estilo.css">
</head>

<body>
    <header id="logo">
        <img src="FOTOS/icono.png" alt="" style="width: 40%;" id="logoimg">
        <h1 style="font-size: 50px; text-align: center;" id="titulo">SMARTIFY</h1>
        <img src="FOTOS/avatar.png" alt="" id="avatar" onclick="window.location.href = 'perfil.php'">
    </header>
    <a href="exterior.php" id="exterior"></a>
    <a href="interior.php" id="interior"></a>
    <footer>
        <ul>
            <p>&copy; 2024 Smartify. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
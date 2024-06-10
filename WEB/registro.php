<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro - SMARTIFY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="FOTOS/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="ESTILOS/registro.css">
</head>

<body>
    <header>
        <h1 style="font-size: 50px;" id="titulo">SMARTIFY</h1>
        <img src="FOTOS/icono.png" alt="" id="logoimg">
    </header>

    <main>
        <form action="API/registrar.php" method="post">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellidos" placeholder="Apellidos" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="text" name="usuario" placeholder="Nombre de usuario" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <input type="password" name="confirmar_contraseña" placeholder="Confirmar contraseña" required>
            <input type="submit" value="Registrarse">
            <button onclick="window.location.href = 'index.php' ">Ya tengo cuenta</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Smartify. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
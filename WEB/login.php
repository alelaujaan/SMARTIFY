<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login - SMARTIFY</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="shortcut icon" href="FOTOS/icono.png" type="image/x-icon">
    <link rel='stylesheet' type='text/css' media='screen' href='ESTILOS/login.css'>
    <script src='main.js'></script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="FOTOS/icono.png" alt="Logo de la empresa" onclick="window.location.href = 'index.php' ">
        </div>
        <h1>Smartify</h1>
    </header>
    <main>
        <form action="API/api.php" method="post">
            <h2>Iniciar sesión</h2>
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Iniciar sesión</button>
            <button onclick="window.location.href = 'registro.php' ">Registrarse</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Smartify. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control Interior - SMARTIFY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="FOTOS/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="ESTILOS/exterior.css">
</head>
<?php
session_start();
if (!isset($_SESSION["logeado"])) {
    header("Location: index.php");
}
?>

<body>
    <header>
        <h1 style="font-size: 50px; padding-right: 25%;" id="titulo" onclick="window.location.href = 'principal.php' ">SMARTIFY</h1>
        <img src="FOTOS/icono.png" alt="" style="width: 50%;" id="logoimg" onclick="window.location.href = 'principal.php' ">
    </header>
    <main>
        <div class="botones">
            <button onclick="encenderLuz('habitacion1')">Habitación 1</button>
            <button onclick="encenderLuz('habitacion2')">Habitación 2</button>
            <button onclick="encenderLuz('habitacion3')">Habitación 3</button>
            <button onclick="encenderLuz('habitacion4')">Habitación 4</button>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Smartify. Todos los derechos reservados.</p>
    </footer>

    <script>
        function encenderLuz(habitacion) {
            // Aquí iría la lógica para encender la luz de la habitación seleccionada

            if (habitacion == "habitacion1") {
                var newWindow = window.open("http://192.168.0.41/z1");
                setTimeout(() => newWindow.close(), 7);

            } else if (habitacion == "habitacion2") {
                var newWindow = window.open("http://192.168.0.41/z2");
                setTimeout(() => newWindow.close(), 7);

            } else if (habitacion == "habitacion3") {
                var newWindow = window.open("http://192.168.0.41/z3");
                setTimeout(() => newWindow.close(), 7);

            } else if (habitacion == "habitacion4") {
                var newWindow = window.open("http://192.168.0.41/z4");
                setTimeout(() => newWindow.close(), 7);
            }
            console.log("Se ha encendido la luz de la habitación: " + habitacion);
        }
    </script>

</body>

</html>
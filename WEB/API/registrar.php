<?php

include_once("api.php");

$nombre = $_REQUEST["nombre"];
$apellidos = $_REQUEST["apellidos"];
$correo = $_REQUEST["email"];
$usuario = strtoupper($_REQUEST["usuario"]);
$contraseña = $_REQUEST["contraseña"];
$repcontraseña = $_REQUEST["confirmar_contraseña"];

$conn = conectar();

if ($contraseña != $repcontraseña) {
    echo "<script>alert('Las contraseñas no coinciden')</script>";
    header("Refresh:0, url=../index.php");
    exit;
}

$resultado = mysqli_query($conn, "SELECT usuario FROM usuarios");
$filas = $resultado -> fetch_all(MYSQLI_ASSOC);
$registrado = false;
foreach ($filas as $fila) {
    if (strtolower($usuario) == strtolower($fila["usuario"])) {
        $registrado = true;
    }
}

if ($registrado) {
    echo "<script>alert('Ya estas registrado')</script>";
    header("Refresh:5, url=../index.php");
} else {
    $sql = "INSERT INTO usuarios (`nomusu`, `apeusi`, `mailusu`, `usuario`, `contrasena`) VALUES('$nombre','$apellidos','$correo','$usuario','$contraseña')";
    mysqli_query($conn,$sql);
    header("Refresh:0, url = ../index.php");
}
?>
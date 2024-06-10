<?php
session_start();
include_once("api.php");

$conn = conectar();

$id = $_REQUEST["id"];
$nombre = $_REQUEST["nombre"];
$apellidos = $_REQUEST["apellidos"];
$correo = $_REQUEST["email"];
$usuario = $_REQUEST["usuario"];
$contrasena = $_REQUEST["contrasena"];


$query = mysqli_query($conn, "UPDATE USUARIOS SET nomusu = '$nombre', apeusi = '$apellidos', mailusu = '$correo', usuario = '$usuario', contrasena = '$contrasena' WHERE id_usuario = $id");

echo "<script>alert('Datos Modificados con Exito')</script>";
$_SESSION["logeado"] = $usuario;
header("Refresh: 0 , url = ../perfil.php");

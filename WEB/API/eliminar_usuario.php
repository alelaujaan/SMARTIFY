<?php
include_once("api.php");
$id = $_REQUEST["id"];


$conn = conectar();
mysqli_query($conn, "DELETE FROM Usuarios WHERE id_usuario = $id");
header("Location: ../adminstracion.php")

?>
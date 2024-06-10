<?php

function conectar(){
    $conn = new mysqli("localhost","root","","Login",3306);
    return $conn;
}


function verUsuarios($conn){
    $query = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conn,$query);

    $filas = $resultado->fetch_all(MYSQLI_ASSOC);
    foreach ($filas as $fila) {
        echo "\n".$fila["nomusu"]."\n".$fila["apeusi"];
    }
}

function comprobarUsuario($conn){
    session_start();
    $usuario = $_REQUEST["username"];
    $contrasena = $_REQUEST["password"];

    $query = mysqli_query($conn,"SELECT * FROM Usuarios WHERE usuario = '$usuario' ");
    $filas = $query->fetch_all(MYSQLI_ASSOC);

    if(count($filas) == 0){
        echo "<script>alert('El usuario no existe')</script>";
        header("Refresh: 0, url=../index.php");
    }

    

    foreach ($filas as $fila) {
        if (strtolower($usuario) == strtolower($fila["usuario"]) and $contrasena == $fila["contrasena"]) {
            $_SESSION["logeado"] = $usuario;
            header("Location:../principal.php");
        } else {
            echo "<script>alert('Usuario o Contraseña Incorrectas')</script>";
            header("Refresh:0; url=../index.php");
        }
        
    }


}



?>



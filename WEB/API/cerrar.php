<?php
session_start();
session_unset();
unset($_SESSION["logeado"]);
header("Refresh: 0, url=../index.php");
?>
<?php
session_start();

if (isset($_SESSION["usuario"]) && isset($_SESSION["clave"])) {
    $usuario = $_SESSION["usuario"];

    echo "<h2>¡Hola $usuario!</h2>";
} else {
    header("Location: EJ1.php");
    exit();
}
?>

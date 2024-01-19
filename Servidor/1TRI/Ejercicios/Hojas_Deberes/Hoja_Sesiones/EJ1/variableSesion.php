<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["usuario"]) && isset($_POST["clave"])) {
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["clave"] = $_POST["clave"];
        header("Location: bienvenida.php");
        exit();
    }
}
?>

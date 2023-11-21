<?php
session_start();
include("conexionBaseDatos.php");

if (
    isset($_SESSION['nombre'], $_SESSION['email'], $_SESSION['edad'], $_SESSION['telefono'], $_SESSION['comunidadAutonoma'],
        $_SESSION['mensaje'], $_SESSION['publicidad'], $_SESSION['color'], $_SESSION['motivo'])
) {
    // Obtener los datos de la sesión
    $nombre = $_SESSION['nombre'];
    $email = $_SESSION['email'];
    $edad = $_SESSION['edad'];
    $telefono = $_SESSION['telefono'];
    $comunidadAutonoma = $_SESSION['comunidadAutonoma'];
    $mensaje = $_SESSION['mensaje'];
    $publicidad = $_SESSION['publicidad'];
    $color = $_SESSION['color'];
    $motivo = $_SESSION['motivo'];

    // Insertar datos en la base de datos
    $stmt = $mysqli->prepare("INSERT INTO clientes (nombre, email, edad, telefono, comunidad_autonoma, mensaje) VALUES (?, ?, ?, ?, ?, ?)");

    // Vincular parámetros
    $stmt->bind_param("ssisss", $nombre, $email, $edad, $telefono, $comunidadAutonoma, $mensaje);

    // Ejecutar la consulta
    $stmt->execute();

    // Cerrar la sentencia preparada
    $stmt->close();

    // Limpiar las variables de sesión después de la inserción
    unset($_SESSION['nombre']);
    unset($_SESSION['email']);
    unset($_SESSION['edad']);
    unset($_SESSION['telefono']);
    unset($_SESSION['comunidadAutonoma']);
    unset($_SESSION['mensaje']);
    unset($_SESSION['publicidad']);
    unset($_SESSION['color']);
    unset($_SESSION['motivo']);

    // Redirigir a una página de éxito o hacer cualquier otra acción necesaria
    header("Location: hola.php");
    exit();
} else {
    // Si los datos no están presentes en la sesión, redirigir a la página del formulario
    header("Location: paginaWeb.php");
    exit();
}
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("conexionBaseDatos.php");

// Verificar si los datos necesarios están presentes en la sesión
if (
    isset($_SESSION['nombre'], $_SESSION['email'], $_SESSION['edad'], $_SESSION['telefono'], $_SESSION['comunidadAutonoma'],
    $_SESSION['mensaje'], $_SESSION['publicidad'], $_SESSION['color'], $_SESSION['motivo'], $_SESSION['imagenes'])
) {

    // Agregar echos para comprobar las imágenes
    if (isset($_SESSION['imagenes'])) {
        echo 'Imágenes: ' . implode(', ', $_SESSION['imagenes']) . '<br>';
    } else {
        echo 'No se han seleccionado imágenes.<br>';
    }

    // Verificar que la conexión a la base de datos esté establecida
    if (!$mysqli) {
        die("Error de conexión: " . mysqli_connect_error());
    }

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

    // Insertar datos en la tabla clientes
    $stmtClientes = $mysqli->prepare("INSERT INTO clientes (nombre, email, edad, telefono, comunidad_autonoma, mensaje) VALUES (?, ?, ?, ?, ?, ?)");

    // Vincular parámetros
    $stmtClientes->bind_param("ssisss", $nombre, $email, $edad, $telefono, $comunidadAutonoma, $mensaje);

    // Ejecutar la consulta
    if ($stmtClientes->execute()) {
        // Obtener el id generado después de la inserción
        $clienteId = $stmtClientes->insert_id;

        echo "Cliente insertado correctamente con ID: $clienteId<br>";

        $stmtClientes->close();

        // Insertar datos en silla
        $stmtSilla = $mysqli->prepare("INSERT INTO silla (id_cliente, color, motivo) VALUES (?, ?, ?)");

        $stmtSilla->bind_param("iss", $clienteId, $color, $motivo);

        // Ejecutar la consulta
        if ($stmtSilla->execute()) {
            // Obtener el id de la silla recién insertada
            $sillaId = $stmtSilla->insert_id;

            echo "Silla insertada correctamente con ID: $sillaId<br>";

            $stmtSilla->close();

            // Verificar si hay imágenes en la sesión
            if (isset($_SESSION['imagenes'])) {
                // Insertar datos en la tabla imagenes_silla
                foreach ($_SESSION['imagenes'] as $nombreArchivo) {
                    // Insertar datos en la tabla imagenes_silla
                    $stmtImagen = $mysqli->prepare("INSERT INTO imagenes_silla (id_silla, nombre_archivo) VALUES (?, ?)");
                    $stmtImagen->bind_param("is", $sillaId, $nombreArchivo);

                    if ($stmtImagen->execute()) {
                        echo "Imagen '$nombreArchivo' insertada correctamente.<br>";
                    } else {
                        echo "Error al insertar imagen '$nombreArchivo': " . $stmtImagen->error . "<br>";
                    }

                    $stmtImagen->close();
                }
                // Limpiar la variable de sesión de imágenes
                unset($_SESSION['imagenes']);
            } else {
                echo "No se han seleccionado imágenes.<br>";
            }

            // Resto de tu código...

        } else {
            echo "Error al insertar en la tabla silla: " . $stmtSilla->error . "<br>";
        }
    } else {
        echo "Error al insertar en la tabla clientes: " . $stmtClientes->error . "<br>";
    }

    // Cerrar la conexión
    $mysqli->close();

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
    // header("Location: hola.php");
    // exit();
} else {
    // Si los datos no están presentes en la sesión, redirigir a la página del formulario
    // header("Location: paginaWeb.php");
    // exit();
    echo "Faltan datos en la sesión.<br>";
}
?>

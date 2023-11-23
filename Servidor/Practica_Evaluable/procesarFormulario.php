<?php

session_start();
include("conexionBaseDatos.php");

////////////SESIONES
if (
    isset($_SESSION['nombre'], $_SESSION['email'], $_SESSION['edad'], $_SESSION['telefono'], $_SESSION['comunidadAutonoma'],
    $_SESSION['mensaje'], $_SESSION['publicidad'], $_SESSION['color'], $_SESSION['motivo'], $_SESSION['imagenes'])
) {

    if (!$mysqli) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    $nombre = $_SESSION['nombre'];
    $email = $_SESSION['email'];
    $edad = $_SESSION['edad'];
    $telefono = $_SESSION['telefono'];
    $comunidadAutonoma = $_SESSION['comunidadAutonoma'];
    $mensaje = $_SESSION['mensaje'];
    $publicidad = $_SESSION['publicidad'];
    $color = $_SESSION['color'];
    $motivo = $_SESSION['motivo'];


    ////////////CONSULTAS PREPARADAS
    //INSERTAR (clientes)
    $stmtClientes = $mysqli->prepare("INSERT INTO clientes (nombre, email, edad, telefono, comunidad_autonoma, mensaje) VALUES (?, ?, ?, ?, ?, ?)");
    $stmtClientes->bind_param("ssisss", $nombre, $email, $edad, $telefono, $comunidadAutonoma, $mensaje);
    if ($stmtClientes->execute()) {
        $clienteId = $stmtClientes->insert_id;
        $stmtClientes->close();

        //INSERTAR (silla)
        $stmtSilla = $mysqli->prepare("INSERT INTO silla (id_cliente, color, motivo) VALUES (?, ?, ?)");
        $stmtSilla->bind_param("iss", $clienteId, $color, $motivo);
        if ($stmtSilla->execute()) {
            $sillaId = $stmtSilla->insert_id;
            $stmtSilla->close();

            //Comprobar imágenes en la sesión
            if (isset($_SESSION['imagenes'])) {
                //INSERTAR (imagenes_silla)
                $stmtImagen = $mysqli->prepare("INSERT INTO imagenes_silla (id_silla, nombre_archivo) VALUES (?, ?)");

                foreach ($_SESSION['imagenes'] as $nombreArchivo) {
                    // Vincular parámetros y ejecutar la consulta dentro del bucle
                    $stmtImagen->bind_param("is", $sillaId, $nombreArchivo);
                    if ($stmtImagen->execute()) {
                        // Éxito
                    } else {
                        // Manejar errores
                        echo "Error al insertar en la tabla imagenes_silla: " . $stmtImagen->error . "<br>";
                    }
                }

                // Cerrar la consulta preparada fuera del bucle
                $stmtImagen->close();

                // Borrar la sesión de imágenes
                unset($_SESSION['imagenes']);
            }
        } else {
            echo "Error al insertar en la tabla silla: " . $stmtSilla->error . "<br>";
        }
    } else {
        echo "Error al insertar en la tabla clientes: " . $stmtClientes->error . "<br>";
    }
    $mysqli->close();

    //Borrar las sesiones
    unset($_SESSION['nombre']);
    unset($_SESSION['email']);
    unset($_SESSION['edad']);
    unset($_SESSION['telefono']);
    unset($_SESSION['comunidadAutonoma']);
    unset($_SESSION['mensaje']);
    unset($_SESSION['publicidad']);
    unset($_SESSION['color']);
    unset($_SESSION['motivo']);

    header("Location: entradasClientes.php");
    exit();
}
?>
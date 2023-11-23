<?php
include("conexionBaseDatos.php");

if ($stmt = $mysqli->prepare("SELECT nombre, email, edad, telefono, comunidad_autonoma, mensaje FROM clientes")) {
    $stmt->execute();
    $stmt->bind_result($nombre, $email, $edad, $telefono, $comunidad_autonoma, $mensaje);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reseñas Cyberthrone</title>
        <link rel="stylesheet" type="text/css" href="CSSReseñas.css">
    </head>

    <body>
        <div class="mensaje">
            ¡Gracias por su valoración! En esta página puede leer las opiniones que nos escriben nuestros clientes.
            CyberThrone mejora cada día ayudándose de vuestras sugerencias y opiniones constructivas. ¡Esperamos verle
            pronto!
        </div>
        <div class="entradas-container">
            <?php
            while ($stmt->fetch()) {
                echo '<div class="entrada">';
                echo "<strong>Nombre:</strong> $nombre<br>";
                echo "<strong>Email:</strong> $email<br>";
                echo "<strong>Edad:</strong> $edad<br>";
                echo "<strong>Teléfono:</strong> $telefono<br>";
                echo "<strong>Comunidad Autónoma:</strong> $comunidad_autonoma<br>";
                echo "<strong>Mensaje:</strong> $mensaje<br>";
                echo '</div>';
            }
            $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $mysqli->error;
}
?>
    </div>
    <div class="clear"></div>
</body>

</html>
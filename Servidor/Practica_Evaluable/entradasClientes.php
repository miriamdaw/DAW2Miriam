<?php
include("conexionBaseDatos.php");

if ($stmt = $mysqli->prepare("SELECT nombre, email, edad, telefono, comunidadAutonoma, mensaje FROM clientes")) {
    $stmt->execute();
    $stmt->bind_result($nombre, $email, $edad, $telefono, $comunidadAutonoma, $mensaje);
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
            //select * from cliente c join silla s on c.id = s.idCliente join imagenes_silla i on i.id_silla = s.id;
            //SELECT idsilla max - min
        
            include("conexionBaseDatos.php");
            $max;
            $consulta = "SELECT MAX(id) FROM silla";
            if ($stmt = $mysqli->prepare($consulta)) {
                if ($stmt->execute()) {
                    $stmt->bind_result($max);
                    $stmt->fetch();
                    $stmt->free_result();
                    echo "<br>$max<br>";
                }
            }

            $min;
            $consulta = "SELECT MIN(id) FROM silla";
            if ($stmt = $mysqli->prepare($consulta)) {
                if ($stmt->execute()) {
                    $stmt->bind_result($min);
                    $stmt->fetch();
                    $stmt->free_result();
                    echo "$min<br>";
                }
            }

            $dir;
            $max++;
            for ($i = $min; $i <= $max; $i++) {
                $consulta = "SELECT nombre_archivo FROM imagenes_silla WHERE id_silla = $i";
                if ($stmt = $mysqli->prepare($consulta)) {
                    if ($stmt->execute()) {
                        $stmt->bind_result($dir);
                        $stmt->fetch();
                        $stmt->free_result();
                        echo "$dir<br>";
                    }
                }

                
                

            }


    /*
        $consulta1 = $mysqli->prepare("SELECT id_silla, nombre_archivo FROM imagenes_silla JOIN silla ON silla.id = imagenes_silla.id_silla");
        
        
        while ($stmt->fetch()) {
            echo '<div class="entrada">';
            echo "<strong>Nombre:</strong> $nombre<br>";
            echo "<strong>Email:</strong> $email<br>";
            echo "<strong>Edad:</strong> $edad<br>";
            echo "<strong>Teléfono:</strong> $telefono<br>";
            echo "<strong>Comunidad Autónoma:</strong> $comunidadAutonoma<br>";
            echo "<strong>Mensaje:</strong> $mensaje<br>";

            if ($consulta1 = $mysqli->prepare("")) {
            echo '</div>';
        }
        $stmt->close();
} else {
echo "Error en la preparación de la consulta: " . $mysqli->error;
}*/
}
?>
    </div>
    <div class="clear"></div>
</body>

</html>
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
        include("conexionBaseDatos.php");
        if ($stmt = $mysqli->prepare("SELECT nombre, email, edad, telefono, comunidadAutonoma, mensaje FROM clientes")) {
            $stmt->execute();
            $stmt->bind_result($nombre, $email, $edad, $telefono, $comunidadAutonoma, $mensaje);

            //select * from cliente c join silla s on c.id = s.idCliente join imagenes_silla i on i.id_silla = s.id;
            //SELECT idsilla max - min
        
            /*
            $consulta1 = $mysqli->prepare("SELECT id_silla, nombre_archivo FROM imagenes_silla ");
            $consulta1->execute();
            $consulta1->bind_result($id_silla, $nombre_archivo);

            $consulta2 = $mysqli->prepare("SELECT id_cliente, id FROM silla ");
            $consulta2->execute();
            $consulta2->bind_result($id_silla, $nombre_archivo);
            */


            $max;
            $consulta = "SELECT MAX(id) FROM silla";
            if ($consu = $mysqli->prepare($consulta)) {
                if ($consu->execute()) {
                    $consu->bind_result($max);
                    $consu->fetch();
                    $consu->free_result();
                    echo "<br>$max<br>";
                }
            }

            $min;
            $consulta = "SELECT MIN(id) FROM silla";
            if ($consu2 = $mysqli->prepare($consulta)) {
                if ($consu2->execute()) {
                    $consu2->bind_result($min);
                    $consu2->fetch();
                    $consu2->free_result();
                    echo "$min<br>";
                }
            }
            $dir;
            $max++;

            if (isset($dir)) {
                foreach ($dir as $salida) {
                    $fechaFoto = $row['fecha'];
                    $rutaImagen = "Imagenes/" . $salida;
                    if (file_exists($rutaImagen)) {
                        echo '<img class= imagen src="' . $rutaImagen . '" alt="Imagen" >';
                    }
                }
            }
            $consulta1 = $mysqli->prepare("SELECT id_silla, nombre_archivo FROM imagenes_silla JOIN silla ON silla.id = imagenes_silla.id_silla");


            while ($stmt->fetch()) {
                echo '<div class="entrada">';
                echo "<strong>Nombre:</strong> $nombre<br>";
                echo "<strong>Email:</strong> $email<br>";
                echo "<strong>Edad:</strong> $edad<br>";
                echo "<strong>Teléfono:</strong> $telefono<br>";
                echo "<strong>Comunidad Autónoma:</strong> $comunidadAutonoma<br>";
                echo "<strong>Mensaje:</strong> $mensaje<br>";
                for ($i = $min; $i <= $max; $i++) {
                    unset($dir);
                    $consulta = "SELECT nombre_archivo FROM imagenes_silla WHERE id_silla = $i";
                    if ($consu3 = $mysqli->query($consulta)) {

                        while ($row = $consu3->fetch_assoc()) {
                            $dir[] = $row["nombre_archivo"];
                            echo "<br>";
                        }
                        if (isset($dir)) {
                            foreach ($dir as $salida) {
                                $rutaImagen = "Imagenes/" . $salida;
                                if (file_exists($rutaImagen)) {
                                    echo '<img class= imagen src="' . $rutaImagen . '" alt="Imagen" >';
                                }
                            }
                        }
                    }
                }

                if ($consulta1 = $mysqli->prepare("")) {
                    echo '</div>';
                }
                $stmt->close();
            }

        }



        ?>
    </div>
    <div class="clear"></div>
</body>

</html>
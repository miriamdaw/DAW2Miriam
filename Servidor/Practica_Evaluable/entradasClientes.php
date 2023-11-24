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
        echo "antre";

        $consulta = "SELECT nombre, email, edad, telefono, comunidadAutonoma, mensaje, s.id FROM clientes c join silla s on s.idCliente=c.id";
        $result = $mysqli->query($consulta);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $nombre[] = $row['nombre'];
                $email[] = $row['email'];
                $edad[] = $row['edad'];
                $telefono[] = $row['telefono'];
                $comunidadAutonoma[] = $row['comunidadAutonoma'];
                $mensaje[] = $row['mensaje'];
                $id[] = $row['id'];
            }
            foreach ($id as $posicion => $idUsada) {
                echo '<div class="entrada">';
                echo "<strong>Nombre:</strong> $nombre[$posicion]<br>";
                echo "<strong>Email:</strong> $email[$posicion]<br>";
                echo "<strong>Edad:</strong> $edad[$posicion]<br>";
                echo "<strong>Teléfono:</strong> $telefono[$posicion]<br>";
                echo "<strong>Comunidad Autónoma:</strong> $comunidadAutonoma[$posicion]<br>";
                echo "<strong>Mensaje:</strong> $mensaje[$posicion]<br>";
                unset($dir);
                $consulta = "SELECT nombre_archivo FROM imagenes_silla WHERE id_silla = $idUsada";
                if ($consu3 = $mysqli->query($consulta)) {

                    while ($row = $consu3->fetch_assoc()) {
                        $dir[] = $row["nombre_archivo"];
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
                echo "</div>";
            }
        }
        ?>
    </div>
    <div class="clear"></div>
</body>

</html>
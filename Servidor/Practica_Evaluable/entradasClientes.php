<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas Cyberthrone</title>
    <link rel="stylesheet" type="text/css" href="CSSReseñas.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800,900" rel="stylesheet">
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

        $consulta = "SELECT nombre, email, edad, telefono, comunidadAutonoma, mensaje, valoracion, fecha_compra, s.id FROM clientes c join silla s on s.idCliente=c.id";
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
                $valoracion[] = $row['valoracion'];
                $fecha_compra[] = $row['fecha_compra'];
                
            }
            foreach ($id as $posicion => $idUsada) {
                echo '<div class="entrada">';
                echo "<strong class='nombre'>$nombre[$posicion]</strong><br>";
                echo "$edad[$posicion] años&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "📍&nbsp;$comunidadAutonoma[$posicion]<br>";


                echo '<hr class="separador">';


                echo "<strong>$valoracion[$posicion]</strong><br>";

                echo "$mensaje[$posicion]<br>";
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
                echo "<p class='letras'>Fecha de compra: $fecha_compra[$posicion]</p>";
                echo '<hr class="separador">';
                echo "Correo electrónico: $email[$posicion]<br>";
                echo "Teléfono: $telefono[$posicion]<br>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <div class="clear"></div>
</body>

</html>
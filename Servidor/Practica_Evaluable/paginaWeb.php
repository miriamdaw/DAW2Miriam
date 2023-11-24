<?php
session_start();
include("validar.php");
include("conexionBaseDatos.php");

//Borrar la sesión de imagen para que no se solape con la siguiente
if (isset($_FILES["fichero"]) && empty($_FILES["fichero"]["name"][0])) {
    unset($_SESSION['imagenes']);
}


//Declaración de variables
$nombre = $edad = $email = $telefono = $comunidadAutonoma = $satisfecho = $mensaje = $publicidad = $fechaCompra = $color = $motivo = $valoracion = "";

$nombreError = $edadError = $emailError = $telefonoError = $comunidadAutonomaError = $satisfechoError
    = $mensajeError = $publicidadError = $colorError = $motivoError = $fechaError = "";

$errores = [];


////////////DATOS
//Comprobar que se han introducido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"])) {
        $errores['nombre'] = "Indique su nombre.";
    } else {
        $nombre = $_POST["nombre"];
    }

    if (empty($_POST["edad"])) {
        $errores['edad'] = "Indique su edad.";
    } else {
        $edad = $_POST["edad"];
    }

    if (empty($_POST["email"])) {
        $errores['email'] = "Indique su email.";
    } else {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "El formato del email no es válido.";
        }
    }

    if (empty($_POST["telefono"])) {
        $errores['telefono'] = "Indique su teléfono.";
    } else {
        $telefono = $_POST["telefono"];
    }

    if (!isset($_POST["comunidadAutonoma"])) {
        $errores['comunidadAutonoma'] = "Debe indicar la comunidad autónoma en la que vive.";
    } else {
        $comunidadAutonoma = $_POST["comunidadAutonoma"];
    }

    if (empty($_POST["mensaje"])) {
        $errores['mensaje'] = "Indique qué busca en una silla gaming.";
    } else {
        $mensaje = $_POST["mensaje"];
    }

    if (isset($_POST['publicidad'])) {
        $publicidad = $_POST['publicidad'];
    } else {
        $publicidad = 0;
    }

    if (empty($_POST["fechaCompra"])) {
        $errores['fechaCompra'] = "Indique la fecha de compra.";
    } else {
        $fechaCompra = $_POST["fechaCompra"];
    }

    if (!empty($_POST['color'])) {
        $color = $_POST['color'];
    } else {
        $colorError = "Seleccione un color para su silla.";
    }

    if (isset($_POST['motivo'])) {
        $motivo = $_POST['motivo'];
    } else {
        $motivo = "Por determinar";
    }

    if (isset($_POST['slider_value'])) {
        $sliderValue = $_POST['slider_value'];

        switch ($sliderValue) {
            case '1':
                $valoracion = 'No Satisfecho';
                break;
            case '2':
                $valoracion = 'Neutral';
                break;
            case '3':
                $valoracion = 'Satisfecho';
                break;
        }
    } else {
        $valoracion = 'Neutral';
    }

    ////////////IMÁGENES
    if (isset($_FILES["fichero"]) && !empty($_FILES["fichero"]["name"][0])) {

        $numArchivos = count($_FILES["fichero"]["name"]);
        $imagenes = [];

        for ($i = 0; $i < $numArchivos; $i++) {
            $nombreArchivo = $_FILES["fichero"]["name"][$i];
            $tipoArchivo = $_FILES["fichero"]["type"][$i];
            $tamanoArchivo = $_FILES["fichero"]["size"][$i];
            $rutaTemporal = $_FILES["fichero"]["tmp_name"][$i];

            $directorioDestino = "Imagenes/";

            $rutaDestino = $directorioDestino . $nombreArchivo;

            //Solo se permite estas extensiones y hasta este tamaño
            $extensionesPermitidas = array("jpg", "jpeg", "png");
            $tamanoMaximo = 5 * 1024 * 1024; // 5 MB

            //validar las IMÁGENES
            $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

            if (!in_array($extension, $extensionesPermitidas)) {
                $errores[] = "Error: El archivo '$nombreArchivo' tiene una extensión no permitida. Por favor, sube archivos JPG o PNG.";
                continue;
            }

            if ($tamanoArchivo > $tamanoMaximo) {
                $errores[] = "Error: El archivo '$nombreArchivo' excede el tamaño máximo permitido (5 MB).";
                // Continuar al siguiente archivo
                continue;
            }

            if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                $imagenes[] = $nombreArchivo;
            } else {
                $errores[] = "Error al subir el archivo '$nombreArchivo'.";
            }
        }

    } else {
        $errores[] = "Error: No se han seleccionado imágenes.";
    }

    //VALIDAR los DATOS
    $errores = validar($nombre, $edad, $email, $telefono, $mensaje);

    if (!empty($errores)) {

    } else {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $email;
        $_SESSION['edad'] = $edad;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['comunidadAutonoma'] = $comunidadAutonoma;
        $_SESSION['mensaje'] = $mensaje;
        $_SESSION['publicidad'] = $publicidad;
        $_SESSION['color'] = $color;
        $_SESSION['motivo'] = $motivo;
        $_SESSION['imagenes'] = $imagenes;
        $_SESSION['valoracion'] = $valoracion;
        $_SESSION['fechaCompra'] = $fechaCompra;


        //Agregar echos para comprobar las variables
        echo 'Nombre: ' . $_SESSION['nombre'] . '<br>';
        echo 'Email: ' . $_SESSION['email'] . '<br>';
        echo 'Edad: ' . $_SESSION['edad'] . '<br>';
        echo 'Teléfono: ' . $_SESSION['telefono'] . '<br>';
        echo 'Comunidad Autónoma: ' . $_SESSION['comunidadAutonoma'] . '<br>';
        echo 'Mensaje: ' . $_SESSION['mensaje'] . '<br>';
        echo 'Publicidad: ' . $_SESSION['publicidad'] . '<br>';
        echo 'Color: ' . $_SESSION['color'] . '<br>';
        echo 'Motivo: ' . $_SESSION['motivo'] . '<br>';
        echo 'valoracion: ' . $_SESSION['valoracion'] . '<br>';
        echo 'fecha: ' . $_SESSION['fechaCompra'] . '<br>';
        // Agregar echos para comprobar las imágenes
        if (isset($_SESSION['imagenes'])) {
            echo 'Imágenes: ' . implode(', ', $_SESSION['imagenes']) . '<br>';
        } else {
            echo 'No se han seleccionado imágenes.<br>';
        }



        header("Location: procesarFormulario.php");
        exit();

    }
}

?>

<!DOCTYPE html>
<html lang="es">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,800,900" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugerencias cyberthrone: Sillas Gaming 3000</title>
    <link rel="stylesheet" type="text/css" href="CSSpaginaWeb.css">
    <script src="script.js"></script>

</head>

<body>
    <center><img src="IconoLetrasBorde.png" /></center>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">

        <h3> Sugerencias para CyberThrone </h3>

        <img src="silla (1).png" class="silla" alt="imagen_silla">
        <div id="parrafoJustificado">
            <p>
                ¡Bienvenido! En CyberThrone valoramos tu opinión. Si ya has recibido tu silla, nos encantaría conocer tu
                experiencia. Tu retroalimentación es fundamental para nosotros.
            </p>
        </div>

        <div class="linea"></div>

        <h2> Información sobre ti </h2>


        <div class="form">

            <div class="grupo">
                <label for="nombre" class="">Nombre</label>
                <input onfocus="onFocusInput(this)" onblur="onBlurInput(this)" value="<?php if (isset($_POST["nombre"]))
                    echo $_POST["nombre"]; ?>" id="nombre" name="nombre" type="text" required>
                <span class="error-message">
                    <?php echo isset($errores['nombre']) ? $errores['nombre'] : ''; ?>
                </span>
                <span class="barra"></span>
            </div>

            <div class="grupo">
                <label for="edad" class="">Edad</label>
                <input onfocus="onFocusInput(this)" onblur="onBlurInput(this)" value="<?php if (isset($_POST["edad"]))
                    echo $_POST["edad"]; ?>" id="edad" name="edad" type="text" required>
                <span class="barra"></span>
                <span class="error-message">
                    <?php echo isset($errores['edad']) ? $errores['edad'] : ''; ?>
                </span>
            </div>

            <div class="grupo">
                <label for="email" class="">Email</label>
                <input onfocus="onFocusInput(this)" onblur="onBlurInput(this)" value="<?php if (isset($_POST["email"]))
                    echo $_POST["email"]; ?>" id="email" name="email" type="text" required>
                <span class="barra"></span>
                <span class="error-message">
                    <?php echo isset($errores['email']) ? $errores['email'] : ''; ?>
                </span>
            </div>

            <div class="grupo">
                <label for="telefono" class="">Teléfono</label>
                <input onfocus="onFocusInput(this)" onblur="onBlurInput(this)" value="<?php if (isset($_POST["telefono"]))
                    echo $_POST["telefono"]; ?>" id="telefono" name="telefono" type="text" required>
                <span class="barra"></span>
                <span class="telefono">
                    <?php echo isset($errores['telefono']) ? $errores['telefono'] : ''; ?>
                </span>
            </div>

            <div class="grupo">
                <p class="parrafos"> Indica tu comunidad autónoma </p>
                <select name="comunidadAutonoma" id="comunidadAutonoma" size="18" required>
                    <option value="Andalucía" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Andalucía")
                        echo "selected"; ?>>Andalucía
                    </option>
                    <option value="Aragón" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Aragón")
                        echo "selected"; ?>>Aragón
                    </option>
                    <option value="Asturias" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Asturias")
                        echo "selected"; ?>>Asturias
                    </option>
                    <option value="Canarias" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Canarias")
                        echo "selected"; ?>>Canarias
                    </option>
                    <option value="Cantabria" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Cantabria")
                        echo "selected"; ?>>Cantabria
                    </option>
                    <option value="Castilla y León" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Castilla y León")
                        echo "selected"; ?>>Castilla y León
                    </option>
                    <option value="Castilla-La Mancha" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Castilla-La Mancha")
                        echo "selected"; ?>>Castilla-La Mancha
                    </option>
                    <option value="Cataluña" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Cataluña")
                        echo "selected"; ?>>Cataluña
                    </option>
                    <option value="Comunidad de Madrid" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Comunidad de Madrid")
                        echo "selected"; ?>>Comunidad de Madrid
                    </option>
                    <option value="Comunidad Foral de Navarra" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Comunidad Foral de Navarra")
                        echo "selected"; ?>>Comunidad Foral de
                        Navarra
                    </option>
                    <option value="Comunidad Valenciana" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Comunidad Valenciana")
                        echo "selected"; ?>>Comunidad Valenciana
                    </option>
                    <option value="Extremadura" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Extremadura")
                        echo "selected"; ?>>Extremadura
                    </option>
                    <option value="Galicia" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Galicia")
                        echo "selected"; ?>>Galicia
                    </option>
                    <option value="Islas Baleares" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Islas Baleares")
                        echo "selected"; ?>>Islas Baleares
                    </option>
                    <option value="La Rioja" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "La Rioja")
                        echo "selected"; ?>>La Rioja
                    </option>
                    <option value="Murcia" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "Murcia")
                        echo "selected"; ?>>Murcia
                    </option>
                    <option value="País Vasco" <?php if (isset($comunidadAutonoma) && $comunidadAutonoma === "País Vasco")
                        echo "selected"; ?>>País Vasco
                    </option>
                </select>
                <span class="error">
                    <?php echo isset($errores['comunidadAutonoma']) ? $errores['comunidadAutonoma'] : ''; ?>
                </span>
            </div>

            <div class="linea"></div>

            <h2> Información sobre tu silla </h2>


            <div class="opcionesSilla">
                <p class="parrafos">¿Qué te animó a comprar en CyberThrone?</p>

                <input type="radio" id="oficina" name="motivo" value="Oficina" <?php if (isset($_POST['motivo']) && $_POST['motivo'] == 'Oficina')
                    echo 'checked="checked"'; ?>>
                <p class="radio-label">Oficina</p>
                <input type="radio" id="videojuegos" name="motivo" value="Videojuegos" <?php if (isset($_POST['motivo']) && $_POST['motivo'] == 'Videojuegos')
                    echo 'checked="checked"'; ?>>
                <p class="radio-label">Videojuegos</p>
                <input type="radio" id="deporte" name="motivo" value="Deporte" <?php if (isset($_POST['motivo']) && $_POST['motivo'] == 'Deporte')
                    echo 'checked="checked"'; ?>>
                <p class="radio-label">Deporte</p>
            </div>

            <div class="grupo">
                <label for="fechaCompra" class="">Fecha de Compra</label>
                <br>
                <input value="<?php echo isset($_POST['fechaCompra']) ? $_POST['fechaCompra'] : ''; ?>" id="fechaCompra"
                    name="fechaCompra" type="date" required>
                <span class="barra"></span>
                <span class="error-message">
                    <?php echo isset($errores['fechaCompra']) ? $errores['fechaCompra'] : ''; ?>
                </span>
            </div>


            <div class="grupo">
                <p class="parrafos">¿De qué color es tu silla?</p>
                <input type="color" id="color" name="color" value="#f479ad">
                <span class="error">
                    <?php echo isset($errores['color']) ? $errores['color'] : ''; ?>
                </span>
            </div>

            <center>
                <p class="parrafos">Suba imágenes de su silla</p>
            </center>
            <input type="file" name="fichero[]" id="fichero" accept=".jpg, .jpeg, .png" multiple />


            <div class="slider-container">
                <br>
                <p class="parrafos">Valora tu experiencia reciente</p>
                <input type="range" id="slider" name="slider_value" min="1" max="3" step="1"
                    value="<?php echo isset($_POST['slider_value']) ? $_POST['slider_value'] : '2'; ?>">
                <div class="slider-labels">
                    <span class="colorValoracion">No Satisfecho</span>
                    <span class="colorValoracion">Neutral</span>
                    <span class="colorValoracion">Satisfecho</span>
                </div>
            </div>


            <div class="grupo">
                <textarea name="mensaje" id="mensaje" rows="3" required onfocus="onFocusInput(this)"
                    onblur="onBlurInput(this)"><?php echo isset($_POST["mensaje"]) ? htmlspecialchars($_POST["mensaje"]) : ""; ?></textarea>
                <span class="barra"></span>
                <label id="mensajeLabel">Mensaje</label>
                <span class="error">
                    <?php echo isset($errores['mensaje']) ? $errores['mensaje'] : ''; ?>
                </span>


            </div>

            <center>
                <p class="publicidad">Quiero recibir publicidad</p>
            </center>
            <div class="heart-container" title="Like">
                <input type="checkbox" class="checkbox" id="Give-It-An-Id" name="publicidad" value="1" <?php if (isset($_POST['publicidad']) && $_POST['publicidad'] == '1')
                    echo 'checked'; ?>>
                <div class="svg-container">
                    <svg viewBox="0 0 24 24" class="svg-outline" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z">
                        </path>
                    </svg>
                    <svg viewBox="0 0 24 24" class="svg-filled" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z">
                        </path>
                    </svg>
                    <svg class="svg-celebrate" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="10,10 20,20"></polygon>
                        <polygon points="10,50 20,50"></polygon>
                        <polygon points="20,80 30,70"></polygon>
                        <polygon points="90,10 80,20"></polygon>
                        <polygon points="90,50 80,50"></polygon>
                        <polygon points="80,80 70,70"></polygon>
                    </svg>
                </div>
            </div>

            <input type="submit">
        </div>
    </form>
</body>

</html>
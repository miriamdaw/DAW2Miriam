<?php
session_start();
include("validar.php");
include("baseDatos.php");

$nombreError = $emailError = $edadError = $mensajeError = $telefonoError = $comunidadAutonomaError = "";
$nombre = $email = $edad = $mensaje = $telefono = $comunidadAutonoma = "";

error_reporting(E_ERROR | E_PARSE);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"])) {
        $nombreError = "Indique su nombre.";
    } else {
        $nombre = $_POST["nombre"];
    }

    if (empty($_POST["edad"])) {
        $edadError = "Indique su edad.";
    } else {
        $edad = $_POST["edad"];
    }

    if (empty($_POST["telefono"])) {
        $telefonoError = "Indique su teléfono.";
    } else {
        $telefono = $_POST["telefono"];
    }

    if (empty($_POST["email"])) {
        $emailError = "Indique su email.";
    } else {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "El formato del email no es válido.";
        }
    }

    if (empty($_POST["mensaje"])) {
        $mensajeError = "Indique qué busca en una silla gaming.";
    } else {
        $mensaje = $_POST["mensaje"];
    }

    if (!isset($_POST["comunidadAutonoma"])) {
        $comunidadAutonomaError = "Debe indicar la comunidad autónoma en la que vive.";
    } else {
        $comunidadAutonoma = $_POST["comunidadAutonoma"];
    }

    $validando = validar($nombre, $email, $telefono, $mensaje);

    if (!empty($validando)) {
        echo '<div class="error-container">';
        foreach ($validando as $error) {
            echo '<p class="error-message">Error: ' . $error . '</p>';
        }
        echo '</div>';

    } else {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $email;
        $_SESSION['edad'] = $edad;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['comunidadAutonoma'] = $comunidadAutonoma;
        $_SESSION['mensaje'] = $mensaje;

        header("Location: hola.php");
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
    <script>
        function onFocusInput(element) {
            var label = element.previousElementSibling; // Obtener el elemento label anterior al input
            label.style.top = "-14px";
            label.style.fontSize = "12px";
            label.style.color = "#F479AD";
        }

        function onBlurInput(element) {
            if (element.value === "") {
                var label = element.previousElementSibling;
                label.style.top = "10px";
                label.style.fontSize = "16px";
                label.style.color = "var(--colorTextos)";
            }
        }
    </script>
    <style>
        label#mensajeLabel {
            color: #F479AD;
        }

        textarea:focus~label#mensajeLabel {
            color: #F479AD;
        }

        textarea {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(to left, #7048C7, #783DAC);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        :root {
            --colorTextos: #49454567;
        }

        *,
        ::before,
        ::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .silla {
            float: left;
            margin-top: 40px;
            margin-left: 20px;
            width: 30%;
        }

        .linea {
            border-top: 1px solid #F479AD;
            height: 2px;
            width: 90%;
            padding: 0;
            margin: 35px auto 0 auto;
            margin-bottom: 35px;
            opacity: 50%;

        }

        .espacio {
            height: 250px;
        }

        img {
            margin-top: 30px;
            margin-bottom: 5px;
            width: 30%;
        }

        h3 {
            text-align: center;
            color: #F479AD;
            font-size: 180%;
            font-weight: bold;
            margin-top: 15px;
        }

        h2 {
            color: #F479AD;
            font-size: 150%;
            font-weight: bold;
            text-align: left;
            margin-left: 35px;
            margin-bottom: 50px;
        }


        form {
            margin-top: 20px;
            border-radius: 24px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 20px rgba(244, 121, 173, 1);
            width: 40%;
        }

        form .grupo {
            position: relative;
            margin: 45px;
        }

        input,
        textarea,
        select {
            background: none;
            color: #c6c6c6;
            font-size: 18px;
            padding: 10px 10px 10px 5px;
            display: block;
            width: 100%;
            border: none;
            border-bottom: 1px solid var(--colorTextos);
            resize: none;
            padding: 10px 10px 10px 15px;
        }

        input:focus,
        textarea:focus {
            outline: none;
            color: rgb(94, 93, 93);
        }

        input:focus~label,
        input:valid~label,
        textarea:focus~label,
        textarea:valid~label {
            position: absolute;
            top: -14px;
            font-size: 12px;
            color: #2196F3;
        }

        label {
            color: var(--colorTextos);
            font-size: 16px;
            position: absolute;
            left: 5px;
            top: 10px;
            transition: 0.5s ease all;
            pointer-events: none;
        }

        input:focus~.barra::before,
        textarea:focus~.barra::before {
            width: 100%;
        }

        .barra {
            position: relative;
            display: block;
            width: 100%;
        }

        .barra::before {
            content: '';
            height: 2px;
            width: 0%;
            bottom: 0;
            position: absolute;
            background: linear-gradient(to left, #7048C7, #783DAC);
            transition: 0.3s ease all;
            left: 0%;
        }


        select {
            width: 100%;
            font-family: 'Poppins', sans-serif;
            font-size: 17px;
        }

        select:focus {
            outline: none;
            border: 2px solid #F479AD;
            border-radius: 10px;
        }

        input[type="submit"] {
            display: block;
            width: 100px;
            height: 40px;
            border: none;
            color: #f479ad;
            background-color: #fadef7;
            border-radius: 5px;
            font-size: 16px;
            margin: 10px auto;
            cursor: pointer;
            padding: 10px 20px;
        }

        select,
        input[type="file"] {
            border: 1px solid var(--colorTextos);
            border-radius: 5px;
        }

        select:focus,
        input[type="file"]:focus {
            outline: none;
            border: 2px solid #F479AD;
            border-radius: 10px;
        }

        .slider {
            -webkit-appearance: none;
            width: 70%;
            height: 26px;
            background: #fcd8e7;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
            margin: auto;

        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: #F479AD;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            background: #F479AD;
            cursor: pointer;
        }

        .nuevos {
            text-align: center;
        }

        .satisfecho {
            text-align: right;
        }

        .noSatisfecho {
            text-align: left;
        }
    </style>
</head>

<body>
    <center><img src="IconoLetrasBorde.png" /></center>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <h3> Sugerencias para CyberThrone </h3>

        <img src="silla (1).png" class="silla" alt="imagen_silla">
        <div class="espacio"></div>
        <div class="linea"></div>

        <h2> Información del cliente </h2>

        <div class="form">
            <div class="grupo">
                <label for="nombre" class="">Nombre</label>
                <input onfocus="onFocusInput(this)" onblur="onBlurInput(this)" value="<?php if (isset($_POST["nombre"]))
                    echo $_POST["nombre"]; ?>" id="nombre" name="nombre" type="text" required>
                <span class="error">
                    <?php echo $nombreError; ?>
                </span>
                <span class="barra"></span>
            </div>

            <div class="grupo">
                <label for="email" class="">Email</label>
                <input onfocus="onFocusInput(this)" onblur="onBlurInput(this)" value="<?php if (isset($_POST["email"]))
                    echo $_POST["email"]; ?>" id="email" name="email" type="text" required>
                <span class="error">
                    <?php echo $emailError; ?>
                </span>
                <span class="barra"></span>
            </div>

            <div class="grupo">
                <label for="edad" class="">Edad</label>
                <input onfocus="onFocusInput(this)" onblur="onBlurInput(this)" value="<?php if (isset($_POST["edad"]))
                    echo $_POST["edad"]; ?>" id="edad" name="edad" type="text" required>
                <span class="error">
                    <?php echo $edadError; ?>
                </span>
                <span class="barra"></span>
            </div>


            <!-- TODO 
            AÑADIR INPUTS
            Slider
            Checkbox
            Radio
            Color picker
            -->



            <div class="grupo">
                <label for="telefono" class="">Teléfono</label>
                <input onfocus="onFocusInput(this)" onblur="onBlurInput(this)" value="<?php if (isset($_POST["telefono"]))
                    echo $_POST["telefono"]; ?>" id="telefono" name="telefono" type="text" required>
                <span class="telefono">
                    <?php echo $telefonoError; ?>
                </span>
                <span class="barra"></span>
            </div>

            <div class="grupo">
                <p> Indica tu comunidad autónoma </p>
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
                    <?php echo $comunidadAutonomaError; ?>
                </span>
            </div>



            <div class="nuevos">
                <p>Por favor, valore el servicio recibido y nuestra página web</p>
                <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                <p class="noSatisfecho">No satisfecho</p>
                <p class="satisfecho">Satisfecho</p>
            </div>







            <div class="grupo">
                <textarea name="mensaje" id="mensaje" rows="3" required onfocus="onFocusInput(this)"
                    onblur="onBlurInput(this)"><?php echo isset($_POST["mensaje"]) ? htmlspecialchars($_POST["mensaje"]) : ""; ?></textarea>
                <span class="barra"></span>
                <label id="mensajeLabel">Mensaje</label>
            </div>


            <input type="submit">
        </div>
    </form>
</body>

</html>
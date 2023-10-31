<?php
include("validar.php");
$duenioError = $nombreMascotaError = $descripcionError = $tipoMascotaError = "";
error_reporting(E_ERROR | E_PARSE);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["duenio"])) {
        $duenioError = "¡Indica tu nombre!";
    }

    if (empty($_POST["nombreMascota"])) {
        $nombreMascotaError = "¡Indica el nombre de tu mascota!";
    }

    if (empty($_POST["descripcion"])) {
        $descripcionError = "Escribe una descripción sobre tu mascota: cómo llegó a tu vida, alguna anécdota, por qué le pusiste ese nombre...";
    }

    if (!isset($_POST["tipoMascota"])) {
        $tipoMascotaError = "Debes indicar qué tipo de animal es tu mascota.";
    }

    $duenio = $_POST["duenio"];
    $descripcion = $_POST["descripcion"];
    $validando = validar($duenio, $descripcion);

    if (!empty($errors)) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $color = $_POST["color"];
        $publicidad = $_POST["publicidad"];
        $anio = $_POST["anio"];
        $ciudades = $_POST["ciudades"];
        $telefono = $_POST["telefono"];

    } else {

        if ($validando === true) {
            header("Location: hola.php");
            exit();
        } else {
            foreach ($validando as $error) {
                echo "Error: " . $error . "<br>";
            }
        }
    }
}
//required
/*

https://colorpalette.imageonline.co/es/
https://www.jotform.com/build/233032800000331#preview
        .formcontainer {
        text-align: left;
        margin: 24px 50px 12px;
         }

        .container {
        padding: 16px 0;
        text-align:left;
        }
        */
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MascoDAW</title>
    <style>
        body {
            font-family: Arial;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        form {
            margin-bottom: 100px;
            margin-left: 620px;
            margin-right: 620px;
            border-radius: 24px;
            background-color:#7048C7;
            padding: 8px;

        }

        img {
            margin-top: 50px;
            margin-bottom: 5px;
            width: 20%;

        }

        center {
            text-align: center;
        }


        h3 {
            color: #998ee4;
            font-size: 170%;
            font-weight: bold;
        }

        p {
            color: #608334;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
            color: #5534ad;
        }

        input[type="text"] {
            width: 20%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #A8CA7E;
            border-radius: 5px;
            outline-color: #608334;
            background-color: #F6F6DB;
            color: #608334;
        }

        select {
            width: 80%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #A8CA7E;
            border-radius: 5px;
            background-color: #F6F6DB;
            outline-color: #608334;
            color: #608334;
            cursor: pointer;
        }

        input[type="file"] {
            width: 100%;
            margin: 10px 0;
            color: #608334;

        }

        input[type="submit"] {
            background-color: #F6F6DB;
            color: #608334;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        select:hover {
            background-color: #ECEBC9;
        }

        select option {
            color: #A7D489;
        }

        select option:hover {
            background-color: #608334;
        }

        input[type="submit"]:hover {
            background-color: #A7D489;
        }
    </style>

</head>

<body>
    <center><img src="IconoLetras.png" /></center>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <center>
            <h3> Centro de Sugerencias para CyberThrone </h3>
            <label for="duenio"> ¿Cómo te llamas? </label>
            <input value="<?php if (isset($_POST["duenio"])) echo $_POST["duenio"]; ?>" id="duenio" name="duenio" type="text">
            <span class="error"><?php echo $duenioError; ?></span>

            <label for="nombreMascota"> ¿Cómo se llama tu mascota? </label>
            <input value="<?php if (isset($_POST["nombreMascota"])) echo $_POST["nombreMascota"]; ?>" id="nombreMascota" name="nombreMascota" type="text">
            <br><br>
            <span class="error"><?php echo $nombreMascotaError; ?></span>

            <h3> Tu mascota: </h3>
            <label for="descripcion"> ¡Cuéntanos algo sobre tu mascota! </label>
            <input value="<?php if (isset($_POST["descripcion"])) echo $_POST["descripcion"]; ?>" id="descripcion" name="descripcion" type="text">
            <span class="error"><?php echo $descripcionError; ?></span>

            <label for="tipoMascota"> Indica qué tipo de animal es tu mascota: </label>
            <select name="tipoMascota" id="tipoMascota" size="7">
                <option value="Gato" <?php if (isset($tipoMascota) && $tipoMascota === "Gato") echo "selected"; ?>>Gato</option>
                <option value="Perro" <?php if (isset($tipoMascota) && $tipoMascota === "Perro") echo "selected"; ?>>Perro</option>
                <option value="Tortuga" <?php if (isset($tipoMascota) && $tipoMascota === "Tortuga") echo "selected"; ?>>Tortuga</option>
                <option value="Pajaro" <?php if (isset($tipoMascota) && $tipoMascota === "Pajaro") echo "selected"; ?>>Pajaro</option>
                <option value="Conejo" <?php if (isset($tipoMascota) && $tipoMascota === "Conejo") echo "selected"; ?>>Conejo</option>
                <option value="Pez" <?php if (isset($tipoMascota) && $tipoMascota === "Pez") echo "selected"; ?>>Pez</option>
            </select>
            <span class="error"><?php echo $tipoMascotaError; ?></span>

            <br><br> <br><br>
            <input type="file" name="fichero" accept=".jpg, .jpeg, .png" />

            <br><br> <br><br>
            <center><input type="submit"></center>

        </center>
    </form>
</body>

</html>
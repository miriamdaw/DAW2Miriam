<?php
require_once 'bd_tienda.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["correo"])) {
        echo "Indique su correo.";
    } else {
        $nombre = $_POST["correo"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["clave"])) {
            echo "Indique su clave.";
        } else {
            $nombre = $_POST["clave"];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["pais"])) {
            echo "Indique su pais.";
        } else {
            $nombre = $_POST["pais"];
        }
    }

    if (empty($_POST["cp"])) {
        echo "Indique su cp.";
    } else {
        $nombre = $_POST["cp"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["ciudad"])) {
            echo "Indique su ciudad.";
        } else {
            $nombre = $_POST["ciudad"];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["direccion"])) {
            echo "Indique su direccion.";
        } else {
            $nombre = $_POST["direccion"];
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulario de registro</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php if (isset($_GET["redirigido"])) {
        echo "<p>Inserte sus datos para continuar</p>";
    } ?>
    <?php if (isset($err) and $err == true) {
        echo "<p> Revise usuario y contraseña</p>";
    } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="usuario">Correo</label>
        <input value="<?php if (isset($correo))
            echo $correo; ?>" id="correo" name="correo" type="text">
        <label for="clave">Clave</label>
        <input value="<?php if (isset($clave))
            echo $clave; ?>" id="clave" name="clave" type="password">
        <br><br><br>
        <label for="usuario">Pais</label>
        <input value="<?php if (isset($pais))
            echo $clave; ?>" id="pais" name="pais" type="text">
        <label for="clave">CP</label>
        <input value="<?php if (isset($cp))
            echo $cp; ?>" id="cp" name="cp" type="text">
        <label for="usuario">Ciudad</label>
        <input value="<?php if (isset($ciudad))
            echo $ciudad; ?>" id="ciudad" name="ciudad" type="text">
        <label for="clave">Direccion</label>
        <input value="<?php if (isset($direccion))
            echo $direccion; ?>" id="direccion" name="direccion" type="text">
        <br><br><br>
        <input type="submit">
        <br><br><br>
        <a href="login.php">¿Ya tiene su restaurante registrado? Haz click aquí para entrar</a>
    </form>
</body>

</html>
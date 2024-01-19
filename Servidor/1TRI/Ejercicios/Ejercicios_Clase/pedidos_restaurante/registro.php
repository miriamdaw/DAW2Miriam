<?php
session_start();
require_once 'bd_tienda.php';

$errores = [];
$correo = $clave = $pais = $cp = $ciudad = $direccion = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["correo"])) {
        $errores[] = "Indique su correo.";
    } else {
        $correo = $_POST["correo"];
    }

    if (empty($_POST["clave"])) {
        $errores[] = "Indique su clave.";
    } else {
        $clave = $_POST["clave"];
    }

    if (empty($_POST["pais"])) {
        $errores[] = "Indique su pais.";
    } else {
        $pais = $_POST["pais"];
    }

    if (empty($_POST["cp"])) {
        $errores[] = "Indique su cp.";
    } else {
        $cp = $_POST["cp"];
    }

    if (empty($_POST["ciudad"])) {
        $errores[] = "Indique su ciudad.";
    } else {
        $ciudad = $_POST["ciudad"];
    }

    if (empty($_POST["direccion"])) {
        $errores[] = "Indique su direccion.";
    } else {
        $direccion = $_POST["direccion"];
    }

    if (!empty($errores)) {

    } else {
        $_SESSION['correo'] = $correo;
        $_SESSION['clave'] = $clave;
        $_SESSION['pais'] = $pais;
        $_SESSION['cp'] = $cp;
        $_SESSION['ciudad'] = $ciudad;
        $_SESSION['direccion'] = $direccion;

        header("Location: login.php");
        exit();
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
    <?php if (isset($errores) && !empty($errores)) {
        foreach ($errores as $error) {
            echo "<p>$error</p>";
        }
    } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="correo">Correo</label>
        <input value="<?php echo isset($correo) ? $correo : ''; ?>" id="correo" name="correo" type="text">
        <label for="clave">Clave</label>
        <input value="<?php echo isset($clave) ? $clave : ''; ?>" id="clave" name="clave" type="password">
        <br><br><br>
        <label for="pais">Pais</label>
        <input value="<?php echo isset($pais) ? $pais : ''; ?>" id="pais" name="pais" type="text">
        <label for="cp">CP</label>
        <input value="<?php echo isset($cp) ? $cp : ''; ?>" id="cp" name="cp" type="text">
        <label for="ciudad">Ciudad</label>
        <input value="<?php echo isset($ciudad) ? $ciudad : ''; ?>" id="ciudad" name="ciudad" type="text">
        <label for="direccion">Direccion</label>
        <input value="<?php echo isset($direccion) ? $direccion : ''; ?>" id="direccion" name="direccion" type="text">
        <br><br><br>
        <input type="submit">
        <br><br><br>
        <a href="login.php">¿Ya tiene su restaurante registrado? Haz click aquí para entrar</a>
    </form>
</body>

</html>
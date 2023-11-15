<?php
//https://es.aliexpress.com/item/1005005471401197.html?spm=a2g0o.best.moretolove.39.b19022aedo

/* si va bien redirige a principal.php si va mal, mensaje de error */

/** 
 * 
 * login falta hacer un codigo que lleve a crear un usuario
 */

////////////////////// Conectar Base Datos Empresa
try {
    $bd = new PDO('mysql:dbname=empresa;host=127.0.0.1', 'root', '');
    echo "Conexión realizada con éxito<br>";

} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}

////////////////////// Verificar credenciales
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Realizar consulta preparada para verificar credenciales
    $stmt = $bd->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND contraseña = :contraseña");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contraseña', $contraseña);
    $stmt->execute();

    // Obtener el resultado de la consulta
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Usuario autenticado, redirigir a la página de bienvenida
        header("Location: Bienvenido.html");
        exit;
    } else {
        $err = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulario de login</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php if (isset($err)) {
        echo "<p> Revise usuario y contraseña</p>";
    } ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="usuario">Usuario</label>
        <input value="<?php if (isset($usuario))
            echo $usuario; ?>" id="usuario" name="usuario" type="text">

        <label for="contraseña">Contraseña</label>
        <input id="contraseña" name="contraseña" type="password">

        <input type="submit">
        <p><a href="Registro.php">¿No tienes una cuenta?</a></p>

    </form>
</body>

</html>
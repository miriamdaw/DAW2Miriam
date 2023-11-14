<?php
//https://es.aliexpress.com/item/1005005471401197.html?spm=a2g0o.best.moretolove.39.b19022aedo

/* si va bien redirige a principal.php si va mal, mensaje de error */

/**
 * encriptar claves
 * rol
 * script de registro de personas --> enlace a otro php
 * formulario de registro y que se guarde en la base de datos, dos o tres usuarios encriptando     
 */

////////////////////// Conectar Base Datos Empresa
$cadena_conexion = 'mysql:dbname=empresa;
host=127.0.0.1';
$usuario = 'root';
$clave = '';
try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    echo "Conexión realizada con éxito<br>";

} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}


////////////////////// Verificar y enviar a nueva página
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['usuario'] === "usuario" and $_POST["clave"] === "1234") {
        header("Location: principal.php");
    } else {
        $err = true;
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

        <label for="clave">Clave</label>
        <input id="clave" name="clave" type="password">

        <input type="submit">
    </form>
</body>

</html>



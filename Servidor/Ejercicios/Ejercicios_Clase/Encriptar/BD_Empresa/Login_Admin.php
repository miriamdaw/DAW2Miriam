<?php
//https://es.aliexpress.com/item/1005005471401197.html?spm=a2g0o.best.moretolove.39.b19022aedo

/* si va bien redirige a principal.php si va mal, mensaje de error */

/**
 * encriptar claves
 * rol
 * script de registro de personas --> enlace a otro php
 * formulario de registro y que se guarde en la base de datos, dos o tres usuarios encriptando   
 * en el login eres el admin, estas entrando, en el registro vas a ir metiendo los clientes  
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
    if ($_POST['usuario'] === "Miriam" and $_POST["contraseña"] === "1234") {
        // Credenciales de ejemplo
        $usuario = $_POST['usuario'];
        $clave = $_POST['contraseña'];

        //Redirigir a formulario de registro de clientes
        header("Location: Registro_Clientes.php");
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
    </form>
</body>

</html>
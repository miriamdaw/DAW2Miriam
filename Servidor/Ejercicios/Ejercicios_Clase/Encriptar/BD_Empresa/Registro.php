<?php
////////////////////// Conectar Base Datos Empresa
try {
    $bd = new PDO('mysql:dbname=empresa;host=127.0.0.1', 'root', '');
    echo "Conexión realizada con éxito<br>";
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}

// Iniciar variables porque me da un aviso 
$usuario = $contrasena = $confirmarContrasena = "";

////////////////////// Registrar nuevos usuarios
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $confirmarContrasena = $_POST['confirmarContrasena'];

    // Validar longitud de la contraseña y confirmación
    if (strlen($contrasena) !== 3 || !ctype_digit($contrasena) || $contrasena !== $confirmarContrasena) {
        echo "Error: La contraseña debe tener longitud 3 y contener solo números. Asegúrate de que las contraseñas coincidan.<br>";
        exit;
    }

    // Validar longitud del usuario
    if (strlen($usuario) < 5 || strlen($usuario) > 10 || !ctype_upper(substr($usuario, 0, 1))) {
        echo "Error: El nombre de usuario debe tener entre 5 y 10 caracteres y comenzar con mayúscula.<br>";
        exit;
    }

    // Validar disponibilidad del nombre de usuario en la base de datos
    $stmt = $bd->prepare("SELECT COUNT(*) FROM usuarios WHERE usuario = ?");
    $stmt->bindParam(1, $usuario);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo "Error: El nombre de usuario ya está registrado. Por favor, elige otro.<br>";
        exit;
    }

    // Encriptar la clave del usuario
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Imprimir credenciales (solo para comprobar que se han guardado correctamente)
    echo "Credenciales antes de insertar en la base de datos:<br>";
    echo "Usuario: " . htmlspecialchars($usuario) . "<br>";
    echo "Contraseña: " . htmlspecialchars($contrasena) . "<br>";

    /////////////////////// Consulta Preparada --> INSERTAR usuarios
    $stmt = $bd->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
    $stmt->bindParam(1, $usuario);
    $stmt->bindParam(2, $contrasena_hash);

    // Manejar errores de ejecución
    try {
        $stmt->execute();
        echo "Usuario registrado con éxito<br>";
    } catch (PDOException $ex) {
        echo "Error al registrar al usuario: " . $ex->getMessage();
    }

    ////////////////////// Consulta Preparada --> SELECT usuarios
    $stmt = $bd->prepare("SELECT usuario, contrasena FROM usuarios");
    $stmt->execute();

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
</head>

<body>
    <h3>Inserte clientes para guardar en base de datos</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="usuario">Ingrese su nombre de usuario:</label>
        <input value="<?php echo htmlspecialchars($usuario); ?>" id="usuario" name="usuario" type="text">

        <label for="contrasena">Ingrese su contraseña:</label>
        <input id="contrasena" name="contrasena" type="password">

        <label for="confirmarContrasena">Confirme su contraseña:</label>
        <input id="confirmarContrasena" name="confirmarContrasena" type="password">

        <input type="submit">
        <p><a href="Login.php">¿Ya tienes una cuenta?</a></p>
    </form>
</body>

</html>
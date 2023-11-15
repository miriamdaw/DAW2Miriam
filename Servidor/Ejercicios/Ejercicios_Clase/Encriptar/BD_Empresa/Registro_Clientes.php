<?php
// Conectar Base Datos Empresa
try {
    $bd = new PDO('mysql:dbname=empresa;host=127.0.0.1', 'root', '');
    echo "Conexión realizada con éxito<br>";
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}

// Registrar Nuevo Usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];

    // Encriptar la nueva contraseña antes de almacenarla en la base de datos
    $clave_hash = password_hash($clave, PASSWORD_DEFAULT);

    // Mostrar credenciales antes de insertar
    echo "Credenciales antes de insertar en la base de datos:<br>";
    echo "Cliente: " . htmlspecialchars($nombre) . "<br>";
    echo "Clave: " . htmlspecialchars($clave) . "<br>";
    echo "Rol: " . htmlspecialchars($rol) . "<br>";

    // Realizar la consulta preparada para insertar un nuevo usuario
    $stmt = $bd->prepare("INSERT INTO usuarios (nombre, clave, rol) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $clave_hash);
    $stmt->bindParam(3, $rol);

    // Manejar errores de ejecución
    try {
        $stmt->execute();
        echo "Usuario registrado con éxito<br>";
    } catch (PDOException $ex) {
        echo "Error al registrar al usuario: " . $ex->getMessage();
    }

    // Obtener todos los datos del cliente
    $stmt = $bd->prepare("SELECT nombre, clave, rol FROM usuarios");
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mostrar clientes
    echo "Clientes ingresados en la base de datos:<br>";
    foreach ($usuarios as $usuario) {
        echo "Cliente: " . htmlspecialchars($usuario['nombre']) . ",
          Clave: " . htmlspecialchars($usuario['clave']) . ",
          Rol: " . htmlspecialchars($usuario['rol']) . "<br>";
    }

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
        <label for="nombre">Nombre</label>
        <input value="<?php if (isset($nombre))
            echo htmlspecialchars($nombre); ?>" id="nombre" name="nombre" type="text">

        <label for="clave">Clave</label>
        <input id="clave" name="clave" type="password">

        <label for="rol">Rol</label>
        <input id="rol" name="rol" type="number">

        <input type="submit">
    </form>
</body>

</html>
</body>

</html>
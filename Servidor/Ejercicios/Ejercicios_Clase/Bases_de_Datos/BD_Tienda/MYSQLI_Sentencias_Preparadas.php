<?php
// CONEXION DE BASE DE DATOS
$mysqli = new mysqli("127.0.0.1", "usuarioTienda", "usuarioTienda", "tienda");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";
echo "estas conectada";


//BIND_RESULT -> iniciamos sentencia preparada
if ($stmt = $mysqli->prepare("SELECT nif, nombre FROM clientes")) {
    $stmt->execute();

    //vinculamos variables a columnas
    $stmt->bind_result($nif, $nombre);

    //obtenemos los valores
    while ($stmt->fetch()) {
        printf("%s %s<br>", $nif, $nombre);
    }

    //cerramos la sentencia preparada
    $stmt->close();
}



///////////    EJERCICIO    ///////
/*sentencia preparada -> insertar un producto, eliminar los pedidos del producto numero 2 e incrementar
5% precio de todos los productos
*/


//  1 - insertar un producto
$stmt = $mysqli->prepare("INSERT INTO productos (nombre, precio, descripcion) VALUES (?, ?, ?)");
$stmt->bind_param('sds', $nombre, $precio, $descripcion);
// Establecer parámetros y ejecutar
$nombre = "Beisbol";
$precio = 30.9;
$descripcion = "Para jugar a beisbol";
$stmt->execute();
// Mensaje de éxito en la inserción
echo "Se han creado las entradas exitosamente";
// Cerrar conexiones
$stmt->close();
$mysqli->close();



//eliminar pedido
$stmt = $mysqli->prepare("DELETE FROM pedidos WHERE producto = 2");
// Ejecutar la consulta DELETE
$stmt->execute();
// Mensaje de éxito en la eliminación
echo "Se han borrado las entradas exitosamente";
// Cerrar la conexión
$stmt->close();
$mysqli->close();


//incrementar 5% precio de todos los productos
// Preparar la consulta UPDATE para aumentar en un 5% el precio de todos los productos
$stmt = $mysqli->prepare("UPDATE productos SET precio = precio * 2");

// Verificar si la preparación de la consulta fue exitosa
if ($stmt === false) {
    echo "Error al preparar la consulta.";
    exit();
}

// Ejecutar la actualización
$result = $stmt->execute();

// Verificar si la ejecución fue exitosa
if ($result === false) {
    echo "Error al ejecutar la consulta: " . $stmt->error;
    exit();
}

// Mensaje de éxito en la actualización
echo "Se han actualizado los precios exitosamente";

// Cerrar la conexión y la sentencia preparada
$stmt->close();
$mysqli->close();


?>
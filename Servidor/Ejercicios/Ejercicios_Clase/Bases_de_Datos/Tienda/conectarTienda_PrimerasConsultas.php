<?php
// CONEXION DE BASE DE DATOS
$mysqli = new mysqli("127.0.0.1", "usuarioTienda", "usuarioTienda", "tienda");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";



// CONSULTAS: Cuantas filas de cliente hay
$query = "SELECT * FROM clientes";
$resultado = $mysqli->query($query);
$numregistros = $resultado->num_rows; // num_rows devuelve el número de filas
echo "<p>El número de clientes es: ", $numregistros, ".</p";
echo "<br>";


//CONSULTAS: Mostrar una tabla con todos los datos de todos los clientes
$query = "SELECT * FROM clientes";
$resultado = $mysqli->query($query);
$numregistros = $resultado->num_rows;

echo "<table border=2><tr><th>NIF</th> <th>Nombre</th> <th>Dirección</th>
<th>Email</th> <th>Teléfono</th></tr>";
while ($registro = $resultado->fetch_assoc()) {
    echo "<tr>";
    foreach ($registro as $campo)
        echo "<td>", $campo, "</td>";
    echo "</tr>";
}
echo "</table>";
$resultado->free();


//CONSULTAS: INSERTAR MÁS CLIENTES
$query = "INSERT INTO clientes (nif, nombre, direccion, email, telefono) 
VALUES ('09231206O', 'Yuri', 'Calle San Juan de la Cruz', 'yuri@gmail.com', '669442678'),
('09231206P', 'Santi', 'Calle San Juan de la Cruz', 'santi@gmail.com', '661442678')";

if ($mysqli->query($query) === TRUE) {
    echo "Nuevo cliente creado";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
}


//CONSULTAS: ACTUALIZAR CAMPOS DE UNA TABLA
$query = "UPDATE productos SET precio = 26.99 WHERE nombre = 'Raqueta'";
if ($mysqli->query($query) === TRUE) {
    echo "El precio ha sido actualizado";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
}

$query = "SELECT * FROM productos";
$resultado = $mysqli->query($query);
$numregistros = $resultado->num_rows;

echo "<table border=2><tr><th>ID</th> <th>Nombre</th> <th>Precio</th>
<th>Descripción</th></tr>";
while ($registro = $resultado->fetch_assoc()) {
    echo "<tr>";
    foreach ($registro as $campo)
        echo "<td>", $campo, "</td>";
    echo "</tr>";
}
echo "</table>";
$resultado->free();


//CONSULTAS: ELIMINAR REGISTROS DE UNA TABLA
$query = "INSERT INTO productos (id, nombre, precio, descripcion) 
VALUES ('456', 'Zapatos', '5.99', 'Zapatos tenis')";
if ($mysqli->query($query) === TRUE) {
    echo "Nuevo producto insertado";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
}


$query = "DELETE FROM productos WHERE nombre = 'Zapatos'";
if ($mysqli->query($query) === TRUE) {
    echo "Producto eliminado";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
}

?>
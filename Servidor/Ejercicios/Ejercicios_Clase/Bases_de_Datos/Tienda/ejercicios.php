<?php
$mysqli = new mysqli("127.0.0.1", "usuarioTienda", "usuarioTienda", "tienda");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

/*
Listar la información de la tabla pedidos indicando el nombre y NIF del cliente, 
y el coste de cada pedido (cantidad*precio del producto)
*/

SELECT c.nombre AS NombreCliente, c.nif AS NIFCliente,
       p.precio AS PrecioProducto,
       pe.cantidad AS Cantidad,
       (pe.cantidad * p.precio) AS CostePedido
FROM pedidos pe
JOIN clientes c ON pe.cliente_id = c.id
JOIN productos p ON pe.producto_id = p.id;



/*
Definir una función que liste todos los pedidos de un cliente dado por su nombre
*/

?>
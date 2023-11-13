<?php

/*
sentencias preparadas diego lazaro -> todo explicado
https://diego.com.es/sentencias-preparadas-en-php
https://diego.com.es/ataques-sql-injection-en-php
*/

$server = "localhost";
$user = "usuarioTienda";
$password = "usuarioTienda";
$dbname = "tienda";

try {
    //conectar
    $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);

    //establecer el nivel de errores a exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    ////////////// Ejemplo de consulta SELECT //////////////
    $stmt = $db->prepare("SELECT * FROM clientes");
    $stmt->execute();

    // Obtener los resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Imprimir los resultados
    print_r($resultados);


    ////////////// Ejemplo de INSERTAR /////////////////////
    $stmt = $db->prepare("INSERT INTO productos (nombre, precio, descripcion) 
    VALUES (:nombre, :precio, :descripcion)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':descripcion', $descripcion);

    // Establecer parámetros y ejecutar
    $nombre = "Patines";
    $precio = 43.99;
    $descripcion = "Patinaje sobre hielo";
    $stmt->execute();

    // Mensaje de éxito en la inserción
    echo "Se han creado las entradas exitosamente";


    ////////////// Ejemplo de ELIMINAR /////////////////////
    $stmt = $db->prepare("DELETE FROM productos WHERE nombre = :nombre");
    $stmt->bindParam(':nombre', $nombre);

    // Ejecutar la eliminación
    $nombre = "Patines";
    $stmt->execute();

    // Mensaje de éxito en la eliminación
    echo "Se han eliminado las entradas exitosamente";

    
    ////////////// Ejemplo de ACTUALIZAR /////////////////////
    $stmt = $db->prepare("UPDATE productos SET precio = :precio WHERE nombre = :nombre");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':precio', $nuevoPrecio);

    // Ejecutar la actualización
    $nombre = "Patines";
    $nuevoPrecio = 34.99;
    $stmt->execute();

    // Mensaje de éxito en la actualización
    echo "Se han actualizado las entradas exitosamente";

    // Cerrar conexiones
    $db = null;

} catch (PDOException $e) {
    echo "" . $e->getMessage();
}
?>
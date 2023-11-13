<?php

//recibe los datos del formularioTienda
//sentencias preparadas
//restar la cantidad pedida
//pedidos se inserta una fila, productos se resta existencias
//--> su pedido ha sido realizado, numero de pedido, contador con sesiones
//solo conectar, update e insert

$cadena_conexion = "mysql:dbname=tienda;host=127.0.0.1";
$usuario = "root";
$clave = "";

$producto = $_POST["producto"];
$cantidad = $_POST["cantidad"];
$cliente = $_POST["cliente"];

try {
    // Crear conexión con PDO
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    echo "Conexión realizada con éxito<br>";

    // SELECT
    if ($stmt = $bd->prepare("SELECT id, existencias FROM productos WHERE nombre = ?")) {

        // Vincular valores a columnas
        $stmt->bindParam(1, $producto);

        // Ejecutar la consulta
        $stmt->execute();

        // Vincular el resultado a variables
        $stmt->bindColumn('id', $id);
        $stmt->bindColumn('existencias', $existencias);

        // Obtener los valores
        while ($stmt->fetch()) {
            printf("ID del producto con nombre %s: %s<br>", $producto, $id);


            //EMPEZAR TRANSACCION

            $bd->beginTransaction();

            // INSERTAR
            if ($stmt = $bd->prepare("INSERT INTO pedidos (cliente, producto, cantidad) VALUES (:cliente, :producto, :cantidad)")) {

                // Vincular valores a parámetros
                $stmt->bindParam(':cliente', $cliente);
                $stmt->bindParam(':producto', $id);
                $stmt->bindParam(':cantidad', $cantidad);

                // Establecer parámetros y ejecutar
                $stmt->execute();

                // Mensaje de éxito en la inserción
                echo "Se han creado las entradas exitosamente";
            } else {
                // Error en la inserción
                echo "Error en la inserción";
                $bd->rollBack(); // Revertir la transacción en caso de error
            }

            //UPDATE
            //preguntar exsistencias, si hay existencias suficientes se hace 

            if ($existencias >= $cantidad) {

                $stmt = $bd->prepare("UPDATE productos SET existencias = existencias - :cantidad WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':cantidad', $cantidad);
                $stmt->execute();

                // Confirmar la transacción
                $bd->commit();


            } else {
                // No hay suficientes existencias
                echo "No hay suficientes existencias del producto $producto";
            }
        }

    } else {
        // Error en la preparación de la consulta SELECT
        echo "Error en la preparación de la consulta.";
    }


} catch (PDOException $e) {
    // Error al conectar o ejecutar consultas
    echo "Error: " . $e->getMessage();
}
?>
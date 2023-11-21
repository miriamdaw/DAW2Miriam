<?php

//TODO pagina que salgan todas las entradas que se hayan hecho con todos los datos introducidos
echo "Holaaa";

$mysqli = new mysqli("127.0.0.1", "cyberthrone", "cyberthrone", "cyberthrone");
if ($mysqli->connect_errno) {
    die("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}
echo $mysqli->host_info . "\n";
echo "estas conectada";


//BIND_RESULT -> iniciamos sentencia preparada
if ($stmt = $mysqli->prepare("SELECT nombre, email, edad, telefono, comunidad_autonoma, mensaje FROM clientes")) {
    $stmt->execute();

    // Vinculamos variables a columnas
    $stmt->bind_result($nombre, $email, $edad, $telefono, $comunidad_autonoma, $mensaje);

    // Obtenemos los valores
    while ($stmt->fetch()) {
        printf("Nombre: %s<br>", $nombre);
        printf("Email: %s<br>", $email);
        printf("Edad: %s<br>", $edad);
        printf("Teléfono: %s<br>", $telefono);
        printf("Comunidad Autónoma: %s<br>", $comunidad_autonoma);
        printf("Mensaje: %s<br>", $mensaje);
    }

    // Cerramos la sentencia preparada
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $mysqli->error;
}




?>
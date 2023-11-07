<?php
//PDO es PHP Data Objects, usa drivers distintos para cada base de datos
$pdo = new PDO('mysql:host=localhost;dbname=ejemplo','ejemplo','ejemplo');

$sentencia = $pdo->query("SELECT '¡Hola, querido usuario de MYSQL!' AS _message FROM DUAL");

$fila = $sentencia->fetch(PDO::FETCH_ASSOC);
echo htmlentities($fila["_message"]);




?>
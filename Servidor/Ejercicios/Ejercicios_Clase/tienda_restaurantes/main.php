<?php
$server = "localhost";
$user = "usuarioTienda";
$password = "usuarioTienda";
$dbname = "tienda";
     
try {
    //conectar
    $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);

    //establecer el nivel de errores a exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "conectada";
 
    $db = null;

} catch (PDOException $e) {
    echo "no" . $e->getMessage();
}
?>
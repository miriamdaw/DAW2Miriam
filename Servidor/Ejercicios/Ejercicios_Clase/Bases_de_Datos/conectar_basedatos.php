<?php
/*
https://www.php.net/manual/es/set.mysqlinfo.php
https://www.php.net/manual/es/mysqli.quickstart.php

phpmyadmin --> base de datos, usuario, contraseña --> ejemplo, grant all privileges

documento de base --> https://aulavirtual33.educa.madrid.org/ies.sanjuandelacruz.pozuelodealarcon/pluginfile.php/98096/mod_resource/content/1/PHP-MySQL.pdf

tres tablas creadas para el lunes!!! leer hasta pagina 18 --> falta relacionarlas
*/

$mysqli = new mysqli("127.0.0.1", "ejemplo", "ejemplo", "ejemplo");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

?>
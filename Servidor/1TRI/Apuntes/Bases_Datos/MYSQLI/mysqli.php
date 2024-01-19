<?php
/*
https://www.php.net/manual/es/set.mysqlinfo.php
https://www.php.net/manual/es/mysqli.quickstart.php

en phpmyadmin, crear usuario --> base de datos, usuario, contraseña --> ejemplo, grant all privileges

documento de base --> https://aulavirtual33.educa.madrid.org/ies.sanjuandelacruz.pozuelodealarcon/pluginfile.php/98096/mod_resource/content/1/PHP-MySQL.pdf

MYSQLI es recomendada, Mysql improved

*/

$mysqli = new mysqli("127.0.0.1", "ejemplo", "ejemplo", "ejemplo");
//$hostname, $usuario, $password, $basedatos
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}
echo $mysqli->host_info . "\n";

?>
<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "cyberthrone");
if ($mysqli->connect_errno) {
    die("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);

}
?>
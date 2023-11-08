<?php

$baseDeDatos = new PDO("sqlite:" . __DIR__ . "/ejemplo.db");
$baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$resultado = $baseDeDatos->query("SELECT * FROM departamentos;");
$resultados = $resultado->fetchAll(PDO::FETCH_OBJ);


?>
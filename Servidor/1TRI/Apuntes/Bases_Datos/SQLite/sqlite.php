<?php
/*
ligero, dominio público
*/
class MiBD extends SQLite3
{
    function __construct()
    {
        $this->open('ejemplo.db');
    }
}

$bd = new MiBD();

$bd->exec('CREATE TABLE foo (bar STRING)');
$bd->exec("INSERT INTO foo (bar) VALUES ('Esto es una prueba')");

$resultado = $bd->query('SELECT bar FROM foo');
var_dump($resultado->fetchArray());


?>

    


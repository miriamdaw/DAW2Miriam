<?php
/*
objetos
*/

//sin dolar el usuario y contraseña, con comillas, porque no es una variable
try {
    $mbd = new PDO('mysql:host=localhost;dbname=tienda', "usuarioTienda", "usuarioTienda");
    foreach($mbd->query('SELECT * from clientes') as $fila) {
        print_r($fila);
    }
    $mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
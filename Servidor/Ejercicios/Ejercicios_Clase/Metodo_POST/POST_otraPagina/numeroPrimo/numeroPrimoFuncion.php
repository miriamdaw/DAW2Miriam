<?php
// Función para comprobar si un número es primo

function esPrimo($numero1) {

    $numero1 = intval($numero1);

    if ($numero1 <= 1) {
        return false;
    }

    for ($i = 2; $i * $i <= $numero1; $i++) {
        if ($numero1 % $i === 0) {
            return false;
        }
    }

    return true;
}


?>
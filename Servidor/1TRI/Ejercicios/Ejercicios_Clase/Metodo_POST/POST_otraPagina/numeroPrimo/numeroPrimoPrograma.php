<?php
// Solicitar al usuario que introduzca un número

include 'numeroPrimoFuncion.php';

$numero1 = $_POST["numero1"];

if (esPrimo($numero1)) {
    echo "$numero1 es primo.";
} else {
    echo "$numero1 no es primo.";
}


?>
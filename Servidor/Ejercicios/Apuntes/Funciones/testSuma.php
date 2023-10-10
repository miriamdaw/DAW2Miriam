<?php

$var1 = 2;
$var2 = 4;

include 'sumar.php';
include 'acumular.php';

$s = sumar($var1,$var2);
echo "La suma es: $s";
echo "<br>";

$s = acumular($s, 2);
acumular ($s, 4);

for($i = 1 ; $i < 4 ; $i++){
    acumular ($s, 4);
    echo "acumulador = $s <br>"; 
}

?>
<?php
// Programa para probar la función

include 'maximo_comun.php'; 

$numero1 = $_POST["numero1"];
$numero2 = $_POST["numero2"];

$resultado = calcularMCD($numero1, $numero2);

echo "El MCD de $numero1 y $numero2 es $resultado";

?>
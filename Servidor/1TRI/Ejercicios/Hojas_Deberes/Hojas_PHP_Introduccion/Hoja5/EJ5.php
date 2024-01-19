<?php
/*
 Escribe una página php que guarde en una variable la fecha/hora 12/01/2024 13:45:00. 
Averiguar y visualiza qué día de la semana fue (lunes, martes….).
*/

$fecha = date("12/01/2024 13:45:00");
echo $fecha . "<br >\n";

echo "Ese día fue " . date("l");

?>
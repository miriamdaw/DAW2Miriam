<?php
//Comprueba si el año 2024 es bisiesto y si lo fue el año 2018.

$ano2024 = 2024;
$ano2018 = 2018;

if (date('L', strtotime("$ano2024-01-01"))) {
    echo "$ano2024 es un año bisiesto.<br >\n";
} else {
    echo "$ano2024 no es un año bisiesto.<br >\n";
}

if (date('L', strtotime("$ano2018-01-01"))) {
    echo "$ano2018 es un año bisiesto.<br >\n";
} else {
    echo "$ano2018 no es un año bisiesto.<br >\n";
}

?>
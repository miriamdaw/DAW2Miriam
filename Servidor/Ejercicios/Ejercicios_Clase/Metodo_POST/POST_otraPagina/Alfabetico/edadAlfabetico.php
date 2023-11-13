<?php

echo "Mostrar por orden alfabético el nombre de dos personas. Si se llaman igual, aparece primero la de menor edad.";
echo "<br>";

$nombre1 = $_POST["nombre1"];
$nombre2 = $_POST["nombre2"];
$edad1 = $_POST["edad1"];
$edad2 = $_POST["edad2"];

$comparacion = strcmp($nombre1, $nombre2);

if ($comparacion === 0) {
    if ($edad1 < $edad2) {
        echo "$nombre1 ($edad1 años), $nombre2 ($edad2 años)";
    } else {
        echo "$nombre2 ($edad2 años), $nombre1 ($edad1 años)";
    }
} elseif ($comparacion < 0) {
    echo "$nombre1 ($edad1 años), $nombre2 ($edad2 años)";
} else {
    echo "$nombre2 ($edad2 años), $nombre1 ($edad1 años)";
}


?>
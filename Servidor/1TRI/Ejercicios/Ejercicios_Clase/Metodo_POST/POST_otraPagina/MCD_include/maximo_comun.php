<?php
// Función para calcular el MCD utilizando el algoritmo de Euclides
function calcularMCD($numero1, $numero2) {

    $numero1 = intval($numero1);
    $numero2 = intval($numero2);

    while ($numero2 != 0) {
        $temp = $numero2;
        $numero2 = $numero1 % $numero2;
        $numero1 = $temp;
    }
    return $numero1;
}

?>

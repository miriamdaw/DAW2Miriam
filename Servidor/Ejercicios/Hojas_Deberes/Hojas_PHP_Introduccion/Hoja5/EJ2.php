<?php
/* Formatea la fecha dentro de una semana en el formato "lunes, 16 de octubre de 2023. 
A las 18:35"
$fechaFormateada = date('l, j \d\e F \d\e Y. A \l\a\s H:i', strtotime($fechaDentroDeUnaSemana));
*/

//la fecha actual
$fechaActual = date("Y-m-d");
echo "$fechaActual <br >\n";

//fecha dentro de una semana
echo date("Y-m-d", strtotime("+1 week")) . "<br >\n";


//"lunes, 16 de octubre de 2023. A las 18:35" (en español)
$fechaSemana = strtotime('+1 week');
$fechaFormateada = strftime('%A, %d de %B de %Y. A las %H:%M', $fechaSemana);
echo $fechaFormateada;

?>
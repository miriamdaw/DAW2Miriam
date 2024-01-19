<?php
/*
Realiza un script en php que muestre la fecha 
y hora actual de estos formatos de ejemplo: date
*/

//Sunday
$timestamp = time();
$fechaActual = date("l", $timestamp);
echo "$fechaActual <br />\n";

//Sunday 03rd of May 2023 08:22:51 PM
$fechaActual = date("l jS \of F Y h:i:s A");
echo "$fechaActual <br />\n";

//May 3, 2023, 8:22 pm
$fechaActual = date("l, d F  Y h:i:s A");
echo "$fechaActual <br />\n";

//05.03.09
$fechaActual = date("d.m.y");
echo "$fechaActual <br />\n";

//3, 5, 2023
$fechaActual = date("m, d, y");
echo "$fechaActual <br />\n";

//20230503
$fechaActual = date("ydm");
echo "$fechaActual <br />\n";

//it is the 3rd day.
$fechaActual = date("dS");
echo "It is the $fechaActual day<br />\n";

//Sun May 3 20:22:51 CEST 2023
$fechaActual = date("D F H:m:s T Y");
echo "$fechaActual <br />\n";

//20:05:51 numero del mes
$fechaActual = date("H:m:s m");
echo "$fechaActual <br />\n";

//20:22:51
$fechaActual = date("H:m:s");
echo "$fechaActual <br />\n";



?>




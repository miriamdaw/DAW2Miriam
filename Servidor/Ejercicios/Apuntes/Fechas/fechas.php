<?php
//pendiente microtime
//getdate --> timestamp en matriz asociativa
if( $_POST["fecha"] && $_POST["hora"]){
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
echo $fecha;
echo "<br>";
echo $hora;
echo "<br>";
echo "Su hora en microsegundos: " . microtime($hora);
echo "<br>";
$fecha = date("d-m-Y H:i:s ");
echo "El día y hora actual es: ". $fecha;
echo "<br>";
$tiempo = time();
echo $tiempo;
echo "<br>";
$fechaG = getdate();
print_r($fechaG);
exit();

}
?>

<html>
<body>
<form action="<?php $_PHP_SELF ?>" method="POST">

<h1>Fechas en HTML/PHP</h1>
<h3>Introduzca la fecha y hora de su cita:</h3>
Fecha: <input id="fecha" type="date" name="fecha"/>
Hora: <input id="hora" type="time" name="hora"/>
<input name="submit" type="submit" />

</form>
</body>
</html>
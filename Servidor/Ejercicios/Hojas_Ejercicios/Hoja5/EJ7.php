<?php
/*Realiza un script que mediante un formulario permita introducir una fecha de 
nacimiento y te felicite si es tu cumpleaños.*/

if( $_POST["fecha"]){


}

?>

<html>
<body>
<form action="<?php $_PHP_SELF ?>" method="POST">

<h1>Hoja 5 - Ejercicio 7</h1>
<h3>Introduzca su fecha de nacimiento:</h3>
Fecha: <input id="fecha" type="date" name="fecha"/>
<input name="submit" type="submit" />

</form>
</body>
</html>
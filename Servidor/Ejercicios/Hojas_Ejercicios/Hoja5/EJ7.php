<?php
/*Realiza un script que mediante un formulario permita introducir una fecha de 
nacimiento y te felicite si es tu cumpleaños.*/

if( $_POST["fecha_nacimiento"]){
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $fechaActual = date("Y-m-d");
    
    if ($fechaNacimiento === $fechaActual) {
            echo "<p>Feliz cumpleaños!</p>";
        } else {
            echo "<p>No es tu cumpleaños todavía. Esperamos que tengas un gran día cuando llegue.</p>";
        }
    }

?>

<html>
<body>
<form action="<?php $_PHP_SELF ?>" method="POST">

<h1>Hoja 5 - Ejercicio 7</h1>
<h3>Introduzca su fecha de nacimiento:</h3>
<form method="POST" action="">
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
        <br>
        <input type="submit" name="submit" value="Comprobar Cumpleaños">
    </form>

  
</body>
</html>

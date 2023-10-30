<?php
/*Realiza una página que simule ser la de un periódico. 
Debe permitir configurar que tipo de titular deseamos que aparezca al visitarla, pudiendo ser:
-Noticia política.
-Noticia económica.
-Noticia deportiva.
Mediante tres botones de tipo radio, permitir seleccionar que titular debe mostrar el periódico. 
Almacenar en una cookie el tipo de titular que desea ver el cliente. 
La primera vez que visita el sitio deben aparecer los tres titulares.
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hoja Cookies: Ejercicio 2 </title>
</head>

<body>
    <h1> Periódico de DAW </h1>
    <form action="cookie_titular.php" method="post">
        <input type="radio" name="titular" value="politica" id="politica">
        <label for="politica">Noticia Política</label><br>
        <input type="radio" name="titular" value="economica" id="economica">
        <label for="economica">Noticia Económica</label><br>
        <input type="radio" name="titular" value="deportiva" id="deportiva">
        <label for="deportiva">Noticia Deportiva</label><br><br>
        <button type="submit"> Enviar </button>
    </form>

    <?php
    if (isset($_COOKIE['titular'])) {
        $titular = $_COOKIE['titular'];

        if ($titular === 'politica') {
            echo "<h2>Titular de Noticia Política</h2>";
            echo "<p>El partido DAWISTA ha ganado las elecciones de delegación de Segundo de DAW.</p>";
        } elseif ($titular === 'economica') {
            echo "<h2>Titular de Noticia Económica</h2>";
            echo "<p>La economía de DAW está mejorando gracias al partido DAWISTA.</p>";
        } elseif ($titular === 'deportiva') {
            echo "<h2>Titular de Noticia Deportiva</h2>";
            echo "<p>El equipo DAWISTA de rugby ha ganado por 5 vez el partido contra el equipo DAMISTA.</p>";
        }
        
    } else {
        echo "<h2>Elija el tipo de noticia al que quiere acceder.</h2>";
    }
    ?>
</body>

</html>
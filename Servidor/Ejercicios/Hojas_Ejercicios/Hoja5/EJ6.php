<?php
/*
Imagina que tu sitio web ofrece una oferta durante un tiempo limitado a los usuarios suscritos 
y quiere recordarles en cada entrada a la web el tiempo que aún les queda para disfrutarla. 
Un ejemplo de lo que debe mostrar sería:
Oferta válida del 06 de octubre de 2023 al 06 de noviembre de 2023
Esta oferta es válida durante 1 mes, comenzó el 06/10/2023, finaliza dentro de 31 días, el 23/11/2023

Realiza un script php de modo que muestre al usuario esta información al acceder a la web. Controla 
también que solo pueda acceder un usuario suscrito. (utiliza un array de usuarios suscritos)
*/

$usuariosSuscritos = array("Miriam", "Yuri", "Gonzalo");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioIngresado = $_POST["usuario"];
    if (in_array($usuarioIngresado, $usuariosSuscritos)) {

        $fechaInicioOferta = strtotime("2023-10-06");
        $fechaFinOferta = strtotime("2023-11-06");

        $diferenciaDias = floor(($fechaFinOferta - time()) / (60 * 60 * 24));
        
        $fechaInicioOfertaLegible = date("d/m/Y", $fechaInicioOferta);
        $fechaFinOfertaLegible = date("d/m/Y", $fechaFinOferta);
        
        echo "Oferta válida del $fechaInicioOfertaLegible al $fechaFinOfertaLegible.<br>";
        echo "Esta oferta es válida durante 1 mes, comenzó el $fechaInicioOfertaLegible,";
        echo " finaliza dentro de $diferenciaDias días, el " . date("d/m/Y", $fechaFinOferta + ($diferenciaDias * 24 * 60 * 60)) . ".";
        
    } else {
        echo "Acceso denegado. Esta oferta es solo para usuarios suscritos.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Oferta Usuarios</title>
</head>
<body>
<h1>Hoja 5 - Ejercicio 6</h1>
<h3>Introduzca su usuario:</h3>
    <form method="POST" action="">
        <label for="usuario">Nombre de Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <input type="submit" name="submit" value="Comprobar Suscripción">
    </form>
</body>
</html>

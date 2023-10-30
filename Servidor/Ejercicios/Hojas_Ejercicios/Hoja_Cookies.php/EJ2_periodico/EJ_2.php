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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titular'])) {
    $titular = $_POST['titular'];
    setcookie('titular', $titular, time() + 60);

    if ($titular === 'politica') {
        header('Location: noticia_politica.php');
    } elseif ($titular === 'economica') {
        header('Location: noticia_economica.php');
    } elseif ($titular === 'deportiva') {
        header('Location: noticia_deportiva.php');
    }
    exit;
}
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

</body>
</html>
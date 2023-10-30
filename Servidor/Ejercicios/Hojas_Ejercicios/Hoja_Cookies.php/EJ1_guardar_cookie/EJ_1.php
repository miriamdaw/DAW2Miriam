<?php
/*
Crea una pagina PHP que conste de un formulario con una caja de texto y un botón de “submit”.
Se trata de que la primera vez se nos pregunte por nuestro nombre (que escribiremos en la caja), 
el valor introducido se guarde en una cookie y en las siguientes ocasiones la cookie establecida nos recuerde. 
El “action” del formulario nos enviará a otra pagina PHP que será quien establezca la cookie.
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja Cookies: Ejercicio 1</title>
</head>

<body>
    <?php
    if (isset($_COOKIE['nombre'])) {
        $nombre_cookie = $_COOKIE['nombre'];
        echo "Hola $nombre_cookie";
    }
    ?>
    <form action="EJ1_cookie.php" method="POST">
        <label for="nombre">Introduzca su nombre:</label>
        <input type="text" id="nombre" name="nombre" required value="<?php if (isset($_COOKIE['nombre'])) echo $_COOKIE['nombre']; ?>">
        <button type="submit">Submit</button>
    </form>
</body>

</html>
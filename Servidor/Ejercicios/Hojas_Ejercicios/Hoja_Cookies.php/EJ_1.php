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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="nombre"> Introduzca su nombre: </label>
    <input value="<?php if (isset($_POST["nombre"])) echo $_POST["nombre"]; ?>" id="nombre" name="nombre" type="text">
    </form>
</body>
</html>
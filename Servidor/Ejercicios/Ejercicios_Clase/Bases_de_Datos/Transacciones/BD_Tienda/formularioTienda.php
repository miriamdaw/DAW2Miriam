<?php
/*
vamos pidiendo productos
--> hemos añadido otra columna (existencias)
--> nombre unique
un formulario donde se introducen nombres de productos y cantidad
*/

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos Tienda</title>
</head>

<body>

    <h1>Formulario de Pedidos</h1>

    <form action="gestionarPedidos.php" method="post">
        <label for="nombre">Producto:</label>
        <input value="<?php if (isset($_POST["producto"]))
            echo $_POST["producto"]; ?>" id="producto" name="producto" type="text">

        <br>

        <label for="cantidad">Cantidad:</label>
        <select id="cantidad" name="cantidad" required>
            <option value="1" <?php if (isset($cantidad) && $cantidad === "1")
                echo "selected"; ?>>1</option>
            <option value="2" <?php if (isset($cantidad) && $cantidad === "2")
                echo "selected"; ?>>2</option>
            <option value="3" <?php if (isset($cantidad) && $cantidad === "3")
                echo "selected"; ?>>3</option>
            <option value="4" <?php if (isset($cantidad) && $cantidad === "4")
                echo "selected"; ?>>4</option>
            <option value="5" <?php if (isset($cantidad) && $cantidad === "5")
                echo "selected"; ?>>5</option>
        </select>

        <br>

        <label for="nombre">Cliente:</label>
        <input value="<?php if (isset($_POST["cliente"]))
            echo $_POST["cliente"]; ?>" id="cliente" name="cliente" type="text">

        <input type="submit" value="Enviar">
    </form>

</body>

</html>
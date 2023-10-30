<?php
/*
Realiza un programa php que muestre un formulario para que 
un usuario pueda elegir su color favorito de una lista de colores. 
Crea otra página cuyo fondo esté establecido en el color que el usuario haya seleccionado. 
El color por defecto será el blanco. Usar cookies.
*/
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja Cookies: Ejercicio 3</title>
</head>
<body>
    <h1> Dime tu color favorito para que ocurra la magia </h1>
    <form action="color_favorito.php" method="post">
        <label for="color"> Selecciona tu color favorito de esta lista: </label>
        <select name="color" id="color">
            <option value="pink">Rosa</option>
            <option value="red">Rojo</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
            <option value="purple">Morado</option>
        </select>
        <button type="submit"> Enseñame tu magia </button>
    </form>
</body>
</html>

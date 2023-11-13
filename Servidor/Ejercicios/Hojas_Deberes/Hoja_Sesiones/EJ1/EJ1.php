<?php
/*Realizar un código PHP que obtenga mediante un formulario el nombre de un usuario 
y su clave, en una segunda página crearemos dos variables de sesión y 
en una tercera página recuperaremos los valores almacenados en las variables 
de sesión dando un mensaje de bienvenida al usuario.*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hoja Sesiones </title>
</head>
<body>
    <h1> Hoja Sesiones: Ejercicio 1 </h1>
    <form action="variableSesion.php" method="post">
        <label for="usuario"> Usuario: </label>
        <input type="text" id="usuario" name="usuario" required value="<?php if (isset($_COOKIE['usuario'])) echo $_COOKIE['usuario']; ?>">
        <label for="clave"> Clave: </label>
        <input type="text" id="clave" name="clave" required value="<?php if (isset($_COOKIE['clave'])) echo $_COOKIE['clave']; ?>">
        <button type="submit"> Entrar </button>
    </form>
</body>
</html>
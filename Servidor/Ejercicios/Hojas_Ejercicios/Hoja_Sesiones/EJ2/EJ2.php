<?php
/*Crea una página php que mediante una sesión registre el usuario y el email 
que se introducen en un formulario  (formulario en uno). En esa misma página, 
obtener el identificador de sesión y el nombre de sesión, visualizando ambos datos por pantalla. 
A continuación ir a la página mod_sesion.php, dónde debemos modificar el nombre de sesión, 
obtener el identificador de sesión y mostrar ambos datos por pantalla. 
Por último esta página debe visualizar las variables que están registradas 
en la sesión e ir a la página del_sesion.php dónde un script se encarga de guardar 
las variables de sesión en una cadena, la visualiza y destruye las variables de sesión y la sesión actual.*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hoja Sesiones </title>
</head>
<body>
    <h1> Hoja Sesiones: Ejercicio 2 </h1>
    <form action="variableSesion.php" method="post">
        <label for="usuario"> Usuario: </label>
        <input type="text" id="usuario" name="usuario" required value="<?php if (isset($_COOKIE['usuario'])) echo $_COOKIE['usuario']; ?>">
        <label for="clave"> Email: </label>
        <input type="text" id="email" name="email" required value="<?php if (isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>">
        <button type="submit"> Entrar </button>
    </form>
</body>
</html>
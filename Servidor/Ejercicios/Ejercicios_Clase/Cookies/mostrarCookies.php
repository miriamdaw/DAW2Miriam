<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP: Recuperación de Cookies</title>
</head>
<body>
    <h2 align="Center">Cookies Disponibles</h2>
    <table border="1" align="Center">

<?php
//listamos el contenido de la matriz $_COOKIE
echo "<tr><th> Nombre Cookie </th><th> Valor </th></tr> \n";
if(empty($_COOKIE))
    echo " No hay cookies válidas disponibles";
else
foreach($_COOKIE as $nombre_cookie => $valor_cookie)
echo "<tr><td nowrap>$nombre_cookie</td><td>$valor_cookie</td></tr>";
?> 
</body>
</html>


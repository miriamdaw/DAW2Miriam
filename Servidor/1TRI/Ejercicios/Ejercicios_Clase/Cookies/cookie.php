<?php
/*//////////////////////////////////////////////////
*   Este script envia una cookie
*///////////////////////////////////////////////////


//GENERAMOS LOS VALORES QUE SE VAN A ESPECIFICAR PARA LA COOKIE
$nombre = "ay_mi_cookie";
$valor = 404;
$fecha_expiracion = time() + 600;
$path = dirname($_SERVER["REQUEST_URI"]);


//ENVIAMOS LA COOKIE
setcookie($nombre, $valor, $fecha_expiracion, $path, "", 0);


//ESCRIBIMOS LA INFO (Y PARA QUE NO APAREZCA UNA PAGINA EN BLANCO)
echo "Cookie enviada: $nombre, $valor, $fecha_expiracion, $path \n";


?>
<?php
/**
 * https://www.php.net/manual/es/function.password-verify.php
 * Comprueba que el hash proporcionado coincida con la contraseña facilitada. 
 * password_verify() es compatible con crypt(). Por lo tanto, los hashes de contraseñas
 * creados por crypt() pueden utilizarse con password_verify().
 * Observe que password_hash() devuelve el algoritmo, el coste y el salt como parte del hash devuelto. 
 * Por lo tanto, toda la información que es necesaria para verificar el hash está incluida. 
 * Esto permite a la función de verificación comprobar el hash sin la necesidad de almacenar 
 * por separado la información del salt o del algoritmo.
 * Esta función es segura contra ataques basado en tiempo.
 */

// Ver el ejemplo de password_hash() para ver de dónde viene este hash.
$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

if (password_verify('rasmuslerdorf', $hash)) {
    echo 'La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}

?>
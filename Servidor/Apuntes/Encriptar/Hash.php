<?php
/**
 * https://www.php.net/manual/es/ref.password.php
 * https://www.php.net/manual/es/function.password-hash.php 
 * 
 * 
 * password_hash(string $password, integer $algo, array $options = ?): string
 */

 /**
 * Queremos crear un hash de nuestra contraseña uando el algoritmo DEFAULT actual.
 * Actualmente es BCRYPT, y producirá un resultado de 60 caracteres.
 *
 * Hay que tener en cuenta que DEFAULT puede cambiar con el tiempo, por lo que debería prepararse
 * para permitir que el almacenamento se amplíe a más de 60 caracteres (255 estaría bien)
 */

echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT)."\n";

/**
 * Sale algo así --> $2y$10$hhLz4l/N2osX55vxvaezpug7CN0iPOqEfMpGU2m6plARAfvkBzdG6
 * El algoritmo siempre da algo distinto
 * También hemos visto PASSWORD_BCRYPT
 */
?>
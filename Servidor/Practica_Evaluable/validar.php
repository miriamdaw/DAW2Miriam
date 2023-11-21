<?php
function validar($nombre, $email, $telefono, $mensaje)
{
    $errores = array();

    if (!ctype_upper($nombre[0]) || strlen($nombre) > 20) {
        $errores[] = "Su nombre debe comenzar con una letra mayúscula y tener una longitud de hasta 20 caracteres.";
    }

    if (strlen($mensaje) < 50) {
        $errores[] = "La descripción debe tener al menos 50 caracteres.";
    }

    if (!preg_match('/^[A-Za-z\- ]+$/', $nombre)) {
        $errores[] = "Su nombre no puede contener caracteres no válidos.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del email no es válido.";
    }

    // Cambiado para permitir espacios y guiones en el número de teléfono
    if (!ctype_digit(str_replace([' ', '-'], '', $telefono)) || strlen(str_replace([' ', '-'], '', $telefono)) !== 9) {
        $errores[] = "El teléfono debe contener solo números y tener una longitud de 9 dígitos.";
    }

    return $errores;
}


?>
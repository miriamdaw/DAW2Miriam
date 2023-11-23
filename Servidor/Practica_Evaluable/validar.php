<?php
function validar($nombre, $edad, $email, $telefono, $mensaje)
{
    $errores = array();

    if (!ctype_upper($nombre[0]) || strlen($nombre) > 20 || strlen($nombre) < 3) {
        $errores['nombre'] = "Su nombre debe comenzar con una letra mayúscula y tener una longitud entre 3 y 20 caracteres.";
    }

    if (!ctype_digit($edad) || $edad < 14 || $edad > 80) {
        $errores['edad'] = "Debes tener una edad comprendida entre 14-80 años.";
    }

    if (strlen($mensaje) < 50 || strlen($mensaje) > 500) {
        $errores['mensaje'] = "La descripción debe tener entre 50 y 500 caracteres.";
    }

    if (!preg_match('/^[A-Za-z\- ]+$/', $nombre)) {
        $errores['nombre'] = "Su nombre no puede contener caracteres no válidos.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = "El formato del email no es válido.";
    }

    if (!ctype_digit(str_replace([' ', '-'], '', $telefono)) || strlen(str_replace([' ', '-'], '', $telefono)) !== 9) {
        $errores['telefono'] = "El teléfono debe contener solo números y tener una longitud de 9 dígitos.";
    }

    return $errores;
}
?>
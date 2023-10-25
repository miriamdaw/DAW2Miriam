<?php

function validar($duenio, $descripcion) {
    $errores = array();

    if (!ctype_upper($duenio[0]) || strlen($duenio) > 20) {
        $errores[] = "El nombre del dueño debe comenzar con una letra mayúscula y tener una longitud de hasta 20 caracteres.";
    }

    if (strlen($descripcion) <= 50) {
        $errores[] = "La descripción debe tener al menos 50 caracteres.";
    }

    if (!preg_match('/^[A-Za-z\- ]+$/', $duenio)) {
        $errores[] = "El nombre del dueño contiene caracteres no válidos.";
    }

    if (empty($errores)) {
        return true;
    } else {
        return $errores;
    }
}

?>

<?php
function validar($nombre, $apellido, $validar) {
    if (!ctype_upper($nombre[0]) || !ctype_upper($apellido[0])) {
        return false;
    }

    if (preg_match($validar, $apellido) && preg_match('/^[A-Za-z\- ]+$/', $nombre) 
    && strlen($nombre) > 12 && strlen($apellido) > 12) {
        return true;
    } else {
        return false;
    }
    
}


?>
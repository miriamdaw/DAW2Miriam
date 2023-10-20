<?php
function validarNombre($nombre, $apellido, $validar){
    if(!ctype_upper($nombre[0])){
        return false;
    }

    if(strlen($nombre) > 12){
        return false;
    }


    if(!ctype_upper($apellido[0])){
        return false;
    }

    if(strlen($apellido) > 12){
        return false;
    }

    if(preg_match($validar, $apellido)){
        return true;
    }else{
        return false;
    }
}

//admita guion y espacio en blanco
//preg_match("patron", $variable)
?>
<?php

function validarNombre($nombre){
    if(!ctype_upper($nombre[0])){
        return false;
    }

    if(strlen($nombre) > 12){
        return false;
    }
    return true;
}


?>
<?php


// Accedemos a la sesión 4
session_name("sesiones-1-11");
session_start();

// Si el número no está guardado en la sesión, redirigimos a la primera página 5
if (!isset($_SESSION["numero"])) {
    header("Location:sesiones-1-11-1.php");
    exit;
}

// Funciones auxiliares 6
function recoge($var, $m = "")
{
    $tmp = is_array($m) ? [] : "";
    if (isset($_REQUEST[$var])) {
        if (!is_array($_REQUEST[$var]) && !is_array($m)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$var]));
        } elseif (is_array($_REQUEST[$var]) && is_array($m)) {
            $tmp = $_REQUEST[$var];
            array_walk_recursive($tmp, function (&$valor) {
                $valor = trim(htmlspecialchars($valor));
            });
        }
    }
    return $tmp;
}

// Recogemos accion
$accion = recoge("accion");

// Dependiendo de la acción recibida, modificamos el número guardado 7
if ($accion == "cero") {
    $_SESSION["numero"] = 0;
} elseif ($accion == "subir") {
    $_SESSION["numero"]++;
} elseif ($accion == "bajar") {
    $_SESSION["numero"]--;
}

// Volvemos al formulario 8
header("Location:sesiones-1-11-1.php");

?>
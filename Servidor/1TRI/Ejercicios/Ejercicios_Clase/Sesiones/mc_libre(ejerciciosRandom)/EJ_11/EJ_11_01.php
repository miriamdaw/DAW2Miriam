<?php
/*
Sesiones (1) 11 - Subir y bajar letra
Escriba un programa de dos páginas que muestre una letra y permita subirla o bajarla mediante dos botones.

La primera página contiene un formulario con tres botones de tipo submit con el mismo name.
La segunda página recibe el dato, modifica la letra y redirige a la primera página.
El número se guarda en una variable de sesión. Si la variable no está definida, se le dará el valor a.
*/


// Accedemos a la sesión 9
session_name("sesiones-1-04");
session_start();
?>

<!DOCTYPE html>
// ...
<body>
  <h1>Formulario Palabra en mayúsculas (Formulario)</h1>

  <form action="sesiones-1-04-2.php" method="get">

<?php
//Si no hemos detectado error en la palabra en mayúsculas y hay guardada una palabra en la sesión ... 14
if (!isset($_SESSION["mayusculasError"]) && !isset($_SESSION["minusculasError"])
    && isset($_SESSION["mayusculas"]) && isset($_SESSION["minusculas"]) ) {
    // ... mostramos la palabra
    print "    <p>Ha escrito una palabra en mayúsculas: <strong>$_SESSION[mayusculas]</strong>.</p>\n";
    print "\n";
    print "    <p>Ha escrito una palabra en minúsculas: <strong>$_SESSION[minusculas]</strong>.</p>\n";
    print "\n";
}

print "    <p>Escriba una palabra en mayúsculas y otra en minúsculas:</p>\n";
print "\n";

// Si hemos detectado un error en la palabra en mayúsculas
if (isset($_SESSION["mayusculasError"])) {
    // Escribimos un aviso e incluimos el valor incorrecto en el control 10
    print "    <p><label>Mayúsculas: <input type=\"text\" name=\"mayusculas\" value=\"$_SESSION[mayusculas]\" size=\"20\" maxlength=\"20\"></label> "
        . "<span class=\"aviso\">$_SESSION[mayusculasError]</span></p>\n";
    print "\n";
} elseif (isset($_SESSION["minusculasError"])) {
    // Si hemos detectado un error en la palabra en minúsculas, incluimos el valor correcto en el control 11
    print "    <p><label>Mayúsculas: <input type=\"text\" name=\"mayusculas\" value=\"$_SESSION[mayusculas]\" size=\"20\" maxlength=\"20\"></label></p>\n";
    print "\n";
} else {
    // Si no hemos detectado un error, escribimos el control vacío 12
    print "    <p><label>Mayúsculas: <input type=\"text\" name=\"mayusculas\" size=\"20\" maxlength=\"20\"></label></p>\n";
    print "\n";
}

// Si hemos detectado un error en la palabra en minúsculas 13
if (isset($_SESSION["minusculasError"])) {
    // Escribimos un aviso e incluimos el valor incorrecto en el control
    print "    <p><label>Minúsculas: <input type=\"text\" name=\"minusculas\" value=\"$_SESSION[minusculas]\" size=\"20\" maxlength=\"20\"></label> "
    . "<span class=\"aviso\">$_SESSION[minusculasError]</span></p>\n";
    print "\n";
} elseif (isset($_SESSION["mayusculasError"])) {
    // Si hemos detectado un error en la palabra en mayúsculas, incluimos el valor correcto en el control
    print "    <p><label>Minúsculas: <input type=\"text\" name=\"minusculas\" value=\"$_SESSION[minusculas]\" size=\"20\" maxlength=\"20\"></label></p>\n";
    print "\n";
} else {
    // Si no hemos detectado un error, escribimos el control vacío
    print "    <p><label>Minúsculas: <input type=\"text\" name=\"minusculas\" size=\"20\" maxlength=\"20\"></label></p>\n";
    print "\n";
}
?>
<?php

//extensiones relacionadas sistema de ficheros -> sistema de ficheros
//funciones de sistema de archivos
/*
$fich = fopen("ejemplo.txt", "r");
if ($fich === False) {
    echo "No se encuentra fichero ejemplo.txt<br>";
} else {
    echo "fichero ejemplo.txt se abrió con éxito<br>";
}

$fich = fopen("fichero_no_existe.txt", "r");
if ($fich === False) {
    echo "No se encuentra fichero_no_existe.txt<br>";
} else {
    echo "si existe";
}

echo "<br>";



////////////// caracter misma linea

$fich = fopen("ejemplo.txt", "r");
if ($fich === False) {
    echo "No se encuentra fichero ejemplo.txt<br>";
} else {
    while (!feof($fich)) {
        $caracter = fgetc($fich);
        echo $caracter;
    }
}
echo "<br><br>";


///////////// fgets
$fich2 = fopen("ejemplo.txt", "r");
if ($fich2 === False) {
    echo "No se encuentra fichero ejemplo.txt<br>";
} else {
    while (!feof($fich2)) {
        $caracter = fgets($fich2);
        echo "$caracter<br>";
    }
}


//////////// caracter a caracter (FALTA)
$fich3 = fopen("ejemplo.txt", "a+");
if ($fich3 === false) {
    echo "No se encuentra el archivo ejemplo.txt<br>";
} else {
    $cadena = "Madrid";
    fwrite($fich3, $cadena, 1);


}
fclose($fich3);

*/
/////////// array
$fich4 = fopen("ejemplo.txt", "w+");
if ($fich4 === False) {
    echo "No se encuentra fichero ejemplo.txt<br>";
} else {
    $cadenas[0] = "Madrid";
    $cadenas[1] = "Barcelona";
    $cadenas[2] = "Zaragoza";

    $i = 0;
    while ($i < sizeof($cadenas)) {
        fwrite($fich4, $cadenas[$i]);
        $i++;
    }

    rewind($fich4);
    while (!feof($fich4)) {
        echo fgets($fich4);
    }
    fclose($fich4);

}
?>
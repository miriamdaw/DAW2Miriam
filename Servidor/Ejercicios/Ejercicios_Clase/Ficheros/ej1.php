<?php
/*
1- Hacer una copia de un txt -> 2.txt
2- Delete de 1.txt
3- Pasar 2.txt a string con file_get_contents
4- Pasar 2.txt a array con file
5- Obtener Fileatime y filectime de 2.txt
6- Probar fscanf
*/
/*
/////////1- Hacer una copia de un txt -> 2.txt
$fichero1 = 'C:/xampp/htdocs/DAW2/Servidor/Ejercicios/Ejercicios_Clase/Ficheros/fichero1.txt';
$fichero2 = 'C:/xampp/htdocs/DAW2/Servidor/Ejercicios/Ejercicios_Clase/Ficheros/fichero2.txt';

if (copy($fichero1, $fichero2)) {
    echo "Fichero copiado con éxito.";
} else {
    echo "Error al copiar el fichero.";
}

echo "<br>";


/////////2- Borrar 1.txt -> unlink
if (unlink($fichero1)) {
    echo "Fichero borrado con éxito.";
} else {
    echo "Error al borrar el fichero.";
}

echo "<br>";


/////////3- Pasar 2.txt a string con file_get_contents
$cadenaFich2 = file_get_contents($fichero2);
echo "$cadenaFich2";


echo "<br>";


/////////4- Pasar 2.txt a array con file
$arrayFich2 = file($fichero2);
print_r($arrayFich2);


echo "<br>";


/////////5- Obtener Fileatime y filectime de 2.txt
if (file_exists($fichero2)) {
    echo "El último acceso al fichero2 fue: " . date("F d Y H:i:s.", fileatime($fichero2));
}


echo "<br>";


if (file_exists($fichero2)) {
    echo "La última modificación del fichero2 fue: " . date("F d Y H:i:s.", filectime($fichero2));
}


echo "<br>";


/////////6- Probar fscanf
$archivo = fopen($fichero2, 'r');

if ($archivo) {
    fscanf($archivo, "%[^\n]", $primeraLinea);

    echo "Primera línea leída: $primeraLinea<br>";

    fclose($archivo);
} else {
    echo "Error al abrir el fichero.";
}


/////////7- Dirname
$directorio = dirname($fichero2);
echo "El directorio del fichero2 es: $directorio";

*/
/////////8- Abrir xml
$datos = simplexml_load_file("empleados.xml");
	echo "<br>";
	if($datos===false){
		echo "Error al leer el fichero";
	}
	foreach($datos as $valor){
		print_r($valor);
		echo "<br>";
	}

?>
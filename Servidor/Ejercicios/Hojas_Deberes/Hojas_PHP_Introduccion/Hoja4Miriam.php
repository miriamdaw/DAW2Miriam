<?php

/*
EJERCICIOS ARRAYS

1.- A partir del Array. obtener dos arrays escalares, uno con los valores y otro con los indices.
*/

$alumno=array(
"nombre" => "José",
"apellidos" => "Martínez Roca",
"telefono" => "96 361 66 54",
"direccion" => "C/ Arco del triunfo 13",
"dni" => "22 111 055",
"num_matricula" => "6666",
"facultad" => "Facultad Informática",
"curso" => "5" 
); 

$arrayValores = array_values($alumno); //regresa todos los valores de un array
$arrayIndices = array_keys($alumno); //regresa todas las claves de un array

print_r($arrayValores);
echo "<br>";
print_r($arrayIndices);
echo "<br>";


/*
2.- Crea un array de dos dimensiones de manera que en una dimensión contenga el tipo de colores 
(fuerte o suave) y en la otra 3 colores de cada tipo. Visualiza una tabla como la siguiente recorriendo el array:
*/

$colores = array(
    "fuerte" => array("rojo","verde","azul"),
    "suave" => array("rosa","amarillo","malva")
);

print_r($colores);
echo "<br>";


/* 
3.- Visualiza los siguientes arrays mediante el correspondiente código php;
*/

//a)
$miFecha = array(
array(
array("13 de enero de 2015", "11 de febrero de 2018"),
array("13 de enero de 2020", "11 de febrero de 2015"),
),
array(
array("3 de agosto de 2017", "1 de octubre de 2016"),
array("3 de agosto de 2013", "1 de octubre de 2019"),
),
array(
array("10 de junio de 2020", "11 de marzo de 2019"),
),
array(
array("22 de marzo de 2020", "28 de mayo de 2019"),
array("22 de marzo de 2019", "28 de mayo de 2018"),
array("22 de marzo de 2018", "28 de mayo de 2017"),
array("22 de marzo de 2017", "28 de mayo de 2016"),
)
);

echo "Ejercicio 3/a)";
echo "<br>";
print_r($miFecha);
echo "<br>";


//b)
$equipo_futbol = array
 					(
 					array("Rooney","Chicharito","Gigs"),
 					array("Suarez"),
 					array("Torres","Terry","Etoo")
 					);

echo "Ejercicio 3/b)";     
echo "<br>";              
print_r($equipo_futbol);
echo "<br>";


//c)
$datos = array(
    array(array(0, 0, 0),
          array(0, 0, 1),
          array(0, 0, 2) 
          ),
    array(array(0, 1, 0),
          array(0, 1, 1),
          array(0, 1, 2) 
          ),
    array(array(0, 2, 0),
          array(0, 2, 1),
          array(0, 2, 2) 
          )
    );

echo "Ejercicio 3/c)";     
echo "<br>";              
print_r($datos);
echo "<br>";


//d)
$supermercado = array("Electrodomesticos" => array("Televisor",  "Heladera"), "alimentos" => array("Carne", "Leche", "Verduras"));

echo "Ejercicio 3/d)";     
echo "<br>";              
print_r($supermercado);
echo "<br>";


//e)
$productos=array(
    "procesador" => array(
    "AMD" => "K7 XP 1800",
    "PENTIUM" => "IV 2,5 Ghz"
    ),
    "disco_duro" => array(
    "SEAGATE" => "40GB 10000 rpm",
    "SAMSUNG" => "40GB 7200 rpm",
    "WESTERN_DIGITAL" => "60GB 7200 rmp 8MB caché"
    )
    ); 

echo "Ejercicio 3/e)";     
echo "<br>";              
print_r($productos);
echo "<br>";


//f)
$productos["procesador"]["AMD"][0]="K7 XP 1900";
$productos["procesador"]["AMD"][1]="K7 XP 1800";
$productos["procesador"]["AMD"][2]="K7 XP 1700";
$productos["procesador"]["PENTIUM"][0]="IV 2,5 Ghz";
$productos["procesador"]["PENTIUM"][1]="IV 2,4 Ghz";
$productos["procesador"]["PENTIUM"][2]="IV 2,3 Ghz";
$productos["procesador"]["PENTIUM"][3]="IV 2,2 Ghz";
$productos["disco_duro"]["SEAGATE"][0]=" 40GB 10000 rpm";
$productos["disco_duro"]["SEAGATE"][1]=" 80GB 7200 rpm";
$productos["disco_duro"]["SEAGATE"][2]=" 160GB 7200 rpm";
$productos["disco_duro"]["SAMSUNG"][0]=" 40GB 7200 rpm";
$productos["disco_duro"]["WESTERN_DIGITAL"][0]=" 60GB 7200 rpm 8MB cache";
$productos["disco_duro"]["WESTERN_DIGITAL"][1]=" 80GB 10000 rpm 16MB cache"; 
//DA ERROR
echo "Ejercicio 3/f), DA ERROR";     
echo "<br>";              
print_r($productos);
echo "<br>";


$productos = array(
    "procesador" => array(
        "AMD" => array("K7 XP 1900", "K7 XP 1800", "K7 XP 1700"),
        "PENTIUM" => array("IV 2,5 Ghz", "IV 2,4 Ghz", "IV 2,3 Ghz", "IV 2,2 Ghz")
    ),
    "disco_duro" => array(
        "SEAGATE" => array("40GB 10000 rpm", "80GB 7200 rpm", "160GB 7200 rpm"),
        "SAMSUNG" => array("40GB 7200 rpm"),
        "WESTERN_DIGITAL" => array("60GB 7200 rpm 8MB cache", "80GB 10000 rpm 16MB cache")
    )
);

echo $productos["procesador"]["AMD"][0]; // Acceder al primer procesador AMD
echo "<br>";
echo $productos["disco_duro"]["SEAGATE"][1]; // Acceder al segundo disco duro SEAGATE
echo "<br>";


/*
4.- Dado el array, Realiza un código php que visualice todas las claves asociadas a Álvaro. 
Utilizar current() y next() para recorrer el array y key() para obtener las claves en el recorrido.
Al final situar el puntero interno en el primer elemento del array (reset()) y devolver el valor asociado.
*/
$array = array(
    'k0' => 'Juan',
    'k1' => 'Álvaro',
    'k2' => 'Maite',
    'k3' => 'Álvaro',
    'k4' => 'Juan',
    'k5' => 'Martina'
);

foreach($array as $clave => $valor){
    if($valor == 'Álvaro'){
        echo "Clave asociada a Álvaro: $clave ";
    }
}
echo "<br>";

//con current() y next()
$clavesAlvaro = array();
reset($array); //--> situa el puntero interno al inicio del array

while(current($array) !== false){ //--> dice el elemento actual del array
    if(current($array) == 'Álvaro'){
        $clavesAlvaro[] = key($array); //--> obtiene una clave de un array

    }
    next($array); //--> avanza el punto interno del array
}

echo "Claves asociadas a Álvaro: ";
print_r($clavesAlvaro);
echo "<br>";
reset($array);


/*5.- Realizar la primera parte del ejercicio anterior utilizando una sola instrucción 
con array_keys() y print_r(), sin recorrer el array mediante un bucle.*/

$clavesAlvaro = array_keys($array, 'Álvaro');
print_r($clavesAlvaro);
echo "<br>";


//6.- A partir del array, visualiza sus claves utilizando una sola instrucción como en el ejercicio 2.
$supermercado = array(
    "Electrodomesticos" => array("Televisor",  "Heladera"), "alimentos" => array("Carne", "Leche", "Verduras"));

$clavesSupermercado = array_keys($supermercado);
print_r($clavesSupermercado);
echo "<br>";


/*
7.- A partir del array, recorrerlo del final al principio utilizando end(), while, y prev() 
y visualizar su contenido con current().
A continuación recorrerlo del principio al final  utilizando reset(),while,  y next() 
y visualizar sus claves con  key().

¿El valor null en num_matrícula provoca algún problema en alguno de los recorridos realizados? --> no*/
$alumno=array(
    "nombre" => "José",
    "apellidos" => "Martínez Roca",
    "telefono" => "96 361 66 54",
    "direccion" => "C/ Arco del triunfo 13",
    "dni" => "22 111 055",
    "num_matricula" => null,
    "facultad" => "Facultad Informática",
    "curso" => "5"
    );

//a)
end($alumno); //--> situa el puntero interno al final del array
while(prev($alumno) !== false){ //--> devuelve el valor del array en la posicion anterior
    echo current($alumno) . "\n";
}
echo "<br>";

//b)
reset($alumno);
while (key($alumno) !== null) {
    echo key($alumno) . "\n";
    next($alumno);
}
echo "<br>";


//8.- Realizar el mismo ejercicio con este array

$ciudades = array();
$ciudades[5]='Madrid';
$ciudades[7]='Oviedo';
$ciudades[]='Cáceres';
$ciudades[]='Alicante';
$ciudades[]='Almería';
$ciudades[]='Zaragoza';


?>
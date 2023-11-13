<?php

/*

HOJA 1 EJERCICIOS PHP 26/09/2023
PRIMER TRIMESTRE

1.- Indica la salida por pantalla del siguiente script:
--> 777888
*/

$a=7;
$b=&$a; //&$ --> el cambio va a afectar a los dos cuando se cambie el valor
$c=&$b;
echo
$a,$b,$c;
$b=8;
echo $a,$b,$c;


/*
2.- Indica la salida por pantalla del siguiente script:
--> Warning: Undefined variable $a 88
*/

$a=7;
$b=&$a;
$c=&$b;
echo $a,$b,$c;
unset($a); //sin definir
$b=8;
echo $a,$b,$c;


/*
3.- Indica la salida por pantalla del siguiente script:
--> var1var2var1var3
*/

$a="var1";
$$a="var2";
echo $a, $var1;
$$var2="var3";
echo $a,$var2;

/*
For example, if you consider this portion of code:

$real_variable = 'test';
$name = 'real_variable';
echo $$name;

You will get the following output:

test
*/


//4.- Hacer un programa en PHP que escriba tu nombre (en negrita) y la ciudad dónde naciste.

$nombre = "Miriam";
$ciudad = "Móstoles";
echo "<b>$nombre</b>",",",$ciudad;


/*5.- Detectar siete errores en el siguiente código:

<?php
$x = -1; 
$y = 9;
$suma = x + y; //faltan los $ 2
print("El valor de x es <i>$x<i>") //--> falta barrita y no tiene ; 2
<br /> //--> sobra la barra / y falta el ; 2
print("El valor de y es <i>$y</i><br />"; //--> parentesis y br 2
print("La suma es <b><i>$suma</i></b><br />");//--> br 1
//? >;  //--> sobra el ; 1
*/


/*
6.- Hacer un programa en PHP que calcule el área de un círculo de radio 2.5 cms. Utilizar 
una constante para PI.*/

define("NUMEROPI",3.14);
$radio = 2.5;
$area = $radio*$radio*NUMEROPI;
echo $area;


/*
7.- Indica la salida del siguiente código:
--> El contenido de la variable $dato es $dato
--> El contenido de la variable $dato es $dato
*/

$dato="prueba";
echo 'El contenido de la variable $dato es $dato';
echo 'El contenido de la variable $dato es $dato';


/*
8.- Obtén el script PHP para la siguiente salida por pantalla de dos formas diferentes: 	
escapando las comillas y sin escapar las comillas

/*Aquí se pueden añadir comillas “dobles”
Aquí se pueden añadir comillas ‘simples’*/

echo("Aquí se pueden añadir comillas \"dobles\"
Aquí se pueden añadir comillas 'simples'");


//9.- Completa el siguiente script:

$variable=NULL;
if ($variable) echo $variable;
else echo "NULL";


/*
10.- Declara en un script una variable de tipo coma flotante con su valor correspondiente 
mostrando por pantalla su contenido y su tipo. Cambia el tipo de la variable a boolean y muestra su contenido y su tipo.
--> 1234double 1boolean
*/

echo "<br>";
$variable = 1.234;
echo $variable;
echo gettype($variable);
echo "<br>";
$variable = (bool) $variable;
echo $variable;
echo gettype($variable);

?>


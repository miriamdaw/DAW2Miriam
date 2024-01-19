<?php
/*

HOJA 2 EJERCICIOS PHP 26/09/2023
PRIMER TRIMESTRE
Variables, operadores y expresiones


1.- 
Indica la salida:
-->Ejemplo de operaciones comparacion en PHP
-->1     11

<!DOCTYPE html>
<html>
<head>
<title>Ejemplo de operadores de Comparacion</title>
</head>
<body>
<h1>Ejemplo de operaciones comparacion en PHP</h1>
<?php
$a = 8;
$b = 3;
$c = 3;
echo $a == $b, "<br>";
echo $a != $b, "<br>";
echo $a < $b, "<br>";
echo $a > $b, "<br>";
echo $a >= $c, "<br>";
echo $a <= $c, "<br>";
?>
</body>
</html>



2.- 
Indica la salida:
-->Ejemplo de operaciones logicas en PHP
-->1

<html>
<head>
<title>Ejemplo de operadores Logicos</title>
</head>
<body>
<h1>Ejemplo de operaciones logicas en PHP</h1>
<?php
$a = 8;
$b = 3;
$c = 3;
echo ($a == $b) && ($c > $b), "<br>";
echo ($a == $b) || ($b == $c), "<br>";
echo !($b <= $c), "<br>";
?>
</body>
</html>


3.-
Indica la salida:
-->Calculos, redondeo y formato.
El precio es de 101.98 y el IVA el 0.196%
Resultado: 19.99 con ROUND()
19.98808 normal

Usando la funcion SPRINTF se ve asi: 19.99


<html>
<head>
<title>Calculos </title>
</head>
<body>
<h1>Calculos, redondeo y formato. </h1>
<?php
/ * Primero declaramos las variables * /
$precioneto = 101.98;
$iva = 0.196;
$resultado = $precioneto * $iva;
echo "El precio es de ";
echo $precioneto;
echo " y el IVA el ";
echo $iva;
echo "% <br>";
echo "Resultado: " ;
echo round($resultado,2);
echo " con ROUND() <br>";
echo $resultado;
echo " normal \n";
echo "<br><br>";
$resultado2= sprintf("%01.2f", $resultado); 
echo "Usando la funcion SPRINTF se ve asi: ";
echo $resultado2
?>
</body>
</html>



4.- 
La funcion RAND nos retorna un valor aleatorio entre un rango de dos enteros: 
$num = rand(1,100). 

Hacer un programa que almacene en la variable $num un valor entero generado 
en forma aleatoria entre 1 y 100 y lo muestre por pantalla. 
Mostrar además si es menor o igual a 50 o si es mayor. 
Utilizar para ello el operador condición?acción1:acción2 como estructura alternativa.
*/

$num = rand(1,100);
echo $num;

if($num < 50) echo("Menor a 50");
else if($num > 50) echo("Mayor a 50");
else if($num == 50) echo("Igual a 50");


/*
5.- 
Completa el siguiente código:
--> variable definida variable no definida
--> foo foo
*/

$var="prueba";
if (isset($var)) echo "Variable definida"; //comprueba si una variable ha sido definida
if (empty($var)) echo "Variable no definida";

unset($var); //le quita su valor
if (isset($var)) echo "Variable definida";
if (empty($var)) echo "Variable no definida";

$var="foo";
if ((bool) $var) echo $var;
if (!empty($var))  echo "Variable definida";


/*
6.-
Completa:
(en los apuntes del drive esta la respuesta)


7.-
Indica la salida:
--> 891010
*/

$a=3;
$a+=5;
$b=$a++; //Retorna $a, y luego incrementa $a en uno.
echo $b, $a;
$b=++$a; //Incrementa $a en uno, y luego retorna $a.
echo $b, $a;



/*
8.-
Las variables que aparecen en una cadena se evalúan cuando... c. La cadena va entre comillas dobles

a. La cadena va entre comillas simples
b. En ningún caso
d. Cuando se utiliza el carácter de escape \$



9.-
Para definir una constante en php debe utilizar la función... d. define(constante, valor)

a. constant()
b. const()
c. defined(constante)



10.- 
El operador división ("/")... d. Devuelve un valor entero sólo si los operandos son enteros --> ninguna es valida

a. Devuelve un valor flotante sólo si ambos operandos son números en coma flotante
b. Devuelve siempre un valor entero
c. Devuelve siempre un valor flotante


*/

?>
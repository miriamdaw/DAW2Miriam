<?php

//para escribir en php se empieza con  -->  <?php
//y se termina con  -->  ? > 
//las sentencias se terminan con ; como en java

//no es necesario indicar el tipo de dato al declarar una variable, al contrario que java
//las variables no se declaran, se crean la primera vez que se les asigna un valor


//los identificadores de las variables siempre van precedidos de un  -->  $ 
//el identificador debe comenzar por una letra o un guion bajo, puede estar formado por 
//numeros, letras y guiones bajos.

//crear una variable  -->  $nombre = valor;

$variable1 = 2;
//es de tipo int

$entero = 4;
$numerodecimal = 2.5;
$cadena = "hola";
$bool = TRUE;

//cambiar valores
$a = 5;
echo gettype($a); //imprime el tipo de dato de a
echo "<br>";
$a = "Hola"; //se ha cambiado a cadena
echo gettype($a); //se comprueba que ha cambiado

//la salida sera:
//integer
//string

//si hacemos esto; 
$b = $a;
//se creara una variable b con el valor que tuviese a, que ahora mismo es "Hola"

//en cambio si usamos el & así;
$var2 = &$var1;
//lo que hacemos es que var2 apunta a la misma direccion de memoria que var1, son dos nombres
//diferentes que apuntan al mismo dato

//ejemplo:
$var1 = 100;
$var2 = &$var1; //asignacion por referencia
$var3 = $var1; //asignacion por copia
echo "$var2<br>"; //muestra 100
$var2 = 300; //cambia el valor de $var2
echo "$var1<br>"; //$var1 también cambia
$var3 = 400; //este cambio no afecta a $var1
echo $var1;

//la salida va a ser:
//100
//300
//300


//VARIABLES NO INICIALIZADAS
//--> si se intenta utilizar una variable antes de asignarle un valor, se genera un error
//de tipo E_NOTICE/WARNING, pero NO se interrumpe la ejecución del script. Si una variable no
//inicializada aparece dentro de una expresión, dicha expresión se calcula tomando el valor
//por defecto para ese tipo de dato.
$vari1 = 100;
$vari3 = 100 + $vari2; //$vari2 no existe, se toma como 0
echo "$var3 <br>"; //muestra 100
$var3 = 100 * $var2; //&var2 no existe, se toma como 0
echo "$var3 <br>"; //muestra 0
//el error que sale es Notice: Undefined variable: vari2


//CONSTANTES
//--> para definir constantes se utiliza la función define(), que recibe el nombre de la
//constante y el valor que queremos darle.
//es habitual utilizar identificadores en mayúsculas para las constantes.
define("LIMITE",1000);

define("CONSTANTE", "Hola mundo.");
echo CONSTANTE; //imprime "Hola mundo"

define("SALUDO", "Hola tú", true);
echo SALUDO; //imrpime "Hola tu"

define("ANIMALES", array(
    "perro",
    "gato",
    "pajaro"
));

echo ANIMALES[1]; //muestra gato


//1.- ejercicio calcular el area de un circulo con define
define("NUMEROPI",3.14);
$radio = 18;
$area = $radio * $radio * NUMEROPI;
echo $area;

//2.- ejercicio con const
const numeropi = 3.14;
$radio2 = 18;
$area2 = $radio2 * $radio2 * numeropi;
echo $area2;


//TIPOS DE DATOS ESCALARES
//--> PHP ofrece cuatro tipos de datos escalares --> integer, boolean y string.
//NUMEROS 
//--> Numeros enteros --> integer.
//Se pueden conocer el tamaño y los valores máximo y mínimo de un entero mediante las
//constantes: 

//PHP_INT_SIZE
//PHP_INT_MAX
//PHP_INT MIN


//--> Numeros reales --> float (14 decimales)
//La conversión entre integer y float es automática. 
//Si se recibe un float cuando se espera un integer, se trunca.
//Si al realizar una operación sobre un entero el resultado supera los valores límite
//o tiene decimales, se convierte a float.
//También se puedeb utilizar los operadores de conversión, (int) o (float).


$hg = 3/2;
$ab = 7e2; //notacion cientifica

echo "<br>";
echo $ab;

$variable0 = 0;

echo "<br>";
echo $variable0;

$variable0bool = (bool)$variable0;
echo $variable0bool;


echo "<br>";
$varfloat = 0.0;
$varfloat2 = 1.0;

$variable1bool = (bool)$varfloat;
echo $variable1bool;
echo "<br>";
$variable2bool = (bool)$varfloat2;
echo $variable2bool;

echo "<br>";

$a = 1;
$b = 2;

function Suma(){
    $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}

Suma();
echo $b;

echo "<br>";



//ESTRUCTURAS DE CONTROL

//  * Estructuras condicionales
//      1. if
//      Se pueden usar las dos maneras

if ($var < 0) echo "Es menor que 0";

if($var > 0) {
    echo "Es mayor que 0";

}


//      2. elseif

if($var == 1){
    echo "Es un uno";
}elseif ($var == 2){
    echo "Es un dos";
}else{
    echo "No es un uno ni un dos";
}


//      3. switch

switch($var){
    case 1:
        echo "Es uno";
    break;
    case 2:
        echo "Es dos";
    break;
    case 3:
        echo "Es tres";
    break;
    default:
        echo "No es 1, ni 2, ni 3";
}


/*      4. for
for (instrucciones de inicializacion; condicion; instrucciones de iteracion){
    intrucciones del bucle;
}*/

for($i = 0; $i < 5; $i = $i + 1){
    echo "$i <br>";
}


/*      5. while
while (condicion){
    instrucciones;
}*/

$i = 0;
while($i < 5){
    echo "$i <br>";
    $i = $i + 1;
}


/*      6. do while
do{
    instrucciones;
}while(condicion);
*/

$i = 0;
do{
    echo "$i <br>";
    $i = $i + 1;
}while ($i < 5);



/*OTRAS ESTRUCTURAS DE CONTROL

--> 1.- include

(test.php)
<?php

echo "Una $fruta $color"; // Una

include 'vars.php';

echo "Una $fruta $color"; // Una manzana verde
?>

(vars.php)
<?php

$color = 'verde';
$fruta = 'manzana';
?>
*/


//Hemos visto funciones (carpeta Funciones, sumar y acumular)


/*      7. foreach
*/



//explode (string $delimiter, string )
echo "<br>";
$pizza = "porcion1 porcion2 porcion3 porcion4 porcion5 porcion6";
$porciones = explode(" ", $pizza);
print_r($pizza);
echo "<br>";
echo "porciones[1] = ";
echo $porciones[0];
echo "<br>";
echo "porciones[2] = ";
echo $porciones[1];
echo "<br>";

//str_shuffle(string $str): string
$string = "sillasGaming3000"; 
echo str_shuffle($string);
echo "<br>";

$str = "Hola amigo";
$arr1 = str_split($str);
$arr2 = str_split($str,3);
print_r($arr1);
echo "<br>";
print_r($arr2);


/*codigo visualice por orden alfabetico dos personas con su edad, si se llaman igual, que aparexzca primero la de menor edad
formulario
strcmp:

strcmp(string $str1, string $str2): int
*/


/*
Arrays --> ordenación
sort --> quicksort (ordenacion rapida)

asort
*/











?>





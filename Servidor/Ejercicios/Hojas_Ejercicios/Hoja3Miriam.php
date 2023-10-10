<?php

                                                                                   
//1. Dadas tres variables enteras $a, $b, $c, visualizar la mayor. Resolverlo con dos  if compactos.
//en una sola linea, interrogacion
//SINTAXIS --> $resultado = $a > $b ? true : false;

$a = rand(1,100);
$b = rand(1,100);
$c = rand(1,100);

echo "$a, $b, $c";
echo "<br>";
echo ($a > $b && $a > $c ? "$a es mayor que $b y $c" : ($b > $a && $b > $c ? "$b es mayor que $a y $c" : "$c es mayor"));
echo "<br>";


//2. Dadas tres variables string  $a, $b, $c a las que se asignan tres cadenas cualesquiera escribe un código php que visualice la cadena de mayor longitud.

$a = "perro";
$b = "elefante";
$c = "mamut";

echo strlen($a);
echo "<br>";
echo strlen($b);
echo "<br>";
echo strlen($c);
echo "<br>";

if(strlen($a) > strlen($b) && strlen($a) > strlen($c)){
    echo "La cadena de mayor longitud es --> $a";

}else if(strlen($b) > strlen($a) && strlen($b) > strlen($c)){
        echo "La cadena de mayor longitud es --> $b";
    }else{
        echo "La cadena de mayor longitud es --> $c";
    }


//3. Escribir un código que genere un número aleatorio entre 1 y 100 y visualice si es par o impar.

echo "<br>";
$numero = rand(1,100);
echo $numero;
echo "<br>";
if($numero % 2 == 0){
    echo "Es par";
}else{
    echo "Es impar";
}
echo "<br>";


/*4. La función date(“D”) devuelve un día de la semana en el formato “Mon”, “Tue”,... 
Escribe un código php que evalue la expresión devuelta por la función date() y visualice el nombre completo del día en castellano. Utiliza switch.*/

$date = date("D");
echo $date;
echo "<br>";

switch($date){
    case "Mon":
    echo "Es Lunes";
    break;
    case "Tue":
    echo "Es Martes";
    break;
    case "Wed":
    echo "Es Miércoles";
    break;
    case "Thu":
    echo "Es Jueves";
    break;
    case "Fri":
    echo "Es Viernes";
    break;
    case "Sat":
    echo "Es Sábado";
    break;
    case "Sun":
    echo "Es Domingo";
    break;

}
echo "<br>";


/*5. Escribe un código que dadas tres variables string $a, $b, $c las concatene de forma que la primera sea la de menor longitud, 
la segunda la siguiente de menor longitud  y la tercera la de mayor longitud.*/

$a = "corta";
$b = "mediana";
$c = "maslarga";
$cadena;

if(strlen($a) > strlen($b) && strlen($a) > strlen($c)){
    $maslarga = $a;
    
        if(strlen($b) > strlen($c)){
             $mediana = $b;
             $corta = $c;

        }else{
         $mediana = $c;
         $corta = $b;
    }
} elseif(strlen($b) > strlen($a) && strlen($b) > strlen($c)){
    $maslarga = $b;
    
        if(strlen($a) > strlen($c)){
             $mediana = $a;
             $corta = $c;

        }else{
         $mediana = $c;
         $corta = $a;
    }
}else{
    $maslarga = $c;

        if(strlen($a) > strlen($b)){
            $mediana = $a;
            $corta = $b;

        }else{
        $mediana = $b;
        $corta = $a;
    }
}

$cadena = "$corta$mediana$maslarga";
echo $cadena;
echo "<br>";


//6. Escribe un código php que visualice los números impares del 1 al 99 en el formato 1-3-… excluyendo el  5 y  los múltiplos de 5. (continue)

for($i = 0 ; $i <= 99 ; $i++){
    if($i % 2 != 0 && $i % 5 != 0 && $i != 5){
        echo "$i - ";
    }else{
        continue;
    }
}
echo "<br>";


//7. Escribe un código php que calcule y visualice el factorial de un número entero. Realizar dos versiones: a) con while   b) con do-while

$numero = rand(1,100);
$factorial = 1;
$i = $numero;

echo "$numero";
while($i > 0){
    $factorial = $factorial * $i;
    $i = $i - 1;
}

echo "El factorial de $numero es $factorial";
echo "<br>";

$factorial = 1;
$i = $numero;

do{
$factorial = $factorial * $i;
$i = $i - 1;

}while($i > 0);

echo "El factorial de $numero es $factorial";
echo "<br>";



/*8. Escribe un código php que declare e inicialice un array asociativo que contenga el nombre de cinco personas siendo las claves sus NIF´s. 
Visualiza las claves y los contenidos del array mediante print_r().*/

$array = [];

$array = [

    "12345678Y" => "Yuri",
    "09231206H" => "Miriam",
    "23456789S" => "Santi",
    "34567891A" => "Adri",
    "45678912G" => "Gonzalo"
];

print_r($array);
echo "<br>";


//9. Escribe un código php que genere un array escalar con los primeros diez números primos y visualice su contenido mediante un bucle for. 


?>
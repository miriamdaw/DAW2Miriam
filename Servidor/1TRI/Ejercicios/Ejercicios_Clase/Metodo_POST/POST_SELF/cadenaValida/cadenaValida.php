<?php
/*Escribe una función que reciba una cadena y comprueba si es una matrícula válida. Tiene
que tener siete caracteres, los cuatro primeros números y el resto consonantes mayúsculas.


Un php por cada funcion que va a comprobar -->
Siete caracteres
Cuatro primeros numeros mayusculas
El resto consonantes, mayusculas
Por que la matricula no es valida

--> substr
--> preg_replace()
--> str_replace
--> trim
--> htmlspecialchars()

*/

include 'sieteCaracteres.php';
include 'cuatroPrimerosM';
include 'restoConsonantesM.php';

if($_POST["matricula"]){
  $matricula = $_POST["matricula"];
  echo "La matricula que ha introducido es: ". $_POST['matricula']. "<br />";

  function matriculaValida($matricula) {
    if(sieteCaracteres($matricula)){
      echo "Su matricula tiene 7 caracteres " . strlen($matricula);

    }else{
      echo "ERROR: Su cadena debe ser de longitud 7 caracteres.";
    }

  }

}else{
  echo "a.";
}

?>

<html>
<body>
<form action="<?php $_PHP_SELF ?>" method="POST">

  <h1>Introduzca su matrícula para comprobar que es válida:</h1>
  <label for="matricula">Su matrícula:</label>
  <input type="string" id="matricula" name="matricula"><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
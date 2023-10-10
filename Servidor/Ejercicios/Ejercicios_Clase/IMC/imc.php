<?php
/*
Meter un peso y altura 
calcular el imc --> peso(kg)/altura(cm)
--> recoger en variables y aplicar el float

*/


if( $_POST["peso"] && $_POST["altura"] ){
    echo "Su peso es: ". $_POST['peso']. "<br />";
    echo "Su altura es:  ". $_POST['altura']. "<br />";
    
    $peso = $S_POST["peso"];
    $altura = $S_POST["altura"];


    floatval($IMC);
    
    echo "El IMC es: $IMC";

    }
?>


<html>
<body>
<form action="<?php $_PHP_SELF ?>" method="POST">

<h1>Introduzca los valores para calcular su IMC:</h1>
Peso en KG: <input id="peso" type="numer" name="peso" step="any"/>
Altura en CM: <input id="altura" type="number" name="altura" step="any"/>

<input name="submit" type="submit" />
</form>
</body>
</html>



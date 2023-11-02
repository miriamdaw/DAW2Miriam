<?php
/*
Deberes para casa: https://www.mclibre.org/consultar/php/ejercicios/sesiones/sesiones-1/index.html

Escriba un programa de dos páginas que muestre gráficamente los votos recogidos por dos opciones.

La primera página contiene un formulario con tres botones de tipo submit con el mismo atributo name.
Dos botones permiten votar a una u otra opción
El tercer botón pone a cero los contadores de votos
La segunda página recibe el dato, modifica la variable de sesión que contiene el número de votos de la opción elegida (o ambas) y redirige a la primera página.
Los dos números se guardan en dos variables de sesión. Si las variables de sesión no están definidas, se les dará el valor 0.
Las franjas correspondientes a los votos se alargan de 10px en 10px y no tienen límite de tamaño.
*/
?>

-> AYUDA HTML <-
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<tr>
  <td style="vertical-align: top;"><button type="submit" name="accion" value="a" style="font-size: 60px; line-height: 50px; color: hwb(200 0% 0%);">✔</button></td>
  <td>
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
      width="30" height="50">
      <line x1="0" y1="25" x2="30" y2="25" stroke="hwb(200 0% 0%)" stroke-width="50" />
    </svg>
  </td>
</tr>
<tr>
  <td><button type="submit" name="accion" value="b" style="font-size: 60px; line-height: 50px; color: hwb(35 0% 0%)">✔</button></td>
  <td>
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
      width="40" height="50">
      <line x1="0" y1="25" x2="40" y2="25" stroke="hwb(35 0% 0%)" stroke-width="50" />
    </svg>
  </td>
</tr>
</body>
</html>
<?php
/*Realizar una página php que pida al usuario un email 
y antes de enviar le permita dos opciones mediante botones de tipo radio: 
recordar email y no recordar email. 
Según la opción escogida la página2.php utilizará una cookie 
para recordar el email del usuario o eliminará la cookie utilizando una fecha anterior a la actual.*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordar Correo Electrónico</title>
</head>
<body>
    <h1>Ingresa tu correo electrónico</h1>
    <form action="cookie_email.php" method="post">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?php if (isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>" required>
        <br><br>
        <label>¿Deseas recordar tu email?</label>
        <input type="radio" name="recordar" value="si" id="recordar-si">
        <label for="recordar-si">Sí</label>
        <input type="radio" name="recordar" value="no" id="recordar-no">
        <label for="recordar-no">No</label>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>





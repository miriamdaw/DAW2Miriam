<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Contador de Sesión</h1>
    <?php
    if (isset($_SESSION["contador"])) {
        echo "Contador: " . $_SESSION["contador"];
    } else {
        echo "Contador no disponible.";
    }
    ?>
    <br><a href="contador1.php">Incrementar Contador</a>
</body>
</html>

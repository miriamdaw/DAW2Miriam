<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['recordar'])) {
    $email = $_POST['email'];
    $recordar = $_POST['recordar'];

    echo "Correo electrónico ingresado: $email";

    if ($recordar === 'si') {
        setcookie('email', $email, time() + 3600 * 24 * 30);
    } elseif ($recordar === 'no') {
        setcookie('email', '', time() - 3600);
    }
}

header('Location: EJ4.php');
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titular'])) {
    $titular = $_POST['titular'];
    setcookie('titular', $titular, time() + 60);

    if ($titular === 'politica') {
        header('Location: noticia_politica.php');
        exit;
    } elseif ($titular === 'economica') {
        header('Location: noticia_economica.php');
        exit;
    } elseif ($titular === 'deportiva') {
        header('Location: noticia_deportiva.php');
        exit;
    }
}

header("Location: EJ_2.php");

?>



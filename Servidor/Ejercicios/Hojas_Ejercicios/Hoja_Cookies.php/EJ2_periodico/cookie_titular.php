<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titular'])) {
    $titular = $_POST['titular'];
    setcookie('titular', $titular, time() + 60);
}

header('Location: EJ_2.php');

?>



<?php
session_start();
if (!isset($_SESSION["contador"])) {
    $_SESSION["contador"] = 0;
}
$_SESSION["contador"]++;

if ($_SESSION["contador"] === 5) {
    session_destroy();
}

header('Location: contador2.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre'])) {
        $nombre_cookie = $_POST['nombre'];
        setcookie('nombre', $nombre_cookie, time() + 60);

        header('Location: EJ_1.php');
    }
    
}
?>


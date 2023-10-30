<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color'])) {
    $color = $_POST['color'];
    setcookie('color_favorito', $color, time() + 60);
}

header('Location: pagina_con_color.php');
?>

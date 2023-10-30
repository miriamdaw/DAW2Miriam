<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Color Favorito </title>

    <?php
    $color_favorito = isset($_COOKIE['color_favorito']) ? $_COOKIE['color_favorito'] : 'blanco';
    echo "<style>body { background-color: $color_favorito; }</style>";
    ?>

</head>
<body>
</body>
</html>

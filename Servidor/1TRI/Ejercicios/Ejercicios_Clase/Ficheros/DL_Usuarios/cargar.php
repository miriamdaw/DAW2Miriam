<?php

if (!$xml = simplexml_load_file('usuarios.xml')) {
    echo "No se ha podido cargar el archivo";
} else {
    echo "El archivo se ha cargado correctamente<br>";
    foreach ($xml as $usuario) {
        echo 'Nombre: ' . $usuario->nombre . '<br>';
        echo 'Apellido: ' . $usuario->apellido . '<br>';
        echo 'Dirección: ' . $usuario->direccion . '<br>';
        echo 'Ciudad: ' . $usuario->ciudad . '<br>';
        echo 'País: ' . $usuario->pais . '<br>';
        echo 'Teléfono: ' . $usuario->contacto->telefono . '<br>';
        echo 'Url: ' . $usuario->contacto->url . '<br>';
        echo 'Email: ' . $usuario->contacto->email . '<br>';
        echo "<br><br><br>";
    }
}

$string = '<usuarios>
    <usuario>
        <nombre>Monnie</nombre>
        <apellido>Boddie</apellido>
        <direccion>Calle Pedro Mar 12</direccion>
        <ciudad>Mexicali</ciudad>
        <pais>Mexico</pais>
        <contacto>
            <telefono>44221234</telefono>
            <url>http://monnie.ejemplo.com</url>
            <email>monnie@ejemplo.com</email>
        </contacto>
    </usuario>
    </usuarios>';

$dom = new DOMDocument;
$dom->loadXML($string);
$sxe = simplexml_import_dom($dom);
echo $sxe->usuario[0]->ciudad; // Devuelve Mexicali
echo "<br><br><br>";

$usuarios = new SimpleXMLElement($string);
foreach ($usuarios as $usuario) {
    echo "Nombre: " . $usuario->nombre . "<br>";
    foreach ($usuario->contacto as $contacto) {
        echo "Teléfono: " . $contacto->telefono . "<br>";
        echo "Email: " . $contacto->email . "<br>";
    }
}
echo "<br><br><br>";

//No funciona, mercedes va a mirarlo
$xml = simplexml_load_file('usuarios.xml');
$jsonString = json_encode($xml);
$array = json_decode($jsonString, true);
///////////////////////////////////////


$xml = simplexml_load_file('usuarios.xml');
if ($xml === false) {
    echo "No se ha podido cargar el archivo";
} else {

    $jsonString = json_encode($xml);
    $array = json_decode($jsonString, true);

    print_r($array);

    foreach ($xml->usuario[0]->contacto as $contacto) {
    
        switch ((string) $contacto['tipo']) {
            case 'telefono':
                echo "Telefono: " . $contacto . "<br>";
                break;
            case 'email':
                echo "Email: " . $contacto . "<br>";
                break;
        }
    }
}

?>

?>
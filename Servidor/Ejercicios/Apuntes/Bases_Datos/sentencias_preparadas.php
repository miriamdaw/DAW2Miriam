<?php

//sentencias preparadas diego lazaro -> todo explicado

$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
        echo "Conexión realizada con éxito<br>";                
        $sql = 'SELECT nombre, clave, rol FROM usuarios';
        $usuarios = $bd->query($sql);
        echo "Número de usuarios: " . $usuarios->rowCount() . "<br>";
        foreach ($usuarios as $usu) {
                print "Nombre : " . $usu['nombre'];
                print " Clave : " . $usu['clave'] . "<br>";
        }
        /* consulta preparada, parametros por orden */  
        $preparada = $bd->prepare("select nombre from usuarios where rol = ?"); 
        $preparada->execute( array(0));
        echo "Usuarios con rol 0: " .  $preparada->rowCount() . "<br>";
        foreach ($preparada as $usu) {
                print "Nombre : " . $usu['nombre'] . "<br>";
        }


        /* consulta preparada, parametros por nombre */ 
        $preparada_nombre = $bd->prepare("select nombre from usuarios where rol = :rol");
        $preparada_nombre->execute( array(':rol' => 0));
        echo "Usuarios con rol 0: " .  $preparada->rowCount() . "<br>";
        foreach ($preparada_nombre  as $usu) {
                print "Nombre : " . $usu['nombre'] . "<br>";
        }       
        } catch (PDOException $e) {
                echo 'Error con la base de datos: ' . $e->getMessage();
        }


        /*consulta preparada de insert con vinculación de parámetros -> etapa 1*/
        $stmt = $db->prepare('INSERT INTO usuarios (nombre, clave, rol) VALUES
        (:nom, :clave, :rol)');

        $stmt->bindParam("ssi, $nombre, $clave, $rol");


        if (!$sentencia = $mysqli ->prepare('INSERT INTO usuarios(nombre, clave, rol) 
        VALUES(:nom,:clave,:rol) ')) {
            echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        /* Sentencia preparada, etapa 2 -> vincular y ejecutar*/
        $nombre = "Marcos";
        $clave = "334";
        $rol = 0;

        if(!$sentencia->bind_param("ssi",$nombre, $clave,$rol)){
            echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ")" . $sentencia->error;

        }

        if(!$sentencia->execute()) {
            echo "Falló la ejecución: (" . $sentencia->errno . ")" . $sentencia->error;
        }

?>

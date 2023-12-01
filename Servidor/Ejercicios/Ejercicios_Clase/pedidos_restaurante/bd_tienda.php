<?php

function leer_config($nombre, $esquema)
{
	$config = new DOMDocument();
	$config->load($nombre);
	$res = $config->schemaValidate($esquema);
	if ($res === FALSE) {
		throw new InvalidArgumentException("Revise fichero de configuración");
	}
	$datos = simplexml_load_file($nombre);
	$ip = $datos->xpath("//ip");
	$nombre = $datos->xpath("//nombre");
	$usu = $datos->xpath("//usuario");
	$clave = $datos->xpath("//clave");
	$cad = sprintf("mysql:dbname=%s;host=%s", $nombre[0], $ip[0]);
	$resul = [];
	$resul[] = $cad;
	$resul[] = $usu[0];
	$resul[] = $clave[0];
	return $resul;
}
function comprobar_usuario($nombre, $clave)
{
	//clave encriptada, hash y validate
	$res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	$ins = "select codRes, correo from restaurantes where correo = '$nombre' 
			and clave = '$clave'";
	$resul = $bd->query($ins);
	if ($resul->rowCount() === 1) {
		return $resul->fetch();
	} else {
		return FALSE;
	}
}

function registrar_restaurante()
{
	if (
		isset($_SESSION['correo'], $_SESSION['clave'], $_SESSION['pais'], $_SESSION['cp'], $_SESSION['ciudad'],
		$_SESSION['direccion'])
	) {
		try {
			// Enable error reporting
			error_reporting(E_ALL);
			ini_set('display_errors', 1);

			$correo = $_SESSION['correo'];
			$clave = $_SESSION['clave'];
			$pais = $_SESSION['pais'];
			$cp = $_SESSION['cp'];
			$ciudad = $_SESSION['ciudad'];
			$direccion = $_SESSION['direccion'];

			$res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
			$bd = new PDO($res[0], $res[1], $res[2]);

			$ins = "INSERT INTO restaurantes (correo, clave, pais, cp, ciudad, direccion) VALUES (?, ?, ?, ?, ?, ?)";
			$stmt = $bd->prepare($ins);

			if ($stmt->execute([$correo, $clave, $pais, $cp, $ciudad, $direccion])) {
				return TRUE;
			} else {
				return FALSE;
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			return FALSE;
		}
	} else {
		return FALSE;
	}
}


function cargar_categorias()
{
	$res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	$ins = "select codCat, nombre from categorias";
	$resul = $bd->query($ins);
	if (!$resul) {
		return FALSE;
	}
	if ($resul->rowCount() === 0) {
		return FALSE;
	}
	//si hay 1 o más
	return $resul;
}
function cargar_categoria($codCat)
{
	$res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	$ins = "select nombre, descripcion from categorias where codCat = $codCat";
	$resul = $bd->query($ins);
	if (!$resul) {
		return FALSE;
	}
	if ($resul->rowCount() === 0) {
		return FALSE;
	}
	//si hay 1 o más
	return $resul->fetch();
}

function cargar_productos_categoria($codCat)
{
	$res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	$sql = "select * from productos where categoria  = $codCat";
	$resul = $bd->query($sql);
	if (!$resul) {
		return FALSE;
	}
	if ($resul->rowCount() === 0) {
		return FALSE;
	}
	//si hay 1 o más
	return $resul;
}

//comprobar si un producto ya está, si no está se añade, si está no se añade
//buscar todo el rato en el carrito


// recibe un array de códigos de productos
// devuelve un cursor con los datos de esos productos
function cargar_productos($codigosProductos)
{
	$res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	/*if (empty($codigosProductos)){
			  return FALSE;
		  }*/
	$texto_in = implode(",", $codigosProductos);
	$ins = "SELECT * FROM productos WHERE codProd IN ($texto_in)";
	$resul = $bd->query($ins);

	if (!$resul) {
		return FALSE;
	}

	$productos = array();
	while ($producto = $resul->fetch(PDO::FETCH_ASSOC)) {
		$productos[] = $producto;
	}
	return $productos;
}
?>
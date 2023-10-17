<?php
/* si va bien redirige a parametrosFormulario.php si va mal, mensaje de error */
if ($_SERVER["REQUEST_METHOD"] == "POST") {  	
	if($_POST['usuario'] === "usuario" and $_POST["clave"] === "1234"
    and isset($_POST["color"]) and isset($_POST["publicidad"]) 
    and isset($_POST["anio"]) and isset($_POST["ciudades"])){		
		header("Location: parametrosFormulario.php");
	}else{
		$err = true;
        $usuario = $_POST["usuario"];
        $color = $_POST["color"];
        $publicidad = $_POST["publicidad"];
        $anio = $_POST["anio"];
        $ciudades = $_POST["ciudades"];
	}
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Repintar formulario</title>		
		<meta charset = "UTF-8">
	</head>
	<body>			
		<?php if(isset($err)){
			echo "<p> Revise datos introducidos</p>";
		}?>
		<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
			
            <h1>Recibe parámetros y repinta el formulario</h1>
            <h3>CAMPOS DE TEXTO:</h3>
            <label for = "usuario">Nombre:</label> 
			<input value = "<?php if(isset($usuario))echo $usuario;?>"
			id = "usuario" name = "usuario" type = "text">				
			
			<label for = "clave">Contraseña:</label> 
			<input id = "clave" name = "clave" type = "password">
            <br><br>

            <h3>RADIO:</h3>
            <label for="Rojo">Rojo: </label>
			<input type="radio" id="colorRojo" name="color" value="rojo" <?php if(isset($color) && $color === "rojo") echo "checked"; ?>>
    
            <label for="Naranja">Naranja: </label>
			<input type="radio" id="colorNaranja" name="color" value="naranja" <?php if(isset($color) && $color === "naranja") echo "checked"; ?>>

            <label for="Verde">Verde: </label>
			<input type="radio" id="colorRojo" name="color" value="verde" <?php if(isset($color) && $color === "verde") echo "checked"; ?>>

			<input type = "submit">

            <h3>CHECKBOX:</h3>
            <label for="publicidad">Quiero recibir publicidad</label>
            <input type="checkbox" id="publicidad" name="publicidad" <?php if(isset($publicidad)) echo "checked"; ?>>
                                                                    
            <h3>SELECT:</h3>

            <h4>Simple:</h4>
            <label for="anio">Año de finalización de estudios:</label>
            <select name="anio" id="anio">
            <option value="2023" <?php if(isset($anio) && $anio === "2023") echo "selected"; ?>>2023</option>
            <option value="2022" <?php if(isset($anio) && $anio === "2022") echo "selected"; ?>>2022</option>
            <option value="2021" <?php if(isset($anio) && $anio === "2021") echo "selected"; ?>>2021</option>
            <option value="2020" <?php if(isset($anio) && $anio === "2020") echo "selected"; ?>>2020</option>
        </select>

            <h4>Multiple:</h4>
            <label for="ciudades">Ciudades:</label>
            <select multiple name="ciudades[]" id="ciudades" >
            <option value="Gerona" <?php if(in_array("Gerona",$ciudades)) echo "selected"; ?>>Gerona</option>
            <option value="Madrid" <?php if(in_array("Madrid", $ciudades)) echo "selected"; ?>>Madrid</option>
            <option value="Zaragoza" <?php if(in_array("Zaragoza", $ciudades)) echo "selected"; ?>>Zaragoza</option>
        </select>
		</form>
	</body>
</html>
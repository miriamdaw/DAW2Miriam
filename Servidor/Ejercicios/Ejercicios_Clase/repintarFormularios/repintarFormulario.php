<?php
/* si va bien redirige a principal.php si va mal, mensaje de error */

$listausuarios=array(
						"admin"=>1234,
						"ivan"=>5678,
						"sergio"=>9012,
						"elena"=>3456,
						"yuri"=>7890
					);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    
	foreach($listausuarios as $usuarioRegistrado=>$claveRegistrada){
			
	   	if($_POST["usuario"] == $usuarioRegistrado && $_POST["clave"] == $claveRegistrada && isset($_POST["color"])){		
		    header("Location: principal.php");
			exit(); 
	    }
		
	}
		$usuario=$_POST["usuario"];
		$colorRadio=$_POST["color"];
		$err = true;
	    
	}	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de login</title>		
		<meta charset = "UTF-8">
	</head>
	<body>			
		<?php if(isset($err)){
			echo "<p><strong>Revise los datos introducidos</strong></p>";
		}?>
		<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
	<fieldset>
		<legend>FORMULARIO DE REGISTRO</legend>
	
		<label for="idusuario">Usuario</label> 
		<input type="text" id="idusuario" placeholder="Introduzca usuario" name="usuario" value="<?php if(isset($usuario))echo $usuario;?>">
			
		<label for="idclave">Clave</label> 
		<input type="password" id="idclave" name="clave" placeholder="Introduzca contraseña">			
			
		
	</fieldset>

        
        <fieldset>
            <legend>RADIO</legend>
            <label for="colorRojo">Rojo: </label>
            <input type="radio" id="colorRojo" name="color" value="rojo" <?php if(isset($colorRadio) && $colorRadio === "rojo") echo "checked"; ?>>
            <label for="colorNaranja">Naranja: </label> 
			<input type="radio" id="colorNaranja" name="color" value="naranja" <?php if(isset($colorRadio) && $colorRadio === "naranja") echo "checked"; ?>>
            <label for="colorVerde">Verde: </label> 
			<input type="radio" id="colorVerde" name="color" value="verde" <?php if(isset($colorRadio) && $colorRadio === "verde") echo "checked"; ?>>
        </fieldset>


		<input type = "submit" value="Enviar">
        </form>
	</body>
</html>
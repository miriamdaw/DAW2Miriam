<?php
/* si va bien redirige a parametrosFormulario.php si va mal, mensaje de error */
$ciudades = array();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {  

	if($_POST["nombre"]==""){
    $error = "Recuerda rellenar el nombre ";
    }

    if(!isset($_POST["email"])){
        $error = $error . " ,el campo de email es obligatorio ";
    }else if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
    $error = " el formato del email es invalido ";
    }


    if(!isset($_POST["color"])){
    $error = $error . " y selecciona un color ";
    }

    if(!isset($_POST["publicidad"])){
        $error = $error . " y seleccionar si quiere publicidad ";
        }

    if(!isset($_POST["anio"])){
    $error = $error . "y debe seleccionar un año ";
    }

    if(!isset($_POST["ciudades"])){
    $error = $error . " y debe seleccionar una ciudad";
    }

    if (isset($error)) {
        $nombre = $_POST["nombre"];
        $color = $_POST["color"];
        $publicidad = $_POST["publicidad"];
        $anio = $_POST["anio"];
        $ciu = $_POST["ciudades"];
        $email = $_POST["email"];
        echo $error;

    }else{
        include("validacionNombre.php");
        if(validarNombre($_POST["nombre"]) == true){
            header("Location: parametrosFormulario.php");
        }else{
            echo "No se ha podido validar correctamente el nombre.";
        }     
    } 
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Repintar formulario</title>		
		<meta charset = "UTF-8">
        <style>
        form {
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], select {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        input[type="submit"] {
            background-color: #0074D9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="checkbox"] {
            margin-right: 5px;
        }
        p {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
	</head>
	<body>			
	
		<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
			
            <h1>Recibe parámetros y repinta el formulario</h1>
            <h3>CAMPOS DE TEXTO:</h3>
            <label for = "nombre">Nombre:</label> 
			<input value = "<?php if(isset($nombre))echo $nombre;?>"
			id = "nombre" name = "nombre" type = "text">		
            
            <label for = "email">Email:</label> 
			<input value = "<?php if(isset($email))echo $email;?>"
			id = "email" name = "email" type = "email" pattern=".+@gmail\.com" size="30" required />
            <br><br>

            <h3>RADIO:</h3>
            <label for="Rojo">Rojo: </label>
			<input type="radio" id="colorRojo" name="color" value="rojo" <?php if(isset($color) && $color === "rojo") echo "checked"; ?>>
    
            <label for="Naranja">Naranja: </label>
			<input type="radio" id="colorNaranja" name="color" value="naranja" <?php if(isset($color) && $color === "naranja") echo "checked"; ?>>

            <label for="Verde">Verde: </label>
			<input type="radio" id="colorRojo" name="color" value="verde" <?php if(isset($color) && $color === "verde") echo "checked"; ?>>

            <br><br>

            <h3>CHECKBOX:</h3>
            <label for="publicidad">Quiero recibir publicidad</label>
            <input type="checkbox" id="publicidad" name="publicidad" <?php if(isset($publicidad)) echo "checked"; ?>>
                                                      
            <h3>SELECT:</h3>

            <h4>Simple:</h4>
            <label for="anio">Año de finalización de estudios:</label>
            <select name="anio" id="anio" size="5">
            <option value="2023" <?php if(isset($anio) && $anio === "2023") echo "selected"; ?>>2023</option>
            <option value="2022" <?php if(isset($anio) && $anio === "2022") echo "selected"; ?>>2022</option>
            <option value="2021" <?php if(isset($anio) && $anio === "2021") echo "selected"; ?>>2021</option>
            <option value="2020" <?php if(isset($anio) && $anio === "2020") echo "selected"; ?>>2020</option>
        </select>

            <h4>Multiple:</h4>
            <label for="ciudades">Ciudades:</label>
            <select id="ciudades" name="ciudades[]" size="4" multiple>
            <option value="Gerona" <?php if(isset($ciudades) && in_array("Gerona", $ciudades)) echo "selected"; ?>>Gerona</option>
            <option value="Madrid" <?php if(isset($ciudades) && in_array("Madrid", $ciudades)) echo "selected"; ?>>Madrid</option>
            <option value="Zaragoza" <?php if(isset($ciudades) && in_array("Zaragoza", $ciudades)) echo "selected"; ?>>Zaragoza</option>
        </select>

        <input type = "submit">
		</form>
	</body>
</html>
//validar direccion ip
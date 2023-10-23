<?php
/* si va bien redirige a parametrosFormulario.php si va mal, mensaje de error */
$ciudades = array();
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

	if($_POST["nombre"]==""){
    $errors[] = "Recuerda rellenar el nombre.";
    }

    if($_POST["apellido"]==""){
        $errors[] = "Recuerda rellenar el apellido.";
        }

    if(!isset($_POST["email"])){
        $errors[] = "Debe rellenar el email.";
    } else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El formato del email es inválido.";
    }

    if(!isset($_POST["color"])){
    $errors[] = "Debe seleccionar un color.";
    }

    if(!isset($_POST["publicidad"])){
        $errors[] = "Debe marcar si quiere recibir publicidad.";
    }

    if(!isset($_POST["anio"])){
    $errors[] = "Debe seleccionar un año.";
    }

    if(!isset($_POST["ciudades"])){
    $errors[] = "Debe seleccionar una ciudad.";
    }

    if (empty($_POST["telefono"])) {
        $errors[] = "Introduzca su teléfono.";

    } elseif (!preg_match("/^\d{9}$/", $_POST["telefono"])) {
        $errors[] = "El formato del teléfono es inválido. Debe contener 9 dígitos.";
    }

/*
    if(isset($_POST["ciudades"])){
        $ciudades = $_POST["ciudades"];
        }
*/

    if (!empty($errors)) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $color = $_POST["color"];
        $publicidad = $_POST["publicidad"];
        $anio = $_POST["anio"];
        $ciudades = $_POST["ciudades"];
        $telefono = $_POST["telefono"];
        foreach($errors as $error){
            echo $error . "<br>";
        }

    } else {
        include("validar.php");
        $validar = "/^[A-Za-z\- ]+$/";
        if (validar($_POST["nombre"], $_POST["apellido"], $validar) == true) {
            header("Location: si_sale_bien.php");
            exit();
        } else {
            $errors[] = "No se ha podido validar correctamente.";
            foreach ($errors as $error) {
                echo $error . "<br>";
        } 
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
            background-color: #ffe6ea;
        }
        
        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"], select {
            width: 90%;
            padding: 5px;
            margin-top: 5px;
            border: 1px solid #7a1527;
            border-radius: 3px;
            outline-color: #7a1527;

        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #7a1527;
            color: #ffbdc9;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }
        
        input[type="checkbox"] {
            margin-right: 5px;
        }

        p {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            color: #7a1527;
        }

        h3 {
            color: #c46073;
        }


    </style>
	</head>
	<body>			
	
		<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
			
            <h1>Recibe parámetros y repinta el formulario</h1>
            <h3>CAMPOS DE TEXTO:</h3>
            <label for = "nombre">Nombre:</label> 
			<input value = "<?php if(isset($_POST["nombre"])) echo $_POST["nombre"];?>"
			id = "nombre" name = "nombre" type = "text">	
            
            <label for = "nombre">Apellido:</label> 
			<input value = "<?php if(isset($_POST["apellido"])) echo $_POST["apellido"];?>"
			id = "apellido" name = "apellido" type = "text">	
            
            <label for = "email">Email:</label> 
			<input value = "<?php if(isset($email))echo $email;?>"
			id = "email" name = "email" type = "email" pattern=".+@gmail\.com" size="30" required />

            <label for = "telefono">Telefono:</label> 
			<input value = "<?php if(isset($telefono))echo $telefono;?>"
			id = "telefono" name = "telefono" type = "text"/>
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
        <br><br>
        <center><input type = "submit"></center>
		</form>
	</body>
</html>
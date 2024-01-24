<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>EnviaYRecibe</title>
</head>
<body>
	<form action="EnviaYRecibe" method="get">
		<table>
			<tr>
				<td><label for="Nombre">Nombre: </label></td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr>
				<td><label for="Clave">Contraseña: </label></td>
				<td><input type="password" name="clave"></td>
			</tr>
			<tr>
				<td><label for="Genero">Género: </label></td>
				<td><input type="radio" name="genero" value="masculino">Hombre
					<input type="radio" name="genero" value="femenino">Mujer 
					<input type="radio" name="genero" value="otro">Otro</td>
			</tr>
			<tr>
				<td><label for="FechaNacimiento">Fecha de Nacimiento: </label></td>
				<td><input type="date" name="nacimiento"></td>
			</tr>
			<tr>
				<td><label for="Pais">Pais: </label></td>
				<td><select name="pais">
						<option value="espana">España</option>
						<option value="portugal">Portugal</option>
						<option value="francia">Francia</option>
						<option value="inglaterra">Inglaterra</option>
						<option value="italia">Italia</option>
						<option value="alemania">Alemania</option>					
				</select></td>
			</tr>
			<tr>
				<td><label for="Publicidad">¿Quiere recibir publicidad?</label></td>
				<td><input type="checkbox" name="publicidad"></td>
			</tr>
			<tr>
				<td><label for="Comentarios">Escriba un comentario breve: </label></td>
				<td><input type="text" name="comentario"></td>
			</tr>
			<tr>
				<td><label for="Foto">Envie una foto: </label></td>
				<td><input type="file" name="foto"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Enviar"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulario Cookie</title>
</head>
<body>
	<%
	String usuario = "";
	String clave = "";
	String idioma = "";

	usuario = request.getParameter("usuario");
	clave = request.getParameter("clave");
	idioma = request.getParameter("idioma");
	%>

	<form action=creaCookie method="post">
		<table>
			<tr>
				<td>Usuario:</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr>
				<td>Clave:</td>
				<td><input type="text" name="clave"></td>
			</tr>
			<tr>
				<td>Idioma:</td>
				<td><input type="text" name="idioma"></td>
			</tr>
			<td colspan="2" style="text-align: center;"><input type="submit"
				value="Enviar"></td>
			</form>
</body>
</html>
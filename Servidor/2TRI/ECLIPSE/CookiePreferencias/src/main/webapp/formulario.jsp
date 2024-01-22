<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Aplicación</title>
</head>
<body>

<%
String usuario = "";
String clave = "";

usuario = request.getParameter("usuario");
clave = request.getParameter("clave");
%>

	<table>
		<form action="Comprobaciones" method="post">
			<tr>
				<td><label for="usuario">Usuario:</label></td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr>
				<td><label for="clave">Clave:</label></td>
				<td><input type="text" name="clave"></td>
			</tr>

			<td><input type="submit" value="Autenticar"></td>
		</form>
	</table>
</body>
</html>
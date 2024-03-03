<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ page import="java.util.Map"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign In: Paso 1</title>
</head>
<body>
	<%
	String nombre = (String) session.getAttribute("nombre");
	String email = (String) session.getAttribute("email");
	String genero = (String) session.getAttribute("genero");
	String nacimiento = (String) session.getAttribute("nacimiento");
	String publicidad = (String) session.getAttribute("publicidad");
	String[] canal = (String[]) session.getAttribute("canal");
	String[] errorNombre = (String[]) session.getAttribute("errorNombre");

	
	if (nombre == null)
		nombre = "";
	if (email == null)
		email = "";
	if (genero == null)
		genero = "";
	if (nacimiento == null)
		nacimiento = "";
	if (publicidad == null)
		publicidad = "";
	if (canal == null || canal.length == 0)
		canal = new String[] { "" };
	%>

	<form action="Paso1Java" method="post">
		<table border="1">
			<tr>
				<td>Nombre:</td>
				<td><input type="text" name="nombre" value="<%=nombre%>"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="email" name="email" value="<%=email%>"></td>
			</tr>
			<tr>
				<td>Género:</td>
				<td><input type="radio" name="genero" value="Masculino"
					<%=genero.equals("Masculino") ? "checked" : ""%>> Masculino<br>
					<input type="radio" name="genero" value="Femenino"
					<%=genero.equals("Femenino") ? "checked" : ""%>> Femenino<br>
					<input type="radio" name="genero" value="Otro"
					<%=genero.equals("Otro") ? "checked" : ""%>> Otro</td>
			</tr>
			<tr>
				<td>Fecha de Nacimiento:</td>
				<td><input type="date" name="nacimiento"
					value="<%=nacimiento%>"></td>
			</tr>
			<tr>
				<td>¿Quiere recibir publicidad?</td>
				<td><input type="checkbox" name="publicidad" value="Sí"
					<%=publicidad.equals("Sí") ? "checked" : ""%>> Sí<br>
					<input type="checkbox" name="publicidad"
					value="No quiero recibir publicidad"
					<%=publicidad.equals("No quiero recibir publicidad") ? "checked" : ""%>>
					No</td>
			</tr>
			<tr>
				<td>¿Tiene un canal en redes sociales?</td>
				<td><select name="canal">
						<option value="Twitch"
							<%="Twitch".equalsIgnoreCase(canal != null && canal.length > 0 ? canal[0] : "") ? "selected" : ""%>>Twitch</option>
						<option value="Youtube"
							<%="Youtube".equalsIgnoreCase(canal != null && canal.length > 0 ? canal[0] : "") ? "selected" : ""%>>Youtube</option>
						<option value="No tengo un canal"
							<%="No tengo un canal".equalsIgnoreCase(canal != null && canal.length > 0 ? canal[0] : "") ? "selected" : ""%>>No</option>
				</select></td>
			</tr>


			<!-- Mostrar errores -->
			<% if (errorNombre != null && errorNombre.length > 0) { %>
			<tr>
				<td colspan="2">
					<ul style="color: red;">
						<% for (String error : errorNombre) { %>
						<li><%= error %></li>
						<% } %>
					</ul>
				</td>
			</tr>
			<% } %>



			<tr>
				<td colspan="2" align="center"><input type="submit"
					value="Enviar datos"></td>
			</tr>
		</table>
	</form>
</body>
</html>

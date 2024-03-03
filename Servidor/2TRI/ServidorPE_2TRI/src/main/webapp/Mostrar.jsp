<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="ISO-8859-1"%>
<%@ page import="java.util.List"%>
<%@ page import="java.util.ArrayList"%>
<%@ page import="java.util.Collections"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Resumen de su cuenta</title>
</head>
<body>
	<h1>Resumen del registro</h1>

	<%
	String nombre = (String) session.getAttribute("nombre");
	String email = (String) session.getAttribute("email");
	String genero = (String) session.getAttribute("genero");
	String nacimiento = (String) session.getAttribute("nacimiento");
	String publicidad = (String) session.getAttribute("publicidad");
	String[] canal = (String[]) session.getAttribute("canal");
	String horas = (String) session.getAttribute("horas");
	String[] interes = (String[]) session.getAttribute("interes");
	String comentarios = (String) session.getAttribute("comentarios");
	String banco = (String) session.getAttribute("banco");
	List<String> archivos = (List<String>) session.getAttribute("archivos");
	%>

	<h2>Datos del Usuario:</h2>
	<p>
		Nombre:
		<%= nombre %></p>
	<p>
		Email:
		<%= email %></p>
	<p>
		Género:
		<%= genero %></p>
	<p>
		Fecha de Nacimiento:
		<%= nacimiento %></p>
	<p>
		Publicidad:
		<%= publicidad %></p>
	<p>
		Canal en Redes Sociales:
		<%= canal != null ? String.join(", ", canal) : "" %></p>

	<h2>Datos Adicionales:</h2>
	<p>
		Horas en el Escritorio:
		<%= horas %></p>
	<p>
		Interés:
		<%= interes != null ? String.join(", ", interes) : "" %></p>
	<p>
		Comentarios:
		<%= comentarios %></p>

	<h2>Datos Bancarios:</h2>
	<p>
		Banco:
		<%= banco %></p>


	<h1>Imágenes Subidas</h1>

	<%-- Verificar si hay archivos en la sesión --%>
	<% if (archivos != null && !archivos.isEmpty()) { %>
	<%-- Iterar sobre la lista de archivos --%>
	<% for (String archivo : archivos) { %>
	<%-- Mostrar la imagen utilizando la etiqueta <img> --%>
	<img src="ficherosGuardados/<%= archivo %>" alt="<%= archivo %>">
	<% } %>
	<% } else { %>
	<p>No se han subido imágenes.</p>
	<% } %>


	<% 
	
	if (session != null) {
        // Invalidar la sesión (borrarla)
        session.invalidate();
	}
        
        
        %>

	<form action="Paso1.jsp" method="get">
		<input type="submit" value="Empezar un nuevo registro">
	</form>


</body>
</html>
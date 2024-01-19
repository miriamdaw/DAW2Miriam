<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"
///////////////////http://localhost:8080/JavaServerPages/expresiones.jsp?nombre=miriam>
<html>
<head>
<title>Expresiones JSP</title>
</head>
<body>
	<h1>Ejemplo de expresiones JSP</H1>
	<ul>
		<li>Fecha actual: <%=new java.util.Date()%>
		<li>Nombre del host: <%=request.getRemoteHost()%>
		<li>ID de la sesion: <%=session.getId()%>
		<li>El parametro es: <%=request.getParameter("nombre")%>
	</ul>
</body>
</html>
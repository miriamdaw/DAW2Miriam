<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Scriptlets JSP</title>
</head>
<%@page import="java.util.*"%>
<%-- Esto en un comentario de JSP --%>
<%!private int cont = 0;
	private Date fecha = new Date();%>
<body>
	<p>
		Esta pagina ha sido accedida <b><%=++cont%></b> veces.
	</p>
	<p>
		El ultimo acceso ha sido con fecha <b><%=fecha%></b>
	</p>
	<%
	fecha = new Date();
	%>
</body>
</html>
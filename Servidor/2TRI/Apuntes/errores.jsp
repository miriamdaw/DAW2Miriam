<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Pagina de errores en JSP</title>
</head>
<body>
	<%@page isErrorPage="true"%>
	<h1>Pagina de errores del Formulario</h1>

	<p>formulario.jsp ha reportado los siguientes errores:</p>

	<%
        String[] errores = (String[]) request.getAttribute("mensajesError");

        if (errores != null) {
            for (String error : errores) {
                if (error != null && !error.isEmpty()) {
    %>
                    <%= error %>
    <%
                }
            }
        }
    %>
	
</body>
</html>

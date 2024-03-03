<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign In: Paso 2</title>
</head>
<body>
    <%
        String horas = (String) session.getAttribute("horas");
        String[] interes = (String[]) session.getAttribute("interes");
        String comentarios = (String) session.getAttribute("comentarios");

        if (horas == null)
        	horas = "";
        if (interes == null || interes.length == 0)
        	interes = new String[] { "" };
        if (comentarios == null)
            comentarios = "";
    %>

    <form action="Paso2Java" method="post">
        <table border="1">
            <tr>
                <td>Indique cuántas horas dedica normalmente en su escritorio:</td>
                <td><input type="number" name="horas" value="<%= horas %>"></td>
            </tr>
            <tr>
                <td>Indique cuál es su interés:</td>
                <td>
                    <select name="interes">
                        <option value="Tecnología" <%= (interes != null && interes.length > 0 && "tecnologia".equals(interes[0])) ? "selected" : "" %>>Tecnología</option>
                        <option value="Videojuegos" <%= (interes != null && interes.length > 1 && "videojuegos".equals(interes[1])) ? "selected" : "" %>>Videojuegos</option>
                        <option value="Informática" <%= (interes != null && interes.length > 2 && "informatica".equals(interes[2])) ? "selected" : "" %>>Informática</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Indique qué le gusta sobre nuestras sillas:</td>
                <td><textarea name="comentarios" rows="4" cols="50"><%= comentarios %></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><a href="Paso1.jsp">Volver atrás</a></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Enviar datos"></td>
            </tr>
        </table>
    </form>
</body>
</html>

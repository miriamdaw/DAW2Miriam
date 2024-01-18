<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ page import="java.util.Arrays"%>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulario</title>
<style>
table {
	width: 50%;
	margin: 20px auto;
	border-collapse: collapse;
}

th, td {
	border: 1px solid black;
	padding: 8px;
	text-align: left;
}

input, select, textarea {
	width: 100%;
	padding: 8px;
	box-sizing: border-box;
}
</style>
</head>
<body>
	<%@page errorPage="errores.jsp"%>

	Suma es:
	<%=request.getAttribute("a")%>

	<%
    String[] errores = new String[4];
    String name = "";
    String fecha = "";
    String email = "";
    String[] ciudadesSeleccionadas = null;

    if (request.getMethod().equalsIgnoreCase("post")) {
        name = request.getParameter("nombre");
        fecha = request.getParameter("fecha");
        email = request.getParameter("email");
        ciudadesSeleccionadas = request.getParameterValues("ciudad");

        if (name == null || name.isEmpty()) {
            errores[0] = "No ha introducido su nombre";
        }

        if (fecha == null || fecha.isEmpty()) {
            errores[1] = "No ha introducido una fecha";
        }

        if (email == null || email.isEmpty()) {
            errores[2] = "No ha introducido su email";
        }

        if (ciudadesSeleccionadas == null || ciudadesSeleccionadas.length == 0) {
            errores[3] = "No ha seleccionado una ciudad";
        }
    }
    %>

	<form action=formulario.jsp method="post">
		<table>
			<tr>
				<th>Elemento</th>
				<th>Entrada</th>
			</tr>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre"><%=name%></td>
			</tr>
			<tr>
				<td>Fecha Nacimiento</td>
				<td><input type="date" name="fecha"><%=fecha%></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email"><%=email%></td>
			</tr>
			<tr>
				<td>Ciudad</td><%=ciudadesSeleccionadas != null ? Arrays.asList(ciudadesSeleccionadas).contains("Madrid") ? "selected" : "" : ""%>
				<td><select name="ciudad" multiple>
						<option value="Madrid"
							<%=ciudadesSeleccionadas != null && Arrays.asList(ciudadesSeleccionadas).contains("Madrid") ? "selected" : ""%>>Madrid</option>
						<option value="Barcelona"
							<%=ciudadesSeleccionadas != null && Arrays.asList(ciudadesSeleccionadas).contains("Barcelona") ? "selected" : ""%>>Barcelona</option>
						<option value="Galicia"
							<%=ciudadesSeleccionadas != null && Arrays.asList(ciudadesSeleccionadas).contains("Galicia") ? "selected" : ""%>>Galicia</option>
				</select></td>

			</tr>
			<td colspan="2" style="text-align: center;"><input type="submit"
				value="Enviar"></td>
		</table>
	</form>

	<%--
    if ((errores[0].isEmpty() && errores[1].isEmpty() && errores[2].isEmpty() && errores[3].isEmpty())) {
        request.setAttribute("mensajesError", errores);
        RequestDispatcher rd = request.getRequestDispatcher("errores.jsp");
        rd.forward(request, response);
    }
    --%>
</body>
</html>
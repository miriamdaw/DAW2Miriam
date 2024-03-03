<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ page import="java.util.List"%>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulario de Datos</title>
</head>
<body>
	
	<form action="Paso3Java" method="post" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>Datos bancarios:</td>
				<td><input type="number" name="banco"></td>
			</tr>
			<tr>
				<td>Suba un icono para su usuario:</td>
				<td><input type="file" name="archivos" accept=".jpg, .png" multiple="multiple" />
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><a href="Paso2.jsp">Volver
						atrás</a></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit"
					value="Enviar datos"></td>
			</tr>
		</table>
	</form>
</body>
</html>

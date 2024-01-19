<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Subida de ficheros al servidor</title>
</head>
<body>
	<form action=SubeFichero method="post" encytype="multipart/form-data">
		Descripcion
		<textarea name="descripcion"></textarea>
		<br /> <br /> <input type="file" name="archivo"> <br /> <br />
		<input type="submit" />
	</form>
</body>
</html>
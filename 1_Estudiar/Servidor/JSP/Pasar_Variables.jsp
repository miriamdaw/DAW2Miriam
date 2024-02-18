/*
En un JSP, podemos escribir un programa que nos haga un 
cálculo con dos variables y mostrarlo por la línea de navegación
o cambiar el color del fondo de la página.

Para ello, cuando entremos a la página que tiene el programa 
desde el navegador mediante localhost, podemos pasarle 
por el navegador las variables que vamos a usar. Por ejemplo:

&http//localhost:8080/Proyecto/Programa.jsp?variable=valor

De esta manera le pasamos el nombre de la variable y el valor
que le vamos a dar. Y luego en el JSP sería algo así:
*/

<%
String variable = request.getParameter("variable");
out.println("Variable: " + variable);
%>


Ejemplos: 

http://localhost:8080/JavaServerPages/expresiones.jsp?nombre=miriam
<%String variable = request.getParameter("nombre");
out.println("nombre: " + nombre);%>


http://localhost:8080/JavaServerPages/color.jsp?bgColor=PINK
<%String bgColor = request.getParameter("bgColor");%>
<html>
<body style="background-color:<%= bgColor%>;">


http://localhost:8080/JavaServerPages/division.jsp?op1=12&op2=6
<%int op1 = Integer.parseInt(request.getParameter("op1"));
int op2 = Integer.parseInt(request.getParameter("op2"));
int resultado = op1/op2;
out.println("Division: " + resultado);%>


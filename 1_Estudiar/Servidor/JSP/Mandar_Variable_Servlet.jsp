<!--
 * Tendremos un servlet y un jsp. 
 * Primero entraremos en el jsp, donde se encuentra el formulario que enviará los datos al servlet.
 * Creamos un formulario:
-->

<form action="servlet" method="post">
  <label for="escribirUsuario">Usuario:</label>
  <input type="text" name="usuario" />
  <input type="submit" value="enviar" />
</form>

<!--
    La variable que hemos creado donde vamos a guardar el dato es USUARIO. Cuando le demos al botón enviar, 
    el dato se envía al servlet. Podemos recuperar ese valor de la variable utilizando scripts de jsp.
-->

<%
String usuario = request.getParameter("usuario");
%>

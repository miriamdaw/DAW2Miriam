<!--
    Para el repintado, primero tenemos que mandar la variable, que la guarde el servlet, y luego
    recuperarla en el mismo jsp. Y luego escribir el script dentro de la zona donde queremos que se repinte.
-->

<!--PASO 1-->
<form action="servlet" method="post">
  <label for="escribirUsuario">Usuario:</label>
  <input type="text" name="usuario" />
  <input type="submit" value="enviar" />
</form>

<!--PASO 2-->
<%
String usuario = request.getParameter("usuario");
%>
<form action="servlet" method="post">
    <label for="escribirUsuario">Usuario:</label>
    <input type="text" name="usuario" value="<%=usuario>"/>
    <input type="submit" value="enviar" />
  </form>
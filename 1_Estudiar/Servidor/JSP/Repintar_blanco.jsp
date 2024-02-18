<!--
    Para repintar en blanco si no se ha escrito el dato en el formulario.
-->
<%
if (usuario == null){
    usuario = "";
}
%>
<form action="servlet" method="post">
    <label for="escribirUsuario">Usuario:</label>
    <input type="text" name="usuario" value="<%=usuario>"/>
    <input type="submit" value="enviar" />
  </form>
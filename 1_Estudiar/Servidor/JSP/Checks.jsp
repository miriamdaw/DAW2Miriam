<!--
    Varias opciones en un formulario.
-->

<%
String genero = request.getParameter("genero");
String [] canal = request.getParameterValues("canal");
%>
<form action="servlet" method="post">
  <label for="genero">Genero:</label>
  <input type="radio" name="genero" value="Masculino"<%=genero.equals("Masculino") ? "checked" : ""%>> Masculino<br />
  <input type="radio" name="genero" value="Femenino"<%=genero.equals("Femenino") ? "checked" : ""%>> Femenino<br />

  <label for="canal">Canal:</label>
  <select name="canal">
  <option value="Twitch"<%="Twitch".equalsIgnoreCase(canal != null && canal.length > 0 ? canal[0] : "") ? "selected" : ""%>>Twitch</option>
  <option value="Youtube"<%="Youtube".equalsIgnoreCase(canal != null && canal.length > 0 ? canal[0] : "") ? "selected" : ""%>>Youtube</option>



  <input type="submit" value="enviar" />
</form>

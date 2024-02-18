/*
 * Para imprimir el contenido de una sesión:
 */

Enumeration atributosSesion = nombreSesion.getAttributeNames();
while (atributosSesion.hasMoreElements()){
    String nombreAtributo = (String) atributosSesion.nextElement();
    String valorAtributo = (String) nombreSesion.getAttribute(nombreAtributo);

    syso("Nombre del atributo: " + nombreAtributo);
    syso("Valor del atributo: " + valorAtributo);
}